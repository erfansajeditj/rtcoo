<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostApiController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'content'      => ['required', 'string'],
            'excerpt'      => ['nullable', 'string', 'max:500'],
            'type'         => ['nullable', 'string', 'in:article,news'],
            'cover_image'  => ['nullable', 'string'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $isPublished = $request->boolean('is_published');

        $slug = Str::slug($validated['title']);

        // اگر slug تکراری بود، یک پسوند یکتا اضافه کن
        if (Post::where('slug', $slug)->exists()) {
            $slug .= '-' . Str::lower(Str::random(6));
        }

        $post = Post::create([
            'type'         => $validated['type'] ?? 'article',
            'title'        => $validated['title'],
            'slug'         => $slug,
            'excerpt'      => $validated['excerpt'] ?? null,
            'content'      => $validated['content'],
            'cover_image'  => $validated['cover_image'] ?? null,
            'is_published' => $isPublished,
            'published_at' => $isPublished ? now() : null,
        ]);

        return response()->json([
            'message' => 'Post created successfully.',
            'data'    => $post,
        ], 201);
    }
}
