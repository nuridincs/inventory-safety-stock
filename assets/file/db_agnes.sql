-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 09, 2023 at 09:03 PM
-- Server version: 8.0.34-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `app_barang_retur`
--

CREATE TABLE `app_barang_retur` (
  `id` bigint NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `reject_reason` varchar(100) DEFAULT NULL,
  `receipt_number` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'sedang di proses',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `bunk_number` varchar(100) DEFAULT NULL,
  `item_out_date` datetime DEFAULT NULL,
  `id_staff` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `app_barang_retur`
--

INSERT INTO `app_barang_retur` (`id`, `item_name`, `category`, `reject_reason`, `receipt_number`, `status`, `created_at`, `bunk_number`, `item_out_date`, `id_staff`) VALUES
(6, 'daster', 'kualitas', 'barang tidak lengkap', 'PID230800043', 'selesai', '2023-08-01 23:46:03', '1', '2023-08-02 12:48:32', 0),
(7, 'Topi', 'kualitas', 'bolong bolong', 'PID23080056', 'selesai', '2023-08-01 23:46:52', '2', '2023-08-02 12:48:50', 0),
(8, 'sepatu', 'quantity', 'barang tidak sesuai ', 'PID2308040058', 'selesai', '2023-08-05 16:24:01', '4', '2023-08-05 17:58:29', 0),
(9, 'sepatu', 'kualitas', 'barang tidak sesuai ', 'PID2308040060', 'selesai', '2023-08-05 16:24:46', '5', '2023-08-05 17:59:12', 0),
(13, 'test barang resi otomatis', 'kualitas', 'tidak sesuai pesanan', 'RESI-107311', 'sedang di proses', '2023-08-06 23:51:39', '1', '2023-08-07 19:12:37', 3),
(14, 'handuk', 'quantity', 'barang tidak sesuai ', 'RESI-114130', 'sedang di proses', '2023-08-07 19:05:15', '1', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `app_customers`
--

CREATE TABLE `app_customers` (
  `id` bigint NOT NULL,
  `nomor_telepon` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `app_customers`
--

INSERT INTO `app_customers` (`id`, `nomor_telepon`, `nama`, `alamat`, `kode_pos`, `created_at`) VALUES
(3, '8127832436', 'santi susanti', 'aren jaya 2', '123456', '2023-08-02 10:48:07'),
(4, '081265437808', 'Sartina', 'Margahayu', '40227', '2023-08-05 15:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `app_staff`
--

CREATE TABLE `app_staff` (
  `id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nomor_telepon` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `app_staff`
--

INSERT INTO `app_staff` (`id`, `nama`, `alamat`, `email`, `nomor_telepon`, `created_at`) VALUES
(3, 'kiwil', 'Bekasi Barat', 'kiwil@gmail.com', '081273234', '2023-08-06 23:50:32'),
(4, 'Dita', 'Cibitung', 'dita@gmail.com', '879763242342', '2023-08-06 23:50:50'),
(5, 'Tika', 'Bekasi barat', 'atikah@gmail.com', '081282513233', '2023-08-07 19:04:03');

-- --------------------------------------------------------
--
-- Table structure for table `app_users`
--

CREATE TABLE `app_users` (
  `id` int NOT NULL,
  `id_users_role` int DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`id`, `id_users_role`, `nama`, `email`, `password`) VALUES
(1, 1, 'Admin test', 'admin@gmail.com', 'c06db68e819be6ec3d26c6038d8e8d1f'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_barang_retur`
--
ALTER TABLE `app_barang_retur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_customers`
--
ALTER TABLE `app_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_staff`
--
ALTER TABLE `app_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role` (`id_users_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_barang_retur`
--
ALTER TABLE `app_barang_retur`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `app_customers`
--
ALTER TABLE `app_customers`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `app_staff`
--
ALTER TABLE `app_staff`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
