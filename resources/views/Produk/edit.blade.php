@extends('layouts.app')

@section('content')
<h1>Edit Produk</h1>

<form action="{{ route('produk.update', $produk->id_produk) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Jenis Produk:</label>
    <input type="text" name="jenis_produk" value="{{ $produk->jenis_produk }}" required><br>

    <label>Stok:</label>
    <input type="number" name="stok_produk" value="{{ $produk->stok_produk }}" required><br>

    <label>Harga:</label>
    <input type="number" name="harga_produk" value="{{ $produk->harga_produk }}" required><br>

    <button type="submit">💾 Update</button>
</form>
@endsection