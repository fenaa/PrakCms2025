<?php

namespace App\Http\Controllers;

use App\Models\JanjiTemu;
use App\Models\Pelanggan;
use App\Models\Karyawan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;

class JanjiTemuController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = JanjiTemu::with(['pelanggan', 'karyawan', 'produk']);

            // Pencarian berdasarkan nama pelanggan
            if ($request->filled('search')) {
                $query->whereHas('pelanggan', function ($q) use ($request) {
                    $q->where('nama_pelanggan', 'like', '%' . $request->search . '%');
                });
            }

            $janjiTemus = $query
                ->orderBy('tanggal', 'desc')
                ->orderBy('waktu', 'desc')
                ->get();

            Log::info('Mengakses daftar janji temu');

            return view('janjitemu.index', compact('janjiTemus'));
        } catch (\Exception $e) {
            Log::error('Gagal menampilkan daftar janji temu', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Gagal menampilkan data janji temu.');
        }
    }

    public function create()
    {
        Log::info('Mengakses halaman tambah janji temu');
        return view('janjitemu.create', [
            'pelanggans' => Pelanggan::all(),
            'karyawans'  => Karyawan::all(),
            'produks'    => Produk::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'id_karyawan'  => 'required|exists:karyawans,id_karyawan',
            'id_produk'    => 'required|exists:produks,id_produk',
            'tanggal'      => 'required|date',
            'waktu'        => 'required|string|max:5',
        ]);

        try {
            $validated['tanggal'] = Carbon::parse($validated['tanggal'])->format('Y-m-d');
            $validated['id_janjitemu'] = 'JT' . strtoupper(uniqid());

            JanjiTemu::create($validated);

            Log::info('Berhasil menambahkan janji temu', ['data' => $validated]);

            return redirect()->route('janjitemu.index')->with('success', 'Janji Temu berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan janji temu', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan janji temu.');
        }
    }

    public function show($id)
    {
        try {
            $janji_temu = JanjiTemu::with(['pelanggan', 'karyawan', 'produk'])->findOrFail($id);
            Log::info('Melihat detail janji temu', ['id' => $id]);
            return view('janjitemu.show', compact('janji_temu'));
        } catch (ModelNotFoundException $e) {
            Log::error('Janji temu tidak ditemukan saat melihat detail', ['id' => $id]);
            return redirect()->route('janjitemu.index')->with('error', 'Data janji temu tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $janji_temu = JanjiTemu::findOrFail($id);
            Log::info('Mengakses halaman edit janji temu', ['id' => $id]);

            return view('janjitemu.edit', [
                'janji_temu' => $janji_temu,
                'pelanggans' => Pelanggan::all(),
                'karyawans'  => Karyawan::all(),
                'produks'    => Produk::all(),
            ]);
        } catch (ModelNotFoundException $e) {
            Log::error('Janji temu tidak ditemukan saat edit', ['id' => $id]);
            return redirect()->route('janjitemu.index')->with('error', 'Data janji temu tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'id_karyawan'  => 'required|exists:karyawans,id_karyawan',
            'id_produk'    => 'required|exists:produks,id_produk',
            'tanggal'      => 'required|date',
            'waktu'        => 'required|string|max:5',
        ]);

        try {
            $janji_temu = JanjiTemu::findOrFail($id);
            $validated['tanggal'] = Carbon::parse($validated['tanggal'])->format('Y-m-d');

            $janji_temu->update($validated);

            Log::info('Berhasil memperbarui janji temu', ['id' => $id]);

            return redirect()->route('janjitemu.index')->with('success', 'Janji Temu berhasil diperbarui!');
        } catch (ModelNotFoundException $e) {
            Log::error('Janji temu tidak ditemukan saat update', ['id' => $id]);
            return redirect()->route('janjitemu.index')->with('error', 'Data janji temu tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui janji temu', ['id' => $id, 'error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui janji temu.');
        }
    }

    public function destroy($id)
    {
        try {
            $janji_temu = JanjiTemu::findOrFail($id);
            $janji_temu->delete();

            Log::info('Berhasil menghapus janji temu', ['id' => $id]);

            return redirect()->route('janjitemu.index')->with('success', 'Janji Temu berhasil dihapus!');
        } catch (ModelNotFoundException $e) {
            Log::error('Janji temu tidak ditemukan saat hapus', ['id' => $id]);
            return redirect()->route('janjitemu.index')->with('error', 'Data janji temu tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus janji temu', ['id' => $id, 'error' => $e->getMessage()]);
            return redirect()->route('janjitemu.index')->with('error', 'Terjadi kesalahan saat menghapus janji temu.');
        }
    }
}
