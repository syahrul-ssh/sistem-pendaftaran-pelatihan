<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Pelatihan;
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
        $jadwals = Jadwal::orderBy('tanggal', 'asc')
                ->orderBy('jam', 'asc')
                ->orderBy('sesi', 'asc')
                ->simplePaginate(5);;
        //mengirim data ke view
        return view('jadwal.index', compact('jadwals'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
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
            'jam'=>'required',
            'sesi' => 'required',
            'limit_peserta' => 'required'
        ]);

        //insert request dari form ke database
        Jadwal::create($request->all());

        //riderict juka sukses
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
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
            'jam'=>'required',
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