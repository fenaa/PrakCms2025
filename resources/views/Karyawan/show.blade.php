@extends('layouts.app')
@section('title', 'Detail Karyawan')
@section('content')
<h2>Detail Karyawan</h2>
<ul class="list-group">
  <li class="list-group-item"><strong>ID:</strong> {{ $karyawan['id'] }}</li> 
  <li class="list-group-item"><strong>Nama:</strong> {{ $karyawan['nama'] }}</li>
  <li class="list-group-item"><strong>Jenis Kelamin:</strong> {{ $karyawan['jenis_kelamin'] }}</li>
  <li class="list-group-item"><strong>Tanggal Bergabung:</strong> {{ $karyawan['tanggal_gabung'] }}</li>
  <li class="list-group-item"><strong>Gaji:</strong> {{ $karyawan['gaji'] }}</li>
  <li class="list-group-item"><strong>Telepon:</strong> {{ $karyawan['telepon'] }}</li>
  <li class="list-group-item"><strong>Email:</strong> {{ $karyawan['email'] }}</li>
</ul>
<a href="/karyawan" class="btn btn-secondary mt-3">Kembali</a>
@endsection
