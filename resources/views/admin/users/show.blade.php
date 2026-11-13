@extends('layouts.admin')

@section('title', 'Detail User')
@section('heading', 'Detail User')
@section('subheading', $user->name)

@section('content')
<div class="row g-3">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-semibold">Profil</div>
            <div class="card-body">
                <dl class="row mb-0 small">
                    <dt class="col-4">Nama</dt><dd class="col-8">{{ $user->name }}</dd>
                    <dt class="col-4">Email</dt><dd class="col-8">{{ $user->email }}</dd>
                    <dt class="col-4">Telepon</dt><dd class="col-8">{{ $user->phone ?? '-' }}</dd>
                    <dt class="col-4">Alamat</dt><dd class="col-8">{{ $user->address ?? '-' }}</dd>
                    <dt class="col-4">Role</dt><dd class="col-8"><span class="badge bg-secondary">{{ $user->role }}</span></dd>
                    <dt class="col-4">Terdaftar</dt><dd class="col-8">{{ $user->created_at->format('d/m/Y H:i') }}</dd>
                </dl>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-semibold">Riwayat Pesanan ({{ $user->orders->count() }})</div>
            <div class="table-responsive">
                <table class="table table-sm mb-0 align-middle">
                    <thead class="table-light">
                        <tr><th>Kode</th><th>Total</th><th>Status</th><th>Tanggal</th><th></th></tr>
                    </thead>
                    <tbody>
                        @forelse($user->orders as $order)
                            <tr>
                                <td class="small">{{ $order->order_code }}</td>
                                <td class="small">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                <td><span class="badge bg-{{ $order->statusBadgeClass() }}">{{ $order->statusLabel() }}</span></td>
                                <td class="small">{{ $order->created_at->format('d/m/Y') }}</td>
                                <td><a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-primary">Lihat</a></td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center text-muted py-3">Belum ada pesanan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary mt-3">Kembali</a>
@endsection
