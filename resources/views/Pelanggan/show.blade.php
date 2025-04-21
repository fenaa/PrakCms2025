@extends('layouts.app')
@section('title', 'Detail Pelanggan')
@section('content')
<h2>Detail Pelanggan</h2>
<ul class="list-group">
  <li class="list-group-item"><strong>Nama:</strong> {{ $pelanggan['nama'] }}</li>
  <li class="list-group-item"><strong>Alamat:</strong> {{ $pelanggan['alamat'] }}</li>
  <li class="list-group-item"><strong>Jenis Kelamin:</strong> {{ $pelanggan['jenis_kelamin'] }}</li>
  <li class="list-group-item"><strong>Telepon:</strong> {{ $pelanggan['telepon'] }}</li>
  <li class="list-group-item"><strong>Email:</strong> {{ $pelanggan['email'] }}</li>
</ul>
<a href="/pelanggan" class="btn btn-secondary mt-3">Kembali</a>
@endsection
