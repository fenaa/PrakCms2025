<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_transaksi',
        'id_janjitemu',
        'tanggal_transaksi',
        'jumlah_produk',
        'harga',
    ];

    public function janji_temu()
    {
        return $this->belongsTo(JanjiTemu::class, 'id_janjitemu');
    }
}
