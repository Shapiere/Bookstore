@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container" style="padding-top: 56px;">
    <div class="section-opener" style="margin-bottom: 40px;">
        <span class="mono-label">Checkout</span>
        <span class="mono-label">{{ $items->sum('qty') }} Buku</span>
    </div>

    <h1 class="display-l" style="margin-bottom: 48px;">Selesaikan Pesanan</h1>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf

        <div class="cart-layout">
            <div>
                {{-- Data penerima --}}
                <div class="checkout-step">
                    <div class="checkout-step__head">
                        <span class="checkout-step__num">01</span>
                        <span class="checkout-step__title">Data Penerima</span>
                    </div>

                    <div class="field">
                        <label class="field__label" for="customer_name">Nama Penerima</label>
                        <input id="customer_name" type="text" name="customer_name"
                               value="{{ old('customer_name', $user->name) }}" maxlength="100"
                               class="field__input @error('customer_name') is-error @enderror">
                        @error('customer_name') <span class="field__error">{{ $message }}</span> @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="phone">Nomor Telepon</label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone', $user->phone) }}" maxlength="20"
                               class="field__input @error('phone') is-error @enderror">
                        @error('phone') <span class="field__error">{{ $message }}</span> @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="shipping_address">Alamat Pengiriman</label>
                        <textarea id="shipping_address" name="shipping_address" rows="3" maxlength="500"
                                  class="field__textarea @error('shipping_address') is-error @enderror">{{ old('shipping_address', $user->address) }}</textarea>
                        @error('shipping_address') <span class="field__error">{{ $message }}</span> @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="notes">Catatan (opsional)</label>
                        <input id="notes" type="text" name="notes" value="{{ old('notes') }}" maxlength="500"
                               class="field__input" placeholder="Patokan alamat, waktu pengantaran">
                        @error('notes') <span class="field__error">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Metode pembayaran --}}
                <div class="checkout-step">
                    <div class="checkout-step__head">
                        <span class="checkout-step__num">02</span>
                        <span class="checkout-step__title">Metode Pembayaran</span>
                    </div>

                    <label class="pay-option">
                        <input type="radio" name="payment_method" value="cod" @checked(old('payment_method', 'cod') === 'cod')>
                        <div class="pay-option__row">
                            <span class="pay-option__name">Bayar di Tempat (COD)</span>
                            <span class="pay-option__tag">Tersedia</span>
                        </div>
                        <div class="pay-option__desc">Pembayaran dilakukan tunai saat buku diantar ke alamat Anda.</div>
                    </label>

                    <label class="pay-option">
                        <input type="radio" name="payment_method" value="midtrans" @checked(old('payment_method') === 'midtrans')>
                        <div class="pay-option__row">
                            <span class="pay-option__name">Midtrans</span>
                            <span class="pay-option__tag">Online</span>
                        </div>
                        <div class="pay-option__desc">Bayar sekarang melalui kartu, transfer bank, atau dompet digital.</div>
                    </label>

                    @error('payment_method') <span class="field__error">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn--primary">Buat Pesanan</button>
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

                <div style="margin-top: 20px;">
                    <a href="{{ route('cart.index') }}" class="btn--quiet">Kembali ke Keranjang</a>
                </div>
            </aside>
        </div>
    </form>
</div>
@endsection
