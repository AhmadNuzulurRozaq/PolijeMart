-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 29 Bulan Mei 2026 pada 11.20
-- Versi server: 12.2.2-MariaDB
-- Versi PHP: 8.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `polijemart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `kode_barang`, `nama_barang`, `deskripsi`, `stok`, `kategori_id`, `harga`, `image`, `created_at`, `updated_at`) VALUES
(2, 'TF-SGH-01', 'Indomie Goreng', 'Mie instan goreng rasa original', 49, 1, 3500.00, 'images/W0xOZCQNYLg7VaiDzklOTVyRMKcRQPEm8uJX8fVD.png', NULL, '2026-05-28 03:43:26'),
(3, 'TF-SGM-01', 'Indomie Kuah Ayam Bawang', 'Mie instan kuah rasa ayam bawang', 50, 1, 3500.00, 'images/haeLnP1iqXjzCb2YSZgsFLXlrtd5cWhPdafwYynF.png', NULL, '2026-05-28 03:32:02'),
(4, 'TF-MIE-02', 'Mie Sedap Goreng', 'Mie instan goreng rasa original', 40, 1, 3000.00, 'images/1qFJglltUHBMjej7mStl3nJYy9zVogiMvYQyxHdW.webp', NULL, '2026-05-28 03:32:15'),
(5, 'TF-SAT-03', 'Roti Tawar Sari Roti', 'Roti tawar putih 400gr', 20, 1, 12000.00, 'images/ptTlQGl3fFzBidreYET7CmuDquLlne5WMTEnVGbU.jpg', NULL, '2026-05-28 03:33:55'),
(6, 'GAD-04', 'Biskuit Roma Kelapa', 'Biskuit kelapa klasik 175gr', 30, 1, 8500.00, 'images/XO12QbGIvFcrnCFSXbaSanSfSvCdzX1SDsoxBbTe.jpg', NULL, '2026-05-28 03:33:03'),
(7, 'TF-SOT-05', 'Chitato Sapi Panggang', 'Keripik kentang rasa sapi panggang 63gr', 25, 1, 9000.00, 'images/R5ROhblmIo2rLsaJKZsHBVaCjw0y9vuhUatIncRy.png', NULL, '2026-05-28 03:33:19'),
(8, 'MN-ESJ-06', 'Aqua 600ml', 'Air mineral 600ml', 48, 2, 4000.00, 'images/Vdqyd2wth8mnHX0g5foH0M2S3tHiL4uFLpLUmJcj.webp', NULL, '2026-05-28 03:33:44'),
(9, 'MN-EST-07', 'Teh Botol Sosro', 'Teh manis siap minum 300ml', 40, 2, 5000.00, 'images/kAC309CPKt2pRQDEbwEXJHl6J9PwaN1kqy1vurtD.webp', NULL, '2026-05-28 03:35:07'),
(10, 'MN-KOF-08', 'Kopi Kapal Api', 'Kopi instan hitam 8 sachet', 35, 2, 12000.00, 'images/lSv5Q44Wt329cT0JiQJU6p6LdapPFcQGxCboRTVw.jpg', NULL, '2026-05-28 03:34:40'),
(11, 'MN-PSD-10', 'Pocari Sweat', 'Pocari Sweat untuk segala kebutuhan anti dehidrasi', 30, 2, 2500.00, 'images/gAMVBa1vXrMg5Gp98A52kn6vfnYsmReRJhoWevcN.png', NULL, '2026-05-28 03:34:50'),
(12, 'MN-JUS-11', 'Teh Pucuk Harum', 'Teh manis asli dari dauh pucuk', 30, 2, 2500.00, 'images/aGKiwjtohjzad31hU99yfSbWh8kv5ZhZQgjIoZq4.jpg', NULL, '2026-05-28 03:35:29'),
(13, 'MN-JUS-12', 'Daun Singkong', 'Daun Singkong Asli Jember', 30, 2, 2500.00, NULL, NULL, NULL),
(14, 'SN-KRP-10', 'Pulpen Standard', 'Pulpen biru/hitam standar', 100, 3, 2000.00, 'images/6YK7XjVq0sU9fwVIo9wuVO9juP29wkNcypczw0Sp.webp', NULL, '2026-05-28 03:35:41'),
(15, 'SN-PIS-11', 'Pensil 2B', 'Pensil kayu 2B untuk ujian', 80, 3, 1500.00, 'images/0rHor1MvlF340ERdVnhki4YrA2ABelU441Auj9El.jpg', NULL, '2026-05-28 03:35:55'),
(16, 'SN-RES-12', 'Penghapus Standard', 'Penghapus pensil putih', 60, 3, 1000.00, 'images/sH9ohOBhBJovAJZ2SB4k1NFGHMtclEk4wUqYKYZi.jpg', NULL, '2026-05-28 03:36:58'),
(17, 'TF-REN-13', 'Buku Tulis 38 Lembar', 'Buku tulis spiral 38 lembar', 50, 3, 5000.00, 'images/EGiGydhfylvCiSvnTbdAItkER3BOfQDGFm3VNNXV.jpg', NULL, '2026-05-28 03:37:13'),
(18, 'TF-AYG-14', 'Buku Catatan A5', 'Buku catatan ukuran A5 100 lembar', 40, 3, 8000.00, 'images/Njq2kD7y3cvVvUxTPCHaPt33s4wTVWEyomzhaKmR.jpg', NULL, '2026-05-28 03:37:26'),
(19, 'TF-BKS-15', 'Spidol Whiteboard', 'Spidol whiteboard hitam', 35, 3, 6000.00, 'images/KVrEuWKC7o0moprzvEspvcqxgJJvl3FTxPqF1rv9.jpg', NULL, '2026-05-28 03:37:39'),
(20, 'MN-SUS-16', 'Stabilo Highlighter', 'Pena stabilo berbagai warna', 45, 3, 7000.00, 'images/Ycqzh02mv6xGsOxgBGqSSnxUbngHENJmYJLLZni0.jpg', NULL, '2026-05-28 03:37:59'),
(21, 'SN-LUM-17', 'Lem Kertas Fox', 'Lem kertas 60gr', 30, 3, 5000.00, 'images/2Fi42ELQNtPOhXJeA4MySDbzd4EzibENnFemExfT.jpg', NULL, '2026-05-28 03:38:11'),
(22, 'TF-PEK-18', 'Kertas A5', 'Kertas HVS A5 1 rim (500 lembar)', 20, 3, 35000.00, 'images/vgRn8KUVgI2LrfUPYb8cXOoIscJqV8cFtYMBYtMi.webp', NULL, '2026-05-28 03:38:24'),
(23, 'MN-DEJ-19', 'Map Plastik', 'Map plastik kancing snap', 40, 3, 3000.00, 'images/OM9MFm2p2KaG8xlcwIWGAaqHeGLSqqjiJwkpwXvL.webp', NULL, '2026-05-28 03:38:41'),
(24, 'SN-MAR-20', 'Isolasi Bening', 'Lakban bening 2 inch', 25, 3, 8000.00, 'images/fFTpeLIZmYcxG5YPyVTX39Qe5MYBLDNrz2M5EdPc.jpg', NULL, '2026-05-28 03:38:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualans`
--

CREATE TABLE `detail_penjualans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penjualan_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_penjualans`
--

INSERT INTO `detail_penjualans` (`id`, `penjualan_id`, `barang_id`, `jumlah`, `harga`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 3500.00, 3500.00, '2026-05-28 03:42:16', '2026-05-28 03:42:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

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
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `kode_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'KTG-001', 'Makanan', NULL, NULL),
(2, 'KTG-002', 'Minuman', NULL, NULL),
(3, 'KTG-003', 'ATK', NULL, NULL),
(4, 'KTG-004', 'Atribut', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_11_031136_create_kategoris_table', 1),
(5, '2026_03_11_031137_create_barangs_table', 1),
(6, '2026_03_11_033752_create_penjualans_table', 1),
(7, '2026_03_11_034407_create_detail_penjualans_table', 1),
(8, '2026_05_04_024945_create_keranjangs_table', 1),
(9, '2026_05_15_142528_create_personal_access_tokens_table', 1),
(10, '2026_05_28_112834_add_avatar_to_users_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualans`
--

CREATE TABLE `penjualans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pesanan` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `total_bayar` decimal(10,2) NOT NULL,
  `status` enum('proses','selesai','batal') NOT NULL DEFAULT 'proses',
  `batas_waktu` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualans`
--

INSERT INTO `penjualans` (`id`, `nomor_pesanan`, `user_id`, `tanggal_penjualan`, `total_bayar`, `status`, `batas_waktu`, `created_at`, `updated_at`) VALUES
(1, 'TRX-20260528104216-B5F', 2, '2026-05-28', 5500.00, 'selesai', '2026-05-29 10:43:26', '2026-05-28 03:42:16', '2026-05-28 03:43:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3hOJPF4sEolZ9hErYdBdt870lmAKOrPizqhLIkCe', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTY4bUZvMVRaNm9Eem1GUW1GNUpQaTRDbWQxQmV6ZjFJV3JUeDQwNyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779940810),
('6PzrIOVLO9KJ2p7h6hHhDS7QUJMAyRNvux53vb7K', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicWZXaHdkVzBnNU9pMWJRMkg0OVVFa1J1bnJjRnpydVN4MEhqS2YyaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9jYWhvb3RzLWNoYXR0aW5nLWN5bWJhbC5uZ3Jvay1mcmVlLmRldi9jdXN0b21lciI7czo1OiJyb3V0ZSI7czoxNDoiY3VzdG9tZXIuaW5kZXgiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6NDoiY2FydCI7YToxOntpOjQ7YTo2OntzOjI6ImlkIjtpOjQ7czoxMToibmFtYV9iYXJhbmciO3M6MTY6Ik1pZSBTZWRhcCBHb3JlbmciO3M6NToiaGFyZ2EiO3M6NzoiMzAwMC4wMCI7czo1OiJpbWFnZSI7czo1MjoiaW1hZ2VzLzFxRkpnbGx0VUhCTWplajdtU3RsM25KWXk5elZvZ2lNdllReXhIZFcud2VicCI7czo2OiJqdW1sYWgiO3M6MToiMSI7czo0OiJzdG9rIjtpOjQwO319fQ==', 1779946894),
('GjxC5StyxDyu5ekY4MYvXNbO4oZMPkrlACPrvmnx', 1, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiakVVNkJuSjRmczZFN1NXRjJvdnZTeVFkYVAyVkxDZjdFM1VSUFdQUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9jYWhvb3RzLWNoYXR0aW5nLWN5bWJhbC5uZ3Jvay1mcmVlLmRldi9vcmRlcnMiO3M6NToicm91dGUiO3M6MTc6ImFkbWluLm1hbmFnZU9yZGVyIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1779944704),
('qzCi1BJKecKEgTtjwy6GAM082agilYmbKK5QAua0', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:151.0) Gecko/20100101 Firefox/151.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQXY2NFd2N1Y5S1FCNDRpV2w3VnhoVDNCYXF2QzJGSUtNWWVVMk11TyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1779947891),
('yU4LLSgud7y6cOXZYuTZ3aF2Kl1196ZmH9W0wybM', 2, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV3BKdUJCUHVoOTc4ckxuMlM0ZlFyUlViRm5vYVVXRk12RWhhdlpGZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jdXN0b21lci9kZXRhaWwvOCI7czo1OiJyb3V0ZSI7czoyMjoiY3VzdG9tZXIuZGV0YWlsUHJvZHVjdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1779947859);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `nomor_telepon`, `role`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Nuzulur Rozaq', 'nuzulnazil14@gmail.com', '2026-05-28 02:13:46', '$2y$12$6zQi.axH9j8cOCsXggl9ne2zSmZz3YsuGHnV9gxa9t3IKctICExcW', NULL, NULL, 'admin', 'avatars/MKEraZ5qk10pRLNMgepybnOU6UkdEkpLtwCIhpcn.webp', NULL, '2026-05-28 02:13:35', '2026-05-28 04:34:06'),
(2, 'Ahmad Nazilir Rizqi', 'nuzulnazil13@gmail.com', '2026-05-28 03:39:51', '$2y$12$S7kr3KXXRycLzYeX8YWii.Agxh8tmYgBy0yeCmwaQVxub2UySabaq', 'Jl. Masjid At-Taqwa - Balung Lor - Balung', '085196187341', 'user', 'avatars/KNVBuOgOL68jKDoXgULi7UjOQOrkdaCJu88WOOc7.webp', NULL, '2026-05-28 03:39:33', '2026-05-28 04:33:51');

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barangs_kode_barang_unique` (`kode_barang`),
  ADD KEY `barangs_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `detail_penjualans`
--
ALTER TABLE `detail_penjualans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_penjualans_penjualan_id_foreign` (`penjualan_id`),
  ADD KEY `detail_penjualans_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategoris_kode_kategori_unique` (`kode_kategori`);

--
-- Indeks untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjangs_user_id_foreign` (`user_id`),
  ADD KEY `keranjangs_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penjualans_nomor_pesanan_unique` (`nomor_pesanan`),
  ADD KEY `penjualans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualans`
--
ALTER TABLE `detail_penjualans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_penjualans`
--
ALTER TABLE `detail_penjualans`
  ADD CONSTRAINT `detail_penjualans_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_penjualans_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD CONSTRAINT `keranjangs_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  ADD CONSTRAINT `penjualans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
