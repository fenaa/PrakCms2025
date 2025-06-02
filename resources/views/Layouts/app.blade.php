<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Glamzzar Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #fff0f6; /* latar belakang yang lembut */
        }

        /* Navbar hot pink */
        .navbar {
            background-color: #FF69B4 !important;
        }

        /* Teks navbar putih agar kontras */
        .navbar .nav-link,
        .navbar-brand {
            color: white !important;
        }
        .navbar .nav-link:hover,
        .navbar-brand:hover {
            color: #ffd1e8 !important;
        }

        /* Tombol utama warna hot pink */
        .btn-primary {
            background-color: #FF69B4;
            border-color: #FF69B4;
            color: white;
        }
        .btn-primary:hover {
            background-color: #e55a9d;
            border-color: #e55a9d;
        }

        /* Tombol outline hot pink */
        .btn-outline-primary {
            border-color: #FF69B4;
            color: #FF69B4;
        }
        .btn-outline-primary:hover {
            background-color: #FF69B4;
            color: white;
        }

        /* Footer hot pink */
        footer {
            background-color: #FF69B4 !important;
            color: white;
        }

        /* Tabel tetap putih agar nyaman dibaca */
        .table {
            background-color: white;
        }

        /* Link aksi di tabel */
        .action-links a {
            margin: 0 5px;
        }
    </style>

    @stack('styles')
</head>
<body>
    @include('partials.navbar')

    <div class="container py-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="text-center py-3 mt-4">
        <div class="container">
            <p class="mb-0">© 2025 Glamzzar Salon. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
