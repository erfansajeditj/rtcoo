<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'subject',
        'content',
        'reply_history', // <--- اضافه شد
    ];

    protected $casts = [
        'reply_history' => 'array', // <--- اضافه شد
    ];
}