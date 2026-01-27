<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annoucement extends Model
{
    protected $fillable = [
        'title',
        'summary',
        'description',
        'image',
        'status',
        'user_id',
    ];
    protected $appends = ['featured_image_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        return $this->image
            ? asset('storage/' . $this->image) 
            : null;
    }
}
