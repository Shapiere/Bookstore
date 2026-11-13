@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div class="container" style="padding-top: 48px;">
    <div class="section-opener" style="margin-bottom: 40px;">
        <span class="mono-label">
            <a href="{{ route('catalog.index') }}" class="link">Katalog</a> / {{ $book->category->name }}
        </span>
        <span class="mono-label">{{ $book->isbn ?? '-' }}</span>
    </div>

    <div class="detail-layout">
        {{-- COVER --}}
        <div class="detail-cover">
            <img src="{{ asset('storage/'.$book->cover_image) }}" alt="Sampul {{ $book->title }}" class="book-cover">

            <dl class="detail-specs">
                <div><dt>Penerbit</dt><dd>{{ $book->publisher ?? '-' }}</dd></div>
                <div><dt>Tahun</dt><dd>{{ $book->year ?? '-' }}</dd></div>
                <div><dt>ISBN</dt><dd>{{ $book->isbn ?? '-' }}</dd></div>
                <div>
                    <dt>Stok</dt>
                    <dd>
                        @if($book->stock > 0)
                            {{ $book->stock }} tersedia
                        @else
                            Habis
                        @endif
                    </dd>
                </div>
            </dl>
        </div>

        {{-- INFO --}}
        <div>
            <span class="mono-label">{{ $book->category->name }}</span>
            <h1 class="display-l" style="margin: 12px 0 10px;">{{ $book->title }}</h1>
            <div class="detail-author">{{ $book->author }}</div>

            <p class="detail-desc">{{ $book->description }}</p>

            <div class="buy-block">
                <div class="buy-price">
                    <small>Harga</small>
                    Rp {{ number_format($book->price, 0, ',', '.') }}
                </div>

                @auth
                    @if($book->stock > 0)
                        <form action="{{ route('cart.add', $book) }}" method="POST" style="display:flex; align-items:flex-end; gap:16px; flex-wrap:wrap;">
                            @csrf
                            <div>
                                <span class="field__label" style="display:block;">Jumlah</span>
                                <div class="qty">
                                    <input type="number" name="qty" value="1" min="1" max="{{ $book->stock }}"
                                           inputmode="numeric" aria-label="Jumlah">
                                </div>
                            </div>
                            <button type="submit" class="btn btn--primary">Tambah ke Keranjang</button>
                        </form>
                    @else
                        <span class="status status--cancelled">Stok Habis</span>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn--primary">Masuk untuk Membeli</a>
                @endauth
            </div>
        </div>
    </div>

    @if($related->count())
        <div class="section-opener" style="margin-top: 96px; margin-bottom: 32px;">
            <span class="mono-label">Buku Terkait</span>
            <a href="{{ route('catalog.index', ['category' => $book->category_id]) }}" class="btn--quiet">
                Semua {{ $book->category->name }}
            </a>
        </div>

        <div class="related-strip">
            @foreach($related as $item)
                @include('partials.book-entry', ['book' => $item])
            @endforeach
        </div>
    @endif
</div>
@endsection
