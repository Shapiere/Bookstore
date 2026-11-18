
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `books` VALUES (1,1,'Laskar Pelangi','laskar-pelangi','Andrea Hirata','Bentang Pustaka',2005,'978-602-1000',85000.00,25,'Buku \"Laskar Pelangi\" karya Andrea Hirata. Diterbitkan oleh Bentang Pustaka pada tahun 2005. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/laskar-pelangi.png',1,'2026-11-17 18:40:30','2026-11-18 08:22:51'),(2,1,'Bumi Manusia','bumi-manusia','Pramoedya Ananta Toer','Lentera Dipantara',1980,'978-602-1001',120000.00,18,'Buku \"Bumi Manusia\" karya Pramoedya Ananta Toer. Diterbitkan oleh Lentera Dipantara pada tahun 1980. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/bumi-manusia.png',1,'2026-11-17 18:40:30','2026-11-18 02:53:53'),(3,1,'Cantik Itu Luka','cantik-itu-luka','Eka Kurniawan','Gramedia',2002,'978-602-1002',95000.00,12,'Buku \"Cantik Itu Luka\" karya Eka Kurniawan. Diterbitkan oleh Gramedia pada tahun 2002. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/cantik-itu-luka.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(4,1,'Perahu Kertas','perahu-kertas','Dee Lestari','Bentang Pustaka',2009,'978-602-1003',78000.00,20,'Buku \"Perahu Kertas\" karya Dee Lestari. Diterbitkan oleh Bentang Pustaka pada tahun 2009. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/perahu-kertas.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(5,1,'Hujan','hujan','Tere Liye','Gramedia',2016,'978-602-1004',88000.00,30,'Buku \"Hujan\" karya Tere Liye. Diterbitkan oleh Gramedia pada tahun 2016. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/hujan.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(6,1,'Pulang','pulang','Leila S. Chudori','Kepustakaan Populer Gramedia',2012,'978-602-1005',110000.00,10,'Buku \"Pulang\" karya Leila S. Chudori. Diterbitkan oleh Kepustakaan Populer Gramedia pada tahun 2012. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/pulang.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(7,1,'Ronggeng Dukuh Paruk','ronggeng-dukuh-paruk','Ahmad Tohari','Gramedia',1982,'978-602-1006',92000.00,8,'Buku \"Ronggeng Dukuh Paruk\" karya Ahmad Tohari. Diterbitkan oleh Gramedia pada tahun 1982. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/ronggeng-dukuh-paruk.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(8,1,'Supernova: Ksatria, Puteri, dan Bintang Jatuh','supernova-ksatria-puteri-dan-bintang-jatuh','Dee Lestari','Bentang Pustaka',2001,'978-602-1007',99000.00,15,'Buku \"Supernova: Ksatria, Puteri, dan Bintang Jatuh\" karya Dee Lestari. Diterbitkan oleh Bentang Pustaka pada tahun 2001. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/supernova-ksatria-puteri-dan-bintang-jatuh.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(9,2,'Filosofi Teras','filosofi-teras','Henry Manampiring','Kompas',2018,'978-602-1008',98000.00,40,'Buku \"Filosofi Teras\" karya Henry Manampiring. Diterbitkan oleh Kompas pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/filosofi-teras.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(10,2,'Sapiens: Riwayat Singkat Umat Manusia','sapiens-riwayat-singkat-umat-manusia','Yuval Noah Harari','Kepustakaan Populer Gramedia',2017,'978-602-1009',150000.00,22,'Buku \"Sapiens: Riwayat Singkat Umat Manusia\" karya Yuval Noah Harari. Diterbitkan oleh Kepustakaan Populer Gramedia pada tahun 2017. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/sapiens-riwayat-singkat-umat-manusia.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(11,2,'Atomic Habits','atomic-habits','James Clear','Gramedia',2019,'978-602-1010',108000.00,35,'Buku \"Atomic Habits\" karya James Clear. Diterbitkan oleh Gramedia pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/atomic-habits.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(12,2,'Homo Deus','homo-deus','Yuval Noah Harari','Kepustakaan Populer Gramedia',2018,'978-602-1011',145000.00,14,'Buku \"Homo Deus\" karya Yuval Noah Harari. Diterbitkan oleh Kepustakaan Populer Gramedia pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/homo-deus.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(13,2,'Cinta Tanah Air','cinta-tanah-air','Tan Malaka','Narasi',2019,'978-602-1012',76000.00,9,'Buku \"Cinta Tanah Air\" karya Tan Malaka. Diterbitkan oleh Narasi pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/cinta-tanah-air.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(14,2,'Catatan Seorang Demonstran','catatan-seorang-demonstran','Soe Hok Gie','LP3ES',1983,'978-602-1013',89000.00,7,'Buku \"Catatan Seorang Demonstran\" karya Soe Hok Gie. Diterbitkan oleh LP3ES pada tahun 1983. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/catatan-seorang-demonstran.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(15,2,'Berpikir Cepat dan Lambat','berpikir-cepat-dan-lambat','Daniel Kahneman','Gramedia',2020,'978-602-1014',165000.00,11,'Buku \"Berpikir Cepat dan Lambat\" karya Daniel Kahneman. Diterbitkan oleh Gramedia pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/berpikir-cepat-dan-lambat.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(16,3,'Pemrograman PHP untuk Pemula','pemrograman-php-untuk-pemula','Abdul Kadir','Andi Publisher',2021,'978-602-1015',125000.00,28,'Buku \"Pemrograman PHP untuk Pemula\" karya Abdul Kadir. Diterbitkan oleh Andi Publisher pada tahun 2021. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/pemrograman-php-untuk-pemula.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(17,3,'Laravel: Framework PHP Modern','laravel-framework-php-modern','Rizky Pratama','Informatika',2023,'978-602-1016',145000.00,19,'Buku \"Laravel: Framework PHP Modern\" karya Rizky Pratama. Diterbitkan oleh Informatika pada tahun 2023. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/laravel-framework-php-modern.png',1,'2026-11-17 18:40:30','2026-11-17 18:40:30'),(18,3,'Belajar MySQL dari Nol','belajar-mysql-dari-nol','Budi Raharjo','Informatika',2022,'978-602-1017',135000.00,21,'Buku \"Belajar MySQL dari Nol\" karya Budi Raharjo. Diterbitkan oleh Informatika pada tahun 2022. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/belajar-mysql-dari-nol.png',1,'2026-11-17 18:40:31','2026-11-18 07:43:15'),(19,3,'Clean Code','clean-code','Robert C. Martin','Prentice Hall',2008,'978-602-1018',210000.00,6,'Buku \"Clean Code\" karya Robert C. Martin. Diterbitkan oleh Prentice Hall pada tahun 2008. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/clean-code.png',1,'2026-11-17 18:40:31','2026-11-18 02:47:23'),(20,3,'Algoritma dan Struktur Data','algoritma-dan-struktur-data','Rinaldi Munir','Informatika',2020,'978-602-1019',155000.00,15,'Buku \"Algoritma dan Struktur Data\" karya Rinaldi Munir. Diterbitkan oleh Informatika pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/algoritma-dan-struktur-data.png',1,'2026-11-17 18:40:31','2026-11-18 02:45:15'),(21,3,'Dasar Pemrograman JavaScript','dasar-pemrograman-javascript','Eko Kurniawan','Andi Publisher',2022,'978-602-1020',118000.00,21,'Buku \"Dasar Pemrograman JavaScript\" karya Eko Kurniawan. Diterbitkan oleh Andi Publisher pada tahun 2022. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/dasar-pemrograman-javascript.png',1,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(22,3,'Jaringan Komputer Dasar','jaringan-komputer-dasar','Iwan Sofana','Informatika',2019,'978-602-1021',132000.00,12,'Buku \"Jaringan Komputer Dasar\" karya Iwan Sofana. Diterbitkan oleh Informatika pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/jaringan-komputer-dasar.png',1,'2026-11-17 18:40:31','2026-11-18 07:43:15'),(23,3,'Keamanan Aplikasi Web','keamanan-aplikasi-web','Dedi Gunawan','Elex Media',2023,'978-602-1022',168000.00,9,'Buku \"Keamanan Aplikasi Web\" karya Dedi Gunawan. Diterbitkan oleh Elex Media pada tahun 2023. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/keamanan-aplikasi-web.png',1,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(24,3,'Desain UI/UX untuk Developer','desain-uiux-untuk-developer','Ayu Lestari','Informatika',2023,'978-602-1023',142000.00,17,'Buku \"Desain UI/UX untuk Developer\" karya Ayu Lestari. Diterbitkan oleh Informatika pada tahun 2023. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/desain-uiux-untuk-developer.png',1,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(25,4,'Kancil dan Buaya','kancil-dan-buaya','Tim Penulis','Erlangga for Kids',2018,'978-602-1024',45000.00,50,'Buku \"Kancil dan Buaya\" karya Tim Penulis. Diterbitkan oleh Erlangga for Kids pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/kancil-dan-buaya.png',1,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(26,4,'Petualangan Si Kancil','petualangan-si-kancil','Mira W.','Gramedia',2017,'978-602-1025',52000.00,45,'Buku \"Petualangan Si Kancil\" karya Mira W.. Diterbitkan oleh Gramedia pada tahun 2017. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/petualangan-si-kancil.png',1,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(27,4,'Cerita Rakyat Nusantara','cerita-rakyat-nusantara','Tim Redaksi','Bhuana Ilmu Populer',2019,'978-602-1026',68000.00,38,'Buku \"Cerita Rakyat Nusantara\" karya Tim Redaksi. Diterbitkan oleh Bhuana Ilmu Populer pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/cerita-rakyat-nusantara.png',1,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(28,4,'Dongeng Sebelum Tidur','dongeng-sebelum-tidur','Ratna Ayu','Elex Media',2020,'978-602-1027',58000.00,42,'Buku \"Dongeng Sebelum Tidur\" karya Ratna Ayu. Diterbitkan oleh Elex Media pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/dongeng-sebelum-tidur.png',1,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(29,4,'Belajar Berhitung Bersama','belajar-berhitung-bersama','Nurul Hidayat','Erlangga for Kids',2021,'978-602-1028',49000.00,53,'Buku \"Belajar Berhitung Bersama\" karya Nurul Hidayat. Diterbitkan oleh Erlangga for Kids pada tahun 2021. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/belajar-berhitung-bersama.png',1,'2026-11-17 18:40:31','2026-11-18 07:43:15'),(30,5,'Matematika Kelas 12','matematika-kelas-12','Sukino','Erlangga',2020,'978-602-1029',95000.00,30,'Buku \"Matematika Kelas 12\" karya Sukino. Diterbitkan oleh Erlangga pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/matematika-kelas-12.png',1,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(31,5,'Bahasa Indonesia untuk SMA','bahasa-indonesia-untuk-sma','Kosasih','Yrama Widya',2019,'978-602-1030',88000.00,26,'Buku \"Bahasa Indonesia untuk SMA\" karya Kosasih. Diterbitkan oleh Yrama Widya pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/bahasa-indonesia-untuk-sma.png',1,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(32,5,'Fisika Dasar','fisika-dasar','Halliday dan Resnick','Erlangga',2018,'978-602-1031',185000.00,12,'Buku \"Fisika Dasar\" karya Halliday dan Resnick. Diterbitkan oleh Erlangga pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/fisika-dasar.png',1,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(33,5,'Kimia Organik','kimia-organik','Ralph J. Fessenden','Erlangga',2017,'978-602-1032',175000.00,8,'Buku \"Kimia Organik\" karya Ralph J. Fessenden. Diterbitkan oleh Erlangga pada tahun 2017. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/kimia-organik.png',1,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(34,5,'Ekonomi Makro','ekonomi-makro','Sadono Sukirno','Rajawali Pers',2019,'978-602-1033',160000.00,10,'Buku \"Ekonomi Makro\" karya Sadono Sukirno. Diterbitkan oleh Rajawali Pers pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/ekonomi-makro.png',1,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(35,5,'Metodologi Penelitian','metodologi-penelitian','Sugiyono','Alfabeta',2021,'978-602-1034',145000.00,15,'Buku \"Metodologi Penelitian\" karya Sugiyono. Diterbitkan oleh Alfabeta pada tahun 2021. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/metodologi-penelitian.png',1,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(36,5,'Statistika untuk Penelitian','statistika-untuk-penelitian','Sugiyono','Alfabeta',2020,'978-602-1035',138000.00,14,'Buku \"Statistika untuk Penelitian\" karya Sugiyono. Diterbitkan oleh Alfabeta pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/statistika-untuk-penelitian.png',1,'2026-11-17 18:40:31','2026-11-17 18:40:31');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `categories` VALUES (1,'Fiksi','fiksi','Novel, cerpen, dan karya fiksi lainnya','2026-11-17 18:40:29','2026-11-17 18:40:29'),(2,'Non-Fiksi','non-fiksi','Buku pengetahuan, biografi, dan esai','2026-11-17 18:40:30','2026-11-17 18:40:30'),(3,'Teknologi','teknologi','Pemrograman, jaringan, dan ilmu komputer','2026-11-17 18:40:30','2026-11-17 18:40:30'),(4,'Anak','anak','Buku cerita dan edukasi untuk anak','2026-11-17 18:40:30','2026-11-17 18:40:30'),(5,'Pendidikan','pendidikan','Buku pelajaran dan referensi akademik','2026-11-17 18:40:30','2026-11-17 18:40:30');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `messages` VALUES (1,2,'Budi Santoso','user@booknest.test','Tanya stok buku Clean Code','Apakah stok Clean Code masih tersedia? Saya ingin memesan 2 eksemplar.',1,'2026-11-13 18:40:33','2026-11-17 18:40:33'),(2,3,'Siti Aminah','siti@booknest.test','Konfirmasi pembayaran COD','Pesanan saya sudah diterima. Terima kasih atas pelayanannya.',1,'2026-11-16 18:40:33','2026-11-17 18:40:33'),(3,NULL,'Pengunjung','pengunjung@example.test','Kerja sama reseller','Apakah BookStore menerima kerja sama reseller untuk wilayah Bandung?',0,'2026-11-13 18:40:33','2026-11-17 18:40:33');
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `order_items` VALUES (1,1,1,'Laskar Pelangi',85000.00,2,170000.00,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(2,1,3,'Cantik Itu Luka',95000.00,1,95000.00,'2026-11-17 18:40:31','2026-11-17 18:40:31'),(3,2,9,'Filosofi Teras',98000.00,1,98000.00,'2026-11-17 18:40:32','2026-11-17 18:40:32'),(4,3,10,'Sapiens: Riwayat Singkat Umat Manusia',150000.00,1,150000.00,'2026-11-17 18:40:32','2026-11-17 18:40:32'),(5,3,11,'Atomic Habits',108000.00,2,216000.00,'2026-11-17 18:40:32','2026-11-17 18:40:32'),(6,4,16,'Pemrograman PHP untuk Pemula',125000.00,1,125000.00,'2026-11-17 18:40:32','2026-11-17 18:40:32'),(7,5,17,'Laravel: Framework PHP Modern',145000.00,1,145000.00,'2026-11-17 18:40:32','2026-11-17 18:40:32'),(8,5,18,'Belajar MySQL dari Nol',135000.00,1,135000.00,'2026-11-17 18:40:32','2026-11-17 18:40:32'),(9,6,5,'Hujan',88000.00,3,264000.00,'2026-11-17 18:40:32','2026-11-17 18:40:32'),(10,7,25,'Kancil dan Buaya',45000.00,2,90000.00,'2026-11-17 18:40:32','2026-11-17 18:40:32'),(11,7,26,'Petualangan Si Kancil',52000.00,1,52000.00,'2026-11-17 18:40:32','2026-11-17 18:40:32'),(12,8,29,'Belajar Berhitung Bersama',49000.00,1,49000.00,'2026-11-17 18:40:32','2026-11-17 18:40:32'),(13,8,30,'Matematika Kelas 12',95000.00,2,190000.00,'2026-11-17 18:40:32','2026-11-17 18:40:32'),(14,9,12,'Homo Deus',145000.00,1,145000.00,'2026-11-17 18:40:32','2026-11-17 18:40:32'),(15,9,13,'Cinta Tanah Air',76000.00,1,76000.00,'2026-11-17 18:40:32','2026-11-17 18:40:32'),(16,9,14,'Catatan Seorang Demonstran',89000.00,1,89000.00,'2026-11-17 18:40:32','2026-11-17 18:40:32'),(17,10,19,'Clean Code',210000.00,1,210000.00,'2026-11-17 18:40:33','2026-11-17 18:40:33'),(18,10,20,'Algoritma dan Struktur Data',155000.00,1,155000.00,'2026-11-17 18:40:33','2026-11-17 18:40:33'),(19,11,21,'Dasar Pemrograman JavaScript',118000.00,2,236000.00,'2026-11-17 18:40:33','2026-11-17 18:40:33'),(20,12,2,'Bumi Manusia',120000.00,1,120000.00,'2026-11-17 18:40:33','2026-11-17 18:40:33'),(21,12,4,'Perahu Kertas',78000.00,1,78000.00,'2026-11-17 18:40:33','2026-11-17 18:40:33'),(22,13,31,'Bahasa Indonesia untuk SMA',88000.00,1,88000.00,'2026-11-17 18:40:33','2026-11-17 18:40:33'),(23,13,32,'Fisika Dasar',185000.00,1,185000.00,'2026-11-17 18:40:33','2026-11-17 18:40:33'),(24,14,33,'Kimia Organik',175000.00,1,175000.00,'2026-11-17 18:40:33','2026-11-17 18:40:33'),(25,15,6,'Pulang',110000.00,1,110000.00,'2026-11-17 18:40:33','2026-11-17 18:40:33'),(26,15,7,'Ronggeng Dukuh Paruk',92000.00,2,184000.00,'2026-11-17 18:40:33','2026-11-17 18:40:33');
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `orders` VALUES (1,2,'INV-20260608-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',265000.00,0.00,265000.00,'completed','cod','paid','2026-06-08 17:00:00',NULL,'2026-06-07 17:00:00','2026-06-07 17:00:00'),(2,3,'INV-20260620-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',98000.00,0.00,98000.00,'completed','cod','paid','2026-06-20 17:00:00',NULL,'2026-06-19 17:00:00','2026-06-19 17:00:00'),(3,2,'INV-20260705-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',366000.00,0.00,366000.00,'completed','cod','paid','2026-07-05 17:00:00',NULL,'2026-07-04 17:00:00','2026-07-04 17:00:00'),(4,3,'INV-20260718-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',125000.00,0.00,125000.00,'cancelled','cod','failed',NULL,NULL,'2026-07-17 17:00:00','2026-07-17 17:00:00'),(5,3,'INV-20260809-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',280000.00,0.00,280000.00,'completed','cod','paid','2026-08-09 17:00:00',NULL,'2026-08-08 17:00:00','2026-08-08 17:00:00'),(6,2,'INV-20260822-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',264000.00,0.00,264000.00,'completed','cod','paid','2026-08-22 17:00:00',NULL,'2026-08-21 17:00:00','2026-08-21 17:00:00'),(7,3,'INV-20260907-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',142000.00,0.00,142000.00,'completed','cod','paid','2026-09-07 17:00:00',NULL,'2026-09-06 17:00:00','2026-09-06 17:00:00'),(8,3,'INV-20260916-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',239000.00,0.00,239000.00,'completed','cod','paid','2026-09-16 17:00:00',NULL,'2026-09-15 17:00:00','2026-09-15 17:00:00'),(9,2,'INV-20261004-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',310000.00,0.00,310000.00,'completed','cod','paid','2026-10-04 17:00:00',NULL,'2026-10-03 17:00:00','2026-10-03 17:00:00'),(10,3,'INV-20261019-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',365000.00,0.00,365000.00,'completed','cod','paid','2026-10-19 17:00:00',NULL,'2026-10-18 17:00:00','2026-10-18 17:00:00'),(11,3,'INV-20261103-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',236000.00,0.00,236000.00,'completed','cod','paid','2026-11-03 17:00:00',NULL,'2026-11-02 17:00:00','2026-11-02 17:00:00'),(12,2,'INV-20261109-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',198000.00,0.00,198000.00,'shipped','cod','paid','2026-11-09 17:00:00',NULL,'2026-11-08 17:00:00','2026-11-08 17:00:00'),(13,3,'INV-20261114-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',273000.00,0.00,273000.00,'processing','cod','paid','2026-11-14 17:00:00',NULL,'2026-11-13 17:00:00','2026-11-13 17:00:00'),(14,3,'INV-20261117-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',175000.00,0.00,175000.00,'processing','cod','paid','2026-11-18 07:44:40',NULL,'2026-11-16 18:40:33','2026-11-18 07:44:40'),(15,2,'INV-20261117-0002','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',294000.00,0.00,294000.00,'pending','cod','unpaid',NULL,NULL,'2026-11-16 18:40:33','2026-11-16 18:40:33');
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
INSERT INTO `sessions` VALUES ('2Dqb7oikkb74ZGeV7unET26t4RO0gsuzlsaw6V7P',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiI1eERpSkRjUWFQMWhXSFF1cWJROVh3NFR4anJob0xSVHcxbTNOT25VIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nP3E9JTI3JTNCJTIwRFJPUCUyMFRBQkxFJTIwYm9va3MlM0IlMjAtLSIsInJvdXRlIjoiY2F0YWxvZy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1795015402),('3acR88RWE4oOfesZBIcDW1CydpbaQdXhOYRINhfH',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJTcGJ2dXphVlVrcW1ZMnB3c3gzdDZpOTB2ZU9oWEZSWWk1RHdhQ01hIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC90ZW50YW5nLWthbWkiLCJyb3V0ZSI6ImFib3V0In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1795015368),('4FLoQniCsOflw2Zs5yx5ntzruChfbOqH5tftRb4m',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJSMDhuUEFiVUptUUxnb1J6OWx6REZVdERiNnVXMDRZclNMWDVjbUdGIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nIiwicm91dGUiOiJjYXRhbG9nLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1795015574),('5y54u4RzqB5IbnBsQXpEdSwP1uB7e2XgIGw0gAFS',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJMN3M4c0VHZHF5TTFXbTJMY0JnSnlRNnp0eVRGNUYxM0I0VmdPSkRHIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nP3E9QW5kcmVhIiwicm91dGUiOiJjYXRhbG9nLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1795015369),('7AGu6lrE9dfNv7YB5J75LdMOqK78g7YhgCGaatcJ',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiIwUm9QSUZuTGk2amd6R0Q3VXpsNHQzU2JUQjdtcXNHbnFrQ2p5RzA3IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1795015403),('8Sy2fGfYgldNDXVWwvYhlQDdmchSWQvfQjFfLell',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJrRjlhbDFBdDNvdUM1NFBhU1M1alJqUmNzczY4bWM1Q0JHeERwNFUyIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2FkbWluXC9kYXNoYm9hcmQifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvZGFzaGJvYXJkIiwicm91dGUiOiJhZG1pbi5kYXNoYm9hcmQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1795015401),('8wp8kxYAMgzg7YNviI7PvmFRcqZ1VYGqlxPf1gd2',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJiaEh2MHA2ZkpjbnBhQXowSXhwR1NiZ2t1Y3lSam1MZHJwWFU3cUxhIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9yZWdpc3RlciIsInJvdXRlIjoicmVnaXN0ZXIifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1795015575),('AbPHAAVTScPHYcXn2Y9XVJa9dVcDxwEHfTf23cY4',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJITzdsaHI5UTlFa3YxUHZIWFdDQndsYWF1aGpHUjZ4OEd6R3FibFY5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1795013560),('ar8BsQIEAgUB52kFdKSavuLakqA3n8mMKfjOLcfd',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0','eyJfdG9rZW4iOiJOR2c2Wk1Kdng5c1gwMXdmcXZlb1VEdXNQSUNmM3ZaMUQyUUh5MDU1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rZXJhbmphbmciLCJyb3V0ZSI6ImNhcnQuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwicGFzc3dvcmRfaGFzaF93ZWIiOiI3ZjljNTgxZTJiNDdjOWI4NmQ5N2M2MWYyOTc0MmRjZThlZGZmOTMwNjZiZDY2YmJmOTU0YzcwYjFjN2IwNTBlIn0=',1795013620),('bR3muXr16fJrWUz8CmkPyqUsrkJqyjK4MMjDTrHg',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJQWVZZS1l4SjhMNXN6TEFGSU9HVmV3S0J2TXd3V0J6UmVZaDFHVnhzIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2NoZWNrb3V0In0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvY2hlY2tvdXQiLCJyb3V0ZSI6ImNoZWNrb3V0LmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1795015400),('BVPCudL7hTat6cKGk6yGo7wi3Pu1sHjFXJOzZdxC',1,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJyN1R0N3lMdjZ6NUJuTXZjWHZRUjRhVzNOcHZITFkzODFNeVo0bXh3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvb3JkZXJzIiwicm91dGUiOiJhZG1pbi5vcmRlcnMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwicGFzc3dvcmRfaGFzaF93ZWIiOiI3ZjljNTgxZTJiNDdjOWI4NmQ5N2M2MWYyOTc0MmRjZThlZGZmOTMwNjZiZDY2YmJmOTU0YzcwYjFjN2IwNTBlIn0=',1795015350),('D8idRv2Wtp1QZQ0Em24Jhfpqgsqq2DbvrIqQATv9',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiI4MDdKOVFRS2NXbzhPTnBTWXFnV0xncDlSU0I3SzVOalV5Nkt0TUV1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rb250YWsiLCJyb3V0ZSI6ImNvbnRhY3Quc2hvdyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1795015576),('dfW5LTWlMmYq1Yqkbj0q1iI2xnuEpTVmPxF6j4pi',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJBcGViTVVlU2M2bXp2M2tSMUx6Zm16OTVaeDA5d2hwQm9SenBzY0s3IiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3Blc2FuYW4ifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wZXNhbmFuIiwicm91dGUiOiJvcmRlcnMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1795015401),('DovupsMYogFQrc8oaeP9uqyyFGIzMCyW724Q1qm8',2,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJmaDFtaHVxUkEwaGhFbTNOZUNsM3ZLM1RkM1V0cXFVM0J3OVA2bmM4IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9jaGVja291dFwvc3Vrc2VzXC8xIiwicm91dGUiOiJjaGVja291dC5zdWNjZXNzIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjIsInBhc3N3b3JkX2hhc2hfd2ViIjoiYjNhNDBlYzk1YTZmZTY4YzY5ZjQwZTk4ZjM5NWViNjdmNWRmOGZjN2RjNjcyMTMyYTAxY2JjZTUxMjgxNGUxNyJ9',1795015578),('EEsdgrnjq647vbH3RL7TDMY47rQCGQ8wIDmdnuBF',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJoOTlBMFNhYXFnUm5GRlB0djhNVjNnRmIwRlM0WGhGVmFlWk5GQnJRIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1795015234),('Fu4beBZeFw4Djektrc47iU3Xh1T6jpcpiVuYqTQp',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJ1ODZJNnBKbkRWOFlRVDRIQmQyaWtvYVJGMDdlMVdBSnd1OFhmT2dBIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nP3E9JTI3JTIwT1IlMjAxJTNEMSUyMC0tJTIwIiwicm91dGUiOiJjYXRhbG9nLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1795015402),('HCbrm4v2kDe048pAsUX21xRv8mXZzcAEHIHyYi4T',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0','eyJfdG9rZW4iOiJ6SWhCOVczY05abEt0UlBiTGdhVXI4SEpWdFhzMXUwbXkyNUsyWkdUIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rZXJhbmphbmciLCJyb3V0ZSI6ImNhcnQuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MiwicGFzc3dvcmRfaGFzaF93ZWIiOiJiM2E0MGVjOTVhNmZlNjhjNjlmNDBlOThmMzk1ZWI2N2Y1ZGY4ZmM3ZGM2NzIxMzJhMDFjYmNlNTEyODE0ZTE3In0=',1795013755),('HZeD9oHEATVTde4csMZ7BVtG7ynTWHBxVwztJp52',1,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiI0WTFpMG1VZGJRUTRNbkRFQlRlNGRLVjRWZkhOYW5nWHpHNHFpSzdMIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvb3JkZXJzXC8yNCIsInJvdXRlIjoiYWRtaW4ub3JkZXJzLnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6WyJlcnJvciJdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsInBhc3N3b3JkX2hhc2hfd2ViIjoiN2Y5YzU4MWUyYjQ3YzliODZkOTdjNjFmMjk3NDJkY2U4ZWRmZjkzMDY2YmQ2NmJiZjk1NGM3MGIxYzdiMDUwZSIsImVycm9yIjoiUGVzYW5hbiBpbmkgc3VkYWggZGl0YW5kYWkgbHVuYXMuIn0=',1795015505),('I3eEboZQP1LXMBLMnEYTu17g6EdWDsiJ7Fc42CIx',1,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJkRXJpNjVHYVZmQk1MV2FMdlhxUTU3TGphNzJ4c0tiZjZjU1JLeFFDIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvbWVzc2FnZXNcLzEiLCJyb3V0ZSI6ImFkbWluLm1lc3NhZ2VzLnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwicGFzc3dvcmRfaGFzaF93ZWIiOiI3ZjljNTgxZTJiNDdjOWI4NmQ5N2M2MWYyOTc0MmRjZThlZGZmOTMwNjZiZDY2YmJmOTU0YzcwYjFjN2IwNTBlIn0=',1795015583),('iL8t4XPVIjf2WDtN1rkrOX7rmI58VoALD6CIQ2ar',6,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJoWmdYNEliVGFTZlRzRmtKcnVyalkyTXhHODZCR3pyNWRsVDBiSXpJIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9yZWdpc3RlciIsInJvdXRlIjoicmVnaXN0ZXIifSwiX2ZsYXNoIjp7Im9sZCI6WyJzdWNjZXNzIl0sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6NiwicGFzc3dvcmRfaGFzaF93ZWIiOiJmZGUxMTJhOGY2M2IxYThlYzlkMGNjOGQ3MmM1MzAyM2YxNTMyMDcyNzdlYjlmMDY4ZDdjYjNmNWU0NjE0ZjVmIiwic3VjY2VzcyI6IlJlZ2lzdHJhc2kgYmVyaGFzaWwuIFNlbGFtYXQgZGF0YW5nLCBHSCBTZWMhIn0=',1795015404),('iLPAcTyMqgUKfpzQdMogBO7a8MluGPuSDX5Xadfo',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJaaWZnR0UzVmVRaFd1eGlPaUhwZlpibU1PMXFMMEFHazZjSWRoajlZIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1795015575),('K61qOvvplwMfuwZtLddLMMLWyggJNaXFdAmRjus7',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiI3RTFUOFM4Sk9qQ3IyOWlSY3lZTzhhSHN2S2dMaDhFeE16eUVYWTAzIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC90ZW50YW5nLWthbWkiLCJyb3V0ZSI6ImFib3V0In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1795015576),('LJ59ntiejNlY1NWjVo3wdnRl3tM4TDieEm4l9hiF',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0','eyJfdG9rZW4iOiJ1NTZFVzk0c2lmbHlCSktvc2dnUFNiVWFranN1aHhIRjBpTGUzM2J0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rZXJhbmphbmciLCJyb3V0ZSI6ImNhcnQuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MiwicGFzc3dvcmRfaGFzaF93ZWIiOiJiM2E0MGVjOTVhNmZlNjhjNjlmNDBlOThmMzk1ZWI2N2Y1ZGY4ZmM3ZGM2NzIxMzJhMDFjYmNlNTEyODE0ZTE3In0=',1795013600),('nAsb8z7YKLeqBUF1hwwFBSPrUT0vEKbnJE3pGbZM',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJ3aHJIOU15T1Z0RzJob3JENEU3MURIdURnUVJycFhNM1pZa0xqV2xNIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1795015574),('NTqsQ2e36nIS3C9tEGyxRlavGm75W5mV2gEaNV4j',5,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiIxNEZ5MTYyMXd4OTY1dnBURGRVemZpQ0JIY0xzSHVXMGhlMDJwc3AzIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9jaGVja291dCIsInJvdXRlIjoiY2hlY2tvdXQuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6WyJzdWNjZXNzIl0sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6NSwicGFzc3dvcmRfaGFzaF93ZWIiOiJiMGNjMzg4MTNkMzRhZjBhZjVmODc4NjRmMmI5YjZkNWUxNDgwMjdiOTlhODQzZTBkMzE3NmM4ZDY4ZTgwNjVhIiwic3VjY2VzcyI6IlBlc2FuYW4gYmVyaGFzaWwgZGlidWF0LiJ9',1795015371),('pzbwU2ghJZWb4A5e0BwbgSepRdKnGHTaMwmbJwNp',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJXQk55SkVBWFhDUUtORlE2VEcwSG50TDBacGxVZ0JxNjRTbmY2TlJmIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2tlcmFuamFuZyJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2tlcmFuamFuZyIsInJvdXRlIjoiY2FydC5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1795015400),('QjRso7sE5HbB22jNWjF1KgE0NEMkeZxwSg3fJ9df',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJLbmw5ejhkZTFJbkx3cnFLTEVsQ3JvQzlYT0dOZ2x1aUJ5Z2cwWjdxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1795015345),('qumooy85mpjg8pa5b6nT5TUTuRxcxBljMezHy3kH',5,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJVS01vdEh6ZmRMd2ZIdWpOU0lYQm1CZHVJYXhsZ1MxSmhMZ3hFODVNIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9yZWdpc3RlciIsInJvdXRlIjoicmVnaXN0ZXIifSwiX2ZsYXNoIjp7Im9sZCI6WyJzdWNjZXNzIl0sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6NSwicGFzc3dvcmRfaGFzaF93ZWIiOiJiMGNjMzg4MTNkMzRhZjBhZjVmODc4NjRmMmI5YjZkNWUxNDgwMjdiOTlhODQzZTBkMzE3NmM4ZDY4ZTgwNjVhIiwic3VjY2VzcyI6IlJlZ2lzdHJhc2kgYmVyaGFzaWwuIFNlbGFtYXQgZGF0YW5nLCBHSCBUZXN0IFVzZXIhIn0=',1795015366),('SIuFArY37qnntyWLbrvm2pqokcN0OXKZPCIReRH9',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJyaFVwOFExTFpBczZyRDMzVWRJeTBnMWJSUVlPYzhNbUVMSkswQlZFIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nP3E9bGFyYXZlbCIsInJvdXRlIjoiY2F0YWxvZy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1795015369),('sQfOvT6rU9qyFimYoM2zb1CAdIlS2E5MQKwaP0Ib',2,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJRZVB0Z1dGSmZXNWtiZUVERDRkeWpCZElYc0dnN0l6Z1lVT3ZrUkVHIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wZXNhbmFuXC8yIiwicm91dGUiOiJvcmRlcnMuc2hvdyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyLCJwYXNzd29yZF9oYXNoX3dlYiI6ImIzYTQwZWM5NWE2ZmU2OGM2OWY0MGU5OGYzOTVlYjY3ZjVkZjhmYzdkYzY3MjEzMmEwMWNiY2U1MTI4MTRlMTcifQ==',1795015402),('t0W2JNximFiWVfPRdkaMviVJjC9ynMW0YAUgzlaz',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJkbFQzR2t0NDBjUnRGSGFzeGhtN0huSTVJdHFnWUliNElseWUzVDBTIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nP3E9JTNDc2NyaXB0JTNFYWxlcnQlMjgxJTI5JTNDJTJGc2NyaXB0JTNFIiwicm91dGUiOiJjYXRhbG9nLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1795015402),('t2yOU5Ei1GzAsddGPB5FBL8K6mM9YsrfjQjTtk3A',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJsb2ZNR3JFWktwZHB2SzJvdjJERnpwZFZUMndqT2Q0YTRoZDIxaHROIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nP3E9bGFyYXZlbCIsInJvdXRlIjoiY2F0YWxvZy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1795015574),('tYVh7YvKkNv7MnnCEyTUQvTxRBKhRkFTgnaU9NuJ',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJlS0Zxa29haGRjdUp1NEV3RVJKTEdjOTR5WFFvV0ZLb0pXbkdyczR6IiwiX2ZsYXNoIjp7Im5ldyI6W10sIm9sZCI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDAiLCJyb3V0ZSI6ImhvbWUifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsInBhc3N3b3JkX2hhc2hfd2ViIjoiN2Y5YzU4MWUyYjQ3YzliODZkOTdjNjFmMjk3NDJkY2U4ZWRmZjkzMDY2YmQ2NmJiZjk1NGM3MGIxYzdiMDUwZSJ9',1795013276),('v5eDdXsWykxHcY66jty1omYueImHPhlhgA9WIjAF',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0','eyJfdG9rZW4iOiJLVUp6TllpUGs1dXlMOGdMRHpTYlBYMGVQNE0xY0YxeDlTTXlwTVFKIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rZXJhbmphbmciLCJyb3V0ZSI6ImNhcnQuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwicGFzc3dvcmRfaGFzaF93ZWIiOiI3ZjljNTgxZTJiNDdjOWI4NmQ5N2M2MWYyOTc0MmRjZThlZGZmOTMwNjZiZDY2YmJmOTU0YzcwYjFjN2IwNTBlIn0=',1795013775),('vZuNCA0OSNhBszqPT3eyyA2tj6pe7LxdYG5tjzKN',NULL,'127.0.0.1','curl/8.19.0','eyJfdG9rZW4iOiJqVkZtZW8yeXVVWkYwejBhR3hWY1JWQzlERGYybHFCV1plVGc5SVg5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9idWt1XC9sYXNrYXItcGVsYW5naSIsInJvdXRlIjoiY2F0YWxvZy5zaG93In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1795015575);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `users` VALUES (1,'Administrator','admin@booknest.test',NULL,'$2y$12$Fd.iDIS5lpYzN5wFSmb1I.z74eV45RxvkhAyoYV0rapBvcwE41IWS','admin','081234567890','Jl. Merdeka No. 1, Jakarta',NULL,'2026-11-17 18:40:29','2026-11-17 18:40:29'),(2,'Budi Santoso','user@booknest.test',NULL,'$2y$12$.o3foQZs1WgOASvdR53lReG/fJwVLCdsprsWzP03gnv36895KB8OS','user','081298765432','Jl. Sudirman No. 45, Bandung','sSrtyp0OZq4efvuXu163jvMT4IUQUHq86xIHdEQtLuD5pELgXMrc3OzvhQJi','2026-11-17 18:40:29','2026-11-17 18:40:29'),(3,'Siti Aminah','siti@booknest.test',NULL,'$2y$12$OB9ivE4TxbJHscYwsTCXTuNKDcAwY6AOiN0tEiFFOqG2h8YpGzWUe','user','081377788899','Jl. Diponegoro No. 12, Surabaya',NULL,'2026-11-17 18:40:29','2026-11-17 18:40:29');
