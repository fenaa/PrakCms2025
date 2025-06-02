@extends('layouts.app')

@section('content')
<h1>Hapus Karyawan</h1>

<p>Yakin ingin menghapus karyawan berikut?</p>

<ul>
    <li><strong>ID:</strong> {{ $karyawan->id_karyawan }}</li>
    <li><strong>Nama:</strong> {{ $karyawan->nama_karyawan }}</li>
    <li><strong>Gaji:</strong> {{ number_format($karyawan->gaji_karyawan, 0, ',', '.') }}</li>
</ul>

<form action="{{ route('karyawan.destroy', $karyawan->id_karyawan) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">🗑️ Hapus</button>
    <a href="{{ route('karyawan.index') }}">❌ Batal</a>
</form>
@endsection