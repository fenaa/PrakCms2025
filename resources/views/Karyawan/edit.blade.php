@extends('layouts.app')

@section('content')
<h1>Edit Karyawan</h1>

<form action="{{ route('karyawan.update', $karyawan->id_karyawan) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Karyawan:</label>
    <input type="text" name="nama_karyawan" value="{{ $karyawan->nama_karyawan }}" required><br>

    <label>Jenis Kelamin:</label>
    <select name="jenis_kelamin" required>
        <option value="L" {{ $karyawan->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ $karyawan->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
    </select><br>

    <label>Gaji:</label>
    <input type="number" name="gaji_karyawan" value="{{ $karyawan->gaji_karyawan }}" required><br>

    <label>Tanggal Bergabung:</label>
    <input type="date" name="tanggal_bergabung" value="{{ $karyawan->tanggal_bergabung }}" required><br>

    <label>Nomor Telepon:</label>
    <input type="text" name="nomor_telpon" value="{{ $karyawan->nomor_telpon }}" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $karyawan->email }}" required><br>

    <button type="submit">💾 Update</button>
</form>
@endsection