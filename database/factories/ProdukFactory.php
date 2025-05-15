<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jenis' => $this->faker->randomElement(['Shampoo', 'Hair Mask', 'Serum Rambut']),
            'stok' => $this->faker->numberBetween(5, 20),
            'harga' => $this->faker->numberBetween(50000, 100000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
