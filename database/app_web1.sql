-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 30, 2021 at 03:13 PM
-- Server version: 8.0.24
-- PHP Version: 8.0.6

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

DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `user_id`) VALUES
(1, 456);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `name`, `fullname`, `email`, `type`, `password`) VALUES
(51, 'a70f5395f2bc7573aced6a7fbcfc215f', '&lt;asdas&gt;asdasd&lt;/adsasd&gt; ', '', '', '', ''),
(50, 'a70f5395f2bc7573aced6a7fbcfc215f', '&lt;asdas&gt;asdasd&lt;/adsasd&gt; ', '', '', '', ''),
(52, '08c6a51dde006e64aed953b94fd68f0c', 'fsd ', '', '', '', ''),
(56, '5fa72358f0b4fb4f2c5d7de8c9a41846', 'zxc ', '', '', '', ''),
(57, '1943ad7439c70e644e3571b9bb4b55e6', 'sdf ', 'sdf', '', '', 'd9729feb74992cc3482b350163a1a010'),
(55, 'd4b2758da0205c1e0aa9512cd188002a', 'dsf ', '', '', '', ''),
(49, 'b309c4482163e9d756cf887c17db1a34', '&lt;&gt;?&lt;/&gt; &lt;&gt;&lt;/&gt;', '', '', '', '74be16979710d4c4e7c6647856088456'),
(45, 'bdb3d3769a13988452d59d01f57d4459', 'dfg ', 'dfgdfg', 'fgdfg@sefs', 'guest', 'dfg'),
(46, '584447d33021f0d9b6dd00a3651b7308', 'a ', 'a', 'a@gmail.com', 'guest', 'a');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
