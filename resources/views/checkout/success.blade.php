@extends('layouts.app')

@section('title', 'Pesanan Berhasil')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card border-0 shadow-sm text-center">
            <div class="card-body p-5">
                <div class="display-4 text-success mb-2">✓</div>
                <h4 class="fw-bold">Pesanan Berhasil Dibuat</h4>
                <p class="text-muted">Terima kasih, pesanan Anda sedang kami proses.</p>

                <div class="alert alert-light border text-start mt-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Kode Pesanan</span>
                        <strong>{{ $order->order_code }}</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Total</span>
                        <strong>Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Metode Pembayaran</span>
                        <strong>{{ strtoupper($order->payment_method) }}</strong>
                    </div>
                </div>

                @if($order->payment_method === 'cod')
                    <div class="alert alert-info small text-start">
                        Silakan siapkan pembayaran sebesar <strong>Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong>
                        saat buku diantar ke alamat Anda.
                    </div>
                @elseif($order->snap_token)
                    <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
                @else
                    <div class="alert alert-warning small text-start">
                        Pembayaran online belum tersedia saat ini. Silakan hubungi admin untuk menyelesaikan pembayaran.
                    </div>
                @endif

                <div class="mt-4">
                    <a href="{{ route('orders.index') }}" class="btn btn-outline-primary">Lihat Pesanan Saya</a>
                    <a href="{{ route('catalog.index') }}" class="btn btn-outline-secondary">Lanjut Belanja</a>
                </div>
            </div>
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
