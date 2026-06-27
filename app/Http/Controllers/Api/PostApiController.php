<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostApiController extends Controller
{
    /** زبان‌های پشتیبانی‌شده */
    private const LOCALES = ['en', 'ru', 'tg'];

    /** زبان پیش‌فرض برای ورودی رشته‌ای ساده (backward compatible) */
    private const DEFAULT_LOCALE = 'en';

    public function store(Request $request): JsonResponse
    {
        // فیلدهای چندزبانه می‌توانند رشته ساده یا آبجکت {en,ru,tg} باشند.
        $validated = $request->validate([
            'title'          => ['required'],
            'title.*'        => ['string', 'max:255'],
            'content'        => ['required'],
            'content.*'      => ['string'],
            'excerpt'        => ['nullable'],
            'excerpt.*'      => ['string', 'max:500'],
            'slug'           => ['nullable'],
            'slug.*'         => ['string', 'max:255'],
            'type'           => ['nullable', 'string', 'in:article,news'],
            'cover_image'    => ['nullable', 'string'],
            'is_published'   => ['nullable', 'boolean'],
        ]);

        $isPublished = $request->boolean('is_published');

        // هر فیلد چندزبانه را به آرایه‌ی [locale => value] تبدیل می‌کنیم.
        $title   = $this->normalizeTranslatable($validated['title']);
        $content = $this->normalizeTranslatable($validated['content']);
        $excerpt = isset($validated['excerpt']) && $validated['excerpt'] !== null
            ? $this->normalizeTranslatable($validated['excerpt'])
            : null;

        // slug: اگر فرستاده شده از آن استفاده کن، وگرنه برای هر زبانِ عنوان بساز.
        if (isset($validated['slug']) && $validated['slug'] !== null && $validated['slug'] !== '') {
            $slug = $this->normalizeTranslatable($validated['slug']);
        } else {
            $slug = [];
            foreach ($title as $locale => $value) {
                $slug[$locale] = Str::slug($value);
            }
        }

        // اطمینان از یکتا بودن slug (بر اساس زبان پیش‌فرض یا اولین زبانِ موجود).
        $slug = $this->ensureUniqueSlug($slug);

        $post = Post::create([
            'type'         => $validated['type'] ?? 'article',
            'title'        => $title,
            'slug'         => $slug,
            'excerpt'      => $excerpt,
            'content'      => $content,
            'cover_image'  => $validated['cover_image'] ?? null,
            'is_published' => $isPublished,
            'published_at' => $isPublished ? now() : null,
        ]);

        return response()->json([
            'message' => 'Post created successfully.',
            'data'    => $post,
        ], 201);
    }

    /**
     * ورودی را به آرایه‌ی [locale => value] تبدیل می‌کند.
     * - اگر رشته ساده باشد → زیر زبان پیش‌فرض (en) قرار می‌گیرد (backward compatible).
     * - اگر آبجکت {en,ru,tg} باشد → فقط کلیدهای مجاز نگه داشته می‌شوند.
     */
    private function normalizeTranslatable(mixed $value): array
    {
        if (is_array($value)) {
            return array_filter(
                $value,
                fn ($key) => in_array($key, self::LOCALES, true),
                ARRAY_FILTER_USE_KEY
            );
        }

        return [self::DEFAULT_LOCALE => (string) $value];
    }

    /**
     * اگر slugِ زبان مبنا تکراری بود، به همه‌ی زبان‌ها یک پسوند یکتا اضافه می‌کند.
     */
    private function ensureUniqueSlug(array $slug): array
    {
        $primaryLocale = array_key_exists(self::DEFAULT_LOCALE, $slug)
            ? self::DEFAULT_LOCALE
            : array_key_first($slug);

        if ($primaryLocale === null) {
            return $slug;
        }

        $exists = Post::where("slug->{$primaryLocale}", $slug[$primaryLocale])->exists();

        if ($exists) {
            $suffix = '-' . Str::lower(Str::random(6));
            foreach ($slug as $locale => $value) {
                $slug[$locale] = $value . $suffix;
            }
        }

        return $slug;
    }
}
