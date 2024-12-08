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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id('registrasi_id'); 
            $table->string('nama'); 
            $table->string('email')->unique(); 
            $table->string('nomor_identifikasi'); // Nomor identifikasi
            $table->string('nomor_telepon'); // Nomor telepon
            $table->timestamps(); // Created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
