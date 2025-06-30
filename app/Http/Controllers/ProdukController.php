<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::query();

        if ($request->filled('search')) {
            $query->where('jenis_produk', 'like', '%' . $request->search . '%');
        }

        if ($request->has('stok_rendah')) {
            $query->where('stok_produk', '<', 10);
        }

        $produks = $query->orderBy('created_at', 'desc')->get(); // ✅ Urut berdasarkan data terbaru

        Log::info('Mengakses daftar produk');

        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        Log::info('Mengakses halaman tambah produk');
        return view('produk.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'jenis_produk' => 'required|string|max:100',
                'stok_produk' => 'required|integer|min:0',
                'harga_produk' => 'required|integer|min:0',
            ], [
                'jenis_produk.required' => 'Jenis produk wajib diisi.',
                'stok_produk.required'   => 'Stok wajib diisi.',
                'harga_produk.required'  => 'Harga wajib diisi.',
            ]);

            $validated['id_produk'] = 'PRD' . strtoupper(uniqid());

            Produk::create($validated);

            Log::info('Produk berhasil ditambahkan', $validated);

            return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan produk', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data produk.');
        }
    }

    public function edit($id)
    {
        try {
            $produk = Produk::findOrFail($id);
            Log::info('Mengakses halaman edit produk', ['id_produk' => $id]);

            return view('produk.edit', compact('produk'));
        } catch (ModelNotFoundException $e) {
            Log::error('Produk tidak ditemukan saat edit', ['id_produk' => $id]);
            return redirect()->route('produk.index')->with('error', 'Data produk tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $produk = Produk::findOrFail($id);

            $validated = $request->validate([
                'jenis_produk' => 'required|string|max:100',
                'stok_produk' => 'required|integer|min:0',
                'harga_produk' => 'required|integer|min:0',
            ], [
                'jenis_produk.required' => 'Jenis produk wajib diisi.',
                'stok_produk.required'   => 'Stok wajib diisi.',
                'harga_produk.required'  => 'Harga wajib diisi.',
            ]);

            $produk->update($validated);

            Log::info('Produk berhasil diperbarui', ['id_produk' => $id, 'data' => $validated]);

            return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
        } catch (ModelNotFoundException $e) {
            Log::error('Produk tidak ditemukan saat update', ['id_produk' => $id]);
            return redirect()->route('produk.index')->with('error', 'Data produk tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui produk', [
                'id_produk' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui produk.');
        }
    }

    public function destroy($id)
    {
        try {
            $produk = Produk::findOrFail($id);
            $produk->delete();

            Log::info('Produk berhasil dihapus', ['id_produk' => $id]);

            return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
        } catch (ModelNotFoundException $e) {
            Log::error('Produk tidak ditemukan saat hapus', ['id_produk' => $id]);
            return redirect()->route('produk.index')->with('error', 'Data produk tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus produk', [
                'id_produk' => $id,
                'error' => $e->getMessage()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat menghapus produk.');
        }
    }

    public function show($id)
    {
        try {
            $produk = Produk::findOrFail($id);
            Log::info('Mengakses detail produk', ['id_produk' => $id]);
            return view('produk.show', compact('produk'));
        } catch (ModelNotFoundException $e) {
            Log::error('Produk tidak ditemukan saat melihat detail', ['id_produk' => $id]);
            return redirect()->route('produk.index')->with('error', 'Data produk tidak ditemukan.');
        }
    }

    public function delete($id)
    {
        try {
            $produk = Produk::findOrFail($id);
            Log::info('Mengakses konfirmasi hapus produk', ['id_produk' => $id]);
            return view('produk.delete', compact('produk'));
        } catch (ModelNotFoundException $e) {
            Log::error('Produk tidak ditemukan saat konfirmasi hapus', ['id_produk' => $id]);
            return redirect()->route('produk.index')->with('error', 'Data produk tidak ditemukan.');
        }
    }
}
