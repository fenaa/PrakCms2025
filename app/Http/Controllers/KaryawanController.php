<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $query = Karyawan::query();

        if ($request->has('search')) {
            $query->where('nama_karyawan', 'like', '%' . $request->search . '%');
        }

        $karyawans = $query->get();

        return view('karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_karyawan' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'gaji_karyawan' => 'required|integer|min:0',
            'tanggal_bergabung' => 'required|date',
            'nomor_telpon' => 'required|string|max:20',
            'email' => 'required|email|max:100',
        ], [
            'nama_karyawan.required' => 'Nama karyawan wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'gaji_karyawan.required' => 'Gaji wajib diisi.',
            'tanggal_bergabung.required' => 'Tanggal bergabung wajib diisi.',
            'nomor_telpon.required' => 'Nomor telepon wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
        ]);

        $validated['id_karyawan'] = 'KRY' . strtoupper(uniqid());

        Karyawan::create($validated);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $validated = $request->validate([
            'nama_karyawan' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'gaji_karyawan' => 'required|integer|min:0',
            'tanggal_bergabung' => 'required|date',
            'nomor_telpon' => 'required|string|max:20',
            'email' => 'required|email|max:100',
        ], [
            'nama_karyawan.required' => 'Nama karyawan wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'gaji_karyawan.required' => 'Gaji wajib diisi.',
            'tanggal_bergabung.required' => 'Tanggal bergabung wajib diisi.',
            'nomor_telpon.required' => 'Nomor telepon wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
        ]);

        $karyawan->update($validated);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus!');
    }

    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.show', compact('karyawan'));
    }

    public function delete($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.delete', compact('karyawan'));
    }
}
