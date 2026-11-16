@extends('layouts.admin')

@section('title', 'Pesanan')

@section('content')
<div class="ord-head">
    <h1 class="admin-title">Daftar pesanan</h1>
    <p class="ord-sub">{{ $counts['all'] }} pesanan sepanjang waktu</p>
</div>

{{-- TAB STATUS --}}
<div class="ord-tabs" role="group" aria-label="Filter status">
    <a href="{{ route('admin.orders.index', array_filter(['q' => $keyword])) }}"
       @class(['is-active' => ! $status])>
        Semua <span>{{ $counts['all'] }}</span>
    </a>
    @foreach(['pending' => 'Menunggu', 'processing' => 'Diproses', 'shipped' => 'Dikirim', 'completed' => 'Selesai', 'cancelled' => 'Dibatalkan'] as $value => $label)
        <a href="{{ route('admin.orders.index', array_filter(['status' => $value, 'q' => $keyword])) }}"
           @class(['is-active' => $status === $value])>
            {{ $label }} <span>{{ $counts[$value] }}</span>
        </a>
    @endforeach
</div>

{{-- PENCARIAN --}}
<form method="GET" class="ord-search">
    @if($status)
        <input type="hidden" name="status" value="{{ $status }}">
    @endif
    <input type="search" name="q" value="{{ $keyword }}"
           placeholder="Cari kode atau pelanggan" aria-label="Cari pesanan">
    @if($keyword)
        <a href="{{ route('admin.orders.index', array_filter(['status' => $status])) }}" class="ord-search__reset">Reset</a>
    @endif
</form>

<div class="table-wrap">
    <table class="ord-table">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th class="num">Item</th>
                <th class="num">Total</th>
                <th>Pembayaran</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td class="code">{{ $order->order_code }}</td>
                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="ord-cust">{{ $order->customer_name }}</div>
                        <div class="ord-mail">{{ $order->user->email }}</div>
                    </td>
                    <td class="num">{{ $order->items->sum('qty') }}</td>
                    <td class="num">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>
                        <span class="ord-pay {{ $order->payment_status === 'paid' ? 'is-paid' : 'is-unpaid' }}">
                            {{ $order->payment_status === 'paid' ? 'Lunas' : 'Belum bayar' }}
                            ({{ $order->payment_method === 'cod' ? 'COD' : 'Midtrans' }})
                        </span>
                    </td>
                    <td>
                        @php
                            $flow = ['pending', 'processing', 'shipped', 'completed'];
                            $posisi = array_search($order->status, $flow);
                        @endphp
                        <div class="db-status">
                            <span class="db-dots">
                                @foreach($flow as $i => $step)
                                    <span @class(['is-on' => $posisi !== false && $i <= $posisi, 'is-done' => $order->status === 'completed' && $posisi !== false])></span>
                                @endforeach
                            </span>
                            <span>{{ $order->statusLabel() }}</span>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order) }}" class="ord-detail">Detail</a>
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
