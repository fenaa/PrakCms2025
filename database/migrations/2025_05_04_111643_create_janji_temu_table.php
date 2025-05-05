<?php

use Database\Seeders\Janji_temuSeeder;
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
        Schema::create('janji_temu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_karyawan');
            $table->unsignedBigInteger('id_produk');
            $table->time('waktu');
            $table->date('tanggal');
            $table->string('status');
            $table->timestamps();
        });

        $this->callseeder();
     }

     private function callseeder(): void
    {
        (new Janji_temuSeeder)->run();
    }

    public function down(): void
    {
        Schema::dropIfExists('janji_temu');
    }
};
