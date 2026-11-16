@extends('layouts.app')

@section('title', 'Beranda')
@section('body_class', 'page-home')

@section('content')
{{-- Hero --}}
<section class="hero">
    <div class="container hero__inner">
        <div class="hero__content">
            <h1 class="hero__title">Cari buku yang ingin Anda baca.</h1>

            <p class="hero__sub">
                Fiksi, non-fiksi, teknologi, bacaan anak, dan buku pendidikan.
                Pesan dari mana saja, bayar di tempat saat buku tiba.
            </p>

            <form class="hero__search" action="{{ route('catalog.index') }}" method="GET" role="search">
                <input type="search" name="q" placeholder="Judul, penulis, atau penerbit"
                       aria-label="Cari buku" autocomplete="off">
                <button type="submit">Cari</button>
            </form>

            <div class="hero__actions">
                <a href="{{ route('catalog.index') }}" class="btn btn--invert">Jelajahi Katalog</a>
                <a href="{{ route('about') }}" class="btn btn--ghost-light">Tentang Kami</a>
            </div>
        </div>

        @if($latest->count())
            <div class="hero__fan" aria-hidden="true">
                @foreach($latest->take(4) as $book)
                    <a href="{{ route('catalog.show', $book) }}" class="fan__item">
                        <img src="{{ asset('storage/'.$book->cover_image) }}" alt="">
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- Paling dicari --}}
<section class="cur" id="paling-dicari">
    <div class="container" data-cur-body>
        @include('partials.curation')
    </div>
</section>

{{-- Buku terbaru --}}
<section class="section lot" id="buku-terbaru">
    <div class="container" data-lot-body>
        @include('partials.latest-books')
    </div>
</section>

@endsection

@push('scripts')
<script>
(function () {
    function bindSection(selector, endpoint, tabSelector, param) {
        const body = document.querySelector(selector);
        if (!body) return;

        body.addEventListener('click', async function (e) {
            const tab = e.target.closest(tabSelector);
            if (!tab || e.metaKey || e.ctrlKey || e.shiftKey || e.button !== 0) return;

            e.preventDefault();

            const slug = tab.dataset.slug || '';
            const url = slug ? endpoint + '?' + param + '=' + encodeURIComponent(slug) : endpoint;

            body.style.opacity = '0.45';
            body.style.pointerEvents = 'none';

            try {
                const res = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                if (!res.ok) throw new Error('Gagal memuat');

                body.innerHTML = await res.text();
                history.replaceState(null, '', tab.getAttribute('href'));
            } catch (err) {
                window.location.href = tab.getAttribute('href');
                return;
            } finally {
                body.style.opacity = '';
                body.style.pointerEvents = '';
            }
        });
    }

    bindSection('[data-cur-body]', @json(route('home.curation')), '[data-cur-tabs] a', 'pilih');
    bindSection('[data-lot-body]', @json(route('home.latest')), '[data-lot-tabs] a', 'rak');
})();
</script>
@endpush