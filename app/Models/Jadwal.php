<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'tabel_jadwal'; // Nama tabel di database
    protected $primaryKey = 'jadwal_id'; // Primary Key
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true; // Jika tidak pakai created_at & updated_at, set ke false

    protected $fillable = [
        'waktu_berangkat',
        'waktu_tiba',
    ];

    public function kereta()
    {
        return $this->belongsTo(Kereta::class, 'kereta_id', 'kereta_id');
    }

    // Relasi ke Tiket
    public function tikets()
    {
        return $this->hasMany(Tiket::class, 'jadwal_id', 'jadwal_id');
    }
}
