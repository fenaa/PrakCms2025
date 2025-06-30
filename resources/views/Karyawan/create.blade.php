@extends('layouts.app')

@section('content')
<h1>Tambah Karyawan</h1>

{{-- Menampilkan Error Validasi --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('karyawan.store') }}" method="POST">
    @csrf

    <label>Nama Karyawan:</label>
    <input type="text" name="nama_karyawan" value="{{ old('nama_karyawan') }}" required><br>

    <label>Jenis Kelamin:</label>
    <select name="jenis_kelamin" required>
        <option value="">-- Pilih --</option>
        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
    </select><br>

    <label>Gaji:</label>
    <input type="number" name="gaji_karyawan" value="{{ old('gaji_karyawan') }}" required><br>

    <label>Tanggal Bergabung:</label>
    <input type="date" name="tanggal_bergabung" value="{{ old('tanggal_bergabung') }}" required><br>

    <label>Nomor Telepon:</label>
    <input type="text" name="nomor_telpon" value="{{ old('nomor_telpon') }}" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}" required><br>

    <button type="submit">💾 Simpan</button>
</form>
@endsection
