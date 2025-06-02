@extends('layouts.app')

@section('content')
<h1>Detail Produk</h1>

<ul>
    <li><strong>ID:</strong> {{ $produk->id_produk }}</li>
    <li><strong>Jenis Produk:</strong> {{ $produk->jenis_produk }}</li>
    <li><strong>Stok:</strong> {{ $produk->stok_produk }}</li>
    <li><strong>Harga:</strong> {{ number_format($produk->harga_produk, 0, ',', '.') }}</li>
</ul>

<a href="{{ route('produk.index') }}">⬅️ Kembali</a>
@endsection