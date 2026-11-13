@extends('layouts.app')

@section('title', 'Katalog Buku')

@section('content')
<div class="container" style="padding-top: 56px;">
    <div class="section-opener" style="margin-bottom: 40px;">
        <span class="mono-label">Katalog</span>
        <span class="mono-label">{{ $books->total() }} Judul Ditemukan</span>
    </div>

    <h1 class="display-l" style="margin-bottom: 48px;">Katalog Buku</h1>

    <div class="catalog-layout">
        {{-- RAIL --}}
        <aside class="catalog-rail">
            <div class="rail-block rail-search">
                <div class="rail-block__head">Cari</div>
                <form action="{{ route('catalog.index') }}" method="GET">
                    @if($categoryId)
                        <input type="hidden" name="category" value="{{ $categoryId }}">
                    @endif
                    @if($sort !== 'latest')
                        <input type="hidden" name="sort" value="{{ $sort }}">
                    @endif
                    <input type="search" name="q" value="{{ $keyword }}" placeholder="Judul, penulis, penerbit">
                </form>
            </div>

            <div class="rail-block rail-cat">
                <div class="rail-block__head">Kategori</div>
                <a href="{{ route('catalog.index', array_filter(['q' => $keyword, 'sort' => $sort])) }}"
                   @class(['is-active' => ! $categoryId])>
                    Semua Kategori
                    <span class="count">{{ $categories->sum('books_count') }}</span>
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('catalog.index', array_filter(['category' => $category->id, 'q' => $keyword, 'sort' => $sort])) }}"
                       @class(['is-active' => $categoryId == $category->id])>
                        {{ $category->name }}
                        <span class="count">{{ $category->books_count }}</span>
                    </a>
                @endforeach
            </div>

            <div class="rail-block rail-sort">
                <div class="rail-block__head">Urutkan</div>
                @foreach(['latest' => 'Terbaru', 'price_asc' => 'Harga Terendah', 'price_desc' => 'Harga Tertinggi'] as $value => $label)
                    <a href="{{ route('catalog.index', array_filter(['q' => $keyword, 'category' => $categoryId, 'sort' => $value])) }}"
                       @class(['is-active' => $sort === $value])>{{ $label }}</a>
                @endforeach
            </div>
        </aside>

        {{-- RESULTS --}}
        <div>
            <div class="catalog-bar">
                <span class="mono-label">
                    @if($keyword)
                        Hasil untuk "{{ $keyword }}"
                    @else
                        Semua Buku
                    @endif
                </span>
                <span class="mono-label">Halaman {{ $books->currentPage() }} dari {{ $books->lastPage() }}</span>
            </div>

            @if($books->isEmpty())
                <div class="empty">
                    <div class="empty__title">Tidak ada buku yang cocok.</div>
                    <p class="empty__desc">Coba kata kunci lain atau pilih kategori yang berbeda.</p>
                    <a href="{{ route('catalog.index') }}" class="btn btn--outline">Reset Pencarian</a>
                </div>
            @else
                @foreach($books as $book)
                    <a href="{{ route('catalog.show', $book) }}" class="catalogue-row">
                        <span class="catalogue-row__idx">{{ str_pad((string) ($books->firstItem() + $loop->index), 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="catalogue-row__cover">
                            <img src="{{ asset('storage/'.$book->cover_image) }}" alt="" loading="lazy">
                        </span>
                        <span>
                            <span class="catalogue-row__title">{{ $book->title }}</span>
                            <span class="catalogue-row__author">{{ $book->author }}</span>
                        </span>
                        <span class="catalogue-row__cat">{{ $book->category->name }}</span>
                        <span class="catalogue-row__price">Rp {{ number_format($book->price, 0, ',', '.') }}</span>
                    </a>
                @endforeach

                {{ $books->links('pagination.custom') }}
            @endif
        </div>
    </div>
</div>
@endsection
