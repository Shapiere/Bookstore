-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bookstore_bnsp
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
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

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `category_id`, `title`, `slug`, `author`, `publisher`, `year`, `isbn`, `price`, `stock`, `description`, `cover_image`, `is_active`, `created_at`, `updated_at`) VALUES (1,1,'Laskar Pelangi','laskar-pelangi','Andrea Hirata','Bentang Pustaka',2005,'978-602-1000',85000.00,25,'Buku \"Laskar Pelangi\" karya Andrea Hirata. Diterbitkan oleh Bentang Pustaka pada tahun 2005. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/laskar-pelangi.png',1,'2026-11-13 11:29:19','2026-11-13 11:29:19'),(2,1,'Bumi Manusia','bumi-manusia','Pramoedya Ananta Toer','Lentera Dipantara',1980,'978-602-1001',120000.00,18,'Buku \"Bumi Manusia\" karya Pramoedya Ananta Toer. Diterbitkan oleh Lentera Dipantara pada tahun 1980. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/bumi-manusia.png',1,'2026-11-13 11:29:19','2026-11-13 11:29:19'),(3,1,'Cantik Itu Luka','cantik-itu-luka','Eka Kurniawan','Gramedia',2002,'978-602-1002',95000.00,12,'Buku \"Cantik Itu Luka\" karya Eka Kurniawan. Diterbitkan oleh Gramedia pada tahun 2002. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/cantik-itu-luka.png',1,'2026-11-13 11:29:19','2026-11-13 11:29:19'),(4,1,'Perahu Kertas','perahu-kertas','Dee Lestari','Bentang Pustaka',2009,'978-602-1003',78000.00,20,'Buku \"Perahu Kertas\" karya Dee Lestari. Diterbitkan oleh Bentang Pustaka pada tahun 2009. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/perahu-kertas.png',1,'2026-11-13 11:29:19','2026-11-13 11:29:19'),(5,1,'Hujan','hujan','Tere Liye','Gramedia',2016,'978-602-1004',88000.00,30,'Buku \"Hujan\" karya Tere Liye. Diterbitkan oleh Gramedia pada tahun 2016. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/hujan.png',1,'2026-11-13 11:29:19','2026-11-13 11:29:19'),(6,1,'Pulang','pulang','Leila S. Chudori','Kepustakaan Populer Gramedia',2012,'978-602-1005',110000.00,10,'Buku \"Pulang\" karya Leila S. Chudori. Diterbitkan oleh Kepustakaan Populer Gramedia pada tahun 2012. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/pulang.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(7,1,'Ronggeng Dukuh Paruk','ronggeng-dukuh-paruk','Ahmad Tohari','Gramedia',1982,'978-602-1006',92000.00,8,'Buku \"Ronggeng Dukuh Paruk\" karya Ahmad Tohari. Diterbitkan oleh Gramedia pada tahun 1982. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/ronggeng-dukuh-paruk.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(8,1,'Supernova: Ksatria, Puteri, dan Bintang Jatuh','supernova-ksatria-puteri-dan-bintang-jatuh','Dee Lestari','Bentang Pustaka',2001,'978-602-1007',99000.00,15,'Buku \"Supernova: Ksatria, Puteri, dan Bintang Jatuh\" karya Dee Lestari. Diterbitkan oleh Bentang Pustaka pada tahun 2001. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/supernova-ksatria-puteri-dan-bintang-jatuh.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(9,2,'Filosofi Teras','filosofi-teras','Henry Manampiring','Kompas',2018,'978-602-1008',98000.00,40,'Buku \"Filosofi Teras\" karya Henry Manampiring. Diterbitkan oleh Kompas pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/filosofi-teras.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(10,2,'Sapiens: Riwayat Singkat Umat Manusia','sapiens-riwayat-singkat-umat-manusia','Yuval Noah Harari','Kepustakaan Populer Gramedia',2017,'978-602-1009',150000.00,22,'Buku \"Sapiens: Riwayat Singkat Umat Manusia\" karya Yuval Noah Harari. Diterbitkan oleh Kepustakaan Populer Gramedia pada tahun 2017. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/sapiens-riwayat-singkat-umat-manusia.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(11,2,'Atomic Habits','atomic-habits','James Clear','Gramedia',2019,'978-602-1010',108000.00,35,'Buku \"Atomic Habits\" karya James Clear. Diterbitkan oleh Gramedia pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/atomic-habits.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(12,2,'Homo Deus','homo-deus','Yuval Noah Harari','Kepustakaan Populer Gramedia',2018,'978-602-1011',145000.00,14,'Buku \"Homo Deus\" karya Yuval Noah Harari. Diterbitkan oleh Kepustakaan Populer Gramedia pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/homo-deus.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(13,2,'Cinta Tanah Air','cinta-tanah-air','Tan Malaka','Narasi',2019,'978-602-1012',76000.00,9,'Buku \"Cinta Tanah Air\" karya Tan Malaka. Diterbitkan oleh Narasi pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/cinta-tanah-air.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(14,2,'Catatan Seorang Demonstran','catatan-seorang-demonstran','Soe Hok Gie','LP3ES',1983,'978-602-1013',89000.00,7,'Buku \"Catatan Seorang Demonstran\" karya Soe Hok Gie. Diterbitkan oleh LP3ES pada tahun 1983. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/catatan-seorang-demonstran.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(15,2,'Berpikir Cepat dan Lambat','berpikir-cepat-dan-lambat','Daniel Kahneman','Gramedia',2020,'978-602-1014',165000.00,11,'Buku \"Berpikir Cepat dan Lambat\" karya Daniel Kahneman. Diterbitkan oleh Gramedia pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/berpikir-cepat-dan-lambat.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(16,3,'Pemrograman PHP untuk Pemula','pemrograman-php-untuk-pemula','Abdul Kadir','Andi Publisher',2021,'978-602-1015',125000.00,28,'Buku \"Pemrograman PHP untuk Pemula\" karya Abdul Kadir. Diterbitkan oleh Andi Publisher pada tahun 2021. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/pemrograman-php-untuk-pemula.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(17,3,'Laravel: Framework PHP Modern','laravel-framework-php-modern','Rizky Pratama','Informatika',2023,'978-602-1016',145000.00,19,'Buku \"Laravel: Framework PHP Modern\" karya Rizky Pratama. Diterbitkan oleh Informatika pada tahun 2023. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/laravel-framework-php-modern.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(18,3,'Belajar MySQL dari Nol','belajar-mysql-dari-nol','Budi Raharjo','Informatika',2022,'978-602-1017',135000.00,24,'Buku \"Belajar MySQL dari Nol\" karya Budi Raharjo. Diterbitkan oleh Informatika pada tahun 2022. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/belajar-mysql-dari-nol.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(19,3,'Clean Code','clean-code','Robert C. Martin','Prentice Hall',2008,'978-602-1018',210000.00,6,'Buku \"Clean Code\" karya Robert C. Martin. Diterbitkan oleh Prentice Hall pada tahun 2008. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/clean-code.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(20,3,'Algoritma dan Struktur Data','algoritma-dan-struktur-data','Rinaldi Munir','Informatika',2020,'978-602-1019',155000.00,16,'Buku \"Algoritma dan Struktur Data\" karya Rinaldi Munir. Diterbitkan oleh Informatika pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/algoritma-dan-struktur-data.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(21,3,'Dasar Pemrograman JavaScript','dasar-pemrograman-javascript','Eko Kurniawan','Andi Publisher',2022,'978-602-1020',118000.00,21,'Buku \"Dasar Pemrograman JavaScript\" karya Eko Kurniawan. Diterbitkan oleh Andi Publisher pada tahun 2022. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/dasar-pemrograman-javascript.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(22,3,'Jaringan Komputer Dasar','jaringan-komputer-dasar','Iwan Sofana','Informatika',2019,'978-602-1021',132000.00,13,'Buku \"Jaringan Komputer Dasar\" karya Iwan Sofana. Diterbitkan oleh Informatika pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/jaringan-komputer-dasar.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(23,3,'Keamanan Aplikasi Web','keamanan-aplikasi-web','Dedi Gunawan','Elex Media',2023,'978-602-1022',168000.00,9,'Buku \"Keamanan Aplikasi Web\" karya Dedi Gunawan. Diterbitkan oleh Elex Media pada tahun 2023. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/keamanan-aplikasi-web.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(24,3,'Desain UI/UX untuk Developer','desain-uiux-untuk-developer','Ayu Lestari','Informatika',2023,'978-602-1023',142000.00,17,'Buku \"Desain UI/UX untuk Developer\" karya Ayu Lestari. Diterbitkan oleh Informatika pada tahun 2023. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/desain-uiux-untuk-developer.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(25,4,'Kancil dan Buaya','kancil-dan-buaya','Tim Penulis','Erlangga for Kids',2018,'978-602-1024',45000.00,50,'Buku \"Kancil dan Buaya\" karya Tim Penulis. Diterbitkan oleh Erlangga for Kids pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/kancil-dan-buaya.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(26,4,'Petualangan Si Kancil','petualangan-si-kancil','Mira W.','Gramedia',2017,'978-602-1025',52000.00,45,'Buku \"Petualangan Si Kancil\" karya Mira W.. Diterbitkan oleh Gramedia pada tahun 2017. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/petualangan-si-kancil.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(27,4,'Cerita Rakyat Nusantara','cerita-rakyat-nusantara','Tim Redaksi','Bhuana Ilmu Populer',2019,'978-602-1026',68000.00,38,'Buku \"Cerita Rakyat Nusantara\" karya Tim Redaksi. Diterbitkan oleh Bhuana Ilmu Populer pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/cerita-rakyat-nusantara.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(28,4,'Dongeng Sebelum Tidur','dongeng-sebelum-tidur','Ratna Ayu','Elex Media',2020,'978-602-1027',58000.00,42,'Buku \"Dongeng Sebelum Tidur\" karya Ratna Ayu. Diterbitkan oleh Elex Media pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/dongeng-sebelum-tidur.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(29,4,'Belajar Berhitung Bersama','belajar-berhitung-bersama','Nurul Hidayat','Erlangga for Kids',2021,'978-602-1028',49000.00,55,'Buku \"Belajar Berhitung Bersama\" karya Nurul Hidayat. Diterbitkan oleh Erlangga for Kids pada tahun 2021. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/belajar-berhitung-bersama.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(30,5,'Matematika Kelas 12','matematika-kelas-12','Sukino','Erlangga',2020,'978-602-1029',95000.00,30,'Buku \"Matematika Kelas 12\" karya Sukino. Diterbitkan oleh Erlangga pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/matematika-kelas-12.png',1,'2026-11-13 11:29:20','2026-11-13 11:29:20'),(31,5,'Bahasa Indonesia untuk SMA','bahasa-indonesia-untuk-sma','Kosasih','Yrama Widya',2019,'978-602-1030',88000.00,26,'Buku \"Bahasa Indonesia untuk SMA\" karya Kosasih. Diterbitkan oleh Yrama Widya pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/bahasa-indonesia-untuk-sma.png',1,'2026-11-13 11:29:21','2026-11-13 11:29:21'),(32,5,'Fisika Dasar','fisika-dasar','Halliday dan Resnick','Erlangga',2018,'978-602-1031',185000.00,12,'Buku \"Fisika Dasar\" karya Halliday dan Resnick. Diterbitkan oleh Erlangga pada tahun 2018. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/fisika-dasar.png',1,'2026-11-13 11:29:21','2026-11-13 11:29:21'),(33,5,'Kimia Organik','kimia-organik','Ralph J. Fessenden','Erlangga',2017,'978-602-1032',175000.00,8,'Buku \"Kimia Organik\" karya Ralph J. Fessenden. Diterbitkan oleh Erlangga pada tahun 2017. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/kimia-organik.png',1,'2026-11-13 11:29:21','2026-11-13 11:29:21'),(34,5,'Ekonomi Makro','ekonomi-makro','Sadono Sukirno','Rajawali Pers',2019,'978-602-1033',160000.00,10,'Buku \"Ekonomi Makro\" karya Sadono Sukirno. Diterbitkan oleh Rajawali Pers pada tahun 2019. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/ekonomi-makro.png',1,'2026-11-13 11:29:21','2026-11-13 11:29:21'),(35,5,'Metodologi Penelitian','metodologi-penelitian','Sugiyono','Alfabeta',2021,'978-602-1034',145000.00,15,'Buku \"Metodologi Penelitian\" karya Sugiyono. Diterbitkan oleh Alfabeta pada tahun 2021. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/metodologi-penelitian.png',1,'2026-11-13 11:29:21','2026-11-13 11:29:21'),(36,5,'Statistika untuk Penelitian','statistika-untuk-penelitian','Sugiyono','Alfabeta',2020,'978-602-1035',138000.00,14,'Buku \"Statistika untuk Penelitian\" karya Sugiyono. Diterbitkan oleh Alfabeta pada tahun 2020. Buku ini merupakan salah satu koleksi unggulan di BookStore dan cocok untuk menambah wawasan serta koleksi bacaan Anda.','covers/statistika-untuk-penelitian.png',1,'2026-11-13 11:29:21','2026-11-13 11:29:21');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
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

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
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

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
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

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
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

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES (1,'Fiksi','fiksi','Novel, cerpen, dan karya fiksi lainnya','2026-11-13 11:29:19','2026-11-13 11:29:19'),(2,'Non-Fiksi','non-fiksi','Buku pengetahuan, biografi, dan esai','2026-11-13 11:29:19','2026-11-13 11:29:19'),(3,'Teknologi','teknologi','Pemrograman, jaringan, dan ilmu komputer','2026-11-13 11:29:19','2026-11-13 11:29:19'),(4,'Anak','anak','Buku cerita dan edukasi untuk anak','2026-11-13 11:29:19','2026-11-13 11:29:19'),(5,'Pendidikan','pendidikan','Buku pelajaran dan referensi akademik','2026-11-13 11:29:19','2026-11-13 11:29:19');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
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

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
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

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
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

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_11_12_000001_add_role_to_users_table',1),(5,'2026_11_12_000002_create_categories_table',1),(6,'2026_11_12_000003_create_books_table',1),(7,'2026_11_12_000004_create_carts_table',1),(8,'2026_11_12_000005_create_orders_table',1),(9,'2026_11_12_000006_create_order_items_table',1),(10,'2026_11_12_000007_create_messages_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
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

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` (`id`, `order_id`, `book_id`, `title_snapshot`, `price`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES (1,1,1,'Laskar Pelangi',85000.00,2,170000.00,'2026-11-13 11:29:21','2026-11-13 11:29:21'),(2,1,3,'Cantik Itu Luka',95000.00,1,95000.00,'2026-11-13 11:29:21','2026-11-13 11:29:21'),(3,2,9,'Filosofi Teras',98000.00,1,98000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(4,3,10,'Sapiens: Riwayat Singkat Umat Manusia',150000.00,1,150000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(5,3,11,'Atomic Habits',108000.00,2,216000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(6,4,16,'Pemrograman PHP untuk Pemula',125000.00,1,125000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(7,5,17,'Laravel: Framework PHP Modern',145000.00,1,145000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(8,5,18,'Belajar MySQL dari Nol',135000.00,1,135000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(9,6,5,'Hujan',88000.00,3,264000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(10,7,25,'Kancil dan Buaya',45000.00,2,90000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(11,7,26,'Petualangan Si Kancil',52000.00,1,52000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(12,8,29,'Belajar Berhitung Bersama',49000.00,1,49000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(13,8,30,'Matematika Kelas 12',95000.00,2,190000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(14,9,12,'Homo Deus',145000.00,1,145000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(15,9,13,'Cinta Tanah Air',76000.00,1,76000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(16,9,14,'Catatan Seorang Demonstran',89000.00,1,89000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(17,10,19,'Clean Code',210000.00,1,210000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(18,10,20,'Algoritma dan Struktur Data',155000.00,1,155000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(19,11,21,'Dasar Pemrograman JavaScript',118000.00,2,236000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(20,12,2,'Bumi Manusia',120000.00,1,120000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(21,12,4,'Perahu Kertas',78000.00,1,78000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(22,13,31,'Bahasa Indonesia untuk SMA',88000.00,1,88000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(23,13,32,'Fisika Dasar',185000.00,1,185000.00,'2026-11-13 11:29:22','2026-11-13 11:29:22'),(24,14,33,'Kimia Organik',175000.00,1,175000.00,'2026-11-13 11:29:23','2026-11-13 11:29:23'),(25,15,6,'Pulang',110000.00,1,110000.00,'2026-11-13 11:29:23','2026-11-13 11:29:23'),(26,15,7,'Ronggeng Dukuh Paruk',92000.00,2,184000.00,'2026-11-13 11:29:23','2026-11-13 11:29:23');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `user_id`, `order_code`, `customer_name`, `phone`, `shipping_address`, `subtotal`, `shipping_cost`, `total_price`, `status`, `payment_method`, `payment_status`, `snap_token`, `paid_at`, `notes`, `created_at`, `updated_at`) VALUES (1,2,'INV-20260608-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',265000.00,0.00,265000.00,'completed','cod','paid',NULL,'2026-06-08 17:00:00',NULL,'2026-06-07 17:00:00','2026-06-07 17:00:00'),(2,3,'INV-20260620-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',98000.00,0.00,98000.00,'completed','cod','paid',NULL,'2026-06-20 17:00:00',NULL,'2026-06-19 17:00:00','2026-06-19 17:00:00'),(3,2,'INV-20260705-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',366000.00,0.00,366000.00,'completed','cod','paid',NULL,'2026-07-05 17:00:00',NULL,'2026-07-04 17:00:00','2026-07-04 17:00:00'),(4,3,'INV-20260718-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',125000.00,0.00,125000.00,'cancelled','cod','failed',NULL,NULL,NULL,'2026-07-17 17:00:00','2026-07-17 17:00:00'),(5,3,'INV-20260809-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',280000.00,0.00,280000.00,'completed','cod','paid',NULL,'2026-08-09 17:00:00',NULL,'2026-08-08 17:00:00','2026-08-08 17:00:00'),(6,2,'INV-20260822-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',264000.00,0.00,264000.00,'completed','cod','paid',NULL,'2026-08-22 17:00:00',NULL,'2026-08-21 17:00:00','2026-08-21 17:00:00'),(7,3,'INV-20260907-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',142000.00,0.00,142000.00,'completed','cod','paid',NULL,'2026-09-07 17:00:00',NULL,'2026-09-06 17:00:00','2026-09-06 17:00:00'),(8,3,'INV-20260916-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',239000.00,0.00,239000.00,'completed','cod','paid',NULL,'2026-09-16 17:00:00',NULL,'2026-09-15 17:00:00','2026-09-15 17:00:00'),(9,2,'INV-20261004-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',310000.00,0.00,310000.00,'completed','cod','paid',NULL,'2026-10-04 17:00:00',NULL,'2026-10-03 17:00:00','2026-10-03 17:00:00'),(10,3,'INV-20261019-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',365000.00,0.00,365000.00,'completed','cod','paid',NULL,'2026-10-19 17:00:00',NULL,'2026-10-18 17:00:00','2026-10-18 17:00:00'),(11,3,'INV-20261103-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',236000.00,0.00,236000.00,'completed','cod','paid',NULL,'2026-11-03 17:00:00',NULL,'2026-11-02 17:00:00','2026-11-02 17:00:00'),(12,2,'INV-20261109-0001','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',198000.00,0.00,198000.00,'shipped','cod','paid',NULL,'2026-11-09 17:00:00',NULL,'2026-11-08 17:00:00','2026-11-08 17:00:00'),(13,3,'INV-20261112-0001','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',273000.00,0.00,273000.00,'processing','cod','paid',NULL,'2026-11-13 11:29:22',NULL,'2026-11-12 11:29:22','2026-11-12 11:29:22'),(14,3,'INV-20261112-0002','Siti Aminah','081377788899','Jl. Diponegoro No. 12, Surabaya',175000.00,0.00,175000.00,'pending','cod','unpaid',NULL,NULL,NULL,'2026-11-12 11:29:23','2026-11-12 11:29:23'),(15,2,'INV-20261112-0003','Budi Santoso','081298765432','Jl. Sudirman No. 45, Bandung',294000.00,0.00,294000.00,'pending','cod','unpaid',NULL,NULL,NULL,'2026-11-12 11:29:23','2026-11-12 11:29:23');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
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

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
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

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'Administrator','admin@booknest.test',NULL,'$2y$12$LemtEY.i9ZGa0xXEptq0u.biTWQfERVWIVssNT3akraydRepiCUVa','admin','081234567890','Jl. Merdeka No. 1, Jakarta',NULL,'2026-11-13 11:29:18','2026-11-13 11:29:18'),(2,'Budi Santoso','user@booknest.test',NULL,'$2y$12$IAv1PFnGor6YhU4a/B8ZBOzjSsxSqKH2maYyy7tKwmGrQqnICHwza','user','081298765432','Jl. Sudirman No. 45, Bandung',NULL,'2026-11-13 11:29:19','2026-11-13 11:29:19'),(3,'Siti Aminah','siti@booknest.test',NULL,'$2y$12$RcQrGQTH3SnuqfFmfzvQ.eTQ3Pv8UD8EZ/eD8tG6rUI1CVZtweZSq','user','081377788899','Jl. Diponegoro No. 12, Surabaya',NULL,'2026-11-13 11:29:19','2026-11-13 11:29:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bookstore_bnsp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-11-14  1:29:31
