@extends('layouts.app')

@section('title', 'Pesanan Berhasil')

@section('content')
@php
    $steps = \App\Models\Order::flow();
    $filled = $order->statusStep();
@endphp

<div class="container page-top--sm">
    <div class="scc-grid">
        <div>
            <h1 class="scc-title">Pesanan Anda telah tercatat.</h1>

            <p class="scc-lede">
                Terima kasih telah berbelanja di BookStore. Simpan nomor pesanan ini
                untuk melacak status pengiriman.
            </p>

            <div class="scc-code-row">
                <span class="scc-code-label">Nomor pesanan</span>
                <span class="scc-code" id="order-code">{{ $order->order_code }}</span>
                <button type="button" class="scc-copy" onclick="copyCode()">Salin</button>
            </div>

            <div class="scc-date">
                {{ $order->created_at->translatedFormat('d F Y, H:i') }} WIB
            </div>

            <h2 class="scc-h">Status pesanan</h2>
            <div class="scc-note">{{ $order->statusNote() }}</div>

            <div class="scc-bar">
                @foreach(array_values($steps) as $label)
                    <span @class(['is-on' => $filled >= $loop->iteration])></span>
                @endforeach
            </div>
            <div class="scc-labels">
                @foreach(array_values($steps) as $label)
                    <span @class(['is-on' => $filled >= $loop->iteration])>{{ $label }}</span>
                @endforeach
            </div>

            <h2 class="scc-h">Bayar saat buku tiba</h2>
            <ol class="scc-steps">
                <li>Siapkan uang pas Rp {{ number_format($order->total_price, 0, ',', '.') }} untuk dibayarkan kepada kurir.</li>
                <li>Periksa kondisi buku sebelum menerima paket.</li>
                <li>Tanda tangani bukti terima sebagai konfirmasi.</li>
                <li>Admin akan menandai pesanan lunas setelah buku diterima.</li>
            </ol>

            <div class="scc-actions">
                <a href="{{ route('orders.index') }}" class="btn btn--primary">Lihat pesanan saya</a>
                <a href="{{ route('catalog.index') }}" class="btn btn--outline">Kembali ke katalog</a>
            </div>
        </div>

        <aside class="scc-panel">
            <h2 class="scc-panel__title">Ringkasan</h2>

            @foreach($order->items as $item)
                <div class="scc-item">
                    @include('partials.cover', ['book' => $item->book, 'class' => 'scc-item__cover', 'title' => $item->title_snapshot])
                    <span>
                        <span class="scc-item__name">{{ $item->title_snapshot }}</span>
                        <span class="scc-item__qty">{{ $item->qty }} buku</span>
                    </span>
                    <span class="scc-item__price">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                </div>
            @endforeach

            <div class="scc-total">
                <span class="scc-total__label">Total</span>
                <span class="scc-total__value">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
            </div>

            <dl class="scc-facts">
                <div><dt>Pembayaran</dt><dd>Bayar di tempat (COD), belum dibayar</dd></div>
                <div><dt>Penerima</dt><dd>{{ $order->customer_name }}, {{ $order->phone }}</dd></div>
                <div><dt>Alamat</dt><dd>{{ $order->shipping_address }}</dd></div>
            </dl>
        </aside>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function copyCode() {
        var label = document.getElementById('order-code');
        var button = document.querySelector('.scc-copy');

        function done(text) {
            button.textContent = text;
            setTimeout(function () { button.textContent = 'Salin'; }, 2000);
        }

        // Cadangan bila API clipboard ditolak browser: pilih teks agar bisa disalin manual.
        function fallback() {
            var range = document.createRange();
            range.selectNodeContents(label);
            var selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);
            done('Pilih lalu Ctrl+C');
        }

        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(label.textContent.trim())
                .then(function () { done('Tersalin'); })
                .catch(fallback);
        } else {
            fallback();
        }
    }
</script>
@endpush