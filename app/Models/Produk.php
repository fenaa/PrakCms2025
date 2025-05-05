<?php

namespace App\Models;

class Produk
{
    public static function all()
    {
        return [
            [
                'id' => 123,
                'jenis' => 'Shampoo',
                'stok' => 10,
                'harga' => 50000,
            ],
            [
                'id' => 124,
                'jenis' => 'Hair Mask',
                'stok' => 5,
                'harga' => 75000,
            ],
            [
                'id' => 125,
                'jenis' => 'Serum Rambut',
                'stok' => 7,
                'harga' => 90000,
            ],
        ];
    }
}
