<?php


namespace App\Http\Controllers;

use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggans'));
    }

    public function show($id)
    {
        $pelanggan = collect(Pelanggan::all())->firstWhere('id', $id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    public function edit($id)
    {
        $pelanggan = collect(Pelanggan::all())->firstWhere('id', $id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function destroy($id)
    {
        return view('pelanggan.delete');
    }
}
