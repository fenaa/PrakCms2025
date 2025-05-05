<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
                'nama' => $this->faker->name(),
                'jenis_kelamin' => $this->faker->randomElement(['L', 'P']), 
                'telepon' => $this->faker->phoneNumber(),
                'email' => $this->faker->unique()->safeEmail(), 
                'gaji' => $this->faker->numberBetween(3000000, 10000000), 
                'tanggal_gabung' => $this->faker->date(), 
                'created_at' => now(),
                'updated_at' => now(), 
            ];
            
        
    }
}
