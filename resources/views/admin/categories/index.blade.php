@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
<div class="admin-bar">
    <div>
        <h1 class="admin-title">Kategori Buku</h1>
    </div>
    <div class="admin-actions">
        <a href="{{ route('admin.categories.create') }}" class="btn btn--primary btn--sm">Tambah Kategori</a>
    </div>
</div>

<div class="table-wrap">
    <table class="data-table">
        <thead>
            <tr>
                <th class="col-no">#</th>
                <th>Nama Kategori</th>
                <th>Kode URL</th>
                <th class="num">Jumlah Buku</th>
                <th class="col-actions--wide">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td class="code">{{ str_pad((string) ($categories->firstItem() + $loop->index), 2, '0', STR_PAD_LEFT) }}</td>
                    <td>
                        <div class="cell-strong">{{ $category->name }}</div>
                        @if($category->description)
                            <div class="small muted">{{ $category->description }}</div>
                        @endif
                    </td>
                    <td class="code">{{ $category->slug }}</td>
                    <td class="num">{{ $category->books_count }}</td>
                    <td>
                        <div class="row-actions">
                            <a href="{{ route('admin.categories.edit', $category) }}">Ubah</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                  onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="row-action--danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="muted cell-empty">Belum ada kategori.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $categories->links('pagination.custom') }}
@endsection
