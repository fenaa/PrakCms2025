<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="https://via.placeholder.com/40" alt="Logo" width="30" height="30" class="d-inline-block align-top me-2">
            Glamzzar Salon
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('/')) active @endif" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('pelanggan*')) active @endif" href="{{ route('pelanggan.index') }}">Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('karyawan*')) active @endif" href="{{ route('karyawan.index') }}">Karyawan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('produk*')) active @endif" href="{{ route('produk.index') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('janjitemu*')) active @endif" href="{{ route('janjitemu.index') }}">Janji Temu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('transaksi*')) active @endif" href="{{ route('transaksi.index') }}">Transaksi</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-person-circle"></i> Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>