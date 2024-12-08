<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pembayaran extends Model
{
    protected $fillable = [
        'registrasi_id',
        'kode_pembayaran',
        'metode_pembayaran',
        'waktu_pembayaran',
        'status_pembayaran',
    ];
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'registrasi_id');
    }
}
