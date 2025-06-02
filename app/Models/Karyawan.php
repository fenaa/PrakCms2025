<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_karyawan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_karyawan',
        'nama_karyawan',
        'jenis_kelamin',
        'gaji_karyawan',
        'tanggal_bergabung',
        'nomor_telpon',
        'email',
    ];

    public function janji_temus()
    {
        return $this->hasMany(Janji_temu::class, 'id_karyawan');
    }
}
