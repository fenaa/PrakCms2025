<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->string('id_karyawan', 20)->primary();
            $table->string('nama_karyawan', 100);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->integer('gaji_karyawan');
            $table->date('tanggal_bergabung');
            $table->string('nomor_telpon', 20);
            $table->string('email', 100);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
