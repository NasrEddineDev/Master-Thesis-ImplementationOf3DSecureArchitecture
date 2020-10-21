<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('issuer/receiveareq', 'IssuerController@ReceiveAReq');
Route::post('acquirer/receiveareq', 'AcquirerController@ReceiveAReq');

// Route::namespace('Front')->group(function () {
Route::post('executePgwPfe3dsPayment', 'CheckoutController@executePgwPfe3dsPayment');
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
