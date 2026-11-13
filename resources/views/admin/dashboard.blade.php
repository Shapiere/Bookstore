@extends('layouts.admin')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('subheading', 'Ringkasan aktivitas toko')

@section('content')
<div class="row g-3 mb-4">
    @php
        $cards = [
            ['Buku', $stats['books'], 'primary', route('admin.books.index')],
            ['Kategori', $stats['categories'], 'info', route('admin.categories.index')],
            ['User', $stats['users'], 'success', route('admin.users.index')],
            ['Pesanan', $stats['orders'], 'warning', route('admin.orders.index')],
            ['Pending', $stats['pending'], 'secondary', route('admin.orders.index', ['status' => 'pending'])],
            ['Pesan Baru', $stats['unread_messages'], 'danger', route('admin.messages.index')],
        ];
    @endphp

    @foreach($cards as [$label, $value, $color, $link])
        <div class="col-6 col-lg-2">
            <a href="{{ $link }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-muted small">{{ $label }}</div>
                        <div class="fs-3 fw-bold text-{{ $color }}">{{ $value }}</div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 text-white" style="background:#1e40af;">
            <div class="card-body">
                <div class="small opacity-75">Total Pendapatan (Lunas)</div>
                <div class="fs-3 fw-bold">Rp {{ number_format($stats['revenue'], 0, ',', '.') }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold">Penjualan 6 Bulan Terakhir</div>
            <div class="card-body">
                <canvas id="salesChart" height="90"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold d-flex justify-content-between">
                <span>Pesanan Terbaru</span>
                <a href="{{ route('admin.orders.index') }}" class="small">Lihat semua</a>
            </div>
            <div class="table-responsive">
                <table class="table table-sm mb-0 align-middle">
                    <thead class="table-light">
                        <tr><th>Kode</th><th>Customer</th><th>Total</th><th>Status</th></tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders as $order)
                            <tr>
                                <td class="small">
                                    <a href="{{ route('admin.orders.show', $order) }}">{{ $order->order_code }}</a>
                                </td>
                                <td class="small">{{ $order->customer_name }}</td>
                                <td class="small">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                <td><span class="badge bg-{{ $order->statusBadgeClass() }}">{{ $order->statusLabel() }}</span></td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center text-muted py-3">Belum ada pesanan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold">5 Buku Terlaris</div>
            <ul class="list-group list-group-flush">
                @forelse($topBooks as $book)
                    <li class="list-group-item d-flex justify-content-between align-items-center small">
                        <span>{{ Str::limit($book->title, 34) }}</span>
                        <span class="badge bg-primary">{{ (int) $book->sold }} terjual</span>
                    </li>
                @empty
                    <li class="list-group-item text-muted small">Belum ada data penjualan.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const ctx = document.getElementById('salesChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($salesLabels),
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: @json($salesData),
                backgroundColor: 'rgba(37, 99, 235, .7)',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: (item) => 'Rp ' + item.parsed.y.toLocaleString('id-ID')
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: (value) => 'Rp ' + value.toLocaleString('id-ID')
                    }
                }
            }
        }
    });
</script>
@endpush
