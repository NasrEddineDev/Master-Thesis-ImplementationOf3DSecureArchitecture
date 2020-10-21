<?php

namespace App\Shop\PaymentMethods\Pay_pfe3ds\Repositories;

use Illuminate\Http\Request;

interface Pay_pfe3dsExpressCheckoutRepositoryInterface
{
    public function getApiContext();

    public function process($shippingFee, Request $request);

    public function execute(Request $request);
}
