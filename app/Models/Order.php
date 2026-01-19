<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'request_id',
        'payment_provider',
        'payment_intent_id',
        'checkout_session_id',
        'amount_myr',
        'status',
    ];

    public function request()
    {
        return $this->belongsTo(Request::class);
    }
}
