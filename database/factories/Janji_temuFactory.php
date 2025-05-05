<?php

namespace Database\Factories;

use App\Models\Janji_temu;
use Illuminate\Database\Eloquent\Factories\Factory;

class Janji_TemuFactory extends Factory
{
    protected $model = Janji_temu::class;

    public function definition(): array
    {
        return [
            'id_pelanggan' => 1,
            'id_karyawan' => 1,
            'id_produk' => 1,
            'waktu' => $this->faker->time(), 
            'tanggal' => $this->faker->date(),
            'status' => $this->faker->randomElement(['Menunggu', 'Selesai', 'Batal']),
        ];
    }
}
