@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<h4 class="fw-bold mb-3">Checkout</h4>

<form action="{{ route('checkout.store') }}" method="POST">
    @csrf
    <div class="row g-3">
        <div class="col-md-7">
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-header bg-white fw-semibold">Data Pengiriman</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Penerima <span class="text-danger">*</span></label>
                        <input type="text" name="customer_name" value="{{ old('customer_name', $user->name) }}"
                               class="form-control @error('customer_name') is-invalid @enderror" maxlength="100">
                        @error('customer_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                               class="form-control @error('phone') is-invalid @enderror" maxlength="20">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                        <textarea name="shipping_address" rows="3"
                                  class="form-control @error('shipping_address') is-invalid @enderror"
                                  maxlength="500">{{ old('shipping_address', $user->address) }}</textarea>
                        @error('shipping_address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-semibold">Metode Pembayaran</div>
                <div class="card-body">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="pm_cod" value="cod"
                               @checked(old('payment_method', 'cod') === 'cod')>
                        <label class="form-check-label" for="pm_cod">
                            <strong>Bayar di Tempat (COD)</strong><br>
                            <small class="text-muted">Pembayaran dilakukan saat buku diterima.</small>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="pm_midtrans" value="midtrans"
                               @checked(old('payment_method') === 'midtrans')>
                        <label class="form-check-label" for="pm_midtrans">
                            <strong>Midtrans (Online)</strong><br>
                            <small class="text-muted">Bayar sekarang melalui kartu kredit / transfer / e-wallet.</small>
                        </label>
                    </div>
                    @error('payment_method') <div class="text-danger small mt-2">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-semibold">Ringkasan Pesanan</div>
                <ul class="list-group list-group-flush">
                    @foreach($items as $item)
                        <li class="list-group-item d-flex justify-content-between small">
                            <span>{{ $item->book->title }} <span class="text-muted">× {{ $item->qty }}</span></span>
                            <span>Rp {{ number_format($item->book->price * $item->qty, 0, ',', '.') }}</span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between fw-bold">
                        <span>Total</span>
                        <span class="text-primary">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </li>
                </ul>
                <div class="card-body">
                    <button class="btn btn-primary w-100">Buat Pesanan</button>
                    <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary w-100 mt-2">Kembali ke Keranjang</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
