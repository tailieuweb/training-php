-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 04:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avata` text NOT NULL,
  `file` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `user_type`, `password`, `avata`, `file`) VALUES
(35, 'aaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaa', 'ad@gmail.com', 'user', '0cc175b9c0f1b6a831c399e269772661', 'img.jpg', ''),
(34, 'admin', 'admmin', 'ad@gmail.com', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'img1.jpg', ''),
(31, 'khai', 'khainguyen', 'nguyenvankhai2701@gmail.com', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin_profile.png', ''),
(32, 'nho', 'nhophan', 'ad@gmail.com', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '129089804.jpg', ''),
(36, 'aaaaaaaaaaaaaaaaaaa', 'ad', 'ad@gmail.com', 'user', '0cc175b9c0f1b6a831c399e269772661', 'img1.jpg', ''),
(37, 'thi', 'thic', 'ad@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'images.jpg', 'demo-topic-6.txt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
