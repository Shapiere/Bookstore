@extends('layouts.admin')

@section('title', 'Ubah Kategori')

@section('content')
<div class="admin-bar">
    <div>
        <h1 class="admin-title" style="margin-top: 8px;">Ubah Kategori</h1>
    </div>
    <div class="admin-actions">
        <a href="{{ route('admin.categories.index') }}" class="btn--quiet">Kembali</a>
    </div>
</div>

<div style="max-width: 560px;">
    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.categories._form', ['category' => $category])
        <button type="submit" class="btn btn--primary">Perbarui Kategori</button>
    </form>
</div>
@endsection
