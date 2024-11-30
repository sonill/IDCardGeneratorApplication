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
        Schema::create('i_d_cards', function (Blueprint $table) {
            $table->id();
            $table->string('photo'); // Path to uploaded photo
            $table->string('name');
            $table->string('address');
            $table->date('dob'); // Date of birth
            $table->date('expiry_date'); // Card expiry date
            $table->string('contact_number');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i_d_cards');
    }
};
