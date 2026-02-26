<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewRekapLaporan extends Model
{
    protected $table = 'view_rekap_laporan_bulanan';

    public $incrementing = false;
    protected $primaryKey = null;

    public $timestamps = false;
}