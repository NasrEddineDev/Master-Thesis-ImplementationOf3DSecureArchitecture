<?php

namespace App\Shop\PaymentMethods\Paypal\Repositories;

use App\Shop\Addresses\Address;
use App\Shop\Addresses\Repositories\AddressRepository;
use App\Shop\Carts\Repositories\CartRepository;
use App\Shop\Carts\ShoppingCart;
use App\Shop\Checkout\CheckoutRepository;
use App\Shop\PaymentMethods\Payment;
use App\Shop\PaymentMethods\Paypal\Exceptions\PaypalRequestError;
use App\Shop\PaymentMethods\Paypal\PaypalExpress;
use Illuminate\Http\Request;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Api\Payment as PayPalPayment;
use Ramsey\Uuid\Uuid;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class PayPalExpressCheckoutRepository implements PayPalExpressCheckoutRepositoryInterface
{
    /**
     * @var mixed
     */
    private $payPal;

    /**
     * PayPalExpressCheckoutRepository constructor.
     */
    public function __construct()
    {
        $payment = new Payment(new PaypalExpress(
            config('paypal.client_id'),
            config('paypal.client_secret'),
            config('paypal.mode'),
            config('paypal.api_url')
        ));

        $this->payPal = $payment->init();
    }

    /**
     * @return mixed
     */
    public function getApiContext()
    {
        return $this->payPal;
    }

    /**
     * @param $shippingFee
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Shop\Addresses\Exceptions\AddressNotFoundException
     */
    public function process($shippingFee, Request $request)
    {
        $cartRepo = new CartRepository(new ShoppingCart());
        $items = $cartRepo->getCartItemsTransformed();

        $addressRepo = new AddressRepository(new Address());

        $this->payPal->setPayer();
        $this->payPal->setItems($items);
        $this->payPal->setOtherFees(
            $cartRepo->getSubTotal(),
            $cartRepo->getTax(),
            $shippingFee
        );
        $this->payPal->setAmount($cartRepo->getTotal(2, $shippingFee));
        $this->payPal->setTransactions();

        $billingAddress = $addressRepo->findAddressById($request->input('billing_address'));
        $this->payPal->setBillingAddress($billingAddress);

        if ($request->has('shipping_address')) {
            $shippingAddress = $addressRepo->findAddressById($request->input('shipping_address'));
            $this->payPal->setShippingAddress($shippingAddress);
        }

        try {
// added by nasreddine & lahcen
 if ($request->input('payment') == "pay-pfe3ds"){

    //dd($request->all());
    // $request->merge([
    //     'payment' => 'paypal',
    // ]);

    // // $payment = new Payment();
    // // $payment->setIntent('sale')
    // //     ->setPayer($payment->payer)
    // //     ->setTransactions([$payment->transactions]);

    // // $redirectUrls = new RedirectUrls();
    // // $redirectUrls
    // //     ->setReturnUrl(route('checkout.execute', $request->except('_token', '_method')))
    // //     ->setCancelUrl(route('checkout.cancel'));

    // // $payment->setRedirectUrls($redirectUrls);
    // dd($this->payPal->getItemList());
    // $response = $this->payPal->createPayment(
    //     route('checkout.execute', $request->except('_token', '_method')),
    //     route('checkout.cancel')
    // );
        
    $params['form_params'] = [
                "intent" => "sale",
                "merchant" => "hanouti",
                "merchant_website" => "http://hanouti.dz",
                "return_url" => "www.hanouti.dz/returnpgwpfe3ds?payment=pay-pfe3ds&billing_address=12",
                "cancel_url" => "www.hanouti.dz/checkout/cancel",
                "payment_method" => "pay-pfe3ds",
                'discounts' => 0,
                'customer_id' => Auth::user()->id,
                'total_products' => $cartRepo->getSubTotal(),
                'total' => $cartRepo->getTotal(),
                'total_paid' => $cartRepo->getTotal(2, $shippingFee),
                'tax' => $cartRepo->getTax(),
                'billing_address' => $request->input('billing_address'),
                'transactions' => json_decode($this->payPal->getTransactions())
            ];

    $url =config('pay-pfe3ds.api_url')."/api/init";
    // Create client
    $client = new Client(['base_uri' => config('pay-pfe3ds.api_url')]);
    // $response = $client->request('POST', $url, $params);

    // dd($params);
    $response = $client->post($url,$params);
    // $body = $response->getBody();
    // $html_string = json_decode($body, true) ;

    // dd($html_string);
    $redirectUrl = config('pay-pfe3ds.api_url');
    // return redirect()->away($redirectUrl);
   return redirect()->to('http://'.$redirectUrl);
    // return redirect('pgw-pfe3ds');
    // return redirect()->to("pgw-pfe3ds");
 }else{

    $response = $this->payPal->createPayment(
        route('checkout.execute', $request->except('_token', '_method')),
        route('checkout.cancel')
    );
            $redirectUrl = config('app.url');
            if ($response) {
                $redirectUrl = $response->links[1]->href;
            }
            return redirect()->to($redirectUrl);
}
        } catch (PayPalConnectionException $e) {
            throw new PaypalRequestError($e->getMessage());
        }
    }

    /**
     * @param Request $request
     *
     * @throws \Exception
     */
    public function execute(Request $request)
    {
        $payment = PayPalPayment::get($request->input('paymentId'), $this->payPal->getApiContext());
        $execution = $this->payPal->setPayerId($request->input('PayerID'));
        $trans = $payment->execute($execution, $this->payPal->getApiContext());

        $cartRepo = new CartRepository(new ShoppingCart);
        $transactions = $trans->getTransactions();

        foreach ($transactions as $transaction) {
            $checkoutRepo = new CheckoutRepository;
            $checkoutRepo->buildCheckoutItems([
                'reference' => Uuid::uuid4()->toString(),
                'courier_id' => 1,
                'customer_id' => $request->user()->id,
                'address_id' => $request->input('billing_address'),
                'order_status_id' => 1,
                'payment' => $request->input('payment'),
                'discounts' => 0,
                'total_products' => $cartRepo->getSubTotal(),
                'total' => $cartRepo->getTotal(),
                'total_paid' => $transaction->getAmount()->getTotal(),
                'tax' => $cartRepo->getTax()
            ]);
        }

        $cartRepo->clearCart();
    }
}
