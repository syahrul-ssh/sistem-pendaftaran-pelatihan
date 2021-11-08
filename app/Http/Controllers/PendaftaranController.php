<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        //mengambil data dari tabel jadwals
        $jadwals = Jadwal::orderBy('tanggal', 'asc')
                ->orderBy('jenis_pelatihan', 'asc')
                ->orderBy('sesi', 'asc')
                ->orderBy('jam_mulai', 'asc')
                ->simplePaginate(10000);
        $daftars = Daftar::all();
        //mengirim data ke view
        return view('pendaftaran.index', compact('jadwals', 'daftars'))
                ->with('i', (request()->input('page', 1)-1)*10000);
    }

    public function create(Jadwal $jadwal)
    {
        return view('daftar.create', compact('jadwal'))
                ->with('i', (request()->input('page', 1)-1)*10);
    }
}