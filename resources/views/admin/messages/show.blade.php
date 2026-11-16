@extends('layouts.admin')

@section('title', 'Baca pesan')

@section('content')
<article class="msg-thread">

    <a href="{{ route('admin.messages.index') }}" class="msg-back">&larr; Pesan masuk</a>

    <header class="msg-thread__head">
        <h1 class="msg-title">{{ $message->subject }}</h1>

        <div class="msg-thread__meta">
            <span class="msg-thread__from">
                <span class="msg-thread__name">{{ $message->name }}</span>
                <span class="msg-thread__mail">{{ $message->email }}</span>
            </span>
            <time class="msg-thread__date" datetime="{{ $message->created_at->toIso8601String() }}">{{ $message->created_at->format('d/m/Y H:i') }}</time>
        </div>
    </header>

    <p class="msg-thread__body">{{ $message->body }}</p>

    <div class="msg-thread__foot">
        <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}"
           class="btn btn--primary btn--sm">Balas via Email</a>

        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST"
              onsubmit="return confirm('Hapus pesan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="msg-delete">Hapus Pesan</button>
        </form>
    </div>
</article>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-messages.css') }}">
@endpush
