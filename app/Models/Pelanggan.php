<?php

namespace App\Models;

class Pelanggan
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'nama' => 'Chanyeol',
                'alamat' => 'Jakarta',
                'jenis_kelamin' => 'L',
                'telepon' => '08123456789',
                'email' => 'realcy@gmail.com',
            ],
            [
                'id' => 2,
                'nama' => 'Feyeolie',
                'alamat' => 'Bandung',
                'jenis_kelamin' => 'P',
                'telepon' => '08123456789',
                'email' => 'feyeol@gmail.com',
            ],
            [
                'id' => 3,
                'nama' => 'Anesman',
                'alamat' => 'Yogyakarta',
                'jenis_kelamin' => 'L',
                'telepon' => '08234567890',
                'email' => 'bynes@gmail.com',
            ],
        ];
    }
}
