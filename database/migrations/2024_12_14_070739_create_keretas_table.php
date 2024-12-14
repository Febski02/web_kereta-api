<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tabel_kereta', function (Blueprint $table) {
            $table->id('kereta_id');
            $table->unsignedBigInteger('kapasitas');
            $table->string('nama_kereta');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tabel_kereta');
    }
};
