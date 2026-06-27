<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    public function newsIndex()
    {
        $posts = Post::news()->published()
            ->orderBy('published_at', 'desc')
            ->get();
        return view('news', compact('posts'));
    }

    public function articlesIndex()
    {
        $posts = Post::articles()->published()
            ->orderBy('published_at', 'desc')
            ->get();
        return view('articles', compact('posts'));
    }

    public function showNews(string $slug)
    {
        $post = $this->resolveBySlug(Post::news()->published(), $slug);
        return view('post-show', compact('post'));
    }

    public function showArticle(string $slug)
    {
        $post = $this->resolveBySlug(Post::articles()->published(), $slug);
        return view('post-show', compact('post'));
    }

    /**
     * پیدا کردن پست بر اساس slug چندزبانه (در هر سه زبان جستجو می‌کند).
     * دقیقاً مثل الگوی ProductController::show.
     */
    private function resolveBySlug(Builder $query, string $slug): Post
    {
        $post = $query->where(function ($q) use ($slug) {
            $q->where('slug->en', $slug)
              ->orWhere('slug->ru', $slug)
              ->orWhere('slug->tg', $slug);
        })->first();

        if (! $post) {
            abort(404);
        }

        return $post;
    }
}
