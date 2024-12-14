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
        Schema::create('pembayarans', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_pelanggan')->nullable(); // Add foreign key reference to pelanggan
                $table->string('kode_pembayaran', 20);
                $table->string('metode_pembayaran', 30);
                $table->dateTime('waktu_pembayaran');
                $table->string('status_pembayaran', 35);
                $table->timestamps();
    
    
            });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
