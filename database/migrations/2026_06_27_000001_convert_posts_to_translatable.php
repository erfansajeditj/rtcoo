<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * تبدیل ستون‌های متنی پست‌ها به JSON برای پشتیبانی از spatie/translatable.
     * داده‌های موجود حفظ می‌شوند و زیر زبان پیش‌فرض بسته‌بندی می‌شوند.
     */
    public function up(): void
    {
        $locale = config('app.locale') ?: 'en';

        // ۱) عکس فوری از داده‌های فعلی (هنوز متن ساده هستند)
        $posts = DB::table('posts')->get(['id', 'title', 'slug', 'excerpt', 'content']);

        // ۲) قبل از تغییر نوع ستون، یک placeholder معتبرِ JSON می‌گذاریم
        //    تا MySQL موقع ALTER به خاطر «JSON نامعتبر» ارور نده و طولِ VARCHAR هم سرریز نشود.
        DB::table('posts')->update([
            'title'   => '{}',
            'slug'    => '{}',
            'excerpt' => '{}',
            'content' => '{}',
        ]);

        // ۳) تغییر نوع ستون‌ها به JSON (change() — در لاراول ۱۱ بدون نیاز به doctrine/dbal)
        Schema::table('posts', function (Blueprint $table) {
            $table->json('title')->change();
            $table->json('excerpt')->nullable()->change();
            $table->json('content')->nullable()->change();
        });

        // slug ایندکس unique دارد و روی ستون JSON نمی‌توان unique مستقیم داشت،
        // پس اول ایندکس را حذف و سپس نوع را عوض می‌کنیم (دقیقاً مثل مهاجرت محصولات).
        DB::statement('ALTER TABLE posts DROP INDEX posts_slug_unique');
        DB::statement('ALTER TABLE posts MODIFY slug JSON');

        // ۴) بازنویسی مقادیر اصلی، بسته‌بندی‌شده زیر زبان پیش‌فرض
        foreach ($posts as $post) {
            DB::table('posts')->where('id', $post->id)->update([
                'title'   => json_encode([$locale => (string) $post->title], JSON_UNESCAPED_UNICODE),
                'slug'    => json_encode([$locale => (string) $post->slug], JSON_UNESCAPED_UNICODE),
                'excerpt' => $post->excerpt === null ? null : json_encode([$locale => $post->excerpt], JSON_UNESCAPED_UNICODE),
                'content' => $post->content === null ? null : json_encode([$locale => $post->content], JSON_UNESCAPED_UNICODE),
            ]);
        }
    }

    /**
     * بازگشت: JSON را به متن ساده برمی‌گرداند (مقدار زبان پیش‌فرض را استخراج می‌کند)
     * و ایندکس unique روی slug را دوباره می‌سازد.
     */
    public function down(): void
    {
        $locale = config('app.locale') ?: 'en';

        // عکس فوری از داده‌های JSON
        $posts = DB::table('posts')->get(['id', 'title', 'slug', 'excerpt', 'content']);

        $pick = function ($json, $locale) {
            $decoded = json_decode((string) $json, true);
            if (! is_array($decoded)) {
                return (string) $json; // اگر JSON نبود، همان مقدار خام
            }
            return $decoded[$locale] ?? (reset($decoded) ?: '');
        };

        // placeholder کوتاه تا تغییر نوع JSON→VARCHAR(255) به خاطر طول سرریز نکند
        DB::table('posts')->update([
            'title'   => '',
            'slug'    => '',
            'excerpt' => null,
            'content' => null,
        ]);

        // برگرداندن نوع ستون‌ها
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title')->change();
            $table->text('excerpt')->nullable()->change();
            $table->longText('content')->nullable()->change();
        });

        DB::statement('ALTER TABLE posts MODIFY slug VARCHAR(255)');

        // بازنویسی مقادیر متنی از روی عکس فوری
        foreach ($posts as $post) {
            DB::table('posts')->where('id', $post->id)->update([
                'title'   => $pick($post->title, $locale),
                'slug'    => $pick($post->slug, $locale),
                'excerpt' => $post->excerpt === null ? null : $pick($post->excerpt, $locale),
                'content' => $post->content === null ? null : $pick($post->content, $locale),
            ]);
        }

        // بازسازی ایندکس unique روی slug
        DB::statement('ALTER TABLE posts ADD UNIQUE posts_slug_unique (slug)');
    }
};
