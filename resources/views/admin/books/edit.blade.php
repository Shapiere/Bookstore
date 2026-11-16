@extends('layouts.admin')

@section('title', 'Ubah Buku')

@section('content')
<div class="admin-bar">
    <div>
        <h1 class="admin-title">Ubah Buku</h1>
    </div>
    <div class="admin-actions">
        <a href="{{ route('admin.books.index') }}" class="btn--quiet">Kembali</a>
    </div>
</div>

<form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.books._form', ['book' => $book])
    <button type="submit" class="btn btn--primary block-md">Perbarui Buku</button>
</form>
@endsection
