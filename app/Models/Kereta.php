<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kereta extends Model
{
    use HasFactory;

    protected $table = 'tabel_kereta';
    protected $primaryKey = 'kereta_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true; // Ubah ke false jika tidak menggunakan created_at dan updated_at

    protected $fillable = [
        'nama_kereta',
        'kapasitas',
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'kereta_id', 'kereta_id');
    }
}
