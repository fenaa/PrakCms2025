@extends('layouts.app')

@section('content')
<h1>Daftar Janji Temu</h1>

<a href="{{ route('janjitemu.create') }}">➕ Tambah Janji Temu</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

{{-- Style Table --}}
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #333;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: rgb(252, 152, 193);
    }
    tr:hover {
        background-color: #fafafa;
    }
</style>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Pelanggan</th>
            <th>Karyawan</th>
            <th>Produk</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($janjiTemus as $jt)
        <tr>
            <td>{{ $jt->id_janjitemu }}</td>
            <td>{{ $jt->pelanggan->nama_pelanggan }}</td>
            <td>{{ $jt->karyawan->nama_karyawan }}</td>
            <td>{{ $jt->produk->jenis_produk }}</td>
            <td>{{ $jt->tanggal }}</td>
            <td>{{ $jt->waktu }}</td>
            <td>
                <a href="{{ route('janjitemu.show', $jt->id_janjitemu) }}">👁️ Lihat</a>
                <a href="{{ route('janjitemu.edit', $jt->id_janjitemu) }}">✏️Edit</a>
                <form action="{{ route('janjitemu.destroy', $jt->id_janjitemu) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin hapus?')">🗑️ Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
