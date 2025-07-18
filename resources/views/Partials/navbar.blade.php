<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="font-weight: bold; font-size: 1.2rem; color: white;">
            <i class="bi bi-scissors me-2" style="font-size: 1.5rem;"></i> Glamzzar Salon
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ request()->routeIs('pelanggan.*') ? 'text-white border-bottom border-2 border-white' : 'text-white' }}"
                       href="{{ route('pelanggan.index') }}">
                        Pelanggan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-bold {{ request()->routeIs('karyawan.*') ? 'text-white border-bottom border-2 border-white' : 'text-white' }}"
                       href="{{ route('karyawan.index') }}">
                        Karyawan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-bold {{ request()->routeIs('produk.*') ? 'text-white border-bottom border-2 border-white' : 'text-white' }}"
                       href="{{ route('produk.index') }}">
                        Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-bold {{ request()->routeIs('janjitemu.*') ? 'text-white border-bottom border-2 border-white' : 'text-white' }}"
                       href="{{ route('janjitemu.index') }}">
                        Janji Temu
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-bold {{ request()->routeIs('transaksi.*') ? 'text-white border-bottom border-2 border-white' : 'text-white' }}"
                       href="{{ route('transaksi.index') }}">
                        Transaksi
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
