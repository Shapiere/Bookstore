@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container" style="padding-top: 56px;">
    <div class="section-opener" style="margin-bottom: 40px;">
        <span class="mono-label">Keranjang</span>
        <span class="mono-label">{{ $items->sum('qty') }} Buku</span>
    </div>

    <h1 class="display-l" style="margin-bottom: 48px;">Keranjang Belanja</h1>

    @if($items->isEmpty())
        <div class="empty">
            <div class="empty__title">Keranjang Anda masih kosong.</div>
            <p class="empty__desc">Telusuri katalog dan tambahkan buku yang ingin Anda beli.</p>
            <a href="{{ route('catalog.index') }}" class="btn btn--primary">Mulai Belanja</a>
        </div>
    @else
        <div class="cart-layout">
            <div>
                @foreach($items as $item)
                    <div class="ledger-row">
                        <div class="ledger-row__cover">
                            <img src="{{ asset('storage/'.$item->book->cover_image) }}" alt="">
                        </div>

                        <div>
                            <a href="{{ route('catalog.show', $item->book) }}" class="ledger-row__title">{{ $item->book->title }}</a>
                            <div class="ledger-row__author">{{ $item->book->author }}</div>
                        </div>

                        <div class="ledger-row__price">Rp {{ number_format($item->book->price, 0, ',', '.') }}</div>

                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="qty">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="qty" value="{{ $item->qty }}" min="1"
                                   max="{{ $item->book->stock }}" inputmode="numeric" aria-label="Jumlah">
                            <button type="submit" title="Perbarui jumlah">&rarr;</button>
                        </form>

                        <div class="ledger-row__sub">Rp {{ number_format($item->book->price * $item->qty, 0, ',', '.') }}</div>

                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="remove-btn" title="Hapus">&times;</button>
                        </form>
                    </div>
                @endforeach

                <div style="margin-top: 32px;">
                    <a href="{{ route('catalog.index') }}" class="btn--quiet">Lanjut Belanja</a>
                </div>
            </div>

            <aside class="panel">
                <div class="panel__head">Ringkasan Pesanan</div>

                @foreach($items as $item)
                    <div class="summary-row">
                        <span>{{ Str::limit($item->book->title, 28) }} &times; {{ $item->qty }}</span>
                        <span class="num">Rp {{ number_format($item->book->price * $item->qty, 0, ',', '.') }}</span>
                    </div>
                @endforeach

                <div class="summary-total">
                    <span class="summary-total__label">Total</span>
                    <span class="summary-total__value">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>

                <a href="{{ route('checkout.index') }}" class="btn btn--primary btn--block" style="margin-top: 24px;">
                    Lanjut ke Checkout
                </a>
            </aside>
        </div>
    @endif
</div>
@endsection
