<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function customer()
    {
        return $this->hasOne(customers::class);
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_customers',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function annoucements()
    {
        return $this->hasMany(Annoucement::class);
    }
}
