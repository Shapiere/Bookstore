@extends('layouts.admin')

@section('title', 'Detail Pelanggan')

@section('content')
<div class="admin-bar">
    <div>
        <div class="mono-label">04 / Transaksi / Pelanggan</div>
        <h1 class="admin-title" style="margin-top: 8px;">{{ $user->name }}</h1>
    </div>
    <div class="admin-actions">
        <a href="{{ route('admin.users.index') }}" class="btn--quiet">Kembali</a>
    </div>
</div>

<div class="detail-split">
    <div class="admin-panel">
        <div class="admin-panel__head">
            <span class="mono-label">Riwayat Pesanan</span>
            <span class="mono-label">{{ $user->orders->count() }} Pesanan</span>
        </div>

        <div class="table-wrap">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Tanggal</th>
                        <th class="num">Total</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($user->orders as $order)
                        <tr>
                            <td class="code">{{ $order->order_code }}</td>
                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                            <td class="num">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td><span class="status status--{{ $order->status }}">{{ $order->statusLabel() }}</span></td>
                            <td>
                                <div class="row-actions">
                                    <a href="{{ route('admin.orders.show', $order) }}">Periksa</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="muted" style="padding: 24px 0;">Belum ada pesanan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <aside class="panel">
        <div class="panel__head">Profil Pelanggan</div>

        <div class="info-list" style="border-top: 0;">
            <div><dt>Nama</dt><dd>{{ $user->name }}</dd></div>
            <div><dt>Email</dt><dd>{{ $user->email }}</dd></div>
            <div><dt>Telepon</dt><dd>{{ $user->phone ?? '—' }}</dd></div>
            <div><dt>Alamat</dt><dd>{{ $user->address ?? '—' }}</dd></div>
            <div><dt>Peran</dt><dd>{{ $user->role }}</dd></div>
            <div><dt>Terdaftar</dt><dd>{{ $user->created_at->format('d/m/Y H:i') }}</dd></div>
        </div>
    </aside>
</div>
@endsection
