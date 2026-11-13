<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Beranda') — BookStore</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap.min.css') }}">
    <style>
        body { background: #f8f9fa; }
        .navbar-store { background: linear-gradient(135deg, #1e3a8a, #2563eb); }
        .navbar-store .nav-link, .navbar-store .navbar-brand { color: #fff !important; }
        .navbar-store .nav-link:hover { color: #c7d2fe !important; }
        .btn-store { background: #1e40af; color: #fff; border: none; }
        .btn-store:hover { background: #1e3a8a; color: #fff; }
        .card-book { transition: transform .15s ease, box-shadow .15s ease; }
        .card-book:hover { transform: translateY(-4px); box-shadow: 0 .5rem 1rem rgba(0,0,0,.12); }
        .cover-img { aspect-ratio: 5/7; object-fit: cover; width: 100%; }
        footer.store-footer { background: #111827; color: #9ca3af; }
    </style>
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-store shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">📚 BookStore</a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('catalog.index') }}">Katalog</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact.show') }}">Kontak</a></li>
            </ul>

            <ul class="navbar-nav align-items-lg-center">
                @auth
                    @php($cartCount = auth()->user()->carts()->sum('qty'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            🛒 Keranjang
                            @if($cartCount > 0)
                                <span class="badge bg-warning text-dark">{{ $cartCount }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Pesanan</a></li>
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a></li>
                    @endif
                    <li class="nav-item"><span class="nav-link">Halo, {{ auth()->user()->name }}</span></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-sm btn-outline-light ms-lg-2">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="btn btn-sm btn-light ms-lg-2" href="{{ route('register') }}">Daftar</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>
</main>

<footer class="store-footer py-4 mt-5">
    <div class="container text-center small">
        &copy; {{ date('Y') }} BookStore — Aplikasi Toko Buku Online. Dibangun dengan Laravel &amp; MySQL.
    </div>
</footer>

<script src="{{ asset('vendor/bootstrap.bundle.min.js') }}"></script>
@stack('scripts')
</body>
</html>
