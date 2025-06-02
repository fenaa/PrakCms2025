<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->string('id_transaksi', 20)->primary();
            $table->string('id_janjitemu', 20);
            $table->date('tanggal_transaksi');
            $table->integer('jumlah_produk');
            $table->integer('harga');

            $table->foreign('id_janjitemu')->references('id_janjitemu')->on('janji_temus')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
