@extends('layouts.app')

@section('title', 'Katalog Buku')

@section('content')
<div class="container cat-page">
    <div class="cat-head">
        <h1 class="cat-head__title">Katalog buku</h1>
        <p class="cat-head__desc">{{ $books->total() }} judul ditemukan</p>
    </div>

    <div class="cat-layout">
        {{-- Sidebar --}}
        <aside class="cat-side">
            <form action="{{ route('catalog.index') }}" method="GET" class="cat-side__block">
                <label class="cat-side__label" for="cat-q">Cari</label>
                @if($categoryId)
                    <input type="hidden" name="category" value="{{ $categoryId }}">
                @endif
                @if($sort !== 'latest')
                    <input type="hidden" name="sort" value="{{ $sort }}">
                @endif
                <input id="cat-q" type="search" name="q" value="{{ $keyword }}"
                       placeholder="Judul, penulis, penerbit" class="cat-search">
            </form>

            <div class="cat-side__block">
                <div class="cat-side__label">Kategori</div>
                <nav class="cat-cats">
                    <a href="{{ route('catalog.index', array_filter(['q' => $keyword, 'sort' => $sort])) }}"
                       @class(['is-active' => ! $categoryId])>
                        <span>Semua</span>
                        <span class="cat-cats__n">{{ $categories->sum('books_count') }}</span>
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('catalog.index', array_filter(['category' => $category->id, 'q' => $keyword, 'sort' => $sort])) }}"
                           @class(['is-active' => $categoryId == $category->id])>
                            <span>{{ $category->name }}</span>
                            <span class="cat-cats__n">{{ $category->books_count }}</span>
                        </a>
                    @endforeach
                </nav>
            </div>
        </aside>

        {{-- Hasil --}}
        <div class="cat-main">
            <div class="cat-toolbar">
                <span class="cat-toolbar__count">{{ $books->total() }} judul</span>

                <form action="{{ route('catalog.index') }}" method="GET" class="cat-sort">
                    @if($keyword)
                        <input type="hidden" name="q" value="{{ $keyword }}">
                    @endif
                    @if($categoryId)
                        <input type="hidden" name="category" value="{{ $categoryId }}">
                    @endif
                    <label class="cat-sort__label" for="cat-sort">Urutkan</label>
                    <select id="cat-sort" name="sort" class="cat-sort__select" onchange="this.form.submit()">
                        @foreach(['latest' => 'Terbaru', 'price_asc' => 'Harga terendah', 'price_desc' => 'Harga tertinggi'] as $value => $label)
                            <option value="{{ $value }}" @selected($sort === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                    <noscript><button type="submit" class="cat-sort__go">Terapkan</button></noscript>
                </form>
            </div>

            @if($books->isEmpty())
                <div class="empty">
                    <div class="empty__title">Tidak ada buku yang cocok.</div>
                    <p class="empty__desc">Coba kata kunci lain atau pilih kategori yang berbeda.</p>
                    <a href="{{ route('catalog.index') }}" class="btn btn--outline">Reset Pencarian</a>
                </div>
            @else
                <div class="cat-list">
                    @foreach($books as $book)
                        <article class="cat-row">
                            <a href="{{ route('catalog.show', $book) }}" class="cat-row__cover">
                                @include('partials.cover', ['book' => $book, 'class' => '', 'lazy' => true])
                            </a>

                            <div class="cat-row__body">
                                <a href="{{ route('catalog.show', $book) }}" class="cat-row__title">{{ $book->title }}</a>
                                <div class="cat-row__author">{{ $book->author }}</div>

                                <div class="cat-row__meta">
                                    <span>{{ $book->publisher ?? '-' }}@if($book->year), {{ $book->year }}@endif</span>
                                    <span class="cat-row__tag">{{ $book->category->name }}</span>
                                </div>
                            </div>

                            <div class="cat-row__stock">
                                @if($book->stock < 1)
                                    <span class="is-out">Habis</span>
                                @elseif($book->stock <= 5)
                                    <span class="is-low">Sisa {{ $book->stock }}</span>
                                @else
                                    <span>Stok {{ $book->stock }}</span>
                                @endif
                            </div>

                            <div class="cat-row__price">Rp {{ number_format($book->price, 0, ',', '.') }}</div>

                            <div class="cat-row__act">
                                @auth
                                    @if($book->stock > 0)
                                        <form action="{{ route('cart.add', $book) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="cat-add">Tambah</button>
                                        </form>
                                    @else
                                        <span class="cat-add is-out">Tambah</span>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="cat-add">Tambah</a>
                                @endauth
                            </div>
                        </article>
                    @endforeach
                </div>

                {{ $books->links('pagination.custom') }}
            @endif
        </div>
    </div>
</div>
@endsection
