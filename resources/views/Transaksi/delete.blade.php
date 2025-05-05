@extends('layouts.app')
@section('title', 'Hapus Transaksi')
@section('content')
<h2>Hapus Transaksi</h2>
<div class="alert alert-danger">
  <p>Apakah kamu yakin ingin menghapus data ini?</p>
  <form>
    <button class="btn btn-danger">Ya, Hapus</button>
    <a href="/transaksi" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
