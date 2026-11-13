@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="container" style="padding-top: 56px;">
    <div class="section-opener" style="margin-bottom: 40px;">
        <span class="mono-label">Tentang Kami</span>
        <span class="mono-label">Berdiri Sejak 2020</span>
    </div>

    <h1 class="display-l" style="margin-bottom: 20px;">Merawat kebiasaan membaca<br><span class="em">di tengah bising digital.</span></h1>
    <p class="muted measure" style="margin-bottom: 48px;">
        BookStore adalah toko buku daring yang menyediakan koleksi pilihan dari berbagai kategori
        untuk semua kalangan pembaca di Indonesia.
    </p>

    <div class="detail-split" style="margin-top: 64px;">
        <div class="prose">
            <h2>Siapa Kami</h2>
            <p>
                BookStore berdiri sejak 2020 sebagai toko buku daring. Kami menyediakan ribuan judul
                dari berbagai kategori seperti fiksi, non-fiksi, teknologi, buku anak, dan buku
                pendidikan. Setiap judul dipilih dengan pertimbangan kualitas isi, bukan sekadar
                popularitas.
            </p>
            <p>
                Kami percaya bahwa akses terhadap buku adalah hak semua orang. Karena itu kami
                menghadirkan pengalaman berbelanja buku yang mudah, cepat, dan terjangkau — langsung
                dari rumah Anda.
            </p>

            <h2>Visi</h2>
            <p>Menjadi toko buku daring terpercaya yang menumbuhkan budaya membaca di Indonesia.</p>

            <h2>Misi</h2>
            <ul>
                <li>Menyediakan koleksi buku yang lengkap dengan harga terjangkau.</li>
                <li>Memberikan pelayanan cepat dan ramah kepada setiap pelanggan.</li>
                <li>Mendukung penulis dan penerbit lokal Indonesia.</li>
            </ul>
        </div>

        <aside>
            <div class="panel">
                <div class="panel__head">Informasi Toko</div>

                <div class="info-list" style="border-top: 0;">
                    <div><dt>Alamat</dt><dd>Jl. Pendidikan No. 123, Bandung, Jawa Barat</dd></div>
                    <div><dt>Telepon</dt><dd>(022) 1234-5678</dd></div>
                    <div><dt>Email</dt><dd>halo@bookstore.test</dd></div>
                    <div><dt>Jam Buka</dt><dd>Senin – Sabtu, 08.00 – 20.00 WIB</dd></div>
                    <div><dt>Pembayaran</dt><dd>Bayar di Tempat (COD)</dd></div>
                </div>

                <a href="{{ route('contact.show') }}" class="btn btn--primary btn--block" style="margin-top: 24px;">
                    Hubungi Kami
                </a>
            </div>
        </aside>
    </div>
</div>
@endsection
