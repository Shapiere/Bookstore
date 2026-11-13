<a href="{{ route('catalog.show', $book) }}" class="book-entry">
    <div class="book-entry__cover">
        @if($book->cover_image)
            <img src="{{ asset('storage/'.$book->cover_image) }}" alt="Sampul {{ $book->title }}" class="book-cover" loading="lazy">
        @else
            <div class="book-cover"></div>
        @endif
    </div>
    <div class="book-entry__meta">
        <span class="book-entry__cat">{{ $book->category->name ?? '-' }}</span>
        <div class="book-entry__title">{{ $book->title }}</div>
        <div class="book-entry__author">{{ $book->author }}</div>
        <div class="book-entry__price">Rp {{ number_format($book->price, 0, ',', '.') }}</div>
    </div>
</a>
