<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
                ->orderBy('sesi', 'asc')
                ->orderBy('jam_mulai', 'asc')
                ->simplePaginate(10000);
        $expired_jadwal = Jadwal::where('tanggal', '<', Carbon::now())
                ->update(['publish' => 'Tidak']);
        $daftars = Daftar::all();
        //mengirim data ke view
        return view('home', compact('jadwals', 'daftars'))
                ->with('i', (request()->input('page', 1)-1)*10000);
    }
    
}