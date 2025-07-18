@extends('layouts.app')

@section('content')
    <h1>Daftar Transaksi</h1>

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

    <a href="{{ route('transaksi.create') }}">➕ Tambah Transaksi</a>

    {{-- Form Pencarian --}}
    <form method="GET" action="{{ route('transaksi.index') }}" style="margin: 16px 0;">
        <input type="text" name="search" placeholder="Cari ID Janji Temu..." value="{{ request('search') }}">
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
                <th>ID Transaksi</th>
                <th>ID Janji Temu</th>
                <th>Tanggal Transaksi</th>
                <th>Jumlah Produk</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksis as $t)
                <tr>
                    <td>{{ $t->id_transaksi }}</td>
                    <td>{{ $t->janji_temu->id_janjitemu }}</td>
                    <td>{{ \Carbon\Carbon::parse($t->tanggal_transaksi)->format('Y-m-d') }}</td>
                    <td>{{ $t->jumlah_produk }}</td>
                    <td>{{ number_format($t->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('transaksi.show', $t->id_transaksi) }}" class="btn-cute btn-lihat">👁️ Lihat</a>
                        <a href="{{ route('transaksi.edit', $t->id_transaksi) }}" class="btn-cute btn-edit">✏️ Edit</a>
                        <form action="{{ route('transaksi.destroy', $t->id_transaksi) }}" method="POST" class="form-hapus" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn-cute btn-hapus" onclick="konfirmasiHapus(this)">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <div style="background-color: #f8d7da; color: #721c24; padding: 12px; border: 1px solid #f5c6cb; border-radius: 4px; text-align: center;">
                            @if(request('search'))
                                <strong>Maaf, transaksi dengan kata kunci "<em>{{ request('search') }}</em>" tidak ditemukan.</strong>
                            @else
                                <strong>Maaf, tidak ada data transaksi yang tersedia.</strong>
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

    {{-- Script Konfirmasi --}}
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
