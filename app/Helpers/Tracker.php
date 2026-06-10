<?php

namespace App\Helpers;

use App\Models\ProductAnalytic;

class Tracker
{
    public static function log(int $productId, string $action): void
    {
        // ۱. جلوگیری از ثبت اسپمِ بازدیدهای تکراری
        if ($action === 'view') {
            $sessionKey = "viewed_product_{$productId}";
            if (session()->has($sessionKey)) {
                return;
            }
            session()->put($sessionKey, true);
        }

   
       // ۲. نگهبانِ ضد دابل‌کلیک (پشتیبانی از تفکیک منابع)
        if (in_array($action, ['quote', 'quote_product', 'quote_contact'])) {
            $sessionKey = "quoted_product_{$productId}";
            if (session()->has($sessionKey)) {
                return; 
            }
            session()->put($sessionKey, true);
        }

        // ۳. امنیت حریم خصوصی: هش کردن آی‌پی کاربر
        $ipHash = request()->ip() ? hash('sha256', request()->ip()) : null;

        // ۴. ثبت نهایی و ایمن در دیتابیس
        ProductAnalytic::create([
            'product_id' => $productId,
            'action'     => $action, // view, download, quote
            'locale'     => app()->getLocale(),
            'ip_hash'    => $ipHash,
        ]);
    }
}