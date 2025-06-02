@extends('layouts.app')

@section('content')
<h1>Daftar Produk</h1>

<a href="{{ route('produk.create') }}">➕ Tambah Produk</a>

{{-- Form pencarian dan filter --}}
<form action="{{ route('produk.index') }}" method="GET" style="margin: 16px 0;">
    <input type="text" name="search" placeholder="Cari jenis produk..." value="{{ request('search') }}">

    <label style="margin-left: 12px;">
        <input type="checkbox" name="stok_rendah" value="1" {{ request('stok_rendah') ? 'checked' : '' }}>
        Tampilkan hanya stok rendah (&lt; 10)
    </label>

    <button type="submit">🔍 Cari</button>
</form>

@if (session('success'))
    <div style="color: green; margin-bottom: 12px;">
        {{ session('success') }}
    </div>
@endif

<style>
    table {
        border-collapse: collapse;
        width: 80%;
    }
    th, td {
        border: 1px solid #333;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: rgb(252, 152, 193); /* warna header sama */
    }
    tr:hover {
        background-color: #fafafa;
    }
</style>

{{-- Tabel Data Produk --}}
<table>
    <thead>
        <tr>
            <th>ID Produk</th>
            <th>Jenis Produk</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($produks as $p)
        <tr>
            <td>{{ $p->id_produk }}</td>
            <td>{{ $p->jenis_produk }}</td>
            <td>{{ $p->stok_produk }}</td>
            <td>Rp {{ number_format($p->harga_produk, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('produk.show', $p->id_produk) }}">👁️ Lihat</a> |
                <a href="{{ route('produk.edit', $p->id_produk) }}">✏️ Edit</a> |
                <form action="{{ route('produk.destroy', $p->id_produk) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️ Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">Tidak ada produk yang ditemukan.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
