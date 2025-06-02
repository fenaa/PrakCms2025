@extends('layouts.app')

@section('content')
<h1>Edit Pelanggan</h1>

<form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Pelanggan:</label>
    <input type="text" name="nama_pelanggan" value="{{ $pelanggan->nama_pelanggan }}" required><br>

    <label>Alamat:</label>
    <input type="text" name="alamat_pelanggan" value="{{ $pelanggan->alamat_pelanggan }}" required><br>

    <label>Jenis Kelamin:</label>
    <select name="jenis_kelamin" required>
        <option value="L" {{ $pelanggan->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ $pelanggan->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
    </select><br>

    <label>Nomor Telepon:</label>
    <input type="text" name="nomor_telpon" value="{{ $pelanggan->nomor_telpon }}" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $pelanggan->email }}" required><br>

    <button type="submit">💾 Update</button>
</form>
@endsection