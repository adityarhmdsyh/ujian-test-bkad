<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pelapor;
use App\Models\ViewRekapLaporan;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_laporan' => Laporan::count(),
            'total_pelapor' => Pelapor::count(),
            'status_proses' => Laporan::where('status', 'Diproses')->count(),
            'status_selesai' => Laporan::where('status', 'Selesai')->count(),
        ];

        $rekapBulanan = ViewRekapLaporan::orderBy('tahun', 'desc')
                                        ->orderBy('bulan', 'desc')
                                        ->take(5)
                                        ->get();

        return view('admin.dashboard', compact('stats', 'rekapBulanan'));
    }
}