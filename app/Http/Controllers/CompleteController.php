<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Selesai;
use Illuminate\Http\Request;
use PDF;

class CompleteController extends Controller
{
    public function getData(Daftar $daftar)
    {
        $newRecord = $daftar->replicate();
        $newRecord->setTable('selesais');
        $newRecord->save();
    
        $daftar->delete();
    
        return redirect()->route('daftar.index')
                ->with('success', 'Data berhasil dipindahkan');
    }
    
    public function index()
    {
        $selesais = Selesai::latest()->simplePaginate(10);
        return view('selesai.index', compact('selesais'))
                ->with('i', (request()->input('page', 1)-1)*5);
    }
    
    public function destroy(Selesai $selesai)
    {
        $selesai->delete();

        return redirect()->route('selesai.index')
                ->with('success', 'Data berhasil dihapus');
    }
}