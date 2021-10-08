<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selesai extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pelatihan',
        'jenis_pelatihan',
        'sesi',
        'nama',
        'jenis_kelamin',
        'nomor_hp',
        'email',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'status',
        'instansi',
        'kode_unik',
        'id_jadwal',
    ];
}