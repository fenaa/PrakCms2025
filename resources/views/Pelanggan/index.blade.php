@extends('layouts.app')
@section('title', 'Daftar Pengguna')
@section('content')
<h2 class="mb-4">Daftar Pengguna</h2>
<table class="table table-bordered">
  <thead class="table-light">
    <tr>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Jenis Kelamin</th>
      <th>Nomor Telepon</th>
      <th>Email</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($pelanggans as $p)
    <tr>
      <td>{{ $p['nama'] }}</td>
      <td>{{ $p['alamat'] }}</td>
      <td>{{ $p['jenis_kelamin'] }}</td>
      <td>{{ $p['telepon'] }}</td>
      <td>{{ $p['email'] }}</td>
      <td>
        <a href="{{ url('pelanggan/'.$p['id'].'/show') }}" class="btn btn-info btn-sm">Lihat</a>
        <a href="{{ url('pelanggan/'.$p['id'].'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
        <a href="{{ url('pelanggan/'.$p['id'].'/delete') }}" class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
