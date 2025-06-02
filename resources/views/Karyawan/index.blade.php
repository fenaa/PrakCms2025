@extends('layouts.app')

@section('content')
<h1>Daftar Karyawan</h1>

<a href="{{ route('karyawan.create') }}">➕ Tambah Karyawan</a>

{{-- Form Pencarian --}}
<form method="GET" action="{{ route('karyawan.index') }}" style="margin: 16px 0;">
    <input type="text" name="search" placeholder="Cari nama karyawan..." value="{{ request('search') }}">
    <button type="submit">🔍 Cari</button>
</form>

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

{{-- Tabel Data --}}
<table>
    <thead>
        <tr>
            <th>ID Karyawan</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Gaji</th>
            <th>Tanggal Bergabung</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($karyawans as $k)
            <tr>
                <td>{{ $k->id_karyawan }}</td>
                <td>{{ $k->nama_karyawan }}</td>
                <td>{{ $k->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ number_format($k->gaji_karyawan, 0, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($k->tanggal_bergabung)->format('Y-m-d') }}</td> {{-- Tanggal tanpa waktu --}}
                <td>{{ $k->nomor_telpon }}</td>
                <td>{{ $k->email }}</td>
                <td>
                    <a href="{{ route('karyawan.show', $k->id_karyawan) }}">👁️ Lihat</a> |
                    <a href="{{ route('karyawan.edit', $k->id_karyawan) }}">✏️ Edit</a> |
                    <form action="{{ route('karyawan.destroy', $k->id_karyawan) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️ Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">Tidak ada data ditemukan.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
