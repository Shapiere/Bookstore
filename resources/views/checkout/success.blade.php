@extends('layouts.app')

@section('title', 'Pesanan Berhasil')

@section('content')
<div class="container">
    <div class="success-wrap">
        <div class="section-opener section-opener--flush">
            <span class="mono-label">Konfirmasi Pesanan</span>
            <span class="status status--{{ $order->status }}">{{ $order->statusLabel() }}</span>
        </div>

        <h1 class="display-l title--offset">Pesanan Anda telah tercatat.</h1>

        <p class="muted measure block-lg">
            Terima kasih telah berbelanja di BookStore. Simpan kode pesanan berikut untuk
            melacak status pengiriman.
        </p>

        <div class="order-code">{{ $order->order_code }}</div>

        <div class="mono-label">
            {{ $order->created_at->translatedFormat('d F Y, H:i') }} WIB &middot;
            Metode: Bayar di Tempat (COD)
        </div>

        <div class="instruction">
            <div class="mono-label">Instruksi Pembayaran COD</div>
            <div class="title">Siapkan uang pas saat kurir tiba</div>
            <ol>
                <li>Sediakan pembayaran sebesar Rp {{ number_format($order->total_price, 0, ',', '.') }} kepada kurir.</li>
                <li>Periksa kondisi buku sebelum menerima paket.</li>
                <li>Tanda tangani bukti terima sebagai konfirmasi.</li>
                <li>Admin akan menandai pesanan lunas setelah buku diterima.</li>
            </ol>
        </div>

        <div class="summary-total success-block">
            <span class="summary-total__label">Total Pembayaran</span>
            <span class="summary-total__value">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
        </div>

        <div class="info-list success-block">
            <div>
                <dt>Alamat Pengiriman</dt>
                <dd>{{ $order->shipping_address }}</dd>
            </div>
            <div>
                <dt>Penerima</dt>
                <dd>{{ $order->customer_name }} &middot; {{ $order->phone }}</dd>
            </div>
            <div>
                <dt>Jumlah Item</dt>
                <dd>{{ $order->items->sum('qty') }} buku</dd>
            </div>
        </div>

        <div class="success-actions">
            <a href="{{ route('orders.index') }}" class="btn btn--primary">Lihat Pesanan Saya</a>
            <a href="{{ route('catalog.index') }}" class="btn--quiet">Kembali ke Katalog</a>
        </div>
    </div>
</div>
@endsection
