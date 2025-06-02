@extends('layouts.app')

@section('content')
<h1>Tambah Pelanggan</h1>

<form action="{{ route('pelanggan.store') }}" method="POST">
    @csrf

    <label>Nama Pelanggan:</label>
    <input type="text" name="nama_pelanggan" required><br>

    <label>Alamat:</label>
    <input type="text" name="alamat_pelanggan" required><br>

    <label>Jenis Kelamin:</label>
    <select name="jenis_kelamin" required>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select><br>

    <label>Nomor Telepon:</label>
    <input type="text" name="nomor_telpon" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <button type="submit">💾 Simpan</button>
</form>
@endsection