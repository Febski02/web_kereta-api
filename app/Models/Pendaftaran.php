<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    //use HasFactory;

    protected $table = 'pendaftarans';

    protected $primaryKey = 'registrasi_id';

    protected $fillable = [
        'nama',
        'email',
        'nomor_identifikasi',
        'nomor_telepon',
    ];
}
