<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    // Mutator untuk menyimpan tanggal dalam format Y-m-d
    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = Carbon::parse($value)->format('Y-m-d');
    }

    // Accessor untuk menampilkan tanggal dengan format d-M-Y
    public function getTanggalAttribute($value)
    {
        return Carbon::parse($value)->format('d-M-Y');
    }

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
