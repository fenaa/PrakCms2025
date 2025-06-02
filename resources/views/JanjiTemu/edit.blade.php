@extends('layouts.app')

@section('content')
<h1>Edit Janji Temu</h1>

<form action="{{ route('janjitemu.update', $janji_temu->id_janjitemu) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Pelanggan:</label>
    <select name="id_pelanggan" required>
        @foreach($pelanggans as $p)
            <option value="{{ $p->id_pelanggan }}" {{ $janji_temu->id_pelanggan == $p->id_pelanggan ? 'selected' : '' }}>
                {{ $p->nama_pelanggan }}
            </option>
        @endforeach
    </select><br>

    <label>Karyawan:</label>
    <select name="id_karyawan" required>
        @foreach($karyawans as $k)
            <option value="{{ $k->id_karyawan }}" {{ $janji_temu->id_karyawan == $k->id_karyawan ? 'selected' : '' }}>
                {{ $k->nama_karyawan }}
            </option>
        @endforeach
    </select><br>

    <label>Produk:</label>
    <select name="id_produk" required>
        @foreach($produks as $p)
            <option value="{{ $p->id_produk }}" {{ $janji_temu->id_produk == $p->id_produk ? 'selected' : '' }}>
                {{ $p->jenis_produk }}
            </option>
        @endforeach
    </select><br>

    <label>Tanggal:</label>
    <input type="date" name="tanggal" value="{{ $janji_temu->tanggal }}" required><br>

    <label>Waktu:</label>
    <input type="time" name="waktu" value="{{ $janji_temu->waktu }}" required><br>

    <button type="submit">💾 Update</button>
</form>
@endsection
