@extends('layouts.app')
@section('title', 'Data Transaksi')
@section('content')
<h2>Daftar Transaksi</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>ID Janji Temu</th>
      <th>Tanggal</th>
      <th>Jumlah Produk</th>
      <th>Harga</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($transaksis as $t)
    <tr>
      <td>{{ $t['id'] }}</td>
      <td>{{ $t['id_janji_temu'] }}</td>
      <td>{{ $t['tanggal'] }}</td>
      <td>{{ $t['jumlah_produk'] }}</td>
      <td>{{ $t['harga'] }}</td>
      <td>
        <a href="{{ url('transaksi/'.$t['id'].'/show') }}" class="btn btn-info btn-sm">Lihat</a>
        <a href="{{ url('transaksi/'.$t['id'].'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
        <a href="{{ url('transaksi/'.$t['id'].'/delete') }}" class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
