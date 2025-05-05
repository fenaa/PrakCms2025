<?php

use Database\Seeders\PelangganSeeder;
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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('telepon');
            $table->string('email');
            $table->timestamps();
        });

        $this->callseeder();
    }

    private function callseeder(): void
    {
        (new PelangganSeeder)->run();
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
