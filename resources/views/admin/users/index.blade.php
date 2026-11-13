@extends('layouts.admin')

@section('title', 'Pelanggan')

@section('content')
<div class="admin-bar">
    <div>
        <div class="mono-label">04 / Transaksi</div>
        <h1 class="admin-title" style="margin-top: 8px;">Pelanggan</h1>
    </div>
    <div class="admin-actions">
        <span class="mono-label">{{ $users->total() }} Terdaftar</span>
    </div>
</div>

<form method="GET" class="filter-bar">
    <div class="field" style="min-width: 260px;">
        <label class="field__label" for="q">Cari Pelanggan</label>
        <input id="q" type="search" name="q" value="{{ $keyword }}" class="field__input"
               placeholder="Nama atau email">
    </div>
    <button type="submit" class="btn btn--outline btn--sm">Cari</button>
    @if($keyword)
        <a href="{{ route('admin.users.index') }}" class="btn--quiet">Reset</a>
    @endif
</form>

<div class="table-wrap">
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 48px;">#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th class="num">Pesanan</th>
                <th>Terdaftar</th>
                <th style="width: 90px;"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td class="code">{{ str_pad((string) ($users->firstItem() + $loop->index), 2, '0', STR_PAD_LEFT) }}</td>
                    <td style="font-weight: 500;">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?? '—' }}</td>
                    <td class="num">{{ $user->orders_count }}</td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="row-actions">
                            <a href="{{ route('admin.users.show', $user) }}">Detail</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="muted" style="padding: 32px 0;">Belum ada pelanggan terdaftar.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $users->links('pagination.custom') }}
@endsection
