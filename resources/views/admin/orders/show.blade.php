@extends('layouts.admin')

@section('title', 'Detail Pesanan')

@section('content')
@php
    // Empat langkah perjalanan pesanan: 1 Menunggu, 2 Diproses, 3 Dikirim, 4 Selesai.
    $flow = [
        'pending' => 'Menunggu',
        'processing' => 'Diproses',
        'shipped' => 'Dikirim',
        'completed' => 'Selesai',
    ];

    $sequence = array_keys($flow);
    $position = array_search($order->status, $sequence, true);
    $filled = $position === false ? 0 : $position + 1;

    $nextStatus = match ($order->status) {
        'pending' => 'processing',
        'processing' => 'shipped',
        'shipped' => 'completed',
        default => null,
    };

    $nextLabel = match ($nextStatus) {
        'processing' => 'Tandai sebagai diproses',
        'shipped' => 'Tandai sebagai dikirim',
        'completed' => 'Tandai sebagai selesai',
        default => null,
    };

    $paymentPaid = $order->payment_status === 'paid';
    $paymentFailed = $order->payment_status === 'failed';
    $paymentMethod = $order->payment_method === 'cod' ? 'Bayar di tempat (COD)' : 'Midtrans';
    $bookCount = $order->items->sum('qty');
@endphp

<div class="odx-page">

    <a href="{{ route('admin.orders.index') }}" class="odx-back mono-label">&mdash; Semua pesanan</a>

    <header class="odx-head">
        <h1 class="odx-code">{{ $order->order_code }}</h1>
        <p class="odx-date">{{ $order->created_at->copy()->locale('id')->translatedFormat('d F Y, H:i') }} WIB</p>
        <div class="odx-rule"></div>
    </header>

    <div class="odx-split">

        {{-- ================= KOLOM KIRI ================= --}}
        <div class="odx-col">

            <section class="odx-section" aria-labelledby="odx-buku">
                <h2 class="odx-h2" id="odx-buku">Buku pesanan</h2>
                <p class="odx-sub">{{ $bookCount }} buku</p>

                <table class="odx-table">
                    <thead>
                        <tr>
                            <th>Buku</th>
                            <th class="num odx-col-price">Harga</th>
                            <th class="num odx-col-amount">Jumlah</th>
                            <th class="num odx-col-sum">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($order->items as $item)
                            <tr>
                                <td>
                                    <div class="odx-book">
                                        @if($item->book && $item->book->cover_image)
                                            <img class="odx-cover"
                                                 src="{{ asset('storage/'.$item->book->cover_image) }}"
                                                 alt="Sampul {{ $item->title_snapshot }}">
                                        @else
                                            <span class="odx-cover odx-cover--none" aria-hidden="true">&mdash;</span>
                                        @endif

                                        <div class="odx-book__body">
                                            <div class="odx-book__title">{{ $item->title_snapshot }}</div>
                                            <div class="odx-book__cat">{{ $item->book?->category?->name ?? '—' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="num" data-label="Harga">Rp {{ number_format((float) $item->price, 0, ',', '.') }}</td>
                                <td class="num" data-label="Jumlah">{{ $item->qty }}</td>
                                <td class="num odx-col-sum" data-label="Subtotal">Rp {{ number_format((float) $item->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="muted">Tidak ada buku pada pesanan ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if((float) $order->shipping_cost > 0)
                    <div class="odx-totals">
                        <div class="odx-totals__line">
                            <span>Subtotal</span>
                            <span class="n">Rp {{ number_format((float) $order->subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="odx-totals__line">
                            <span>Ongkos kirim</span>
                            <span class="n">Rp {{ number_format((float) $order->shipping_cost, 0, ',', '.') }}</span>
                        </div>
                    </div>
                @endif

                <div class="odx-total">
                    <span class="odx-total__label">Total</span>
                    <span class="odx-total__value">Rp {{ number_format((float) $order->total_price, 0, ',', '.') }}</span>
                </div>
            </section>

            <section class="odx-section odx-section--ruled" aria-labelledby="odx-status">
                <h2 class="odx-h2" id="odx-status">Status pesanan</h2>

                <div class="odx-bar @if($order->status === 'completed') is-done @elseif($order->status === 'cancelled') is-cancelled @endif"
                     aria-hidden="true">
                    @foreach($sequence as $i => $step)
                        <span @class(['is-on' => $order->status !== 'cancelled' && $i < $filled])></span>
                    @endforeach
                </div>

                <div class="odx-steps">
                    @foreach($sequence as $i => $step)
                        <span @class([
                            'is-on' => $order->status !== 'cancelled' && $i < $filled,
                            'is-now' => $order->status === $step,
                        ])>{{ $flow[$step] }}</span>
                    @endforeach
                </div>

                @if($nextStatus)
                    <form class="odx-actions" method="POST" action="{{ route('admin.orders.status', $order) }}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="{{ $nextStatus }}">
                        <button type="submit" class="btn btn--primary">{{ $nextLabel }}</button>
                    </form>
                @elseif($order->status === 'completed')
                    <p class="odx-note odx-note--status">Pesanan ini sudah selesai. Tidak ada langkah berikutnya.</p>
                @elseif($order->status === 'cancelled')
                    <p class="odx-note odx-note--status">Pesanan ini dibatalkan, jadi status tidak dapat dilanjutkan.</p>
                @endif
            </section>

        </div>

        {{-- ================= KOLOM KANAN ================= --}}
        <aside class="odx-col">

            <section class="odx-section odx-section--ruled" aria-labelledby="odx-bayar">
                <h2 class="odx-h2" id="odx-bayar">Pembayaran</h2>

                <div class="odx-facts">
                    <div class="odx-fact">
                        <span class="odx-fact__k">Metode</span>
                        <span class="odx-fact__v">{{ $paymentMethod }}</span>
                    </div>
                    <div class="odx-fact">
                        <span class="odx-fact__k">Status</span>
                        <span class="odx-fact__v @if($paymentPaid) odx-fact__v--paid @elseif($paymentFailed) odx-fact__v--failed @else odx-fact__v--unpaid @endif">
                            @if($paymentPaid)
                                Lunas
                            @elseif($paymentFailed)
                                Gagal
                            @else
                                Belum bayar
                            @endif
                        </span>
                    </div>
                </div>

                @unless($paymentPaid)
                    <form class="odx-pay-act" method="POST" action="{{ route('admin.orders.verify', $order) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn--outline btn--block">Tandai lunas</button>
                    </form>

                    @if($order->payment_method === 'cod')
                        <p class="odx-note">Untuk COD, tandai setelah buku diterima pelanggan.</p>
                    @endif
                @endunless
            </section>

            <section class="odx-section odx-section--ruled" aria-labelledby="odx-kirim">
                <h2 class="odx-h2" id="odx-kirim">Pengiriman</h2>

                <div class="odx-facts">
                    <div class="odx-fact">
                        <span class="odx-fact__k">Penerima</span>
                        <span class="odx-fact__v">{{ $order->customer_name }}</span>
                    </div>
                    <div class="odx-fact">
                        <span class="odx-fact__k">Telepon</span>
                        <span class="odx-fact__v">{{ $order->phone }}</span>
                    </div>
                    <div class="odx-fact">
                        <span class="odx-fact__k">Alamat</span>
                        <span class="odx-fact__v">{{ $order->shipping_address }}</span>
                    </div>
                    <div class="odx-fact">
                        <span class="odx-fact__k">Email</span>
                        <span class="odx-fact__v">{{ optional($order->user)->email ?? '—' }}</span>
                    </div>
                </div>

                @if($order->notes)
                    <p class="odx-note">Catatan: {{ $order->notes }}</p>
                @endif
            </section>

        </aside>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-order-detail.css') }}">
@endpush
