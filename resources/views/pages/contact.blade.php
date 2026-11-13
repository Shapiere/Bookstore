@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h3 class="fw-bold mb-1">Hubungi Admin</h3>
        <p class="text-muted">Kirim pertanyaan atau masukan Anda. Kami akan membalas melalui email.</p>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name', auth()->user()->name ?? '') }}"
                                   class="form-control @error('name') is-invalid @enderror" maxlength="100">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}"
                                   class="form-control @error('email') is-invalid @enderror" maxlength="150">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subjek <span class="text-danger">*</span></label>
                        <input type="text" name="subject" value="{{ old('subject') }}"
                               class="form-control @error('subject') is-invalid @enderror" maxlength="200">
                        @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pesan <span class="text-danger">*</span></label>
                        <textarea name="body" rows="5"
                                  class="form-control @error('body') is-invalid @enderror"
                                  maxlength="2000">{{ old('body') }}</textarea>
                        @error('body') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
