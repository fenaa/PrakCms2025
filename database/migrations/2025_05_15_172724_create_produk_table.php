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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->integer('stok');
            $table->integer('harga');
            $table->timestamps();
        });

        // Panggil seeder ProdukSeeder setelah tabel produk dibuat
        \Artisan::call('db:seed', [
            '--class' => 'ProdukSeeder',
            '--force' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
