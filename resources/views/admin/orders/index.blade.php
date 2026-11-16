@extends('layouts.admin')

@section('title', 'Pesanan')

@section('content')
<div class="admin-bar">
    <div>
        <h1 class="admin-title" style="margin-top: 8px;">Daftar Pesanan</h1>
    </div>
    <div class="admin-actions">
        <span class="mono-label">{{ $orders->total() }} Pesanan</span>
    </div>
</div>

<form method="GET" class="filter-bar">
    <div class="field">
        <label class="field__label" for="q">Kode Pesanan</label>
        <input id="q" type="search" name="q" value="{{ $keyword }}" class="field__input" placeholder="INV-...">
    </div>
    <div class="field">
        <label class="field__label" for="status">Status</label>
        <select id="status" name="status" class="field__select">
            <option value="">Semua Status</option>
            @foreach(['pending' => 'Menunggu', 'processing' => 'Diproses', 'shipped' => 'Dikirim', 'completed' => 'Selesai', 'cancelled' => 'Dibatalkan'] as $value => $label)
                <option value="{{ $value }}" @selected($status === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn--outline btn--sm">Terapkan</button>
    @if($keyword || $status)
        <a href="{{ route('admin.orders.index') }}" class="btn--quiet">Reset</a>
    @endif
</form>

<div class="table-wrap">
    <table class="data-table">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Pelanggan</th>
                <th class="num">Item</th>
                <th class="num">Total</th>
                <th>Metode</th>
                <th>Pembayaran</th>
                <th>Status</th>
                <th style="width: 90px;"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td class="code">{{ $order->order_code }}</td>
                    <td>
                        <div>{{ $order->customer_name }}</div>
                        <div class="small muted">{{ $order->user->email }}</div>
                    </td>
                    <td class="num">{{ $order->items->sum('qty') }}</td>
                    <td class="num">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>{{ $order->payment_method === 'cod' ? 'COD' : 'Midtrans' }}</td>
                    <td>
                        <span class="status status--{{ $order->payment_status }}">
                            {{ $order->payment_status === 'paid' ? 'Lunas' : 'Belum Bayar' }}
                        </span>
                    </td>
                    <td><span class="status status--{{ $order->status }}">{{ $order->statusLabel() }}</span></td>
                    <td>
                        <div class="row-actions">
                            <a href="{{ route('admin.orders.show', $order) }}">Detail</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="muted" style="padding: 32px 0;">Belum ada pesanan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $orders->links('pagination.custom') }}
@endsection
