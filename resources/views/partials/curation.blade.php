<div class="cur__head">
    <div>
        <h2 class="cur__title">Paling dicari bulan ini</h2>
        <p class="cur__desc">Buku yang paling sering dilihat dan dipesan pembaca.</p>
    </div>

    <div class="cur__tabs" role="group" aria-label="Filter kategori" data-cur-tabs>
        <a href="{{ route('home') }}" data-slug=""
           @class(['is-active' => ! $activeSlug])>Semua</a>
        @foreach($categories as $category)
            <a href="{{ route('home', ['pilih' => $category->slug]) }}"
               data-slug="{{ $category->slug }}"
               @class(['is-active' => $activeSlug === $category->slug])>{{ $category->name }}</a>
        @endforeach
    </div>
</div>

<div class="cur__grid">
    @if($feature)
        <article class="cur-feat">
            <a href="{{ route('catalog.show', $feature) }}" class="cur-feat__cover">
                <img src="{{ asset('storage/'.$feature->cover_image) }}" alt="Sampul {{ $feature->title }}">
            </a>

            <div>
                <h3 class="cur-feat__title">{{ $feature->title }}</h3>
                <p class="cur-feat__by">{{ $feature->author }}</p>

                <p class="cur-feat__note">{{ Str::limit($feature->description, 170) }}</p>

                <div class="cur-feat__meta">
                    <span>{{ $feature->publisher }}</span>
                    <span>{{ $feature->year }}</span>
                    <span>Stok {{ $feature->stock }}</span>
                </div>

                <div class="cur-feat__price">Rp {{ number_format($feature->price, 0, ',', '.') }}</div>

                <div class="cur-feat__acts">
                    @auth
                        @if($feature->stock > 0)
                            <form action="{{ route('cart.add', $feature) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn--primary btn--sm">Tambah ke keranjang</button>
                            </form>
                        @endif
                    @endauth
                    <a href="{{ route('catalog.show', $feature) }}" class="btn--quiet">Lihat detail</a>
                </div>
            </div>
        </article>

        <div class="cur-list">
            <h4 class="cur-list__head">Pilihan lainnya</h4>

            @forelse($others as $book)
                <a href="{{ route('catalog.show', $book) }}" class="cur-row">
                    <img src="{{ asset('storage/'.$book->cover_image) }}" alt="" class="cur-row__cover">
                    <div class="cur-row__body">
                        <div class="cur-row__title">{{ $book->title }}</div>
                        <div class="cur-row__meta">{{ $book->author }} &middot; {{ $book->category->name }}</div>
                    </div>
                    <div class="cur-row__price">Rp {{ number_format($book->price, 0, ',', '.') }}</div>
                </a>
            @empty
                <p class="cur-list__empty">Belum ada buku lain di kategori ini.</p>
            @endforelse

            <a href="{{ route('catalog.index', $activeCategory ? ['category' => $activeCategory->id] : []) }}"
               class="cur-list__more">Lihat semua buku di katalog</a>
        </div>
    @else
        <p class="cur-list__empty">Belum ada buku pada kategori ini.</p>
    @endif
</div>
