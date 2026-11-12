@extends('layouts.app')

@section('title', $book->title)

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb small">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('catalog.index') }}">Katalog</a></li>
        <li class="breadcrumb-item active">{{ $book->category->name }}</li>
    </ol>
</nav>

<div class="row g-4">
    <div class="col-md-4">
        <img src="{{ $book->cover_image ? asset('storage/'.$book->cover_image) : '' }}"
             class="img-fluid rounded shadow-sm" alt="{{ $book->title }}">
    </div>
    <div class="col-md-8">
        <span class="badge bg-secondary mb-2">{{ $book->category->name }}</span>
        <h3 class="fw-bold">{{ $book->title }}</h3>
        <p class="text-muted mb-3">oleh <strong>{{ $book->author }}</strong></p>

        <table class="table table-sm w-auto">
            <tr><th class="pe-4">Penerbit</th><td>{{ $book->publisher ?? '-' }}</td></tr>
            <tr><th class="pe-4">Tahun</th><td>{{ $book->year ?? '-' }}</td></tr>
            <tr><th class="pe-4">ISBN</th><td>{{ $book->isbn ?? '-' }}</td></tr>
            <tr><th class="pe-4">Stok</th>
                <td>
                    @if($book->stock > 0)
                        <span class="badge bg-success">{{ $book->stock }} tersedia</span>
                    @else
                        <span class="badge bg-danger">Habis</span>
                    @endif
                </td>
            </tr>
        </table>

        <h4 class="text-primary fw-bold my-3">Rp {{ number_format($book->price, 0, ',', '.') }}</h4>

        <p>{{ $book->description }}</p>

        <button class="btn btn-bn btn-lg" {{ $book->stock < 1 ? 'disabled' : '' }}>
            🛒 Tambah ke Keranjang
        </button>
    </div>
</div>

@if($related->count())
<hr class="my-5">
<h5 class="fw-bold mb-3">Buku Terkait</h5>
<div class="row g-3">
    @foreach($related as $r)
        <div class="col-6 col-md-3">
            <div class="card card-book h-100 border-0 shadow-sm">
                <a href="{{ route('catalog.show', $r) }}">
                    <img src="{{ asset('storage/'.$r->cover_image) }}" class="card-img-top cover-img rounded-top" alt="">
                </a>
                <div class="card-body">
                    <h6 class="small mb-1">{{ Str::limit($r->title, 34) }}</h6>
                    <span class="text-primary small fw-bold">Rp {{ number_format($r->price, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endif
@endsection
