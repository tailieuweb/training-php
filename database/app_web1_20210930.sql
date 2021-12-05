-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2021 lúc 01:44 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `app_web1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cost` float NOT NULL,
  `version` double(5,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banks`
--

INSERT INTO `banks` (`id`, `user_id`, `cost`, `version`) VALUES
(1, 1, 1, 1.7),
(2, 1, 13, 0.1),
(3, 2, 11, 0.0),
(4, 3, 5, 1.6),
(6, 4, 14, 0.0),
(7, 5, 20, 0.0),
(8, 1, 100, 0.0),
(9, 8, 0, 0.0),
(17, 1, 1, 0.0),
(18, 1, 100, 0.0),
(19, 18, 0, 0.0),
(20, 0, 0, 0.0),
(21, 0, 0, 0.0),
(22, 1, 1, 0.0),
(23, 1, 100, 0.0),
(24, 23, 0, 0.0),
(25, 0, 0, 0.0),
(26, 0, 0, 0.0),
(27, 1, 1, 0.0),
(28, 1, 100, 0.0),
(29, 28, 0, 0.0),
(30, 0, 0, 0.0),
(31, 0, 0, 0.0),
(32, 1, 1, 0.0),
(33, 1, 100, 0.0),
(34, 33, 0, 0.0),
(35, 0, 0, 0.0),
(36, 0, 0, 0.0),
(37, 1, 1, 0.0),
(38, 1, 100, 0.0),
(39, 38, 0, 0.0),
(40, 0, 0, 0.0),
(41, 0, 0, 0.0),
(42, 1, 1, 0.0),
(43, 1, 100, 0.0),
(44, 43, 0, 0.0),
(45, 0, 0, 0.0),
(46, 0, 0, 0.0),
(47, 1, 1, 0.0),
(48, 1, 100, 0.0),
(49, 48, 0, 0.0),
(50, 0, 0, 0.0),
(51, 0, 0, 0.0),
(52, 1, 1, 0.0),
(53, 1, 100, 0.0),
(54, 53, 0, 0.0),
(55, 0, 0, 0.0),
(56, 0, 0, 0.0),
(57, 1, 1, 0.0),
(58, 1, 100, 0.0),
(59, 58, 0, 0.0),
(60, 0, 0, 0.0),
(61, 0, 0, 0.0),
(62, 1, 1, 0.0),
(63, 1, 100, 0.0),
(64, 63, 0, 0.0),
(65, 0, 0, 0.0),
(66, 0, 0, 0.0),
(67, 1, 1, 0.0),
(68, 1, 100, 0.0),
(69, 68, 0, 0.0),
(70, 0, 0, 0.0),
(71, 0, 0, 0.0),
(72, 1, 1, 0.0),
(73, 1, 100, 0.0),
(74, 73, 0, 0.0),
(75, 0, 0, 0.0),
(76, 0, 0, 0.0),
(77, 1, 1, 0.0),
(78, 1, 100, 0.0),
(79, 78, 0, 0.0),
(80, 0, 0, 0.0),
(81, 0, 0, 0.0),
(82, 1, 1, 0.0),
(83, 1, 100, 0.0),
(84, 83, 0, 0.0),
(85, 0, 0, 0.0),
(86, 0, 0, 0.0),
(87, 1, 1, 0.0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` double(5,1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `fullname`, `email`, `type`, `password`, `version`) VALUES
(11, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(2, 'test2', '', '', '', '0cc175b9c0f1b6a831c399e269772661', 0.0),
(3, 'hacker1', '', '', '', '0cc175b9c0f1b6a831c399e269772661', 0.0),
(4, 'test3', '', '', '', '0cc175b9c0f1b6a831c399e269772661', 0.0),
(35, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(10, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(7, '111', '', '', '', '0cc175b9c0f1b6a831c399e269772661', 0.0),
(9, 'test7', '', '', '', '698d51a19d8a121ce581499d7b701668', 0.0),
(12, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(13, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(14, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0),
(15, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(16, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(17, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(18, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(19, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0),
(20, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(21, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(22, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(23, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(24, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0),
(25, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(26, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(27, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(28, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(29, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0),
(30, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(31, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(32, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(33, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(34, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0),
(80, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(50, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(55, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(65, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(75, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(42, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(43, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(44, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0),
(45, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(46, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(47, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(48, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(49, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0),
(51, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(52, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(53, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(54, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0),
(56, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(57, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(58, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(59, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0),
(60, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(61, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(62, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(63, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(64, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0),
(66, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(67, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(68, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(69, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0),
(71, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(72, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(73, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(74, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0),
(76, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(77, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(78, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(79, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0),
(81, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(82, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(83, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(84, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0),
(85, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(86, 'user1', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0.0),
(87, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(88, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0.0),
(89, '1', '', '', '', 'c4ca4238a0b923820dcc509a6f75849b', 0.0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
