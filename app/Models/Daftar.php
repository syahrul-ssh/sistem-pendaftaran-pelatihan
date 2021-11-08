<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\DaftarFilter;

class Daftar extends Model
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
            'jam_mulai',
            'jam_selesai',
    ];


    /**
     * Get the jadwal that owns the Daftar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}