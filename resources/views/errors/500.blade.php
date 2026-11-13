@extends('layouts.app')

@section('title', 'Terjadi Kesalahan')

@section('content')
<div class="container">
    <div class="error-page">
        <div class="error-code">500</div>
        <h1 class="display-m" style="margin: 24px 0 12px;">Terjadi Kesalahan</h1>
        <p class="muted" style="margin-bottom: 32px;">Maaf, server mengalami kendala. Silakan coba beberapa saat lagi.</p>
        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('home') }}" class="btn btn--primary">Kembali ke Beranda</a>
            <a href="{{ route('catalog.index') }}" class="btn--quiet">Lihat Katalog</a>
        </div>
    </div>
</div>
@endsection
