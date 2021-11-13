-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2021 at 04:48 PM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c2tqLmlZ7r`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `user_id`, `cost`) VALUES
(1, 1, 1111),
(2, 2, 1111),
(3, 3, 1111),
(4, 4, 1111),
(5, 5, 1111);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fullname`, `email`, `type`, `password`) VALUES
(10, 'aaaaa', 'aaa', 'aaa@mail.com', 'user', '47bce5c74f589f4867dbd57e9ca9f808'),
(2, 'user1', 'User1', 'user1@gmail.com', 'user', '47bce5c74f589f4867dbd57e9ca9f808'),
(11, 'admin', 'admin', 'admin@mail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
