<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — BookStore</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap.min.css') }}">
    <style>
        body { background: #f1f5f9; }
        .sidebar { background: #0f172a; min-height: 100vh; }
        .sidebar a { color: #cbd5e1; text-decoration: none; display: block; padding: .6rem 1rem; border-radius: .375rem; font-size: .925rem; }
        .sidebar a:hover { background: #1e293b; color: #fff; }
        .sidebar a.active { background: #2563eb; color: #fff; }
        .sidebar .brand { color: #fff; font-weight: 700; padding: 1.2rem 1rem; display: block; font-size: 1.05rem; }
        .sidebar .section { color: #64748b; font-size: .7rem; text-transform: uppercase; letter-spacing: .08em; padding: 1rem 1rem .35rem; }
    </style>
    @stack('styles')
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 sidebar p-0 d-none d-md-block">
            <a href="{{ route('admin.dashboard') }}" class="brand">📚 BookStore</a>
            <div class="px-2 pb-4">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                <div class="section">Katalog</div>
                <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">Kategori</a>
                <a href="{{ route('admin.books.index') }}" class="{{ request()->routeIs('admin.books.*') ? 'active' : '' }}">Buku</a>
                <div class="section">Transaksi</div>
                <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">Pesanan</a>
                <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">User</a>
                <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">Pesan</a>
                <div class="section">Lainnya</div>
                <a href="{{ route('home') }}">Lihat Toko</a>
            </div>
        </nav>

        <main class="col-md-9 col-lg-10 px-md-4 py-3">
            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                <div>
                    <h5 class="mb-0 fw-bold">@yield('heading', 'Admin')</h5>
                    <small class="text-muted">@yield('subheading', '')</small>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-danger">ADMIN</span>
                    <span class="small text-muted">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-sm btn-outline-secondary">Logout</button>
                    </form>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
<script src="{{ asset('vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/chart.umd.min.js') }}"></script>
@stack('scripts')
</body>
</html>
