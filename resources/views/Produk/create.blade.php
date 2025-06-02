@extends('layouts.app')

@section('content')
<h1>Tambah Produk</h1>

<form action="{{ route('produk.store') }}" method="POST">
    @csrf

    <label>Jenis Produk:</label>
    <input type="text" name="jenis_produk" required><br>

    <label>Stok:</label>
    <input type="number" name="stok_produk" required><br>

    <label>Harga:</label>
    <input type="number" name="harga_produk" required><br>

    <button type="submit">💾 Simpan</button>
</form>
@endsection