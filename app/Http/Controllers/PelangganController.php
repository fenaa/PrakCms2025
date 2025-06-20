<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $query = Pelanggan::query();

        if ($request->has('search')) {
            $query->where('nama_pelanggan', 'like', '%' . $request->search . '%');
        }

        $pelanggans = $query->get();

        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan'    => 'required|string|max:100',
            'alamat_pelanggan'  => 'required|string|max:255',
            'jenis_kelamin'     => 'required|in:L,P',
            'nomor_telpon'      => 'required|string|max:20',
            'email'             => 'required|email|max:100',
        ], [
            'nama_pelanggan.required'   => 'Nama pelanggan wajib diisi.',
            'alamat_pelanggan.required' => 'Alamat wajib diisi.',
            'jenis_kelamin.required'    => 'Jenis kelamin wajib diisi.',
            'nomor_telpon.required'     => 'Nomor telepon wajib diisi.',
            'email.required'            => 'Email wajib diisi.',
            'email.email'               => 'Email tidak valid.',
        ]);

        $validated['id_pelanggan'] = 'PLG' . strtoupper(uniqid());

        Pelanggan::create($validated);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.edit', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);

            $validated = $request->validate([
                'nama_pelanggan'    => 'required|string|max:100',
                'alamat_pelanggan'  => 'required|string|max:255',
                'jenis_kelamin'     => 'required|in:L,P',
                'nomor_telpon'      => 'required|string|max:20',
                'email'             => 'required|email|max:100',
            ], [
                'nama_pelanggan.required'   => 'Nama pelanggan wajib diisi.',
                'alamat_pelanggan.required' => 'Alamat wajib diisi.',
                'jenis_kelamin.required'    => 'Jenis kelamin wajib diisi.',
                'nomor_telpon.required'     => 'Nomor telepon wajib diisi.',
                'email.required'            => 'Email wajib diisi.',
                'email.email'               => 'Email tidak valid.',
            ]);

            $pelanggan->update($validated);

            return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->delete();

            return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    public function show($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.show', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    public function delete($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.delete', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }
}
