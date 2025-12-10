<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    public function customer()
    {
        return $this->belongsTo(customers::class, 'customer_id');
    }
        protected $fillable = [
        'customer_id',
        'address1',
        'address2',
        'address3',
        'postcode',
        'city',
        'state',
        'country',
    ];

}
