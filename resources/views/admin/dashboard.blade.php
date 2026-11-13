@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
@php
    $maxVal = max(max($salesData ?: [0]), 1);
    $plotW = 460; $plotH = 190; $baseY = 220; $leftPad = 44;
    $slot = $plotW / max(count($salesData), 1);
    $barW = min(46, $slot * 0.62);
    $fmt = function ($v) {
        if ($v >= 1000000) return 'Rp ' . rtrim(rtrim(number_format($v / 1000000, 1, ',', '.'), '0'), ',') . ' jt';
        if ($v >= 1000) return 'Rp ' . number_format($v / 1000, 0, ',', '.') . ' rb';
        return 'Rp ' . number_format($v, 0, ',', '.');
    };
@endphp

<div class="admin-bar">
    <div>
        <div class="mono-label">01 / Ringkasan Sistem</div>
        <h1 class="admin-title" style="margin-top: 8px;">Dashboard</h1>
    </div>
    <div class="admin-actions">
        <span class="mono-label">{{ now()->translatedFormat('l, d F Y') }}</span>
    </div>
</div>

{{-- STAT ROW --}}
<div class="stat-row">
    <div class="stat-cell">
        <div class="stat-cell__label">Total Buku</div>
        <div class="stat-cell__value">{{ $stats['books'] }}</div>
        <div class="stat-cell__meta">{{ $stats['categories'] }} kategori</div>
    </div>
    <div class="stat-cell">
        <div class="stat-cell__label">Kategori</div>
        <div class="stat-cell__value">{{ $stats['categories'] }}</div>
        <div class="stat-cell__meta">Aktif</div>
    </div>
    <div class="stat-cell">
        <div class="stat-cell__label">Pelanggan</div>
        <div class="stat-cell__value">{{ $stats['users'] }}</div>
        <div class="stat-cell__meta">Terdaftar</div>
    </div>
    <div class="stat-cell">
        <div class="stat-cell__label">Pesanan</div>
        <div class="stat-cell__value">{{ $stats['orders'] }}</div>
        <div class="stat-cell__meta">Sepanjang waktu</div>
    </div>
    <div class="stat-cell">
        <div class="stat-cell__label">Pending</div>
        <div class="stat-cell__value is-accent">{{ $stats['pending'] }}</div>
        <div class="stat-cell__meta">Perlu diproses</div>
    </div>
    <div class="stat-cell">
        <div class="stat-cell__label">Pendapatan</div>
        <div class="stat-cell__value" style="font-size: 24px;">{{ $fmt($stats['revenue']) }}</div>
        <div class="stat-cell__meta">Dari pesanan lunas</div>
    </div>
</div>

<div class="dash-grid">
    {{-- CHART --}}
    <div class="chart-box">
        <div class="chart-box__head">
            <span class="mono-label">Tren Pendapatan 6 Bulan Terakhir</span>
            <span class="mono-label">Dalam Rupiah</span>
        </div>

        <svg class="chart-svg" viewBox="0 0 520 250" role="img" aria-label="Grafik pendapatan enam bulan terakhir">
            @for($g = 0; $g <= 4; $g++)
                @php $gy = $baseY - ($plotH / 4) * $g; @endphp
                <line x1="{{ $leftPad }}" y1="{{ $gy }}" x2="{{ $leftPad + $plotW }}" y2="{{ $gy }}"
                      stroke="#E3DCD2" stroke-width="1" />
                <text x="{{ $leftPad - 8 }}" y="{{ $gy + 4 }}" text-anchor="end"
                      font-family="'JetBrains Mono', monospace" font-size="9" fill="#6B6259">
                    {{ number_format(($maxVal / 4) * $g / 1000000, 1, ',', '.') }}jt
                </text>
            @endfor

            @foreach($salesData as $i => $value)
                @php
                    $h = $maxVal > 0 ? ($value / $maxVal) * $plotH : 0;
                    $x = $leftPad + $i * $slot + ($slot - $barW) / 2;
                    $isLast = $i === count($salesData) - 1;
                @endphp
                <rect x="{{ round($x, 1) }}" y="{{ round($baseY - $h, 1) }}"
                      width="{{ round($barW, 1) }}" height="{{ round($h, 1) }}"
                      fill="{{ $isLast ? '#8C3A2B' : '#14110F' }}" />
                <text x="{{ round($x + $barW / 2, 1) }}" y="{{ round($baseY - $h - 8, 1) }}" text-anchor="middle"
                      font-family="'JetBrains Mono', monospace" font-size="9" fill="#6B6259">
                    {{ $value > 0 ? number_format($value / 1000000, 1, ',', '.') . 'jt' : '—' }}
                </text>
                <text x="{{ round($x + $barW / 2, 1) }}" y="{{ $baseY + 18 }}" text-anchor="middle"
                      font-family="'JetBrains Mono', monospace" font-size="9" fill="#14110F">
                    {{ $salesLabels[$i] }}
                </text>
            @endforeach

            <line x1="{{ $leftPad }}" y1="{{ $baseY }}" x2="{{ $leftPad + $plotW }}" y2="{{ $baseY }}"
                  stroke="#14110F" stroke-width="1" />
        </svg>

        <p class="chart-note">
            Total pendapatan dari pesanan berstatus lunas. Angka dihitung dari kolom total_price
            pada tabel orders.
        </p>
    </div>

    {{-- BESTSELLER --}}
    <div class="admin-panel">
        <div class="admin-panel__head">
            <span class="mono-label">Buku Terlaris</span>
            <a href="{{ route('admin.books.index') }}" class="btn--quiet">Semua Buku</a>
        </div>

        @forelse($topBooks as $book)
            <div class="bestseller-row">
                <span class="bestseller-row__rank">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                <img src="{{ asset('storage/'.$book->cover_image) }}" alt="" class="bestseller-row__cover">
                <div>
                    <div class="bestseller-row__title">{{ Str::limit($book->title, 40) }}</div>
                    <div class="bestseller-row__meta">{{ $book->author }}</div>
                </div>
                <div class="bestseller-row__num">{{ (int) $book->sold }} eks.</div>
            </div>
        @empty
            <p class="small muted" style="padding: 20px 0;">Belum ada data penjualan.</p>
        @endforelse
    </div>
</div>

{{-- RECENT ORDERS --}}
<div class="admin-panel">
    <div class="admin-panel__head">
        <span class="mono-label">Pesanan Terbaru</span>
        <a href="{{ route('admin.orders.index') }}" class="btn--quiet">Buka Semua Pesanan</a>
    </div>

    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th class="num">Total</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentOrders as $order)
                    <tr>
                        <td class="code">{{ $order->order_code }}</td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td class="num">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td>{{ $order->payment_method === 'cod' ? 'COD' : 'Midtrans' }}</td>
                        <td><span class="status status--{{ $order->status }}">{{ $order->statusLabel() }}</span></td>
                        <td>
                            <div class="row-actions">
                                <a href="{{ route('admin.orders.show', $order) }}">Periksa</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="muted" style="padding: 28px 0;">Belum ada pesanan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
