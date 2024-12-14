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
        Schema::create('tabel_jadwal', function (Blueprint $table) {
            $table->id('jadwal_id');
            $table->unsignedBigInteger('kereta_id')->nullable(); 
            $table->dateTime('waktu_berangkat');
            $table->dateTime('waktu_tiba');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('kereta_id')
                  ->references('kereta_id')
                  ->on('tabel_kereta')
                  ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_jadwal');
    }
};
