<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jadwals = Jadwal::orderBy('tanggal', 'asc')
                ->orderBy('jenis_pelatihan', 'asc')
                ->orderBy('jam', 'asc')
                ->orderBy('sesi', 'asc')
                ->simplePaginate(20);
        $daftars = Daftar::all();
        //mengirim data ke view
        return view('home', compact('jadwals', 'daftars'))
                ->with('i', (request()->input('page', 1)-1)*20);
    }
    public function landing()
    {
        $jadwals = Jadwal::orderBy('tanggal', 'asc')
                ->orderBy('jenis_pelatihan', 'asc')
                ->orderBy('jam', 'asc')
                ->orderBy('sesi', 'asc')
                ->simplePaginate(20);
        $daftars = Daftar::all();
        //mengirim data ke view
        return view('welcome', compact('jadwals', 'daftars'))
                ->with('i', (request()->input('page', 1)-1)*20);
    }
}