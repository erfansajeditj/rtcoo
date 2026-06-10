<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LanguageManager
{
    public function handle(Request $request, Closure $next)
    {
        $allowed = ['en', 'tg', 'ru'];
        $locale = $request->route('locale');

        if (! in_array($locale, $allowed)) {
            $locale = config('app.locale', 'en');
        }

        app()->setLocale($locale);

        // 🪄 جادو: همه‌ی route() ها از این به بعد خودکار پیشوند زبان می‌گیرن
        URL::defaults(['locale' => $locale]);

        // locale رو از پارامترها حذف می‌کنیم تا اشتباهی به کنترلر پاس داده نشه
        if ($request->route()) {
            $request->route()->forgetParameter('locale');
        }

        return $next($request);
    }
}