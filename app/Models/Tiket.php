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
        'status_tujuan',
        'nomor_kursi',
    ];


    //  // Definisikan relasi ke tabel lainnya jika diperlukan
    //  public function jadwalKereta()
    //  {
    //      return $this->belongsTo(Jadwal::class, 'jadwal_kereta');
    //  }
 
    //  public function stasiunKeberangkatan()
    //  {
    //      return $this->belongsTo(Stasiun::class, 'stasiun_keberangkatan');
    //  }
 
    //  public function statusTujuan()
    //  {
    //      return $this->belongsTo(Tujuan::class, 'status_tujuan');
    //  }
}

