<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Janji_temu extends Model
{
    use HasFactory;

    public static function getAll()
    {
        return Janji_temu::all();
    }

    public static function find($id)
    {
        return Janji_temu::where('id', $id)->first();
    }
}
