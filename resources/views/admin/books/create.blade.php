@extends('layouts.admin')

@section('title', 'Tambah Buku')
@section('heading', 'Tambah Buku')
@section('subheading', 'Masukkan data buku baru')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.books._form')
            <div class="d-flex gap-2">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.books.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
