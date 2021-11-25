-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 10:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_web1`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id_bank` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id_bank`, `user_id`, `cost`) VALUES
(5, 8, 25),
(7, 7, 15),
(28, 14, 4567),
(49, 1, 854),
(50, 38, 85),
(57, 47, 100),
(60, 1234567891, 200),
(94, 6, 100.56);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fullname`, `email`, `type`, `password`) VALUES
(1, 'gia nam', 'nguyen gia name', 'example2001@gmail.com', 'admin', '1234'),
(6, 'Thanh An', '6', 'example201@gmail.com', 'user', '1234'),
(7, 'thanh nhu', '12', 'asdd85@gmail.com', 'admin', '1234'),
(8, 'gia nam', 'nguyen gia han', 'example@gmail.com', 'user', '1234'),
(14, 'gia nam 2001', 'nguyen gia name', 'example3@gmail.com', 'admin', '1234'),
(38, '-2', 'thanh an', 'fxnam201@gmail.com', 'user', '1234'),
(39, 'test2', 'Nguyên Thành An', 'fxannguyen201@gmail.com', 'user', '1234'),
(41, '2test', 'Thanh Phuc', 'fxnam123@gmail.com', 'user', '1234'),
(47, 'gia nam', 'nguyen gia name', 'example4@gmail.com', 'admin', '1234'),
(50, 'test20', 'test20', 'test20@gmail.com', 'user', '1234'),
(1234567891, 'Thanh An', 'Thanh An Nguyen', 'example205@gmail.com', 'user', '1234'),
(1234567893, '2.5', '2.5', 'test25@gmail.com', 'admin', '1234'),
(1234567897, 'test26', 'test26', 'test26@gmail.com', 'user', '1234'),
(1234567901, 'Nguyễn Thành An', 'thanh an', 'fxnguyenan191101@gmail.com', 'admin', '1234'),
(1234567906, 'gia nam', 'nguyen gia name', 'example99@gmail.com', 'admin', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id_bank`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234567917;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banks`
--
ALTER TABLE `banks`
  ADD CONSTRAINT `banks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
