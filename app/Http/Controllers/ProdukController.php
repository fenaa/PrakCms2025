<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        return view('produk.index', ['produks' => Produk::all()]);
    }

    public function show($id)
    {
        $data = collect(Produk::all())->firstWhere('id', $id);
        return view('produk.show', ['produk' => $data]);
    }

    public function edit($id)
    {
        $data = collect(Produk::all())->firstWhere('id', $id);
        return view('produk.edit', ['produk' => $data]);
    }

    public function destroy($id)
    {
        $data = collect(Produk::all())->firstWhere('id', $id);
        return view('produk.delete', ['produk' => $data]);
    }
}
