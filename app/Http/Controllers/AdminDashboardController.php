<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductAnalytic;
use App\Models\Product;

class AdminDashboardController extends Controller
{



public function index()
    {
        // گرفتن خامِ آمار برای جمع زدن دستی
        $rawFunnel = ProductAnalytic::selectRaw("action, COUNT(*) as total")->groupBy('action')->pluck('total', 'action');

        // ۱. قیف تبدیل سرنخ (جمع زدن تمام فاکتورهای قدیمی و جدید)
        $funnelData = [
            'view' => $rawFunnel['view'] ?? 0,
            'download' => $rawFunnel['download'] ?? 0,
            'quote' => ($rawFunnel['quote'] ?? 0) + ($rawFunnel['quote_product'] ?? 0) + ($rawFunnel['quote_contact'] ?? 0),
        ];

        $localeDemand = ProductAnalytic::join('products', 'product_analytics.product_id', '=', 'products.id')
            ->selectRaw("product_analytics.locale, products.category, COUNT(*) as total")
            ->groupBy('product_analytics.locale', 'products.category')
            ->orderBy('total', 'desc')
            ->get();

        $highIntentUsers = ProductAnalytic::selectRaw("ip_hash, product_id, COUNT(*) as actions_count")
            ->where('created_at', '>=', now()->subDays(2))
            ->groupBy('ip_hash', 'product_id')
            ->havingRaw("COUNT(*) >= 5")
            ->with('product:id,name')
            ->get();

        $views = $funnelData['view'];
        $downloads = $funnelData['download'];
        $engagementRate = $views > 0 ? round(($downloads / $views) * 100, 1) : 0;

        $seasonality = ProductAnalytic::whereIn('action', ['quote', 'quote_product', 'quote_contact'])
            ->selectRaw("MONTH(created_at) as month, COUNT(*) as total")
            ->groupByRaw("MONTH(created_at)")
            ->orderBy('month')
            ->pluck('total', 'month');

        // ۶. استخراج ریزِ آمار با تفکیکِ منبعِ فاکتور
        $allProductStats = Product::where('is_active', true)
            ->withCount([
                'analytics as views_count' => function ($query) { $query->where('action', 'view'); },
                'analytics as downloads_count' => function ($query) { $query->where('action', 'download'); },
                'analytics as quotes_count' => function ($query) { 
                    $query->whereIn('action', ['quote', 'quote_product', 'quote_contact']); 
                },
                // شمارشِ اختصاصیِ منابع برای نمایش در جدول
                'analytics as quote_product_count' => function ($query) { $query->where('action', 'quote_product'); },
                'analytics as quote_contact_count' => function ($query) { $query->where('action', 'quote_contact'); },
            ])
            ->orderBy('views_count', 'desc')
            ->get();

        return view('admin.dashboard', compact(
            'funnelData', 'localeDemand', 'highIntentUsers', 'engagementRate', 'seasonality', 'allProductStats'
        ));
    }



}