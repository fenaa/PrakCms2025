<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['nama', 'alamat', 'jenis_kelamin', 'nomor_telepon', 'email'];
    public $timestamps = false; 
}

