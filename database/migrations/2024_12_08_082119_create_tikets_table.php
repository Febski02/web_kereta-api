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
            $table->id('tiket_id'); // Primary key
            $table->unsignedBigInteger('jadwal_kereta'); // Foreign key terkait jadwal kereta
            $table->unsignedBigInteger('stasiun_keberangkatan'); // Foreign key untuk stasiun keberangkatan
            $table->unsignedBigInteger('status_tujuan'); // Foreign key untuk status tujuan
            $table->integer('nomor_kursi'); // Nomor kursi
            $table->timestamps(); // Created at dan updated at timestamps

            // // Tambahkan foreign key constraints jika tabel terkait sudah ada
            // $table->foreign('jadwal_kereta')->references('id')->on('jadwals')->onDelete('cascade');
            // $table->foreign('stasiun_keberangkatan')->references('id')->on('stasiuns')->onDelete('cascade');
            // $table->foreign('status_tujuan')->references('id')->on('tujuans')->onDelete('cascade');
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
