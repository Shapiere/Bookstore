@extends('layouts.admin')

@section('title', 'Edit Buku')
@section('heading', 'Edit Buku')
@section('subheading', $book->title)

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.books._form', ['book' => $book])
            <div class="d-flex gap-2">
                <button class="btn btn-primary">Perbarui</button>
                <a href="{{ route('admin.books.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
