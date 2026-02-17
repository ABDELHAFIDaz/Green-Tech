<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image',
        'stock'
    ];

    public function favoris()
    {
        return $this->hasMany(Favoris::class);
    }
}
