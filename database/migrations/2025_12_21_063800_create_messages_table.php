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
        Schema::dropIfExists('messages');

        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            
            $table->string('subject'); // 👈 این خط را اضافه کن
            
            $table->text('content');

            $table->text('admin_reply')->nullable(); // پاسخ ادمین
        $table->boolean('is_replied')->default(false);
            $table->timestamps();
        });
    } 




/**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
