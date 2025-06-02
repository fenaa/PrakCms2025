@extends('layouts.app')

@section('content')
<h1>Hapus Produk</h1>

<p>Yakin ingin menghapus produk berikut?</p>

<ul>
    <li><strong>ID:</strong> {{ $produk->id_produk }}</li>
    <li><strong>Jenis Produk:</strong> {{ $produk->jenis_produk }}</li>
    <li><strong>Stok:</strong> {{ $produk->stok_produk }}</li>
</ul>

<form action="{{ route('produk.destroy', $produk->id_produk) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">🗑️ Hapus</button>
    <a href="{{ route('produk.index') }}">❌ Batal</a>
</form>
@endsection