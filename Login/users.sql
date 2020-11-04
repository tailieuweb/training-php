-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2020 lúc 05:41 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `userlogin1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` text DEFAULT NULL,
  `file` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `user_type`, `password`, `image`, `file`) VALUES
(1, 'admin', 'Admin', 'admin1@gmail.com', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', NULL, ''),
(10, 'dinhthi1211', 'dinhthi1211', 'dinhthi@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'public/images/1-1510967806416 (1).jpg', ''),
(11, 'dinhthi1211', 'dinhthi1211', 'dinhthi@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'public/images/1-1510967806416 (1).jpg', ''),
(23, 'admin111', 'dinhthi12112222222', 'dinhthi@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'public/images/images (1).png', ''),
(29, 'admin', 'dinhthi1211', 'dinhthi@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'public/images/1-1510967806416 (1).jpg', 'C:\\xampp\\htdocs\\Login/public/libs/'),
(30, 'admin', 'dinhthi1211', 'dinhthi@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'public/images/images (1).png', 'C:\\xampp\\htdocs\\Login/public/libs/');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
