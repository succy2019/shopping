<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'stock',
        'image',
        'slug',
    ];

    /**
     * Relationships
     */

    // A product may belong to multiple carts
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // A product may belong to multiple order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}

