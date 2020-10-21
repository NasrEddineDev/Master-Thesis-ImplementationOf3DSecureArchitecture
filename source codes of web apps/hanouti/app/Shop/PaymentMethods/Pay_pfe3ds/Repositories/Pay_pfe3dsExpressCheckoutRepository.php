<?php

namespace App\Shop\PaymentMethods\Pay_pfe3ds\Repositories;

use App\Shop\Addresses\Address;
use App\Shop\Addresses\Repositories\AddressRepository;
use App\Shop\Carts\Repositories\CartRepository;
use App\Shop\Carts\ShoppingCart;
use App\Shop\Checkout\CheckoutRepository;
use App\Shop\PaymentMethods\Payment;
use App\Shop\PaymentMethods\Paypal\Exceptions\PaypalRequestError;
use App\Shop\PaymentMethods\Pay_pfe3ds\Pay_pfe3dsExpress;
use Illuminate\Http\Request;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Api\Payment as PayPalPayment;
use Ramsey\Uuid\Uuid;

use GuzzleHttp\Client;

class Pay_pfe3dsExpressCheckoutRepository implements Pay_pfe3dsExpressCheckoutRepositoryInterface
{
    /**
     * @var mixed
     */
    private $pay_pfe3ds;

    /**
     * PayPalExpressCheckoutRepository constructor.
     */
    public function __construct()
    {
        $payment = new Payment(new Pay_pfe3dsExpress(
            config('pay-pfe3ds.client_id'),
            config('pay-pfe3ds.client_secret'),
            config('pay-pfe3ds.mode'),
            config('pay-pfe3ds.api_url')
        ));

        $this->pay_pfe3ds = $payment->init();
    }

    /**
     * @return mixed
     */
    public function getApiContext()
    {
        return $this->pay_pfe3ds;
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

        $this->pay_pfe3ds->setPayer();
        $this->pay_pfe3ds->setItems($items);
        $this->pay_pfe3ds->setOtherFees(
            $cartRepo->getSubTotal(),
            $cartRepo->getTax(),
            $shippingFee
        );
        $this->pay_pfe3ds->setAmount($cartRepo->getTotal(2, $shippingFee));
        $this->pay_pfe3ds->setTransactions();

        $billingAddress = $addressRepo->findAddressById($request->input('billing_address'));
        $this->pay_pfe3ds->setBillingAddress($billingAddress);

        if ($request->has('shipping_address')) {
            $shippingAddress = $addressRepo->findAddressById($request->input('shipping_address'));
            $this->pay_pfe3ds->setShippingAddress($shippingAddress);
        }
        try {
            // code added by me
            
            // Create client
            $client = new Client(
                [
                // Example
                'base_uri' => config('pay-pfe3ds.api_url')."/api/pay-pfe3ds",
            ]
        );
        // dd($this->pay_pfe3ds);
            // Send request and collect response
            // $response       = $client->post('https://www.google.com');
            // $params['headers'] = ['Content-Type' => 'application/json', 'Authorization' => 'Zoho-authtoken ' . $AuthCode];
            // $params['form_params'] = array('fromAddress' => '', 
            //     'toAddress' => '', 
            //     'subject' => '', 
            //     'content' => $this->pay_pfe3ds);
            $params['form_params'] = [
                "intent" => "sale",
                "merchant" => "hanouti",
                "merchant_website" => "http://hanouti.dz",
                "return_url" => "http://192.168.42.138:8000/checkout/execute?payment=pay-pfe3ds&billing_address=12",
                "cancel_url" => "http://192.168.42.138:8000/checkout/cancel",
                "payment_method" => "pay-pfe-3ds",
                'discounts' => 0,
                'total_products' => $cartRepo->getSubTotal(),
                'total' => $cartRepo->getTotal(),
                'total_paid' => $cartRepo->getTotal(2, $shippingFee),
                'tax' => $cartRepo->getTax()
            ];
            // $this->objToArray($this->pay_pfe3ds, $params);
            
            $url = config('pay-pfe3ds.api_url')."/api/pay-pfe3ds/init";
            // dd($params);
            $response = $client->post($url,$params);
              $body           = $response->getBody();
              $html_string    = (string) $body ;
            // dd($html_string);

            // json_encode($this->pay_pfe3ds)->toArray()
            // $response = Http::post(config('pay-pfe3ds.api_url'),
            // $this->pay_pfe3ds->toJson(JSON_PRETTY_PRINT)
            // );
            //json_encode(
            $redirectUrl = config('pay-pfe3ds.api_url')."/pay-pfe3ds/";
            return redirect()->to($redirectUrl);

            $response = $this->pay_pfe3ds->createPayment(
                route('checkout.execute', $request->except('_token', '_method')),
                route('checkout.cancel')
            );

            $redirectUrl = config('app.url');

            if ($response) {
                $redirectUrl = 'www.hanouti.dz';//$response->links[1]->href;
            }
            return redirect()->to($redirectUrl);
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
        $payment = PayPalPayment::get($request->input('paymentId'), $this->pay_pfe3ds->getApiContext());
        $execution = $this->pay_pfe3ds->setPayerId($request->input('PayerID'));
        $trans = $payment->execute($execution, $this->pay_pfe3ds->getApiContext());

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
