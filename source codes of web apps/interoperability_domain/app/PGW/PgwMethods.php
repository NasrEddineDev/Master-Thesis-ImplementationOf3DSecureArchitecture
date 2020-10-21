<?php

namespace App\PGW;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

trait PgwMethods
{
    protected function SendAReq($url, $message)
    {
        $response = Http::post($url, $message);
        return $response;
    }
    protected function SendRReq($url, $message)
    {
        $response = Http::post($url, $message);
        return $response;
    }
}
