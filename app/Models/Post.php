<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Translatable\HasTranslations; // مثل Product تا لاراول مسیرش رو بشناسه

class Post extends Model
{
    use HasTranslations; // فعال‌سازی ترجمه‌پذیری

    // فیلدهایی که چندزبانه (JSON) می‌شوند
    public array $translatable = ['title', 'excerpt', 'content', 'slug'];

    protected $fillable = [
        'type', 'title', 'slug', 'excerpt',
        'content', 'cover_image', 'is_published', 'published_at',
    ];

    protected $casts = [
        'is_published'  => 'boolean',
        'published_at'  => 'datetime',
    ];

    public function scopeNews(Builder $query): Builder
    {
        return $query->where('type', 'news');
    }

    public function scopeArticles(Builder $query): Builder
    {
        return $query->where('type', 'article');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }
}
