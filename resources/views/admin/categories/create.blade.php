@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="admin-bar">
    <div>
        <h1 class="admin-title">Tambah Kategori</h1>
    </div>
    <div class="admin-actions">
        <a href="{{ route('admin.categories.index') }}" class="btn--quiet">Kembali</a>
    </div>
</div>

<div class="form-narrow">
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        @include('admin.categories._form')
        <button type="submit" class="btn btn--primary">Simpan Kategori</button>
    </form>
</div>
@endsection
