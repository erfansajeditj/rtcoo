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
    Schema::create('product_prices', function (Blueprint $table) {
        $table->id();
        $table->foreignId('product_id')->constrained()->cascadeOnDelete();

        $table->string('region')->nullable();           // Tajikistan / UAE / Global
        $table->string('currency', 10)->default('USD'); // USD / TJS
        $table->decimal('price_from', 12, 2)->nullable();
        $table->decimal('price_to', 12, 2)->nullable();

        $table->string('incoterms')->nullable();        // EXW / FOB / CIF
        $table->boolean('is_public')->default(false);   // اجازه گفتن عدد؟
        $table->text('note')->nullable();

        $table->timestamps();

        $table->index(['product_id', 'region', 'is_public']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_prices');
    }
};
