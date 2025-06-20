<?php

namespace App\Http\Controllers;

use App\Models\JanjiTemu;
use App\Models\Pelanggan;
use App\Models\Karyawan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JanjiTemuController extends Controller
{
    public function index()
    {
        $janjiTemus = JanjiTemu::with(['pelanggan', 'karyawan', 'produk'])->get();
        return view('janjitemu.index', compact('janjiTemus'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $karyawans = Karyawan::all();
        $produks = Produk::all();
        return view('janjitemu.create', compact('pelanggans', 'karyawans', 'produks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'id_karyawan' => 'required|exists:karyawans,id_karyawan',
            'id_produk' => 'required|exists:produks,id_produk',
            'tanggal' => 'required|date',
            'waktu' => 'required|string|max:5',
        ]);

        // Format tanggal menjadi Y-m-d agar Oracle bisa terima
        $validated['tanggal'] = Carbon::parse($validated['tanggal'])->format('Y-m-d');

        $validated['id_janjitemu'] = 'JT' . strtoupper(uniqid());

        JanjiTemu::create($validated);

        return redirect()->route('janjitemu.index')->with('success', 'Janji Temu berhasil ditambahkan!');
    }

    public function show($id)
    {
        $janji_temu = JanjiTemu::with(['pelanggan', 'karyawan', 'produk'])->findOrFail($id);
        return view('janjitemu.show', compact('janji_temu'));
    }

    public function edit($id)
    {
        $janji_temu = JanjiTemu::findOrFail($id);
        $pelanggans = Pelanggan::all();
        $karyawans = Karyawan::all();
        $produks = Produk::all();
        return view('janjitemu.edit', compact('janji_temu', 'pelanggans', 'karyawans', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $janji_temu = JanjiTemu::findOrFail($id);

        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'id_karyawan' => 'required|exists:karyawans,id_karyawan',
            'id_produk' => 'required|exists:produks,id_produk',
            'tanggal' => 'required|date',
            'waktu' => 'required|string|max:5',
        ]);

        $validated['tanggal'] = Carbon::parse($validated['tanggal'])->format('Y-m-d');

        $janji_temu->update($validated);

        return redirect()->route('janjitemu.index')->with('success', 'Janji Temu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $janji_temu = JanjiTemu::findOrFail($id);
        $janji_temu->delete();

        return redirect()->route('janjitemu.index')->with('success', 'Janji Temu berhasil dihapus!');
    }
}
