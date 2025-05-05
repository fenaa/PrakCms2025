@extends('layouts.app')
@section('title', 'Edit Produk')
@section('content')
<h2>Edit Produk</h2>
<form>
  <div class="mb-3"><label>ID</label><input type="text" class="form-control" value="{{ $produk['id'] }}"></div>
  <div class="mb-3"><label>Jenis</label><input type="text" class="form-control" value="{{ $produk['jenis'] }}"></div>
  <div class="mb-3"><label>Stok</label><input type="text" class="form-control" value="{{ $produk['stok'] }}"></div>
  <div class="mb-3"><label>Harga</label><input type="text" class="form-control" value="{{ $produk['harga'] }}"></div>
  <button class="btn btn-primary">Simpan</button>
  <a href="/produk" class="btn btn-secondary">Batal</a>
</form>
@endsection
