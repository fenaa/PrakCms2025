@extends('layouts.app')
@section('title', 'Data Janji Temu')
@section('content')
<h2>Daftar Janji Temu</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>ID Pelanggan</th>
      <th>Tanggal</th>
      <th>Waktu</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($janjiTemus as $j)
    <tr>
      <td>{{ $j['id'] }}</td>
      <td>{{ $j['id_pelanggan'] }}</td>
      <td>{{ $j['tanggal'] }}</td>
      <td>{{ $j['waktu'] }}</td>
      <td>{{ $j['status'] }}</td>
      <td>
        <a href="{{ url('janji-temu/'.$j['id'].'/show') }}" class="btn btn-info btn-sm">Lihat</a>
        <a href="{{ url('janji-temu/'.$j['id'].'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
        <a href="{{ url('janji-temu/'.$j['id'].'/delete') }}" class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
