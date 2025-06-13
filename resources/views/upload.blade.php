<!DOCTYPE html>
<html>
<head>
    <title>Upload Gambar</title>
</head>
<body>

    <h2>Form Upload Gambar</h2>

    {{-- Tampilkan pesan sukses --}}
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- Form Upload --}}
    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Judul:</label><br>
        <input type="text" name="title"><br><br>

        <label>Pilih Gambar:</label><br>
        <input type="file" name="image"><br><br>

        <button type="submit">Upload</button>
    </form>

    {{-- Daftar Gambar --}}
    @if ($images->count())
        <h3>Daftar Gambar yang Telah Diupload:</h3>
        @foreach ($images as $image)
            <div style="margin-bottom: 20px;">
                <p><strong>{{ $image->title }}</strong></p>
                <img src="{{ asset('storage/' . $image->image_path) }}" width="200"><br><br>

                {{-- Tombol Hapus --}}
                <form action="{{ route('image.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus Gambar</button>
                </form>
            </div>
        @endforeach
    @else
        <p>Belum ada gambar yang diupload.</p>
    @endif

</body>
</html>
