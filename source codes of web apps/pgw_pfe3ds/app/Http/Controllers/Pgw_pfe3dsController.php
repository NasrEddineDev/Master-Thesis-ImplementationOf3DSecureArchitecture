<?php

namespace App\Http\Controllers;

use App\Payment;
use App\PGW\PgwMethods;
use Illuminate\Http\Request;

class Pgw_pfe3dsController extends Controller
{
    use PgwMethods;
    private $code;
    private $payment;
    private $acsURL;
    private $cardNumber;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $payment = $this->GetLastPaymentInfo();
        return view('pgw-pfe3ds.index', compact('payment'));
    }

    public function pay(Request $request)
    {
        $payment = $this->GetLastPaymentInfo();
        $this->cardNumber = str_replace('-', '',$request->cardNumber);
        $payment->cardNumber = str_replace('-', '',$request->cardNumber);
        // sending AReq
        $messageAReq = [          
        'threeDSRequestorID' => '',
        'threeDSRequestorName' => '',
        'threeDSRequestorURL' => '',
        'threeDSServerRefNumber'  => '', 
        'threeDSServerURL'  => 'http://www.acquirer.bank.dz',    
        'cardholderName' => $request->cardholderName, 
        'acctNumber' => str_replace('-', '',$request->cardNumber),
        'cardExpiryDate' => $request->cardExpiryDate, 
        'cvCode' => $request->cvCode, // remove or not ?
        'purchaseAmount' => $payment->total_paid,
        'acctType' => '',
        'acquirerBIN' => '',
        'acquirerMerchantID' => '',
        'email' => '',
        'mobilePhone' => '',
        'dsURL' => 'http://www.interbank.network.dz/api/interoperability/receiveareq',
        'merchantName' => $request->merchant,
        'purchaseAmount' => $request->total_paid,
        'purchaseDate' => now(),
        'acctID' => ''
        ];
        $acquirerURL = $messageAReq["threeDSServerURL"] . '/api/acquirer/receiveareq';
        $response = $this->SendAReq($acquirerURL, $messageAReq);
        // Receiving ARes
        $messageARes = json_decode((string)$response->getBody());
        if (!empty($messageARes)){

            if ($messageARes->statusCode == "401"){
                return redirect()->back()->withInput()
                ->withErrors([$messageARes->field => $messageARes->message]);
            }
          $payment->emailHiden = substr_replace($messageARes->email, 
                '*******', 3, strlen($messageARes->email)-6);
          $payment->email = $messageARes->email;
          $payment->acsURL = $messageARes->acsURL;
          $payment->cardNumberHiden = substr_replace($payment->cardNumber, '**********', 
          3, strlen($payment->cardNumber)-6);
        }
        else{
            return redirect()->back()->withInput()
            ->withErrors(["cardExpiryDate" => "There is an error on verifying card"]);
        }
        return view('pgw-pfe3ds.confirmation', compact('payment'));
    }

    public function sendCode(Request $request)
    {
        // send CReq
        $result = $this->SendEmail($request->acsURL.'/api/issuer/sendemail',
            ['cardNumber' => $request->cardNumber,
            'email' => $request->email]);
        $response = json_decode((string)$result->getBody());
        return response()->json($response, 200);
    }

    public function validation(Request $request)
    {
        $payment = $this->GetLastPaymentInfo();
        $response = $this->ValidateCode($request->acsURL . 
            '/api/issuer/verifycode', 
            ['code' => $request->code,
            'cardNumber' => $request->cardNumber,
            'amount' => $payment->total_paid,
            'merchant' => $payment->merchant]);
        $message = json_decode((string)$response->getBody()); 
        if (!empty($message) && $message->statusCode == '200'){
            // execute the transaction bank to bank
            $response = $this->ExecutePayment(
            'http://www.hanouti.dz'.'/api/executePgwPfe3dsPayment',
            json_decode($payment->request_data, true));
            return response()->json(
                [
                'status' => true,
                'return_url' => 'http://'.$payment->return_url,
                'request_data' => $payment->request_data,
                'message' => $message->message,
                'dd' => json_decode((string)$response->getBody())
             ]
             , 200); 
        }
        return response()->json([
            'status' => false,
            'message' => $message->message
            ], 200); 
    }
    public function ReceiveCReq(Request $request)
    {
        return response()->json([
          'message' => '3DS protocol initiated successfully'
        ], 200); 
    }
}
