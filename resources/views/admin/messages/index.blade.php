@extends('layouts.admin')

@section('title', 'Pesan')
@section('heading', 'Pesan Masuk')
@section('subheading', $unread . ' pesan belum dibaca')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr><th width="60"></th><th>Pengirim</th><th>Subjek</th><th>Tanggal</th><th width="90">Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                    <tr class="{{ $message->is_read ? '' : 'table-warning' }}">
                        <td class="text-center">
                            @if(! $message->is_read)
                                <span class="badge bg-danger">Baru</span>
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold">{{ $message->name }}</div>
                            <small class="text-muted">{{ $message->email }}</small>
                        </td>
                        <td>{{ $message->subject }}</td>
                        <td><small>{{ $message->created_at->format('d/m/Y H:i') }}</small></td>
                        <td><a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-outline-primary">Baca</a></td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">Belum ada pesan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3 d-flex justify-content-end">{{ $messages->links() }}</div>
@endsection
