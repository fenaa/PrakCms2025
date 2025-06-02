@extends('layouts.app')

@section('content')
<h1>Daftar Transaksi</h1>

<a href="{{ route('transaksi.create') }}">➕ Tambah Transaksi</a>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID Transaksi</th>
            <th>Janji Temu</th>
            <th>Tanggal Transaksi</th>
            <th>Jumlah Produk</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksis as $t)
        <tr>
            <td>{{ $t->id_transaksi }}</td>
            <td>{{ $t->janji_temu->id_janjitemu }}</td>
            <td>{{ $t->tanggal_transaksi }}</td>
            <td>{{ $t->jumlah_produk }}</td>
            <td>{{ number_format($t->harga, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('transaksi.show', $t->id_transaksi) }}">👁️ Lihat</a> |
                <a href="{{ route('transaksi.edit', $t->id_transaksi) }}">✏️ Edit</a> |
                <a href="{{ route('transaksi.delete', $t->id_transaksi) }}">🗑️ Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection