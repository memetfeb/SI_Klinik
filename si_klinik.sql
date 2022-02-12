-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 04:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_09_144002_create_pegawai_table', 1),
(6, '2022_02_09_144055_create_wilayah_table', 1),
(7, '2022_02_11_131108_create_tindakan_table', 2),
(8, '2022_02_11_131411_create_obat_table', 2),
(9, '2022_02_12_063317_create_transaksi_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_obat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `biaya`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', 12000, NULL, NULL),
(2, 'Calsium Lactate', 15000, NULL, NULL),
(3, 'Bodrexin', 1200, '2022-02-11 06:56:23', '2022-02-11 06:56:49'),
(4, 'Asam Borat Tetes Telinga', 45000, '2022-02-12 04:59:10', '2022-02-12 04:59:10'),
(5, 'Paramex', 5000, '2022-02-12 04:57:27', '2022-02-12 04:57:27'),
(6, 'Panadol', 2000, '2022-02-12 04:57:42', '2022-02-12 04:57:42'),
(7, 'Guaifenesin', 20000, '2022-02-12 04:58:00', '2022-02-12 04:58:00'),
(8, 'Glimepiride', 23389, '2022-02-12 04:58:21', '2022-02-12 04:58:21'),
(9, 'Abacavir', 20900, '2022-02-12 04:58:40', '2022-02-12 04:58:40'),
(10, 'Allylestrenol', 50000, '2022-02-12 04:58:51', '2022-02-12 04:58:51'),
(11, 'Fungiderm', 20000, '2022-02-12 04:59:20', '2022-02-12 04:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NIP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_wilayah` int(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `NIP`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `id_wilayah`, `created_at`, `updated_at`) VALUES
(12, '123444444', 'admin Gondang', 'Sleman', '1984-06-15', 'jalan kaki kuy', 2, '2022-02-11 21:30:35', '2022-02-12 05:30:54'),
(13, '123456789', 'Admin Bulusan', 'Semarang', '2022-02-10', 'Jalan Joko', 3, '2022-02-11 21:33:05', '2022-02-12 05:31:22'),
(17, '1111112222', 'Admin Mulawarman', 'Semarang', '2022-02-07', 'jalan susilo', 5, '2022-02-11 21:37:44', '2022-02-12 05:31:48'),
(18, '9999999', 'Admin SumurBoto', 'Semarang', '2017-02-02', 'Jalan suroso', 4, '2022-02-11 21:40:33', '2022-02-12 05:30:26'),
(20, '9090909090', 'Admin Tembalang', 'Semarang', '2022-02-06', 'Tembalang', 1, '2022-02-12 03:18:15', '2022-02-12 03:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tindakan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id`, `nama_tindakan`, `biaya`, `created_at`, `updated_at`) VALUES
(1, 'Pengecekan Darah', 55000, NULL, '2022-02-11 18:37:12'),
(2, 'Konsultasi Dokter', 40000, NULL, NULL),
(3, 'Scaling Gigi', 100000, '2022-02-11 06:57:05', '2022-02-11 06:57:05'),
(4, 'Surat Keterangan Sehat', 99500, '2022-02-12 05:24:55', '2022-02-12 05:24:55'),
(5, 'Swab Antigen', 99000, '2022-02-12 04:52:50', '2022-02-12 04:52:50'),
(6, 'Swab PCR', 500000, '2022-02-12 04:53:07', '2022-02-12 04:53:07'),
(7, 'Cek Gula Darah', 45000, '2022-02-12 04:53:46', '2022-02-12 04:53:46'),
(8, 'Pembersihan Karang Gigi', 120000, '2022-02-12 04:54:59', '2022-02-12 04:54:59'),
(9, 'Vaksinasi', 20000, '2022-02-12 04:55:30', '2022-02-12 04:55:30'),
(10, 'Sunat', 300000, '2022-02-12 04:56:19', '2022-02-12 04:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NIK_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir_pasien` date NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_wilayah` int(20) UNSIGNED DEFAULT NULL,
  `id_tindakan` bigint(20) UNSIGNED DEFAULT NULL,
  `id_obat` bigint(20) UNSIGNED DEFAULT NULL,
  `total_biaya` int(11) DEFAULT NULL,
  `update_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status_transaksi` enum('butuh_tindakan','butuh_pembayaran','Lunas/Selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'butuh_tindakan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `NIK_pasien`, `nama_pasien`, `tanggal_lahir_pasien`, `tanggal_pendaftaran`, `keluhan`, `id_wilayah`, `id_tindakan`, `id_obat`, `total_biaya`, `update_by`, `status_transaksi`, `created_at`, `updated_at`) VALUES
(1, '123123', 'Mbah Marijhunaaw', '2001-04-14', '2022-02-12', 'Sakit pinggang', 3, 2, 2, 55000, 8, 'Lunas/Selesai', '2022-02-12 06:51:08', '2022-02-12 02:18:52'),
(2, '11222111', 'Suroso', '2022-02-10', '2022-02-12', 'sakit punggung', 2, 1, 2, 70000, 8, 'butuh_pembayaran', '2022-02-12 00:33:20', '2022-02-12 02:09:23'),
(4, '213123', 'Pasien Tembalang 1', '2022-02-01', '2022-02-12', 'Sakit dada', 1, NULL, NULL, 0, NULL, 'butuh_tindakan', '2022-02-12 04:37:30', '2022-02-12 04:37:30'),
(1015, '2270594', 'Lucy Duncan', '1938-09-06', '2022-02-09', 'Nunc mauris elit, dictum eu,', 3, 8, 6, 71485, NULL, 'Lunas/Selesai', NULL, NULL),
(1016, '7236898', 'Rhoda Blackwell', '1934-04-30', '2021-02-05', 'vehicula risus. Nulla eget metus', 3, 10, 6, 31617, NULL, 'Lunas/Selesai', NULL, NULL),
(1017, '6597375', 'Hedda Walton', '1939-03-08', '2021-02-07', 'natoque penatibus et magnis dis', 5, 6, 5, 35979, NULL, 'Lunas/Selesai', NULL, NULL),
(1018, '9594404', 'Nero Austin', '1996-08-17', '2021-05-28', 'metus. In nec orci. Donec', 4, 7, 11, 49955, NULL, 'Lunas/Selesai', NULL, NULL),
(1019, '9069467', 'Karly Lee', '1940-10-08', '2021-09-04', 'Nulla dignissim. Maecenas ornare egestas', 3, 5, 1, 82271, NULL, 'Lunas/Selesai', NULL, NULL),
(1020, '7032368', 'Cadman Franco', '1946-04-06', '2021-03-14', 'molestie dapibus ligula. Aliquam erat', 4, 5, 9, 8424, NULL, 'Lunas/Selesai', NULL, NULL),
(1021, '9933386', 'Gage Nieves', '1961-09-16', '2021-09-07', 'lacus. Quisque imperdiet, erat nonummy', 2, 8, 4, 31524, NULL, 'Lunas/Selesai', NULL, NULL),
(1022, '2228286', 'Felix Hays', '1968-12-28', '2021-06-23', 'Donec nibh. Quisque nonummy ipsum', 3, 4, 8, 25115, NULL, 'Lunas/Selesai', NULL, NULL),
(1023, '4938040', 'Elliott Blake', '2015-10-11', '2021-09-22', 'nisl. Nulla eu neque pellentesque', 3, 4, 10, 37207, NULL, 'Lunas/Selesai', NULL, NULL),
(1024, '4049908', 'Benjamin Garner', '1999-06-08', '2022-01-17', 'dolor. Fusce mi lorem, vehicula', 2, 2, 3, 36641, NULL, 'Lunas/Selesai', NULL, NULL),
(1025, '9831221', 'Alyssa Clayton', '2002-08-17', '2021-01-28', 'pede. Suspendisse dui. Fusce diam', 2, 9, 9, 48496, NULL, 'Lunas/Selesai', NULL, NULL),
(1026, '6315280', 'Charlotte Woods', '1997-12-01', '2021-10-06', 'adipiscing ligula. Aenean gravida nunc', 2, 3, 10, 55466, NULL, 'Lunas/Selesai', NULL, NULL),
(1027, '8748585', 'Jackson Watkins', '2011-04-06', '2021-04-30', 'dis parturient montes, nascetur ridiculus', 1, 6, 3, 40976, NULL, 'Lunas/Selesai', NULL, NULL),
(1028, '3623170', 'Hammett Hull', '1946-12-24', '2022-01-06', 'netus et malesuada fames ac', 2, 4, 10, 44042, NULL, 'Lunas/Selesai', NULL, NULL),
(1029, '4109223', 'Ulysses Todd', '1951-10-29', '2021-10-15', 'scelerisque mollis. Phasellus libero mauris,', 3, 3, 2, 81594, NULL, 'Lunas/Selesai', NULL, NULL),
(1030, '8117190', 'Dominique Leblanc', '1960-02-25', '2021-01-23', 'luctus vulputate, nisi sem semper', 4, 1, 4, 44508, NULL, 'Lunas/Selesai', NULL, NULL),
(1031, '2331511', 'Amaya Sanders', '1964-10-30', '2021-01-14', 'rhoncus. Donec est. Nunc ullamcorper,', 2, 9, 3, 44117, NULL, 'Lunas/Selesai', NULL, NULL),
(1032, '4885942', 'Hashim Olson', '1966-06-19', '2021-05-28', 'odio. Aliquam vulputate ullamcorper magna.', 4, 2, 6, 93551, NULL, 'Lunas/Selesai', NULL, NULL),
(1033, '4244768', 'Ashely Roy', '1974-01-04', '2021-10-02', 'tristique pharetra. Quisque ac libero', 1, 1, 7, 64357, NULL, 'Lunas/Selesai', NULL, NULL),
(1034, '5259901', 'Bert Kane', '1971-05-24', '2021-06-12', 'Suspendisse aliquet, sem ut cursus', 1, 3, 11, 27099, NULL, 'Lunas/Selesai', NULL, NULL),
(1035, '7424593', 'Nathaniel Joseph', '2011-08-06', '2022-01-04', 'posuere, enim nisl elementum purus,', 3, 6, 6, 89505, NULL, 'Lunas/Selesai', NULL, NULL),
(1036, '1802204', 'Leila Edwards', '2011-03-15', '2021-07-26', 'a neque. Nullam ut nisi', 5, 3, 3, 8105, NULL, 'Lunas/Selesai', NULL, NULL),
(1037, '4543663', 'Echo Glass', '1937-06-22', '2021-06-12', 'eu, accumsan sed, facilisis vitae,', 1, 9, 9, 70952, NULL, 'Lunas/Selesai', NULL, NULL),
(1038, '9387046', 'Dexter Johns', '1940-04-30', '2021-08-29', 'leo. Cras vehicula aliquet libero.', 2, 5, 11, 42854, NULL, 'Lunas/Selesai', NULL, NULL),
(1039, '3709053', 'Natalie Calhoun', '1978-12-09', '2021-08-30', 'egestas. Fusce aliquet magna a', 3, 10, 1, 23686, NULL, 'Lunas/Selesai', NULL, NULL),
(1040, '4888116', 'Diana Roberts', '1967-11-17', '2021-03-20', 'tellus, imperdiet non, vestibulum nec,', 3, 8, 2, 59558, NULL, 'Lunas/Selesai', NULL, NULL),
(1041, '3609901', 'Emma Stephens', '1974-04-20', '2022-02-05', 'diam. Proin dolor. Nulla semper', 3, 3, 5, 93207, NULL, 'Lunas/Selesai', NULL, NULL),
(1042, '7464822', 'Elizabeth Moran', '1976-04-18', '2021-12-21', 'sed turpis nec mauris blandit', 2, 9, 1, 29801, NULL, 'Lunas/Selesai', NULL, NULL),
(1043, '4662421', 'Magee Vincent', '1973-06-27', '2021-08-20', 'nisl. Quisque fringilla euismod enim.', 4, 4, 7, 15366, NULL, 'Lunas/Selesai', NULL, NULL),
(1044, '8683787', 'Gary Browning', '2004-03-17', '2021-04-23', 'mauris sagittis placerat. Cras dictum', 4, 5, 6, 50786, NULL, 'Lunas/Selesai', NULL, NULL),
(1045, '2556280', 'Aquila Bender', '1978-07-20', '2021-11-18', 'vel pede blandit congue. In', 3, 9, 3, 39413, NULL, 'Lunas/Selesai', NULL, NULL),
(1046, '7415006', 'Elliott Hopper', '1946-09-24', '2021-01-17', 'Aenean sed pede nec ante', 2, 9, 10, 49493, NULL, 'Lunas/Selesai', NULL, NULL),
(1047, '4837153', 'Gillian Sandoval', '1995-08-10', '2021-04-11', 'commodo hendrerit. Donec porttitor tellus', 4, 2, 10, 27404, NULL, 'Lunas/Selesai', NULL, NULL),
(1048, '6587280', 'Aphrodite Stephenson', '2014-11-23', '2021-07-26', 'vehicula. Pellentesque tincidunt tempus risus.', 5, 1, 3, 63771, NULL, 'Lunas/Selesai', NULL, NULL),
(1049, '5653194', 'Vivian Barker', '1946-02-01', '2021-09-24', 'Quisque imperdiet, erat nonummy ultricies', 3, 9, 10, 47375, NULL, 'Lunas/Selesai', NULL, NULL),
(1050, '5014428', 'Althea Castaneda', '1952-01-05', '2021-03-12', 'Donec luctus aliquet odio. Etiam', 4, 7, 8, 54281, NULL, 'Lunas/Selesai', NULL, NULL),
(1051, '1189022', 'Pascale George', '1951-03-31', '2022-01-09', 'Cum sociis natoque penatibus et', 2, 7, 7, 26689, NULL, 'Lunas/Selesai', NULL, NULL),
(1052, '4441636', 'Echo Sawyer', '1952-06-25', '2021-12-03', 'feugiat metus sit amet ante.', 4, 3, 6, 96193, NULL, 'Lunas/Selesai', NULL, NULL),
(1053, '3524353', 'Alexis Schroeder', '1935-10-27', '2021-03-13', 'sed libero. Proin sed turpis', 3, 6, 9, 88977, NULL, 'Lunas/Selesai', NULL, NULL),
(1054, '9279984', 'Ignatius Burns', '2001-04-03', '2021-12-30', 'vitae dolor. Donec fringilla. Donec', 4, 7, 10, 88301, NULL, 'Lunas/Selesai', NULL, NULL),
(1055, '5118718', 'Cairo Kelley', '1948-03-01', '2021-05-28', 'consequat purus. Maecenas libero est,', 1, 7, 4, 8189, NULL, 'Lunas/Selesai', NULL, NULL),
(1056, '8859361', 'Quon Franks', '1993-03-11', '2022-01-31', 'in, cursus et, eros. Proin', 3, 8, 9, 67172, NULL, 'Lunas/Selesai', NULL, NULL),
(1057, '6818384', 'Omar Duncan', '2015-05-12', '2021-12-17', 'tortor at risus. Nunc ac', 1, 10, 3, 54197, NULL, 'Lunas/Selesai', NULL, NULL),
(1058, '4002591', 'Neil Byrd', '2017-09-30', '2022-01-20', 'magna, malesuada vel, convallis in,', 1, 5, 8, 49982, NULL, 'Lunas/Selesai', NULL, NULL),
(1059, '7816633', 'Grace Bennett', '1947-12-20', '2021-04-16', 'lacus, varius et, euismod et,', 4, 6, 5, 12389, NULL, 'Lunas/Selesai', NULL, NULL),
(1060, '2586150', 'Rahim Rice', '1972-07-31', '2021-08-03', 'risus. Quisque libero lacus, varius', 4, 6, 8, 76667, NULL, 'Lunas/Selesai', NULL, NULL),
(1061, '7295598', 'Jack Case', '1961-07-11', '2021-07-06', 'eu sem. Pellentesque ut ipsum', 4, 1, 2, 84833, NULL, 'Lunas/Selesai', NULL, NULL),
(1062, '5766726', 'Eric Webb', '1990-11-25', '2021-04-09', 'mollis vitae, posuere at, velit.', 3, 6, 1, 61031, NULL, 'Lunas/Selesai', NULL, NULL),
(1063, '7284817', 'Elvis Long', '2018-08-22', '2022-01-11', 'eu sem. Pellentesque ut ipsum', 2, 3, 10, 25961, NULL, 'Lunas/Selesai', NULL, NULL),
(1064, '4351839', 'Carlos Wheeler', '1973-11-29', '2021-09-18', 'netus et malesuada fames ac', 4, 5, 10, 68189, NULL, 'Lunas/Selesai', NULL, NULL),
(1065, '4594596', 'Violet Parker', '1936-11-05', '2021-12-23', 'arcu. Vestibulum ante ipsum primis', 3, 4, 2, 48964, NULL, 'Lunas/Selesai', NULL, NULL),
(1066, '6388588', 'Constance Cooke', '2000-07-16', '2021-06-13', 'sagittis. Nullam vitae diam. Proin', 5, 4, 4, 82510, NULL, 'Lunas/Selesai', NULL, NULL),
(1067, '9220735', 'Tana Duffy', '1948-03-20', '2021-09-25', 'elit elit fermentum risus, at', 4, 10, 9, 25285, NULL, 'Lunas/Selesai', NULL, NULL),
(1068, '3966347', 'Talon Gould', '1964-08-10', '2021-01-08', 'consectetuer ipsum nunc id enim.', 3, 9, 7, 17163, NULL, 'Lunas/Selesai', NULL, NULL),
(1069, '6345571', 'Mechelle Wilcox', '2019-11-20', '2021-11-22', 'amet ornare lectus justo eu', 2, 4, 6, 95097, NULL, 'Lunas/Selesai', NULL, NULL),
(1070, '2154677', 'Emmanuel Craft', '1949-06-05', '2021-01-28', 'Quisque ac libero nec ligula', 3, 4, 4, 87893, NULL, 'Lunas/Selesai', NULL, NULL),
(1071, '4509347', 'Signe Singleton', '1979-04-10', '2021-02-21', 'purus. Duis elementum, dui quis', 3, 3, 3, 77767, NULL, 'Lunas/Selesai', NULL, NULL),
(1072, '5022116', 'George Perkins', '1947-09-01', '2022-01-29', 'sed consequat auctor, nunc nulla', 4, 6, 6, 55556, NULL, 'Lunas/Selesai', NULL, NULL),
(1073, '8477661', 'Phoebe Vinson', '1958-06-09', '2021-09-02', 'Cras dolor dolor, tempus non,', 1, 7, 5, 17215, NULL, 'Lunas/Selesai', NULL, NULL),
(1074, '3494139', 'Raja Atkinson', '1934-03-06', '2022-02-06', 'Suspendisse sagittis. Nullam vitae diam.', 2, 2, 2, 26167, NULL, 'Lunas/Selesai', NULL, NULL),
(1075, '3568939', 'Kelly Whitney', '1973-07-19', '2021-03-16', 'conubia nostra, per inceptos hymenaeos.', 2, 4, 4, 13906, NULL, 'Lunas/Selesai', NULL, NULL),
(1076, '9661103', 'Marshall Weeks', '1974-04-08', '2021-08-18', 'odio semper cursus. Integer mollis.', 4, 1, 5, 89745, NULL, 'Lunas/Selesai', NULL, NULL),
(1077, '9934140', 'Chester Dale', '2001-04-03', '2021-11-24', 'diam. Sed diam lorem, auctor', 2, 4, 8, 67000, NULL, 'Lunas/Selesai', NULL, NULL),
(1078, '5644514', 'Kadeem Alford', '1941-08-02', '2021-07-16', 'cursus et, magna. Praesent interdum', 2, 2, 6, 25206, NULL, 'Lunas/Selesai', NULL, NULL),
(1079, '7782191', 'Molly Robles', '1945-05-07', '2022-01-02', 'sed turpis nec mauris blandit', 4, 2, 4, 31164, NULL, 'Lunas/Selesai', NULL, NULL),
(1080, '9796475', 'Wallace Cleveland', '1967-05-14', '2021-06-17', 'sodales. Mauris blandit enim consequat', 4, 7, 10, 55437, NULL, 'Lunas/Selesai', NULL, NULL),
(1081, '9031558', 'Holmes Graham', '1978-10-22', '2021-03-14', 'adipiscing fringilla, porttitor vulputate, posuere', 2, 8, 9, 31974, NULL, 'Lunas/Selesai', NULL, NULL),
(1082, '6433973', 'Giacomo Delaney', '1972-03-10', '2021-05-17', 'sem molestie sodales. Mauris blandit', 4, 8, 7, 80147, NULL, 'Lunas/Selesai', NULL, NULL),
(1083, '4627754', 'Hayes Norman', '2015-03-19', '2021-03-08', 'risus. Nulla eget metus eu', 4, 8, 10, 27877, NULL, 'Lunas/Selesai', NULL, NULL),
(1084, '6388593', 'Clark Bond', '2006-03-25', '2021-03-04', 'metus. Aenean sed pede nec', 4, 8, 5, 27848, NULL, 'Lunas/Selesai', NULL, NULL),
(1085, '5026595', 'Randall Moses', '1983-10-02', '2021-10-03', 'orci tincidunt adipiscing. Mauris molestie', 2, 3, 9, 76012, NULL, 'Lunas/Selesai', NULL, NULL),
(1086, '6248401', 'Megan Rojas', '2015-07-24', '2021-08-31', 'enim, condimentum eget, volutpat ornare,', 4, 6, 1, 36933, NULL, 'Lunas/Selesai', NULL, NULL),
(1087, '8838049', 'Zane Beasley', '2018-04-07', '2021-02-17', 'non lorem vitae odio sagittis', 2, 3, 4, 24949, NULL, 'Lunas/Selesai', NULL, NULL),
(1088, '2315877', 'Amal Hurst', '1962-02-07', '2021-04-14', 'Quisque purus sapien, gravida non,', 3, 1, 11, 66323, NULL, 'Lunas/Selesai', NULL, NULL),
(1089, '1928307', 'Kevin Hart', '1972-01-02', '2021-06-25', 'Duis risus odio, auctor vitae,', 3, 4, 10, 53770, NULL, 'Lunas/Selesai', NULL, NULL),
(1090, '1506094', 'Melyssa Hood', '1984-03-29', '2021-03-22', 'quis, tristique ac, eleifend vitae,', 3, 5, 6, 24127, NULL, 'Lunas/Selesai', NULL, NULL),
(1091, '9759793', 'Orlando Steele', '1970-08-01', '2021-07-16', 'diam lorem, auctor quis, tristique', 2, 4, 9, 20824, NULL, 'Lunas/Selesai', NULL, NULL),
(1092, '4129453', 'Ima Vazquez', '1944-09-03', '2021-01-30', 'Praesent eu nulla at sem', 5, 7, 5, 74616, NULL, 'Lunas/Selesai', NULL, NULL),
(1093, '7343760', 'Eleanor Branch', '2002-12-14', '2021-04-06', 'primis in faucibus orci luctus', 3, 2, 2, 29569, NULL, 'Lunas/Selesai', NULL, NULL),
(1094, '8231698', 'Adena Forbes', '2012-03-03', '2021-01-25', 'enim, sit amet ornare lectus', 3, 2, 4, 99109, NULL, 'Lunas/Selesai', NULL, NULL),
(1095, '9600644', 'Stella Nash', '2002-07-13', '2021-04-30', 'natoque penatibus et magnis dis', 4, 7, 4, 76523, NULL, 'Lunas/Selesai', NULL, NULL),
(1096, '9490960', 'Curran Gutierrez', '1982-01-22', '2021-04-20', 'Curabitur vel lectus. Cum sociis', 3, 7, 9, 78340, NULL, 'Lunas/Selesai', NULL, NULL),
(1097, '5344892', 'Susan Espinoza', '2018-04-30', '2021-10-31', 'orci, in consequat enim diam', 3, 6, 9, 85046, NULL, 'Lunas/Selesai', NULL, NULL),
(1098, '7506097', 'Raymond Duran', '2015-11-02', '2021-02-12', 'varius. Nam porttitor scelerisque neque.', 2, 3, 4, 84614, NULL, 'Lunas/Selesai', NULL, NULL),
(1099, '8024851', 'MacKensie Sheppard', '1945-12-28', '2021-02-15', 'dictum sapien. Aenean massa. Integer', 3, 7, 7, 38588, NULL, 'Lunas/Selesai', NULL, NULL),
(1100, '8004878', 'Megan Montoya', '1976-09-11', '2021-11-12', 'neque pellentesque massa lobortis ultrices.', 2, 9, 11, 11402, NULL, 'Lunas/Selesai', NULL, NULL),
(1101, '2122442', 'Griffin Newton', '1974-12-06', '2021-07-27', 'consectetuer adipiscing elit. Aliquam auctor,', 2, 4, 6, 65709, NULL, 'Lunas/Selesai', NULL, NULL),
(1102, '3791550', 'Jermaine Lyons', '1997-07-28', '2021-04-07', 'Morbi accumsan laoreet ipsum. Curabitur', 3, 7, 4, 36410, NULL, 'Lunas/Selesai', NULL, NULL),
(1103, '8301724', 'Chadwick Booth', '2019-12-05', '2021-03-15', 'non dui nec urna suscipit', 5, 6, 6, 7727, NULL, 'Lunas/Selesai', NULL, NULL),
(1104, '5202843', 'Zelenia Bright', '1972-08-30', '2021-07-19', 'mus. Donec dignissim magna a', 4, 6, 9, 16999, NULL, 'Lunas/Selesai', NULL, NULL),
(1105, '5337317', 'Troy Owen', '1954-05-24', '2021-11-20', 'ligula elit, pretium et, rutrum', 4, 9, 6, 84950, NULL, 'Lunas/Selesai', NULL, NULL),
(1106, '7216405', 'Sylvia Cline', '2006-12-31', '2021-07-23', 'vitae diam. Proin dolor. Nulla', 5, 6, 3, 6612, NULL, 'Lunas/Selesai', NULL, NULL),
(1107, '2168636', 'Melyssa Dillon', '1965-03-25', '2021-11-16', 'Pellentesque ultricies dignissim lacus. Aliquam', 5, 7, 2, 20637, NULL, 'Lunas/Selesai', NULL, NULL),
(1108, '5695892', 'Alma Terry', '1935-05-11', '2021-12-02', 'elementum, dui quis accumsan convallis,', 2, 3, 10, 15354, NULL, 'Lunas/Selesai', NULL, NULL),
(1109, '1444120', 'Dylan Cantrell', '1963-02-17', '2021-10-12', 'sed libero. Proin sed turpis', 3, 10, 6, 81755, NULL, 'Lunas/Selesai', NULL, NULL),
(1110, '6579423', 'Yoshi Harrison', '1979-12-01', '2021-09-14', 'Suspendisse tristique neque venenatis lacus.', 4, 4, 4, 81524, NULL, 'Lunas/Selesai', NULL, NULL),
(1111, '8968590', 'MacKenzie Hudson', '1977-05-22', '2021-03-24', 'luctus lobortis. Class aptent taciti', 4, 6, 11, 69660, NULL, 'Lunas/Selesai', NULL, NULL),
(1112, '3997470', 'Myra Copeland', '1989-01-13', '2021-10-13', 'Nulla tincidunt, neque vitae semper', 2, 3, 9, 13987, NULL, 'Lunas/Selesai', NULL, NULL),
(1113, '6143215', 'Savannah Riley', '1974-03-13', '2021-10-12', 'sit amet ante. Vivamus non', 2, 6, 9, 64107, NULL, 'Lunas/Selesai', NULL, NULL),
(1114, '6887846', 'Tatiana Leach', '1942-04-04', '2021-12-06', 'dolor, nonummy ac, feugiat non,', 5, 2, 1, 70619, NULL, 'Lunas/Selesai', NULL, NULL),
(1115, '5353361', 'Karly Miles', '1970-12-23', '2021-08-24', 'lacus. Quisque purus sapien, gravida', 2, 8, 6, 6904, NULL, 'Lunas/Selesai', NULL, NULL),
(1116, '6458481', 'Nadine Blanchard', '1978-07-05', '2021-08-12', 'Ut tincidunt orci quis lectus.', 4, 5, 2, 94331, NULL, 'Lunas/Selesai', NULL, NULL),
(1117, '9475696', 'Katelyn Wood', '1961-08-21', '2021-08-31', 'arcu eu odio tristique pharetra.', 1, 8, 5, 16491, NULL, 'Lunas/Selesai', NULL, NULL),
(1118, '4770053', 'Tamekah Molina', '1995-11-27', '2021-10-28', 'velit. Quisque varius. Nam porttitor', 2, 6, 8, 93281, NULL, 'Lunas/Selesai', NULL, NULL),
(1119, '6736713', 'Quentin Hunt', '1999-09-29', '2021-06-14', 'id, blandit at, nisi. Cum', 2, 6, 2, 30684, NULL, 'Lunas/Selesai', NULL, NULL),
(1120, '3256304', 'Faith Lopez', '1938-02-28', '2022-01-12', 'sed orci lobortis augue scelerisque', 3, 9, 3, 57149, NULL, 'Lunas/Selesai', NULL, NULL),
(1121, '6380986', 'Ali Stephenson', '2000-04-13', '2021-05-29', 'aliquet lobortis, nisi nibh lacinia', 2, 2, 1, 78393, NULL, 'Lunas/Selesai', NULL, NULL),
(1122, '4635728', 'Cora Kennedy', '1997-12-19', '2021-12-22', 'sit amet ornare lectus justo', 1, 3, 9, 84196, NULL, 'Lunas/Selesai', NULL, NULL),
(1123, '8146522', 'Samson Smith', '2015-06-12', '2021-12-18', 'tincidunt aliquam arcu. Aliquam ultrices', 4, 3, 9, 25181, NULL, 'Lunas/Selesai', NULL, NULL),
(1124, '9747013', 'Cameron Cantrell', '1982-03-27', '2021-09-24', 'placerat. Cras dictum ultricies ligula.', 4, 9, 8, 40516, NULL, 'Lunas/Selesai', NULL, NULL),
(1125, '6824501', 'Quinn Mckee', '2012-01-20', '2021-08-11', 'lectus justo eu arcu. Morbi', 4, 5, 2, 48128, NULL, 'Lunas/Selesai', NULL, NULL),
(1126, '7853192', 'Germane Stevenson', '2015-02-03', '2021-09-09', 'neque non quam. Pellentesque habitant', 4, 1, 4, 28784, NULL, 'Lunas/Selesai', NULL, NULL),
(1127, '9755899', 'Jonas Wiggins', '1935-09-17', '2022-01-19', 'pede. Cum sociis natoque penatibus', 4, 4, 9, 85573, NULL, 'Lunas/Selesai', NULL, NULL),
(1128, '2245539', 'Samuel Turner', '1984-07-11', '2021-06-27', 'ante, iaculis nec, eleifend non,', 2, 8, 7, 92891, NULL, 'Lunas/Selesai', NULL, NULL),
(1129, '6194330', 'Germane Christian', '1941-04-29', '2021-02-26', 'In ornare sagittis felis. Donec', 2, 7, 9, 62800, NULL, 'Lunas/Selesai', NULL, NULL),
(1130, '4531118', 'Yvette Joyner', '2009-11-03', '2021-03-17', 'lacinia orci, consectetuer euismod est', 1, 6, 6, 65567, NULL, 'Lunas/Selesai', NULL, NULL),
(1131, '7217456', 'Hector Landry', '1959-04-14', '2021-09-27', 'lectus convallis est, vitae sodales', 4, 3, 10, 11772, NULL, 'Lunas/Selesai', NULL, NULL),
(1132, '5781512', 'Thomas Bolton', '1988-08-26', '2021-07-31', 'sem, consequat nec, mollis vitae,', 3, 2, 7, 86746, NULL, 'Lunas/Selesai', NULL, NULL),
(1133, '8502706', 'Willow Holmes', '1967-02-17', '2022-01-11', 'consequat dolor vitae dolor. Donec', 2, 3, 8, 49154, NULL, 'Lunas/Selesai', NULL, NULL),
(1134, '9418608', 'Xavier Wade', '1953-10-18', '2021-07-04', 'non quam. Pellentesque habitant morbi', 4, 4, 6, 15194, NULL, 'Lunas/Selesai', NULL, NULL),
(1135, '1300871', 'Magee Bailey', '1984-08-12', '2021-03-15', 'ut eros non enim commodo', 3, 10, 8, 14241, NULL, 'Lunas/Selesai', NULL, NULL),
(1136, '1805080', 'Porter Sosa', '1991-06-18', '2021-02-01', 'lectus. Cum sociis natoque penatibus', 2, 4, 7, 96716, NULL, 'Lunas/Selesai', NULL, NULL),
(1137, '1214049', 'Deirdre Calhoun', '1970-04-28', '2021-12-30', 'ultrices posuere cubilia Curae Phasellus', 3, 7, 5, 72647, NULL, 'Lunas/Selesai', NULL, NULL),
(1138, '3484602', 'Stacey Riley', '1939-11-11', '2021-07-05', 'lacinia mattis. Integer eu lacus.', 4, 1, 9, 48222, NULL, 'Lunas/Selesai', NULL, NULL),
(1139, '6291523', 'Colby Daniels', '1989-09-06', '2021-10-26', 'id, mollis nec, cursus a,', 4, 6, 4, 77641, NULL, 'Lunas/Selesai', NULL, NULL),
(1140, '2772721', 'Logan Trujillo', '1941-05-28', '2021-04-12', 'eleifend vitae, erat. Vivamus nisi.', 2, 5, 11, 94989, NULL, 'Lunas/Selesai', NULL, NULL),
(1141, '3174694', 'Shoshana Talley', '1946-03-22', '2022-01-08', 'vulputate ullamcorper magna. Sed eu', 5, 6, 5, 39881, NULL, 'Lunas/Selesai', NULL, NULL),
(1142, '4845874', 'William Leon', '1943-03-27', '2021-01-07', 'neque non quam. Pellentesque habitant', 4, 2, 7, 8416, NULL, 'Lunas/Selesai', NULL, NULL),
(1143, '8569896', 'Freya Gregory', '1940-03-10', '2021-03-19', 'nulla. In tincidunt congue turpis.', 5, 4, 1, 57673, NULL, 'Lunas/Selesai', NULL, NULL),
(1144, '2989814', 'Oren Simon', '2002-12-11', '2021-03-09', 'Cras eget nisi dictum augue', 1, 4, 5, 69081, NULL, 'Lunas/Selesai', NULL, NULL),
(1145, '8054559', 'Dexter Holt', '1994-11-06', '2021-08-19', 'ut, molestie in, tempus eu,', 5, 5, 5, 68158, NULL, 'Lunas/Selesai', NULL, NULL),
(1146, '9282677', 'Heather Carney', '1966-06-07', '2021-02-08', 'egestas. Aliquam nec enim. Nunc', 4, 7, 11, 46606, NULL, 'Lunas/Selesai', NULL, NULL),
(1147, '3518985', 'Isadora Mayer', '1996-06-21', '2021-01-29', 'quis lectus. Nullam suscipit, est', 2, 8, 3, 26453, NULL, 'Lunas/Selesai', NULL, NULL),
(1148, '2913040', 'Steven Howe', '1999-03-22', '2021-09-30', 'dapibus id, blandit at, nisi.', 3, 2, 10, 97776, NULL, 'Lunas/Selesai', NULL, NULL),
(1149, '2193796', 'Benedict Wolfe', '2009-09-11', '2021-04-12', 'lorem, sit amet ultricies sem', 1, 1, 11, 63870, NULL, 'Lunas/Selesai', NULL, NULL),
(1150, '3229889', 'Molly Todd', '1956-02-10', '2021-03-21', 'vulputate ullamcorper magna. Sed eu', 2, 4, 6, 49474, NULL, 'Lunas/Selesai', NULL, NULL),
(1151, '2814166', 'Valentine Wilkinson', '1934-09-10', '2021-08-25', 'ornare, libero at auctor ullamcorper,', 4, 7, 3, 63140, NULL, 'Lunas/Selesai', NULL, NULL),
(1152, '2402635', 'Gwendolyn Mendez', '2012-02-17', '2021-06-25', 'volutpat nunc sit amet metus.', 1, 4, 3, 52996, NULL, 'Lunas/Selesai', NULL, NULL),
(1153, '7160555', 'Anne Guthrie', '2005-03-14', '2021-10-11', 'Integer in magna. Phasellus dolor', 3, 2, 2, 27218, NULL, 'Lunas/Selesai', NULL, NULL),
(1154, '9028467', 'Marcia Oliver', '1935-03-20', '2021-12-26', 'eget massa. Suspendisse eleifend. Cras', 1, 1, 8, 10108, NULL, 'Lunas/Selesai', NULL, NULL),
(1155, '5891871', 'Brenden Vinson', '2018-09-04', '2021-03-04', 'Aliquam adipiscing lobortis risus. In', 3, 4, 7, 64641, NULL, 'Lunas/Selesai', NULL, NULL),
(1156, '7632527', 'Hammett Olsen', '1944-06-16', '2021-07-05', 'Aenean euismod mauris eu elit.', 4, 5, 8, 61820, NULL, 'Lunas/Selesai', NULL, NULL),
(1157, '3863456', 'Nissim Pearson', '1990-01-17', '2021-01-15', 'Cras lorem lorem, luctus ut,', 3, 5, 8, 17410, NULL, 'Lunas/Selesai', NULL, NULL),
(1158, '9811166', 'Cailin Tate', '1969-05-01', '2021-10-04', 'dictum. Phasellus in felis. Nulla', 3, 5, 9, 46686, NULL, 'Lunas/Selesai', NULL, NULL),
(1159, '3720829', 'MacKenzie Henderson', '1970-12-26', '2021-11-18', 'lacinia mattis. Integer eu lacus.', 5, 4, 5, 64154, NULL, 'Lunas/Selesai', NULL, NULL),
(1160, '1604967', 'Kylan Huff', '1965-12-15', '2021-12-19', 'viverra. Maecenas iaculis aliquet diam.', 2, 5, 3, 10007, NULL, 'Lunas/Selesai', NULL, NULL),
(1161, '1155119', 'Olivia Fitzpatrick', '1975-08-15', '2021-02-16', 'ac mattis ornare, lectus ante', 3, 7, 6, 62179, NULL, 'Lunas/Selesai', NULL, NULL),
(1162, '5940046', 'Jenna Randall', '2000-12-01', '2021-05-25', 'adipiscing lacus. Ut nec urna', 4, 6, 11, 6088, NULL, 'Lunas/Selesai', NULL, NULL),
(1163, '4710385', 'Mechelle Alvarez', '1947-05-02', '2021-04-23', 'quis lectus. Nullam suscipit, est', 2, 4, 2, 79174, NULL, 'Lunas/Selesai', NULL, NULL),
(1164, '5199786', 'Zephr Olson', '1986-03-14', '2021-03-15', 'purus mauris a nunc. In', 2, 2, 4, 14148, NULL, 'Lunas/Selesai', NULL, NULL),
(1165, '8985342', 'Brenda Brewer', '2017-06-18', '2021-05-28', 'fames ac turpis egestas. Aliquam', 2, 6, 10, 11620, NULL, 'Lunas/Selesai', NULL, NULL),
(1166, '2760564', 'Hollee Bridges', '1975-10-09', '2021-01-31', 'facilisis lorem tristique aliquet. Phasellus', 3, 9, 3, 31720, NULL, 'Lunas/Selesai', NULL, NULL),
(1167, '5125583', 'Simone Ochoa', '2005-11-26', '2021-11-08', 'convallis ligula. Donec luctus aliquet', 4, 5, 5, 32712, NULL, 'Lunas/Selesai', NULL, NULL),
(1168, '8053277', 'Natalie Frye', '1975-05-10', '2021-03-27', 'risus. Nulla eget metus eu', 2, 9, 2, 34289, NULL, 'Lunas/Selesai', NULL, NULL),
(1169, '3213210', 'Rebecca Carr', '1968-01-12', '2021-06-01', 'at, velit. Cras lorem lorem,', 3, 2, 2, 81730, NULL, 'Lunas/Selesai', NULL, NULL),
(1170, '5101102', 'Aristotle Velez', '1970-03-23', '2021-02-02', 'eget, volutpat ornare, facilisis eget,', 2, 6, 5, 60189, NULL, 'Lunas/Selesai', NULL, NULL),
(1171, '8069894', 'Amber Melendez', '2010-02-03', '2022-01-01', 'scelerisque, lorem ipsum sodales purus,', 3, 4, 8, 18965, NULL, 'Lunas/Selesai', NULL, NULL),
(1172, '6301169', 'Rhea Good', '1960-08-29', '2022-01-04', 'elementum, lorem ut aliquam iaculis,', 3, 4, 2, 24276, NULL, 'Lunas/Selesai', NULL, NULL),
(1173, '2514249', 'Maxwell Castillo', '1988-08-24', '2021-07-02', 'id risus quis diam luctus', 5, 4, 8, 48432, NULL, 'Lunas/Selesai', NULL, NULL),
(1174, '6447631', 'Dexter Whitehead', '1936-08-27', '2021-08-31', 'a neque. Nullam ut nisi', 4, 4, 8, 27426, NULL, 'Lunas/Selesai', NULL, NULL),
(1175, '4749198', 'Astra Vinson', '1950-11-25', '2021-01-25', 'pede, nonummy ut, molestie in,', 2, 5, 10, 76651, NULL, 'Lunas/Selesai', NULL, NULL),
(1176, '2316028', 'Logan Valdez', '2013-10-01', '2021-07-09', 'ligula consectetuer rhoncus. Nullam velit', 4, 7, 1, 30118, NULL, 'Lunas/Selesai', NULL, NULL),
(1177, '6985602', 'Jeanette Madden', '1951-11-27', '2021-12-01', 'ut, nulla. Cras eu tellus', 3, 9, 9, 22046, NULL, 'Lunas/Selesai', NULL, NULL),
(1178, '1860355', 'Kyle Dickerson', '2013-09-30', '2022-02-03', 'ornare, lectus ante dictum mi,', 2, 7, 7, 93238, NULL, 'Lunas/Selesai', NULL, NULL),
(1179, '7464177', 'Wesley Larson', '1986-11-07', '2021-12-03', 'lacus, varius et, euismod et,', 3, 2, 11, 10580, NULL, 'Lunas/Selesai', NULL, NULL),
(1180, '9513499', 'Kadeem Moon', '1980-03-22', '2021-11-06', 'ridiculus mus. Donec dignissim magna', 3, 2, 2, 44689, NULL, 'Lunas/Selesai', NULL, NULL),
(1181, '6104465', 'Cherokee Holland', '1990-03-16', '2021-06-13', 'viverra. Maecenas iaculis aliquet diam.', 4, 8, 1, 58614, NULL, 'Lunas/Selesai', NULL, NULL),
(1182, '9023973', 'Hilary Branch', '1951-12-24', '2021-04-06', 'vulputate mauris sagittis placerat. Cras', 3, 4, 3, 47666, NULL, 'Lunas/Selesai', NULL, NULL),
(1183, '4884355', 'Mia Dodson', '1962-03-28', '2021-08-21', 'ullamcorper. Duis at lacus. Quisque', 4, 5, 7, 41898, NULL, 'Lunas/Selesai', NULL, NULL),
(1184, '8846671', 'Quentin Daniel', '1996-01-15', '2021-06-15', 'et ipsum cursus vestibulum. Mauris', 2, 4, 3, 26625, NULL, 'Lunas/Selesai', NULL, NULL),
(1185, '8457273', 'Lucius Miller', '1977-05-14', '2021-01-26', 'nibh sit amet orci. Ut', 4, 3, 10, 89373, NULL, 'Lunas/Selesai', NULL, NULL),
(1186, '6355492', 'Hall Stevens', '1975-10-13', '2021-04-21', 'montes, nascetur ridiculus mus. Proin', 1, 2, 3, 13859, NULL, 'Lunas/Selesai', NULL, NULL),
(1187, '1409153', 'Amethyst Sosa', '1991-06-19', '2021-09-08', 'nisl arcu iaculis enim, sit', 2, 3, 3, 30864, NULL, 'Lunas/Selesai', NULL, NULL),
(1188, '5182714', 'Marah Stewart', '1951-02-22', '2021-11-22', 'ut ipsum ac mi eleifend', 2, 7, 9, 78101, NULL, 'Lunas/Selesai', NULL, NULL),
(1189, '3366871', 'Colby Christian', '2018-09-07', '2021-08-17', 'ultricies ligula. Nullam enim. Sed', 4, 2, 9, 78825, NULL, 'Lunas/Selesai', NULL, NULL),
(1190, '1754013', 'Amber Rojas', '1953-03-25', '2021-11-11', 'sapien, cursus in, hendrerit consectetuer,', 4, 4, 7, 78920, NULL, 'Lunas/Selesai', NULL, NULL),
(1191, '6086777', 'Rafael Ramirez', '1937-12-06', '2021-01-17', 'malesuada augue ut lacus. Nulla', 5, 7, 2, 69526, NULL, 'Lunas/Selesai', NULL, NULL),
(1192, '7325858', 'Hashim Reid', '2010-02-15', '2021-03-03', 'mi enim, condimentum eget, volutpat', 5, 6, 3, 64612, NULL, 'Lunas/Selesai', NULL, NULL),
(1193, '5560973', 'Jacob Ruiz', '1957-04-04', '2021-02-06', 'neque. Sed eget lacus. Mauris', 3, 2, 10, 81967, NULL, 'Lunas/Selesai', NULL, NULL),
(1194, '3359482', 'Sigourney White', '1968-08-18', '2021-03-12', 'Integer tincidunt aliquam arcu. Aliquam', 4, 4, 7, 63268, NULL, 'Lunas/Selesai', NULL, NULL),
(1195, '3488991', 'Gil Wood', '1960-06-17', '2021-06-19', 'ac turpis egestas. Aliquam fringilla', 4, 8, 3, 8329, NULL, 'Lunas/Selesai', NULL, NULL),
(1196, '3604846', 'Caesar Collier', '1975-07-09', '2021-02-16', 'nibh. Quisque nonummy ipsum non', 4, 7, 8, 32702, NULL, 'Lunas/Selesai', NULL, NULL),
(1197, '5628193', 'Blaze Elliott', '1982-06-26', '2021-02-15', 'dui nec urna suscipit nonummy.', 3, 6, 7, 80741, NULL, 'Lunas/Selesai', NULL, NULL),
(1198, '7794230', 'Jasper Keith', '1964-05-09', '2021-09-11', 'ligula elit, pretium et, rutrum', 1, 4, 10, 96160, NULL, 'Lunas/Selesai', NULL, NULL),
(1199, '4085963', 'Barry Carver', '2016-11-20', '2021-12-22', 'aliquam arcu. Aliquam ultrices iaculis', 3, 7, 1, 60061, NULL, 'Lunas/Selesai', NULL, NULL),
(1200, '6681620', 'Hiroko Mack', '2006-03-09', '2021-02-27', 'nec ante. Maecenas mi felis,', 3, 4, 4, 31717, NULL, 'Lunas/Selesai', NULL, NULL),
(1201, '8214365', 'Hyatt Wilkerson', '2013-04-30', '2022-02-02', 'quam a felis ullamcorper viverra.', 4, 7, 7, 65000, 1, 'butuh_tindakan', NULL, '2022-02-12 05:35:17'),
(1202, '4783217', 'Wallace Reid', '2005-04-13', '2021-08-07', 'enim diam vel arcu. Curabitur', 5, 3, 1, 84069, NULL, 'Lunas/Selesai', NULL, NULL),
(1203, '4086426', 'Belle Carrillo', '1997-02-20', '2021-09-17', 'Vestibulum ante ipsum primis in', 2, 2, 4, 21628, NULL, 'Lunas/Selesai', NULL, NULL),
(1204, '3605121', 'Tanya Johnston', '1996-09-15', '2021-07-16', 'lacus pede sagittis augue, eu', 3, 5, 8, 18045, NULL, 'Lunas/Selesai', NULL, NULL),
(1205, '1986618', 'Perry Albert', '2004-12-06', '2022-01-21', 'rutrum, justo. Praesent luctus. Curabitur', 3, 1, 2, 17329, NULL, 'Lunas/Selesai', NULL, NULL),
(1206, '5057805', 'Xavier Pittman', '1971-09-29', '2021-01-08', 'ultricies ornare, elit elit fermentum', 1, 9, 4, 28294, NULL, 'Lunas/Selesai', NULL, NULL),
(1207, '2886377', 'Denton Mays', '2002-11-08', '2021-12-25', 'natoque penatibus et magnis dis', 2, 6, 11, 45973, NULL, 'Lunas/Selesai', NULL, NULL),
(1208, '2161681', 'Oren Sweet', '2011-05-19', '2022-01-17', 'blandit congue. In scelerisque scelerisque', 4, 8, 9, 62515, NULL, 'Lunas/Selesai', NULL, NULL),
(1209, '2950176', 'Merritt Little', '2018-02-26', '2021-08-28', 'in consequat enim diam vel', 3, 9, 7, 27644, NULL, 'Lunas/Selesai', NULL, NULL),
(1210, '9620099', 'Shellie Copeland', '2009-01-23', '2021-04-04', 'euismod urna. Nullam lobortis quam', 3, 6, 3, 50075, NULL, 'Lunas/Selesai', NULL, NULL),
(1211, '9628755', 'Grady Dodson', '2004-03-09', '2021-10-08', 'vitae nibh. Donec est mauris,', 3, 6, 3, 31501, NULL, 'Lunas/Selesai', NULL, NULL),
(1212, '3429717', 'Sybill Roth', '2016-07-24', '2021-06-24', 'lacus, varius et, euismod et,', 1, 8, 8, 98718, NULL, 'Lunas/Selesai', NULL, NULL),
(1213, '3530767', 'Norman Harmon', '2003-06-01', '2021-02-04', 'porttitor vulputate, posuere vulputate, lacus.', 1, 1, 4, 71942, NULL, 'Lunas/Selesai', NULL, NULL),
(1214, '7221941', 'Medge Raymond', '1962-09-22', '2021-08-22', 'non ante bibendum ullamcorper. Duis', 2, 4, 10, 33112, NULL, 'Lunas/Selesai', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('superadmin','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_pegawai` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `id_pegawai`) VALUES
(1, 'ZuperAdmin@kliniktadikamesra.com', 'superadmin', '$2y$10$PIyPii//Veg6lGuK67Itz.bR8uw.vf8CDwAZnpwfLfKRzQcDIfSY6', NULL, NULL, NULL, NULL),
(7, 'admingondang@gmail.com', 'admin', '$2y$10$ib.WCPj0Rr0o40ImKuQBOeYuMnTbMp5AyWV6SvUDJce1EHKtEZef.', NULL, '2022-02-11 21:30:35', '2022-02-12 05:37:23', 12),
(8, 'adminbulusan@gmail.com', 'admin', '$2y$10$XB0mQWvNv9MlepAhZCjVY.f8FbxwnMLWxhRwufr5x8PO0fS.j4LLW', NULL, '2022-02-11 21:33:05', '2022-02-12 05:37:35', 13),
(9, 'adminmulawarman@gmail.com', 'admin', '$2y$10$Au2YY2VF3jAdQUZe.JFnQeRSDS1gFfBA8uRxvPJRWXTo3/VdYFjHu', NULL, '2022-02-11 21:37:45', '2022-02-12 05:37:44', 17),
(10, 'adminsumurboto@gmail.com', 'admin', '$2y$10$GLXMQnyqfgCDW98a9WspaOluY1TUstGu8SP7LJu2RLzoheoSmXn4W', NULL, '2022-02-11 21:40:33', '2022-02-12 05:37:14', 18),
(12, 'admintembalang@gmail.com', 'admin', '$2y$10$/Gwe73pr70.B8UrzU4P78.7Ubnaaoqrc0D3Q/2aYZU8ANXsGoO8D.', NULL, '2022-02-12 03:18:16', '2022-02-12 05:37:52', 20);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id` int(20) UNSIGNED NOT NULL,
  `nama_wilayah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `nama_wilayah`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Tembalang', 'Jl. Tembalang Raya No.617', NULL, NULL),
(2, 'Gondang', 'Jl. Gondang Timur 2', '2022-02-10 19:39:06', '2022-02-10 19:39:06'),
(3, 'Bulusan', 'Jl. Bulusan III No.777', '2022-02-10 19:42:03', '2022-02-10 20:36:16'),
(4, 'Sumur Boto', 'Jl. Semeru Raya No.7878', '2022-02-10 20:02:56', '2022-02-10 20:02:56'),
(5, 'Mulawarman', 'Jl. Mulawarman timur No.23', '2022-02-10 20:15:07', '2022-02-10 20:15:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawai_nip_unique` (`NIP`),
  ADD KEY `id wilayah to pegawai` (`id_wilayah`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans to wilayah` (`id_wilayah`),
  ADD KEY `trans to tindakan` (`id_tindakan`),
  ADD KEY `trans to obat` (`id_obat`),
  ADD KEY `trans to user` (`update_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id pegawai to user` (`id_pegawai`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1215;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `id wilayah to pegawai` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `trans to obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `trans to tindakan` FOREIGN KEY (`id_tindakan`) REFERENCES `tindakan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `trans to user` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `trans to wilayah` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `id pegawai to user` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
