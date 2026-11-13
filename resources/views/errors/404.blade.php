@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
<div class="text-center py-5">
    <div class="display-1 fw-bold text-warning">404</div>
    <h4 class="fw-bold">Halaman Tidak Ditemukan</h4>
    <p class="text-muted">Halaman yang Anda cari tidak tersedia atau sudah dipindahkan.</p>
    <a href="{{ route('home') }}" class="btn btn-store">Kembali ke Beranda</a>
</div>
@endsection
