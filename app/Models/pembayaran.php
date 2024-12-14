<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pembayaran extends Model
{
    protected $fillable = [
        'id_pelanggan',
        'kode_pembayaran',
        'metode_pembayaran',
        'waktu_pembayaran',
        'status_pembayaran',
    ];
    public function pendaftaran()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
}
