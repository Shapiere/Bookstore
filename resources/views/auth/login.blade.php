@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
<div class="auth-split">
    <aside class="auth-aside">
        <div class="mono-label" style="color: rgba(251,248,243,.5);">BookStore</div>
        <div>
            <p class="auth-aside__quote">
                "Membaca adalah perjalanan paling murah<br>ke tempat yang paling jauh."
            </p>
            <div class="auth-aside__src">— Catatan Redaksi</div>
        </div>
        <div class="mono-label" style="color: rgba(251,248,243,.35);">Toko Buku Independen — Sejak 2020</div>
    </aside>

    <div class="auth-form-wrap">
        <div style="width: 100%;">
            <span class="mono-label">Masuk</span>
            <h1 class="display-m" style="margin: 12px 0 10px;">Selamat datang kembali</h1>
            <p class="small muted" style="margin-bottom: 36px;">Masuk untuk melanjutkan belanja dan melihat pesanan Anda.</p>

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

                <div class="field" style="display:flex; align-items:center; gap:10px;">
                    <input type="checkbox" name="remember" id="remember" style="accent-color: var(--accent);">
                    <label for="remember" class="small muted" style="margin:0;">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn--primary btn--block">Masuk</button>
            </form>

            <div class="info-list" style="margin-top: 40px;">
                <div><dt>Akun demo admin</dt><dd>admin@booknest.test / password</dd></div>
                <div><dt>Akun demo user</dt><dd>user@booknest.test / password</dd></div>
            </div>

            <p class="small muted" style="margin-top: 24px;">
                Belum punya akun? <a href="{{ route('register') }}" class="link">Daftar di sini</a>
            </p>
        </div>
    </div>
</div>
@endsection
