@extends('layouts.app')

@section('title', 'Beranda - Glamzzar Salon')

@section('content')
<div class="py-5 text-center" style="background-color: #ffe4f1;">
    <img class="d-block mx-auto mb-4 rounded-circle" 
         src="{{ asset('images/da86792228b5276bcd7b364afc7d5bfe.jpg') }}" 
         alt="Glamzzar Salon" 
         width="150" 
         style="object-fit: cover;">
    <h1 class="display-4 fw-bold" style="color: #FF69B4;">Selamat Datang di Glamzzar Salon</h1>
    <p class="lead">Kami siap membantu Anda tampil lebih memukau ✨</p>

    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title" style="color: #FF69B4;">Pelanggan</h5>
                    <p class="card-text">Kelola data pelanggan salon kami</p>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-primary">Kelola Pelanggan</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title" style="color: #FF69B4;">Janji Temu</h5>
                    <p class="card-text">Atur jadwal kunjungan pelanggan</p>
                    <a href="{{ route('janjitemu.index') }}" class="btn btn-outline-primary">Kelola Janji Temu</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title" style="color: #FF69B4;">Transaksi</h5>
                    <p class="card-text">Catat semua transaksi yang terjadi</p>
                    <a href="{{ route('transaksi.index') }}" class="btn btn-outline-primary">Kelola Transaksi</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title" style="color: #FF69B4;">Karyawan</h5>
                    <p class="card-text">Kelola data tim profesional kami</p>
                    <a href="{{ route('karyawan.index') }}" class="btn btn-outline-primary">Kelola Karyawan</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title" style="color: #FF69B4;">Produk</h5>
                    <p class="card-text">Kelola produk dan layanan kami</p>
                    <a href="{{ route('produk.index') }}" class="btn btn-outline-primary">Kelola Produk</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="p-5 rounded-lg m-3" style="background-color: #ffe4f1;">
    <h2 class="text-center mb-4" style="color: #FF69B4;">Kenapa Memilih Glamzzar Salon?</h2>
    <div class="row text-center">
        <div class="col-md-4">
            <div class="p-3">
                <i class="bi bi-star-fill text-warning" style="font-size: 2rem;"></i>
                <h4>Profesional</h4>
                <p>Tim ahli dengan pengalaman bertahun-tahun</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3">
                <i class="bi bi-gem" style="font-size: 2rem; color: #FF69B4;"></i>
                <h4 style="color: #FF69B4;">Kualitas</h4>
                <p>Produk berkualitas tinggi untuk hasil terbaik</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3">
                <i class="bi bi-heart-fill text-danger" style="font-size: 2rem;"></i>
                <h4>Nyaman</h4>
                <p>Pengalaman salon yang menyenangkan</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<style>
    .card {
        transition: transform 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush
