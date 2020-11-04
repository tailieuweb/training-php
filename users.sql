-- phpMyAdmin SQL Dump
<<<<<<< Updated upstream
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2020 at 04:05 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12
=======
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 04, 2020 lúc 07:23 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21
>>>>>>> Stashed changes

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
<<<<<<< Updated upstream
-- Database: `users`
=======
-- Cơ sở dữ liệu: `users`
>>>>>>> Stashed changes
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
<<<<<<< Updated upstream
=======
  `id_encode` text NOT NULL,
>>>>>>> Stashed changes
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image_profile` varchar(255) NOT NULL,
<<<<<<< Updated upstream
=======
  `version` int(11) NOT NULL,
>>>>>>> Stashed changes
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

<<<<<<< Updated upstream
INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `user_type`, `password`, `image_profile`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin_profile.png'),
(4, 'thinh', 'thinh', 'thinhnguyen.npt0101@gmail.com', 'user', 'c81e728d9d4c2f636f067f89cc14862c', 'user_profile.png'),
(5, 'vuong', 'vuongnguyen', 'vuong@gmail.com', 'user', 'c81e728d9d4c2f636f067f89cc14862c', 'user_profile.png'),
(41, 'abc', 'van a', 'a11@gmail.com', 'user', '8a1148a74ba479fcaca5e34f5de73d45', 'user_profile.png'),
(42, 'abvd', 'van a', 'avna@gmail.com', 'user', '6c25acaccd1845b9d3bc2d1f54b81c73', 'user_profile.png');
=======
INSERT INTO `users` (`id`, `id_encode`, `username`, `fullname`, `email`, `user_type`, `password`, `image_profile`, `version`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'admin', 'Admin', 'admin1@gmail.com', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '', 0),
(2, 'c81e728d9d4c2f636f067f89cc14862c', 'user', 'User Tien', 'user1@gmail.com', 'user', '202cb962ac59075b964b07152d234b70', '', 1);
>>>>>>> Stashed changes
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
