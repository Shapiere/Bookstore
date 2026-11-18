{{--
    Sampul buku dengan cadangan bila cover belum diunggah.
    Parameter: $book, $class, $title, $alt, $lazy
--}}
@php
    $judul = $title ?? $book?->title ?? 'Buku';
    $kelas = $class ?? 'book-cover';
@endphp

@if($book?->cover_image)
    <img src="{{ asset('storage/'.$book->cover_image) }}"
         alt="{{ $alt ?? 'Sampul '.$judul }}"
         class="{{ $kelas }}"
         @if($lazy ?? false) loading="lazy" @endif>
@else
    <div class="{{ $kelas }} cover-empty" aria-hidden="true">{{ Str::upper(Str::substr($judul, 0, 1)) }}</div>
@endif
