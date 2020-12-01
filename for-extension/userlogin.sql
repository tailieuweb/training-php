-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 01, 2020 lúc 06:20 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `userlogin`
--
CREATE DATABASE IF NOT EXISTS `userlogin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `userlogin`;

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
  `user_type` varchar(100) NOT NULL DEFAULT 'user',
  `password` varchar(100) NOT NULL,
  `verificationCode` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `version` int(11) NOT NULL DEFAULT 1,
  `presence` int(11) NOT NULL DEFAULT 0,
  `presence_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `user_type`, `password`, `verificationCode`, `status`, `version`, `presence`, `presence_time`) VALUES
(1, 'admin', 'Admin', 'admin@gmail.com', 'admin', '25f9e794323b453885f5181f1b624d0b', NULL, 1, 1, 1, '2020-11-30 09:42:36'),
(2, '7up', '7UP', '7up@gmail.com', 'user', '56f15aa99c5c267e7c0bbf5133d40225', 'd6d85aad7f839dc5df2165d0fa9a3cc7', 0, 1, 0, '2020-11-25 14:39:30'),
(34, 'Sprite', 'SPRITE', 'sprite@gmail.com', 'user', '56f15aa99c5c267e7c0bbf5133d40225', 'd6d85aad7f839dc5df2165d0fa9a3cc7', 0, 1, 0, '2020-11-25 14:39:35'),
(3, 'coca', 'CoCa', 'coca@gmail.com', 'user', '56f15aa99c5c267e7c0bbf5133d40225', 'd6d85aad7f839dc5df2165d0fa9a3cc7', 0, 1, 0, '2020-11-25 14:39:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
