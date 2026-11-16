@extends('layouts.admin')

@section('title', 'Pesan masuk')

@section('content')
<div class="msg-page">

    <header class="msg-head">
        <h1 class="msg-title">Pesan masuk</h1>
        <p class="msg-sub">
            @if($unread > 0)
                <span class="msg-sub__n">{{ $unread }}</span>belum dibaca
            @elseif($messages->total() > 0)
                Semua pesan sudah dibaca
            @else
                Belum ada pesan masuk
            @endif
        </p>
    </header>

    <div class="msg-list">
        @forelse($messages as $message)
            <a class="msg-row {{ $message->is_read ? 'is-read' : 'is-unread' }}"
               href="{{ route('admin.messages.show', $message) }}">
                <span class="msg-who">
                    @unless($message->is_read)
                        <span class="msg-mark"><span class="msg-sr">Belum dibaca</span></span>
                    @endunless
                    <span class="msg-who__text">
                        <span class="msg-name">{{ $message->name }}</span>
                        <span class="msg-mail">{{ $message->email }}</span>
                    </span>
                </span>

                <span class="msg-subject">{{ $message->subject }}</span>

                <time class="msg-date" datetime="{{ $message->created_at->toIso8601String() }}">{{ $message->created_at->format('d/m/Y H:i') }}</time>
            </a>
        @empty
            <p class="msg-empty">Belum ada pesan masuk.</p>
        @endforelse
    </div>

    {{ $messages->links('pagination.custom') }}
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-messages.css') }}">
@endpush
