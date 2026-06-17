<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
   public function index()
    {
        // ۱. نمایش همه محصولات فعال و دسته‌بندی آن‌ها بر اساس زبان فعلی سیستم
        $products = Product::where('is_active', true)->get()->groupBy(function ($product) {
            return $product->category; 
        });

        // گرفتن لیست دسته‌بندی‌ها برای منوی فیلتر
        $categories = Product::where('is_active', true)->pluck('category')->unique()->filter();

        return view('products', compact('products', 'categories'));
    }

    public function category($category)
    {
        $locale = app()->getLocale();

        // ۱. گرفتن دوباره لیست دسته‌بندی‌ها (برای اینکه منوی بالا غیب نشه)
        $categories = Product::where('is_active', true)->pluck('category')->unique()->filter();

        // ۲. جستجوی محصولات بر اساس دسته‌بندی در زبان فعلی (JSON Query)
        $queryProducts = Product::where("category->{$locale}", $category)
            ->where('is_active', true)
            ->get();

        // ۳. شانس مجدد: اگه تو زبان فعلی نبود، تو انگلیسی بگرد
        if ($queryProducts->isEmpty()) {
            $queryProducts = Product::where("category->en", $category)
                ->where('is_active', true)
                ->get();
        }

        // ۴. تبدیل خروجی به حالت گروه‌بندی شده برای اینکه قالب بلید کرش نکنه
        $products = $queryProducts->groupBy(function ($product) {
            return $product->category;
        });

        // مقدار دسته‌بندی فعلی برای رنگی موندن دکمه فیلتر
        $currentCategory = $category;

        return view('products', compact('products', 'categories', 'currentCategory'));
    }





    public function show($slug)
    {
        $product = Product::where(function ($q) use ($slug) {
            $q->where('slug->en', $slug)
              ->orWhere('slug->ru', $slug)
              ->orWhere('slug->tg', $slug);
        })->where('is_active', true)->first();

        if (!$product) {
            abort(404);
        }

        \App\Helpers\Tracker::log($product->id, 'view');

        return view('product-show', compact('product'));
    }

    

public function downloadCatalog($id)
    {
        $product = Product::findOrFail($id);

        if (!$product->catalog_file) {
            abort(404, 'Catalog not found');
        }

        // ۱. اول دانلود رو تو دیتابیس ثبت می‌کنیم
        \App\Helpers\Tracker::log($product->id, 'download');

        // ۲. بعد فایل رو میدیم کاربر دانلود کنه
        $filePath = storage_path('app/public/' . $product->catalog_file);

    if (!file_exists($filePath)) {
        abort(404, 'Catalog not found');
    }

    return response()->download($filePath);

    
    }


}