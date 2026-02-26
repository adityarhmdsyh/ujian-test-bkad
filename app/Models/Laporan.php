<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporans';
    protected $fillable = ['kategori_id', 'pelapor_id', 'judul', 'isi_laporan', 'tgl_laporan', 'status'];

    public function kategori()
    {
        return $this->belongsTo(KategoriLaporan::class, 'kategori_id');
    }

    public function pelapor()
    {
        return $this->belongsTo(Pelapor::class, 'pelapor_id');
    }

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'laporan_id');
    }
}
