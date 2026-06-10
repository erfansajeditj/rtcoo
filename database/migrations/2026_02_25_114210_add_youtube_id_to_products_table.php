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
    Schema::table('products', function (Blueprint $table) {
        // این ستون رو می‌سازیم و nullable می‌ذاریم تا اگه محصولی ویدیو نداشت ارور نده
        $table->string('youtube_video_id')->nullable(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
