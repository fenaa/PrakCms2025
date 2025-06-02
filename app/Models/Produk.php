<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_produk';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_produk',
        'jenis_produk',
        'stok_produk',
        'harga_produk',
    ];

    public function janji_temus()
    {
        return $this->hasMany(Janji_temu::class, 'id_produk');
    }
}
