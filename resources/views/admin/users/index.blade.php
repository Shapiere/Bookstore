@extends('layouts.admin')

@section('title', 'User')
@section('heading', 'Daftar User')
@section('subheading', 'User yang sudah terdaftar')

@section('content')
<form method="GET" class="card card-body border-0 shadow-sm mb-3">
    <div class="row g-2 align-items-end">
        <div class="col-md-8">
            <label class="form-label small">Cari</label>
            <input type="text" name="q" value="{{ $keyword }}" class="form-control" placeholder="Nama atau email">
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary w-100">Cari</button>
        </div>
    </div>
</form>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th width="60">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Pesanan</th>
                    <th>Terdaftar</th>
                    <th width="90">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $users->firstItem() + $loop->index }}</td>
                        <td class="fw-semibold">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone ?? '-' }}</td>
                        <td><span class="badge bg-primary">{{ $user->orders_count }}</span></td>
                        <td><small>{{ $user->created_at->format('d/m/Y') }}</small></td>
                        <td><a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-outline-primary">Detail</a></td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">Belum ada user terdaftar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3 d-flex justify-content-end">{{ $users->links() }}</div>
@endsection
