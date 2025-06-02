@extends('layouts.app')

@section('content')
<h1>Detail Pelanggan</h1>

<ul>
    <li><strong>ID:</strong> {{ $pelanggan->id_pelanggan }}</li>
    <li><strong>Nama:</strong> {{ $pelanggan->nama_pelanggan }}</li>
    <li><strong>Alamat:</strong> {{ $pelanggan->alamat_pelanggan }}</li>
    <li><strong>Jenis Kelamin:</strong> {{ $pelanggan->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</li>
    <li><strong>Nomor Telepon:</strong> {{ $pelanggan->nomor_telpon }}</li>
    <li><strong>Email:</strong> {{ $pelanggan->email }}</li>
</ul>

<a href="{{ route('pelanggan.index') }}">⬅️ Kembali</a>
@endsection