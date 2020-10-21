<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PGW\PgwMethods;

class ApiController extends Controller
{
    use PgwMethods;
    public function ReceiveAReq(Request $request){
        $message = $request->all();
        $issuerURL='www.issuer.bank.dz/api/issuer/receiveareq';
        $response = $this->SendAReq($issuerURL, $message);
        return json_encode(json_decode((string)$response->getBody()));
    }

    public function ReceiveRReq(Request $request){
        $message = $request->all();
        $acquirerURL='www.acquirer.bank.dz/api/acquirer/receiverreq';
        $response = $this->SendRReq($acquirerURL, $message);
        return json_encode(json_decode((string)$response->getBody()));
    }
}