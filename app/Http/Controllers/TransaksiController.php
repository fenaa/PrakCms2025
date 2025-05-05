<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi.index', ['transaksis' => Transaksi::all()]);
    }

    public function show($id)
    {
        $data = collect(Transaksi::all())->firstWhere('id', $id);
        return view('transaksi.show', ['transaksi' => $data]);
    }

    public function edit($id)
    {
        $data = collect(Transaksi::all())->firstWhere('id', $id);
        return view('transaksi.edit', ['transaksi' => $data]);
    }

    public function destroy($id)
    {
        $data = collect(Transaksi::all())->firstWhere('id', $id);
        return view('transaksi.delete', ['transaksi' => $data]);
    }
}
