<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    
    protected $fillable = [
        'name',
        'location',
        'region',
        'description',
        'image',
        'rating'
    ];

    /**
     * Relasi ke tabel reviews
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
