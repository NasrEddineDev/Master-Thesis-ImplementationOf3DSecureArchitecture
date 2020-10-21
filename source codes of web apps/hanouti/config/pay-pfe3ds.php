<?php

return [
    'name' => 'pay-pfe3ds',
    'description' => 'pay-pfe3ds - Safe, Secured and Easy to pay online!',
    'account_id' => env('PP3_ACCOUNT_ID', 'xxxx'),
    'client_id' => env('PP3_CLIENT_ID', 'xxxx'),
    'client_secret' => env('PP3_CLIENT_SECRET', 'xxxx'),
    'api_url' => env('PP3_API_URL', 'www.pgw-pfe3ds.dz'),
    'redirect_url' => env('PP3_REDIRECT_URL', 'xxxx'),
    'cancel_url' => env('PP3_CANCEL_URL', 'xxxx'),
    'failed_url' => env('PP3_FAILED_URL', 'xxxx'),
    'mode' => env('PP3_MODE', 'xxxx')
];