<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_pelatihan',
        'tanggal', 
        'jam_mulai',
        'jam_selesai',
        'sesi',
        'limit_peserta',
        'publish',
    ];

    /**
     * Get all of the daftar for the Jadwal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function daftar()
    {
        return $this->hasMany(Daftar::class);
    }
}