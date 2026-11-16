@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
@php
    $maxVal = max(max($salesData ?: [0]), 1);
    $plotW = 460; $plotH = 190; $baseY = 220; $leftPad = 44;
    $slot = $plotW / max(count($salesData), 1);
    $barW = min(46, $slot * 0.62);

    $totalSales = array_sum($salesData);
    $salesTotalLabel = $totalSales >= 1000000
        ? 'Rp ' . rtrim(rtrim(number_format($totalSales / 1000000, 1, ',', '.'), '0'), ',') . ' juta'
        : 'Rp ' . number_format($totalSales / 1000, 0, ',', '.') . ' ribu';
@endphp

{{-- Judul --}}
<div class="db-head">
    <h1 class="db-title">Dashboard</h1>
    <p class="db-sub">
        {{ $stats['books'] }} buku di {{ $stats['categories'] }} kategori &middot;
        {{ $stats['users'] }} pelanggan &middot;
        {{ $stats['orders'] }} pesanan &middot;
        {{ now()->translatedFormat('l, d F Y') }}
    </p>
</div>

{{-- Tiga angka penting --}}
<div class="db-stats">
    <div class="db-stat">
        <div class="db-stat__n">{{ $stats['pending'] }}</div>
        <div class="db-stat__label">pesanan menunggu diproses</div>
    </div>
    <div class="db-stat">
        <div class="db-stat__n">{{ $stats['unread_messages'] }}</div>
        <div class="db-stat__label">pesan belum dibaca</div>
    </div>
    <div class="db-stat">
        <div class="db-stat__n">{{ $stats['low_stock'] }}</div>
        <div class="db-stat__label">buku stok menipis</div>
    </div>
</div>

{{-- Grafik dan terlaris --}}
<div class="dash-grid">
    {{-- Grafik --}}
    <div class="chart-box">
        <h2 class="db-section-title">Pendapatan 6 bulan terakhir</h2>
        <p class="db-section-desc">
            Total {{ $salesTotalLabel }} dari pesanan lunas. {{ now()->translatedFormat('F') }} berjalan.
        </p>

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
    </div>

    {{-- Terlaris --}}
    <div class="admin-panel">
        <div class="admin-panel__head">
            <span class="mono-label">Buku Terlaris</span>
            <a href="{{ route('admin.books.index') }}" class="btn--quiet">Semua Buku</a>
        </div>
        <p class="bs-note">Berdasarkan jumlah buku terjual. Pesanan dibatalkan tidak dihitung.</p>

        @forelse($topBooks as $book)
            <div class="bestseller-row">
                <span class="bestseller-row__rank">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                <img src="{{ asset('storage/'.$book->cover_image) }}" alt="" class="bestseller-row__cover">
                <div>
                    <div class="bestseller-row__title">{{ Str::limit($book->title, 40) }}</div>
                    <div class="bestseller-row__meta">{{ $book->author }}</div>
                </div>
                <div class="bestseller-row__num">{{ (int) $book->sold }} terjual</div>
            </div>
        @empty
            <p class="small muted cell-empty--sm">Belum ada data penjualan.</p>
        @endforelse
    </div>
</div>

{{-- Pesanan terbaru --}}
<div class="db-orders">
    <div class="db-section-head">
        <h2 class="db-section-title">Pesanan terbaru</h2>
    </div>

    <a href="{{ route('admin.orders.index') }}" class="db-orders__more">Buka semua pesanan</a>

    <div class="table-wrap">
        <table class="db-table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Pelanggan</th>
                    <th class="num">Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentOrders as $order)
                    <tr>
                        <td class="code">{{ $order->order_code }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td class="num">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td>
                            @php
                                $flow = ['pending', 'processing', 'shipped', 'completed'];
                                $posisi = array_search($order->status, $flow);
                            @endphp
                            <div class="db-status">
                                <span class="db-dots">
                                    @foreach($flow as $i => $step)
                                        <span @class(['is-on' => $posisi !== false && $i <= $posisi])></span>
                                    @endforeach
                                </span>
                                <span>{{ $order->statusLabel() }}</span>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="muted cell-empty--md">Belum ada pesanan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection