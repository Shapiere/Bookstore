@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<div class="container" style="padding-top: 56px;">
    <div class="section-opener" style="margin-bottom: 40px;">
        <span class="mono-label">Kontak</span>
        <span class="mono-label">Balasan Melalui Email</span>
    </div>

    <h1 class="display-l" style="margin-bottom: 20px;">Hubungi Admin</h1>
    <p class="muted measure" style="margin-bottom: 56px;">
        Sampaikan pertanyaan, masukan, atau kendala pesanan Anda. Kami akan membalas melalui email
        yang Anda cantumkan.
    </p>

    <div class="detail-split">
        <div>
            <div class="checkout-step__head">
                <span class="checkout-step__num">01</span>
                <span class="checkout-step__title">Formulir Pesan</span>
            </div>

            <form action="{{ route('contact.store') }}" method="POST">
                @csrf

                <div class="field-row">
                    <div class="field">
                        <label class="field__label" for="name">Nama</label>
                        <input id="name" type="text" name="name" maxlength="100"
                               value="{{ old('name', auth()->user()->name ?? '') }}"
                               class="field__input @error('name') is-error @enderror">
                        @error('name') <span class="field__error">{{ $message }}</span> @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="email">Email</label>
                        <input id="email" type="email" name="email" maxlength="150"
                               value="{{ old('email', auth()->user()->email ?? '') }}"
                               class="field__input @error('email') is-error @enderror">
                        @error('email') <span class="field__error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="field__label" for="subject">Subjek</label>
                    <input id="subject" type="text" name="subject" value="{{ old('subject') }}" maxlength="200"
                           class="field__input @error('subject') is-error @enderror">
                    @error('subject') <span class="field__error">{{ $message }}</span> @enderror
                </div>

                <div class="field">
                    <label class="field__label" for="body">Pesan</label>
                    <textarea id="body" name="body" rows="6" maxlength="2000"
                              class="field__textarea @error('body') is-error @enderror">{{ old('body') }}</textarea>
                    @error('body') <span class="field__error">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn--primary">Kirim Pesan</button>
            </form>
        </div>

        <aside>
            <div class="panel">
                <div class="panel__head">Informasi Kontak</div>

                <div class="info-list" style="border-top: 0;">
                    <div><dt>Alamat</dt><dd>Jl. Pendidikan No. 123, Bandung</dd></div>
                    <div><dt>Telepon</dt><dd>(022) 1234-5678</dd></div>
                    <div><dt>Email</dt><dd>halo@bookstore.test</dd></div>
                    <div><dt>Jam Operasional</dt><dd>Senin – Sabtu, 08.00 – 20.00 WIB</dd></div>
                    <div><dt>Estimasi Balasan</dt><dd>1 × 24 jam kerja</dd></div>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
