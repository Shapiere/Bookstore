@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
<div class="container" style="padding-top: 56px;">
    <div class="section-opener" style="margin-bottom: 40px;">
        <span class="mono-label">
            <a href="{{ route('orders.index') }}" class="link">Pesanan Saya</a> / {{ $order->order_code }}
        </span>
        <span class="status status--{{ $order->status }}">{{ $order->statusLabel() }}</span>
    </div>

    <h1 class="display-m" style="margin-bottom: 40px;">{{ $order->order_code }}</h1>

    <div class="detail-split">
        <div>
            <div class="admin-panel">
                <div class="admin-panel__head">
                    <span class="mono-label">Item Pesanan</span>
                    <span class="mono-label">{{ $order->items->sum('qty') }} Buku</span>
                </div>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Buku</th>
                            <th class="num">Harga</th>
                            <th class="num">Qty</th>
                            <th class="num">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->title_snapshot }}</td>
                                <td class="num">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="num">{{ $item->qty }}</td>
                                <td class="num">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="summary-total">
                    <span class="summary-total__label">Total</span>
                    <span class="summary-total__value">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <aside>
            <div class="panel">
                <div class="panel__head">Informasi Pesanan</div>

                <div class="info-list" style="border-top: 0;">
                    <div><dt>Tanggal</dt><dd>{{ $order->created_at->format('d/m/Y H:i') }}</dd></div>
                    <div><dt>Penerima</dt><dd>{{ $order->customer_name }}</dd></div>
                    <div><dt>Telepon</dt><dd>{{ $order->phone }}</dd></div>
                    <div><dt>Alamat</dt><dd>{{ $order->shipping_address }}</dd></div>
                    <div><dt>Metode Bayar</dt><dd>{{ $order->payment_method === 'cod' ? 'COD' : 'Midtrans' }}</dd></div>
                    <div>
                        <dt>Status Bayar</dt>
                        <dd><span class="status status--{{ $order->payment_status }}">{{ $order->payment_status === 'paid' ? 'Lunas' : 'Belum Bayar' }}</span></dd>
                    </div>
                    @if($order->paid_at)
                        <div><dt>Dibayar</dt><dd>{{ $order->paid_at->format('d/m/Y H:i') }}</dd></div>
                    @endif
                </div>

                @if($order->notes)
                    <p class="small muted" style="margin-top: 16px;">Catatan: {{ $order->notes }}</p>
                @endif
            </div>
        </aside>
    </div>
</div>
@endsection
