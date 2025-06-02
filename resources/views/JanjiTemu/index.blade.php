@extends('layouts.app')

@section('content')
<h1>Daftar Janji Temu</h1>

<a href="{{ route('janjitemu.create') }}">➕ Tambah Janji Temu</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">
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
                <a href="{{ route('janjitemu.show', $jt->id_janjitemu) }}">👁️</a>
                <a href="{{ route('janjitemu.edit', $jt->id_janjitemu) }}">✏️</a>
                <form action="{{ route('janjitemu.destroy', $jt->id_janjitemu) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin hapus?')">🗑️</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
