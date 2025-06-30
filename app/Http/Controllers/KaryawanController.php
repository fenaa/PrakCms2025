<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $query = Karyawan::query();

        if ($request->has('search')) {
            $query->where('nama_karyawan', 'like', '%' . $request->search . '%');
        }

        $karyawans = $query->orderBy('created_at', 'desc')->get();

        Log::info('Mengakses daftar karyawan');

        return view('karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        Log::info('Mengakses halaman tambah karyawan');
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_karyawan'      => 'required|regex:/^[a-zA-Z\s]+$/u|max:100',
            'jenis_kelamin'      => 'required|in:L,P',
            'gaji_karyawan'      => 'required|integer|min:0',
            'tanggal_bergabung'  => 'required|date',
            'nomor_telpon'       => 'required|digits_between:10,20|numeric',
            'email'              => 'required|email|max:100',
        ], [
            'nama_karyawan.required'     => 'Nama karyawan wajib diisi.',
            'nama_karyawan.regex'        => 'Nama hanya boleh huruf dan spasi.',
            'jenis_kelamin.required'     => 'Jenis kelamin wajib diisi.',
            'gaji_karyawan.required'     => 'Gaji wajib diisi.',
            'gaji_karyawan.integer'      => 'Gaji harus berupa angka.',
            'tanggal_bergabung.required' => 'Tanggal bergabung wajib diisi.',
            'nomor_telpon.required'      => 'Nomor telepon wajib diisi.',
            'nomor_telpon.numeric'       => 'Nomor telepon hanya boleh angka.',
            'nomor_telpon.digits_between'=> 'Nomor telepon minimal 10 dan maksimal 20 digit.',
            'email.required'             => 'Email wajib diisi.',
            'email.email'                => 'Format email tidak valid.',
        ]);

        $validated['id_karyawan'] = 'KRY' . strtoupper(uniqid());

        try {
            Karyawan::create($validated);
            Log::info('Karyawan berhasil ditambahkan', ['data' => $validated]);
            return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan karyawan', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withInput()->with('error', 'Gagal menambahkan karyawan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            Log::info('Mengakses detail karyawan', ['id_karyawan' => $id]);
            return view('karyawan.show', compact('karyawan'));
        } catch (ModelNotFoundException $e) {
            Log::error('Karyawan tidak ditemukan saat melihat detail', [
                'id_karyawan' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('karyawan.index')->with('error', 'Data karyawan tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            Log::info('Mengakses halaman edit karyawan', ['id_karyawan' => $id]);
            return view('karyawan.edit', compact('karyawan'));
        } catch (ModelNotFoundException $e) {
            Log::error('Karyawan tidak ditemukan saat edit', [
                'id_karyawan' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('karyawan.index')->with('error', 'Data karyawan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);

            $validated = $request->validate([
                'nama_karyawan'      => 'required|regex:/^[a-zA-Z\s]+$/u|max:100',
                'jenis_kelamin'      => 'required|in:L,P',
                'gaji_karyawan'      => 'required|integer|min:0',
                'tanggal_bergabung'  => 'required|date',
                'nomor_telpon'       => 'required|digits_between:10,20|numeric',
                'email'              => 'required|email|max:100',
            ], [
                'nama_karyawan.required'     => 'Nama karyawan wajib diisi.',
                'nama_karyawan.regex'        => 'Nama hanya boleh huruf dan spasi.',
                'jenis_kelamin.required'     => 'Jenis kelamin wajib diisi.',
                'gaji_karyawan.required'     => 'Gaji wajib diisi.',
                'gaji_karyawan.integer'      => 'Gaji harus berupa angka.',
                'tanggal_bergabung.required' => 'Tanggal bergabung wajib diisi.',
                'nomor_telpon.required'      => 'Nomor telepon wajib diisi.',
                'nomor_telpon.numeric'       => 'Nomor telepon hanya boleh angka.',
                'nomor_telpon.digits_between'=> 'Nomor telepon minimal 10 dan maksimal 20 digit.',
                'email.required'             => 'Email wajib diisi.',
                'email.email'                => 'Format email tidak valid.',
            ]);

            $karyawan->update($validated);

            Log::info('Karyawan berhasil diperbarui', ['id_karyawan' => $id, 'data' => $validated]);
            return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui!');
        } catch (ModelNotFoundException $e) {
            Log::error('Karyawan tidak ditemukan saat update', [
                'id_karyawan' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('karyawan.index')->with('error', 'Data karyawan tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui karyawan', [
                'id_karyawan' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withInput()->with('error', 'Gagal memperbarui karyawan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            $karyawan->delete();

            Log::info('Karyawan berhasil dihapus', ['id_karyawan' => $id]);

            return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus!');
        } catch (ModelNotFoundException $e) {
            Log::error('Karyawan tidak ditemukan saat hapus', [
                'id_karyawan' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('karyawan.index')->with('error', 'Data karyawan tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus karyawan', [
                'id_karyawan' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Gagal menghapus karyawan: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            Log::info('Mengakses halaman konfirmasi hapus karyawan', ['id_karyawan' => $id]);
            return view('karyawan.delete', compact('karyawan'));
        } catch (ModelNotFoundException $e) {
            Log::error('Karyawan tidak ditemukan saat konfirmasi hapus', [
                'id_karyawan' => $id,
                'error' => $e->getMessage()
            ]);
            return redirect()->route('karyawan.index')->with('error', 'Data karyawan tidak ditemukan.');
        }
    }
}
