@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>

    {{-- Flash Message --}}
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 12px; margin-bottom: 16px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <style>
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 20px;
        }

        .card {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 12px;
            background-color: #fff0f5;
            text-align: center;
            font-weight: bold;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
        }

        .card h2 {
            margin: 0;
            font-size: 2em;
            color: #e91e63;
        }

        .card p {
            margin-top: 8px;
            color: #555;
            font-size: 1rem;
        }
    </style>

    <div class="dashboard-grid">
        <div class="card">
            <h2>{{ $jumlahPelanggan }}</h2>
            <p>Total Pelanggan</p>
        </div>
        <div class="card">
            <h2>{{ $jumlahProduk }}</h2>
            <p>Total Produk</p>
        </div>
        <div class="card">
            <h2>{{ $jumlahTransaksiHariIni }}</h2>
            <p>Transaksi Hari Ini</p>
        </div>
        <div class="card">
            <h2>Rp {{ number_format($totalPendapatanHariIni, 0, ',', '.') }}</h2>
            <p>Pendapatan Hari Ini</p>
        </div>
    </div>
@endsection
