<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    protected $fillable = [
        'company_name',
        'country_city',
        'contact_person',
        'phone',
        'email',
        'proposal',
        'reply_history',
    ];

    // این بخش حالا دقیقاً داخل کلاس قرار داره
    protected $casts = [
        'reply_history' => 'array',
    ];
}