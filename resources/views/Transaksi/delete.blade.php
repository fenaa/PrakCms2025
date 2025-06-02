@extends('layouts.app')

@section('content')
<h1>Hapus Transaksi</h1>

<p>Yakin ingin menghapus transaksi berikut?</p>

<ul>
    <li><strong>ID:</strong> {{ $transaksi->id_transaksi }}</li>
    <li><strong>Janji Temu:</strong> {{ $transaksi->janji_temu->id_janjitemu }}</li>
    <li><strong>Tanggal:</strong> {{ $transaksi->tanggal_transaksi }}</li>
    <li><strong>Total Harga:</strong> {{ number_format($transaksi->harga, 0, ',', '.') }}</li>
</ul>

<form action="{{ route('transaksi.destroy', $transaksi->id_transaksi) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">🗑️ Hapus</button>
    <a href="{{ route('transaksi.index') }}">❌ Batal</a>
</form>
@endsection