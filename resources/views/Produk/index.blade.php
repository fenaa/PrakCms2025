@extends('layouts.app')

@section('content')
    <h1>Daftar Produk</h1>

    {{-- Flash Message --}}
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 12px; margin-bottom: 16px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah --}}
    <a href="{{ route('produk.create') }}">➕ Tambah Produk</a>

    {{-- Form Pencarian dan Filter --}}
    <form method="GET" action="{{ route('produk.index') }}" style="margin: 16px 0;">
        <input type="text" name="search" placeholder="Cari jenis produk..." value="{{ request('search') }}">
        <label style="margin-left: 12px;">
            <input type="checkbox" name="stok_rendah" value="1" {{ request('stok_rendah') ? 'checked' : '' }}>
            Tampilkan hanya stok rendah (&lt; 10)
        </label>
        <button type="submit">🔍 Cari</button>
    </form>

    {{-- Style Tabel --}}
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

    {{-- Tabel Produk --}}
    <table>
        <thead>
            <tr>
                <th>ID Produk</th>
                <th>Jenis Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produks as $p)
                <tr>
                    <td>{{ $p->id_produk }}</td>
                    <td>{{ $p->jenis_produk }}</td>
                    <td>{{ $p->stok_produk }}</td>
                    <td>Rp {{ number_format($p->harga_produk, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('produk.show', $p->id_produk) }}" class="btn-cute btn-lihat">👁️ Lihat</a>
                        <a href="{{ route('produk.edit', $p->id_produk) }}" class="btn-cute btn-edit">✏️ Edit</a>
                        <form action="{{ route('produk.destroy', $p->id_produk) }}" method="POST" class="form-hapus" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn-cute btn-hapus" onclick="konfirmasiHapus(this)">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <div style="background-color: #f8d7da; color: #721c24; padding: 12px; border: 1px solid #f5c6cb; border-radius: 4px; text-align: center;">
                            @if(request('search'))
                                <strong>Produk dengan kata kunci "<em>{{ request('search') }}</em>" tidak ditemukan.</strong>
                            @else
                                <strong>Tidak ada produk tersedia.</strong>
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
