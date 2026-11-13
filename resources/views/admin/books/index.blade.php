@extends('layouts.admin')

@section('title', 'Buku')
@section('heading', 'Data Buku')
@section('subheading', 'Kelola koleksi buku toko')

@section('content')
<form method="GET" class="card card-body border-0 shadow-sm mb-3">
    <div class="row g-2 align-items-end">
        <div class="col-md-5">
            <label class="form-label small">Cari</label>
            <input type="text" name="q" value="{{ $keyword }}" class="form-control" placeholder="Judul / penulis / penerbit">
        </div>
        <div class="col-md-4">
            <label class="form-label small">Kategori</label>
            <select name="category" class="form-select">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(request('category') == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </div>
</form>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th width="70">Cover</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th width="130">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td>
                            @if($book->cover_image)
                                <img src="{{ asset('storage/'.$book->cover_image) }}" width="45" height="60" style="object-fit:cover" class="rounded">
                            @else
                                <span class="text-muted small">—</span>
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold">{{ $book->title }}</div>
                            <small class="text-muted">{{ $book->author }}</small>
                        </td>
                        <td><span class="badge bg-secondary">{{ $book->category->name }}</span></td>
                        <td>Rp {{ number_format($book->price, 0, ',', '.') }}</td>
                        <td>{{ $book->stock }}</td>
                        <td>
                            <span class="badge {{ $book->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $book->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">Belum ada buku.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3 d-flex justify-content-between">
    <a href="{{ route('admin.books.create') }}" class="btn btn-primary">+ Tambah Buku</a>
    <div>{{ $books->links() }}</div>
</div>
@endsection
