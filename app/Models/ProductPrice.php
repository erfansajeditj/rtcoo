<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $fillable = [
        'product_id',
        'region',
        'currency',
        'price_from',
        'price_to',
        'incoterms',
        'is_public',
        'note',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
