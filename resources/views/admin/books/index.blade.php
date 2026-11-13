@extends('layouts.admin')

@section('title', 'Buku')

@section('content')
<div class="admin-bar">
    <div>
        <div class="mono-label">03 / Katalog</div>
        <h1 class="admin-title" style="margin-top: 8px;">Data Buku</h1>
    </div>
    <div class="admin-actions">
        <a href="{{ route('admin.books.create') }}" class="btn btn--primary btn--sm">Tambah Buku</a>
    </div>
</div>

<form method="GET" class="filter-bar">
    <div class="field">
        <label class="field__label" for="q">Cari</label>
        <input id="q" type="search" name="q" value="{{ $keyword }}" class="field__input"
               placeholder="Judul, penulis, penerbit">
    </div>
    <div class="field">
        <label class="field__label" for="category">Kategori</label>
        <select id="category" name="category" class="field__select">
            <option value="">Semua Kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(request('category') == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn--outline btn--sm">Terapkan</button>
    @if($keyword || request('category'))
        <a href="{{ route('admin.books.index') }}" class="btn--quiet">Reset</a>
    @endif
</form>

<div class="table-wrap">
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 56px;">Cover</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th class="num">Harga</th>
                <th class="num">Stok</th>
                <th>Status</th>
                <th style="width: 140px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
                <tr>
                    <td>
                        @if($book->cover_image)
                            <img src="{{ asset('storage/'.$book->cover_image) }}" alt="" class="data-table__thumb">
                        @else
                            <span class="muted small">—</span>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight: 500;">{{ $book->title }}</div>
                        <div class="small muted">{{ $book->author }}</div>
                    </td>
                    <td>{{ $book->category->name }}</td>
                    <td class="num">Rp {{ number_format($book->price, 0, ',', '.') }}</td>
                    <td class="num">{{ $book->stock }}</td>
                    <td>
                        <span class="status {{ $book->is_active ? 'status--completed' : 'status--cancelled' }}">
                            {{ $book->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td>
                        <div class="row-actions">
                            <a href="{{ route('admin.books.edit', $book) }}">Ubah</a>
                            <form action="{{ route('admin.books.destroy', $book) }}" method="POST"
                                  onsubmit="return confirm('Hapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="row-action--danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="muted" style="padding: 32px 0;">Belum ada buku.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $books->links('pagination.custom') }}
@endsection
