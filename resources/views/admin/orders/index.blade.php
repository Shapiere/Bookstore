@extends('layouts.admin')

@section('title', 'Pesanan')
@section('heading', 'Daftar Pesanan')
@section('subheading', 'Pesanan dari seluruh user')

@section('content')
<form method="GET" class="card card-body border-0 shadow-sm mb-3">
    <div class="row g-2 align-items-end">
        <div class="col-md-5">
            <label class="form-label small">Kode Pesanan</label>
            <input type="text" name="q" value="{{ $keyword }}" class="form-control" placeholder="INV-...">
        </div>
        <div class="col-md-4">
            <label class="form-label small">Status</label>
            <select name="status" class="form-select">
                <option value="">Semua Status</option>
                @foreach(['pending' => 'Menunggu', 'processing' => 'Diproses', 'shipped' => 'Dikirim', 'completed' => 'Selesai', 'cancelled' => 'Dibatalkan'] as $val => $label)
                    <option value="{{ $val }}" @selected($status === $val)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </div>
</form>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Kode</th>
                    <th>Customer</th>
                    <th>Item</th>
                    <th>Total</th>
                    <th>Metode</th>
                    <th>Pembayaran</th>
                    <th>Status</th>
                    <th width="90">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td class="small fw-semibold">{{ $order->order_code }}</td>
                        <td class="small">
                            {{ $order->customer_name }}<br>
                            <span class="text-muted">{{ $order->user->email }}</span>
                        </td>
                        <td class="small">{{ $order->items->sum('qty') }} buku</td>
                        <td class="small">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td><span class="badge bg-secondary">{{ strtoupper($order->payment_method) }}</span></td>
                        <td>
                            <span class="badge {{ $order->payment_status === 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ $order->payment_status === 'paid' ? 'Lunas' : 'Belum Bayar' }}
                            </span>
                        </td>
                        <td><span class="badge bg-{{ $order->statusBadgeClass() }}">{{ $order->statusLabel() }}</span></td>
                        <td><a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-primary">Detail</a></td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="text-center text-muted py-4">Belum ada pesanan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3 d-flex justify-content-end">{{ $orders->links() }}</div>
@endsection
