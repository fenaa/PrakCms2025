@extends('layouts.app')
@section('title', 'Data Karyawan')
@section('content')
<h2>Daftar Karyawan</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Telepon</th>
      <th>Email</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($karyawans as $k)
    <tr>
     <td>{{ $k['id'] }}</td>
      <td>{{ $k['nama'] }}</td>
      <td>{{ $k['jenis_kelamin'] }}</td>
      <td>{{ $k['telepon'] }}</td>
      <td>{{ $k['email'] }}</td>
      <td>
        <a href="{{ url('karyawan/'.$k['id'].'/show') }}" class="btn btn-info btn-sm">Lihat</a>
        <a href="{{ url('karyawan/'.$k['id'].'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
        <a href="{{ url('karyawan/'.$k['id'].'/delete') }}" class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
