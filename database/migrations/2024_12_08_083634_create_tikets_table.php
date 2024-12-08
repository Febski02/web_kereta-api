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
            $table->bigIncrements('tiket_id'); // Kolom ID otomatis
            $table->string('jadwal_kereta'); // Kolom untuk jadwal kereta (tipe string)
            $table->string('stasiun_keberangkatan'); // Kolom untuk stasiun keberangkatan (tipe string)
            $table->string('status_tujuan'); // Kolom untuk status tujuan (tipe string)
            $table->string('nomor_kursi'); // Kolom untuk nomor kursi (tipe string)
            $table->timestamps(); // Kolom untuk created_at dan updated_at
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
