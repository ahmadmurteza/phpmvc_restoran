-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 03:39 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoranku`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` varchar(10) NOT NULL,
  `name_kategori` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `name_kategori`, `description`, `photo`) VALUES
('JS-01', 'Jusss', 'Bermacam macam menu jus', 'lime-juice-and-fruit-shake-on-glass-452737.jpg'),
('KP-01', 'Kopi', 'Bermacam macam menu kopi', 'happy-coffee-6347.jpg'),
('NS-01', 'Nasi', 'Bermacam macam menu nasi', 'appetizer-blur-bowl-ceramic-343871.jpg'),
('SK-01', 'Steak', 'Bermacam macam menu steak', 'selective-focus-photography-of-beef-steak-with-sauce-675951.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `status` enum('active','non-active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `nama`, `no_meja`, `status`) VALUES
(7, '', 7, 'non-active'),
(8, '', 8, 'non-active'),
(9, '', 9, 'non-active'),
(10, '', 10, 'non-active'),
(11, '', 11, 'non-active'),
(12, '', 12, 'non-active'),
(13, '', 13, 'non-active'),
(14, '', 14, 'non-active'),
(15, '', 15, 'non-active'),
(16, '', 16, 'non-active'),
(17, '', 17, 'non-active'),
(18, '', 18, 'non-active'),
(19, '', 19, 'non-active'),
(20, '', 20, 'non-active'),
(21, '', 80, 'non-active'),
(22, '', 1221, 'non-active'),
(23, '', 111, 'non-active'),
(26, '', 333, 'non-active'),
(27, '', 133, 'non-active'),
(28, '', 1, 'non-active'),
(29, '', 2, 'non-active'),
(30, '', 3, 'non-active'),
(31, '', 4, 'non-active'),
(32, '', 5, 'non-active'),
(33, '', 123, 'non-active');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `kd_menu` varchar(10) NOT NULL,
  `name_menu` varchar(50) NOT NULL,
  `kategori_id` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` enum('tersedia','tidak_tersedia') NOT NULL,
  `photo` varchar(255) NOT NULL,
  `terbeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`kd_menu`, `name_menu`, `kategori_id`, `harga`, `description`, `status`, `photo`, `terbeli`) VALUES
('JS', 'Jus mangga', 'JS-01', 10000, 'Jus segar mangga', 'tersedia', 'lime-juice-and-fruit-shake-on-glass-452737.jpg', 20),
('KP', 'Kopi JOSSS', 'KP-01', 5000, 'Kopi dengan batu arang', 'tersedia', 'happy-coffee-6347.jpg', 94),
('NS', 'Nasi Goreng', 'NS-01', 10000, 'Nasi goreng khas banjarmasin memangnya ada ya', 'tersedia', 'appetizer-blur-bowl-ceramic-343871.jpg', 130),
('SK', 'Steak Sapi', 'SK-01', 25000, 'Steak daging sapi', 'tersedia', 'selective-focus-photography-of-beef-steak-with-sauce-675951.jpg', 55);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `meja_id` int(11) NOT NULL,
  `menu_kd` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('belum','sudah') NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `rid` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rid`, `role`) VALUES
(1, 'admin'),
(2, 'owner'),
(3, 'kasir'),
(4, 'koki'),
(6, 'default');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `meja_id` int(11) NOT NULL,
  `pegawai` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `tunai` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `meja_id`, `pegawai`, `no_telp`, `nama`, `total`, `tunai`, `kembalian`, `waktu`) VALUES
(9, 28, 'JoelÂ M Kennerley', '0353257335', 'teza', 755000, 800000, 45000, '2020-07-08 14:11:00'),
(10, 28, 'JoelÂ M Kennerley', '0353257335', 'satu', 5000, 10000, 5000, '2020-07-08 14:12:18'),
(11, 28, 'JoelÂ M Kennerley', '0353257335', 'satu', 1000000, 2000000, 1000, '2020-07-08 18:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  `token_expire` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `rid`, `name`, `email`, `password`, `phone`, `gender`, `dob`, `token`, `token_expire`, `created_at`, `verified`, `deleted`) VALUES
(13, 1, 'JoelÂ M Kennerley', 'teza@gmail.com', '$2y$10$P7XCKzbHvwtCrDdoPlWb7esl3ZJVLika3DjcB.gC0htf7fzFaLzSm', '0353257335', 'male', '2020-06-01', '', '2020-06-10 18:27:17', '2020-06-09 15:59:54', 1, 1),
(14, 2, 'doni', 'zxc@gmail.com', '$2y$10$lugFJlBZYVakiTtP/zoeKOG4mbUjPEGuI0MWbbe8bdMyqvu.qFuzC', '01250575833', 'male', '2020-06-01', '', '2020-06-13 14:55:37', '2020-06-09 16:00:38', 1, 1),
(15, 4, 'akmal', 'qwe@gmail.com', '$2y$10$AgIqKEb2VTc2cq8PXy9mLe4G4YcwpJ38aaL0ehPZTMOuCpHolbgSO', '01250575833', 'male', '2020-06-09', '', '2020-06-13 14:55:30', '2020-06-09 16:04:31', 1, 1),
(17, 3, 'kaku kaka', 'kaku@gmail.com', '$2y$10$obQuog6fPNqC0EPwIV4IS.ilJedmQiIA8.azvCVBlFfFBsIDGSRlS', '01250575833', 'male', '2020-07-01', '', '2020-07-09 13:37:53', '2020-07-09 13:29:42', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`kd_menu`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `orders_ibfk_1` (`meja_id`),
  ADD KEY `menu_kd` (`menu_kd`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `meja_id` (`meja_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rid` (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kd_kategori`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`meja_id`) REFERENCES `meja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`menu_kd`) REFERENCES `menu` (`kd_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`meja_id`) REFERENCES `meja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `roles` (`rid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
