<?php

namespace Database\Factories;
use App\Models\KategoriLaporan; 
use App\Models\Pelapor;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laporan>
 */
class LaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'kategori_id' => KategoriLaporan::all()->random()->id,
        'pelapor_id' => Pelapor::all()->random()->id,
        'judul' => fake()->sentence(4),
        'isi_laporan' => fake()->paragraph(),
        'tgl_laporan' => fake()->dateTimeBetween('-2 months', 'now'),
        'status' => fake()->randomElement(['Diajukan', 'Diproses', 'Selesai', 'Ditolak']),
        ];
}
}
