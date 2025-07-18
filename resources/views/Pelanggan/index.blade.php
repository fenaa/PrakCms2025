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

        /* Cute Buttons */
        .btn-cute {
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: bold;
            text-decoration: none;
            margin: 0 2px;
        }

        .btn-lihat {
            background-color: #d1c4e9;
            color: #4a148c;
        }

        .btn-edit {
            background-color: #b2dfdb;
            color: #004d40;
        }

        .btn-hapus {
            background-color: #ffcdd2;
            color: #b71c1c;
            border: none;
            cursor: pointer;
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
                        <a href="{{ route('pelanggan.show', $p->id_pelanggan) }}" class="btn-cute btn-lihat">👁️ Lihat</a>
                        <a href="{{ route('pelanggan.edit', $p->id_pelanggan) }}" class="btn-cute btn-edit">✏️ Edit</a>
                        <form action="{{ route('pelanggan.destroy', $p->id_pelanggan) }}" method="POST" class="form-hapus" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn-cute btn-hapus" onclick="konfirmasiHapus(this)">🗑️ Hapus</button>
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

    {{-- Modal Hapus --}}
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
