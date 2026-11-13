@extends('layouts.admin')

@section('title', 'Baca Pesan')
@section('heading', $message->subject)
@section('subheading', 'Dari ' . $message->name)

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between border-bottom pb-3 mb-3">
            <div>
                <div class="fw-semibold">{{ $message->name }}</div>
                <a href="mailto:{{ $message->email }}" class="small">{{ $message->email }}</a>
            </div>
            <small class="text-muted">{{ $message->created_at->format('d F Y, H:i') }}</small>
        </div>
        <p style="white-space: pre-line">{{ $message->body }}</p>
    </div>
</div>

<div class="d-flex gap-2 mt-3">
    <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary">Kembali</a>
    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-outline-danger">Hapus Pesan</button>
    </form>
</div>
@endsection
