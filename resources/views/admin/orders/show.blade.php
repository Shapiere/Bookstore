@extends('layouts.admin')

@section('title', 'Detail Pesanan')
@section('heading', 'Pesanan ' . $order->order_code)
@section('subheading', $order->created_at->format('d F Y, H:i'))

@section('content')
<div class="row g-3">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header bg-white fw-semibold">Item Pesanan</div>
            <div class="table-responsive">
                <table class="table mb-0 align-middle">
                    <thead class="table-light">
                        <tr><th>Buku</th><th width="90">Harga</th><th width="70">Qty</th><th width="120">Subtotal</th></tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->title_snapshot }}</td>
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

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-semibold">Ubah Status Pesanan</div>
            <div class="card-body">
                <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="row g-2 align-items-end">
                    @csrf
                    @method('PATCH')
                    <div class="col-md-6">
                        <label class="form-label small">Status</label>
                        <select name="status" class="form-select">
                            @foreach(['pending' => 'Menunggu', 'processing' => 'Diproses', 'shipped' => 'Dikirim', 'completed' => 'Selesai', 'cancelled' => 'Dibatalkan'] as $val => $label)
                                <option value="{{ $val }}" @selected($order->status === $val)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100">Perbarui Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header bg-white fw-semibold">Pengiriman</div>
            <div class="card-body small">
                <div class="fw-semibold">{{ $order->customer_name }}</div>
                <div>{{ $order->phone }}</div>
                <div class="text-muted mt-1">{{ $order->shipping_address }}</div>
                <hr>
                <div>Email: {{ $order->user->email }}</div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-semibold">Pembayaran</div>
            <div class="card-body">
                <dl class="row mb-2 small">
                    <dt class="col-5">Metode</dt><dd class="col-7">{{ strtoupper($order->payment_method) }}</dd>
                    <dt class="col-5">Status</dt>
                    <dd class="col-7">
                        <span class="badge {{ $order->payment_status === 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                            {{ $order->payment_status === 'paid' ? 'Lunas' : 'Belum Bayar' }}
                        </span>
                    </dd>
                    @if($order->paid_at)
                        <dt class="col-5">Dibayar</dt><dd class="col-7">{{ $order->paid_at->format('d/m/Y H:i') }}</dd>
                    @endif
                </dl>

                @if($order->payment_status !== 'paid')
                    <form action="{{ route('admin.orders.verify', $order) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success w-100 btn-sm">Verifikasi Lunas</button>
                    </form>
                    <small class="text-muted d-block mt-2">Untuk COD: tandai setelah buku diterima customer.</small>
                @endif
            </div>
        </div>
    </div>
</div>

<a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary mt-3">Kembali</a>
@endsection
