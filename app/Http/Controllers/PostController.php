<?php

namespace App\Http\Controllers;

use App\Models\Post;

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
        $post = Post::news()->published()->where('slug', $slug)->firstOrFail();
        return view('post-show', compact('post'));
    }

    public function showArticle(string $slug)
    {
        $post = Post::articles()->published()->where('slug', $slug)->firstOrFail();
        return view('post-show', compact('post'));
    }
}
