<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\JanjiTemu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('janji_temu')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $janji_temus = JanjiTemu::all();
        return view('transaksi.create', compact('janji_temus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_janjitemu' => 'required|exists:janji_temus,id_janjitemu',
            'tanggal_transaksi' => 'required|date',
            'jumlah_produk' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
        ], [
            'id_janjitemu.required' => 'Janji temu wajib dipilih.',
            'tanggal_transaksi.required' => 'Tanggal transaksi wajib diisi.',
            'jumlah_produk.required' => 'Jumlah produk wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
        ]);

        $validated['id_transaksi'] = 'TRX' . strtoupper(uniqid());

        Transaksi::create($validated);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $janji_temus = JanjiTemu::all();
        return view('transaksi.edit', compact('transaksi', 'janji_temus'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $validated = $request->validate([
            'id_janjitemu' => 'required|exists:janji_temus,id_janjitemu',
            'tanggal_transaksi' => 'required|date',
            'jumlah_produk' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
        ]);

        $transaksi->update($validated);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }

    public function show($id)
    {
        try {
            $transaksi = Transaksi::with('janji_temu')->findOrFail($id);
            return view('transaksi.show', compact('transaksi'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('transaksi.index')->with('error', 'Data transaksi tidak ditemukan.');
        }
    }
}
