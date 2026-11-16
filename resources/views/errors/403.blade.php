@extends('layouts.app')

@section('title', 'Akses Ditolak')

@section('content')
<div class="container">
    <div class="error-page">
        <div class="error-code">403</div>
        <h1 class="display-m err-title">Akses Ditolak</h1>
        <p class="muted err-text">Anda tidak memiliki hak untuk membuka halaman ini.</p>
        <div class="err-actions">
            <a href="{{ route('home') }}" class="btn btn--primary">Kembali ke Beranda</a>
            <a href="{{ route('catalog.index') }}" class="btn--quiet">Lihat Katalog</a>
        </div>
    </div>
</div>
@endsection
