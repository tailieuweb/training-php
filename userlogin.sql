-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2020 at 05:57 PM
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
-- Database: `userlogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `fullname`, `email`, `images`, `user_type`, `password`) VALUES
(1, 'admin', 'ádsasdfsdf', 'vana@gmail.com', 'ấdasdasfasfasf', 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `images` text DEFAULT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `user_type`, `password`, `images`, `file`) VALUES
(1, 'admin', 'Admin', 'admin1@gmail.com', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'jack-co-dong-thai-day-cung-ran-truoc-doi-voi-ke-tung-tin-boi-nho-danh-du.jpeg', ''),
(10, 'nho', 'dinhthi1211', 'dinhthi@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', '095820-ngoc-trinh_1.png', ''),
(11, 'dinhthi1211', 'dinhthi1211', 'dinhthi@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'public/images/1-1510967806416 (1).jpg', ''),
(22, 'dinhthi1211', 'dinhthi12112222222', 'dinhthi@gmail.com', 'user', '833344d5e1432da82ef02e1301477ce8', 'public/images/images.jpg', ''),
(20, 'admin123', 'dinhthi1211', 'dinhthi@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', '', ''),
(23, 'admin2222', 'dinhthi12112222222', 'dinhthi@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', '', ''),
(24, 'adminaaaa111', 'huongni@', 'niphamhuong2207@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', '', ''),
(25, 'huongni123abc', 'phamhuongni', 'niphamhuong2207@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', '', ''),
(26, 'huongni', 'phn', 'niphamhuong2207@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
