@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
<div class="auth-split">
    <aside class="auth-aside">
        <div class="mono-label" style="color: rgba(251,248,243,.5);">Mengapa BookStore</div>

        <ol class="auth-benefits">
            <li class="auth-benefit">
                <span class="auth-benefit__num">01</span>
                <div>
                    <div class="auth-benefit__title">Katalog terkurasi</div>
                    <p class="auth-benefit__desc">Ribuan judul pilihan, dari sastra sampai esai.</p>
                </div>
            </li>
            <li class="auth-benefit">
                <span class="auth-benefit__num">02</span>
                <div>
                    <div class="auth-benefit__title">Bayar di Tempat (COD)</div>
                    <p class="auth-benefit__desc">Pesan sekarang, bayar saat buku tiba di tangan Anda.</p>
                </div>
            </li>
            <li class="auth-benefit">
                <span class="auth-benefit__num">03</span>
                <div>
                    <div class="auth-benefit__title">Pesanan terlacak</div>
                    <p class="auth-benefit__desc">Pantau status pesanan dari Keranjang hingga selesai.</p>
                </div>
            </li>
        </ol>

        <div class="mono-label" style="color: rgba(251,248,243,.35);">Bayar di Tempat Tersedia</div>
    </aside>

    <div class="auth-form-wrap">
        <div style="width: 100%;">
            <span class="mono-label">Registrasi</span>
            <h1 class="display-m" style="margin: 12px 0 10px;">Buat akun baru</h1>
            <p class="small muted" style="margin-bottom: 32px;">Daftar untuk mulai berbelanja di BookStore.</p>

            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <div class="field">
                    <label class="field__label" for="name">Nama Lengkap</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" maxlength="100" required
                           class="field__input @error('name') is-error @enderror">
                    @error('name') <span class="field__error">{{ $message }}</span> @enderror
                </div>

                <div class="field">
                    <label class="field__label" for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                           class="field__input @error('email') is-error @enderror">
                    @error('email') <span class="field__error">{{ $message }}</span> @enderror
                </div>

                <div class="field-row">
                    <div class="field">
                        <label class="field__label" for="phone">Nomor Telepon</label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone') }}" maxlength="20"
                               class="field__input">
                    </div>
                    <div class="field">
                        <label class="field__label" for="address">Alamat</label>
                        <input id="address" type="text" name="address" value="{{ old('address') }}" maxlength="500"
                               class="field__input">
                    </div>
                </div>

                <div class="field-row">
                    <div class="field">
                        <label class="field__label" for="password">Password</label>
                        <input id="password" type="password" name="password" required
                               class="field__input @error('password') is-error @enderror">
                        @error('password') <span class="field__error">{{ $message }}</span> @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="password_confirmation">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                               class="field__input">
                    </div>
                </div>

                <button type="submit" class="btn btn--primary btn--block">Daftar</button>
            </form>

            <p class="small muted" style="margin-top: 24px;">
                Sudah punya akun? <a href="{{ route('login') }}" class="link">Masuk di sini</a>
            </p>
        </div>
    </div>
</div>
@endsection
