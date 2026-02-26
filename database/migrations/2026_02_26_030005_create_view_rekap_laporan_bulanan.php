<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    DB::statement("DROP VIEW IF EXISTS view_rekap_laporan_bulanan");

    DB::statement("
        CREATE VIEW view_rekap_laporan_bulanan AS
        SELECT 
            MONTH(tgl_laporan) AS bulan,
            YEAR(tgl_laporan) AS tahun,
            COUNT(*) AS jumlah_laporan_masuk,
            SUM(CASE WHEN status = 'Diproses' THEN 1 ELSE 0 END) AS jumlah_diproses,
            SUM(CASE WHEN status = 'Selesai' THEN 1 ELSE 0 END) AS jumlah_selesai,
            SUM(CASE WHEN status = 'Ditolak' THEN 1 ELSE 0 END) AS jumlah_ditolak
        FROM laporans 
        GROUP BY YEAR(tgl_laporan), MONTH(tgl_laporan)
    ");
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_rekap_laporan_bulanan');
    }
};
