@extends('layouts.admin')

@section('title', 'Baca Pesan')

@section('content')
<div class="admin-bar">
    <div>
        <div class="mono-label">06 / Transaksi / Pesan</div>
        <h1 class="admin-title" style="margin-top: 8px;">{{ $message->subject }}</h1>
    </div>
    <div class="admin-actions">
        <a href="{{ route('admin.messages.index') }}" class="btn--quiet">Kembali</a>
    </div>
</div>

<div style="max-width: 760px;">
    <div class="panel">
        <div class="panel__head" style="display: flex; justify-content: space-between; gap: 16px; flex-wrap: wrap;">
            <span>{{ $message->name }} &lt;{{ $message->email }}&gt;</span>
            <span>{{ $message->created_at->format('d/m/Y H:i') }}</span>
        </div>

        <p style="white-space: pre-line; font-size: 15px;">{{ $message->body }}</p>
    </div>

    <div style="display: flex; gap: 20px; align-items: center; margin-top: 24px; flex-wrap: wrap;">
        <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}"
           class="btn btn--primary btn--sm">Balas via Email</a>

        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST"
              onsubmit="return confirm('Hapus pesan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn--quiet" style="color: var(--danger);">Hapus Pesan</button>
        </form>
    </div>
</div>
@endsection
