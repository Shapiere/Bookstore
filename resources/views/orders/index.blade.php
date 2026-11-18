@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
@php
    $labels = \App\Models\Order::flow();

    // Dikelompokkan sesuai alur: sedang berjalan, selesai, dan dibatalkan.
    $groups = [
        'Sedang berjalan' => $orders->filter(fn ($o) => in_array($o->status, ['pending', 'processing', 'shipped'], true)),
        'Selesai' => $orders->filter(fn ($o) => $o->status === 'completed'),
        'Dibatalkan' => $orders->filter(fn ($o) => $o->status === 'cancelled'),
    ];
@endphp

<div class="container page-top">
    <h1 class="display-l">Pesanan saya</h1>

    @if($orders->isEmpty())
        <p class="oh-sub">Belum ada pesanan.</p>

        <div class="empty">
            <div class="empty__title">Anda belum memiliki pesanan.</div>
            <p class="empty__desc">Mulai jelajahi katalog dan buat pesanan pertama Anda.</p>
            <a href="{{ route('catalog.index') }}" class="btn btn--primary">Mulai Belanja</a>
        </div>
    @else
        <p class="oh-sub">
            {{ $orders->total() }} pesanan sejak {{ \Illuminate\Support\Carbon::parse($since)->translatedFormat('F Y') }}
        </p>

        @foreach($groups as $name => $rows)
            @continue($rows->isEmpty())

            <section class="oh-group">
                <div class="oh-group__head">
                    <h2 class="oh-group__title">{{ $name }}</h2>
                    <span class="oh-group__count">{{ $rows->count() }}</span>
                </div>

                @foreach($rows as $order)
                    <div class="oh-row">
                        <div class="oh-covers">
                            @foreach($order->items->take(3) as $item)
                                @include('partials.cover', ['book' => $item->book, 'class' => '', 'title' => $item->title_snapshot])
                            @endforeach
                        </div>

                        <div>
                            <div class="oh-code">{{ $order->order_code }}</div>
                            <div class="oh-meta">
                                {{ $order->created_at->translatedFormat('j F Y') }} &middot;
                                {{ $order->items->sum('qty') }} buku
                            </div>
                        </div>

                        <div class="db-status oh-status">
                            <span class="db-dots">
                                @foreach($labels as $label)
                                    <span @class([
                                        'is-on' => $order->statusStep() >= $loop->iteration,
                                        'is-done' => $order->status === 'completed',
                                    ])></span>
                                @endforeach
                            </span>
                            <span>{{ $order->statusLabel() }}</span>
                        </div>

                        <div class="oh-price-cell">
                            <div class="oh-price">Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
                            <div class="oh-pay">
                                {{ $order->payment_status === 'paid' ? 'Lunas' : 'Bayar saat buku tiba' }}
                            </div>
                        </div>

                        <div class="oh-cell-link">
                            <a href="{{ route('orders.show', $order) }}" class="oh-link">Lihat detail</a>
                        </div>
                    </div>
                @endforeach
            </section>
        @endforeach

        {{ $orders->links('pagination.custom') }}
    @endif
</div>
@endsection
