<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->bigIncrements('tiket_id');
            $table->unsignedBigInteger('jadwal_kereta')->nullable(); // Foreign key for jadwal_kereta
            $table->unsignedBigInteger('kereta_id')->nullable(); // Foreign key for kereta_id
            $table->decimal('harga', 15, 2); // Add harga column to store the price of the ticket
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
