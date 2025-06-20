<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JanjiTemu extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_janjitemu';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'janji_temus';

    protected $fillable = [
        'id_janjitemu',
        'id_pelanggan',
        'id_karyawan',
        'id_produk',
        'tanggal',
        'waktu',
    ];

    // Tidak perlu accessor/mutator untuk tanggal maupun waktu

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id_janjitemu');
    }
}
