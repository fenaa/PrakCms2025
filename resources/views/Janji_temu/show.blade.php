@extends('layouts.app')
@section('title', 'Detail Janji Temu')
@section('content')
<h2>Detail Janji Temu</h2>
<ul class="list-group">
  <li class="list-group-item"><strong>ID:</strong> {{ $janjiTemu['id'] }}</li>
  <li class="list-group-item"><strong>ID Pelanggan:</strong> {{ $janjiTemu['id_pelanggan'] }}</li>
  <li class="list-group-item"><strong>ID Karyawan:</strong> {{ $janjiTemu['id_karyawan'] }}</li>
  <li class="list-group-item"><strong>Tanggal:</strong> {{ $janjiTemu['tanggal'] }}</li>
  <li class="list-group-item"><strong>Waktu:</strong> {{ $janjiTemu['waktu'] }}</li>
  <li class="list-group-item"><strong>Status:</strong> {{ $janjiTemu['status'] }}</li>
</ul>
<a href="/janji-temu" class="btn btn-secondary mt-3">Kembali</a>
@endsection

