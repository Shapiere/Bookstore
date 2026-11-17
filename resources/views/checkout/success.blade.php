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
            Metode: {{ $order->payment_method === 'cod' ? 'Bayar di Tempat (COD)' : 'Midtrans' }}
        </div>

        @if($order->payment_method === 'cod')
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
        @elseif($order->snap_token)
            <div class="instruction">
                <div class="mono-label">Pembayaran Online</div>
                <div class="title">Selesaikan pembayaran Anda</div>
                <p class="small muted">
                    Klik tombol di bawah untuk membuka halaman pembayaran Midtrans.
                </p>
                <button type="button" id="pay-button" class="btn btn--primary">
                    Bayar Sekarang
                </button>
            </div>
        @elseif(config('midtrans.mock'))
            <div class="instruction">
                <div class="mono-label">Pembayaran Online &mdash; Simulasi</div>
                <div class="title">Selesaikan pembayaran Anda</div>
                <p class="small muted">
                    Pembayaran online disimulasikan karena akun Midtrans belum mengaktifkan metode pembayaran.
                    Tekan tombol di bawah untuk menandai pesanan sudah dibayar.
                </p>
                <form action="{{ route('orders.simulate', $order) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn--primary">Simulasikan Pembayaran</button>
                </form>
            </div>
        @else
            <div class="instruction">
                <div class="mono-label">Pembayaran Online</div>
                <div class="title">Pembayaran online belum aktif</div>
                <p class="small muted">
                    Silakan hubungi admin melalui halaman Kontak untuk menyelesaikan pembayaran pesanan ini.
                </p>
            </div>
        @endif

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

@if($order->payment_method === 'midtrans' && $order->snap_token)
    @push('scripts')
        <script src="{{ config('midtrans.snap_url') }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script>
            document.getElementById('pay-button').addEventListener('click', function () {
                window.snap.pay('{{ $order->snap_token }}', {
                    onSuccess: function () { window.location.href = '{{ route('orders.show', $order) }}'; },
                    onPending: function () { window.location.href = '{{ route('orders.show', $order) }}'; },
                    onError: function () { alert('Pembayaran gagal. Silakan coba lagi.'); }
                });
            });
        </script>
    @endpush
@endif
