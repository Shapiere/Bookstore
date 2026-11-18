# BookStore — Aplikasi Toko Buku Online

Aplikasi toko buku berbasis web yang dibangun dengan **Laravel 13** dan **MySQL** untuk memenuhi
Uji Kompetensi **Junior Web Developer** (BNSP).

Aplikasi memiliki **2 aktor**: **Admin** (mengelola data buku dan pesanan) dan **User/Customer**
(melakukan pembelian buku).

---

## Fitur

### Admin
- Login admin (role-based)
- Dashboard: statistik toko + **grafik penjualan 6 bulan** + daftar buku terlaris
- **CRUD Kategori Buku** (tambah / lihat / ubah / hapus)
- **CRUD Data Buku** (termasuk upload cover buku)
- **List User** terdaftar + detail + riwayat pesanan
- **List Pesanan** dari seluruh user + filter status + ubah status
- Verifikasi pembayaran (COD)
- Inbox pesan dari halaman Contact

### User / Customer
- **Registrasi** dan **Login**
- Beranda dengan pencarian cepat
- **Pencarian buku** (judul / penulis / penerbit) + filter kategori + urutkan harga
- Detail buku
- Halaman **Tentang Kami**
- **Contact to Admin** (kirim pesan)
- **Add to Cart** (keranjang belanja)
- **Checkout** dengan pembayaran **COD (Bayar di Tempat)**
- Riwayat dan detail pesanan

---

## Teknologi

| Komponen | Versi / Keterangan |
|---|---|
| Framework | Laravel 13.42 |
| Bahasa | PHP 8.3 |
| Database | MySQL / MariaDB 10.4 |
| CSS | CSS custom (tanpa framework) |
| Grafik | SVG native (tanpa library) |
| Pembayaran | COD (Bayar di Tempat) |

> Seluruh CSS ditulis sendiri di `public/css/` tanpa Bootstrap atau Tailwind. Grafik dashboard
> memakai SVG native, bukan Chart.js. Font Fraunces, Inter, dan JetBrains Mono disimpan lokal
> di `public/fonts/` agar demonstrasi tetap normal tanpa koneksi internet.

---

## Struktur Database

7 tabel utama:

| Tabel | Fungsi |
|---|---|
| users | Data pengguna + kolom role (admin/user) |
| categories | Kategori buku |
| books | Data buku + cover |
| carts | Keranjang belanja user |
| orders | Header pesanan |
| order_items | Detail item pesanan (menyimpan snapshot judul & harga) |
| messages | Pesan dari form Contact |

Relasi:

    users 1 --- N orders 1 --- N order_items N --- 1 books N --- 1 categories
    users 1 --- N carts    N --- 1 books
    users 1 --- N messages

---

## Instalasi

### 1. Prasyarat
- PHP 8.2 atau lebih baru (ekstensi: pdo_mysql, mbstring, openssl, fileinfo, zip, gd)
- Composer
- MySQL / MariaDB (XAMPP juga bisa)

### 2. Langkah instalasi

    # 1. Masuk ke folder proyek
    cd BookStore

    # 2. Install dependency
    composer install

    # 3. Salin file konfigurasi
    copy .env.example .env

    # 4. Generate application key
    php artisan key:generate

    # 5. Buat database baru bernama bookstore_bnsp
    #    (lewat phpMyAdmin, atau:)
    mysql -u root -e "CREATE DATABASE bookstore_bnsp;"

    # 6. Sesuaikan koneksi database di file .env
    #    DB_DATABASE=bookstore_bnsp
    #    DB_USERNAME=root
    #    DB_PASSWORD=

    # 7. Jalankan migrasi + data contoh
    php artisan migrate:fresh --seed

    # 8. Buat symbolic link untuk folder upload
    php artisan storage:link

    # 9. Jalankan server
    php artisan serve

### 3. Buka aplikasi di browser

    http://127.0.0.1:8000

---

## Akun Demo

| Role | Email | Password |
|---|---|---|
| Admin | admin@booknest.test | password |
| User | user@booknest.test | password |
| User | siti@booknest.test | password |

---

## Alur Data (Front-End ke Back-End)

    Form (Blade)
       |
       v
    routes/web.php
       |
       v
    Controller  -->  FormRequest (validasi)
       |
       v
    Service (CartService / OrderService) + Model Eloquent
       |
       v
    MySQL
       |
       v
    Redirect + flash message  -->  View Blade

Proses checkout dibungkus DB::transaction agar pesanan, detail pesanan, dan pengurangan stok
tersimpan konsisten. Buku dikunci dengan lockForUpdate untuk mencegah perebutan stok.

---

## Lisensi

Dibuat untuk keperluan Uji Kompetensi BNSP Junior Web Developer.
