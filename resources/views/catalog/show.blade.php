@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div class="container page-top--sm">
    <div class="dtl-crumb">
        <a href="{{ route('catalog.index') }}">Katalog</a> /
        <a href="{{ route('catalog.index', ['category' => $book->category_id]) }}">{{ $book->category->name }}</a> /
        <span class="is-now">{{ $book->title }}</span>
    </div>

    <div class="dtl-grid">
        <div>
            <img src="{{ asset('storage/'.$book->cover_image) }}" alt="Sampul {{ $book->title }}" class="dtl-cover-img">
        </div>

        <div>
            <div class="dtl-cat">{{ $book->category->name }}</div>
            <h1 class="dtl-title">{{ $book->title }}</h1>
            <div class="dtl-author">{{ $book->author }}</div>

            <p class="dtl-desc">{{ $book->description }}</p>

            <div class="dtl-price-row">
                <span class="dtl-price">Rp {{ number_format($book->price, 0, ',', '.') }}</span>
                @if($book->stock > 0)
                    <span class="dtl-stock">Tersedia, sisa {{ $book->stock }}</span>
                @else
                    <span class="dtl-stock is-out">Stok habis</span>
                @endif
            </div>

            @auth
                @if($book->stock > 0)
                    <form action="{{ route('cart.add', $book) }}" method="POST">
                        @csrf
                        <div class="dtl-buy">
                            <div class="dtl-qty">
                                <button type="button" onclick="qtyStep(this, -1)" aria-label="Kurangi jumlah">&minus;</button>
                                <input type="number" name="qty" value="1" min="1" max="{{ $book->stock }}"
                                       inputmode="numeric" aria-label="Jumlah">
                                <button type="button" onclick="qtyStep(this, 1)" aria-label="Tambah jumlah">+</button>
                            </div>
                            <button type="submit" class="btn btn--primary">Tambah ke keranjang</button>
                        </div>
                    </form>
                    <p class="dtl-note">Bayar di tempat saat buku tiba.</p>
                @else
                    <div class="dtl-buy">
                        <span class="status status--cancelled">Stok habis</span>
                    </div>
                @endif
            @else
                <div class="dtl-buy">
                    <a href="{{ route('login') }}" class="btn btn--primary">Masuk untuk membeli</a>
                </div>
                <p class="dtl-note">Bayar di tempat saat buku tiba.</p>
            @endauth

            <dl class="dtl-specs">
                <div><dt>Penerbit</dt><dd>{{ $book->publisher ?? '-' }}</dd></div>
                <div><dt>Tahun</dt><dd>{{ $book->year ?? '-' }}</dd></div>
                <div><dt>ISBN</dt><dd>{{ $book->isbn ?? '-' }}</dd></div>
                <div><dt>Kategori</dt><dd>{{ $book->category->name }}</dd></div>
            </dl>
        </div>
    </div>

    @if($related->count())
        <div class="dtl-related">
            <h2>Buku lain di {{ $book->category->name }}</h2>
            <a href="{{ route('catalog.index', ['category' => $book->category_id]) }}" class="link small">Lihat semua</a>
        </div>

        <div class="related-strip">
            @foreach($related as $item)
                @include('partials.book-entry', ['book' => $item])
            @endforeach
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    function qtyStep(button, delta) {
        var field = button.parentNode.querySelector('input[name="qty"]');
        var min = parseInt(field.min, 10) || 1;
        var max = parseInt(field.max, 10) || 99;
        var next = (parseInt(field.value, 10) || 1) + delta;
        field.value = Math.min(Math.max(next, min), max);
    }
</script>
@endpush
