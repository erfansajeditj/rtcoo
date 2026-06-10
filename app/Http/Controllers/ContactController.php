<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {


     if ($request->filled('website')) {
        return back()->with('success', 'Your message has been sent successfully. We will contact you soon!');
    }
        // ۱. اعتبارسنجی اطلاعات فرم (product_id به عنوان فیلد اختیاری اضافه شد)
        // ۱. اعتبارسنجی اطلاعات فرم (شرکت قانون exists حذف و ساده‌تر شد)
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'product_id' => 'nullable|numeric' // <--- اینجا رو فقط بذار عددی باشه تا به دیتابیس SQL Server گیر نده
        ]);

       // ۲. جادوی مارکتینگ: ثبت تو داشبورد با تفکیک منبع
        if ($request->subject === 'request_quote' && $request->product_id) {
            // خوندن منبع از فرم (اگر نبود همون پیش‌فرض رو بذار)
            $actionSource = $request->source ?? 'quote_contact';
            \App\Helpers\Tracker::log($request->product_id, $actionSource);
            
            $productName = \App\Models\Product::find($request->product_id)->name ?? 'نامشخص';
            $validated['content'] = "درخواست پیش‌فاکتور برای دستگاه: " . $productName . "\n\nتوضیحات مشتری: " . $validated['content'];
        }



        // ۳. ذخیره پیام در دیتابیس
        // فقط فیلدهای اصلی رو می‌دیم به دیتابیس تا ارور Column not found نده
        $newMessage = Message::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'subject' => $validated['subject'],
            'content' => $validated['content'],
        ]);

        // ۴. ارسال ایمیل نوتیفیکیشن
$adminEmail = config('mail.admin_email');
        Mail::send('emails.admin_notification', ['msg' => $newMessage], function($mail) use ($adminEmail, $newMessage) {
            $mail->to($adminEmail)
                 ->replyTo($newMessage->email, $newMessage->full_name) 
                 ->subject('پیام جدید از سایت: ' . $newMessage->subject);
        });

        // ۵. برگشت به صفحه با پیام موفقیت
        return back()->with('success', 'Your message has been sent successfully. We will contact you soon!');
    }








    public function showContactForm()
    {
        $locale = app()->getLocale();
        $allProducts = \App\Models\Product::where('is_active', true)->get()->map(function ($product) use ($locale) {
            $name = is_array($product->name) ? ($product->name[$locale] ?? $product->name['en'] ?? 'Unknown') : $product->name;
            $category = is_array($product->category) ? ($product->category[$locale] ?? $product->category['en'] ?? 'Unknown') : $product->category;
            return ['id' => $product->id, 'name' => $name, 'category' => $category];
        })->values();

        // جادوی تشخیص مبدأ کاربر: آیا از صفحه محصولات اومده یا نه؟
        $referer = request()->headers->get('referer');
// خواندن قطعی منبع از لینک (اگر نبود، پیش‌فرض میشه تماس مستقیم)
        $source = request('source', 'quote_contact');
        
        return view('contact', compact('allProducts', 'source'));
    }




}