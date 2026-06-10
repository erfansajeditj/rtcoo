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
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('slug')->unique();
    $table->string('category');
    $table->text('description')->nullable();
    $table->decimal('price', 15, 2)->nullable(); // 👈 اضافه شد برای پاسخگویی چت‌بات
    $table->string('image')->nullable();
    $table->string('catalog_file')->nullable();
    $table->text('specs')->nullable();           // 👈 مشخصات فنی (بسیار مهم)
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});


    }    
    
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
