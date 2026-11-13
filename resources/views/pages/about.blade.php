@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="p-5 mb-4 rounded-3 text-white" style="background: linear-gradient(135deg, #1e3a8a, #2563eb);">
    <h1 class="fw-bold">Tentang BookStore</h1>
    <p class="lead mb-0">Toko buku online yang menyediakan koleksi pilihan untuk semua kalangan.</p>
</div>

<div class="row g-4">
    <div class="col-md-7">
        <h5 class="fw-bold">Siapa Kami</h5>
        <p>
            BookStore adalah toko buku online yang berdiri sejak 2020. Kami menyediakan ribuan judul buku
            dari berbagai kategori seperti fiksi, non-fiksi, teknologi, buku anak, dan buku pendidikan.
        </p>
        <p>
            Kami percaya bahwa akses terhadap buku adalah hak semua orang. Karena itu kami menghadirkan
            pengalaman berbelanja buku yang mudah, cepat, dan terjangkau — langsung dari rumah Anda.
        </p>

        <h5 class="fw-bold mt-4">Visi</h5>
        <p>Menjadi toko buku online terpercaya yang menumbuhkan budaya membaca di Indonesia.</p>

        <h5 class="fw-bold mt-4">Misi</h5>
        <ul>
            <li>Menyediakan koleksi buku yang lengkap dengan harga terjangkau.</li>
            <li>Memberikan pelayanan cepat dan ramah kepada setiap pelanggan.</li>
            <li>Mendukung penulis dan penerbit lokal Indonesia.</li>
        </ul>
    </div>

    <div class="col-md-5">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-semibold">Informasi Toko</div>
            <div class="card-body small">
                <dl class="row mb-0">
                    <dt class="col-4">Alamat</dt>
                    <dd class="col-8">Jl. Pendidikan No. 123, Bandung, Jawa Barat</dd>
                    <dt class="col-4">Telepon</dt>
                    <dd class="col-8">(022) 1234-5678</dd>
                    <dt class="col-4">Email</dt>
                    <dd class="col-8">halo@bookstore.test</dd>
                    <dt class="col-4">Jam Buka</dt>
                    <dd class="col-8">Senin - Sabtu, 08.00 - 20.00 WIB</dd>
                </dl>
                <a href="{{ route('contact.show') }}" class="btn btn-primary btn-sm w-100 mt-3">Hubungi Kami</a>
            </div>
        </div>
    </div>
</div>
@endsection
