<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — BookStore</title>
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
<div class="admin-shell">

    <aside class="admin-sidebar">
        <div class="admin-brand">
            <div class="admin-brand__name">BookStore</div>
            <div class="admin-brand__role">Panel Admin</div>
        </div>

        <nav class="admin-nav">
            <div class="admin-nav__group">Ringkasan</div>
            <a href="{{ route('admin.dashboard') }}" @class(['is-active' => request()->routeIs('admin.dashboard')])>Dashboard</a>

            <div class="admin-nav__group">Katalog</div>
            <a href="{{ route('admin.categories.index') }}" @class(['is-active' => request()->routeIs('admin.categories.*')])>Kategori</a>
            <a href="{{ route('admin.books.index') }}" @class(['is-active' => request()->routeIs('admin.books.*')])>Buku</a>

            <div class="admin-nav__group">Transaksi</div>
            <a href="{{ route('admin.orders.index') }}" @class(['is-active' => request()->routeIs('admin.orders.*')])>
                Pesanan
                <span class="count">{{ \App\Models\Order::where('status', 'pending')->count() }}</span>
            </a>
            <a href="{{ route('admin.users.index') }}" @class(['is-active' => request()->routeIs('admin.users.*')])>Pelanggan</a>
            <a href="{{ route('admin.messages.index') }}" @class(['is-active' => request()->routeIs('admin.messages.*')])>
                Pesan
                <span class="count">{{ \App\Models\Message::where('is_read', false)->count() }}</span>
            </a>
        </nav>

        <div class="admin-sidebar__foot">
            <a href="{{ route('home') }}">&larr; Lihat Toko</a>
            <form method="POST" action="{{ route('logout') }}" class="admin-sidebar__logout">
                @csrf
                <button type="submit">Keluar</button>
            </form>
        </div>
    </aside>

    <main class="admin-main">
        @if(session('success') || session('error'))
            @if(session('success'))
                <div class="alert alert--success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert--error">{{ session('error') }}</div>
            @endif
        @endif

        @yield('content')
    </main>
</div>
@stack('scripts')
</body>
</html>
