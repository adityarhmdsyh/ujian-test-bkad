<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LaporanResource;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
   public function index()
    {
        $laporans = Laporan::with('kategori')->get();

        return LaporanResource::collection($laporans);
    }

    public function show($id)
{
    $laporan = Laporan::with([
        'kategori', 'pelapor:id,nama', 'tanggapan.user:id,name'
    ])->findOrFail($id);

    return response()->json([
        'status' => 'success',
        'message' => 'Detail Laporan Berhasil Diambil',
        'data' => $laporan
    ], 200);

    
}
}
