<?php

namespace Database\Seeders;

use App\Models\KategoriLaporan;
use App\Models\Laporan;
use App\Models\Pelapor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tanggapan;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    User::create([
        'name' => 'Admin Bengkulu',
        'email' => 'admin@mail.com',
        'password' => bcrypt('password'),
        'role' => 'admin'
    ]);

    User::factory(3)->create(['role' => 'petugas']);

        $kategoris = ['Infrastruktur', 'Kesehatan', 'Pendidikan', 'Keamanan', 'Lingkungan'];
        foreach ($kategoris as $k) {
            KategoriLaporan::create([
        'nama_kategori' => $k
    ]);
}

    Pelapor::factory(20)->create();

    Laporan::factory(50)->create();

    Tanggapan::factory(30)->create();
}
}
