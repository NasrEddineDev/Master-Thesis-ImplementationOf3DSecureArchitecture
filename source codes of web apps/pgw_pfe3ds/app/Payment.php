<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'merchant',
        'merchant_website',
        'total_paid',
        'return_url',
        'cancel_url',
        'request_data'
    ];
}
