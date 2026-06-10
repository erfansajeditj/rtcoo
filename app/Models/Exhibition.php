<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    // این خط اجازه می‌دهد اطلاعات ذخیره شوند
    protected $fillable = [
        'title',
        'cover_image',
        'gallery',
        'location',
        'start_date',
        'description'
    ];

    protected $casts = [
    'gallery' => 'array', // <--- این به لاراول می‌فهمونه که قراره چند تا عکس رو تو یه آرایه نگه داره
];

}

