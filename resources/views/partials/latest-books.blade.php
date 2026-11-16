<div class="lot__head">
    <div>
        <h2 class="cur__title">Baru masuk rak</h2>
        <p class="cur__desc">Judul yang tiba di toko dalam dua minggu terakhir.</p>
    </div>

    <a href="{{ route('catalog.index') }}" class="btn--quiet">Lihat semua buku</a>
</div>

<div class="cur__tabs lot__tabs" role="group" aria-label="Filter kategori" data-lot-tabs>
    <a href="{{ route('home') }}#buku-terbaru" data-slug=""
       @class(['is-active' => ! $latestSlug])>Semua</a>
    @foreach($categories as $category)
        <a href="{{ route('home', ['rak' => $category->slug]) }}#buku-terbaru"
           data-slug="{{ $category->slug }}"
           @class(['is-active' => $latestSlug === $category->slug])>{{ $category->name }}</a>
    @endforeach
</div>

@if($latestBooks->isEmpty())
    <div class="empty">
        <div class="empty__title">Belum ada buku.</div>
        <p class="empty__desc">Koleksi akan segera hadir.</p>
    </div>
@else
    <div class="book-grid lot__grid">
        @foreach($latestBooks as $book)
            @php($isNew = $book->created_at->gte(now()->subDays(14)))
            <div class="lot__item">
                <a href="{{ route('catalog.show', $book) }}" class="lot__cover book-entry__cover">
                    @if($isNew)
                        <span class="lot__badge">Baru</span>
                    @endif
                    <img src="{{ asset('storage/'.$book->cover_image) }}" alt="Sampul {{ $book->title }}"
                         class="book-cover" loading="lazy">
                </a>

                <div class="book-entry__meta">
                    <span class="book-entry__cat">{{ $book->category->name }}</span>
                    <a href="{{ route('catalog.show', $book) }}" class="book-entry__title">{{ $book->title }}</a>
                    <div class="book-entry__author">{{ $book->author }}</div>

                    <div class="lot__foot">
                        <span class="book-entry__price">Rp {{ number_format($book->price, 0, ',', '.') }}</span>

                        @auth
                            @if($book->stock > 0)
                                <form action="{{ route('cart.add', $book) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="lot__add">Tambah</button>
                                </form>
                            @else
                                <span class="lot__add is-out">Habis</span>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="lot__add">Tambah</a>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
