
CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bookstore_bnsp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `bookstore_bnsp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(220) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `stock` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `books_slug_unique` (`slug`),
  KEY `books_category_id_foreign` (`category_id`),
  KEY `books_title_index` (`title`),
  CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `books` VALUES (1,1,'Laskar Pelangi','laskar-pelangi','Andrea Hirata','Bentang Pustaka',2005,'978-602-1000',85000.00,10,'Buku \"Laskar Pelangi\" karya Andrea Hirata. Diterbitkan oleh Bentang Pustaka pada tahun 2005. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/laskar-pelangi.png',1,'2026-11-13 11:33:20','2026-11-16 23:50:19'),(2,1,'Bumi Manusia','bumi-manusia','Pramoedya Ananta Toer','Lentera Dipantara',1980,'978-602-1001',120000.00,15,'Buku \"Bumi Manusia\" karya Pramoedya Ananta Toer. Diterbitkan oleh Lentera Dipantara pada tahun 1980. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/bumi-manusia.png',1,'2026-11-13 11:33:21','2026-11-14 04:22:30'),(3,1,'Cantik Itu Luka','cantik-itu-luka','Eka Kurniawan','Gramedia',2002,'978-602-1002',95000.00,12,'Buku \"Cantik Itu Luka\" karya Eka Kurniawan. Diterbitkan oleh Gramedia pada tahun 2002. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/cantik-itu-luka.png',1,'2026-11-13 11:33:21','2026-11-13 11:33:21'),(4,1,'Perahu Kertas','perahu-kertas','Dee Lestari','Bentang Pustaka',2009,'978-602-1003',78000.00,20,'Buku \"Perahu Kertas\" karya Dee Lestari. Diterbitkan oleh Bentang Pustaka pada tahun 2009. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/perahu-kertas.png',1,'2026-11-13 11:33:21','2026-11-13 11:33:21'),(5,1,'Hujan','hujan','Tere Liye','Gramedia',2016,'978-602-1004',88000.00,30,'Buku \"Hujan\" karya Tere Liye. Diterbitkan oleh Gramedia pada tahun 2016. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/hujan.png',1,'2026-11-13 11:33:21','2026-11-13 11:33:21'),(6,1,'Pulang','pulang','Leila S. Chudori','Kepustakaan Populer Gramedia',2012,'978-602-1005',110000.00,10,'Buku \"Pulang\" karya Leila S. Chudori. Diterbitkan oleh Kepustakaan Populer Gramedia pada tahun 2012. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/pulang.png',1,'2026-11-13 11:33:21','2026-11-13 11:33:21'),(7,1,'Ronggeng Dukuh Paruk','ronggeng-dukuh-paruk','Ahmad Tohari','Gramedia',1982,'978-602-1006',92000.00,8,'Buku \"Ronggeng Dukuh Paruk\" karya Ahmad Tohari. Diterbitkan oleh Gramedia pada tahun 1982. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/ronggeng-dukuh-paruk.png',1,'2026-11-13 11:33:21','2026-11-13 11:33:21'),(8,1,'Supernova: Ksatria, Puteri, dan Bintang Jatuh','supernova-ksatria-puteri-dan-bintang-jatuh','Dee Lestari','Bentang Pustaka',2001,'978-602-1007',99000.00,15,'Buku \"Supernova: Ksatria, Puteri, dan Bintang Jatuh\" karya Dee Lestari. Diterbitkan oleh Bentang Pustaka pada tahun 2001. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/supernova-ksatria-puteri-dan-bintang-jatuh.png',1,'2026-11-13 11:33:21','2026-11-13 11:33:21'),(9,2,'Filosofi Teras','filosofi-teras','Henry Manampiring','Kompas',2018,'978-602-1008',98000.00,40,'Buku \"Filosofi Teras\" karya Henry Manampiring. Diterbitkan oleh Kompas pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/filosofi-teras.png',1,'2026-11-13 11:33:21','2026-11-13 11:33:21'),(10,2,'Sapiens: Riwayat Singkat Umat Manusia','sapiens-riwayat-singkat-umat-manusia','Yuval Noah Harari','Kepustakaan Populer Gramedia',2017,'978-602-1009',150000.00,22,'Buku \"Sapiens: Riwayat Singkat Umat Manusia\" karya Yuval Noah Harari. Diterbitkan oleh Kepustakaan Populer Gramedia pada tahun 2017. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/sapiens-riwayat-singkat-umat-manusia.png',1,'2026-11-13 11:33:21','2026-11-13 11:33:21'),(11,2,'Atomic Habits','atomic-habits','James Clear','Gramedia',2019,'978-602-1010',108000.00,35,'Buku \"Atomic Habits\" karya James Clear. Diterbitkan oleh Gramedia pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/atomic-habits.png',1,'2026-11-13 11:33:21','2026-11-13 11:33:21'),(12,2,'Homo Deus','homo-deus','Yuval Noah Harari','Kepustakaan Populer Gramedia',2018,'978-602-1011',145000.00,14,'Buku \"Homo Deus\" karya Yuval Noah Harari. Diterbitkan oleh Kepustakaan Populer Gramedia pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/homo-deus.png',1,'2026-11-13 11:33:21','2026-11-13 11:33:21'),(13,2,'Cinta Tanah Air','cinta-tanah-air','Tan Malaka','Narasi',2019,'978-602-1012',76000.00,9,'Buku \"Cinta Tanah Air\" karya Tan Malaka. Diterbitkan oleh Narasi pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/cinta-tanah-air.png',1,'2026-11-13 11:33:21','2026-11-13 11:33:21'),(14,2,'Catatan Seorang Demonstran','catatan-seorang-demonstran','Soe Hok Gie','LP3ES',1983,'978-602-1013',89000.00,7,'Buku \"Catatan Seorang Demonstran\" karya Soe Hok Gie. Diterbitkan oleh LP3ES pada tahun 1983. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/catatan-seorang-demonstran.png',1,'2026-11-13 11:33:21','2026-11-13 11:33:21'),(15,2,'Berpikir Cepat dan Lambat','berpikir-cepat-dan-lambat','Daniel Kahneman','Gramedia',2020,'978-602-1014',165000.00,11,'Buku \"Berpikir Cepat dan Lambat\" karya Daniel Kahneman. Diterbitkan oleh Gramedia pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/berpikir-cepat-dan-lambat.png',1,'2026-11-13 11:33:21','2026-11-13 11:33:21'),(16,3,'Pemrograman PHP untuk Pemula','pemrograman-php-untuk-pemula','Abdul Kadir','Andi Publisher',2021,'978-602-1015',125000.00,28,'Buku \"Pemrograman PHP untuk Pemula\" karya Abdul Kadir. Diterbitkan oleh Andi Publisher pada tahun 2021. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/pemrograman-php-untuk-pemula.png',1,'2026-11-13 11:33:21','2026-11-13 11:33:21'),(17,3,'Laravel: Framework PHP Modern','laravel-framework-php-modern','Rizky Pratama','Informatika',2023,'978-602-1016',145000.00,19,'Buku \"Laravel: Framework PHP Modern\" karya Rizky Pratama. Diterbitkan oleh Informatika pada tahun 2023. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/laravel-framework-php-modern.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(18,3,'Belajar MySQL dari Nol','belajar-mysql-dari-nol','Budi Raharjo','Informatika',2022,'978-602-1017',135000.00,24,'Buku \"Belajar MySQL dari Nol\" karya Budi Raharjo. Diterbitkan oleh Informatika pada tahun 2022. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/belajar-mysql-dari-nol.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(19,3,'Clean Code','clean-code','Robert C. Martin','Prentice Hall',2008,'978-602-1018',210000.00,6,'Buku \"Clean Code\" karya Robert C. Martin. Diterbitkan oleh Prentice Hall pada tahun 2008. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/clean-code.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(20,3,'Algoritma dan Struktur Data','algoritma-dan-struktur-data','Rinaldi Munir','Informatika',2020,'978-602-1019',155000.00,16,'Buku \"Algoritma dan Struktur Data\" karya Rinaldi Munir. Diterbitkan oleh Informatika pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/algoritma-dan-struktur-data.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(21,3,'Dasar Pemrograman JavaScript','dasar-pemrograman-javascript','Eko Kurniawan','Andi Publisher',2022,'978-602-1020',118000.00,21,'Buku \"Dasar Pemrograman JavaScript\" karya Eko Kurniawan. Diterbitkan oleh Andi Publisher pada tahun 2022. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/dasar-pemrograman-javascript.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(22,3,'Jaringan Komputer Dasar','jaringan-komputer-dasar','Iwan Sofana','Informatika',2019,'978-602-1021',132000.00,13,'Buku \"Jaringan Komputer Dasar\" karya Iwan Sofana. Diterbitkan oleh Informatika pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/jaringan-komputer-dasar.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(23,3,'Keamanan Aplikasi Web','keamanan-aplikasi-web','Dedi Gunawan','Elex Media',2023,'978-602-1022',168000.00,9,'Buku \"Keamanan Aplikasi Web\" karya Dedi Gunawan. Diterbitkan oleh Elex Media pada tahun 2023. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/keamanan-aplikasi-web.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(24,3,'Desain UI/UX untuk Developer','desain-uiux-untuk-developer','Ayu Lestari','Informatika',2023,'978-602-1023',142000.00,17,'Buku \"Desain UI/UX untuk Developer\" karya Ayu Lestari. Diterbitkan oleh Informatika pada tahun 2023. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/desain-uiux-untuk-developer.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(25,4,'Kancil dan Buaya','kancil-dan-buaya','Tim Penulis','Erlangga for Kids',2018,'978-602-1024',45000.00,50,'Buku \"Kancil dan Buaya\" karya Tim Penulis. Diterbitkan oleh Erlangga for Kids pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/kancil-dan-buaya.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(26,4,'Petualangan Si Kancil','petualangan-si-kancil','Mira W.','Gramedia',2017,'978-602-1025',52000.00,45,'Buku \"Petualangan Si Kancil\" karya Mira W.. Diterbitkan oleh Gramedia pada tahun 2017. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/petualangan-si-kancil.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(27,4,'Cerita Rakyat Nusantara','cerita-rakyat-nusantara','Tim Redaksi','Bhuana Ilmu Populer',2019,'978-602-1026',68000.00,38,'Buku \"Cerita Rakyat Nusantara\" karya Tim Redaksi. Diterbitkan oleh Bhuana Ilmu Populer pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/cerita-rakyat-nusantara.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(28,4,'Dongeng Sebelum Tidur','dongeng-sebelum-tidur','Ratna Ayu','Elex Media',2020,'978-602-1027',58000.00,42,'Buku \"Dongeng Sebelum Tidur\" karya Ratna Ayu. Diterbitkan oleh Elex Media pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/dongeng-sebelum-tidur.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(29,4,'Belajar Berhitung Bersama','belajar-berhitung-bersama','Nurul Hidayat','Erlangga for Kids',2021,'978-602-1028',49000.00,55,'Buku \"Belajar Berhitung Bersama\" karya Nurul Hidayat. Diterbitkan oleh Erlangga for Kids pada tahun 2021. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/belajar-berhitung-bersama.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(30,5,'Matematika Kelas 12','matematika-kelas-12','Sukino','Erlangga',2020,'978-602-1029',95000.00,30,'Buku \"Matematika Kelas 12\" karya Sukino. Diterbitkan oleh Erlangga pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/matematika-kelas-12.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(31,5,'Bahasa Indonesia untuk SMA','bahasa-indonesia-untuk-sma','Kosasih','Yrama Widya',2019,'978-602-1030',88000.00,26,'Buku \"Bahasa Indonesia untuk SMA\" karya Kosasih. Diterbitkan oleh Yrama Widya pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/bahasa-indonesia-untuk-sma.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(32,5,'Fisika Dasar','fisika-dasar','Halliday dan Resnick','Erlangga',2018,'978-602-1031',185000.00,12,'Buku \"Fisika Dasar\" karya Halliday dan Resnick. Diterbitkan oleh Erlangga pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/fisika-dasar.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(33,5,'Kimia Organik','kimia-organik','Ralph J. Fessenden','Erlangga',2017,'978-602-1032',175000.00,8,'Buku \"Kimia Organik\" karya Ralph J. Fessenden. Diterbitkan oleh Erlangga pada tahun 2017. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/kimia-organik.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(34,5,'Ekonomi Makro','ekonomi-makro','Sadono Sukirno','Rajawali Pers',2019,'978-602-1033',160000.00,10,'Buku \"Ekonomi Makro\" karya Sadono Sukirno. Diterbitkan oleh Rajawali Pers pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/ekonomi-makro.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(35,5,'Metodologi Penelitian','metodologi-penelitian','Sugiyono','Alfabeta',2021,'978-602-1034',145000.00,15,'Buku \"Metodologi Penelitian\" karya Sugiyono. Diterbitkan oleh Alfabeta pada tahun 2021. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/metodologi-penelitian.png',1,'2026-11-13 11:33:22','2026-11-13 11:33:22'),(36,5,'Statistika untuk Penelitian','statistika-untuk-penelitian','Sugiyono','Alfabeta',2020,'978-602-1035',138000.00,14,'Buku \"Statistika untuk Penelitian\" karya Sugiyono. Diterbitkan oleh Alfabeta pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/statistika-untuk-penelitian.png',1,'2026-11-13 11:33:23','2026-11-13 11:33:23');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `book_id` bigint(20) unsigned NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `carts_user_id_book_id_unique` (`user_id`,`book_id`),
  KEY `carts_book_id_foreign` (`book_id`),
  CONSTRAINT `carts_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `categories` VALUES (1,'Fiksi','fiksi','Novel, cerpen, dan karya fiksi lainnya','2026-11-13 11:33:20','2026-11-13 11:33:20'),(2,'Non-Fiksi','non-fiksi','Buku pengetahuan, biografi, dan esai','2026-11-13 11:33:20','2026-11-13 11:33:20'),(3,'Teknologi','teknologi','Pemrograman, jaringan, dan ilmu komputer','2026-11-13 11:33:20','2026-11-13 11:33:20'),(4,'Anak','anak','Buku cerita dan edukasi untuk anak','2026-11-13 11:33:20','2026-11-13 11:33:20'),(5,'Pendidikan','pendidikan','Buku pelajaran dan referensi akademik','2026-11-13 11:33:20','2026-11-13 11:33:20');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_user_id_foreign` (`user_id`),
  CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `messages` VALUES (1,2,'Budi Santoso','user@booknest.test','Tanya stok buku Clean Code','Selamat siang, apakah buku Clean Code masih tersedia? Saya ingin memesan 2 eksemplar jika stoknya ada. Terima kasih.',1,'2026-11-14 11:29:11','2026-11-14 04:29:34'),(2,3,'Siti Aminah','siti@booknest.test','Konfirmasi pembayaran COD','Saya sudah menerima pesanan INV-20261112-0001 dan sudah membayar tunai ke kurir. Mohon status pesanan diperbarui. Terima kasih.',1,'2026-11-14 11:29:11','2026-11-14 11:29:11'),(3,NULL,'Tester','test@x.test','Audit','pesan audit',1,'2026-11-14 05:02:32','2026-11-16 03:25:17');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_11_12_000001_add_role_to_users_table',1),(5,'2026_11_12_000002_create_categories_table',1),(6,'2026_11_12_000003_create_books_table',1),(7,'2026_11_12_000004_create_carts_table',1),(8,'2026_11_12_000005_create_orders_table',1),(9,'2026_11_12_000006_create_order_items_table',1),(10,'2026_11_12_000007_create_messages_table',1);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `book_id` bigint(20) unsigned DEFAULT NULL,
  `title_snapshot` varchar(200) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_book_id_foreign` (`book_id`),
  CONSTRAINT `order_items_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE SET NULL,
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `order_items` VALUES (1,1,1,'Laskar Pelangi',85000.00,2,170000.00,'2026-11-13 11:33:23','2026-11-13 11:33:23'),(2,1,3,'Cantik Itu Luka',95000.00,1,95000.00,'2026-11-13 11:33:23','2026-11-13 11:33:23'),(3,2,9,'Filosofi Teras',98000.00,1,98000.00,'2026-11-13 11:33:23','2026-11-13 11:33:23'),(4,3,10,'Sapiens: Riwayat Singkat Umat Manusia',150000.00,1,150000.00,'2026-11-13 11:33:23','2026-11-13 11:33:23'),(5,3,11,'Atomic Habits',108000.00,2,216000.00,'2026-11-13 11:33:23','2026-11-13 11:33:23'),(6,4,16,'Pemrograman PHP untuk Pemula',125000.00,1,125000.00,'2026-11-13 11:33:23','2026-11-13 11:33:23'),(7,5,17,'Laravel: Framework PHP Modern',145000.00,1,145000.00,'2026-11-13 11:33:23','2026-11-13 11:33:23'),(8,5,18,'Belajar MySQL dari Nol',135000.00,1,135000.00,'2026-11-13 11:33:23','2026-11-13 11:33:23'),(9,6,5,'Hujan',88000.00,3,264000.00,'2026-11-13 11:33:23','2026-11-13 11:33:23'),(10,7,25,'Kancil dan Buaya',45000.00,2,90000.00,'2026-11-13 11:33:23','2026-11-13 11:33:23'),(11,7,26,'Petualangan Si Kancil',52000.00,1,52000.00,'2026-11-13 11:33:23','2026-11-13 11:33:23'),(12,8,29,'Belajar Berhitung Bersama',49000.00,1,49000.00,'2026-11-13 11:33:23','2026-11-13 11:33:23'),(13,8,30,'Matematika Kelas 12',95000.00,2,190000.00,'2026-11-13 11:33:23','2026-11-13 11:33:23'),(14,9,12,'Homo Deus',145000.00,1,145000.00,'2026-11-13 11:33:24','2026-11-13 11:33:24'),(15,9,13,'Cinta Tanah Air',76000.00,1,76000.00,'2026-11-13 11:33:24','2026-11-13 11:33:24'),(16,9,14,'Catatan Seorang Demonstran',89000.00,1,89000.00,'2026-11-13 11:33:24','2026-11-13 11:33:24'),(17,10,19,'Clean Code',210000.00,1,210000.00,'2026-11-13 11:33:24','2026-11-13 11:33:24'),(18,10,20,'Algoritma dan Struktur Data',155000.00,1,155000.00,'2026-11-13 11:33:24','2026-11-13 11:33:24'),(19,11,21,'Dasar Pemrograman JavaScript',118000.00,2,236000.00,'2026-11-13 11:33:24','2026-11-13 11:33:24'),(20,12,2,'Bumi Manusia',120000.00,1,120000.00,'2026-11-13 11:33:24','2026-11-13 11:33:24'),(21,12,4,'Perahu Kertas',78000.00,1,78000.00,'2026-11-13 11:33:24','2026-11-13 11:33:24'),(22,13,31,'Bahasa Indonesia untuk SMA',88000.00,1,88000.00,'2026-11-13 11:33:24','2026-11-13 11:33:24'),(23,13,32,'Fisika Dasar',185000.00,1,185000.00,'2026-11-13 11:33:24','2026-11-13 11:33:24'),(24,14,33,'Kimia Organik',175000.00,1,175000.00,'2026-11-13 11:33:24','2026-11-13 11:33:24'),(25,15,6,'Pulang',110000.00,1,110000.00,'2026-11-13 11:33:24','2026-11-13 11:33:24'),(26,15,7,'Ronggeng Dukuh Paruk',92000.00,2,184000.00,'2026-11-13 11:33:24','2026-11-13 11:33:24'),(27,16,1,'Laskar Pelangi',85000.00,5,425000.00,'2026-11-14 04:17:07','2026-11-14 04:17:07'),(28,16,2,'Bumi Manusia',120000.00,1,120000.00,'2026-11-14 04:17:07','2026-11-14 04:17:07'),(29,17,1,'Laskar Pelangi',85000.00,2,170000.00,'2026-11-14 04:19:13','2026-11-14 04:19:13'),(30,17,2,'Bumi Manusia',120000.00,1,120000.00,'2026-11-14 04:19:13','2026-11-14 04:19:13'),(31,18,1,'Laskar Pelangi',85000.00,2,170000.00,'2026-11-14 04:22:30','2026-11-14 04:22:30'),(32,18,2,'Bumi Manusia',120000.00,1,120000.00,'2026-11-14 04:22:30','2026-11-14 04:22:30'),(33,19,1,'Laskar Pelangi',85000.00,2,170000.00,'2026-11-16 03:30:16','2026-11-16 03:30:16'),(34,20,1,'Laskar Pelangi',85000.00,1,85000.00,'2026-11-16 03:37:59','2026-11-16 03:37:59'),(35,21,1,'Laskar Pelangi',85000.00,1,85000.00,'2026-11-16 03:48:09','2026-11-16 03:48:09');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `order_code` varchar(30) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `shipping_address` text NOT NULL,
  `subtotal` decimal(12,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` decimal(12,2) NOT NULL DEFAULT 0.00,
  `total_price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `status` enum('pending','processing','shipped','completed','cancelled') NOT NULL DEFAULT 'pending',
  `payment_method` enum('cod','midtrans') NOT NULL DEFAULT 'cod',
  `payment_status` enum('unpaid','paid','failed') NOT NULL DEFAULT 'unpaid',
  `snap_token` varchar(255) DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_code_unique` (`order_code`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_status_index` (`status`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `orders` VALUES (1,2,'INV-20260608-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',265000.00,0.00,265000.00,'completed','cod','paid',NULL,'2026-06-08 17:00:00',NULL,'2026-06-07 17:00:00','2026-06-07 17:00:00'),(2,3,'INV-20260620-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',98000.00,0.00,98000.00,'completed','cod','paid',NULL,'2026-06-20 17:00:00',NULL,'2026-06-19 17:00:00','2026-06-19 17:00:00'),(3,2,'INV-20260705-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',366000.00,0.00,366000.00,'completed','cod','paid',NULL,'2026-07-05 17:00:00',NULL,'2026-07-04 17:00:00','2026-07-04 17:00:00'),(4,3,'INV-20260718-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',125000.00,0.00,125000.00,'cancelled','cod','failed',NULL,NULL,NULL,'2026-07-17 17:00:00','2026-07-17 17:00:00'),(5,3,'INV-20260809-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',280000.00,0.00,280000.00,'completed','cod','paid',NULL,'2026-08-09 17:00:00',NULL,'2026-08-08 17:00:00','2026-08-08 17:00:00'),(6,2,'INV-20260822-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',264000.00,0.00,264000.00,'completed','cod','paid',NULL,'2026-08-22 17:00:00',NULL,'2026-08-21 17:00:00','2026-08-21 17:00:00'),(7,3,'INV-20260907-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',142000.00,0.00,142000.00,'completed','cod','paid',NULL,'2026-09-07 17:00:00',NULL,'2026-09-06 17:00:00','2026-09-06 17:00:00'),(8,3,'INV-20260916-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',239000.00,0.00,239000.00,'completed','cod','paid',NULL,'2026-09-16 17:00:00',NULL,'2026-09-15 17:00:00','2026-09-15 17:00:00'),(9,2,'INV-20261004-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',310000.00,0.00,310000.00,'completed','cod','paid',NULL,'2026-10-04 17:00:00',NULL,'2026-10-03 17:00:00','2026-10-03 17:00:00'),(10,3,'INV-20261019-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',365000.00,0.00,365000.00,'completed','cod','paid',NULL,'2026-10-19 17:00:00',NULL,'2026-10-18 17:00:00','2026-10-18 17:00:00'),(11,3,'INV-20261103-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',236000.00,0.00,236000.00,'completed','cod','paid',NULL,'2026-11-03 17:00:00',NULL,'2026-11-02 17:00:00','2026-11-02 17:00:00'),(12,2,'INV-20261109-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',198000.00,0.00,198000.00,'shipped','cod','paid',NULL,'2026-11-09 17:00:00',NULL,'2026-11-08 17:00:00','2026-11-08 17:00:00'),(13,3,'INV-20261112-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',273000.00,0.00,273000.00,'processing','cod','paid',NULL,'2026-11-13 11:33:24',NULL,'2026-11-12 11:33:24','2026-11-12 11:33:24'),(14,3,'INV-20261112-0002','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',175000.00,0.00,175000.00,'pending','cod','unpaid',NULL,NULL,NULL,'2026-11-12 11:33:24','2026-11-12 11:33:24'),(15,2,'INV-20261112-0003','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',294000.00,0.00,294000.00,'pending','cod','unpaid',NULL,NULL,NULL,'2026-11-12 11:33:24','2026-11-12 11:33:24'),(16,2,'INV-20261114-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',545000.00,0.00,545000.00,'pending','cod','unpaid',NULL,NULL,NULL,'2026-11-14 04:17:07','2026-11-14 04:17:07'),(17,1,'INV-20261114-0002','Administrator','081234567890','Jl. Merdeka No. 1, Jakarta',290000.00,0.00,290000.00,'pending','cod','unpaid',NULL,NULL,NULL,'2026-11-14 04:19:13','2026-11-14 04:19:13'),(18,1,'INV-20261114-0003','Administrator','081234567890','Jl. Merdeka No. 1, Jakarta',290000.00,0.00,290000.00,'pending','cod','unpaid',NULL,NULL,NULL,'2026-11-14 04:22:30','2026-11-14 04:22:30'),(19,2,'INV-20261116-0001','Budi Santoso','081298765432','Jl. Test 1',170000.00,0.00,170000.00,'processing','cod','paid',NULL,'2026-11-16 03:30:18',NULL,'2026-11-16 03:30:16','2026-11-16 03:30:18'),(20,2,'INV-20261116-0002','Test Notes','08123','Jl Test',85000.00,0.00,85000.00,'processing','cod','unpaid',NULL,NULL,NULL,'2026-11-16 03:37:59','2026-11-16 06:21:32'),(21,2,'INV-20261116-0003','Uji Notes','0812','Jl Uji',85000.00,0.00,85000.00,'cancelled','cod','unpaid',NULL,NULL,'Bungkus kado','2026-11-16 03:48:09','2026-11-16 03:48:22');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `sessions` VALUES ('1RZ7zAAg4BYDiattWJh5QLj9a6PQLBUQ3dG4FeRn',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiIyT25MdHJucFJ0OUNFSThUQW1pMmlWcVM4VFV0ZHBOSk83UThrcWpGIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1794898274),('35VNDa4gulla0AAC7G0a59aAZpblYXLUshlwFCJS',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJWWFNtSU52ZWFMQkJJQjU0ZlNwcEZSejlOSGNaWWJRZEw0dEs1NHl1IiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3Blc2FuYW4ifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wZXNhbmFuIiwicm91dGUiOiJvcmRlcnMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1794898272),('4g2eESLQIxqseFISin7CjdWhvCnrtbUxi7eIahDM',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJKNWpBQXZuUExMc1ZXNVFkQXdxV1hPR1ZFcGZuc3Y1d1NMd1lwaTV5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1794897244),('bGe3DLRTvvTuokT3704gKLtljJLRbNJIBANBVRXD',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJaeEZYcWRib3l5TmRseEV2YTk2eHlLaDFDbUVwdFJNZHV3bTJkU2FmIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nP3E9bGFyYXZlbCIsInJvdXRlIjoiY2F0YWxvZy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1794898218),('BHX5edgSceJZf0WeBgB0RBimg3GT1Azz7BstbRh9',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJBNFRDMm1wR0J3QzJ0UndjOU0yU0RHeWE2dmF2QzdaU2xXM3ExOGowIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2NoZWNrb3V0In0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvY2hlY2tvdXQiLCJyb3V0ZSI6ImNoZWNrb3V0LmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1794898272),('boVJM0Dm8uSWANZrAD3B2d6uWQLVhaeVoIEhuiQh',4,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJWT2xzbWhuUUNvMHNueFdLMllHQVBkZUVUZjY3QTl3U1ZCVzNqNEFjIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9jaGVja291dCIsInJvdXRlIjoiY2hlY2tvdXQuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6WyJzdWNjZXNzIl0sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6NCwicGFzc3dvcmRfaGFzaF93ZWIiOiI4NGIzOTY0NWI1NGNhYmFhNGM2YTI5MjJmNjZkNGMyZjU2NWRmOGIxY2FhMDFhOTcwZjI1NmNkY2JmODhmYzRlIiwic3VjY2VzcyI6IlBlc2FuYW4gYmVyaGFzaWwgZGlidWF0LiJ9',1794898220),('CEOc3G0EYuDEvAUxGRS7lEQUuJwBArzmDbIKU2Yz',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJhd3I1OXhyQzFhdmFxVGVLR25lamthQWFXN2lCbUg4RkpDWGhJb1Q2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC90ZW50YW5nLWthbWkiLCJyb3V0ZSI6ImFib3V0In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1794898217),('GcHMs9jebuBerytYCAnsQ46lu3mQIAB9NRug171E',1,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJrT3QwWERCeVRGdGhqcXNTaTl4WTk3dkRXbVFhQnJlQURQQmJzVW43IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvb3JkZXJzIiwicm91dGUiOiJhZG1pbi5vcmRlcnMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwicGFzc3dvcmRfaGFzaF93ZWIiOiJmN2E3OThhM2U0NzZhNzRiNzBkMDE3OGY5YWUyYWQ5NTNkYjA3YzNmMTJkODEzMzI1MTNjNGM0OWQyODJhNTcwIn0=',1794898204),('gcwZkgJ4MFnfyKIY6YRbyLbpQHbx4OS4BjA7f4KI',5,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJWcGdRQTR4NWNwUUwwaFNGVGdWdDZBMUZYUTlGTHBXVWd4Rk94RUhvIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9yZWdpc3RlciIsInJvdXRlIjoicmVnaXN0ZXIifSwiX2ZsYXNoIjp7Im9sZCI6WyJzdWNjZXNzIl0sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6NSwicGFzc3dvcmRfaGFzaF93ZWIiOiIwZTUxNGUyNmY3MTFiMTE0ZDU0YTUwOWNmZjJiMzkxM2UzNjg4YzQzMTI0ZjhmMDE0MTZhMTYyZGQzOTU3M2I1Iiwic3VjY2VzcyI6IlJlZ2lzdHJhc2kgYmVyaGFzaWwuIFNlbGFtYXQgZGF0YW5nLCBUZXMgQWRtaW4hIn0=',1794898274),('gDCrqf9oETHwQnZsyVoLqMCmps60cZCPeFFgFl9n',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiI1eGNEWmlMRXl1WkY4TWdGMEg5Um9VNWVCUzRVQTQ5d0JwTFkwUGQ2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nIiwicm91dGUiOiJjYXRhbG9nLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1794897244),('Ic47YC3aEpP1ebxyDlJU8SHAkKnt4dTvPWyXBlbL',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJNS3RDZWRLS0FLSUxNTmlNUEpOUmp3aHFVYVJBN1RUTlBOZ3JBU29EIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nP3E9JTI3JTIwT1IlMjAxJTNEMSUyMC0tJTIwIiwicm91dGUiOiJjYXRhbG9nLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1794898273),('J2gAeVBTu2LYOMHTGK4UvJ0YgdoDjiZ68comla1p',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiI2Vk41VEQ4bThHOG9uR2NXbFVUeUE4VkJidWwyTm5KQlpLZEZTNjM3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nP3E9QW5kcmVhIiwicm91dGUiOiJjYXRhbG9nLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1794898218),('JKn04ZbbxC7OjJJs7w2wOLL370r38unaZql1GqdJ',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiIxNTFKa1htTDg2YUF4RjZwVlZHU1RHQnd6b2diUnNmVWZVRmlSOXBiIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1794897243),('KbyGuWXtJlDIxk4AdgdghmYOQMfPVaUDM93y14AC',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJ2RFF3eFN3WmdOSk9nY0N3UWhGOWM0RGZIaVlUc2d6RktTNURrV3R5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1794897219),('KVEwwO1jFqC5gxgQJB57z9KTidQNk0p7vBYgOAVX',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiIyVTliSnBTdnpWaG9XVXZxTFJIbXdJMTlYbXFOTm1KUjM3eGFJQWswIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2tlcmFuamFuZyJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2tlcmFuamFuZyIsInJvdXRlIjoiY2FydC5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1794897244),('kvOr7tbzNgpe7YzpnAygEQk6SqiNa1X3jBu05iQk',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJwVUpCRHlrTmppSzBnaHhwUWxaejBhMmRBdEd5ZHVpMWg2eTBCOE5KIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2tlcmFuamFuZyJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2tlcmFuamFuZyIsInJvdXRlIjoiY2FydC5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1794898272),('LaM6oR8Rbu2SjtTH44qr8Zxod4hBMIZkApE5HRaJ',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJ5dUU5SHowNE1Yd05rcm9pRG1WVDVEc0diOWVvc1Q1Tk5RTWthVktpIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1794897218),('mQ738ZmeEC4nyHgBBe3ZSYy1OGR8hJkbOh7F4Doh',2,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJlQU1IN3dqSEZHR2pyeHd2UnFLM1I1WVpPMG1qTURlZjRCVHF5Mlp2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvY2F0ZWdvcmllcyIsInJvdXRlIjoiYWRtaW4uY2F0ZWdvcmllcy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyLCJwYXNzd29yZF9oYXNoX3dlYiI6ImQwMTRlMzMxMTE2N2M2YjdiMmFjNTdkMjI4NmUxZDY4MTJlODYxNWY2Yjg3ZjE4MjIzZDRkMTI4Y2Y5ZGIwOTQifQ==',1794898271),('ocpH1Io9kMexsDaoLwwsDXzXGb9GgEFyGBk2kcu2',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJ1eE5EY0E3c1dKVDQ3Z2txcDdUQjhSSDZPbVRVcm5QazBLeW0weDhxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rb250YWsiLCJyb3V0ZSI6ImNvbnRhY3Quc2hvdyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1794898236),('RxsugHFIPyTmr4so3LvHgGcCzTyHOlEqfoki8aAo',4,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiI3MGdnVnZqVnh5NzdUeUJ2ckg0aXNFWDRGT0ZObVlhZk83VGhHWXM3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rb250YWsiLCJyb3V0ZSI6ImNvbnRhY3Quc2hvdyJ9LCJfZmxhc2giOnsib2xkIjpbIl9vbGRfaW5wdXQiLCJlcnJvcnMiXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjo0LCJwYXNzd29yZF9oYXNoX3dlYiI6Ijg0YjM5NjQ1YjU0Y2FiYWE0YzZhMjkyMmY2NmQ0YzJmNTY1ZGY4YjFjYWEwMWE5NzBmMjU2Y2RjYmY4OGZjNGUiLCJfb2xkX2lucHV0Ijp7Il90b2tlbiI6IjcwZ2dWdmpWeHk3N1R5QnZySDRpc0VYNEZPRk5tWWFmTzdUaEdZczciLCJuYW1lIjoiVGFucGEgQm9keSIsImVtYWlsIjoidWppQHRlc3QudGVzdCIsInN1YmplY3QiOiJUYW5wYSBpc2kifSwiZXJyb3JzIjp7ImRlZmF1bHQiOnsiZm9ybWF0IjoiOm1lc3NhZ2UiLCJtZXNzYWdlcyI6eyJib2R5IjpbIlBlc2FuIHdhamliIGRpaXNpLiJdfX19fQ==',1794898236),('TP4FpNbKmgPDjmV4VQKqkb2sgKbVo5q6BKDQC5Rl',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJjdldNWDFaTE5PakdxS25IdU9NR1hCcXB3VHRBTkNJeFZHbmszYzFDIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nP3E9JTNDc2NyaXB0JTNFYWxlcnQlMjgxJTI5JTNDJTJGc2NyaXB0JTNFIiwicm91dGUiOiJjYXRhbG9nLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1794898273),('v9P6T0uw5P4724FdvdY6y1fYMKR6uNnDlbqWke1q',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJmYVNrNEh6Nzl5MW5HZElhQnBEN0NuYjVjMlE5bFVIdHBJbHhhRTNWIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nIiwicm91dGUiOiJjYXRhbG9nLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1794897219),('VVE9YyzsaE96KCuykSMlPVY3uPG6M5H5XpsUXVe5',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJmRVhha1ptMm5hWjdWZ1E0MmJ0dWFKUnR4cGZYMFFtODM4c2hBVlg3IiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2FkbWluXC9kYXNoYm9hcmQifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvZGFzaGJvYXJkIiwicm91dGUiOiJhZG1pbi5kYXNoYm9hcmQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1794898272),('wsOfsGUHetJE0qfyIxt1JOa4gGldwdxd817zM3YY',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJtcDM0azROR1FwRFh0SmszeXNqZzJqRmc5Rzh6QjBiZ2JzbUFKMWxnIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nP3E9JTI3JTIwT1IlMjAxJTNEMSUyMC0tJTIwIiwicm91dGUiOiJjYXRhbG9nLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1794898273),('WtjLuY40DrUK68nuMehP7VDShfZKVJSzoCLrYVNO',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJDNjdUZDVzZXpZVHI0U0RoWlcxbktjbFZESmRVbkxTNktIZk05a2RkIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsInBhc3N3b3JkX2hhc2hfd2ViIjoiZjdhNzk4YTNlNDc2YTc0YjcwZDAxNzhmOWFlMmFkOTUzZGIwN2MzZjEyZDgxMzMyNTEzYzRjNDlkMjgyYTU3MCJ9',1794898181);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `users` VALUES (1,'Administrator','admin@booknest.test',NULL,'$2y$12$MEMhQQDE53l3HSrQkcnxledVgLrPhJzEHTaIEMFzRMPCMr.tdsXni','admin','081234567890','Jl. Merdeka No. 1, Jakarta','10LB7LD6vvAqXEvKIpDgwn6pocPpWcTWteBNerdj9XdlSZ440xLXxFaC0kAQ','2026-11-13 11:33:19','2026-11-13 11:33:19'),(2,'Budi Santoso','user@booknest.test',NULL,'$2y$12$s2U8go4GjsVy2jWsYiUoh.9M/jaXeTlheiEeQITX0V4JOn80GEqzO','user','081298765432','Jl. Sudirman No. 45, Bandung',NULL,'2026-11-13 11:33:20','2026-11-13 11:33:20'),(3,'Siti Aminah','siti@booknest.test',NULL,'$2y$12$ztrrgDWBzXwI1FtOs5c7Revlp9u9mRLYaS3CxVvFyp5RMhcLhge8G','user','081377788899','Jl. Diponegoro No. 12, Surabaya',NULL,'2026-11-13 11:33:20','2026-11-13 11:33:20');
