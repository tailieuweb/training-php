-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 14, 2021 at 06:32 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cost` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `user_id`, `cost`) VALUES
(1, 2, 11),
(2, 1, 11),
(3, 2, 11),
(4, 3, 11),
(5, 4, 2),
(6, 3, 21),
(7, 23, 4234),
(8, 5, 3),
(9, 4, 2),
(10, 1, 11),
(11, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fullname`, `email`, `type`, `password`) VALUES
(1, 'hacker ne', '', '', '', '5a105e8b9d40e1329780d62ea2265d8a'),
(2, 'test2', '', '', '', '098f6bcd4621d373cade4e832627b4f6'),
(3, 'hacker1', '', '', '', '2ba2a8ac968a7a2b0a7baa7f2fef18d2'),
(4, 'test3', '', '', '', '8ad8757baa8564dc136c1e07507f4a98'),
(27, '<strong>a</strong>', '202cb962ac59075b964b07152d234b70', 'Nguyá»…n Minh Tiáº¿n', 'nguyenminhtien1808@gmail.com', 'admin'),
(28, '<strong>a</strong>', '202cb962ac59075b964b07152d234b70', 'Nguyá»…n Minh Tiáº¿n', 'nguyenminhtien1808@gmail.com', 'admin'),
(29, '<strong>a</strong>', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 'admin'),
(55, '<strong>aaa</strong>', 'nguyenminhtien', 'nguyenminthien@gmail.com', 'admin', '123'),
(56, '	<strong>aaa</strong>', '202cb962ac59075b964b07152d234b70', '	<strong>aaa</strong>', '', 'admin'),
(57, '<strong>aaa</strong>', '202cb962ac59075b964b07152d234b70', '', '', 'user'),
(58, '	<strong>aaa</strong>', '202cb962ac59075b964b07152d234b70', '', '', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
