@extends('layouts.app')

@section('content')
<h1>Edit Transaksi</h1>

<form action="{{ route('transaksi.update', $transaksi->id_transaksi) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Janji Temu:</label>
    <select name="id_janjitemu" required>
        @foreach($janji_temus as $jt)
            <option value="{{ $jt->id_janjitemu }}" {{ $transaksi->id_janjitemu == $jt->id_janjitemu ? 'selected' : '' }}>
                {{ $jt->id_janjitemu }} - {{ $jt->pelanggan->nama_pelanggan }}
            </option>
        @endforeach
    </select><br>

    <label>Tanggal Transaksi:</label>
    <input type="date" name="tanggal_transaksi" value="{{ $transaksi->tanggal_transaksi }}" required><br>

    <label>Jumlah Produk:</label>
    <input type="number" name="jumlah_produk" value="{{ $transaksi->jumlah_produk }}" required><br>

    <label>Harga:</label>
    <input type="number" name="harga" value="{{ $transaksi->harga }}" required><br>

    <button type="submit">💾 Update</button>
</form>
@endsection