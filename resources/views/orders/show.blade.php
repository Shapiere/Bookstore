@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold mb-0">Pesanan {{ $order->order_code }}</h4>
    <span class="badge bg-{{ $order->statusBadgeClass() }}">{{ $order->statusLabel() }}</span>
</div>

<div class="row g-3">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-semibold">Item Pesanan</div>
            <div class="table-responsive">
                <table class="table mb-0 align-middle">
                    <thead class="table-light">
                        <tr><th>Buku</th><th width="100">Harga</th><th width="60">Qty</th><th width="120">Subtotal</th></tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td class="small">{{ $item->title_snapshot }}</td>
                                <td class="small">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>{{ $item->qty }}</td>
                                <td class="small">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="fw-bold">
                            <td colspan="3" class="text-end">Total</td>
                            <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-semibold">Info Pesanan</div>
            <div class="card-body small">
                <dl class="row mb-0">
                    <dt class="col-5">Tanggal</dt><dd class="col-7">{{ $order->created_at->format('d/m/Y H:i') }}</dd>
                    <dt class="col-5">Penerima</dt><dd class="col-7">{{ $order->customer_name }}</dd>
                    <dt class="col-5">Telepon</dt><dd class="col-7">{{ $order->phone }}</dd>
                    <dt class="col-5">Alamat</dt><dd class="col-7">{{ $order->shipping_address }}</dd>
                    <dt class="col-5">Pembayaran</dt><dd class="col-7">{{ strtoupper($order->payment_method) }}</dd>
                    <dt class="col-5">Status Bayar</dt>
                    <dd class="col-7">
                        <span class="badge {{ $order->payment_status === 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                            {{ $order->payment_status === 'paid' ? 'Lunas' : 'Belum Bayar' }}
                        </span>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<a href="{{ route('orders.index') }}" class="btn btn-outline-secondary mt-3">Kembali</a>
@endsection
