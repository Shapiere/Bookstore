@extends('layouts.app')

@section('title', 'Terjadi Kesalahan')

@section('content')
<div class="container">
    <div class="error-page">
        <div class="error-code">500</div>
        <h1 class="display-m err-title">Terjadi Kesalahan</h1>
        <p class="muted err-text">Maaf, server mengalami kendala. Silakan coba beberapa saat lagi.</p>
        <div class="err-actions">
            <a href="{{ route('home') }}" class="btn btn--primary">Kembali ke Beranda</a>
            <a href="{{ route('catalog.index') }}" class="btn--quiet">Lihat Katalog</a>
        </div>
    </div>
</div>
@endsection
