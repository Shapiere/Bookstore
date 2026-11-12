@extends('layouts.app')

@section('title', 'Katalog Buku')

@section('content')
<h4 class="fw-bold mb-3">Katalog Buku</h4>

<form method="GET" action="{{ route('catalog.index') }}" class="card card-body border-0 shadow-sm mb-4">
    <div class="row g-2 align-items-end">
        <div class="col-md-4">
            <label class="form-label small fw-semibold">Cari</label>
            <input type="text" name="q" value="{{ $keyword }}" class="form-control" placeholder="Judul / penulis / penerbit">
        </div>
        <div class="col-md-3">
            <label class="form-label small fw-semibold">Kategori</label>
            <select name="category" class="form-select">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected($categoryId == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label small fw-semibold">Urutkan</label>
            <select name="sort" class="form-select">
                <option value="latest" @selected($sort === 'latest')>Terbaru</option>
                <option value="price_asc" @selected($sort === 'price_asc')>Harga Terendah</option>
                <option value="price_desc" @selected($sort === 'price_desc')>Harga Tertinggi</option>
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-bn w-100">Terapkan</button>
        </div>
    </div>
</form>

<p class="text-muted small">Menampilkan {{ $books->total() }} buku</p>

@if($books->isEmpty())
    <div class="alert alert-warning">Tidak ada buku yang cocok dengan pencarian Anda.</div>
@else
<div class="row g-3">
    @foreach($books as $book)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card card-book h-100 border-0 shadow-sm">
                <a href="{{ route('catalog.show', $book) }}">
                    <img src="{{ $book->cover_image ? asset('storage/'.$book->cover_image) : '' }}"
                         class="card-img-top cover-img rounded-top" alt="{{ $book->title }}">
                </a>
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-secondary align-self-start mb-1">{{ $book->category->name }}</span>
                    <h6 class="card-title mb-1">{{ Str::limit($book->title, 42) }}</h6>
                    <p class="text-muted small mb-2">{{ $book->author }}</p>
                    <div class="mt-auto">
                        <span class="fw-bold text-primary">Rp {{ number_format($book->price, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-4">{{ $books->links() }}</div>
@endif
@endsection
