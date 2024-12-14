<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tiket extends Model
{
    use HasFactory;

    protected $primaryKey = 'tiket_id'; // Atur primary key jika tidak default (id)
    protected $fillable = [
        'jadwal_kereta',
        'stasiun_keberangkatan',
        'jumlah_tiket',
        'tanggal_pembayaran',
        'total_bayar',
        'metode_pembayaran',
      
    ];

    public function kereta()
    {
        return $this->belongsTo(Kereta::class, 'kereta_id');
    }

    public function jadwal() { return $this->belongsTo(Jadwal::class, 'jadwal_id'); }
}

