<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            KaryawanSeeder::class,
            ProdukSeeder::class,
            PelangganSeeder::class,
            TransaksiSeeder::class,
            JanjiTemuSeeder::class,
        ]);
    }
}
