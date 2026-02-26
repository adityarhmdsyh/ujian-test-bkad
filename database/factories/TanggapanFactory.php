<?php

namespace Database\Factories;
use App\Models\Laporan;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tanggapan>
 */
class TanggapanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'laporan_id' => Laporan::all()->random()->id,
        'user_id' => User::where('role', 'petugas')->get()->random()->id,
        'tanggapan' => fake()->sentence(),
        'tgl_tanggapan' => now(),
    ];
}
}
