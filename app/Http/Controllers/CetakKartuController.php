<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Jadwal;
use App\Models\Pelatihan;
use App\Models\Tanggal;
use Illuminate\Http\Request;
use PDF;

class CetakKartuController extends Controller
{
    public function cetak(Daftar $daftar)
    {
        $pdf = PDF::loadview('cetak.pendaftaran_pdf', ['daftar'=>$daftar])
                ->setPaper([0,0,600,250]);
        return $pdf->download('cetak-pendaftaran.pdf');
    }
    public function cetakAbsen()
    {
        $daftar = Daftar::all();
        $pdf = PDF::loadview('cetak.absen_pdf', ['daftar'=>$daftar])
                ->setPaper('a4', 'landscape');
        return $pdf->download('cetak-absen.pdf');
    }
    public function cetakAbsenPerTanggal(Request $request)
    {
        $keyword1 = $request->filter1;
        $keyword2 = $request->filter2;
        $keyword3 = $request->filter3;
        $keyword4 = $request->filter4;
        $keyword5 = $request->filter5;
        $daftars = Daftar::where('tanggal_pelatihan', 'like', "%" . $keyword1 . "%")
            ->where('is_payed', 'like', "%" . $keyword2 . "%")
            ->where('sesi', 'like', "%" . $keyword3 . "%")
            ->where('jenis_pelatihan', 'like', "%" . $keyword4 . "%")
            ->where('kode_unik', 'like', "%" . $keyword5 . "%")
            ->latest()
            ->simplePaginate(100000);
        
        // $keyword = $request->filter2;
        // $daftar = Daftar::where('tanggal_pelatihan', 'like', "%" . $keyword . "%")->latest();
        // dd($daftar);
        $pdf = PDF::loadview('cetak.absen_pdf', ['daftar'=>$daftars])
                ->setPaper('a4', 'landscape');
        return $pdf->download('cetak-absen.pdf');
    }
}