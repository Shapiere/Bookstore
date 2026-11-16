@extends('layouts.admin')

@section('title', 'Tambah Buku')

@section('content')
<div class="admin-bar">
    <div>
        <h1 class="admin-title" style="margin-top: 8px;">Tambah Buku</h1>
    </div>
    <div class="admin-actions">
        <a href="{{ route('admin.books.index') }}" class="btn--quiet">Kembali</a>
    </div>
</div>

<form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.books._form')
    <button type="submit" class="btn btn--primary" style="margin-top: 16px;">Simpan Buku</button>
</form>
@endsection
