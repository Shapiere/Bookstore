@extends('layouts.admin')

@section('title', 'Detail Pesanan')

@section('content')
<div class="admin-bar">
    <div>
        <div class="mono-label">05 / Transaksi / Pesanan</div>
        <h1 class="admin-title" style="margin-top: 8px;">{{ $order->order_code }}</h1>
        <div class="mono-label" style="margin-top: 10px;">{{ $order->created_at->translatedFormat('d F Y, H:i') }} WIB</div>
    </div>
    <div class="admin-actions">
        <a href="{{ route('admin.orders.index') }}" class="btn--quiet">Kembali</a>
    </div>
</div>

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

        <div class="admin-panel" style="margin-top: 40px;">
            <div class="admin-panel__head">
                <span class="mono-label">Ubah Status Pesanan</span>
            </div>

            <form action="{{ route('admin.orders.status', $order) }}" method="POST"
                  style="display: flex; gap: 16px; align-items: flex-end; flex-wrap: wrap;">
                @csrf
                @method('PATCH')

                <div class="field" style="margin-bottom: 0; min-width: 220px;">
                    <label class="field__label" for="status">Status Baru</label>
                    <select id="status" name="status" class="field__select">
                        @foreach(['pending' => 'Menunggu', 'processing' => 'Diproses', 'shipped' => 'Dikirim', 'completed' => 'Selesai', 'cancelled' => 'Dibatalkan'] as $value => $label)
                            <option value="{{ $value }}" @selected($order->status === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn--primary btn--sm">Perbarui Status</button>
            </form>
        </div>
    </div>

    <aside>
        <div class="panel">
            <div class="panel__head">Pembayaran</div>

            <div class="info-list" style="border-top: 0;">
                <div><dt>Metode</dt><dd>{{ $order->payment_method === 'cod' ? 'Bayar di Tempat' : 'Midtrans' }}</dd></div>
                <div>
                    <dt>Status</dt>
                    <dd>
                        <span class="status status--{{ $order->payment_status }}">
                            {{ $order->payment_status === 'paid' ? 'Lunas' : 'Belum Bayar' }}
                        </span>
                    </dd>
                </div>
                @if($order->paid_at)
                    <div><dt>Dibayar</dt><dd>{{ $order->paid_at->format('d/m/Y H:i') }}</dd></div>
                @endif
            </div>

            @if($order->payment_status !== 'paid')
                <form action="{{ route('admin.orders.verify', $order) }}" method="POST" style="margin-top: 20px;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn--accent btn--block btn--sm">Verifikasi Lunas</button>
                </form>
                <p class="field__hint" style="margin-top: 10px;">
                    Untuk COD, tandai setelah buku diterima pelanggan.
                </p>
            @endif
        </div>

        <div class="panel" style="margin-top: 24px;">
            <div class="panel__head">Pengiriman</div>

            <div class="info-list" style="border-top: 0;">
                <div><dt>Penerima</dt><dd>{{ $order->customer_name }}</dd></div>
                <div><dt>Telepon</dt><dd>{{ $order->phone }}</dd></div>
                <div><dt>Alamat</dt><dd>{{ $order->shipping_address }}</dd></div>
                <div><dt>Email</dt><dd>{{ $order->user->email }}</dd></div>
            </div>

            @if($order->notes)
                <p class="small muted" style="margin-top: 14px;">Catatan: {{ $order->notes }}</p>
            @endif
        </div>
    </aside>
</div>
@endsection
