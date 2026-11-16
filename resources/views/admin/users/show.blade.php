@extends('layouts.admin')

@section('title', 'Detail Pelanggan')

@section('content')
<a href="{{ route('admin.users.index') }}" class="cus-back">— Semua pelanggan</a>

<div class="cus-head">
    <h1 class="cus-title">{{ $user->name }}</h1>
    <p class="cus-sub">
        {{ $orderCount }} pesanan · Rp {{ number_format($paidTotal, 0, ',', '.') }} dari pesanan lunas
    </p>
</div>

<hr class="cus-rule">

<div class="cus-grid">
    <section class="cus-hist">
        <h2 class="cus-sec">Riwayat pesanan</h2>
        <p class="cus-hint">Urut dari yang terbaru</p>

        <div class="table-wrap">
            <table class="cus-table cus-table--hist">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Tanggal</th>
                        <th class="num">Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($user->orders as $order)
                        @php
                            $flow = ['pending', 'processing', 'shipped', 'completed'];
                            $posisi = array_search($order->status, $flow);
                        @endphp
                        <tr>
                            <td class="cus-code">
                                <a href="{{ route('admin.orders.show', $order) }}">{{ $order->order_code }}</a>
                            </td>
                            <td class="cus-date">{{ $order->created_at->format('d/m/Y') }}</td>
                            <td class="num">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td>
                                <div class="db-status">
                                    <span class="db-dots">
                                        @foreach($flow as $i => $step)
                                            <span @class(['is-on' => $posisi !== false && $i <= $posisi, 'is-done' => $order->status === 'completed' && $posisi !== false])></span>
                                        @endforeach
                                    </span>
                                    <span>{{ $order->statusLabel() }}</span>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="cus-empty">Belum ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <aside class="cus-profile">
        <h2 class="cus-sec">Profil</h2>

        <dl class="cus-info">
            <div><dt>Email</dt><dd>{{ $user->email }}</dd></div>
            <div><dt>Telepon</dt><dd>{{ $user->phone ?: '—' }}</dd></div>
            <div><dt>Alamat</dt><dd>{{ $user->address ?: '—' }}</dd></div>
            <div><dt>Terdaftar</dt><dd>{{ $user->created_at->format('d/m/Y H:i') }}</dd></div>
        </dl>

        <a href="mailto:{{ $user->email }}" class="btn btn--outline btn--sm cus-mailbtn">Kirim email</a>
    </aside>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-customers.css') }}">
@endpush
