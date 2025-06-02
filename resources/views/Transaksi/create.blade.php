@extends('layouts.app')

@section('content')
<h1>Tambah Transaksi</h1>

<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf

    <label>Janji Temu:</label>
    <select name="id_janjitemu" required>
        @foreach($janji_temus as $jt)
            <option value="{{ $jt->id_janjitemu }}">{{ $jt->id_janjitemu }} - {{ $jt->pelanggan->nama_pelanggan }}</option>
        @endforeach
    </select><br>

    <label>Tanggal Transaksi:</label>
    <input type="date" name="tanggal_transaksi" required><br>

    <label>Jumlah Produk:</label>
    <input type="number" name="jumlah_produk" required><br>

    <label>Harga:</label>
    <input type="number" name="harga" required><br>

    <button type="submit">💾 Simpan</button>
</form>
@endsection