<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landing()
    {
        $jadwals = Jadwal::orderBy('tanggal', 'asc')
                ->orderBy('jenis_pelatihan', 'asc')
                ->orderBy('jam_mulai', 'asc')
                ->orderBy('sesi', 'asc')
                ->simplePaginate(10000);
        $daftars = Daftar::all();
        $expired_jadwal = Jadwal::where('tanggal', '<=', date('Y-m-d'))
                ->update(['publish' => 'Tidak']);
        //mengirim data ke view
        return view('welcome', compact('jadwals', 'daftars'))
                ->with('i', (request()->input('page', 1)-1)*10000);
    }
}