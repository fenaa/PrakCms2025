@extends('layouts.app')

@section('content')
<h1>Tambah Janji Temu</h1>

<form action="{{ route('janjitemu.store') }}" method="POST">
    @csrf

    <label>Pelanggan:</label>
    <select name="id_pelanggan" required>
        @foreach($pelanggans as $p)
            <option value="{{ $p->id_pelanggan }}">{{ $p->nama_pelanggan }}</option>
        @endforeach
    </select><br>

    <label>Karyawan:</label>
    <select name="id_karyawan" required>
        @foreach($karyawans as $k)
            <option value="{{ $k->id_karyawan }}">{{ $k->nama_karyawan }}</option>
        @endforeach
    </select><br>

    <label>Produk:</label>
    <select name="id_produk" required>
        @foreach($produks as $p)
            <option value="{{ $p->id_produk }}">{{ $p->jenis_produk }}</option>
        @endforeach
    </select><br>

    <label>Tanggal:</label>
    <input type="date" name="tanggal" required><br>

    <label>Waktu:</label>
    <input type="time" name="waktu" required><br>

    <button type="submit">💾 Simpan</button>
</form>
@endsection
