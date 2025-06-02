<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_pelanggan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_pelanggan',
        'nama_pelanggan',
        'alamat_pelanggan',
        'jenis_kelamin',
        'nomor_telpon',
        'email',
    ];

    public function janji_temus()
    {
        return $this->hasMany(Janji_temu::class, 'id_pelanggan');
    }
}
