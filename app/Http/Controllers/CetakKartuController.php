<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use PDF;

class CetakKartuController extends Controller
{
    public function cetak(Daftar $daftar)
    {
        $pdf = PDF::loadview('cetak.pendaftaran_pdf', ['daftar'=>$daftar])
                ->setPaper([0,0,300,162]);
        return $pdf->download('cetak-pendaftaran.pdf');
    }
    public function cetakAbsen()
    {
        $daftar = Daftar::all();
        $pdf = PDF::loadview('cetak.absen_pdf', ['daftar'=>$daftar])
                ->setPaper('a4', 'landscape');
        return $pdf->download('cetak-absen.pdf');
    }
    public function cetakAbsenPerTanggal($keyword1)
    {
        $daftar = Daftar::where('tanggal_pelatihan', 'like', "%" . $keyword1 . "%")
                ->latest()
                ->simplePaginate(100000);
        // dd($daftars);
        
        // $keyword = $request->filter2;
        // $daftar = Daftar::where('tanggal_pelatihan', 'like', "%" . $keyword . "%")->latest();
        // dd($daftar);
        $pdf = PDF::loadview('cetak.absen_pdf', ['daftar'=>$daftar])
                ->setPaper('a4', 'landscape');
        return $pdf->download('cetak-absen.pdf');
    }
}