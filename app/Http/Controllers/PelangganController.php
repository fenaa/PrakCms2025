<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $query = Pelanggan::query();

        if ($request->has('search')) {
            $query->where('nama_pelanggan', 'like', '%' . $request->search . '%');
        }

        $pelanggans = $query->orderBy('created_at', 'desc')->get();

        Log::info('Mengakses daftar pelanggan');

        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        Log::info('Mengakses halaman tambah pelanggan');
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan'    => 'required|regex:/^[a-zA-Z\s]+$/u|max:100',
            'alamat_pelanggan'  => 'required|regex:/[a-zA-Z]/|string|max:255',
            'jenis_kelamin'     => 'required|in:L,P',
            'nomor_telpon'      => 'required|digits_between:10,20|numeric',
            'email'             => 'required|email|max:100',
        ], [
            'nama_pelanggan.required'     => 'Nama pelanggan wajib diisi.',
            'nama_pelanggan.regex'        => 'Nama hanya boleh huruf dan spasi.',
            'alamat_pelanggan.required'   => 'Alamat wajib diisi.',
            'alamat_pelanggan.regex'      => 'Alamat harus mengandung huruf.',
            'jenis_kelamin.required'      => 'Jenis kelamin wajib diisi.',
            'nomor_telpon.required'       => 'Nomor telepon wajib diisi.',
            'nomor_telpon.numeric'        => 'Nomor telepon hanya boleh angka.',
            'nomor_telpon.digits_between' => 'Nomor telepon minimal 10 dan maksimal 20 digit.',
            'email.required'              => 'Email wajib diisi.',
            'email.email'                 => 'Format email tidak valid.',
        ]);

        $validated['id_pelanggan'] = 'PLG' . strtoupper(uniqid());

        try {
            Pelanggan::create($validated);

            Log::info('Pelanggan berhasil ditambahkan', ['data' => $validated]);

            return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan pelanggan', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()->withInput()->with('error', 'Gagal menambahkan pelanggan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            Log::info('Mengakses detail pelanggan', ['id_pelanggan' => $id]);
            return view('pelanggan.show', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            Log::error('Pelanggan tidak ditemukan saat melihat detail', [
                'id_pelanggan' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            Log::info('Mengakses halaman edit pelanggan', ['id_pelanggan' => $id]);
            return view('pelanggan.edit', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            Log::error('Pelanggan tidak ditemukan saat edit', [
                'id_pelanggan' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);

            $validated = $request->validate([
                'nama_pelanggan'    => 'required|regex:/^[a-zA-Z\s]+$/u|max:100',
                'alamat_pelanggan'  => 'required|regex:/[a-zA-Z]/|string|max:255',
                'jenis_kelamin'     => 'required|in:L,P',
                'nomor_telpon'      => 'required|digits_between:10,20|numeric',
                'email'             => 'required|email|max:100',
            ], [
                'nama_pelanggan.required'     => 'Nama pelanggan wajib diisi.',
                'nama_pelanggan.regex'        => 'Nama hanya boleh huruf dan spasi.',
                'alamat_pelanggan.required'   => 'Alamat wajib diisi.',
                'alamat_pelanggan.regex'      => 'Alamat harus mengandung huruf.',
                'jenis_kelamin.required'      => 'Jenis kelamin wajib diisi.',
                'nomor_telpon.required'       => 'Nomor telepon wajib diisi.',
                'nomor_telpon.numeric'        => 'Nomor telepon hanya boleh angka.',
                'nomor_telpon.digits_between' => 'Nomor telepon minimal 10 dan maksimal 20 digit.',
                'email.required'              => 'Email wajib diisi.',
                'email.email'                 => 'Format email tidak valid.',
            ]);

            $pelanggan->update($validated);

            Log::info('Pelanggan berhasil diperbarui', [
                'id_pelanggan' => $id,
                'data' => $validated
            ]);

            return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui!');
        } catch (ModelNotFoundException $e) {
            Log::error('Pelanggan tidak ditemukan saat update', [
                'id_pelanggan' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui pelanggan', [
                'id_pelanggan' => $id,
                'error' => $e->getMessage(),
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withInput()->with('error', 'Gagal memperbarui pelanggan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->delete();

            Log::info('Pelanggan berhasil dihapus', ['id_pelanggan' => $id]);

            return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus!');
        } catch (ModelNotFoundException $e) {
            Log::error('Pelanggan tidak ditemukan saat hapus', [
                'id_pelanggan' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus pelanggan', [
                'id_pelanggan' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('pelanggan.index')->with('error', 'Gagal menghapus pelanggan: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            Log::info('Mengakses halaman konfirmasi hapus pelanggan', ['id_pelanggan' => $id]);
            return view('pelanggan.delete', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            Log::error('Pelanggan tidak ditemukan saat konfirmasi hapus', [
                'id_pelanggan' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }
}
