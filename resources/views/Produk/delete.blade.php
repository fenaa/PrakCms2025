@extends('layouts.app')
@section('title', 'Hapus Produk')
@section('content')
<h2>Hapus Produk</h2>
<div class="alert alert-danger">
  <p>Apakah kamu yakin ingin menghapus data ini?</p>
  <form>
    <button class="btn btn-danger">Ya, Hapus</button>
    <a href="/produk" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
