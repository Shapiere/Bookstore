@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<div class="container ct-page">
    <h1 class="ct-title">Hubungi kami</h1>

    <p class="ct-lead">
        Sampaikan pertanyaan, masukan, atau kendala pesanan Anda.<br>
        Kami akan membalas melalui email yang Anda cantumkan.
    </p>

    <div class="ct-layout">
        {{-- FORM --}}
        <form action="{{ route('contact.store') }}" method="POST" class="ct-form">
            @csrf

            <div class="ct-row">
                <div class="ct-field">
                    <label class="ct-label" for="name">Nama</label>
                    <input id="name" type="text" name="name" maxlength="100"
                           value="{{ old('name', auth()->user()->name ?? '') }}"
                           class="ct-input @error('name') is-error @enderror">
                    @error('name') <span class="ct-error">{{ $message }}</span> @enderror
                </div>

                <div class="ct-field">
                    <label class="ct-label" for="email">Email</label>
                    <input id="email" type="email" name="email" maxlength="150"
                           value="{{ old('email', auth()->user()->email ?? '') }}"
                           class="ct-input @error('email') is-error @enderror">
                    @error('email') <span class="ct-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="ct-field">
                <label class="ct-label" for="subject">Subjek</label>
                <input id="subject" type="text" name="subject" value="{{ old('subject') }}" maxlength="200"
                       class="ct-input @error('subject') is-error @enderror">
                @error('subject') <span class="ct-error">{{ $message }}</span> @enderror
            </div>

            <div class="ct-field">
                <label class="ct-label" for="body">Pesan</label>
                <textarea id="body" name="body" rows="7" maxlength="2000"
                          class="ct-textarea @error('body') is-error @enderror">{{ old('body') }}</textarea>
                @error('body') <span class="ct-error">{{ $message }}</span> @enderror
            </div>

            <div class="ct-submit">
                <button type="submit" class="btn btn--primary">Kirim pesan</button>
                <span class="ct-submit__note">Balasan dikirim ke email di atas.</span>
            </div>
        </form>

        {{-- INFO --}}
        <aside class="ct-info">
            <h2 class="ct-info__title">Informasi kontak</h2>

            <div class="ct-info__item">
                <div class="ct-info__label">Alamat</div>
                <div class="ct-info__value">Jl. Pendidikan No. 123, Bandung</div>
            </div>

            <div class="ct-info__item">
                <div class="ct-info__label">Telepon</div>
                <div class="ct-info__value">(022) 1234-5678</div>
            </div>

            <div class="ct-info__item">
                <div class="ct-info__label">Email</div>
                <div class="ct-info__value">halo@bookstore.test</div>
            </div>

            <div class="ct-info__item">
                <div class="ct-info__label">Jam operasional</div>
                <div class="ct-info__value">Senin sampai Sabtu, 08.00 sampai 20.00 WIB</div>
            </div>

            <div class="ct-info__item">
                <div class="ct-info__label">Estimasi balasan</div>
                <div class="ct-info__value">1 &times; 24 jam kerja</div>
            </div>
        </aside>
    </div>
</div>
@endsection
