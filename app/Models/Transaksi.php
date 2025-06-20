<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis'; // ✅ Pastikan nama tabel sesuai
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false;
    protected $keyType = 'string';

    // ✅ Matikan timestamps agar Laravel tidak memasukkan created_at dan updated_at
    public $timestamps = false;

    protected $fillable = [
        'id_transaksi',
        'id_janjitemu',
        'tanggal_transaksi',
        'jumlah_produk',
        'harga',
    ];

    // Relasi ke janji temu
    public function janji_temu()
    {
        return $this->belongsTo(JanjiTemu::class, 'id_janjitemu');
    }
}
