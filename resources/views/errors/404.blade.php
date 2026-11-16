@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
<div class="container">
    <div class="error-page">
        <div class="error-code">404</div>
        <h1 class="display-m err-title">Halaman Tidak Ditemukan</h1>
        <p class="muted err-text">Halaman yang Anda cari tidak tersedia atau sudah dipindahkan.</p>
        <div class="err-actions">
            <a href="{{ route('home') }}" class="btn btn--primary">Kembali ke Beranda</a>
            <a href="{{ route('catalog.index') }}" class="btn--quiet">Lihat Katalog</a>
        </div>
    </div>
</div>
@endsection
