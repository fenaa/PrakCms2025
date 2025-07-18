@extends('layouts.app')

@section('title', 'Beranda - Glamzzar Salon')

@section('content')
<div class="py-5 text-center fade-in theme-bg-header">
    <i class="bi bi-scissors theme-text" style="font-size: 3rem;"></i>
    <h1 class="display-4 fw-bold mt-3 theme-text">Selamat Datang di Glamzzar Salon</h1>
</div>

<div class="container mt-5">
    <div class="row text-center">
        @php
            $menu = [
                ['icon' => 'bi-people-fill', 'title' => 'Pelanggan', 'text' => 'Kelola data pelanggan salon kami', 'route' => 'pelanggan.index'],
                ['icon' => 'bi-calendar-heart', 'title' => 'Janji Temu', 'text' => 'Atur jadwal kunjungan pelanggan', 'route' => 'janjitemu.index'],
                ['icon' => 'bi-receipt', 'title' => 'Transaksi', 'text' => 'Catat semua transaksi yang terjadi', 'route' => 'transaksi.index'],
                ['icon' => 'bi-person-badge', 'title' => 'Karyawan', 'text' => 'Kelola data tim profesional kami', 'route' => 'karyawan.index'],
                ['icon' => 'bi-bag-heart', 'title' => 'Produk', 'text' => 'Kelola produk dan layanan kami', 'route' => 'produk.index'],
            ];
        @endphp
        @foreach ($menu as $index => $item)
            <div class="col-md-{{ $index < 3 ? 4 : 6 }} mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <i class="bi {{ $item['icon'] }} theme-text" style="font-size: 2rem;"></i>
                        <h5 class="card-title mt-2 theme-text">{{ $item['title'] }}</h5>
                        <p class="card-text">{{ $item['text'] }}</p>
                        <a href="{{ route($item['route']) }}" class="btn btn-gold">Kelola {{ $item['title'] }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="p-5 rounded-lg m-3 theme-bg-light">
    <h2 class="text-center mb-4 theme-text">Kenapa Memilih Glamzzar Salon?</h2>
    <div class="row text-center">
        <div class="col-md-4">
            <div class="p-3">
                <i class="bi bi-award" style="font-size: 2rem; color: goldenrod;"></i>
                <h4>Profesional</h4>
                <p>Tim ahli dengan pengalaman bertahun-tahun</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3">
                <i class="bi bi-gem theme-text" style="font-size: 2rem;"></i>
                <h4 class="theme-text">Kualitas</h4>
                <p>Produk berkualitas tinggi untuk hasil terbaik</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3">
                <i class="bi bi-heart-fill" style="font-size: 2rem; color: #dc3545;"></i>
                <h4>Nyaman</h4>
                <p>Pengalaman salon yang menyenangkan & bersih</p>
            </div>
        </div>
    </div>
</div>

<div class="text-center py-5 theme-bg-cta rounded-3">
    <h4 class="mb-3 fw-bold theme-text">Siap Tampil Lebih Cantik?</h4>
    <p class="mb-4">Pesan janji temu dengan stylist terbaik kami sekarang juga!</p>
    <a href="{{ route('janjitemu.create') }}" class="btn btn-lg btn-gold shadow-sm">Buat Janji Sekarang</a>
</div>

{{-- Bagian Instagram --}}
<div class="text-center py-4">
    <a href="https://www.instagram.com/trifena._/profilecard/?igsh=dmtsdWQ4dDg4YW81" target="_blank" class="text-decoration-none">
        <i class="bi bi-instagram" style="font-size: 1.5rem; color: var(--main-color, #C28840);"></i>
        <span class="ms-2 theme-text">Ikuti kami di Instagram</span>
    </a>
</div>

<div class="theme-switcher">
    <button class="theme-button" style="background-color: #FF69B4;" onclick="applyTheme('#FF69B4', '#ffe4f1', '#fff2f8')"></button>
    <button class="theme-button" style="background-color: #FF7F50;" onclick="applyTheme('#FF7F50', '#ffe5b4', '#fff2e5')"></button>
    <button class="theme-button" style="background-color: #b76e79;" onclick="applyTheme('#b76e79', '#fceae8', '#fdeff2')"></button>
    <button class="theme-button" style="background-color: #6B8E23;" onclick="applyTheme('#6B8E23', '#eaf4dc', '#f4fae8')"></button>
    <button class="theme-button" style="background-color: #5D8AA8;" onclick="applyTheme('#5D8AA8', '#e0ebf5', '#eaf2fa')"></button>
    <button class="theme-button" style="background-color: #C28840;" onclick="applyTheme('#C28840', '#fff8dc', '#fff5dd')"></button>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<style>
    .card {
        transition: transform 0.3s;
        border-radius: 1rem;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(194, 136, 64, 0.2);
    }
    .btn-gold {
        background-color: var(--main-color, #C28840);
        color: white;
        border: none;
    }
    .btn-gold:hover {
        background-color: var(--btn-hover-color, #d09a5d);
        color: white;
    }
    .fade-in {
        animation: fadeIn 1.5s ease-in-out;
    }
    @keyframes fadeIn {
        0% {opacity: 0;}
        100% {opacity: 1;}
    }
    .theme-text {
        color: var(--main-color, #C28840);
    }
    .theme-bg-header {
        background: linear-gradient(135deg, var(--light-bg, #fff8dc), var(--light-bg, #f5deb3));
        border-radius: 0 0 2rem 2rem;
    }
    .theme-bg-light {
        background-color: var(--light-bg, #fffdf3);
    }
    .theme-bg-cta {
        background: linear-gradient(135deg, var(--cta-bg, #fef9eb), var(--cta-bg, #fff5dd));
    }
    .theme-switcher {
        position: fixed;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        z-index: 9999;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    .theme-button {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 2px solid #fff;
        cursor: pointer;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
        transition: transform 0.2s ease;
    }
    .theme-button:hover {
        transform: scale(1.2);
    }
</style>
@endpush

@push('scripts')
<script>
    function applyTheme(mainColor, lightBg, ctaBg) {
        const btnHoverColor = shadeColor(mainColor, -10);
        const theme = {
            mainColor,
            lightBg,
            ctaBg,
            btnHoverColor
        };
        localStorage.setItem('theme', JSON.stringify(theme));

        document.documentElement.style.setProperty('--main-color', mainColor);
        document.documentElement.style.setProperty('--light-bg', lightBg);
        document.documentElement.style.setProperty('--cta-bg', ctaBg);
        document.documentElement.style.setProperty('--btn-hover-color', btnHoverColor);
        document.documentElement.style.setProperty('--navbar-color', mainColor);

        // Ubah navbar agar ikut tema
        const navbar = document.querySelector('.navbar');
        if (navbar) navbar.style.backgroundColor = mainColor;
    }

    function shadeColor(color, percent) {
        const num = parseInt(color.replace("#", ""), 16),
              amt = Math.round(2.55 * percent),
              R = (num >> 16) + amt,
              G = (num >> 8 & 0x00FF) + amt,
              B = (num & 0x0000FF) + amt;
        return "#" + (
            0x1000000 + 
            (R < 255 ? (R < 1 ? 0 : R) : 255) * 0x10000 + 
            (G < 255 ? (G < 1 ? 0 : G) : 255) * 0x100 + 
            (B < 255 ? (B < 1 ? 0 : B) : 255)
        ).toString(16).slice(1);
    }

    // Jika sudah ada tema tersimpan, terapkan saat load halaman
    document.addEventListener('DOMContentLoaded', function () {
        const theme = localStorage.getItem('theme');
        if (theme) {
            const t = JSON.parse(theme);
            applyTheme(t.mainColor, t.lightBg, t.ctaBg);
        }
    });
</script>
@endpush
