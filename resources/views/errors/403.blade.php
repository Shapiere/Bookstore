@extends('layouts.app')

@section('title', 'Akses Ditolak')

@section('content')
<div class="text-center py-5">
    <div class="display-1 fw-bold text-danger">403</div>
    <h4 class="fw-bold">Akses Ditolak</h4>
    <p class="text-muted">Anda tidak memiliki hak untuk membuka halaman ini.</p>
    <a href="{{ route('home') }}" class="btn btn-store">Kembali ke Beranda</a>
</div>
@endsection
