<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ================= USERS =================
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@booknest.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '081234567890',
            'address' => 'Jl. Merdeka No. 1, Jakarta',
        ]);

        $user = User::create([
            'name' => 'Budi Santoso',
            'email' => 'user@booknest.test',
            'password' => Hash::make('password'),
            'role' => 'user',
            'phone' => '081298765432',
            'address' => 'Jl. Sudirman No. 45, Bandung',
        ]);

        $user2 = User::create([
            'name' => 'Siti Aminah',
            'email' => 'siti@booknest.test',
            'password' => Hash::make('password'),
            'role' => 'user',
            'phone' => '081377788899',
            'address' => 'Jl. Diponegoro No. 12, Surabaya',
        ]);

        // ================= CATEGORIES =================
        $categoriesData = [
            ['name' => 'Fiksi', 'description' => 'Novel, cerpen, dan karya fiksi lainnya'],
            ['name' => 'Non-Fiksi', 'description' => 'Buku pengetahuan, biografi, dan esai'],
            ['name' => 'Teknologi', 'description' => 'Pemrograman, jaringan, dan ilmu komputer'],
            ['name' => 'Anak', 'description' => 'Buku cerita dan edukasi untuk anak'],
            ['name' => 'Pendidikan', 'description' => 'Buku pelajaran dan referensi akademik'],
        ];

        $categories = [];
        foreach ($categoriesData as $c) {
            $categories[$c['name']] = Category::create([
                'name' => $c['name'],
                'slug' => Str::slug($c['name']),
                'description' => $c['description'],
            ]);
        }

        // ================= BOOKS =================
        $booksData = [
            // Fiksi
            ['Fiksi', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005, 85000, 25],
            ['Fiksi', 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Lentera Dipantara', 1980, 120000, 18],
            ['Fiksi', 'Cantik Itu Luka', 'Eka Kurniawan', 'Gramedia', 2002, 95000, 12],
            ['Fiksi', 'Perahu Kertas', 'Dee Lestari', 'Bentang Pustaka', 2009, 78000, 20],
            ['Fiksi', 'Hujan', 'Tere Liye', 'Gramedia', 2016, 88000, 30],
            ['Fiksi', 'Pulang', 'Leila S. Chudori', 'Kepustakaan Populer Gramedia', 2012, 110000, 10],
            ['Fiksi', 'Ronggeng Dukuh Paruk', 'Ahmad Tohari', 'Gramedia', 1982, 92000, 8],
            ['Fiksi', 'Supernova: Ksatria, Puteri, dan Bintang Jatuh', 'Dee Lestari', 'Bentang Pustaka', 2001, 99000, 15],

            // Non-Fiksi
            ['Non-Fiksi', 'Filosofi Teras', 'Henry Manampiring', 'Kompas', 2018, 98000, 40],
            ['Non-Fiksi', 'Sapiens: Riwayat Singkat Umat Manusia', 'Yuval Noah Harari', 'Kepustakaan Populer Gramedia', 2017, 150000, 22],
            ['Non-Fiksi', 'Atomic Habits', 'James Clear', 'Gramedia', 2019, 108000, 35],
            ['Non-Fiksi', 'Homo Deus', 'Yuval Noah Harari', 'Kepustakaan Populer Gramedia', 2018, 145000, 14],
            ['Non-Fiksi', 'Cinta Tanah Air', 'Tan Malaka', 'Narasi', 2019, 76000, 9],
            ['Non-Fiksi', 'Catatan Seorang Demonstran', 'Soe Hok Gie', 'LP3ES', 1983, 89000, 7],
            ['Non-Fiksi', 'Berpikir Cepat dan Lambat', 'Daniel Kahneman', 'Gramedia', 2020, 165000, 11],

            // Teknologi
            ['Teknologi', 'Pemrograman PHP untuk Pemula', 'Abdul Kadir', 'Andi Publisher', 2021, 125000, 28],
            ['Teknologi', 'Laravel: Framework PHP Modern', 'Rizky Pratama', 'Informatika', 2023, 145000, 19],
            ['Teknologi', 'Belajar MySQL dari Nol', 'Budi Raharjo', 'Informatika', 2022, 135000, 24],
            ['Teknologi', 'Clean Code', 'Robert C. Martin', 'Prentice Hall', 2008, 210000, 6],
            ['Teknologi', 'Algoritma dan Struktur Data', 'Rinaldi Munir', 'Informatika', 2020, 155000, 16],
            ['Teknologi', 'Dasar Pemrograman JavaScript', 'Eko Kurniawan', 'Andi Publisher', 2022, 118000, 21],
            ['Teknologi', 'Jaringan Komputer Dasar', 'Iwan Sofana', 'Informatika', 2019, 132000, 13],
            ['Teknologi', 'Keamanan Aplikasi Web', 'Dedi Gunawan', 'Elex Media', 2023, 168000, 9],
            ['Teknologi', 'Desain UI/UX untuk Developer', 'Ayu Lestari', 'Informatika', 2023, 142000, 17],

            // Anak
            ['Anak', 'Kancil dan Buaya', 'Tim Penulis', 'Erlangga for Kids', 2018, 45000, 50],
            ['Anak', 'Petualangan Si Kancil', 'Mira W.', 'Gramedia', 2017, 52000, 45],
            ['Anak', 'Cerita Rakyat Nusantara', 'Tim Redaksi', 'Bhuana Ilmu Populer', 2019, 68000, 38],
            ['Anak', 'Dongeng Sebelum Tidur', 'Ratna Ayu', 'Elex Media', 2020, 58000, 42],
            ['Anak', 'Belajar Berhitung Bersama', 'Nurul Hidayat', 'Erlangga for Kids', 2021, 49000, 55],

            // Pendidikan
            ['Pendidikan', 'Matematika Kelas 12', 'Sukino', 'Erlangga', 2020, 95000, 30],
            ['Pendidikan', 'Bahasa Indonesia untuk SMA', 'Kosasih', 'Yrama Widya', 2019, 88000, 26],
            ['Pendidikan', 'Fisika Dasar', 'Halliday dan Resnick', 'Erlangga', 2018, 185000, 12],
            ['Pendidikan', 'Kimia Organik', 'Ralph J. Fessenden', 'Erlangga', 2017, 175000, 8],
            ['Pendidikan', 'Ekonomi Makro', 'Sadono Sukirno', 'Rajawali Pers', 2019, 160000, 10],
            ['Pendidikan', 'Metodologi Penelitian', 'Sugiyono', 'Alfabeta', 2021, 145000, 15],
            ['Pendidikan', 'Statistika untuk Penelitian', 'Sugiyono', 'Alfabeta', 2020, 138000, 14],
        ];

        $books = [];
        foreach ($booksData as $i => $b) {
            [$catName, $title, $author, $publisher, $year, $price, $stock] = $b;

            $books[] = Book::create([
                'category_id' => $categories[$catName]->id,
                'title' => $title,
                'slug' => Str::slug($title),
                'author' => $author,
                'publisher' => $publisher,
                'year' => $year,
                'isbn' => '978-602-' . str_pad((string) (1000 + $i), 4, '0', STR_PAD_LEFT),
                'price' => $price,
                'stock' => $stock,
                'description' => 'Buku "' . $title . '" karya ' . $author . '. Diterbitkan oleh ' . $publisher . ' pada tahun ' . $year . '. Buku ini merupakan salah satu koleksi unggulan di BookNest dan cocok untuk menambah wawasan serta koleksi bacaan Anda.',
                'is_active' => true,
            ]);
        }

        // ================= SAMPLE ORDERS =================
        $orderSeed = [
            [
                'user' => $user,
                'status' => 'completed',
                'payment_status' => 'paid',
                'items' => [[0, 2], [2, 1]],
                'days_ago' => 12,
            ],
            [
                'user' => $user2,
                'status' => 'processing',
                'payment_status' => 'unpaid',
                'items' => [[8, 1], [11, 2]],
                'days_ago' => 5,
            ],
            [
                'user' => $user,
                'status' => 'pending',
                'payment_status' => 'unpaid',
                'items' => [[16, 1]],
                'days_ago' => 1,
            ],
        ];

        foreach ($orderSeed as $idx => $o) {
            $subtotal = 0;
            foreach ($o['items'] as [$bookIdx, $qty]) {
                $subtotal += (float) $books[$bookIdx]->price * $qty;
            }

            $createdAt = now()->subDays($o['days_ago']);

            $order = Order::create([
                'user_id' => $o['user']->id,
                'order_code' => 'INV-' . $createdAt->format('Ymd') . '-' . str_pad((string) ($idx + 1), 4, '0', STR_PAD_LEFT),
                'customer_name' => $o['user']->name,
                'phone' => $o['user']->phone,
                'shipping_address' => $o['user']->address,
                'subtotal' => $subtotal,
                'shipping_cost' => 0,
                'total_price' => $subtotal,
                'status' => $o['status'],
                'payment_method' => 'cod',
                'payment_status' => $o['payment_status'],
                'paid_at' => $o['payment_status'] === 'paid' ? $createdAt->copy()->addDays(2) : null,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);

            foreach ($o['items'] as [$bookIdx, $qty]) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'book_id' => $books[$bookIdx]->id,
                    'title_snapshot' => $books[$bookIdx]->title,
                    'price' => $books[$bookIdx]->price,
                    'qty' => $qty,
                    'subtotal' => (float) $books[$bookIdx]->price * $qty,
                ]);
            }
        }

        $this->command->info('Seeder selesai: 3 user, 5 kategori, ' . count($books) . ' buku, 3 pesanan.');
    }
}
