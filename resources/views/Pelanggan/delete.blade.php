@extends('layouts.app')

@section('content')
<h1>Hapus Pelanggan</h1>

<p>Yakin ingin menghapus pelanggan berikut?</p>

<ul>
    <li><strong>ID:</strong> {{ $pelanggan->id_pelanggan }}</li>
    <li><strong>Nama:</strong> {{ $pelanggan->nama_pelanggan }}</li>
    <li><strong>Alamat:</strong> {{ $pelanggan->alamat_pelanggan }}</li>
</ul>

<form action="{{ route('pelanggan.destroy', $pelanggan->id_pelanggan) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">🗑️ Hapus</button>
    <a href="{{ route('pelanggan.index') }}">❌ Batal</a>
</form>
@endsection