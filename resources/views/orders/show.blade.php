@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
@php
    $steps = \App\Models\Order::flow();
    $step = $order->statusStep();
@endphp

<div class="container page-top--sm">
    <a href="{{ route('orders.index') }}" class="odt-back">&mdash; Pesanan saya</a>

    <h1 class="odt-title">{{ $order->order_code }}</h1>
    <div class="odt-date">
        {{ $order->created_at->translatedFormat('j F Y, H:i') }} WIB
    </div>

    <div class="odt-grid">
        <div>
            <div class="odt-sec">
                <h2 class="odt-h">Status pesanan</h2>
                <div class="odt-note">{{ $order->statusNote() }}</div>

                <div class="odt-bar">
                    @foreach($steps as $label)
                        <span @class(['is-on' => $step >= $loop->iteration])></span>
                    @endforeach
                </div>
                <div class="odt-labels">
                    @foreach($steps as $label)
                        <span @class(['is-on' => $step >= $loop->iteration])>{{ $label }}</span>
                    @endforeach
                </div>
            </div>

            <div class="odt-sec">
                <h2 class="odt-h">Buku yang dipesankan</h2>

                <table class="odt-table">
                    <thead>
                        <tr>
                            <th>Buku</th>
                            <th class="num">Harga</th>
                            <th class="num">Jumlah</th>
                            <th class="num">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <div class="odt-book">
                                        @include('partials.cover', ['book' => $item->book, 'class' => '', 'title' => $item->title_snapshot])
                                        <span>
                                            <span class="odt-book__title">{{ $item->title_snapshot }}</span>
                                            <span class="odt-book__cat">{{ $item->book?->category?->name ?? '-' }}</span>
                                        </span>
                                    </div>
                                </td>
                                <td class="num">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="num">{{ $item->qty }}</td>
                                <td class="num">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="odt-total">
                    <span class="odt-total__label">Total</span>
                    <span class="odt-total__value">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <aside class="odt-panel">
            <h2 class="odt-panel__title">Informasi</h2>

            <dl class="odt-facts">
                <div>
                    <dt>Metode</dt>
                    <dd>Bayar di tempat (COD)</dd>
                </div>
                <div>
                    <dt>Pembayaran</dt>
                    <dd>{{ $order->payment_status === 'paid' ? 'Lunas' : 'Belum bayar' }}</dd>
                </div>
                <div>
                    <dt>Penerima</dt>
                    <dd>{{ $order->customer_name }}</dd>
                </div>
                <div>
                    <dt>Telepon</dt>
                    <dd>{{ $order->phone }}</dd>
                </div>
                <div>
                    <dt>Alamat</dt>
                    <dd>{{ $order->shipping_address }}</dd>
                </div>
            </dl>

            <p class="odt-help">
                Ada kendala dengan pesanan ini?
                <a href="{{ route('contact.show') }}">Hubungi kami</a>
            </p>
        </aside>
    </div>
</div>
@endsection
