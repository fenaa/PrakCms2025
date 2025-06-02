@extends('layouts.app')

@section('content')
<h1>Detail Janji Temu</h1>

<ul>
    <li><strong>ID:</strong> {{ $janji_temu->id_janjitemu }}</li>
    <li><strong>Pelanggan:</strong> {{ $janji_temu->pelanggan->nama_pelanggan }}</li>
    <li><strong>Karyawan:</strong> {{ $janji_temu->karyawan->nama_karyawan }}</li>
    <li><strong>Produk:</strong> {{ $janji_temu->produk->jenis_produk }}</li>
    <li><strong>Tanggal:</strong> {{ $janji_temu->tanggal }}</li>
    <li><strong>Waktu:</strong> {{ $janji_temu->waktu }}</li>
</ul>

<a href="{{ route('janjitemu.index') }}">⬅️ Kembali</a>
@endsection
