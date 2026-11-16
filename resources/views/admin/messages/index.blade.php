@extends('layouts.admin')

@section('title', 'Pesan')

@section('content')
<div class="admin-bar">
    <div>
        <h1 class="admin-title" style="margin-top: 8px;">Pesan Masuk</h1>
    </div>
    <div class="admin-actions">
        <span class="mono-label">{{ $unread }} Belum Dibaca</span>
    </div>
</div>

<div class="table-wrap">
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 70px;">Status</th>
                <th>Pengirim</th>
                <th>Subjek</th>
                <th>Tanggal</th>
                <th style="width: 90px;"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $message)
                <tr>
                    <td>
                        @if(! $message->is_read)
                            <span class="status status--pending">Baru</span>
                        @else
                            <span class="muted small">Dibaca</span>
                        @endif
                    </td>
                    <td>
                        <div style="{{ $message->is_read ? '' : 'font-weight: 500;' }}">{{ $message->name }}</div>
                        <div class="small muted">{{ $message->email }}</div>
                    </td>
                    <td>{{ $message->subject }}</td>
                    <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <div class="row-actions">
                            <a href="{{ route('admin.messages.show', $message) }}">Baca</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="muted" style="padding: 32px 0;">Belum ada pesan masuk.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $messages->links('pagination.custom') }}
@endsection
