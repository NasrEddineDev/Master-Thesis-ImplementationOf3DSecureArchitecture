<?php

namespace App\Methods;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Mail\MailSender;
use Illuminate\Support\Facades\Mail;

/**
 * 
 */
trait MailMethods
{
    protected function SendEmail($full_name, $to_email, $subject, $data)
    {
        // $data = array('name'=>$full_name, 
        //               'body' => 'Thank you so much for allowing us to help you with your recent account opening. We are committed to providing our customers with the highest level of service and the most innovative banking products possible.

        //               We are very glad you chose us as your financial institution and hope you will take advantage of our wide variety of savings, investment and loan products, all designed to meet your specific needs.');
        Mail::send('emails.customer.mail', $data, 
        function($message) use ($full_name, $to_email) {
            $message->to($to_email, $full_name)->subject('New order');
            $message->from('hanouti@hanouti.dz','hanouti');
        });
    }
}
