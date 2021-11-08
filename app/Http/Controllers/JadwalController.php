<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Pelatihan;
use App\Models\Tanggal;
use Carbon\Carbon;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil data dari tabel jadwals
        $jadwals = Jadwal::orderBy('tanggal', 'desc')
                ->orderBy('jam_mulai', 'desc')
                ->orderBy('sesi', 'asc')
                ->simplePaginate(20);
        $expired_jadwal = Jadwal::where('tanggal', '<=', date('Y-m-d'))
                ->update(['publish' => 'Tidak']);
        //mengirim data ke view
        return view('jadwal.index', compact('jadwals'))
                ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function publish(Jadwal $jadwal)
    {
        //insert request dari form ke database
        $jadwal = Jadwal::find($jadwal->id);
        if ($jadwal->publish == 'Tidak') {
            $jadwal->publish = 'Ya';
            $jadwal->save();
        } else {
            $jadwal->publish = 'Tidak';
            $jadwal->save();
        }

        //riderict juka sukses
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menampilkan halaman tambah
        $pelatihans = Pelatihan::all();
        return view('jadwal.create', compact('pelatihans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //membuat validasi untuk isian
        $request->validate([
            'jenis_pelatihan' => 'required',
            'tanggal'=>'required',
            'jam_mulai'=>'required',
            'jam_selesai'=>'required',
            'sesi' => 'required',
            'limit_peserta' => 'required'
        ]);

        //insert request dari form ke database
        Jadwal::create($request->all());

        $check = Tanggal::where('tanggal', $request->tanggal)->first();
        if ($check != null) {
            return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
        } else {
            Tanggal::create(['tanggal'=>$request->tanggal]);
            return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        $pelatihans = Pelatihan::all();
        return view('jadwal.edit', compact('jadwal', 'pelatihans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //membuat validasi untuk isian
        $request->validate([
            'jenis_pelatihan' => 'required',
            'tanggal'=>'required',
            'jam_mulai'=>'required',
            'jam_selesai'=>'required',
            'sesi' => 'required',
            'limit_peserta' => 'required'
        ]);

        //insert request dari form ke database
        $jadwal->update($request->all());

        //riderict juka sukses
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('jadwal.index')
                ->with('success', 'Jadwal Berhasil dihapus!');
    }
}