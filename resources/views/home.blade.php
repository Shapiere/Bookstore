@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="p-5 mb-4 rounded-3 text-white" style="background: linear-gradient(135deg, #1e3a8a, #2563eb);">
    <div class="container-fluid py-3">
        <h1 class="display-6 fw-bold">Temukan Buku Favoritmu</h1>
        <p class="lead mb-4">Toko buku online dengan koleksi pilihan dari berbagai kategori.</p>
        <form action="{{ route('catalog.index') }}" method="GET" class="row g-2" style="max-width: 600px;">
            <div class="col">
                <input type="text" name="q" class="form-control form-control-lg" placeholder="Cari judul, penulis, atau penerbit...">
            </div>
            <div class="col-auto">
                <button class="btn btn-light btn-lg fw-semibold">Cari Buku</button>
            </div>
        </form>
    </div>
</div>

<div class="mb-4">
    <h5 class="fw-bold mb-3">Kategori</h5>
    <div class="d-flex flex-wrap gap-2">
        @foreach($categories as $cat)
            <a href="{{ route('catalog.index', ['category' => $cat->id]) }}" class="btn btn-outline-primary btn-sm">
                {{ $cat->name }} <span class="badge bg-primary ms-1">{{ $cat->books_count }}</span>
            </a>
        @endforeach
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Buku Terbaru</h5>
    <a href="{{ route('catalog.index') }}" class="btn btn-sm btn-outline-secondary">Lihat Semua</a>
</div>

<div class="row g-3">
    @foreach($latest as $book)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card card-book h-100 border-0 shadow-sm">
                <a href="{{ route('catalog.show', $book) }}">
                    <img src="{{ $book->cover_image ? asset('storage/'.$book->cover_image) : 'https://via.placeholder.com/400x560?text=No+Cover' }}"
                         class="card-img-top cover-img rounded-top" alt="{{ $book->title }}">
                </a>
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-secondary align-self-start mb-1">{{ $book->category->name }}</span>
                    <h6 class="card-title mb-1">{{ Str::limit($book->title, 42) }}</h6>
                    <p class="text-muted small mb-2">{{ $book->author }}</p>
                    <div class="mt-auto d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-primary">Rp {{ number_format($book->price, 0, ',', '.') }}</span>
                        <span class="badge {{ $book->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                            {{ $book->stock > 0 ? 'Stok '.$book->stock : 'Habis' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
