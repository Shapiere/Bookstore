@extends('layouts.admin')

@section('title', 'Kategori')
@section('heading', 'Kategori Buku')
@section('subheading', 'Kelola daftar kategori buku')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th width="60">#</th>
                    <th>Nama</th>
                    <th>Slug</th>
                    <th width="110">Jumlah Buku</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $categories->firstItem() + $loop->index }}</td>
                        <td>
                            <div class="fw-semibold">{{ $category->name }}</div>
                            <small class="text-muted">{{ $category->description }}</small>
                        </td>
                        <td><code>{{ $category->slug }}</code></td>
                        <td><span class="badge bg-info">{{ $category->books_count }}</span></td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">Belum ada kategori.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3 d-flex justify-content-between">
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
    <div>{{ $categories->links() }}</div>
</div>
@endsection
