-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2025 pada 15.52
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_siswa`
--

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
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` int(10) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
(1, 'RPL'),
(2, 'GIM'),
(3, 'TJKT'),
(4, 'MPLB'),
(5, 'DPIB'),
(6, 'AKL'),
(7, 'TO'),
(8, 'SP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `jenjang` varchar(10) DEFAULT NULL,
  `jurusan` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `jenjang`, `jurusan`, `created_at`, `updated_at`) VALUES
(73, 'X RPL 1', 'X', 'RPL', NULL, NULL),
(74, 'X RPL 2', 'X', 'RPL', NULL, NULL),
(75, 'X RPL 3', 'X', 'RPL', NULL, NULL),
(76, 'X GIM 1', 'X', 'GIM', NULL, NULL),
(77, 'X GIM 2', 'X', 'GIM', NULL, NULL),
(78, 'X GIM 3', 'X', 'GIM', NULL, NULL),
(79, 'X TJKT 1', 'X', 'TJKT', NULL, NULL),
(80, 'X TJKT 2', 'X', 'TJKT', NULL, NULL),
(81, 'X TJKT 3', 'X', 'TJKT', NULL, NULL),
(82, 'X MPLB 1', 'X', 'MPLB', NULL, NULL),
(83, 'X MPLB 2', 'X', 'MPLB', NULL, NULL),
(84, 'X MPLB 3', 'X', 'MPLB', NULL, NULL),
(85, 'X DPIB 1', 'X', 'DPIB', NULL, NULL),
(86, 'X DPIB 2', 'X', 'DPIB', NULL, NULL),
(87, 'X DPIB 3', 'X', 'DPIB', NULL, NULL),
(88, 'X AKL 1', 'X', 'AKL', NULL, NULL),
(89, 'X AKL 2', 'X', 'AKL', NULL, NULL),
(90, 'X AKL 3', 'X', 'AKL', NULL, NULL),
(91, 'X TO 1', 'X', 'TO', NULL, NULL),
(92, 'X TO 2', 'X', 'TO', NULL, NULL),
(93, 'X TO 3', 'X', 'TO', NULL, NULL),
(94, 'X SP 1', 'X', 'SP', NULL, NULL),
(95, 'X SP 2', 'X', 'SP', NULL, NULL),
(96, 'X SP 3', 'X', 'SP', NULL, NULL),
(97, 'XI RPL 1', 'XI', 'RPL', NULL, NULL),
(98, 'XI RPL 2', 'XI', 'RPL', NULL, NULL),
(99, 'XI RPL 3', 'XI', 'RPL', NULL, NULL),
(100, 'XI GIM 1', 'XI', 'GIM', NULL, NULL),
(101, 'XI GIM 2', 'XI', 'GIM', NULL, NULL),
(102, 'XI GIM 3', 'XI', 'GIM', NULL, NULL),
(103, 'XI TJKT 1', 'XI', 'TJKT', NULL, NULL),
(104, 'XI TJKT 2', 'XI', 'TJKT', NULL, NULL),
(105, 'XI TJKT 3', 'XI', 'TJKT', NULL, NULL),
(106, 'XI MPLB 1', 'XI', 'MPLB', NULL, NULL),
(107, 'XI MPLB 2', 'XI', 'MPLB', NULL, NULL),
(108, 'XI MPLB 3', 'XI', 'MPLB', NULL, NULL),
(109, 'XI DPIB 1', 'XI', 'DPIB', NULL, NULL),
(110, 'XI DPIB 2', 'XI', 'DPIB', NULL, NULL),
(111, 'XI DPIB 3', 'XI', 'DPIB', NULL, NULL),
(112, 'XI AKL 1', 'XI', 'AKL', NULL, NULL),
(113, 'XI AKL 2', 'XI', 'AKL', NULL, NULL),
(114, 'XI AKL 3', 'XI', 'AKL', NULL, NULL),
(115, 'XI TO 1', 'XI', 'TO', NULL, NULL),
(116, 'XI TO 2', 'XI', 'TO', NULL, NULL),
(117, 'XI TO 3', 'XI', 'TO', NULL, NULL),
(118, 'XI SP 1', 'XI', 'SP', NULL, NULL),
(119, 'XI SP 2', 'XI', 'SP', NULL, NULL),
(120, 'XI SP 3', 'XI', 'SP', NULL, NULL),
(121, 'XII RPL 1', 'XII', 'RPL', NULL, NULL),
(122, 'XII RPL 2', 'XII', 'RPL', NULL, NULL),
(123, 'XII RPL 3', 'XII', 'RPL', NULL, NULL),
(124, 'XII GIM 1', 'XII', 'GIM', NULL, NULL),
(125, 'XII GIM 2', 'XII', 'GIM', NULL, NULL),
(126, 'XII GIM 3', 'XII', 'GIM', NULL, NULL),
(127, 'XII TJKT 1', 'XII', 'TJKT', NULL, NULL),
(128, 'XII TJKT 2', 'XII', 'TJKT', NULL, NULL),
(129, 'XII TJKT 3', 'XII', 'TJKT', NULL, NULL),
(130, 'XII MPLB 1', 'XII', 'MPLB', NULL, NULL),
(131, 'XII MPLB 2', 'XII', 'MPLB', NULL, NULL),
(132, 'XII MPLB 3', 'XII', 'MPLB', NULL, NULL),
(133, 'XII DPIB 1', 'XII', 'DPIB', NULL, NULL),
(134, 'XII DPIB 2', 'XII', 'DPIB', NULL, NULL),
(135, 'XII DPIB 3', 'XII', 'DPIB', NULL, NULL),
(136, 'XII AKL 1', 'XII', 'AKL', NULL, NULL),
(137, 'XII AKL 2', 'XII', 'AKL', NULL, NULL),
(138, 'XII AKL 3', 'XII', 'AKL', NULL, NULL),
(139, 'XII TO 1', 'XII', 'TO', NULL, NULL),
(140, 'XII TO 2', 'XII', 'TO', NULL, NULL),
(141, 'XII TO 3', 'XII', 'TO', NULL, NULL),
(142, 'XII SP 1', 'XII', 'SP', NULL, NULL),
(143, 'XII SP 2', 'XII', 'SP', NULL, NULL),
(144, 'XII SP 3', 'XII', 'SP', NULL, NULL);

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
(4, 'create_kelas_table', 1),
(5, 'xxxx_create_siswa_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_kelas`
--

CREATE TABLE `nama_kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nama_kelas`
--

INSERT INTO `nama_kelas` (`id`, `nama_kelas`) VALUES
(1, 'X RPL 1'),
(2, 'X RPL 2'),
(3, 'X RPL 3'),
(4, 'X GIM 1'),
(5, 'X GIM 2'),
(6, 'X GIM 3'),
(7, 'X TJKT 1'),
(8, 'X TJKT 2'),
(9, 'X TJKT 3'),
(10, 'X MPLB 1'),
(11, 'X MPLB 2'),
(12, 'X MPLB 3'),
(13, 'X DPIB 1'),
(14, 'X DPIB 2'),
(15, 'X DPIB 3'),
(16, 'X AKL 1'),
(17, 'X AKL 2'),
(18, 'X AKL 3'),
(19, 'X TO 1'),
(20, 'X TO 2'),
(21, 'X TO 3'),
(22, 'X SP 1'),
(23, 'X SP 2'),
(24, 'X SP 3'),
(25, 'XI RPL 1'),
(26, 'XI RPL 2'),
(27, 'XI RPL 3'),
(28, 'XI GIM 1'),
(29, 'XI GIM 2'),
(30, 'XI GIM 3'),
(31, 'XI TJKT 1'),
(32, 'XI TJKT 2'),
(33, 'XI TJKT 3'),
(34, 'XI MPLB 1'),
(35, 'XI MPLB 2'),
(36, 'XI MPLB 3'),
(37, 'XI DPIB 1'),
(38, 'XI DPIB 2'),
(39, 'XI DPIB 3'),
(40, 'XI AKL 1'),
(41, 'XI AKL 2'),
(42, 'XI AKL 3'),
(43, 'XI TO 1'),
(44, 'XI TO 2'),
(45, 'XI TO 3'),
(46, 'XI SP 1'),
(47, 'XI SP 2'),
(48, 'XI SP 3'),
(49, 'XII RPL 1'),
(50, 'XII RPL 2'),
(51, 'XII RPL 3'),
(52, 'XII GIM 1'),
(53, 'XII GIM 2'),
(54, 'XII GIM 3'),
(55, 'XII TJKT 1'),
(56, 'XII TJKT 2'),
(57, 'XII TJKT 3'),
(58, 'XII MPLB 1'),
(59, 'XII MPLB 2'),
(60, 'XII MPLB 3'),
(61, 'XII DPIB 1'),
(62, 'XII DPIB 2'),
(63, 'XII DPIB 3'),
(64, 'XII AKL 1'),
(65, 'XII AKL 2'),
(66, 'XII AKL 3'),
(67, 'XII TO 1'),
(68, 'XII TO 2'),
(69, 'XII TO 3'),
(70, 'XII SP 1'),
(71, 'XII SP 2'),
(72, 'XII SP 3');

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
('c4LPIuHgJM4am2oKc9n8ISTFHHHTa3ZO7r4nR3sG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ1pZeDgxWW1WZ2x4aEtrQVlid0dxNjI1eVA3NVlJQ3NzZ0trSW1hciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaXN3YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749474749),
('fPlw4IXTFNwKB1R1B0eYYRwLrEvbAvAwXoT3IAyJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQnZ6TTUzQXBNSFNoN1Vscjk0RldSNFJDY0JpaUZQaHVYTkJLNjR5aSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaXN3YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749525425),
('wmffrnuIgS0Wtvl5QmCRD0izjrmGwa7RzwmhAFgB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjh4UlB0VE84MzJOTVZyZ0xKZlYxZmdMQ3U2aHFIa1hzSXlXVEpvTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaXN3YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749512606),
('xKmyRpotiDuR0wvOA5XI7ex9Ml4L1302x1Go9i67', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2lwYlp3dXFBdGMzWk1jTHBUTmZsQWZHbWlLdXRmc2c5TU8wVm9TRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaXN3YS9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1749474821);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nis`, `kelas_id`, `jenis_kelamin`, `alamat`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'aditya', '0089716371', 98, 'Laki-laki', 'assss', '1749512603_Screenshot 2025-03-20 172415.png', '2025-06-05 04:10:14', '2025-06-09 16:43:23'),
(2, 'ihsan Nurfalah', '12345678', 97, 'Laki-laki', 'kjkjjkjkjk', NULL, '2025-06-05 21:29:54', '2025-06-05 21:29:54'),
(4, 'asep', '123456782424', 86, 'Laki-laki', 'ada', '1749474279_Screenshot 2025-02-18 170236.png', '2025-06-09 06:04:39', '2025-06-09 06:04:39'),
(5, 'Lu\'lu latifah', '123456781345', 84, 'Laki-laki', 'S', '1749474457_Screenshot 2025-02-18 170236.png', '2025-06-09 06:07:37', '2025-06-09 06:12:19');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

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
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nama_kelas`
--
ALTER TABLE `nama_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`),
  ADD KEY `siswa_kelas_id_foreign` (`kelas_id`);

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
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `nama_kelas`
--
ALTER TABLE `nama_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
