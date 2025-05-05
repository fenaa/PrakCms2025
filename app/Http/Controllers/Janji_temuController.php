<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Janji_temu;

class Janji_temuController extends Controller
{
    public function index()
    {
        $janjiTemus = Janji_temu::all();
        return view('janji_temu.index', compact('janjiTemus'));
    }

    public function show($id)
    {
        $janjiTemu = collect(Janji_temu::all())->firstWhere('id', $id);
        return view('janji_temu.show', compact('janjiTemu'));
    }

    public function edit($id)
    {
        $janjiTemu = collect(Janji_temu::all())->firstWhere('id', $id);
        return view('janji_temu.edit', compact('janjiTemu'));
    }

    public function delete($id)
    {
        $janjiTemu = collect(Janji_temu::all())->firstWhere('id', $id);
        return view('janji_temu.delete', compact('janjiTemu'));
    }
}
