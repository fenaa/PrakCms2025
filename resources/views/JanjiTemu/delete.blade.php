@extends('layouts.app')

@section('content')
<h1>Hapus Janji Temu</h1>

<p>Yakin ingin menghapus janji temu berikut?</p>

<ul>
    <li><strong>ID:</strong> {{ $janji_temu->id_janjitemu }}</li>
    <li><strong>Pelanggan:</strong> {{ $janji_temu->pelanggan->nama_pelanggan }}</li>
    <li><strong>Karyawan:</strong> {{ $janji_temu->karyawan->nama_karyawan }}</li>
    <li><strong>Produk:</strong> {{ $janji_temu->produk->jenis_produk }}</li>
    <li><strong>Tanggal:</strong> {{ $janji_temu->tanggal }}</li>
    <li><strong>Waktu:</strong> {{ $janji_temu->waktu }}</li>
</ul>

<form action="{{ route('janjitemu.destroy', $janji_temu->id_janjitemu) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">🗑️ Hapus</button>
    <a href="{{ route('janjitemu.index') }}">❌ Batal</a>
</form>
@endsection
