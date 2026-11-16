@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container crt-page">
    <h1 class="crt-title">Keranjang belanja</h1>

    @if($items->isEmpty())
        {{-- Kondisi kosong --}}
        <p class="crt-sub">Keranjang Anda masih kosong.</p>

        <div class="crt-empty">
            <p class="crt-empty__desc">Telusuri katalog dan tambahkan buku yang ingin Anda beli.</p>
            <a href="{{ route('catalog.index') }}" class="btn btn--primary">Mulai belanja</a>
        </div>

        @if($suggestions->count())
            <section class="crt-suggest">
                <div class="crt-suggest__head">
                    <span class="mono-label">Baru masuk rak</span>
                    <a href="{{ route('catalog.index') }}" class="btn--quiet">Lihat semua buku</a>
                </div>

                <div class="book-grid">
                    @foreach($suggestions as $book)
                        <div>
                            <a href="{{ route('catalog.show', $book) }}" class="book-entry">
                                <div class="book-entry__cover">
                                    <img src="{{ asset('storage/'.$book->cover_image) }}"
                                         alt="Sampul {{ $book->title }}" class="book-cover" loading="lazy">
                                </div>
                                <div class="book-entry__meta">
                                    <span class="book-entry__cat">{{ $book->category->name }}</span>
                                    <div class="book-entry__title">{{ $book->title }}</div>
                                    <div class="book-entry__author">{{ $book->author }}</div>
                                </div>
                            </a>

                            <div class="crt-suggest__foot">
                                <span class="book-entry__price">Rp {{ number_format($book->price, 0, ',', '.') }}</span>
                                @auth
                                    @if($book->stock > 0)
                                        <form action="{{ route('cart.add', $book) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="crt-add">Tambah</button>
                                        </form>
                                    @else
                                        <span class="crt-add is-out">Habis</span>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="crt-add">Tambah</a>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

    @else
        {{-- Kondisi ada isi --}}
        <p class="crt-sub">{{ $items->count() }} judul, {{ $totalQty }} buku</p>

        <div class="crt-layout">
            <div class="crt-main">
                @foreach($items as $item)
                    <div class="crt-row">
                        <a href="{{ route('catalog.show', $item->book) }}" class="crt-row__cover">
                            <img src="{{ asset('storage/'.$item->book->cover_image) }}" alt="Sampul {{ $item->book->title }}">
                        </a>

                        <div class="crt-row__body">
                            <a href="{{ route('catalog.show', $item->book) }}" class="crt-row__title">{{ $item->book->title }}</a>
                            <div class="crt-row__author">{{ $item->book->author }}</div>
                        </div>

                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="crt-qty">
                            @csrf
                            @method('PATCH')
                            <button type="button" class="crt-qty__btn" aria-label="Kurangi"
                                    onclick="cartStep(this, -1)">&minus;</button>
                            <input type="number" name="qty" value="{{ $item->qty }}" min="1"
                                   max="{{ $item->book->stock }}" inputmode="numeric"
                                   class="crt-qty__input" aria-label="Jumlah"
                                   onchange="this.form.submit()">
                            <button type="button" class="crt-qty__btn" aria-label="Tambah"
                                    onclick="cartStep(this, 1)">&plus;</button>
                        </form>

                        <div class="crt-row__sum">
                            <div class="crt-row__total">Rp {{ number_format($item->book->price * $item->qty, 0, ',', '.') }}</div>
                            @if($item->qty > 1)
                                <div class="crt-row__per">Rp {{ number_format($item->book->price, 0, ',', '.') }} per buku</div>
                            @endif

                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="crt-row__remove">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                <a href="{{ route('catalog.index') }}" class="crt-back">
                    <span aria-hidden="true">&larr;</span> Lanjut belanja
                </a>
            </div>

            <aside class="crt-side">
                <h2 class="crt-side__title">Ringkasan</h2>

                <div class="crt-line">
                    <span>Subtotal ({{ $totalQty }} buku)</span>
                    <span class="crt-line__n">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>

                <div class="crt-line">
                    <span>Ongkos kirim</span>
                    <span class="crt-line__n crt-line__n--muted">Dihitung saat checkout</span>
                </div>

                <div class="crt-total">
                    <span class="crt-total__label">Total</span>
                    <span class="crt-total__value">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>

                <a href="{{ route('checkout.index') }}" class="btn btn--primary btn--block crt-cta">
                    Lanjut ke checkout
                </a>

                <p class="crt-side__note">Bayar di tempat saat buku tiba.</p>
            </aside>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    // Ubah jumlah lewat tombol minus/plus, lalu kirim form.
    function cartStep(button, delta) {
        var form = button.form;
        var input = form.querySelector('.crt-qty__input');
        if (!input) return;

        var min = parseInt(input.min, 10) || 1;
        var max = parseInt(input.max, 10) || 1;
        var next = (parseInt(input.value, 10) || min) + delta;

        next = Math.max(min, Math.min(max, next));

        if (next === parseInt(input.value, 10)) return; // sudah di batas

        input.value = next;
        form.submit();
    }
</script>
@endpush
