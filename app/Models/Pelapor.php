<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelapor extends Model
{
    use HasFactory;
    protected $table = 'pelapors';
    protected $fillable = ['nik', 'nama', 'alamat'];

    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'pelapor_id');
    }
}
