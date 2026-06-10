<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductAnalytic extends Model
{
    // دیتابیس فقط زمان ثبت را نیاز دارد و نیازی به updated_at نداریم
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'action',
        'locale',
        'ip_hash',
    ];

    // رابطه با جدول محصول
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}