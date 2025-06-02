<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->string('id_produk', 20)->primary();
            $table->string('jenis_produk', 100);
            $table->integer('stok_produk');
            $table->integer('harga_produk');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
