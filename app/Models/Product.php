<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations; // این بالا می‌مونه تا لاراول مسیرش رو بشناسه

class Product extends Model
{
    use HasTranslations; // آوردیمش داخل کلاس!

    // اسم فیلدهایی که می‌خوای چندزبانه بشن (description رو یه دونه کردم)
    public $translatable = ['name', 'slug', 'category', 'description', 'specs'];

    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'price',
        'image',
        'video',
        'catalog_file',
        'specs', // مشخصات فنی که برای چتبات حیاتی است
        'is_active', 
        'gallery',    
        'youtube_video_id',
    ];

    // این بخش باید حتماً قبل از اون آکولاد بسته آخر باشه
    protected $casts = [
        'gallery' => 'array',
    ];


// اتصال محصول به جدول آمارهای مارکتینگ
    public function analytics()
    {
        return $this->hasMany(\App\Models\ProductAnalytic::class);
    }


}