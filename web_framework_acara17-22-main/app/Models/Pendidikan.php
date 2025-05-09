<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'pendidikan'; // Nama tabel di database

    protected $fillable = [
        'nama', 'tingkatan', 'tahun_masuk', 'tahun_keluar'
    ];
}
