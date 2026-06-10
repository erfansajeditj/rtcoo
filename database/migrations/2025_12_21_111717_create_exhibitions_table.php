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
        Schema::create('exhibitions', function (Blueprint $table) {
            $table->id();
            $table->string('title');                  // عنوان نمایشگاه
            $table->string('cover_image')->nullable();// عکس کاور
            $table->date('start_date')->nullable();   // تاریخ برگزاری
            $table->string('location')->nullable();   // محل برگزاری (مثلاً تهران، دبی)
            $table->text('description')->nullable();  // توضیحات
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibitions');
    }
};
