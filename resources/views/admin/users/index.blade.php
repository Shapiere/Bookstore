@extends('layouts.admin')

@section('title', 'Pelanggan')

@section('content')
<div class="cus-head">
    <h1 class="cus-title">Pelanggan</h1>
    <p class="cus-sub">{{ $users->total() }} terdaftar</p>
</div>

<form method="GET" class="cus-search" role="search">
    <input type="search" name="q" value="{{ $keyword }}"
           placeholder="Cari nama atau email" aria-label="Cari nama atau email pelanggan">
    @if($keyword)
        <a href="{{ route('admin.users.index') }}" class="cus-search__reset">Reset</a>
    @endif
</form>

<div class="table-wrap">
    <table class="cus-table cus-table--list">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Telepon</th>
                <th class="num">Pesanan</th>
                <th>Terdaftar</th>
                <th>Pesanan terakhir</th>
                <th class="num cus-col-act"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>
                        <div class="cus-name">{{ $user->name }}</div>
                        <div class="cus-mail">{{ $user->email }}</div>
                    </td>
                    <td class="cus-phone">{{ $user->phone ?: '—' }}</td>
                    <td class="num">{{ $user->orders_count }}</td>
                    <td class="cus-date">{{ $user->created_at->format('d/m/Y') }}</td>
                    <td class="cus-date">
                        {{ $user->orders_max_created_at
                            ? \Illuminate\Support\Carbon::parse($user->orders_max_created_at)->format('d/m/Y')
                            : '—' }}
                    </td>
                    <td class="cus-col-act">
                        <a href="{{ route('admin.users.show', $user) }}" class="cus-detail">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="cus-empty">
                        @if($keyword)
                            Tidak ada pelanggan yang cocok dengan pencarian.
                        @else
                            Belum ada pelanggan terdaftar.
                        @endif
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $users->links('pagination.custom') }}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-customers.css') }}">
@endpush
