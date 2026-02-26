<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LaporanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'judul_laporan'  => $this->judul, 
            'kategori'       => $this->kategori->nama_kategori, 
            'tanggal'        => $this->tgl_laporan, 
            'status'         => $this->status, 
        ];
    }
}
