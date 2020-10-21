<?php

namespace App\PGW;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

trait PgwMethods
{
    protected function GetLastPaymentInfo()
    {
        return  DB::table('payments')->latest()->first();
    }
    // Send Authetication Request message to $url 
    protected function SendAReq($url, $message)
    {
        $response = Http::post($url, $message);
        return $response;
    }
    // Send Challenge Request message to $url 
    protected function SendCReq($url, $message)
    {
        $response = Http::post($url, $message);
        return $response;
    }
    // Send Email Request to the $url of issuer 
    protected function SendEmail($url, $message)
    {
        $response = Http::post($url, $message);
        return $response;
    }
    // Send Code Validation Request to the issuer $url  
    protected function ValidateCode($url, $message)
    {
        $response = Http::post($url, $message);
        return $response;
    }
    // Send Payment Execution Request to the acquirer $url  
    protected function ExecutePayment($url, $message)
    {
        $response = Http::post($url, $message);
        return $response;
    }
}