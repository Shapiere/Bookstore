@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
<div class="container">
    <div class="error-page">
        <div class="error-code">404</div>
        <h1 class="display-m" style="margin: 24px 0 12px;">Halaman Tidak Ditemukan</h1>
        <p class="muted" style="margin-bottom: 32px;">Halaman yang Anda cari tidak tersedia atau sudah dipindahkan.</p>
        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('home') }}" class="btn btn--primary">Kembali ke Beranda</a>
            <a href="{{ route('catalog.index') }}" class="btn--quiet">Lihat Katalog</a>
        </div>
    </div>
</div>
@endsection
