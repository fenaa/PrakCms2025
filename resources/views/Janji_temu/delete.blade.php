@extends('layouts.app')
@section('title', 'Hapus Janji Temu')
@section('content')
<h2>Hapus Janji Temu</h2>
<div class="alert alert-danger">
  <p>Apakah kamu yakin ingin menghapus data ini?</p>
  <form>
    <button class="btn btn-danger">Ya, Hapus</button>
    <a href="/janji-temu" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
