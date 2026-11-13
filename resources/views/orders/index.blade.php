@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
<h4 class="fw-bold mb-3">Pesanan Saya</h4>

@if($orders->isEmpty())
    <div class="card border-0 shadow-sm">
        <div class="card-body text-center py-5">
            <p class="text-muted mb-3">Anda belum memiliki pesanan.</p>
            <a href="{{ route('catalog.index') }}" class="btn btn-primary">Mulai Belanja</a>
        </div>
    </div>
@else
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr><th>Kode</th><th>Tanggal</th><th>Item</th><th>Total</th><th>Pembayaran</th><th>Status</th><th></th></tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="small fw-semibold">{{ $order->order_code }}</td>
                        <td class="small">{{ $order->created_at->format('d/m/Y') }}</td>
                        <td class="small">{{ $order->items->sum('qty') }} buku</td>
                        <td class="small">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $order->payment_status === 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ $order->payment_status === 'paid' ? 'Lunas' : 'Belum Bayar' }}
                            </span>
                        </td>
                        <td><span class="badge bg-{{ $order->statusBadgeClass() }}">{{ $order->statusLabel() }}</span></td>
                        <td><a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary">Detail</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $orders->links() }}</div>
@endif
@endsection
