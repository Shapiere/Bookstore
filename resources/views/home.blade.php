@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
@php($feature = $latest->first())

{{-- MASTHEAD --}}
<section class="masthead">
    <div class="container">
        <div class="masthead__grid">
            <div class="masthead__aside">Toko Buku Independen — Sejak 2020</div>

            <div class="masthead__body">
                <div class="masthead__kicker">
                    <span class="mono-label">Katalog Daring</span>
                    <span class="mono-label">{{ $categories->count() }} Kategori</span>
                    <span class="mono-label">{{ $latest->count() }} Judul Terbaru</span>
                </div>

                <h1 class="display-xl">Menghidupkan nalar,<br><span class="em">menjaga aksara.</span></h1>

                <p class="masthead__desc">
                    BookStore menghadirkan koleksi buku fiksi, non-fiksi, teknologi, bacaan anak, dan
                    buku pendidikan. Pesan dari mana saja, bayar di tempat saat buku tiba.
                </p>

                <div class="masthead__actions">
                    <a href="{{ route('catalog.index') }}" class="btn btn--primary">Jelajahi Katalog</a>
                    <a href="#buku-terbaru" class="btn--quiet">Lihat Buku Terbaru</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- BUKU PILIHAN --}}
@if($feature)
<section class="section section--deep">
    <div class="container">
        <div class="section-opener" style="margin-bottom: 48px;">
            <span class="mono-label">Buku Pilihan Bulan Ini</span>
            <span class="mono-label">{{ $feature->category->name }}</span>
        </div>

        <div class="feature-split">
            <div class="feature-cover">
                <a href="{{ route('catalog.show', $feature) }}">
                    <img src="{{ asset('storage/'.$feature->cover_image) }}" alt="Sampul {{ $feature->title }}" class="book-cover">
                </a>
            </div>

            <div class="feature-info">
                <span class="mono-label">{{ $feature->publisher ?? 'BookStore' }} — {{ $feature->year ?? '-' }}</span>
                <h2 class="display-m" style="margin: 10px 0 8px;">{{ $feature->title }}</h2>
                <div class="feature-author">{{ $feature->author }}</div>

                <p class="feature-excerpt">{{ Str::limit($feature->description, 220) }}</p>

                <div class="feature-buy">
                    <div class="feature-price">Rp {{ number_format($feature->price, 0, ',', '.') }}</div>
                    <a href="{{ route('catalog.show', $feature) }}" class="btn btn--primary">Lihat Detail</a>
                    <a href="{{ route('catalog.index', ['category' => $feature->category_id]) }}" class="btn--quiet">
                        Buku {{ $feature->category->name }} lainnya
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- INDEKS KATEGORI --}}
<section class="section--tight">
    <div class="container">
        <div class="section-opener" style="border-top: 0; padding-top: 0; margin-bottom: 8px;">
            <span class="mono-label">Indeks Kategori</span>
            <span class="mono-label">{{ $categories->count() }} Kategori Terdaftar</span>
        </div>

        <div class="indeks-row">
            @foreach($categories as $category)
                <a href="{{ route('catalog.index', ['category' => $category->id]) }}" class="indeks-item">
                    {{ $category->name }}
                    <sup>{{ $category->books_count }}</sup>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- BUKU TERBARU --}}
<section class="section" id="buku-terbaru">
    <div class="container">
        <div class="section-head">
            <div>
                <div class="section-opener" style="border-top: 0; padding-top: 0;">
                    <span class="mono-label">Koleksi</span>
                </div>
                <h2 class="display-m" style="margin-top: 12px;">Buku Terbaru</h2>
            </div>
            <a href="{{ route('catalog.index') }}" class="btn--quiet">Lihat Semua Buku</a>
        </div>

        @if($latest->isEmpty())
            <div class="empty">
                <div class="empty__title">Belum ada buku.</div>
                <p class="empty__desc">Koleksi akan segera hadir.</p>
            </div>
        @else
            <div class="book-grid">
                @foreach($latest as $book)
                    @include('partials.book-entry', ['book' => $book])
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
