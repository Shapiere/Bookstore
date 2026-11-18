@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container page-checkout">
    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf

        <div class="ckp">
            <div>
                <a href="{{ route('cart.index') }}" class="ckp-back">&larr; Kembali ke keranjang</a>
                <h1 class="ckp-title">Selesaikan pesanan</h1>

                {{-- Data penerima --}}
                <div class="ckp-sec">
                    <h2 class="ckp-sec__title">Data penerima</h2>

                    <div class="ckp-row">
                        <div>
                            <label class="ckp-label" for="customer_name">Nama penerima</label>
                            <input id="customer_name" type="text" name="customer_name"
                                   value="{{ old('customer_name', $user->name) }}" maxlength="100"
                                   class="ckp-input @error('customer_name') is-error @enderror">
                            @error('customer_name') <span class="ckp-error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="ckp-label" for="phone">Nomor telepon</label>
                            <input id="phone" type="text" name="phone" value="{{ old('phone', $user->phone) }}" maxlength="20"
                                   class="ckp-input @error('phone') is-error @enderror">
                            @error('phone') <span class="ckp-error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="ckp-field">
                        <label class="ckp-label" for="shipping_address">Alamat pengiriman</label>
                        <textarea id="shipping_address" name="shipping_address" rows="2" maxlength="500"
                                  class="ckp-textarea @error('shipping_address') is-error @enderror">{{ old('shipping_address', $user->address) }}</textarea>
                        @error('shipping_address') <span class="ckp-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="ckp-field">
                        <label class="ckp-label" for="notes">Catatan untuk kurir (opsional)</label>
                        <input id="notes" type="text" name="notes" value="{{ old('notes') }}" maxlength="500"
                               class="ckp-input" placeholder="Patokan alamat, waktu pengantaran">
                        @error('notes') <span class="ckp-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Cara pembayaran --}}
                <div class="ckp-sec">
                    <h2 class="ckp-sec__title">Cara pembayaran</h2>

                    <div class="ckp-pays">
                        <label class="ckp-pay">
                            <input type="radio" name="payment_method" value="cod" checked>
                            <span class="ckp-pay__body">
                                <span class="ckp-pay__name">Bayar di tempat (COD)</span>
                                <span class="ckp-pay__desc">Bayar tunai saat buku diantar ke alamat Anda.</span>
                            </span>
                        </label>
                    </div>

                    @error('payment_method') <span class="ckp-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <aside class="ckp-side">
                <h2 class="ckp-side__title">Ringkasan</h2>

                @foreach($items as $item)
                    <div class="ckp-item">
                        @include('partials.cover', ['book' => $item->book, 'class' => 'ckp-item__cover'])
                        <span>
                            <span class="ckp-item__name">{{ $item->book->title }}</span>
                            <span class="ckp-item__qty">{{ $item->qty }} buku</span>
                        </span>
                        <span class="ckp-item__price">Rp {{ number_format($item->book->price * $item->qty, 0, ',', '.') }}</span>
                    </div>
                @endforeach

                <div class="ckp-total">
                    <span class="ckp-total__label">Total</span>
                    <span class="ckp-total__value">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>

                <button type="submit" class="btn btn--primary ckp-submit">Buat pesanan</button>

                <ol class="ckp-steps">
                    <li>Kami memproses pesanan Anda.</li>
                    <li>Buku dikirim ke alamat Anda.</li>
                    <li>Bayar tunai saat buku tiba.</li>
                </ol>
            </aside>
        </div>
    </form>
</div>
@endsection
