@extends('layouts.app')

@section('content')
<h1>Daftar Transaksi</h1>

<a href="{{ route('transaksi.create') }}">➕ Tambah Transaksi</a>

{{-- Style Table --}}
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #333;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: rgb(252, 152, 193);
    }
    tr:hover {
        background-color: #fafafa;
    }
</style>

<table>
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
                <form action="{{ route('transaksi.destroy', $t->id_transaksi) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">🗑️ Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
