@extends('layouts.app')

@section('content')
<h1>Edit Karyawan</h1>

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

<form action="{{ route('karyawan.update', $karyawan->id_karyawan) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Karyawan:</label>
    <input type="text" name="nama_karyawan" value="{{ old('nama_karyawan', $karyawan->nama_karyawan) }}" required><br>

    <label>Jenis Kelamin:</label>
    <select name="jenis_kelamin" required>
        <option value="L" {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
    </select><br>

    <label>Gaji:</label>
    <input type="number" name="gaji_karyawan" value="{{ old('gaji_karyawan', $karyawan->gaji_karyawan) }}" required><br>

    <label>Tanggal Bergabung:</label>
    <input type="date" name="tanggal_bergabung" value="{{ old('tanggal_bergabung', $karyawan->tanggal_bergabung) }}" required><br>

    <label>Nomor Telepon:</label>
    <input type="text" name="nomor_telpon" value="{{ old('nomor_telpon', $karyawan->nomor_telpon) }}" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email', $karyawan->email) }}" required><br>

    <button type="submit">💾 Update</button>
</form>
@endsection
