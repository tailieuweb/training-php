-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2021 lúc 05:11 AM
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
-- Cấu trúc bảng cho bảng `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stk` int(11) NOT NULL,
  `SoDu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bank`
--

INSERT INTO `bank` (`id`, `name`, `fullname`, `sdt`, `email`, `stk`, `SoDu`) VALUES
(1, 'Vũ', 'Phan Hoàng Vũ', 1343, '19211tt1343@mail.tdc.edu.vn', 129021286, 0),
(2, 'Hậu', 'Phạm Nguyễn Trung Hậu', 4361, '18211tt4361@mail.tdc.edu.vn', 1111111111, 0),
(3, 'Tuấn', 'Huỳnh Quốc Tuấn', 2313, '19211tt2313@mail.tdc.edu.vn', 222222222, 0),
(4, 'Tình', 'Nguyễn Trọng Tình', 1111, 'trongtinh2k@gmail.com', 333333333, 0),
(5, 'Trí', 'Trần Phước Minh Trí', 2222, 'tranphuocminhtri.tdc2019@gmail.com', 55555555, 0),
(6, 'Hau', 'Nguyen Trong Tinhnjmmmmmmmmmmmmmmmmmmmmmmmmm', 123123, 'trongtinh2k@gmail.com', 1222, 0),
(7, 'Test Them', 'Test Them', 123456, 'ajshdjas@mailaaaaaaaaaaa', 12332123, 0),
(8, 'aaaaaaa', 'aaaa', 333333, 'trongtinh2k@gmailc.om', 11111111, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `fullname`, `email`, `type`, `password`) VALUES
(17, 'user', 'user', 'user@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b'),
(18, 'admin', 'admin', 'admin@gmail.com', 'admin', 'c4ca4238a0b923820dcc509a6f75849b'),
(19, 'hacker', 'hacker', 'hacker@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bank`
--
ALTER TABLE `bank`
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
-- AUTO_INCREMENT cho bảng `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
