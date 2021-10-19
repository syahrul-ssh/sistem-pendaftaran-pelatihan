<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Jadwal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwals = Jadwal::all();
        $expired_daftar = Daftar::where('is_payed', 'like', "belum")
                ->where('created_at', '<', Carbon::now()->subDays(2))
                ->get();
        foreach ($expired_daftar as $expire) {
            $expire->delete();
        }
        $daftars = Daftar::orderBy('tanggal_pelatihan', 'asc')
                ->simplePaginate(5);
        return view('daftar.index', compact('daftars', 'jadwals'))
                ->with('i', (request()->input('page', 1)-1)*5);
        
    }
    public function indexFiltered(Request $request)
    {
        $jadwals = Jadwal::all();
        $keyword1 = $request->filter1;
        $keyword2 = $request->filter2;
        $keyword3 = $request->filter3;
        $daftars = Daftar::where('tanggal_pelatihan', 'like', "%" . $keyword1 . "%")
                ->where('is_payed', 'like', "%" . $keyword2 . "%")
                ->where('kode_unik', 'like', "%" . $keyword3 . "%")
                ->latest()
                ->simplePaginate(5);
        return view('daftar.filter', compact('daftars', 'jadwals', 'keyword1', 'keyword2', 'keyword3'))
                ->with('i', (request()->input('page', 1)-1)*5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $jadwals = Jadwal::all();
        // return view('daftar.create', compact('jadwals'))
        //         ->with('i', (request()->input('page', 1)-1)*10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pelatihan'=>'required',
            'sesi'=>'required',
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'nomor_hp'=>'required',
            'email'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'alamat'=>'required',
            'status'=>'required',
            'kode_unik'=>'required',
            'id_jadwal' =>'required'
        ]);

        $daftar = Daftar::create($request->all());

        return redirect()->route('tampil.pendaftar', $daftar->kode_unik)
                ->with('success', 'Selamat anda berhasil mendaftar!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Daftar $daftar)
    {
        $daftars = Daftar::latest();
        return view('daftar.show', compact('daftar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Daftar $daftar)
    {
        return view('daftar.edit', compact('daftar'));
    }

    public function updatePayed(Daftar $daftar)
    {
        //insert request dari form ke database
        $daftar = Daftar::find($daftar->id);
        $daftar->is_payed = 'bayar';
        $daftar->save();

        //riderict juka sukses
        return redirect()->route('daftar.index')->with('success', 'Jadwal berhasil diupdate!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daftar $daftar)
    {
        $request->validate([
            'tanggal_pelatihan'=>'required',
            'sesi'=>'required',
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'nomor_hp'=>'required',
            'email'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'alamat'=>'required',
            'status'=>'required',
            'instansi'=>'required',
            'kode_unik'=>'required',
            'id_jadwal' =>'required'
        ]);

        $daftar->update($request->all());

        return redirect()->route('tampil.pendaftar', $daftar->kode_unik)
                ->with('success', 'Selamat anda berhasil mengupdate data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daftar $daftar)
    {
        $daftar->delete();

        return redirect()->route('daftar.index')
                ->with('success', 'Data berhasil dihapus');
    }
}