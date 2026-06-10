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
    Schema::create('collaborations', function (Blueprint $table) {
        $table->id();
        $table->string('company_name');   // Company Name
        $table->string('country_city');   // Country / City
        $table->string('contact_person'); // Contact Person
        $table->string('phone');          // Phone Number
        $table->string('email');          // Email Address
        $table->text('proposal');         // Business Proposal
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborations');
    }
};
