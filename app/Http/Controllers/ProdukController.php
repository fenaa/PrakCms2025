<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::query();

        // Filter berdasarkan search (jenis produk)
        if ($request->filled('search')) {
            $query->where('jenis_produk', 'like', '%' . $request->search . '%');
        }

        // Filter stok rendah (stok < 10)
        if ($request->has('stok_rendah')) {
            $query->where('stok_produk', '<', 10);
        }

        $produks = $query->get();

        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_produk' => 'required|string|max:100',
            'stok_produk' => 'required|integer|min:0',
            'harga_produk' => 'required|integer|min:0',
        ]);

        $validated['id_produk'] = 'PRD' . strtoupper(uniqid());

        Produk::create($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $validated = $request->validate([
            'jenis_produk' => 'required|string|max:100',
            'stok_produk' => 'required|integer|min:0',
            'harga_produk' => 'required|integer|min:0',
        ]);

        $produk->update($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    public function delete($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.delete', compact('produk'));
    }
}
