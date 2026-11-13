@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
<div class="container" style="padding-top: 56px;">
    <div class="section-opener" style="margin-bottom: 40px;">
        <span class="mono-label">Pesanan Saya</span>
        <span class="mono-label">{{ $orders->total() }} Pesanan</span>
    </div>

    <h1 class="display-l" style="margin-bottom: 48px;">Riwayat Pesanan</h1>

    @if($orders->isEmpty())
        <div class="empty">
            <div class="empty__title">Anda belum memiliki pesanan.</div>
            <p class="empty__desc">Mulai jelajahi katalog dan buat pesanan pertama Anda.</p>
            <a href="{{ route('catalog.index') }}" class="btn btn--primary">Mulai Belanja</a>
        </div>
    @else
        <div class="table-wrap">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Kode Pesanan</th>
                        <th>Tanggal</th>
                        <th>Item</th>
                        <th class="num">Total</th>
                        <th>Pembayaran</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="code">{{ $order->order_code }}</td>
                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                            <td>{{ $order->items->sum('qty') }} buku</td>
                            <td class="num">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td><span class="status status--{{ $order->payment_status }}">{{ $order->payment_status === 'paid' ? 'Lunas' : 'Belum Bayar' }}</span></td>
                            <td><span class="status status--{{ $order->status }}">{{ $order->statusLabel() }}</span></td>
                            <td><a href="{{ route('orders.show', $order) }}" class="link small">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $orders->links('pagination.custom') }}
    @endif
</div>
@endsection
