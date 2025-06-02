<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->string('id_pelanggan', 20)->primary();
            $table->string('nama_pelanggan', 100);
            $table->string('alamat_pelanggan', 255);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('nomor_telpon', 20);
            $table->string('email', 100);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
