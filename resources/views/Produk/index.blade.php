@extends('layouts.app')
@section('title', 'Data Produk')
@section('content')
<h2>Daftar Produk</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Jenis</th>
      <th>Harga</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($produks as $p)
    <tr>
      <td>{{ $p['id'] }}</td>  
      <td>{{ $p['jenis'] }}</td>
      <td>{{ $p['harga'] }}</td>
      <td>
        <a href="{{ url('produk/'.$p['id'].'/show') }}" class="btn btn-info btn-sm">Lihat</a>
        <a href="{{ url('produk/'.$p['id'].'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
        <a href="{{ url('produk/'.$p['id'].'/delete') }}" class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
