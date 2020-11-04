-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 03, 2020 lúc 01:14 PM
-- Phiên bản máy phục vụ: 5.7.26
-- Phiên bản PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` text,
  `file` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `user_type`, `password`, `image`, `file`) VALUES
(1, 'admin', 'Admin', 'admin1@gmail.com', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', NULL, ''),
(10, 'dinhthi1211', 'dinhthi1211', 'dinhthi@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'public/images/1-1510967806416 (1).jpg', ''),
(11, 'dinhthi1211', 'dinhthi1211', 'dinhthi@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'public/images/1-1510967806416 (1).jpg', ''),
(22, 'dinhthi1211', 'dinhthi12112222222', 'dinhthi@gmail.com', 'user', '833344d5e1432da82ef02e1301477ce8', 'public/images/images.jpg', ''),
(20, 'admin', 'dinhthi1211', 'dinhthi@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', '', ''),
(23, 'admin111', 'dinhthi12112222222', 'dinhthi@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'public/images/images (1).png', ''),
(24, 'adminaaaa111', 'huongni@', 'niphamhuong2207@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', '', ''),
(25, 'huongni123abc', 'phamhuongni', 'niphamhuong2207@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', '', ''),
(26, 'huongni', 'phn', 'niphamhuong2207@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
