<?php

namespace App\Http\Controllers\Front;

use App\Shop\Addresses\Repositories\Interfaces\AddressRepositoryInterface;
use App\Shop\Cart\Requests\CartCheckoutRequest;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Shop\Carts\Requests\PayPalCheckoutExecutionRequest;
use App\Shop\Carts\Requests\StripeExecutionRequest;
use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\Customers\Customer;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Shop\Orders\Repositories\Interfaces\OrderRepositoryInterface;
use App\Shop\PaymentMethods\Paypal\Exceptions\PaypalRequestError;
use App\Shop\PaymentMethods\Paypal\Repositories\PayPalExpressCheckoutRepository;
use App\Shop\PaymentMethods\Pay_pfe3ds\Repositories\Pay_pfe3dsExpressCheckoutRepository;
use App\Shop\PaymentMethods\Stripe\Exceptions\StripeChargingErrorException;
use App\Shop\PaymentMethods\Stripe\StripeRepository;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Products\Transformations\ProductTransformable;
use App\Shop\Shipping\ShippingInterface;
use Exception;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use PayPal\Exception\PayPalConnectionException;

use Ramsey\Uuid\Uuid;
use App\Shop\Orders\Order;
use App\Shop\Orders\OrderProduct;
use App\Shop\Products\Product;
use App\Shop\Carts\Repositories\CartRepository;
use App\Shop\Carts\ShoppingCart;
use App\Methods\MailMethods;

class CheckoutController extends Controller
{
    use MailMethods;

    use ProductTransformable;

    /**
     * @var CartRepositoryInterface
     */
    private $cartRepo;

    /**
     * @var CourierRepositoryInterface
     */
    private $courierRepo;

    /**
     * @var AddressRepositoryInterface
     */
    private $addressRepo;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepo;

    /**
     * @var PayPalExpressCheckoutRepository
     */
    private $payPal;

    /**
     * @var Pay_pfe3dsExpressCheckoutRepository
     */
    private $pay_pfe3ds;

    /**
     * @var ShippingInterface
     */
    private $shippingRepo;

    public function __construct(
        CartRepositoryInterface $cartRepository,
        CourierRepositoryInterface $courierRepository,
        AddressRepositoryInterface $addressRepository,
        CustomerRepositoryInterface $customerRepository,
        ProductRepositoryInterface $productRepository,
        OrderRepositoryInterface $orderRepository,
        ShippingInterface $shipping
    ) {
        $this->cartRepo = $cartRepository;
        $this->courierRepo = $courierRepository;
        $this->addressRepo = $addressRepository;
        $this->customerRepo = $customerRepository;
        $this->productRepo = $productRepository;
        $this->orderRepo = $orderRepository;
        $this->payPal = new PayPalExpressCheckoutRepository;
        $this->pay_pfe3ds = new Pay_pfe3dsExpressCheckoutRepository;
        $this->shippingRepo = $shipping;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->cartRepo->getCartItems();
        $customer = $request->user();
        $rates = null;
        $shipment_object_id = null;

        if (env('ACTIVATE_SHIPPING') == 1) {
            $shipment = $this->createShippingProcess($customer, $products);
            if (!is_null($shipment)) {
                $shipment_object_id = $shipment->object_id;
                $rates = $shipment->rates;
            }
        }

        // Get payment gateways
        $paymentGateways = collect(explode(',', config('payees.name')))->transform(function ($name) {
            return config($name);
        })->all();

        $billingAddress = $customer->addresses()->first();

        return view('front.checkout', [
            'customer' => $customer,
            'billingAddress' => $billingAddress,
            'addresses' => $customer->addresses()->get(),
            'products' => $this->cartRepo->getCartItems(),
            'subtotal' => $this->cartRepo->getSubTotal(),
            'tax' => $this->cartRepo->getTax(),
            'total' => $this->cartRepo->getTotal(2),
            'payments' => $paymentGateways,
            'cartItems' => $this->cartRepo->getCartItemsTransformed(),
            'shipment_object_id' => $shipment_object_id,
            'rates' => $rates
        ]);
    }

    /**
     * Checkout the items
     *
     * @param CartCheckoutRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Shop\Addresses\Exceptions\AddressNotFoundException
     * @throws \App\Shop\Customers\Exceptions\CustomerPaymentChargingErrorException
     * @codeCoverageIgnore
     */
    public function store(CartCheckoutRequest $request)
    {
        $shippingFee = 0;

        switch ($request->input('payment')) {
            case 'pay-pfe3ds':{
                // return $this->pay_pfe3ds->process($shippingFee, $request);
                // $request->request->add(['variable' => 'value']);
                return $this->payPal->process($shippingFee, $request);
                }break;
            case 'paypal':
                return $this->payPal->process($shippingFee, $request);
                break;
            case 'stripe':

                $details = [
                    'description' => 'Stripe payment',
                    'metadata' => $this->cartRepo->getCartItems()->all()
                ];

                $customer = $this->customerRepo->findCustomerById(auth()->id());
                $customerRepo = new CustomerRepository($customer);
                $customerRepo->charge($this->cartRepo->getTotal(2, $shippingFee), $details);
                break;
            default:
        }
    }

    /**
     * Execute the PayPal payment
     *
     * @param PayPalCheckoutExecutionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function executePayPalPayment(PayPalCheckoutExecutionRequest $request)
    {
        try {            
            $this->payPal->execute($request);
            $this->cartRepo->clearCart();

            return redirect()->route('checkout.success');
        } catch (PayPalConnectionException $e) {
            throw new PaypalRequestError($e->getData());
        } catch (Exception $e) {
            throw new PaypalRequestError($e->getMessage());
        }
    }
// added by Lahcen Bouchrit & Nasr Eddine uelfout, 2020
    public function executePgwPfe3dsPayment(Request $request)
    {
    //     $transactions = $request->transactions;
    //     $items = $transactions['item_list']['items'];
    //     return response()->json([
    //       'name'  =>  $request->tax ] 
    // , 200);
        try {
            $order = new Order([
                'reference' => Uuid::uuid4()->toString(),
                'courier_id' => 1,
                'customer_id' =>  $request->input('customer_id'),
                'address_id' => $request->input('billing_address'),
                'order_status_id' => 1,
                'payment' => $request->input('payment_method'),
                'discounts' => $request->input('discounts'),
                'total_products' => $request->input('total_products'),
                'total' => $request->input('total'),
                'total_paid' => $request->input('total_paid'),
                'tax' => $request->input('tax'),
                'invoice' => '',
                'label_url' => '',
                'tracking_number' => '',
                'total_shipping' => 0
                ]);
            $order->save();

            $transactions = $request->transactions;
            $items = $transactions['item_list']['items'];
            foreach($items as $item){
              $product = Product::where('name', '=', $item['name'])->first();
              $order_product = new OrderProduct([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'product_attribute_id' => null,
                'quantity' => $item['quantity'],
                'product_name' => $product->name,
                'product_sku' => $product->sku,
                'product_description' => $product->description,
                'product_price' => $product->price
              ]);
              $order_product->save();
            }

            $this->cartRepo->clearCart();
            return response()->json([
                'statusCode' => '200',
                'message' => 'success'
            ], 200);

            // return redirect()->route('checkout.success');
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => '200',
                'message' => 'error',
                'error' => $e->getMessage() 
            ], 200);
        } 
        // catch (Exception $e) {
        //     throw new PaypalRequestError($e->getMessage());
        // }
    }
    public function returnPgwPfe3ds(Request $request)
    {
        // $cartRepo = new CartRepository(new ShoppingCart);
        // $cartRepo->clearCart();
        return redirect()->route('checkout.success');
    }
    /**
     * @param StripeExecutionRequest $request
     * @return \Stripe\Charge
     */
    public function charge(StripeExecutionRequest $request)
    {
        dd($request);
        try {
            $customer = $this->customerRepo->findCustomerById(auth()->id());
            $stripeRepo = new StripeRepository($customer);

            $stripeRepo->execute(
                $request->all(),
                Cart::total(),
                Cart::tax()
            );
            return redirect()->route('checkout.success')->with('message', 'Stripe payment successful!');
        } catch (StripeChargingErrorException $e) {
            Log::info($e->getMessage());
            return redirect()->route('checkout.index')->with('error', 'There is a problem processing your request.');
        }
    }

    /**
     * Cancel page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cancel(Request $request)
    {
        $cartRepo = new CartRepository(new ShoppingCart);
        $cartRepo->clearCart();
        return view('front.checkout-cancel', ['data' => $request->all()]);
    }

    /**
     * Success page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function success()
    {

        $products = $this->cartRepo->getCartItems();
        $customer = Customer::find(15);//$request->user();
        $rates = null;
        $shipment_object_id = null;

        if (env('ACTIVATE_SHIPPING') == 1) {
            $shipment = $this->createShippingProcess($customer, $products);
            if (!is_null($shipment)) {
                $shipment_object_id = $shipment->object_id;
                $rates = $shipment->rates;
            }
        }

        // Get payment gateways
        $paymentGateways = collect(explode(',', config('payees.name')))->transform(function ($name) {
            return config($name);
        })->all();

        $billingAddress = $customer->addresses()->first();
// dd($this->cartRepo->getCartItems());
        $invoice_code = mt_rand(1000, 9999);

        $results =          [
            'customer' => $customer,
            'date' => now(),
            'invoice_code' => $invoice_code,
            'billingAddress' => $customer->addresses()->first(),
            'addresses' => $customer->addresses()->get(),
            'products' => $this->cartRepo->getCartItems(),
            'subtotal' => $this->cartRepo->getSubTotal(),
            'tax' => $this->cartRepo->getTax(),
            'total' => $this->cartRepo->getTotal(2),
            'payments' => $paymentGateways,
            'cartItems' => $this->cartRepo->getCartItemsTransformed(),
            'shipment_object_id' => $shipment_object_id,
            'rates' => $rates
        ];

        // Send email to customer
        $this->SendEmail($customer->full_name, 
        $customer->email,
        'New purchases',
        $results);
                
         $cartRepo = new CartRepository(new ShoppingCart);
         $cartRepo->clearCart();

        return view('front.checkout-success',$results);
    }
    public function successtest()
    {
        $products = $this->cartRepo->getCartItems();
        $customer = Customer::find(15);//$request->user();
        $rates = null;
        $shipment_object_id = null;

        if (env('ACTIVATE_SHIPPING') == 1) {
            $shipment = $this->createShippingProcess($customer, $products);
            if (!is_null($shipment)) {
                $shipment_object_id = $shipment->object_id;
                $rates = $shipment->rates;
            }
        }

        // Get payment gateways
        $paymentGateways = collect(explode(',', config('payees.name')))->transform(function ($name) {
            return config($name);
        })->all();

        $billingAddress = $customer->addresses()->first();
// dd($this->cartRepo->getCartItems());
        return view('emails.customer.mail1',[
            'customer' => $customer,
            'date' => now(),
            'invoice_code' => mt_rand(1000, 9999),
            'billingAddress' => $customer->addresses()->first(),
            'addresses' => $customer->addresses()->get(),
            'products' => $this->cartRepo->getCartItems(),
            'subtotal' => $this->cartRepo->getSubTotal(),
            'tax' => $this->cartRepo->getTax(),
            'total' => $this->cartRepo->getTotal(2),
            'payments' => $paymentGateways,
            'cartItems' => $this->cartRepo->getCartItemsTransformed(),
            'shipment_object_id' => $shipment_object_id,
            'rates' => $rates
        ]);
    }
    
    /**
     * @param Customer $customer
     * @param Collection $products
     *
     * @return mixed
     */
    private function createShippingProcess(Customer $customer, Collection $products)
    {
        $customerRepo = new CustomerRepository($customer);

        if ($customerRepo->findAddresses()->count() > 0 && $products->count() > 0) {

            $this->shippingRepo->setPickupAddress();
            $deliveryAddress = $customerRepo->findAddresses()->first();
            $this->shippingRepo->setDeliveryAddress($deliveryAddress);
            $this->shippingRepo->readyParcel($this->cartRepo->getCartItems());

            return $this->shippingRepo->readyShipment();
        }
    }
}
