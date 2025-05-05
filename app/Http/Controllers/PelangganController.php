<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        return view('pelanggan.index', ['pelanggans' => Pelanggan::all()]);
    }

    public function show($id)
    {
        $data = collect(Pelanggan::all())->firstWhere('id', $id);
        return view('pelanggan.show', ['pelanggan' => $data]);
    }

    public function edit($id)
    {
        $data = collect(Pelanggan::all())->firstWhere('id', $id);
        return view('pelanggan.edit', ['pelanggan' => $data]);
    }

    public function destroy($id)
    {
        $data = collect(Pelanggan::all())->firstWhere('id', $id);
        return view('pelanggan.delete', ['pelanggan' => $data]);
    }
}
