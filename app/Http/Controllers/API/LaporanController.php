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
}
