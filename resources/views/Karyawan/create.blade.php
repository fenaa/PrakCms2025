@extends('layouts.app')

@section('content')
<h1>Tambah Karyawan</h1>

<form action="{{ route('karyawan.store') }}" method="POST">
    @csrf

    <label>Nama Karyawan:</label>
    <input type="text" name="nama_karyawan" required><br>

    <label>Jenis Kelamin:</label>
    <select name="jenis_kelamin" required>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select><br>

    <label>Gaji:</label>
    <input type="number" name="gaji_karyawan" required><br>

    <label>Tanggal Bergabung:</label>
    <input type="date" name="tanggal_bergabung" required><br>

    <label>Nomor Telepon:</label>
    <input type="text" name="nomor_telpon" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <button type="submit">💾 Simpan</button>
</form>
@endsection