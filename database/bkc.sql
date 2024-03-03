-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2024 at 02:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkc`
--
CREATE DATABASE IF NOT EXISTS `bkc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bkc`;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `updated_at`, `created_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL),
(3, 1, NULL, NULL),
(4, 5, NULL, NULL),
(5, 1, NULL, NULL),
(6, 6, NULL, NULL),
(7, 10, NULL, NULL),
(8, 20, NULL, NULL),
(9, 9, NULL, NULL),
(10, 7, NULL, NULL),
(11, 7, NULL, NULL),
(12, 7, NULL, NULL),
(13, 8, NULL, NULL),
(14, 1, NULL, NULL),
(15, 5, NULL, NULL),
(16, 19, NULL, NULL),
(17, 18, NULL, NULL),
(18, 15, NULL, NULL),
(19, 20, NULL, NULL),
(20, 9, NULL, NULL),
(21, 8, NULL, NULL),
(22, 5, NULL, NULL),
(23, 9, NULL, NULL),
(24, 10, NULL, NULL),
(25, 11, NULL, NULL),
(26, 12, NULL, NULL),
(27, 12, NULL, NULL),
(28, 9, NULL, NULL),
(29, 5, NULL, NULL),
(30, 7, NULL, NULL),
(31, 8, NULL, NULL),
(32, 5, NULL, NULL),
(33, 5, NULL, NULL),
(34, 14, NULL, NULL),
(35, 15, NULL, NULL),
(36, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `updated_at`, `created_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 2, 1, NULL, NULL),
(6, 2, 9, NULL, NULL),
(7, 3, 1, NULL, NULL),
(8, 4, 1, NULL, NULL),
(9, 4, 1, NULL, NULL),
(10, 4, 1, NULL, NULL),
(11, 5, 1, NULL, NULL),
(12, 5, 1, NULL, NULL),
(13, 5, 1, NULL, NULL),
(14, 6, 1, NULL, NULL),
(15, 7, 1, NULL, NULL),
(16, 7, 1, NULL, NULL),
(17, 8, 1, NULL, NULL),
(18, 8, 1, NULL, NULL),
(19, 9, 1, NULL, NULL),
(20, 9, 1, NULL, NULL),
(21, 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_description` text NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_description`, `updated_at`, `created_at`) VALUES
(1, 'MacBook Air M2 (13-inch)', 1099, 'CPU: M2 (8-core) / GPU: M2 (8- or 10-core) / RAM: 8GB, 16GB, 24GB / Storage: 256GB, 512GB, 1TB, 2TB / Display: 13.6-inch IPS display, 2560 x 1664, 60Hz, no touch option / Dimensions: 11.97 x 8.46 x 0.44 inches / Weight: 2.7 pounds', NULL, NULL),
(2, 'Acer Chromebook Spin 714 ', 469, 'CPU: M2 (8-core) / GPU: M2 (8- or 10-core) / RAM: 8GB, 16GB, 24GB / Storage: 256GB, 512GB, 1TB, 2TB / Display: 13.6-inch IPS display, 2560 x 1664, 60Hz, no touch option / Dimensions: 11.97 x 8.46 x 0.44 inches / Weight: 2.7 poundsCPU: Intel Core i5-1335U / GPU: Intel Iris Xe / RAM: 8GB / Storage: 256GB NVMe SSD / Display: 14-inch IPS, 1920 x 1200, multitouch / Dimensions: 12.31 x 8.82 x 0.71 inches / Weight: 3.1 pounds', NULL, NULL),
(3, 'HP Spectre x360 13.5', 1510, 'CPU: Intel Core i5-1335U, i7-1355U / GPU: Intel Iris Xe / RAM: 16GB, 32GB / Storage: 512GB, 1TB, 2TB / Display: 13.5-inch IPS, 60Hz, 1920 x 1280 / OLED, 3000 x 2000, touch option / Dimensions: 11.75 x 8.67 x 0.67 inches / Weight: 3.01 pounds', NULL, NULL),
(4, 'Asus ROG Strix Scar 17 X3D', 3077, 'CPU: AMD Ryzen 9 7945HX3D / GPU: Nvidia Geforce RTX 4090 / RAM: 32GB / Storage: 1TB / Display: 17-inch IPS QHD, 240Hz display, 3ms, 300 nits, 100 percent DCI-P3 / Dimensions: 15.55 x 11.1 x 1.11 inches / Weight: 6.51 pounds', NULL, NULL),
(5, '16-inch MacBook Pro with M3 Pro / Max (2023)', 2499, 'CPU: M3 Pro, M3 Max / GPU: M3 Pro, M3 Max / RAM: 18GB - 36GB (M3 Pro), 36GB - 128 GB (M3 Max) / Storage: 512GB, 1TB, 2TB, 4TB, 8TB / Display: 14.2 / 16.2-inch Liquid Retina XDR, 3024 x 1964 / 3456 x 2234, adaptive refresh up to 120Hz, no touch option / Dimensions: 12.31 x 8.71 x 0.61 / 14.01 x 9.77 x 0.66 inches / Weight: 3.5 / 4.7 pounds (M3 Pro), 3.6 / 4.8 pounds (M3 Max)', NULL, NULL),
(6, 'Asus ROG Zephyrus G14', 849, 'CPU: AMD Ryzen 9 7940 HS / GPU: GeForce RTX 4070, RTX 4080 / RAM: 8GB, 16GB / Storage: 512GB, 1TB / Display: 14-inch IPS, 2560 x 1600, 120Hz, no touch option / Dimensions: 12.28 x 8.94 x 0.73 / Weight: 3.64 poundsCPU: Intel Core i5-1340P / i7-1360P / 17-1370P, AMD Ryzen 7 7840U / GPU: Intel UHD / Iris Xe, Radeon 700M / RAM: 8GB, 16GB, 32GB, 64GB / Storage: 250GB, 500GB, 1TB, 2TB / Display: 13.5 inch IPS, 2256 x 1540, 60Hz, no touch option / Dimensions: 11.68 x 9.01 x 0.62 inches / Weight: 2.87 pounds', NULL, NULL),
(7, 'Framework Laptop 13 (AMD)', 1099, 'CPU: M2 (8-core) / GPU: M2 (8- or 10-core) / RAM: 8GB, 16GB, 24GB / Storage: 256GB, 512GB, 1TB, 2TB / Display: 13.6-inch IPS display, 2560 x 1664, 60Hz, no touch option / Dimensions: 11.97 x 8.46 x 0.44 inches / Weight: 2.7 pounds', NULL, NULL),
(8, 'Asus Chromebook Plus CX34', 399, 'CPU: Intel Core i3-1215U / GPU: Intel UHD / RAM: 8GB / Storage: 128GB, 256GB UFS / Display: 14-inch IPS, 1920 x 1080, 60Hz, non-touch / Dimensions: 12.9 x 8.4 x 0.74 inches / Weight: 3.17 pounds', NULL, NULL),
(9, 'Samsung Galaxy A54', 1099, 'CPU: M2 (8-core) / GPU: M2 (8- or 10-core) / RAM: 8GB, 16GB, 24GB / Storage: 256GB, 512GB, 1TB, 2TB / Display: 13.6-inch IPS display, 2560 x 1664, 60Hz, no touch option / Dimensions: 11.97 x 8.46 x 0.44 inches / Weight: 2.7 pounds', NULL, NULL),
(10, 'Google Pixel 8', 1099, 'CPU: M2 (8-core) / GPU: M2 (8- or 10-core) / RAM: 8GB, 16GB, 24GB / Storage: 256GB, 512GB, 1TB, 2TB / Display: 13.6-inch IPS display, 2560 x 1664, 60Hz, no touch option / Dimensions: 11.97 x 8.46 x 0.44 inches / Weight: 2.7 pounds', NULL, NULL),
(11, 'Apple iPhone 15', 1099, 'CPU: M2 (8-core) / GPU: M2 (8- or 10-core) / RAM: 8GB, 16GB, 24GB / Storage: 256GB, 512GB, 1TB, 2TB / Display: 13.6-inch IPS display, 2560 x 1664, 60Hz, no touch option / Dimensions: 11.97 x 8.46 x 0.44 inches / Weight: 2.7 pounds', NULL, NULL),
(12, 'Apple iPhone 15 Pro Max.', 2000, 'CPU: M2 (8-core) / GPU: M2 (8- or 10-core) / RAM: 8GB, 16GB, 24GB / Storage: 256GB, 512GB, 1TB, 2TB / Display: 13.6-inch IPS display, 2560 x 1664, 60Hz, no touch option / Dimensions: 11.97 x 8.46 x 0.44 inches / Weight: 2.7 pounds', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(55) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `updated_at`, `created_at`) VALUES
(1, 'Lionel Messi', 'jfmulder@me.com', 'sFN1m1FEwH3e0Tt', NULL, NULL),
(2, 'Neymar', 'neymar@gmail.com', 'm1Me4c\'K}526', NULL, NULL),
(3, 'Cristiano Ronaldo', 'ronaldo@gmail.com', '[lNubvLXM%K]vfNG', NULL, NULL),
(4, 'Frank Lampard', 'citizenl@me.com', '6^ajcu\\-r*LHVDQ|', NULL, NULL),
(5, 'Luis Suárez', 'jhardin@icloud.com', 'CsvsN[4VD,h\'+nxt', NULL, NULL),
(6, 'Romelu Lukaku', '\ndurist@aol.com', 'xM%#Uw$0N!P&\\t^S', NULL, NULL),
(7, 'Ricardo Kak', 'Ricardo @gmail.com', '3-6ih\')|vD<gt4Ia', NULL, NULL),
(8, 'Roy Keane', 'Keane@gmail.com', 'OEe}&wcuj$GEdfUi', NULL, NULL),
(9, 'Wayne Rooney', 'tarreau@gmail.com', '=2(*n///\\Q,${2Ig', NULL, NULL),
(10, 'Thierry Henry', 'jigsaw@gmail.com', 'D/\\p_S~L)k\'j`]gE', NULL, NULL),
(11, 'Zlatan Ibrahimovic', 'nimaclea@live.com', 'y2y\\|E$&prBo}mu3', NULL, NULL),
(12, 'Kylian Mbappé', 'tbeck@sbcglobal.net', 'L\"C-rXo16c!`9V-[', NULL, NULL),
(13, 'Robert Lewandowski', 'kmiller@outlook.com', 'Bx:,OqVPJ];sP#p_', NULL, NULL),
(14, 'Erling Haaland', 'stecoop@me.com', 'stecoop@me.com', NULL, NULL),
(15, '\nHarry Kane', 'staikos@comcast.net', 'staikos@comcast.net', NULL, NULL),
(16, 'Jude Bellingham', 'richard@yahoo.ca', 'Bellingham', NULL, NULL),
(17, 'Mohamed Salah', 'dburrows@outlook.com', 'Salah', NULL, NULL),
(18, '\nKevin De Bruyne', 'stewwy@gmail.com', 'Bruyne', NULL, NULL),
(19, 'Rodri', 'wmszeliga@live.com', 'Martínez', NULL, NULL),
(20, 'Lautaro Martínez', 'ajohnson@msn.com', '|iZzb4t%/N<8+gKM', NULL, NULL),
(21, 'Bukayo Saka', 'ahmad@sbcglobal.net', 'ahmad@sbcglobal.net', NULL, NULL),
(22, 'Antoine Griezmann', 'djupedal@comcast.net', 'djupedal@comcast.net', NULL, NULL),
(23, 'Ilkay Gündogan', 'danzigism@live.com', 'danzigism@live.com', NULL, NULL),
(24, 'Jamal Musiala', 'slanglois@mac.com', 'slanglois@mac.com', NULL, NULL),
(25, 'Rúben Dias', 'solomon@yahoo.ca', 'solomon@yahoo.ca', NULL, NULL),
(26, '2', 'user.test.gmail.com.test@yahoo.vn', '2', NULL, NULL),
(27, 'Mohamad', '2@gmail.com', '2', NULL, NULL),
(28, '2', '2@gmail.com', '2', NULL, NULL),
(29, '2', '2@gmail.com', '2', NULL, NULL),
(30, '2', '2@gmail.com', '2', NULL, NULL),
(31, '2', '2@gmail.com', '2', NULL, NULL),
(32, '2', '2@gmail.com', '2', NULL, NULL),
(33, '2', '2@gmail.com', '2', NULL, NULL),
(34, '2', '2@gmail.com', '2', NULL, NULL),
(35, '2', '2@gmail.com', '2', NULL, NULL),
(36, '2', '2@gmail.com', '2', NULL, NULL),
(37, '2', '2@gmail.com', '2', NULL, NULL),
(99, '99', '99@gmail.com', '99', NULL, NULL),
(100, '99', '99@gmail.com', '99', NULL, NULL),
(101, '99', '99@gmail.com', '99', NULL, NULL),
(102, '99', '99@gmail.com', '99', NULL, NULL),
(103, '99', '99@gmail.com', '99', NULL, NULL),
(104, '99', '99@gmail.com', '99', NULL, NULL),
(105, '99', '99@gmail.com', '99', NULL, NULL),
(106, '99', '99@gmail.com', '99', NULL, NULL),
(107, '99', '99@gmail.com', '99', NULL, NULL),
(108, '99', '99@gmail.com', '99', NULL, NULL),
(109, '99', '99@gmail.com', '99', NULL, NULL),
(110, '99', '99@gmail.com', '99', NULL, NULL),
(111, '99', '99@gmail.com', '99', NULL, NULL),
(112, '99', '99@gmail.com', '99', NULL, NULL),
(999, '999', '999@gmail.com', '999', NULL, NULL),
(1000, '999', '999@gmail.com', '999', NULL, NULL),
(1001, '999', '999@gmail.com', '999', NULL, NULL),
(1002, '999', '999@gmail.com', '999', NULL, NULL),
(1003, '999', '999@gmail.com', '999', NULL, NULL),
(1004, '999', '999@gmail.com', '999', NULL, NULL),
(1005, '999', '999@gmail.com', '999', NULL, NULL),
(1006, '999', '999@gmail.com', '999', NULL, NULL),
(1007, '999', '999@gmail.com', '999', NULL, NULL),
(1008, '999', '999@gmail.com', '999', NULL, NULL),
(1009, '999', '999@gmail.com', '999', NULL, NULL),
(1010, '999', '999@gmail.com', '999', NULL, NULL),
(1011, '999', '999@gmail.com', '999', NULL, NULL),
(1012, '999', '999@gmail.com', '999', NULL, NULL),
(1013, '999', '999@gmail.com', '999', NULL, NULL),
(1014, '999', '999@gmail.com', '999', NULL, NULL),
(1015, '999', '999@gmail.com', '999', NULL, NULL),
(1016, '999', '999@gmail.com', '999', NULL, NULL),
(1017, '999', '999@gmail.com', '999', NULL, NULL),
(1018, '999', '999@gmail.com', '999', NULL, NULL),
(1019, '999', '999@gmail.com', '999', NULL, NULL),
(1020, '999', '999@gmail.com', '999', NULL, NULL),
(1021, '999', '999@gmail.com', '999', NULL, NULL),
(1022, '999', '999@gmail.com', '999', NULL, NULL),
(1023, '999', '999@gmail.com', '999', NULL, NULL),
(1024, '999', '999@gmail.com', '999', NULL, NULL),
(1025, '999', '999@gmail.com', '999', NULL, NULL),
(1026, '999', '999@gmail.com', '999', NULL, NULL),
(1027, '999', '999@gmail.com', '999', NULL, NULL),
(1028, '999', '999@gmail.com', '999', NULL, NULL),
(1029, '999', '999@gmail.com', '999', NULL, NULL),
(1030, '999', '999@gmail.com', '999', NULL, NULL),
(1031, '999', '999@gmail.com', '999', NULL, NULL),
(1032, '999', '999@gmail.com', '999', NULL, NULL),
(1033, '999', '999@gmail.com', '999', NULL, NULL),
(1034, '999', '999@gmail.com', '999', NULL, NULL),
(1035, '999', '999@gmail.com', '999', NULL, NULL),
(1036, '999', '999@gmail.com', '999', NULL, NULL),
(1037, '999', '999@gmail.com', '999', NULL, NULL),
(1038, '999', '999@gmail.com', '999', NULL, NULL),
(1039, '999', '999@gmail.com', '999', NULL, NULL),
(1040, '999', '999@gmail.com', '999', NULL, NULL),
(1041, '999', '999@gmail.com', '999', NULL, NULL),
(1042, '999', '999@gmail.com', '999', NULL, NULL),
(1043, '999', '999@gmail.com', '999', NULL, NULL),
(1044, '999', '999@gmail.com', '999', NULL, NULL),
(1045, '999', '999@gmail.com', '999', NULL, NULL),
(1046, '999', '999@gmail.com', '999', NULL, NULL),
(1047, '999', '999@gmail.com', '999', NULL, NULL),
(1048, '999', '999@gmail.com', '999', NULL, NULL),
(1049, '999', '999@gmail.com', '999', NULL, NULL),
(1050, '999', '999@gmail.com', '999', NULL, NULL),
(1051, '999', '999@gmail.com', '999', NULL, NULL),
(1052, '999', '999@gmail.com', '999', NULL, NULL),
(1053, '999', '999@gmail.com', '999', NULL, NULL),
(1054, '999', '999@gmail.com', '999', NULL, NULL),
(1055, '999', '999@gmail.com', '999', NULL, NULL),
(1056, '999', '999@gmail.com', '999', NULL, NULL),
(1057, '999', '999@gmail.com', '999', NULL, NULL),
(1058, '999', '999@gmail.com', '999', NULL, NULL),
(1059, '999', '999@gmail.com', '999', NULL, NULL),
(1060, '999', '999@gmail.com', '999', NULL, NULL),
(1061, '999', '999@gmail.com', '999', NULL, NULL),
(1062, '999', '999@gmail.com', '999', NULL, NULL),
(1063, '999', '999@gmail.com', '999', NULL, NULL),
(1064, '999', '999@gmail.com', '999', NULL, NULL),
(1065, '999', '999@gmail.com', '999', NULL, NULL),
(1066, '999', '999@gmail.com', '999', NULL, NULL),
(1067, '999', '999@gmail.com', '999', NULL, NULL),
(1068, '999', '999@gmail.com', '999', NULL, NULL),
(1069, '999', '999@gmail.com', '999', NULL, NULL),
(1070, '999', '999@gmail.com', '999', NULL, NULL),
(1071, '999', '999@gmail.com', '999', NULL, NULL),
(1072, '999', '999@gmail.com', '999', NULL, NULL),
(1073, '999', '999@gmail.com', '999', NULL, NULL),
(1074, '999', '999@gmail.com', '999', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1075;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
