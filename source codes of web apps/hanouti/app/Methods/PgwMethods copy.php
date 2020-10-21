<?php

namespace App\PGW;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Mail\MailSender;
use Illuminate\Support\Facades\Mail;

/**
 * 
 */
trait PgwMethods
{

    protected function SendEmailToCustomer($full_name, $to_email, $subject, $data)
    {
        // $data = array('name'=>$full_name, 
        //               'body' => 'Thank you so much for allowing us to help you with your recent account opening. We are committed to providing our customers with the highest level of service and the most innovative banking products possible.

        //               We are very glad you chose us as your financial institution and hope you will take advantage of our wide variety of savings, investment and loan products, all designed to meet your specific needs.');
        Mail::send('emails.customer.mail', $data, 
        function($message) use ($full_name, $to_email) {
            $message->to($to_email, $full_name)->subject($subject);
            $message->from('hanouti@hanouti.dz','hanouti');
        });
    }

    protected function ReceiveAReq(Request $request){
        $client = new Client(['base_uri' => config('pay-pfe3ds.api_url')."/api/pay-pfe3ds"]);
        $params['form_params'] = [
        "intent" => "sale",
        "merchant" => "hanouti",
        "merchant_website" => "http://hanouti.dz",
        "return_url" => "www.hanouti.dz/checkout/execute?payment=pay-pfe3ds&billing_address=12",
        "cancel_url" => "www.hanouti.dz/checkout/cancel",
        "payment_method" => "pay-pfe-3ds",
        'discounts' => 0,
        'total_products' => $cartRepo->getSubTotal(),
        'total' => $cartRepo->getTotal(),
        'total_paid' => $cartRepo->getTotal(2, $shippingFee),
        'tax' => $cartRepo->getTax()
      ];
     $url = config('pay-pfe3ds.api_url')."/api/pay-pfe3ds/init";
            // dd($params);
            $response = $client->post($url,$params);
              $body           = $response->getBody();
              $html_string    = (string) $body ;
            
    }

    protected function SendAReq($url, $message){
        $client = new Client(['base_uri' => $url]);
        // $params['form_params'] = $message;
        // $response = $client->post($url,$message);
        // return (string) $response->getBody();
                return response()->json([
            'message' => 'success',
            'content' => $message
        ], 200);
            
    }

    protected function SendARes($url, $message){
        $client = new Client(['base_uri' => $url]);
        // $params['form_params'] = $message;
        return $client->post($url, $message);
        //   $body           = $response->getBody();
        //   $html_string    = (string) $body ;
            
    }
}
