<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Product extends Model
{
     protected $fillable = [
        'title',
        'category_id',
        'details',
        'price',
        'price1',
        'stock',
        'image',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }



    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
