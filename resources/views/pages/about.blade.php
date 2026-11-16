@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="container ab-page">
    {{-- Judul --}}
    <h1 class="ab-title">
        Merawat kebiasaan membaca<br>
        <span class="em">di tengah bising digital.</span>
    </h1>

    {{-- Tiga kolom --}}
    <div class="ab-cols">
        <article class="ab-col">
            <h2 class="ab-col__title">Siapa kami</h2>

            <p class="ab-col__text">
                BookStore berdiri sejak 2020 sebagai toko buku daring. Kami menyediakan koleksi
                buku dari berbagai kategori: fiksi, non-fiksi, teknologi, buku anak, dan buku
                pendidikan. Setiap judul dipilih dengan pertimbangan kualitas, bukan sekadar
                popularitas.
            </p>

            <p class="ab-col__text">
                Kami percaya akses terhadap buku adalah hak semua orang. Karena itu kami
                menghadirkan pengalaman berbelanja buku yang mudah, cepat, dan terjangkau,
                langsung dari rumah Anda.
            </p>
        </article>

        <article class="ab-col">
            <h2 class="ab-col__title">Visi</h2>

            <p class="ab-col__text ab-col__text--quote">
                Menjadi toko buku daring terpercaya yang menumbuhkan budaya membaca di Indonesia.
            </p>
        </article>

        <article class="ab-col">
            <h2 class="ab-col__title">Misi</h2>

            <p class="ab-col__text">
                Menyediakan koleksi buku yang lengkap dengan harga terjangkau.
            </p>

            <p class="ab-col__text">
                Memberikan pelayanan cepat dan ramah kepada setiap pelanggan.
            </p>

            <p class="ab-col__text">
                Mendukung penulis dan penerbit lokal Indonesia.
            </p>
        </article>
    </div>
</div>
@endsection
