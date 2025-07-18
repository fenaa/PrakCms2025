@extends('layouts.app')

@section('content')
    <h1>Daftar Janji Temu</h1>

    {{-- Flash Message --}}
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 12px; margin-bottom: 16px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('janjitemu.create') }}">➕ Tambah Janji Temu</a>

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
        .btn-cute {
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: bold;
            text-decoration: none;
            margin: 0 2px;
        }
        .btn-lihat { background-color: #d1c4e9; color: #4a148c; }
        .btn-edit { background-color: #b2dfdb; color: #004d40; }
        .btn-hapus { background-color: #ffcdd2; color: #b71c1c; border: none; cursor: pointer; }
    </style>

    {{-- Tabel Data --}}
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
            @forelse ($janjiTemus as $jt)
                <tr>
                    <td>{{ $jt->id_janjitemu }}</td>
                    <td>{{ $jt->pelanggan->nama_pelanggan }}</td>
                    <td>{{ $jt->karyawan->nama_karyawan }}</td>
                    <td>{{ $jt->produk->jenis_produk }}</td>
                    <td>{{ \Carbon\Carbon::parse($jt->tanggal)->format('Y-m-d') }}</td>
                    <td>{{ $jt->waktu }}</td>
                    <td>
                        <a href="{{ route('janjitemu.show', $jt->id_janjitemu) }}" class="btn-cute btn-lihat">👁️ Lihat</a>
                        <a href="{{ route('janjitemu.edit', $jt->id_janjitemu) }}" class="btn-cute btn-edit">✏️ Edit</a>
                        <form action="{{ route('janjitemu.destroy', $jt->id_janjitemu) }}" method="POST" class="form-hapus" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn-cute btn-hapus" onclick="konfirmasiHapus(this)">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center; color:#999;">Tidak ada data janji temu.</td>
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

    {{-- Script Konfirmasi Hapus --}}
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
