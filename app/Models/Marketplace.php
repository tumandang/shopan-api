<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marketplace extends Model
{
    protected $fillable = ['name','logo','description','link_marketplace'];

    protected $appends = ['logo_url'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getLogoUrlAttribute()
    {
        return $this->logo 
            ? asset('storage/' . $this->logo) 
            : null;
    }
}
