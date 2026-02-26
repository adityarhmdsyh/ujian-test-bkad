<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_laporans')->onDelete('cascade');
            $table->foreignId('pelapor_id')->constrained('pelapors')->onDelete('cascade');
            $table->string('judul');
            $table->text('isi_laporan');
            $table->date('tgl_laporan')->index(); 
            $table->enum('status', ['Diajukan', 'Diproses', 'Selesai', 'Ditolak'])->default('Diajukan')->index();
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
