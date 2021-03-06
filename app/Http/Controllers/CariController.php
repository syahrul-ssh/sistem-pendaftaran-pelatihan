<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Selesai;
use Illuminate\Http\Request;

class CariController extends Controller
{
    public function show(Daftar $daftar)
    {
        return view('daftar.show', compact('daftar'));
    }

    public function search()
    {
        return view('daftar.search');
    }

    public function find(Request $request)
    {
        $keyword = $request->search;
        $daftar = Daftar::where('kode_unik', 'like', "%" . $keyword . "%")->first();
        if ($daftar != null) {
            return view('daftar.result', compact('daftar'));
        }
        return view('daftar.notFound');
    }
}