@extends('layouts.app')
@section('title', 'Edit Transaksi')
@section('content')
<h2>Edit Transaksi</h2>
<form>
  <div class="mb-3"><label>ID Janji Temu</label><input type="text" class="form-control" value="{{ $transaksi['id_janji_temu'] }}"></div>
  <div class="mb-3"><label>Tanggal</label><input type="text" class="form-control" value="{{ $transaksi['tanggal'] }}"></div>
  <div class="mb-3"><label>Jumlah Produk</label><input type="text" class="form-control" value="{{ $transaksi['jumlah_produk'] }}"></div>
  <div class="mb-3"><label>Harga</label><input type="text" class="form-control" value="{{ $transaksi['harga'] }}"></div>
  <button class="btn btn-primary">Simpan</button>
  <a href="/transaksi" class="btn btn-secondary">Batal</a>
</form>
@endsection
