<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'user_id',
        'product_url',
        'product_name',
        'market_name',
        'quantity',
        'product_price',
        'size',
        'color',
        'model',
        'status',
        'product_image',
        'customer_notes',
        'admin_notes',
        'service_fee',
        'total_myr',
        'domestic_shipping',
        'quoted_total'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function order() {
    return $this->hasOne(Order::class, 'request_id', 'id');
}
}
