@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<h4 class="fw-bold mb-3">Keranjang Belanja</h4>

@if($items->isEmpty())
    <div class="card border-0 shadow-sm">
        <div class="card-body text-center py-5">
            <p class="text-muted mb-3">Keranjang Anda masih kosong.</p>
            <a href="{{ route('catalog.index') }}" class="btn btn-primary">Mulai Belanja</a>
        </div>
    </div>
@else
<div class="row g-3">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr><th>Buku</th><th width="90">Harga</th><th width="130">Qty</th><th width="120">Subtotal</th><th width="60"></th></tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        @if($item->book->cover_image)
                                            <img src="{{ asset('storage/'.$item->book->cover_image) }}" width="40" height="55" style="object-fit:cover" class="rounded">
                                        @endif
                                        <div>
                                            <div class="fw-semibold small">{{ $item->book->title }}</div>
                                            <small class="text-muted">{{ $item->book->author }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="small">Rp {{ number_format($item->book->price, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex gap-1">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="qty" value="{{ $item->qty }}" min="1" max="{{ $item->book->stock }}"
                                               class="form-control form-control-sm" style="width:70px">
                                        <button class="btn btn-sm btn-outline-secondary">Set</button>
                                    </form>
                                </td>
                                <td class="small fw-semibold">Rp {{ number_format($item->book->price * $item->qty, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">×</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <a href="{{ route('catalog.index') }}" class="btn btn-outline-secondary mt-3">Lanjut Belanja</a>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-semibold">Ringkasan</div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Total Item</span>
                    <span>{{ $items->sum('qty') }} buku</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Total Harga</span>
                    <span class="fw-bold fs-5 text-primary">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <a href="{{ route('checkout.index') }}" class="btn btn-primary w-100">Lanjut ke Checkout</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
