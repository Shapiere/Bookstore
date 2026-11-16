<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Beranda') — BookStore</title>
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="@yield('body_class')">
@php($cartCount = auth()->check() ? auth()->user()->carts()->sum('qty') : 0)

<header class="site-header">
    <div class="container header-inner">
        <a href="{{ route('home') }}" class="wordmark">BookStore</a>

        <nav class="site-nav">
            <a href="{{ route('home') }}" @class(['is-active' => request()->routeIs('home')])>Beranda</a>
            <a href="{{ route('catalog.index') }}" @class(['is-active' => request()->routeIs('catalog.*')])>Katalog</a>
            <a href="{{ route('about') }}" @class(['is-active' => request()->routeIs('about')])>Tentang Kami</a>
            <a href="{{ route('contact.show') }}" @class(['is-active' => request()->routeIs('contact.*')])>Kontak</a>
        </nav>

        <div class="header-actions">
            <a href="{{ route('cart.index') }}" class="header-link">
                Keranjang
                <span class="cart-count">{{ str_pad((string) $cartCount, 2, '0', STR_PAD_LEFT) }}</span>
            </a>

            @auth
                <a href="{{ route('orders.index') }}" class="header-link">Pesanan</a>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="header-link">Admin</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="header-link">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="header-link">Masuk</a>
                <a href="{{ route('register') }}" class="header-link">Daftar</a>
            @endauth
        </div>
    </div>
</header>

<main>
    {{-- Notifikasi melayang: tidak mendorong konten di bawahnya. --}}
    @if(session('success') || session('error'))
        <div class="flash-wrap" role="status" aria-live="polite">
            @if(session('success'))
                <div class="flash flash--success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="flash flash--error">{{ session('error') }}</div>
            @endif
        </div>
        <script>
            // Notifikasi melayang menutup sendiri setelah 5 detik.
            setTimeout(function () {
                var wrap = document.querySelector('.flash-wrap');
                if (wrap) { wrap.style.opacity = '0'; wrap.style.transition = 'opacity 300ms'; }
                setTimeout(function () { if (wrap) { wrap.remove(); } }, 300);
            }, 5000);
        </script>
    @endif

    @yield('content')
</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-brand">
            <span class="wordmark">BookStore</span>
            <p>Toko buku online yang menyediakan koleksi pilihan dari berbagai kategori untuk semua kalangan pembaca di Indonesia.</p>
        </div>

        <div>
            <h4>Navigasi</h4>
            <ul>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('catalog.index') }}">Katalog Buku</a></li>
                <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                <li><a href="{{ route('contact.show') }}">Kontak</a></li>
            </ul>
        </div>

        <div>
            <h4>Layanan</h4>
            <ul>
                <li><a href="{{ auth()->check() ? route('orders.index') : route('login') }}">Pesanan Saya</a></li>
                <li><a href="{{ route('cart.index') }}">Keranjang Belanja</a></li>
                <li><span>Senin – Sabtu, 08.00 – 20.00 WIB</span></li>
                <li><span>halo@bookstore.test</span></li>
                <li><span>(022) 1234-5678</span></li>
            </ul>
        </div>
    </div>

    <div class="container footer-bottom">
        <span>&copy; {{ date('Y') }} BookStore — Toko Buku Online</span>
        <span>Dibangun dengan Laravel &amp; MySQL</span>
    </div>
</footer>
@stack('scripts')
</body>
</html>
