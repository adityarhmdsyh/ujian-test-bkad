<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapController extends Controller
{
   public function index(Request $request)
    {
        $query = DB::table('view_rekap_laporan_bulanan');

        if ($request->bulan) { $query->where('bulan', $request->bulan); }
        if ($request->tahun) { $query->where('tahun', $request->tahun); }

        $rekap = $query->get();
        return view('admin.rekap.index', compact('rekap'));
    }

    public function cetak_pdf(Request $request)
{
    $query = Laporan::with(['pelapor', 'kategori']);

  if ($request->bulan) {
        $query->whereMonth('tgl_laporan', $request->bulan);
    }

   if ($request->tahun) {
        $query->whereYear('tgl_laporan', $request->tahun);
    }

    $laporan = $query->latest()->get();

   $pdf = Pdf::loadView('admin.rekap.pdf', compact('laporan'));
    $pdf->setPaper('a4', 'landscape');
    
    return $pdf->download('Data-Mentah-Laporan-'.date('Ymd').'.pdf');
}
}