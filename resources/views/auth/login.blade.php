@extends('layouts.app')

@section('title', 'Masuk')

@section('body_class', 'page-auth')

@section('content')
<div class="auth-split">
    <aside class="auth-aside">
        <div class="mono-label auth-aside__mark">BookStore</div>
        <div>
            <p class="auth-aside__quote">
                "Membaca adalah perjalanan paling murah<br>ke tempat yang paling jauh."
            </p>
            <div class="auth-aside__src">— Catatan Redaksi</div>
        </div>
        <div class="mono-label auth-aside__foot">Toko Buku Independen — Sejak 2020</div>
    </aside>

    <div class="auth-form-wrap">
        <div class="auth-panel">
            <span class="mono-label">Masuk</span>
            <h1 class="display-m auth-title">Selamat datang kembali</h1>
            <p class="small muted auth-lede">Masuk untuk melanjutkan belanja dan melihat pesanan Anda.</p>

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <div class="field">
                    <label class="field__label" for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="field__input @error('email') is-error @enderror">
                    @error('email') <span class="field__error">{{ $message }}</span> @enderror
                </div>

                <div class="field">
                    <label class="field__label" for="password">Password</label>
                    <input id="password" type="password" name="password" required
                           class="field__input @error('password') is-error @enderror">
                    @error('password') <span class="field__error">{{ $message }}</span> @enderror
                </div>

                <div class="field check-row">
                    <input type="checkbox" name="remember" id="remember" class="checkbox">
                    <label for="remember" class="small muted">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn--primary btn--block">Masuk</button>
            </form>

            <div class="info-list info-list--spaced">
                <div><dt>Akun demo admin</dt><dd>admin@booknest.test / password</dd></div>
                <div><dt>Akun demo user</dt><dd>user@booknest.test / password</dd></div>
            </div>

            <p class="small muted block-xl">
                Belum punya akun? <a href="{{ route('register') }}" class="link">Daftar di sini</a>
            </p>
        </div>
    </div>
</div>
@endsection
