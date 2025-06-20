@extends('layouts.app')

@section('content')
    <h1>Daftar Pelanggan</h1>

    {{-- Flash Message --}}
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 12px; margin-bottom: 16px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background-color: #f8d7da; color: #721c24; padding: 12px; margin-bottom: 16px; border: 1px solid #f5c6cb;">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('pelanggan.create') }}">➕ Tambah Pelanggan</a>

    {{-- Form Pencarian --}}
    <form method="GET" action="{{ route('pelanggan.index') }}" style="margin: 16px 0;">
        <input type="text" name="search" placeholder="Cari nama pelanggan..." value="{{ request('search') }}">
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
                <th>ID Pelanggan</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pelanggans as $p)
                <tr>
                    <td>{{ $p->id_pelanggan }}</td>
                    <td>{{ $p->nama_pelanggan }}</td>
                    <td>{{ $p->alamat_pelanggan }}</td>
                    <td>{{ $p->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $p->nomor_telpon }}</td>
                    <td>{{ $p->email }}</td>
                    <td>
                        <a href="{{ route('pelanggan.show', $p->id_pelanggan) }}">👁️ Lihat</a> |
                        <a href="{{ route('pelanggan.edit', $p->id_pelanggan) }}">✏️ Edit</a> |
                        <form action="{{ route('pelanggan.destroy', $p->id_pelanggan) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        <div style="background-color: #f8d7da; color: #721c24; padding: 12px; border: 1px solid #f5c6cb; border-radius: 4px; text-align: center;">
                            @if(request('search'))
                                <strong>Maaf, data pelanggan dengan kata kunci "<em>{{ request('search') }}</em>" tidak ditemukan.</strong>
                            @else
                                <strong>Maaf, tidak ada data pelanggan yang tersedia.</strong>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
