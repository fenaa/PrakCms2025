<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public static function all($columns = ['*'])
    {
        return [
            (object)[
                'id' => 1,
                'nama' => 'Chanyeol',
                'alamat' => 'Jakarta',
                'jenis_kelamin' => 'L',
                'nomor_telepon' => '08123456789',
                'email' => 'realcy@gmail.com'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Feyeolie',
                'alamat' => 'Bandung',
                'jenis_kelamin' => 'P',
                'nomor_telepon' => '08123456789',
                'email' => 'feyeol@gmail.com'
            ],
            (object)[
                'id' => 3,
                'nama' => 'Anesman',
                'alamat' => 'Yogyakarta',
                'jenis_kelamin' => 'L',
                'nomor_telepon' => '08234567890',
                'email' => 'bynes@gmail.com'
            ]
        ];
    }
}
