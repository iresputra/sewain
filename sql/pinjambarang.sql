-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2017 at 07:48 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinjambarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `nama_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `kuantitas_barang` int(11) NOT NULL,
  `kategori_barang` int(11) DEFAULT NULL,
  `deskripsi_barang` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konfirmasi_admin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`user_id`, `id_barang`, `nama_barang`, `harga_barang`, `kuantitas_barang`, `kategori_barang`, `deskripsi_barang`, `foto_barang`, `konfirmasi_admin`, `created_at`, `updated_at`) VALUES
(9, 13, 'Baju Tradisional Bali', 450000, 2, NULL, 'Cocok untuk Pria Umur 20th', 'aa.PNG', 0, '2017-05-10 11:48:19', NULL),
(8, 15, 'Meja Lipat Portable', 30000, 1, NULL, 'Keren!', 'asdas.PNG', 1, '2017-05-12 06:11:26', NULL),
(8, 16, 'Kursi Roda Portable', 50000, 1, NULL, 'Siap pakai, kursi roda listrik', 'aa.PNG', 0, '2017-05-16 07:04:12', NULL),
(8, 17, 'Genset Toshiba', 499990, 2, NULL, 'Masih Baru, Siap sedia genset untuk acara anda!', 'asdas.PNG', 1, '2017-05-16 07:05:20', NULL),
(5, 18, 'DJ Portable', 250000, 1, NULL, 'Cocok buat job DJ harian kamu!', 'asdas.PNG', 1, '2017-05-16 07:34:04', NULL),
(9, 19, 'Sepatu Gunung Eiger', 25000, 4, NULL, 'MASIH BAGUS LOH', 'asdas.PNG', 1, '2017-05-16 12:01:15', NULL),
(8, 20, 'Stand Mic', 25000, 5, NULL, 'Untuk Acara Kalian!', 'asdas.PNG', 0, '2017-05-22 16:42:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materis`
--

CREATE TABLE `materis` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2017_04_25_133935_bikin_tabel_materi', 1),
(5, '2017_04_27_161720_buat_tabel_barang_user', 2),
(6, '2017_05_03_055233_buat_tabel_order', 2),
(7, '2017_05_19_061522_bikin_tabel_transaksi', 2),
(8, '2017_05_21_150159_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id_transaksi` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_id` int(11) NOT NULL,
  `kuantitas_sewa` int(3) NOT NULL,
  `biaya_sewa` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id_transaksi`, `user_id`, `barang_id`, `kuantitas_sewa`, `biaya_sewa`, `created_at`, `updated_at`) VALUES
(3, '8', 15, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, '123123', '1231@gmail.com', 0, '$2y$10$ACzSLbVHyU0jd3yC5Tddo.Dk3qxDrC9xHvThryhkxJIaduHBMeMD2', '3amJK4QtxIHivk71aWfPsRdKddDiUIIxBhuj31OrUFK3ByU54wECqqCAlEst', '2017-04-25 08:47:01', '2017-04-25 08:47:01'),
(5, 'haha', 'haha@gmail.com', 0, '$2y$10$jicA05jP3CtUGJestHM6QegMVW8OfcQdyepBb/IYrtA0Wat5leLwy', 'kElmkLSFZxeMuhHYMjV8drfq4gzdcAnUt32cs1NHEE6X6se4Esn79IkgfKPb', '2017-04-26 07:58:38', '2017-04-26 07:58:38'),
(6, 'Respati Widrantara', 'iresw@gmail.com', 0, '$2y$10$HqC7aLwn8ho53WXOJvCKa.im8doQ1FZNrNX4xaBAXZvNbQzIpxdv6', 'xAuuMUUPX4ImjeVZ2lgqdOGTYN5A7pVZXDFcJVKiHIKOA05EpKvJIseyI7xh', '2017-04-26 09:05:33', '2017-04-26 09:05:33'),
(7, 'Ires Putra', 'ires.w.putra@gmail.com', 0, '$2y$10$waaMyonsqF4ezf4sF5.VNu0OEQq17CTFtFR5ywWptYkMnT2XTsOMG', '2Bjba8IdKzL7bm1fojWufPhz1OxwSDszgtfIKgJ5BJ1YiuAmxYKAV1dRfq7U', '2017-04-26 10:15:12', '2017-04-26 10:15:12'),
(8, 'Amos', 'amos@gmail.com', 0, '$2y$10$AvJ4gis11/NEZWCMOzY1MurZRfvtKY0EJlwRpRcG7yJfq/OdefjFS', 'I2NrgxkhvCyIRyj2sjFyO1j0e8b3Oi07VQKfxuHt0L51Lyq0gej4fJ9qSgGD', '2017-04-26 11:23:51', '2017-04-26 11:23:51'),
(9, 'Rangga Putra', 'rangga@gmail.com', 0, '$2y$10$/FNMIxtydYqayuOkU0TtfeIq1GtEfFuICjC8utcFoN/8jsn5piytq', 'EVMj6xwdrtMEwUyrErifN4VY5bLvjcvjJ8YD91VUT7TmRHprIb8bL441TKyI', '2017-05-10 04:47:43', '2017-05-10 04:47:43'),
(14095918, 'admin', 'admin@gmail.com', 1, '$2y$10$AjBZ.JZAUxEKBCO0aXoxU.vAQqaE49vAtzK.Zb0vS3Dwf1FeWL16G', '3DTo8am6OznAg3uRLWLkIzG6KKk7eyclYGxB35KZ4YuEJokx60DiOmvE4slS', '2017-05-11 23:38:51', '2017-05-11 23:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_barangs`
--

CREATE TABLE `user_barangs` (
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `materis`
--
ALTER TABLE `materis`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id_barang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `materis`
--
ALTER TABLE `materis`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id_transaksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14095919;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
