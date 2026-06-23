<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // ثبت بادیگارد (Middleware) برای تغییر زبان سایت
        $middleware->web(append: [
            \App\Http\Middleware\LanguageManager::class,
        ]);

        // درخواست‌های API به جای ریدایرکت به صفحه لاگین، پاسخ 401 می‌گیرند.
        // برگرداندن null یعنی «ریدایرکت نکن» تا Authenticate خطای 401 پرتاب کند.
        $middleware->redirectGuestsTo(
            fn (Request $request) => $request->is('api/*')
                ? null
                : route('home', ['locale' => 'en'])
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // هر درخواست api/ که احراز هویت نشده باشد، پاسخ JSON با کد 401 می‌گیرد.
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthenticated.',
                ], 401);
            }
        });
    })->create();