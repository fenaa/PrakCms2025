@extends('layouts.app')

@section('content')
<h1>Detail Transaksi</h1>

<ul>
    <li><strong>ID:</strong> {{ $transaksi->id_transaksi }}</li>
    <li><strong>Janji Temu:</strong> {{ $transaksi->janji_temu->id_janjitemu }}</li>
    <li><strong>Tanggal Transaksi:</strong> {{ $transaksi->tanggal_transaksi }}</li>
    <li><strong>Jumlah Produk:</strong> {{ $transaksi->jumlah_produk }}</li>
    <li><strong>Harga:</strong> {{ number_format($transaksi->harga, 0, ',', '.') }}</li>
</ul>

<a href="{{ route('transaksi.index') }}">⬅️ Kembali</a>
@endsection