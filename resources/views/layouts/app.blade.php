<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Kuliner Lombok')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- ================= HEADER ================= -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark shadow-sm">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold" href="/">🍽️ Kuliner Lombok</a>

        <!-- TOGGLE MOBILE -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- MENU KIRI -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                       href="/">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('semua') ? 'active' : '' }}"
                       href="{{ route('restaurant.semua') }}">
                        Semua Restoran
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- ================= END HEADER ================= -->


<!-- ================= CONTENT ================= -->
<main class="container py-4">
    @yield('content')
</main>
<!-- ================= END CONTENT ================= -->


<!-- ================= FOOTER ================= -->
<footer class="bg-dark text-light mt-2">
    <div class="container py-4">
        <div class="row">

            <div class="col-md-4 mb-3">
                <h5>🍽️ Kuliner Lombok</h5>
                <p class="small">
                    Platform review restoran terbaik di Pulau Lombok.
                </p>
            </div>

            <div class="col-md-4 mb-3">
                <h6>Menu</h6>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-light text-decoration-none">Home</a></li>
                    <li><a href="{{ route('restaurant.semua') }}" class="text-light text-decoration-none">Semua Restoran</a></li>
                </ul>
            </div>

            <div class="col-md-4 mb-3">
                <h6>Kontak</h6>
                <p class="small mb-1">Email: info@kulinerlombok.com</p>
                <p class="small mb-0">Lombok, Indonesia</p>
            </div>

        </div>

        <hr class="border-secondary">

        <p class="text-center small mb-0">
            © {{ date('Y') }} Kuliner Lombok. All rights reserved.
        </p>
    </div>
</footer>
<!-- ================= END FOOTER ================= -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
