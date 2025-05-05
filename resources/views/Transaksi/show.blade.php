@extends('layouts.app')
@section('title', 'Detail Transaksi')
@section('content')
<h2>Detail Transaksi</h2>
<ul class="list-group">
  <li class="list-group-item"><strong>ID Janji Temu:</strong> {{ $transaksi['id_janji_temu'] }}</li>
  <li class="list-group-item"><strong>Tanggal:</strong> {{ $transaksi['tanggal'] }}</li>
  <li class="list-group-item"><strong>Jumlah Produk:</strong> {{ $transaksi['jumlah_produk'] }}</li>
  <li class="list-group-item"><strong>Harga:</strong> {{ $transaksi['harga'] }}</li>
</ul>
<a href="/transaksi" class="btn btn-secondary mt-3">Kembali</a>
@endsection
