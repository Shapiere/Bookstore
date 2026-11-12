@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Dashboard Admin</h4>
        <p class="text-muted small mb-0">Ringkasan aktivitas BookNest</p>
    </div>
    <span class="badge bg-danger">ADMIN</span>
</div>

<div class="row g-3 mb-4">
    @php
        $cards = [
            ['Buku', $stats['books'], 'primary'],
            ['Kategori', $stats['categories'], 'info'],
            ['User Terdaftar', $stats['users'], 'success'],
            ['Total Pesanan', $stats['orders'], 'warning'],
            ['Pesanan Pending', $stats['pending'], 'secondary'],
        ];
    @endphp
    @foreach($cards as [$label, $val, $color])
        <div class="col-6 col-lg-2">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">{{ $label }}</div>
                    <div class="fs-3 fw-bold text-{{ $color }}">{{ $val }}</div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-12 col-lg-2">
        <div class="card border-0 shadow-sm h-100 text-white" style="background:#1e40af;">
            <div class="card-body">
                <div class="small opacity-75">Pendapatan</div>
                <div class="fs-5 fw-bold">Rp {{ number_format($stats['revenue'], 0, ',', '.') }}</div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold">Pesanan Terbaru</div>
            <div class="table-responsive">
                <table class="table table-sm mb-0 align-middle">
                    <thead class="table-light">
                        <tr><th>Kode</th><th>Customer</th><th>Total</th><th>Status</th></tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders as $o)
                            <tr>
                                <td class="small">{{ $o->order_code }}</td>
                                <td class="small">{{ $o->customer_name }}</td>
                                <td class="small">Rp {{ number_format($o->total_price, 0, ',', '.') }}</td>
                                <td><span class="badge bg-{{ $o->statusBadgeClass() }}">{{ $o->statusLabel() }}</span></td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center text-muted py-3">Belum ada pesanan</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold">Buku Terlaris</div>
            <ul class="list-group list-group-flush">
                @forelse($topBooks as $b)
                    <li class="list-group-item d-flex justify-content-between align-items-center small">
                        <span>{{ Str::limit($b->title, 38) }}</span>
                        <span class="badge bg-primary">{{ $b->sold ?? 0 }} terjual</span>
                    </li>
                @empty
                    <li class="list-group-item text-muted small">Belum ada data</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
