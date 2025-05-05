@extends('layouts.app')
@section('title', 'Detail Produk')
@section('content')
<h2>Detail Produk</h2>
<ul class="list-group">
  <li class="list-group-item"><strong>ID:</strong> {{ $produk['id'] }}</li> 
  <li class="list-group-item"><strong>Jenis:</strong> {{ $produk['jenis'] }}</li>
  <li class="list-group-item"><strong>Stok:</strong> {{ $produk['stok'] }}</li>
  <li class="list-group-item"><strong>Harga:</strong> {{ $produk['harga'] }}</li>
</ul>
<a href="/produk" class="btn btn-secondary mt-3">Kembali</a>
@endsection
