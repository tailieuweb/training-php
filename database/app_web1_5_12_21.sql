-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 05:02 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `user_id`, `cost`) VALUES
(1, 1, 11),
(2, 2, 123),
(3, 3, 1111),
(105, 2, 0),
(110, 0, 0),
(111, 1, 1.3333),
(112, 1, 1),
(113, 0, 0),
(114, 0, 0),
(115, 1, 0),
(116, 1, 1.3),
(117, 1, 1.3),
(118, 1, 1.3),
(120, 0, 1111),
(126, 0, 1111),
(132, 0, 1111),
(138, 0, 1111),
(144, 0, 1111),
(150, 0, 1111),
(156, 0, 1111);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fullname`, `email`, `type`, `password`) VALUES
(198, 'test2insert', 'test2', 'test2@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(123, 'test2last', 'test2', 'test2@gmail.com', 'user', '202cb962ac59075b964b07152d234b70'),
(5, 'nhu', 'lenhu', 'khanhu@gmail.com', 'user', '202cb962ac59075b964b07152d234b70'),
(185, '', '', '058@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(184, '', '', 'kh?nh?@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(9, 'nhu', 'khanhu', 'nhu@gmail.com', '', '202cb962ac59075b964b07152d234b70'),
(199, 'nhu', 'khanhu', 'khanhu@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(201, '', '', '', 'user', 'd41d8cd98f00b204e9800998ecf8427e'),
(15, 'test2last', 'test2', 'test2@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(16, '', 'testinsert', 'testinsert@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(17, 'testinsert', '', 'testinsert@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(18, 'testinsert', 'testinsert', '', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(19, 'testinsert', 'testinsert', 'testinsert@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99'),
(20, 'testinsert', 'testinsert', 'testinsert@gmail.com', 'user', 'd41d8cd98f00b204e9800998ecf8427e'),
(189, '', '', '', '', 'c803fa34350d0f0d52a7b3e6f4771db5'),
(21, 'nhu', 'khanhu', 'khanhu@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(200, '', '', '', '', 'c803fa34350d0f0d52a7b3e6f4771db5'),
(197, '', '', '%!?$@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(196, '', '', '058@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(28, '', '', 'kh?nh?@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(29, '', '', '058@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(30, '', '', '%!?$@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(32, '', 'testinsert', 'testinsert@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(33, 'testinsert', '', 'testinsert@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(34, 'testinsert', 'testinsert', '', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(35, 'testinsert', 'testinsert', 'testinsert@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99'),
(36, 'testinsert', 'testinsert', 'testinsert@gmail.com', 'user', 'd41d8cd98f00b204e9800998ecf8427e'),
(37, 'nhu', 'khanhu', 'khanhu@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(178, '', '', '', '', 'c803fa34350d0f0d52a7b3e6f4771db5'),
(177, 'nhu', 'khanhu', 'khanhu@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(195, '', '', 'kh?nh?@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(240, '', '', '058@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(239, '', '', 'kh?nh?@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(262, '', '', '058@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(238, '', '2058', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(188, 'nhu', 'khanhu', 'khanhu@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(49, 'testinsert', '', 'testinsert@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(50, 'nhu', 'lenhu', 'khanhu@gmail.com', 'user', '202cb962ac59075b964b07152d234b70'),
(51, 'testinsert', 'testinsert', 'testinsert@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99'),
(112, 'test2last', 'test2', 'test2@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(113, 'nhu', 'khanhu', 'khanhu@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(175, 'test2insert', 'test2', 'test2@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(174, 'test2insert', 'test2', 'test2@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(173, 'test2insert', 'test2', 'test2@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(120, 'nhu', 'lenhu', 'khanhu@gmail.com', 'user', '202cb962ac59075b964b07152d234b70'),
(216, '', '2058', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(215, '123', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(124, 'nhu', 'khanhu', 'khanhu@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(172, 'test2last', 'test2', '', 'user', '202cb962ac59075b964b07152d234b70'),
(214, '', '', '', '058', 'd41d8cd98f00b204e9800998ecf8427e'),
(213, '', '', '', 'who', 'd41d8cd98f00b204e9800998ecf8427e'),
(169, 'test2last', 'test2', '', 'user', '202cb962ac59075b964b07152d234b70'),
(208, '', '', '%!?$@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(209, 'test2insert', 'test2', 'test2@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(167, 'test2last', 'test2', 'test2@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(166, '', '', '%!?$@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(165, '', '', '058@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(207, '', '', '058@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(206, '', '', 'kh?nh?@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(205, '', '2058', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(254, 'nhu', 'khanhu', 'khanhu@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(157, 'nhu', 'khanhu', 'khanhu@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(249, '', '2058', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(159, 'test2insert', 'test2', 'test2@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(217, '', '', 'kh?nh?@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(210, 'nhu', 'khanhu', 'khanhu@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(221, 'nhu', 'khanhu', 'khanhu@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(220, 'test2insert', 'test2', 'test2@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99'),
(266, 'test2insert', 'test2', 'test2@gmail.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
