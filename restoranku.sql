-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 09:13 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, 'Ahmad Murteza akbari', 1, 'active'),
(2, 'teza', 2, 'active'),
(3, '', 3, 'non-active'),
(4, '', 4, 'non-active'),
(5, 'Ahmad Murteza akbari', 5, 'active'),
(6, '', 6, 'non-active'),
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
(20, '', 20, 'non-active');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'waiter'),
(3, 'owner'),
(4, 'koki'),
(5, 'customer'),
(6, 'default');

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
(14, 6, 'Ahmad Murteza akbari', 'qwe@gmail.com', '$2y$10$lugFJlBZYVakiTtP/zoeKOG4mbUjPEGuI0MWbbe8bdMyqvu.qFuzC', '01250575833', 'male', '2020-06-01', '', '2020-06-09 16:00:38', '2020-06-09 16:00:38', 0, 1),
(15, 6, 'Ahmad Murteza akbari', 'zxc@gmail.com', '$2y$10$AgIqKEb2VTc2cq8PXy9mLe4G4YcwpJ38aaL0ehPZTMOuCpHolbgSO', '01250575833', 'male', '2020-06-09', '', '2020-06-10 14:05:37', '2020-06-09 16:04:31', 1, 1),
(16, 6, 'Ahmad Murteza akbari', 'zxvvv@a', '$2y$10$jQZDcuQ0ccJ.H5yHZ5ulguIib4g4l7vbv2LuFy7VOsXQXjOZ/npjy', '01250575833', 'male', '2020-06-14', '', '2020-06-10 14:36:38', '2020-06-10 14:36:38', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
