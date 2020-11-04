-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2020 lúc 04:14 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

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
  `image_profile` varchar(255) NOT NULL,
  `custom_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `user_type`, `password`, `image_profile`, `custom_id`) VALUES
(1, 'admin', 'Admin Quáº£n Trá»‹', 'admin@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', 'mvhkcsdnjb98xgz7af205614786Thegioididong-icon.png', 'c4ca4238a0b923820dcc509a6f75849b1603719914'),
(2, 'vanhieu', 'Pháº¡m VÄƒn Hiá»‡u', 'vanhieutdc6@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'mhszdfac9v7knj8xgb691978863icon-facebook.png', 'c81e728d9d4c2f636f067f89cc14862c1603719914'),
(3, 'levantuyen', 'LÃª VÄƒn Tuyá»ƒn', 'levantuyen@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'jvhag87km9bnfsdxcz3392584581200px-YouTube_play_buttom_icon_(2013-2017).svg.png', 'eccbc87e4b5ce2fe28308fd9f2a7baf31603719914'),
(4, 'nguyenducduy', 'Nguyá»…n Äá»©c Duy', 'nguyenducduy@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', '8mhgvznc9x7faksbjd53697354note_10_plus_xanh.jpg', 'a87ff679a2f3e71d9181a67b7542122c1603719914'),
(5, 'huynhdailong', 'Huá»³nh Äáº¡i Long', 'huynhdailong@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'gcbnzfjks78dxm9ahv3510626123-bang-gia-can-ho-diamond-riverside-quan-8-chinh-sach-thanh-toan-2020.png', 'e4da3b7fbbce2345d7772b0674a318d51603719914'),
(6, 'dinhthanhduc', 'Äinh ThÃ nh Äá»©c', 'dinhthanhduc@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'sbgk7amc9jzn8fhvxd977259074download.jpg', '1679091c5a880faf6fb5e6087eb1b2dc1603719914');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
