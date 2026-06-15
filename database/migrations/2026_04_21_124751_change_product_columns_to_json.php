<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // ۱. چشم‌های دیتابیس رو می‌بندیم (قوانین کلید خارجی خاموش)
        Schema::disableForeignKeyConstraints();

        // ۲. حالا با خیال راحت جدول رو جارو می‌کشیم
        DB::table('products')->truncate();

        // ۳. چشم‌های دیتابیس رو دوباره باز می‌کنیم
        Schema::enableForeignKeyConstraints();

        // ۴. حالا ستون‌ها رو به جیسون تبدیل می‌کنیم
        Schema::table('products', function (Blueprint $table) {
            $table->json('name')->change();
            $table->json('category')->change();
            $table->json('description')->change();
            $table->json('specs')->change();
        });

        // ابتدا unique index روی slug را حذف می‌کنیم، سپس به JSON تبدیل می‌کنیم
        DB::statement('ALTER TABLE products DROP INDEX products_slug_unique');
        DB::statement('ALTER TABLE products MODIFY slug JSON');
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name')->change();
            $table->string('slug')->change();
            $table->string('category')->change();
            $table->text('description')->change();
            $table->text('specs')->change();
        });
    }
};