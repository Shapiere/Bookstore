@extends('layouts.app')

@section('title', 'Terjadi Kesalahan')

@section('content')
<div class="text-center py-5">
    <div class="display-1 fw-bold text-secondary">500</div>
    <h4 class="fw-bold">Terjadi Kesalahan</h4>
    <p class="text-muted">Maaf, server mengalami kendala. Silakan coba beberapa saat lagi.</p>
    <a href="{{ route('home') }}" class="btn btn-store">Kembali ke Beranda</a>
</div>
@endsection
