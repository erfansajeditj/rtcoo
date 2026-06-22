<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CollaborationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminDashboardController;
use App\Models\Exhibition;

// ریشه‌ی سایت → ریدایرکت به زبان پیش‌فرض
Route::get('/', fn () => redirect('/' . config('app.locale', 'en')));

// Sitemap
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

// Dynamic robots.txt (includes sitemap URL with correct domain)
Route::get('/robots.txt', function () {
    $content  = "User-agent: *\n";
    $content .= "Disallow: /admin\n";
    $content .= "Disallow: /*/marketing-dashboard\n";
    $content .= "Disallow: /*/contact-submit\n";
    $content .= "Disallow: /*/collaboration-submit\n";
    $content .= "Disallow: /chat/\n";
    $content .= "\n";
    $content .= "Sitemap: " . route('sitemap') . "\n";
    return response($content, 200)->header('Content-Type', 'text/plain');
});

// همه‌ی صفحات عمومی داخل گروه زبان
Route::prefix('{locale}')
    ->where(['locale' => 'en|tg|ru'])
    ->middleware(\App\Http\Middleware\LanguageManager::class)
    ->group(function () {

        // صفحه اصلی
        Route::get('/', function () {
            $categories = \App\Models\Product::where('is_active', true)
                ->get()->groupBy('category')
                ->map(fn ($products) => $products->first());
            return view('home', compact('categories'));
        })->name('home');

        // محصولات (ترتیب مهمه: category و download قبل از slug)
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/category/{category}', [ProductController::class, 'category'])->name('products.category');
        Route::get('/products/{id}/download-catalog', [ProductController::class, 'downloadCatalog'])->name('product.download');
        Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

        // نمایشگاه‌ها
        Route::get('/exhibitions', function () {
            $exhibitions = Exhibition::query()
                ->orderByRaw('start_date IS NULL')
                ->orderBy('start_date', 'desc')
                ->orderBy('created_at', 'desc')->get();
            return view('exhibitions', compact('exhibitions'));
        })->name('exhibitions');

        // اخبار و مقالات
        Route::get('/news', [PostController::class, 'newsIndex'])->name('news.index');
        Route::get('/articles', [PostController::class, 'articlesIndex'])->name('articles.index');
        Route::get('/news/{slug}', [PostController::class, 'showNews'])->name('news.show');
        Route::get('/articles/{slug}', [PostController::class, 'showArticle'])->name('articles.show');

        // صفحات ثابت
        Route::get('/about', fn () => view('about'))->name('about');
        Route::get('/collaboration', fn () => view('collaboration'))->name('collaboration.show');
        Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact.show');

        // فرم‌ها
        Route::post('/contact-submit', [ContactController::class, 'store'])
            ->middleware('throttle:5,1')->name('contact.store');
        Route::post('/collaboration-submit', [CollaborationController::class, 'store'])
            ->middleware('throttle:3,1')->name('collaboration.store');

        // داشبورد مارکتینگ (محافظت‌شده)
        Route::get('/marketing-dashboard', [AdminDashboardController::class, 'index'])
            ->middleware(['auth'])->name('admin.dashboard');


    });


     Route::post('/chat/send', [\App\Http\Controllers\ChatBotController::class, 'sendMessage'])
    ->middleware('throttle:15,1'); // حداکثر 15 پیام در دقیقه