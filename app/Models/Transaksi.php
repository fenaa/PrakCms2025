<?php

namespace App\Models;

class Transaksi
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'id_janji_temu' => 21,
                'tanggal' => '2025-05-01',
                'jumlah_produk' => 2,
                'harga' => 150000,
            ],
            [
                'id' => 2,
                'id_janji_temu' => 22,
                'tanggal' => '2025-05-02',
                'jumlah_produk' => 3,
                'harga' => 225000,
            ],
            [
                'id' => 3,
                'id_janji_temu' => 23,
                'tanggal' => '2025-05-03',
                'jumlah_produk' => 1,
                'harga' => 75000,
            ],
        ];
    }
}
