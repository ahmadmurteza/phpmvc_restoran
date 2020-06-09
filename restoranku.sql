-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 05:54 PM
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
(2, 6, 'Ahmad Murteza akbari', 'teza@gmail.com', 'qweasd', '01250575833', 'male', '2020-06-08', '', '2020-06-08 17:12:18', '2020-06-08 17:12:18', 0, 1),
(3, 6, 'Ahmad Murteza akbari', 'teza@gmail.com', 'qweasd', '01250575833', 'male', '2020-06-02', '', '2020-06-09 15:03:43', '2020-06-09 15:03:43', 0, 1),
(9, 6, 'Ahmad Murteza akbari', 'qwe@gmail.com', 'qweasd', '01250575833', 'male', '2020-06-02', '', '2020-06-09 15:16:26', '2020-06-09 15:16:26', 0, 1),
(10, 6, 'asdasd', 'asas@gmail.com', 'qweasd', '01250575833', 'male', '2020-06-01', '', '2020-06-09 15:50:52', '2020-06-09 15:50:52', 0, 1),
(11, 6, 'Ahmad Murteza akbari', 'asdx@gmail.com', 'qweasd', '01250575833', 'male', '2020-06-15', '', '2020-06-09 15:51:46', '2020-06-09 15:51:46', 0, 1),
(12, 6, 'JoelÂ M Kennerley', 'xx@aa', 'qweasd', '0353257335', 'male', '2020-06-08', '', '2020-06-09 15:52:37', '2020-06-09 15:52:37', 0, 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
