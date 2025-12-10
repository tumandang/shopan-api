<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{


    public function address()
    {
        return $this->hasOne(Address::class, 'customer_id');
    }
    protected $table = 'customers';
    protected $fillable = [
        'user_id',
        'Fullname',
        'Notel',
    ];
}
