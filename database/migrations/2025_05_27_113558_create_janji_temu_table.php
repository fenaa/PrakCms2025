<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('janji_temus', function (Blueprint $table) {
            $table->string('id_janjitemu', 20)->primary();
            $table->string('id_pelanggan', 20);
            $table->string('id_karyawan', 20);
            $table->string('id_produk', 20);
            $table->date('tanggal');
            $table->time('waktu');

            // Relasi
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggans')->onDelete('cascade');
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawans')->onDelete('cascade');
            $table->foreign('id_produk')->references('id_produk')->on('produks')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('janji_temus');
    }
};

