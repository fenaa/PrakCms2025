<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create()
    {
        // Ambil semua data gambar untuk ditampilkan
        $images = Image::all();
        return view('upload', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan file gambar ke folder storage/app/public/images
        $imagePath = $request->file('image')->store('images', 'public');

        // Simpan data ke database
        Image::create([
            'title' => $request->title,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('image.create')->with('success', 'Gambar berhasil diunggah!');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        // Hapus file dari storage
        Storage::disk('public')->delete($image->image_path);

        // Hapus data dari database
        $image->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus!');
    }
}
