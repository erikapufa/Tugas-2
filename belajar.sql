-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 16, 2025 at 03:06 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_biaya`
--

CREATE TABLE `data_biaya` (
  `id` int NOT NULL,
  `jenis_biaya` varchar(100) NOT NULL,
  `keterangan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_biaya`
--

INSERT INTO `data_biaya` (`id`, `jenis_biaya`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Reguler', 'blabl', '2025-01-16', '2025-01-16 03:02:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_harga`
--

CREATE TABLE `data_harga` (
  `id` int NOT NULL,
  `id_tahun_pelajaran` int NOT NULL,
  `id_kelas` int NOT NULL,
  `id_jenis_biaya` int NOT NULL,
  `harga` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `id` int NOT NULL,
  `id_tahun_pelajaran` int NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_jurusan`
--

INSERT INTO `data_jurusan` (`id`, `id_tahun_pelajaran`, `nama_jurusan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'DKV', '2025-01-15 03:40:06', '2025-01-15 03:40:06', 0),
(2, 2, 'RPL', '2025-01-15 06:54:44', '2025-01-15 06:54:44', 0),
(3, 3, 'TKJ', '2025-01-15 06:54:58', '2025-01-15 06:54:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id` int NOT NULL,
  `id_tahun_pelajaran` int NOT NULL,
  `id_jurusan` int NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_kelas`
--

INSERT INTO `data_kelas` (`id`, `id_tahun_pelajaran`, `id_jurusan`, `nama_kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 1, '10 DKV', '2025-01-15', '2025-01-15 06:55:35', 0),
(2, 0, 2, '11 RPL', '2025-01-15', '2025-01-15 06:55:50', 0),
(3, 0, 3, '10 TKJ', '2025-01-15', '2025-01-15 06:56:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_seragam`
--

CREATE TABLE `data_seragam` (
  `id` int NOT NULL,
  `nama_seragam` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_seragam`
--

INSERT INTO `data_seragam` (`id`, `nama_seragam`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'putih ', '2025-01-15', '2025-01-15 18:55:34', 0),
(2, 'batik', '2025-01-16', '2025-01-16 03:00:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_stok`
--

CREATE TABLE `data_stok` (
  `id` int NOT NULL,
  `id_tahun_pelajaran` int NOT NULL,
  `id_jurusan` int NOT NULL,
  `id_kelas` int NOT NULL,
  `id_seragam` int NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `stok` int NOT NULL,
  `ceated_at` date NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_tahun_pelajaran`
--

CREATE TABLE `data_tahun_pelajaran` (
  `id` int NOT NULL,
  `nama_tahun_pelajaran` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `status_tahun_pelajaran` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_tahun_pelajaran`
--

INSERT INTO `data_tahun_pelajaran` (`id`, `nama_tahun_pelajaran`, `tanggal_mulai`, `tanggal_akhir`, `status_tahun_pelajaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2025-2026', '2025-01-15', '2026-01-15', '1', '2025-01-15 03:05:10', '2025-01-15 03:05:10', 0),
(2, '2026-2027', '2025-01-01', '2026-01-01', '1', '2025-01-15 03:39:06', '2025-01-15 03:39:06', 0),
(3, '2027-2028', '2025-01-01', '2026-01-01', '1', '2025-01-15 03:39:43', '2025-01-15 03:39:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `update_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `update_at`) VALUES
(0, 'erika', '090909', 0),
(1, 'admin', '1234', 1),
(2, 'root', '5678', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_biaya`
--
ALTER TABLE `data_biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_harga`
--
ALTER TABLE `data_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_jurusan`
--
ALTER TABLE `data_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_seragam`
--
ALTER TABLE `data_seragam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_stok`
--
ALTER TABLE `data_stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_tahun_pelajaran`
--
ALTER TABLE `data_tahun_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_biaya`
--
ALTER TABLE `data_biaya`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_harga`
--
ALTER TABLE `data_harga`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_jurusan`
--
ALTER TABLE `data_jurusan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_seragam`
--
ALTER TABLE `data_seragam`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_stok`
--
ALTER TABLE `data_stok`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_tahun_pelajaran`
--
ALTER TABLE `data_tahun_pelajaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
