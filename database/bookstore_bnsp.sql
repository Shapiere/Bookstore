
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `books` VALUES (1,1,'Laskar Pelangi','laskar-pelangi','Andrea Hirata','Bentang Pustaka',2005,'978-602-1000',85000.00,25,'Buku \"Laskar Pelangi\" karya Andrea Hirata. Diterbitkan oleh Bentang Pustaka pada tahun 2005. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/laskar-pelangi.png',1,'2026-11-17 18:34:45','2026-11-17 18:34:45'),(2,1,'Bumi Manusia','bumi-manusia','Pramoedya Ananta Toer','Lentera Dipantara',1980,'978-602-1001',120000.00,18,'Buku \"Bumi Manusia\" karya Pramoedya Ananta Toer. Diterbitkan oleh Lentera Dipantara pada tahun 1980. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/bumi-manusia.png',1,'2026-11-17 18:34:45','2026-11-17 18:34:45'),(3,1,'Cantik Itu Luka','cantik-itu-luka','Eka Kurniawan','Gramedia',2002,'978-602-1002',95000.00,12,'Buku \"Cantik Itu Luka\" karya Eka Kurniawan. Diterbitkan oleh Gramedia pada tahun 2002. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/cantik-itu-luka.png',1,'2026-11-17 18:34:45','2026-11-17 18:34:45'),(4,1,'Perahu Kertas','perahu-kertas','Dee Lestari','Bentang Pustaka',2009,'978-602-1003',78000.00,20,'Buku \"Perahu Kertas\" karya Dee Lestari. Diterbitkan oleh Bentang Pustaka pada tahun 2009. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/perahu-kertas.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(5,1,'Hujan','hujan','Tere Liye','Gramedia',2016,'978-602-1004',88000.00,30,'Buku \"Hujan\" karya Tere Liye. Diterbitkan oleh Gramedia pada tahun 2016. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/hujan.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(6,1,'Pulang','pulang','Leila S. Chudori','Kepustakaan Populer Gramedia',2012,'978-602-1005',110000.00,10,'Buku \"Pulang\" karya Leila S. Chudori. Diterbitkan oleh Kepustakaan Populer Gramedia pada tahun 2012. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/pulang.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(7,1,'Ronggeng Dukuh Paruk','ronggeng-dukuh-paruk','Ahmad Tohari','Gramedia',1982,'978-602-1006',92000.00,8,'Buku \"Ronggeng Dukuh Paruk\" karya Ahmad Tohari. Diterbitkan oleh Gramedia pada tahun 1982. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/ronggeng-dukuh-paruk.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(8,1,'Supernova: Ksatria, Puteri, dan Bintang Jatuh','supernova-ksatria-puteri-dan-bintang-jatuh','Dee Lestari','Bentang Pustaka',2001,'978-602-1007',99000.00,15,'Buku \"Supernova: Ksatria, Puteri, dan Bintang Jatuh\" karya Dee Lestari. Diterbitkan oleh Bentang Pustaka pada tahun 2001. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/supernova-ksatria-puteri-dan-bintang-jatuh.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(9,2,'Filosofi Teras','filosofi-teras','Henry Manampiring','Kompas',2018,'978-602-1008',98000.00,40,'Buku \"Filosofi Teras\" karya Henry Manampiring. Diterbitkan oleh Kompas pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/filosofi-teras.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(10,2,'Sapiens: Riwayat Singkat Umat Manusia','sapiens-riwayat-singkat-umat-manusia','Yuval Noah Harari','Kepustakaan Populer Gramedia',2017,'978-602-1009',150000.00,22,'Buku \"Sapiens: Riwayat Singkat Umat Manusia\" karya Yuval Noah Harari. Diterbitkan oleh Kepustakaan Populer Gramedia pada tahun 2017. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/sapiens-riwayat-singkat-umat-manusia.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(11,2,'Atomic Habits','atomic-habits','James Clear','Gramedia',2019,'978-602-1010',108000.00,35,'Buku \"Atomic Habits\" karya James Clear. Diterbitkan oleh Gramedia pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/atomic-habits.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(12,2,'Homo Deus','homo-deus','Yuval Noah Harari','Kepustakaan Populer Gramedia',2018,'978-602-1011',145000.00,14,'Buku \"Homo Deus\" karya Yuval Noah Harari. Diterbitkan oleh Kepustakaan Populer Gramedia pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/homo-deus.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(13,2,'Cinta Tanah Air','cinta-tanah-air','Tan Malaka','Narasi',2019,'978-602-1012',76000.00,9,'Buku \"Cinta Tanah Air\" karya Tan Malaka. Diterbitkan oleh Narasi pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/cinta-tanah-air.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(14,2,'Catatan Seorang Demonstran','catatan-seorang-demonstran','Soe Hok Gie','LP3ES',1983,'978-602-1013',89000.00,7,'Buku \"Catatan Seorang Demonstran\" karya Soe Hok Gie. Diterbitkan oleh LP3ES pada tahun 1983. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/catatan-seorang-demonstran.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(15,2,'Berpikir Cepat dan Lambat','berpikir-cepat-dan-lambat','Daniel Kahneman','Gramedia',2020,'978-602-1014',165000.00,11,'Buku \"Berpikir Cepat dan Lambat\" karya Daniel Kahneman. Diterbitkan oleh Gramedia pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/berpikir-cepat-dan-lambat.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(16,3,'Pemrograman PHP untuk Pemula','pemrograman-php-untuk-pemula','Abdul Kadir','Andi Publisher',2021,'978-602-1015',125000.00,28,'Buku \"Pemrograman PHP untuk Pemula\" karya Abdul Kadir. Diterbitkan oleh Andi Publisher pada tahun 2021. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/pemrograman-php-untuk-pemula.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(17,3,'Laravel: Framework PHP Modern','laravel-framework-php-modern','Rizky Pratama','Informatika',2023,'978-602-1016',145000.00,19,'Buku \"Laravel: Framework PHP Modern\" karya Rizky Pratama. Diterbitkan oleh Informatika pada tahun 2023. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/laravel-framework-php-modern.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(18,3,'Belajar MySQL dari Nol','belajar-mysql-dari-nol','Budi Raharjo','Informatika',2022,'978-602-1017',135000.00,24,'Buku \"Belajar MySQL dari Nol\" karya Budi Raharjo. Diterbitkan oleh Informatika pada tahun 2022. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/belajar-mysql-dari-nol.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(19,3,'Clean Code','clean-code','Robert C. Martin','Prentice Hall',2008,'978-602-1018',210000.00,6,'Buku \"Clean Code\" karya Robert C. Martin. Diterbitkan oleh Prentice Hall pada tahun 2008. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/clean-code.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(20,3,'Algoritma dan Struktur Data','algoritma-dan-struktur-data','Rinaldi Munir','Informatika',2020,'978-602-1019',155000.00,16,'Buku \"Algoritma dan Struktur Data\" karya Rinaldi Munir. Diterbitkan oleh Informatika pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/algoritma-dan-struktur-data.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(21,3,'Dasar Pemrograman JavaScript','dasar-pemrograman-javascript','Eko Kurniawan','Andi Publisher',2022,'978-602-1020',118000.00,21,'Buku \"Dasar Pemrograman JavaScript\" karya Eko Kurniawan. Diterbitkan oleh Andi Publisher pada tahun 2022. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/dasar-pemrograman-javascript.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(22,3,'Jaringan Komputer Dasar','jaringan-komputer-dasar','Iwan Sofana','Informatika',2019,'978-602-1021',132000.00,13,'Buku \"Jaringan Komputer Dasar\" karya Iwan Sofana. Diterbitkan oleh Informatika pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/jaringan-komputer-dasar.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(23,3,'Keamanan Aplikasi Web','keamanan-aplikasi-web','Dedi Gunawan','Elex Media',2023,'978-602-1022',168000.00,9,'Buku \"Keamanan Aplikasi Web\" karya Dedi Gunawan. Diterbitkan oleh Elex Media pada tahun 2023. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/keamanan-aplikasi-web.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(24,3,'Desain UI/UX untuk Developer','desain-uiux-untuk-developer','Ayu Lestari','Informatika',2023,'978-602-1023',142000.00,17,'Buku \"Desain UI/UX untuk Developer\" karya Ayu Lestari. Diterbitkan oleh Informatika pada tahun 2023. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/desain-uiux-untuk-developer.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(25,4,'Kancil dan Buaya','kancil-dan-buaya','Tim Penulis','Erlangga for Kids',2018,'978-602-1024',45000.00,50,'Buku \"Kancil dan Buaya\" karya Tim Penulis. Diterbitkan oleh Erlangga for Kids pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/kancil-dan-buaya.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(26,4,'Petualangan Si Kancil','petualangan-si-kancil','Mira W.','Gramedia',2017,'978-602-1025',52000.00,45,'Buku \"Petualangan Si Kancil\" karya Mira W.. Diterbitkan oleh Gramedia pada tahun 2017. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/petualangan-si-kancil.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(27,4,'Cerita Rakyat Nusantara','cerita-rakyat-nusantara','Tim Redaksi','Bhuana Ilmu Populer',2019,'978-602-1026',68000.00,38,'Buku \"Cerita Rakyat Nusantara\" karya Tim Redaksi. Diterbitkan oleh Bhuana Ilmu Populer pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/cerita-rakyat-nusantara.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(28,4,'Dongeng Sebelum Tidur','dongeng-sebelum-tidur','Ratna Ayu','Elex Media',2020,'978-602-1027',58000.00,42,'Buku \"Dongeng Sebelum Tidur\" karya Ratna Ayu. Diterbitkan oleh Elex Media pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/dongeng-sebelum-tidur.png',1,'2026-11-17 18:34:46','2026-11-17 18:34:46'),(29,4,'Belajar Berhitung Bersama','belajar-berhitung-bersama','Nurul Hidayat','Erlangga for Kids',2021,'978-602-1028',49000.00,55,'Buku \"Belajar Berhitung Bersama\" karya Nurul Hidayat. Diterbitkan oleh Erlangga for Kids pada tahun 2021. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/belajar-berhitung-bersama.png',1,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(30,5,'Matematika Kelas 12','matematika-kelas-12','Sukino','Erlangga',2020,'978-602-1029',95000.00,30,'Buku \"Matematika Kelas 12\" karya Sukino. Diterbitkan oleh Erlangga pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/matematika-kelas-12.png',1,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(31,5,'Bahasa Indonesia untuk SMA','bahasa-indonesia-untuk-sma','Kosasih','Yrama Widya',2019,'978-602-1030',88000.00,26,'Buku \"Bahasa Indonesia untuk SMA\" karya Kosasih. Diterbitkan oleh Yrama Widya pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/bahasa-indonesia-untuk-sma.png',1,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(32,5,'Fisika Dasar','fisika-dasar','Halliday dan Resnick','Erlangga',2018,'978-602-1031',185000.00,12,'Buku \"Fisika Dasar\" karya Halliday dan Resnick. Diterbitkan oleh Erlangga pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/fisika-dasar.png',1,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(33,5,'Kimia Organik','kimia-organik','Ralph J. Fessenden','Erlangga',2017,'978-602-1032',175000.00,8,'Buku \"Kimia Organik\" karya Ralph J. Fessenden. Diterbitkan oleh Erlangga pada tahun 2017. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/kimia-organik.png',1,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(34,5,'Ekonomi Makro','ekonomi-makro','Sadono Sukirno','Rajawali Pers',2019,'978-602-1033',160000.00,10,'Buku \"Ekonomi Makro\" karya Sadono Sukirno. Diterbitkan oleh Rajawali Pers pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/ekonomi-makro.png',1,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(35,5,'Metodologi Penelitian','metodologi-penelitian','Sugiyono','Alfabeta',2021,'978-602-1034',145000.00,15,'Buku \"Metodologi Penelitian\" karya Sugiyono. Diterbitkan oleh Alfabeta pada tahun 2021. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/metodologi-penelitian.png',1,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(36,5,'Statistika untuk Penelitian','statistika-untuk-penelitian','Sugiyono','Alfabeta',2020,'978-602-1035',138000.00,14,'Buku \"Statistika untuk Penelitian\" karya Sugiyono. Diterbitkan oleh Alfabeta pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/statistika-untuk-penelitian.png',1,'2026-11-17 18:34:47','2026-11-17 18:34:47');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `categories` VALUES (1,'Fiksi','fiksi','Novel, cerpen, dan karya fiksi lainnya','2026-11-17 18:34:45','2026-11-17 18:34:45'),(2,'Non-Fiksi','non-fiksi','Buku pengetahuan, biografi, dan esai','2026-11-17 18:34:45','2026-11-17 18:34:45'),(3,'Teknologi','teknologi','Pemrograman, jaringan, dan ilmu komputer','2026-11-17 18:34:45','2026-11-17 18:34:45'),(4,'Anak','anak','Buku cerita dan edukasi untuk anak','2026-11-17 18:34:45','2026-11-17 18:34:45'),(5,'Pendidikan','pendidikan','Buku pelajaran dan referensi akademik','2026-11-17 18:34:45','2026-11-17 18:34:45');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `messages` VALUES (1,2,'Budi Santoso','user@booknest.test','Tanya stok buku Clean Code','Apakah stok Clean Code masih tersedia? Saya ingin memesan 2 eksemplar.',1,'2026-11-14 18:34:48','2026-11-17 18:34:48'),(2,3,'Siti Aminah','siti@booknest.test','Konfirmasi pembayaran COD','Pesanan saya sudah diterima. Terima kasih atas pelayanannya.',1,'2026-11-13 18:34:49','2026-11-17 18:34:49'),(3,NULL,'Pengunjung','pengunjung@example.test','Kerja sama reseller','Apakah BookStore menerima kerja sama reseller untuk wilayah Bandung?',0,'2026-11-16 18:34:49','2026-11-17 18:34:49');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_11_12_000001_add_role_to_users_table',1),(5,'2026_11_12_000002_create_categories_table',1),(6,'2026_11_12_000003_create_books_table',1),(7,'2026_11_12_000004_create_carts_table',1),(8,'2026_11_12_000005_create_orders_table',1),(9,'2026_11_12_000006_create_order_items_table',1),(10,'2026_11_12_000007_create_messages_table',1),(11,'2026_11_18_000001_remove_midtrans_from_orders_table',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `order_items` VALUES (1,1,1,'Laskar Pelangi',85000.00,2,170000.00,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(2,1,3,'Cantik Itu Luka',95000.00,1,95000.00,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(3,2,9,'Filosofi Teras',98000.00,1,98000.00,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(4,3,10,'Sapiens: Riwayat Singkat Umat Manusia',150000.00,1,150000.00,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(5,3,11,'Atomic Habits',108000.00,2,216000.00,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(6,4,16,'Pemrograman PHP untuk Pemula',125000.00,1,125000.00,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(7,5,17,'Laravel: Framework PHP Modern',145000.00,1,145000.00,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(8,5,18,'Belajar MySQL dari Nol',135000.00,1,135000.00,'2026-11-17 18:34:47','2026-11-17 18:34:47'),(9,6,5,'Hujan',88000.00,3,264000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(10,7,25,'Kancil dan Buaya',45000.00,2,90000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(11,7,26,'Petualangan Si Kancil',52000.00,1,52000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(12,8,29,'Belajar Berhitung Bersama',49000.00,1,49000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(13,8,30,'Matematika Kelas 12',95000.00,2,190000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(14,9,12,'Homo Deus',145000.00,1,145000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(15,9,13,'Cinta Tanah Air',76000.00,1,76000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(16,9,14,'Catatan Seorang Demonstran',89000.00,1,89000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(17,10,19,'Clean Code',210000.00,1,210000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(18,10,20,'Algoritma dan Struktur Data',155000.00,1,155000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(19,11,21,'Dasar Pemrograman JavaScript',118000.00,2,236000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(20,12,2,'Bumi Manusia',120000.00,1,120000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(21,12,4,'Perahu Kertas',78000.00,1,78000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(22,13,31,'Bahasa Indonesia untuk SMA',88000.00,1,88000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(23,13,32,'Fisika Dasar',185000.00,1,185000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(24,14,33,'Kimia Organik',175000.00,1,175000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(25,15,6,'Pulang',110000.00,1,110000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48'),(26,15,7,'Ronggeng Dukuh Paruk',92000.00,2,184000.00,'2026-11-17 18:34:48','2026-11-17 18:34:48');
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
  `payment_method` enum('cod') NOT NULL DEFAULT 'cod',
  `payment_status` enum('unpaid','paid','failed') NOT NULL DEFAULT 'unpaid',
  `paid_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_code_unique` (`order_code`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_status_index` (`status`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `orders` VALUES (1,2,'INV-20260608-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',265000.00,0.00,265000.00,'completed','cod','paid','2026-06-08 17:00:00',NULL,'2026-06-07 17:00:00','2026-06-07 17:00:00'),(2,3,'INV-20260620-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',98000.00,0.00,98000.00,'completed','cod','paid','2026-06-20 17:00:00',NULL,'2026-06-19 17:00:00','2026-06-19 17:00:00'),(3,2,'INV-20260705-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',366000.00,0.00,366000.00,'completed','cod','paid','2026-07-05 17:00:00',NULL,'2026-07-04 17:00:00','2026-07-04 17:00:00'),(4,3,'INV-20260718-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',125000.00,0.00,125000.00,'cancelled','cod','failed',NULL,NULL,'2026-07-17 17:00:00','2026-07-17 17:00:00'),(5,3,'INV-20260809-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',280000.00,0.00,280000.00,'completed','cod','paid','2026-08-09 17:00:00',NULL,'2026-08-08 17:00:00','2026-08-08 17:00:00'),(6,2,'INV-20260822-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',264000.00,0.00,264000.00,'completed','cod','paid','2026-08-22 17:00:00',NULL,'2026-08-21 17:00:00','2026-08-21 17:00:00'),(7,3,'INV-20260907-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',142000.00,0.00,142000.00,'completed','cod','paid','2026-09-07 17:00:00',NULL,'2026-09-06 17:00:00','2026-09-06 17:00:00'),(8,3,'INV-20260916-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',239000.00,0.00,239000.00,'completed','cod','paid','2026-09-16 17:00:00',NULL,'2026-09-15 17:00:00','2026-09-15 17:00:00'),(9,2,'INV-20261004-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',310000.00,0.00,310000.00,'completed','cod','paid','2026-10-04 17:00:00',NULL,'2026-10-03 17:00:00','2026-10-03 17:00:00'),(10,3,'INV-20261019-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',365000.00,0.00,365000.00,'completed','cod','paid','2026-10-19 17:00:00',NULL,'2026-10-18 17:00:00','2026-10-18 17:00:00'),(11,3,'INV-20261103-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',236000.00,0.00,236000.00,'completed','cod','paid','2026-11-03 17:00:00',NULL,'2026-11-02 17:00:00','2026-11-02 17:00:00'),(12,2,'INV-20261109-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',198000.00,0.00,198000.00,'shipped','cod','paid','2026-11-09 17:00:00',NULL,'2026-11-08 17:00:00','2026-11-08 17:00:00'),(13,3,'INV-20261114-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',273000.00,0.00,273000.00,'processing','cod','paid','2026-11-14 17:00:00',NULL,'2026-11-13 17:00:00','2026-11-13 17:00:00'),(14,3,'INV-20261117-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',175000.00,0.00,175000.00,'pending','cod','unpaid',NULL,NULL,'2026-11-16 18:34:48','2026-11-16 18:34:48'),(15,2,'INV-20261117-0002','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',294000.00,0.00,294000.00,'pending','cod','unpaid',NULL,NULL,'2026-11-16 18:34:48','2026-11-16 18:34:48');
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
INSERT INTO `sessions` VALUES ('098GJOX5Cws09XPb2vSFy6Yv0rYAtimXbZykyrNp',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJSZWZ5MHZFSkE0QlFCd1R4Q1VhdGpKZ1VMUHhhM1NxbDZXTE9SSVFmIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9idWt1XC9sYXNrYXItcGVsYW5naSIsInJvdXRlIjoiY2F0YWxvZy5zaG93In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1794965702),('2yyDCaWFgIvrUdn3WwZrGGI4s3PCDtvV7HuX8noQ',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJicW5FV1NCZUU4S3RGMDUzdG5qZTRRVkhEclFPOTZHMEJqT25ubHN0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1794965701),('dHNS8efpBLiO7wi7jCOIjQVN7sSDfGTfoJeVCLaR',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJSSXZKc0ViN3NZb205VUdMZ29oTTVHNTYxWXhDdk05dWl3OWJkcXp5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC90ZW50YW5nLWthbWkiLCJyb3V0ZSI6ImFib3V0In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1794965704),('eGOaTNuTqt7fQltPwEMC74DwcMDiYfPuzvoTFasm',2,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJoV056dWhGd3NRakd2VlV0ZlluaFNZS0VLNVVIalFIR3Z2Y1BabkNtIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wZXNhbmFuXC8xIiwicm91dGUiOiJvcmRlcnMuc2hvdyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyLCJwYXNzd29yZF9oYXNoX3dlYiI6Ijg2YmI3NTMzZTQ0ZmU3OWVhZDA4OGFjZTI3YWQ2ODRjYmIwNDAzNDMxNTliOGMzZDIxNjExYjQ4M2QyZDk5ODYifQ==',1794965707),('hUlAQLuHBD1TgypCnQvN4GltcB7nByU2N1CWW0d6',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJnbXB4S0ViaDNqbkZzOG9KdU02RnNoSFh5ZEN1akJsV3FRYmt1aGxqIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nIiwicm91dGUiOiJjYXRhbG9nLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1794965702),('iPC2h34Yv0pVWR6ZW7R8uMHJ9jS0gqOUyfWN0Oeh',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiI2TXhrOGoyamh6SE54RDhVWkJwczFDakticzl0VXg0ZnlZU1EweXdJIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rb250YWsiLCJyb3V0ZSI6ImNvbnRhY3Quc2hvdyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1794965704),('ISgayDiUG9qGciKc4El3v5D5RWi6pr7W4nhbYjds',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJjZlZUeU9EZktxTG5GY2d0QXRDTld1OTVIUlBnUEl6cVlDNGg4RHFWIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nP3E9bGFyYXZlbCIsInJvdXRlIjoiY2F0YWxvZy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1794965702),('m28VcbtQWAgjQduhZX9QR4olIlbpncd4bx0ddYN1',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJscE5TTDhVM0NDZ1NJWnVraVFpSFlVMlNwelJ1eWpMZXpMalFrVlRtIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1794965703),('NsFDeyXDjnPyf9G7xfSY6xo2g2qmdu6mAkvzx2EO',1,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJ6bXBGaVpIUTAwYjUzNUlxSWxFZmtnSWwyZFRBMUpsU2FGZXVnbUFkIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvbWVzc2FnZXMiLCJyb3V0ZSI6ImFkbWluLm1lc3NhZ2VzLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsInBhc3N3b3JkX2hhc2hfd2ViIjoiMTkxYTA2Y2U2N2MyNGY4Y2FkZmFjYjFlNzZjZDQ1N2I3ODNmOGQ4ZTgyMGUxODViOTAzMDEzN2IwZjQ1NDljMCJ9',1794965711),('vnbYjf4wLdYz3Y8LHNhI5KFyRgffqDz8sbH9rjc3',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJ2Z290ekR1eTdlOW5QMmxUVXEyNTV2NFYwWkVGcEw0bkMzVHJJZEF1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9yZWdpc3RlciIsInJvdXRlIjoicmVnaXN0ZXIifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1794965703);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `users` VALUES (1,'Administrator','admin@booknest.test',NULL,'$2y$12$lFSa.rHdTu3KkAVekxg5He9ot80Dea99eYpreXcP1wkScUvV2ZiZe','admin','081234567890','Jl. Merdeka No. 1, Jakarta',NULL,'2026-11-17 18:34:44','2026-11-17 18:34:44'),(2,'Budi Santoso','user@booknest.test',NULL,'$2y$12$TUaQ1hMMUBHRwkhl6f5CyuqrjDbMVjuxw5v.evfvnc6awHnjUf94G','user','081298765432','Jl. Sudirman No. 45, Bandung',NULL,'2026-11-17 18:34:45','2026-11-17 18:34:45'),(3,'Siti Aminah','siti@booknest.test',NULL,'$2y$12$ROO72nSmXztSpMKND7YuguN/RiU4czeKiJzbs1zkjB.xZp175robO','user','081377788899','Jl. Diponegoro No. 12, Surabaya',NULL,'2026-11-17 18:34:45','2026-11-17 18:34:45');
