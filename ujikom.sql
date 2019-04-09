-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 09 Apr 2019 pada 08.28
-- Versi Server: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodatas`
--

CREATE TABLE `biodatas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `biodatas`
--

INSERT INTO `biodatas` (`id`, `nama`, `kelas`, `alamat`, `created_at`, `updated_at`) VALUES
(27, 'sapu', 'sd', 'skjd', '2019-02-07 05:50:39', '2019-02-07 05:50:39'),
(28, 'sapu', 'sd', 'skjd', '2019-02-07 05:51:28', '2019-02-07 05:51:28'),
(29, 'sapu', 'sd', 'skjd', '2019-02-07 14:55:48', '2019-02-07 14:55:48'),
(30, 'sapu', 'sd', 'skjd', '2019-02-07 15:08:20', '2019-02-07 15:08:20'),
(31, 'sapu', 'sd', 'skjd', '2019-02-07 15:09:59', '2019-02-07 15:09:59'),
(32, 'sapu', 'sd', 'skjd', '2019-02-08 19:32:09', '2019-02-08 19:32:09'),
(33, 'laptop', 'sd', 'skjd', '2019-02-11 06:52:22', '2019-02-11 06:52:22'),
(34, 'sapu', 'sd', 'skjd', '2019-02-13 00:08:57', '2019-02-13 00:08:57'),
(35, 'sapu', 'sd', 'skjd', '2019-02-13 18:14:34', '2019-02-13 18:14:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `investaris`
--

CREATE TABLE `investaris` (
  `id_inventaris` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` int(20) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_ruang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `nama_jenis` varchar(100) NOT NULL,
  `kode_jenis` varchar(30) NOT NULL,
  `keterangan_jenis` text NOT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`nama_jenis`, `kode_jenis`, `keterangan_jenis`, `delete_at`) VALUES
('multimedia', 'KDJNS001', '', NULL),
('jaringan', 'KDJNS002', '', NULL),
('komputer', 'KDJNS003', '', NULL),
('kebersihan', 'KDJNS004', '', NULL),
('olahraga', 'KDJNS005', '', NULL),
('ekstrakullikuler', 'KDJNS006', '', NULL),
('Kesehatan', 'T4GQ9', 'untuk barang barang medis dan peralatan Medis PMR', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_01_20_081528_create_tb_admin_table', 1),
(10, '2019_01_23_003750_create_tb_operator_table', 1),
(11, '2019_01_23_004302_create_tb_detail_pinjam', 1),
(12, '2019_01_23_005431_create_tb_peminjaman_table', 1),
(13, '2019_01_28_130719_create_biodatas_table', 2),
(14, '2019_01_29_130925_create_tb_pesan_table', 3),
(15, '2019_02_06_005604_create_tb_inventaris_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(10) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `kode_ruang` varchar(20) NOT NULL,
  `keterangan_ruang` text NOT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`, `keterangan_ruang`, `delete_at`) VALUES
(1, 'Lab IT', 'KDRNG002', 'tidak ada keterangan', NULL),
(2, 'lab audio', 'KDRNG001', 'tidak ada keterangan', NULL),
(3, 'GudangEkskul', 'XGXDz', 'untuk Peralatan ekstrakullikuler', NULL),
(4, 'Gudang Olahraga', '3KdeQ', 'untuk Peralatan pelajaran olahraga saja', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `kode_admin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_admin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`kode_admin`, `nama_admin`, `email`, `email_verified_at`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
('KKKADM01', 'admin master', 'adminmaster@gmail.com', NULL, '$2y$10$Q0/5hlYGWmzHyXQ4j8fEt.6H1YCR5LmjuUJatCex8Q5B99zHNXjaS', NULL, NULL, '2019-04-04 00:07:30', '2019-04-04 00:07:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pinjam`
--

CREATE TABLE `tb_detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `id_inventaris` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `id_detail_peminjaman` int(11) NOT NULL,
  `status_pinjam` enum('belum dipinjam','sudah dipinjam') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_peminjaman` enum('belum dikembalikan','sudah dikembalikan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pinjam` datetime DEFAULT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  `tanggal_dikembalikan` datetime DEFAULT NULL,
  `kode_operator_menyetujui` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_operator_mengembalikan` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_dikembalikan_semua` datetime DEFAULT NULL,
  `jumlah_tersisa` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_detail_pinjam`
--

INSERT INTO `tb_detail_pinjam` (`id_detail_pinjam`, `id_inventaris`, `created_at`, `updated_at`, `jumlah`, `id_detail_peminjaman`, `status_pinjam`, `status_peminjaman`, `tanggal_pinjam`, `tanggal_kembali`, `tanggal_dikembalikan`, `kode_operator_menyetujui`, `kode_operator_mengembalikan`, `tanggal_dikembalikan_semua`, `jumlah_tersisa`) VALUES
(1, '1', '2019-04-08 16:01:01', '2019-04-08 16:01:01', 25, 1, 'sudah dipinjam', 'sudah dikembalikan', '2019-04-08 00:00:00', '2019-04-15 00:00:00', NULL, 'KDOPTR001', NULL, '2019-04-08 00:00:00', NULL),
(1, '2', '2019-04-08 16:01:01', '2019-04-08 16:01:01', 25, 2, 'sudah dipinjam', 'sudah dikembalikan', '2019-04-08 00:00:00', '2019-04-15 00:00:00', NULL, 'KDOPTR001', NULL, '2019-04-08 00:00:00', NULL),
(1, '3', '2019-04-08 16:01:01', '2019-04-08 16:01:01', 25, 3, 'sudah dipinjam', 'sudah dikembalikan', '2019-04-08 00:00:00', '2019-04-15 00:00:00', NULL, 'KDOPTR001', NULL, '2019-04-08 00:00:00', NULL),
(2, '2', '2019-04-08 16:15:56', '2019-04-08 16:15:56', 20, 4, 'sudah dipinjam', 'sudah dikembalikan', '2019-04-08 00:00:00', '2019-04-15 00:00:00', NULL, 'KDOPTR001', NULL, '2019-04-08 00:00:00', NULL),
(2, '3', '2019-04-08 16:15:57', '2019-04-08 16:15:57', 25, 5, 'sudah dipinjam', 'sudah dikembalikan', '2019-04-08 00:00:00', '2019-04-15 00:00:00', NULL, 'KDOPTR001', NULL, '2019-04-08 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_inventaris`
--

CREATE TABLE `tb_inventaris` (
  `id_inventaris` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kode_jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jumlah_asli` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_inventaris`
--

INSERT INTO `tb_inventaris` (`id_inventaris`, `nama`, `kondisi`, `keterangan`, `jumlah`, `kode_jenis`, `kode_ruang`, `deleted_at`, `created_at`, `updated_at`, `jumlah_asli`) VALUES
(1, 'sapu', 'baru', 'sapu merek swallow', 100, 'KDJNS004', 'KDRNG001', NULL, NULL, NULL, 100),
(2, 'laptop', 'baru', 'hanya untuk siswa', 50, 'KDJNS003', 'KDRNG001', NULL, NULL, NULL, 50),
(3, 'Tablet', 'Baik', 'Tablet hanya digunakan untuk ujian', 30, 'KDJNS003', 'KDRNG001', NULL, NULL, NULL, 30),
(4, 'kamera', 'baik', 'minimal dipinjam sehari', 40, 'KDJNS001', 'KDRNG001', NULL, NULL, NULL, 40),
(5, 'smartphone', 'baik', 'hanya bisa dipinjam satu hari', 100, 'KDJNS001', 'KDRNG001', NULL, NULL, NULL, 100),
(6, 'speaker', 'baik', 'bagus', 80, 'KDJNS001', 'KDRNG001', NULL, '2019-04-08 07:30:51', '2019-04-08 07:30:51', 80),
(7, 'gitar', 'baik', 'kjlsd', 100, 'siswa', 'guru', NULL, '2019-04-08 07:34:27', '2019-04-08 07:34:27', 100),
(8, 'bola voli', 'baik', 'untuk olahraga', 50, 'KDJNS005', 'KDRNG002', NULL, '2019-04-08 08:11:41', '2019-04-08 08:11:41', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_operator`
--

CREATE TABLE `tb_operator` (
  `kode_operator` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_operator`
--

INSERT INTO `tb_operator` (`kode_operator`, `nama`, `no_tlp`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('dqAh0', 'edila dasir', '081803485', 'ediladasir@gmail.com', NULL, '$2y$10$6ZtqXP1OTnAmzjWfO/naxuDCIN4P/KTWkhU/8qDyBDVQI9TpnpT7m', NULL, '2019-04-08 17:50:49', '2019-04-08 17:50:49'),
('KDOPTR001', 'fulan bin ginudin', '0803483098534', 'fulan@gmail.com', NULL, '$2y$10$/Sxf8MQvBIlvuGOzMx1ABeybKFn4qpc3mUok9gRx67QkbYeemEUxq', 'X7JffTnL32G5ZQhasxqijtYsDqOIlz98vdrqVFhtG7b7MHzZC4vPeN5noIKt', '2019-02-20 07:25:16', '2019-02-20 07:25:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `status_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `kode_operator_menyetujui` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pinjam` enum('belum dipinjam','sudah dipinjam') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_peminjaman` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_dikembalikan` datetime DEFAULT NULL,
  `kode_operator_mengembalikan` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `status_peminjaman`, `kode_user`, `tanggal_pinjam`, `tanggal_kembali`, `deleted_at`, `kode_operator_menyetujui`, `status_pinjam`, `kode_peminjaman`, `tanggal_dikembalikan`, `kode_operator_mengembalikan`) VALUES
(1, 'barang sudah dikembalikan', 'KDUSR001', '2019-04-08', '2019-04-15 00:00:00', '2019-04-08 16:15:28', 'KDOPTR001', 'sudah dipinjam', '4vAzbfcbXT', '2019-04-08 00:00:00', 'KDOPTR001'),
(2, 'barang sudah dikembalikan', 'KDUSR001', '2019-04-08', '2019-04-15 00:00:00', '2019-04-08 16:16:08', 'KDOPTR001', 'sudah dipinjam', 'sJtokTfbte', '2019-04-08 00:00:00', 'KDOPTR001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `kode_pesan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `kode_user` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`kode_user`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
('4Rilx', 'ajeunggunarto', 'ajeng.gunarto@gmail.co.id', NULL, '$2y$10$bZqfNtjgBZDXb1ilAMoxkeE51kG.yOCyFBEwpC5JOTwTsD36DsPEm', NULL, '2019-03-16 05:32:09', '2019-03-16 05:32:09', 'guru'),
('7MGE6', 'zoro', 'zoro@strawhat.onepiece', NULL, '$2y$10$YZyX7d4fNedh.C9GqXEUp.quq2nkKCsk1oWrx6Ik470piJZCC8DE2', 'MjUJDDM5oXmBIhL3YR8vsRWPe5XqTZUOsXZuF9XVajn6hO6x3XPU7HFi5Y0r', '2019-03-17 08:49:48', '2019-03-17 08:49:48', ''),
('8gA6r', 'fulansdf', 'fulansdf@mail.id', NULL, '$2y$10$MqtanF4irWPORYRhyyMVNOfy5L3ax/V2Mm1eZ8hc/o5qg69WopNwG', NULL, '2019-03-17 08:44:58', '2019-03-17 08:44:58', ''),
('8nfPc', 'mangujang', 'mangujang@gmail.id', NULL, '$2y$10$ocr8Y/9YernJqD0ALZZ9n.KFZCpZobknlOXZzltIQzyUUaSThTed.', '4D7p9INoGHcpHJKjiEq0qF0TNUum3RU5y7qCJg5vj4XqWwWf5co4IUYKw43B', '2019-03-30 05:55:34', '2019-03-30 05:55:34', ''),
('954qz', 'bergadang', 'bergadang@gmail.com', NULL, '$2y$10$wc6iFTyzKoJi5GBe3uQoiOeEkn5QOIz29IBwf2v6/q3ZVFLcsoXpW', '6xtZM2FZWiZX2CBMTNnA3vxq9nBX4LFWbgrl9gpxB79SzYpzdXAeJsYIJg3c', '2019-03-30 04:27:12', '2019-03-30 04:27:12', ''),
('aEoHg', 'kumbangan', 'kumbangan@mail.id', NULL, '$2y$10$Q18xB7zs8tx0eZWnvb9HnuUN6D7.TNx0TVQxggh5lRpBZPcJOSgbC', NULL, '2019-04-07 01:25:07', '2019-04-07 01:25:07', 'siswa'),
('BqgeD', 'buah', 'buah@mail.id', NULL, '$2y$10$PNr/fTTicrvNfZcIjrKZUOqWQNj/aAr7fKAtT9vdfvkmOkKW14zWS', NULL, '2019-03-17 04:31:18', '2019-03-17 04:31:18', ''),
('e32gk', 'berkarya', 'berkarya@mail.id', NULL, '$2y$10$HDn2JoRVqNKX4by85z/vWOHdY2XsJAq/SV2tX//QIkRN8a6keME06', NULL, '2019-03-17 08:48:15', '2019-03-17 08:48:15', ''),
('eKsdH', 'cobalagi', 'cobalagi@mail.id', NULL, '$2y$10$zrlvYwvLqI4I57wSUSIYreRfl1wZJ135cPoRC8HclU0THQVvbOYDy', 'umJVSkq58irBQAeO2O8ztgjOzWxLckKPzl6JxAbdU8i1dfkxv5HBFEZOOgS9', '2019-03-30 05:41:51', '2019-03-30 05:41:51', ''),
('gdQue', 'buahsemagka', 'buah@semangka.id', NULL, '$2y$10$m8DNvFXsAixS20vfY1SSIueRbr6RvEVhA9azfZds/ZSakDb7e/ENi', NULL, '2019-03-17 04:31:44', '2019-03-17 04:31:44', ''),
('HGF6a', 'bakpao', 'bakpao@mail.id', NULL, '$2y$10$6XpOnu6vmtnES8FFU3orS.Ye8KW0PVvqCGz8WUsyLBqYg2GIp9F7m', 'FaWppDw62aPhwjyt92WaW5yJHdP9LMuEAUCkiA94oVdmlbdWSvcrOLRcrw7I', '2019-03-17 04:26:53', '2019-03-17 04:26:53', 'siswa'),
('hrqFp', 'kemarin', 'kemarindua@gmail.com', NULL, '$2y$10$H2dQjYririlu6.QUKp/C8.md0.qcVhGacQF3SBPGy5rXZFm6xUxra', '8SSHddyqb1DgYEMkasMoeanWUB8HetlVkvL2gjFvoED59X6RPt3KpuoyB8Yg', '2019-03-30 05:59:55', '2019-03-30 05:59:55', ''),
('Ip5EC', 'lufy', 'lufy@strawhat.onepiece', NULL, '$2y$10$puQaGpN7sfq23UQeZF8cROk0IHI/yn5naiII2Q4DRZ/6i9G/dcOC2', NULL, '2019-03-17 08:56:09', '2019-03-17 08:56:09', ''),
('KDUSR001', 'yamanmnur', 'yaman@gmail.com', NULL, '$2y$10$GK92P3ktRvQT9oIKpaJKz.jyQ3Y7C8H/P0NU4.IvjYTe4hGxr9fZq', 'pAdfB6XZwRoStMjomfekMWVvDiivGP4WDfUuQARPhrhYr1zDIs5HURjTLqPt', '2019-01-26 23:12:49', '2019-01-26 23:12:49', 'siswa'),
('mcmw8', 'asaasa', 'asa@gmail.com', NULL, '$2y$10$42tMZBRriftPvWOCIM9aduF/KYo6d9RyBLwkbGktE8zSOwTMnAcHS', NULL, '2019-03-16 05:20:32', '2019-03-16 05:20:32', 'guru'),
('MSAPZ', 'bergadangdua', 'bergadangdua@mail.id', NULL, '$2y$10$U/KPXK8z4Nt3ig91fJewxeSloma0WTT9fBuYUD900M1f1CVNWfbq6', 'tZuPMzAlqjMnfmSId89WOnA01rV57xRoukJVUxfdjGGAAH9ea6P47JLjsLxW', '2019-03-30 04:29:04', '2019-03-30 04:29:04', ''),
('msMaL', 'bengkoang', 'bengkoang@mail.id', NULL, '$2y$10$q.p0L2nC1gkyyvbSIXAcSeL2ZSs8jHotKiHfYYKXuQnWUrKX2/70W', NULL, '2019-03-30 19:55:18', '2019-03-30 19:55:18', ''),
('Ql1i7', 'candrapura', 'candrapura@mail.id', NULL, '$2y$10$vgQLP4R.JCjp5YizIiu0Q.d4XCbpssjvSeujrVCzQ3N9zEswKlerS', NULL, '2019-03-30 06:30:35', '2019-03-30 06:30:35', ''),
('szPoB', 'dungu', 'dungudua@mail.id', NULL, '$2y$10$r9RgwZnsY.FV4HWJJbPFsuipavrT8Q1CGonil1BKYi1svIOw/I2DO', 'Bv5WXyMXIZv1l8QNVguTmWOsnZbZiI1nfi1j4hqgbwO4XWbeNr7rzkvwqlXk', '2019-03-30 05:31:50', '2019-03-30 05:31:50', ''),
('tI25t', 'burnadi', 'burnadi@gmail.com', NULL, '$2y$10$U30rS5CKkPxGaxuIW1W.F.JpW7F0Oz47RMlo4VQjdxvtS9xzhjQt6', NULL, '2019-04-06 20:59:28', '2019-04-06 20:59:28', 'siswa'),
('Uppix', 'berserk', 'berserk@gmail.com', NULL, '$2y$10$FOuqRZe8q9WEmBTbZ6MMb.rRiAkfSnAdR3pTAbEurM/Hid0ls1.aa', 'FJZnhGdC0wNZRoHzCZWcQeSzGPXRJPSPGvX1g95Fbw3hjt4lJXTaoB1S3fPS', '2019-03-30 06:24:18', '2019-03-30 06:24:18', ''),
('xfMSh', 'coba', 'cobadua@mail.id', NULL, '$2y$10$EgoifT9H27XbYweeG6px0ezLzDBAiCT/L0Onh00w5K8jDjTOpoCPa', 'zjUa2IneAA4WkU2SIdo2gcDTBWGn9bbxbAU2I09KaticaCTW8BrSiHJ7iG7q', '2019-03-30 05:23:24', '2019-03-30 05:23:24', ''),
('Xjrqe', 'jghgj', 'jhgjhg@mail.id', NULL, '$2y$10$HECKmiUb4uogjK6aZzxeK.aEd0S/ktYxWtFmf351A.5c3aZCVf1.2', NULL, '2019-03-17 04:29:03', '2019-03-17 04:29:03', ''),
('yG27R', 'kkjhkjgjhf', 'jhgjh@hgfh.gjg', NULL, '$2y$10$Y90isNJMKPOt950f7fMYYOi2Xcd1nwKkP6Hx98h9hobb7Qgndnkla', NULL, '2019-03-17 08:55:45', '2019-03-17 08:55:45', ''),
('YSXHV', 'cobacoba', 'cobacoba@mail.id', NULL, '$2y$10$1iqw69GRyh3pKHYjX2/pruySKAbpOEEGFpWR7g4I2FBGRvCO.5Ehe', 'O9cQLKSajLQXK8bj3e5JITPEnry9q3nPoP5BVlG7kwVelzj0S689GuPa0HyR', '2019-03-30 05:24:20', '2019-03-30 05:24:20', ''),
('za5Dy', 'ilham sudrajat', 'ilhamsudrajat@gmail.com', NULL, '$2y$10$Al6H7xgCi561QKmPvALKnuUJ4WGznh3y/bI5AikskQa7FiP2Qsi7C', NULL, '2019-03-31 23:14:21', '2019-03-31 23:14:21', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_siswa`
--

CREATE TABLE `user_siswa` (
  `id` int(11) NOT NULL,
  `kode_user` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(40) NOT NULL,
  `jurusan` varchar(40) NOT NULL,
  `no_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_siswa`
--

INSERT INTO `user_siswa` (`id`, `kode_user`, `kelas`, `jurusan`, `no_id`) VALUES
(1, 'tI25t', '10', 'Teknologi Komputer dan Jaringan', '235123'),
(2, 'aEoHg', '11', 'Multimedia', '2342342');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodatas`
--
ALTER TABLE `biodatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investaris`
--
ALTER TABLE `investaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD UNIQUE KEY `tb_admin_email_unique` (`email`);

--
-- Indexes for table `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD PRIMARY KEY (`id_detail_peminjaman`),
  ADD KEY `id_detail_pinjam` (`id_detail_pinjam`);

--
-- Indexes for table `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indexes for table `tb_operator`
--
ALTER TABLE `tb_operator`
  ADD UNIQUE KEY `tb_operator_email_unique` (`email`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`kode_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_siswa`
--
ALTER TABLE `user_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodatas`
--
ALTER TABLE `biodatas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  MODIFY `id_inventaris` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_siswa`
--
ALTER TABLE `user_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD CONSTRAINT `tb_detail_pinjam_ibfk_1` FOREIGN KEY (`id_detail_pinjam`) REFERENCES `tb_peminjaman` (`id_peminjaman`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
