<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use App\PGW\PgwMethods;

class ApiController extends Controller
{
    use PgwMethods;
    //
    public function init(Request $request){
        $payment = new Payment([
            'merchant' => $request->merchant,
            'merchant_website' => $request->merchant_website,
            'total_paid' => $request->total_paid,
            'return_url' => $request->return_url,
            'cancel_url' => $request->cancel_url,
            'request_data' => json_encode($request->all())
        ]);
        $payment->save();
        return response()->json([
            'message' => '3DS protocol initiated successfully'
            , 'content' => $request->merchant
         ], 200);
    }

    
}


