<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('product_analytics', function (Blueprint $table) {
        $table->id();
        // اتصال به جدول محصولات (در صورت حذف محصول، آمارش هم پاک می‌شود)
        $table->foreignId('product_id')->constrained()->onDelete('cascade');
        
        // نوع عملیات: view (بازدید)، download (دانلود کاتالوگ)، quote (درخواست فاکتور)
        $table->string('action', 30); 
        
        // زبانی که کاربر در آن لحظه استفاده می‌کرده (en, ru, tg)
        $table->string('locale', 10);
        
        // امنیت: ذخیره هش‌شده‌ی آی‌پی برای تشخیص رفتارهای تکراری بدون نقض حریم خصوصی
        $table->string('ip_hash', 64)->nullable();
        
        // ایندکس‌گذاری برای بالا رفتن سرعت لود نمودارها در آینده
        $table->index(['action', 'locale', 'created_at']);
        
        $table->timestamp('created_at')->useCurrent();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_analytics');
    }
};
