@extends('layouts.app')

@section('content')
<h1>Daftar Karyawan</h1>

@if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 12px; margin-bottom: 16px; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('karyawan.create') }}">➕ Tambah Karyawan</a>

<form method="GET" action="{{ route('karyawan.index') }}" style="margin: 16px 0;">
    <input type="text" name="search" placeholder="Cari nama karyawan..." value="{{ request('search') }}">
    <button type="submit">🔍 Cari</button>
</form>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #333;
        padding: 8px;
        text-align: left;
        vertical-align: middle;
    }
    th {
        background-color: rgb(252, 152, 193);
    }
    tr:hover {
        background-color: #fafafa;
    }
    .dropdown-aksi {
        position: relative;
        display: inline-block;
    }
    .dropdown-btn {
        background: #f3e5f5;
        color: #4a148c;
        padding: 5px 10px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }
    .dropdown-menu {
        display: none;
        position: absolute;
        z-index: 1;
        background-color: white;
        box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
        padding: 8px 0;
        border-radius: 6px;
        right: 0;
        min-width: 120px;
    }
    .dropdown-menu a, .dropdown-menu button {
        display: block;
        padding: 6px 12px;
        text-decoration: none;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        font-size: 0.9rem;
        cursor: pointer;
    }
    .dropdown-menu a:hover, .dropdown-menu button:hover {
        background-color: #f0f0f0;
    }
    .dropdown-aksi:hover .dropdown-menu {
        display: block;
    }
</style>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Gaji</th>
            <th>Tanggal Bergabung</th>
            <th>No Telepon</th>
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
            <td>Rp {{ number_format($k->gaji_karyawan, 0, ',', '.') }}</td>
            <td>{{ \Carbon\Carbon::parse($k->tanggal_bergabung)->format('d-m-Y') }}</td>
            <td>{{ $k->nomor_telpon }}</td>
            <td>{{ $k->email }}</td>
            <td>
                <div class="dropdown-aksi">
                    <button class="dropdown-btn">⋮</button>
                    <div class="dropdown-menu">
                        <a href="{{ route('karyawan.show', $k->id_karyawan) }}">👁️ Lihat</a>
                        <a href="{{ route('karyawan.edit', $k->id_karyawan) }}">✏️ Edit</a>
                        <form action="{{ route('karyawan.destroy', $k->id_karyawan) }}" method="POST" class="form-hapus">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="konfirmasiHapus(this)">🗑️ Hapus</button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8">
                <div style="background-color: #f8d7da; color: #721c24; padding: 12px; border: 1px solid #f5c6cb; border-radius: 4px; text-align: center;">
                    @if(request('search'))
                        <strong>Data karyawan dengan "<em>{{ request('search') }}</em>" tidak ditemukan.</strong>
                    @else
                        <strong>Belum ada data karyawan.</strong>
                    @endif
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

{{-- Modal Konfirmasi Hapus --}}
<div id="modalHapus" style="display:none; position:fixed; inset:0; background-color:rgba(0,0,0,0.5); z-index:9999; justify-content:center; align-items:center;">
    <div style="background:#fff; padding:20px; border-radius:10px; text-align:center;">
        <p>Yakin ingin menghapus data ini?</p>
        <button onclick="submitHapus()" style="background-color:#e57373; color:white; border:none; padding:6px 12px; margin-right:10px; border-radius:6px;">Ya</button>
        <button onclick="batalHapus()" style="background-color:#eee; border:none; padding:6px 12px; border-radius:6px;">Batal</button>
    </div>
</div>

<script>
    let formToDelete = null;

    function konfirmasiHapus(button) {
        formToDelete = button.closest('form');
        document.getElementById('modalHapus').style.display = 'flex';
    }

    function submitHapus() {
        if (formToDelete) formToDelete.submit();
    }

    function batalHapus() {
        formToDelete = null;
        document.getElementById('modalHapus').style.display = 'none';
    }
</script>
@endsection
