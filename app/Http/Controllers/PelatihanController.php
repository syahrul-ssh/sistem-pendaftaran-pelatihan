<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelatihans = Pelatihan::latest()->simplePaginate(5);

        return view('pelatihan.index', compact('pelatihans'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelatihan.create');
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
            'jenis_pelatihan'=>'required',
        ]);

        //insert request dari form ke database
        Pelatihan::create($request->all());

        //riderict juka sukses
        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelatihan $pelatihan)
    {
        return view('pelatihan.edit', compact('pelatihan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelatihan $pelatihan)
    {
        //membuat validasi untuk isian
        $request->validate([
            'jenis_pelatihan'=>'required',
        ]);

        //insert request dari form ke database
        $pelatihan->update($request->all());

        //riderict juka sukses
        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelatihan $pelatihan)
    {
        $pelatihan->delete();

        return redirect()->route('pelatihan.index')
                ->with('success', 'Peltihan Berhasil dihapus!');
    }
}