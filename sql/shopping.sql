-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th12 11, 2021 lúc 01:03 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopping`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `user_name`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thang1234', '$2y$10$ahNVrTqQVoVNVmreM0oJ7OuepYo2ElvyNBqa3LcdEmBFvsoampuya', 'customer', NULL, NULL, '2021-12-06 19:29:02'),
(2, 'manager1', '$2y$10$wTLIc9H2fmYcfz8mccHsHOWHRaQUHZULQhBRBshFZ0HXDZ2jFNWW6', 'admin', NULL, NULL, NULL),
(3, 'admin1', '$2y$10$wTLIc9H2fmYcfz8mccHsHOWHRaQUHZULQhBRBshFZ0HXDZ2jFNWW6', 'admin', NULL, NULL, NULL),
(4, 'huuthang11b1', '$2y$10$yKRXdbW0bJDvOr4OfBtijuKKNCXynEwIHgBl1ZkDVhTRB7aNwhtYa', 'customer', NULL, '2021-12-06 19:33:00', '2021-12-06 19:33:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `person_id` int(10) UNSIGNED NOT NULL,
  `role_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admins_person_id_foreign` (`person_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `person_id`, `role_admin`, `created_at`, `updated_at`) VALUES
(1, 2, 'manager', NULL, NULL),
(2, 3, 'editer', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_pro_id_foreign` (`pro_id`),
  KEY `comments_account_id_foreign` (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `person_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customers_person_id_foreign` (`person_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `person_id`, `type`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 1, 'normal', '1', '6PPD1ON1RE', NULL, NULL),
(2, 4, 'normal', '1', 'J76HJY47JSD9AHQAYZDD', '2021-12-06 19:33:00', '2021-12-06 19:33:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`id`, `manu_name`, `created_at`, `updated_at`) VALUES
(1, 'Supreme', NULL, NULL),
(2, 'Adidas', NULL, NULL),
(3, 'Nike', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=199 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(184, '2014_10_12_100000_create_password_resets_table', 1),
(185, '2021_07_19_030041_create_slides_table', 1),
(186, '2021_07_20_022324_create_types_table', 1),
(187, '2021_07_20_022514_create_protypes_table', 1),
(188, '2021_07_20_022542_create_products_table', 1),
(189, '2021_07_23_131241_create_manufactures_table', 1),
(190, '2021_07_27_130928_create_sizes_table', 1),
(191, '2021_07_27_131250_create_products_sizes_table', 1),
(192, '2021_09_15_071822_create_accounts_table', 1),
(193, '2021_09_15_071903_create_persons_table', 1),
(194, '2021_09_15_071926_create_customers_table', 1),
(195, '2021_10_21_113345_create_admins_table', 1),
(196, '2021_10_28_114354_create_orders_table', 1),
(197, '2021_10_28_114444_create_order_items_table', 1),
(198, '2021_11_29_123236_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `grand_price` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_customer_id_foreign` (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price_sell` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `persons`
--

DROP TABLE IF EXISTS `persons`;
CREATE TABLE IF NOT EXISTS `persons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `persons_account_id_foreign` (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `persons`
--

INSERT INTO `persons` (`id`, `account_id`, `full_name`, `gender`, `address`, `date_of_birth`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nguyễn Hữu Thắng', 'Male', 'K3, Tân Hiệp, Kiên Giang', '2000-01-01', '0844370344', 'nguyenhuuthang12c8@gmail.com', NULL, NULL),
(2, 2, 'Thắng Nguyễn', 'Male', 'Thủ Đức', '2005-01-01', '0844370255', 'nguyenhuuthang1111@gmail.com', NULL, NULL),
(3, 3, 'Phan Ngọc Luân', 'Male', 'Vũng Tàu', '2009-01-01', '0123456789', 'nguyenhuuthang12c4@gmail.com', NULL, NULL),
(4, 4, 'Nguyễn Hữu Thắng', 'Male', 'K3, Tân Hiệp, Kiên Giang', '2010-12-15', '0844370321', 'nguyenhuuthang1609@gmail.com', '2021-12-06 19:33:00', '2021-12-06 19:33:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `manu_id` int(10) UNSIGNED NOT NULL,
  `protype_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `promotion_price` int(11) NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_manu_id_foreign` (`manu_id`),
  KEY `products_protype_id_foreign` (`protype_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `manu_id`, `protype_id`, `name`, `pro_image`, `origin`, `price`, `promotion_price`, `description`, `feature`, `created_at`, `updated_at`) VALUES
(14, 1, 2, 'Black T-shirt woman', 'faith-yarn-hgtWvsq5e2c-unsplash.jpg', 'Japan', 1500000, 400000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:00:36', '2021-12-06 06:00:36'),
(15, 1, 2, 'White T-shirt', 'christian-bolt-VW5VjskNXZ8-unsplash.jpg', 'Viet Nam', 500000, 400000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:01:22', '2021-12-06 06:01:22'),
(16, 1, 2, 'Yellow t-shirt', 'gian-cescon-00ByEXKcSkA-unsplash.jpg', 'Korea', 450000, 350000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:02:28', '2021-12-06 06:02:28'),
(13, 1, 1, 'Brown Shirt', 'brooke-cagle-wKOKidNT14w-unsplash.jpg', 'Viet Nam', 500000, 400000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 05:59:23', '2021-12-06 05:59:23'),
(12, 1, 1, 'Gray Shirt', 'dmitry-vechorko-E9PFbdhZmus-unsplash.jpg', 'China', 723000, 700000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 05:58:31', '2021-12-06 05:58:31'),
(11, 1, 1, 'White Shirt', 'rui-silvestre-hAMJpesMeDE-unsplash.jpg', 'Japan', 450000, 430000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 05:56:56', '2021-12-06 05:56:56'),
(10, 1, 1, 'Flower shirt short', 'caique-silva-rD3muAr7ngY-unsplash.jpg', 'Korea', 1500000, 1450000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 0, '2021-12-06 05:56:18', '2021-12-06 05:56:18'),
(9, 1, 1, 'Black man shirt', 'mahdi-bafande-ZSScmyIxEXQ-unsplash.jpg', 'Viet Nam', 500000, 400000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 05:55:26', '2021-12-06 05:55:26'),
(17, 1, 2, 'Couple Red', 'lucas-lenzi-4-VgrP9SgQw-unsplash.jpg', 'China', 450000, 400000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:03:30', '2021-12-06 06:03:30'),
(18, 1, 2, 'Disa t-shirt', 'mohammad-faruque-0ZYPu-nLOwU-unsplash.jpg', 'China', 1500000, 500000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:04:40', '2021-12-06 06:04:40'),
(19, 3, 3, 'Blue Hat', 'celine-ruiz-Wxs5zGQ5Oyw-unsplash.jpg', 'Korea', 450000, 340000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:06:26', '2021-12-06 06:06:26'),
(20, 3, 3, 'Yellow Hat', 'marya_volk-7eOfIZmstcA-unsplash.jpg', 'Viet Nam', 500000, 400000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:07:50', '2021-12-06 06:07:50'),
(21, 2, 3, 'Black Hat Man', 'frank-uyt-den-bogaard-gb4E016nXow-unsplash.jpg', 'Viet Nam', 450000, 100000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:10:05', '2021-12-06 06:10:05'),
(22, 2, 3, 'Gray Hat', 'claudio-schwarz-PH8GUKG-Do0-unsplash.jpg', 'Japan', 500000, 400000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:11:10', '2021-12-06 06:11:10'),
(23, 2, 3, 'Brown Hat', 'michael-c-zVycYmcblDY-unsplash.jpg', 'Korea', 1500000, 400000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:12:46', '2021-12-06 06:12:46'),
(24, 3, 4, 'Red Nike', 'revolt-164_6wVEHfI-unsplash.jpg', 'Viet Nam', 3000000, 2500000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:13:59', '2021-12-06 06:13:59'),
(25, 3, 4, 'Red Jordan', 'paul-volkmer-updW-QUccFE-unsplash.jpg', 'Viet Nam', 4500000, 4000000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:14:41', '2021-12-06 06:14:41'),
(26, 2, 4, 'Yellow Shoes', 'maksim-larin-NOpsC3nWTzY-unsplash.jpg', 'Viet Nam', 1500000, 1000000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:15:41', '2021-12-06 06:15:41'),
(27, 2, 4, 'Converse', 'camila-damasio-mWYhrOiAgmA-unsplash.jpg', 'Japan', 1500000, 500000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:16:43', '2021-12-06 06:16:43'),
(28, 3, 4, 'Vane', 'paul-gaudriault-a-QH9MAAVNI-unsplash.jpg', 'Viet Nam', 1500000, 400000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:17:55', '2021-12-06 06:17:55'),
(29, 3, 4, 'K-Swiss', 'omar-prestwich-jLEGurepDco-unsplash.jpg', 'Korea', 4500000, 4000000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:19:24', '2021-12-06 06:19:24'),
(30, 2, 5, 'Bag women', 'women-bag-img.jpg', 'Viet Nam', 500000, 400000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:20:02', '2021-12-06 06:20:02'),
(31, 1, 5, 'Black Wallets', 'mason-supply--lN0HnySy7w-unsplash.jpg', 'Viet Nam', 450000, 100000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.', 1, '2021-12-06 06:21:11', '2021-12-06 06:21:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_sizes`
--

DROP TABLE IF EXISTS `products_sizes`;
CREATE TABLE IF NOT EXISTS `products_sizes` (
  `pro_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `products_sizes_pro_id_foreign` (`pro_id`),
  KEY `products_sizes_size_id_foreign` (`size_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_sizes`
--

INSERT INTO `products_sizes` (`pro_id`, `size_id`, `created_at`, `updated_at`) VALUES
(19, 7, '2021-12-06 06:06:26', '2021-12-06 06:06:26'),
(19, 6, '2021-12-06 06:06:26', '2021-12-06 06:06:26'),
(19, 5, '2021-12-06 06:06:26', '2021-12-06 06:06:26'),
(18, 5, '2021-12-06 06:04:40', '2021-12-06 06:04:40'),
(18, 4, '2021-12-06 06:04:40', '2021-12-06 06:04:40'),
(22, 5, '2021-12-06 06:11:10', '2021-12-06 06:11:10'),
(21, 4, '2021-12-06 06:10:05', '2021-12-06 06:10:05'),
(21, 3, '2021-12-06 06:10:05', '2021-12-06 06:10:05'),
(21, 2, '2021-12-06 06:10:05', '2021-12-06 06:10:05'),
(21, 1, '2021-12-06 06:10:05', '2021-12-06 06:10:05'),
(20, 5, '2021-12-06 06:07:51', '2021-12-06 06:07:51'),
(20, 3, '2021-12-06 06:07:51', '2021-12-06 06:07:51'),
(20, 2, '2021-12-06 06:07:51', '2021-12-06 06:07:51'),
(20, 1, '2021-12-06 06:07:50', '2021-12-06 06:07:50'),
(17, 6, '2021-12-06 06:03:30', '2021-12-06 06:03:30'),
(17, 3, '2021-12-06 06:03:30', '2021-12-06 06:03:30'),
(17, 2, '2021-12-06 06:03:30', '2021-12-06 06:03:30'),
(16, 3, '2021-12-06 06:02:28', '2021-12-06 06:02:28'),
(16, 2, '2021-12-06 06:02:28', '2021-12-06 06:02:28'),
(16, 1, '2021-12-06 06:02:28', '2021-12-06 06:02:28'),
(15, 7, '2021-12-06 06:01:22', '2021-12-06 06:01:22'),
(15, 3, '2021-12-06 06:01:22', '2021-12-06 06:01:22'),
(15, 1, '2021-12-06 06:01:22', '2021-12-06 06:01:22'),
(14, 5, '2021-12-06 06:00:36', '2021-12-06 06:00:36'),
(14, 2, '2021-12-06 06:00:36', '2021-12-06 06:00:36'),
(14, 1, '2021-12-06 06:00:36', '2021-12-06 06:00:36'),
(13, 2, '2021-12-06 05:59:23', '2021-12-06 05:59:23'),
(13, 1, '2021-12-06 05:59:23', '2021-12-06 05:59:23'),
(12, 5, '2021-12-06 05:58:31', '2021-12-06 05:58:31'),
(12, 2, '2021-12-06 05:58:31', '2021-12-06 05:58:31'),
(12, 1, '2021-12-06 05:58:31', '2021-12-06 05:58:31'),
(11, 5, '2021-12-06 05:56:56', '2021-12-06 05:56:56'),
(11, 4, '2021-12-06 05:56:56', '2021-12-06 05:56:56'),
(11, 3, '2021-12-06 05:56:56', '2021-12-06 05:56:56'),
(11, 2, '2021-12-06 05:56:56', '2021-12-06 05:56:56'),
(11, 1, '2021-12-06 05:56:56', '2021-12-06 05:56:56'),
(10, 3, '2021-12-06 05:56:18', '2021-12-06 05:56:18'),
(10, 2, '2021-12-06 05:56:18', '2021-12-06 05:56:18'),
(10, 1, '2021-12-06 05:56:18', '2021-12-06 05:56:18'),
(9, 7, '2021-12-06 05:55:26', '2021-12-06 05:55:26'),
(9, 6, '2021-12-06 05:55:26', '2021-12-06 05:55:26'),
(9, 4, '2021-12-06 05:55:26', '2021-12-06 05:55:26'),
(9, 2, '2021-12-06 05:55:26', '2021-12-06 05:55:26'),
(9, 1, '2021-12-06 05:55:26', '2021-12-06 05:55:26'),
(22, 6, '2021-12-06 06:11:10', '2021-12-06 06:11:10'),
(22, 7, '2021-12-06 06:11:10', '2021-12-06 06:11:10'),
(23, 1, '2021-12-06 06:12:46', '2021-12-06 06:12:46'),
(23, 2, '2021-12-06 06:12:46', '2021-12-06 06:12:46'),
(23, 3, '2021-12-06 06:12:46', '2021-12-06 06:12:46'),
(23, 4, '2021-12-06 06:12:46', '2021-12-06 06:12:46'),
(24, 2, '2021-12-06 06:13:59', '2021-12-06 06:13:59'),
(24, 3, '2021-12-06 06:13:59', '2021-12-06 06:13:59'),
(24, 6, '2021-12-06 06:13:59', '2021-12-06 06:13:59'),
(25, 1, '2021-12-06 06:14:41', '2021-12-06 06:14:41'),
(25, 2, '2021-12-06 06:14:41', '2021-12-06 06:14:41'),
(25, 3, '2021-12-06 06:14:41', '2021-12-06 06:14:41'),
(25, 4, '2021-12-06 06:14:41', '2021-12-06 06:14:41'),
(25, 5, '2021-12-06 06:14:41', '2021-12-06 06:14:41'),
(26, 3, '2021-12-06 06:15:41', '2021-12-06 06:15:41'),
(26, 4, '2021-12-06 06:15:41', '2021-12-06 06:15:41'),
(26, 5, '2021-12-06 06:15:41', '2021-12-06 06:15:41'),
(26, 6, '2021-12-06 06:15:41', '2021-12-06 06:15:41'),
(26, 7, '2021-12-06 06:15:41', '2021-12-06 06:15:41'),
(27, 1, '2021-12-06 06:16:43', '2021-12-06 06:16:43'),
(27, 2, '2021-12-06 06:16:43', '2021-12-06 06:16:43'),
(27, 4, '2021-12-06 06:16:43', '2021-12-06 06:16:43'),
(27, 6, '2021-12-06 06:16:43', '2021-12-06 06:16:43'),
(28, 2, '2021-12-06 06:17:55', '2021-12-06 06:17:55'),
(28, 3, '2021-12-06 06:17:55', '2021-12-06 06:17:55'),
(28, 5, '2021-12-06 06:17:55', '2021-12-06 06:17:55'),
(28, 6, '2021-12-06 06:17:55', '2021-12-06 06:17:55'),
(29, 2, '2021-12-06 06:19:24', '2021-12-06 06:19:24'),
(29, 4, '2021-12-06 06:19:24', '2021-12-06 06:19:24'),
(29, 5, '2021-12-06 06:19:24', '2021-12-06 06:19:24'),
(29, 6, '2021-12-06 06:19:24', '2021-12-06 06:19:24'),
(30, 2, '2021-12-06 06:20:02', '2021-12-06 06:20:02'),
(31, 6, '2021-12-06 06:21:11', '2021-12-06 06:21:11'),
(31, 7, '2021-12-06 06:21:11', '2021-12-06 06:21:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` int(10) UNSIGNED NOT NULL,
  `protype_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `protype_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `protypes_type_id_foreign` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`id`, `type_id`, `protype_name`, `protype_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shirts', 'roman-holoschchuk-nFhRxa64fvM-unsplash.jpg', NULL, '2021-12-06 05:53:21'),
(2, 1, 'T-Shirts', 'fabio-alves-eAUE_FmclYE-unsplash.jpg', NULL, '2021-12-06 05:47:33'),
(3, 1, 'Hot', 'fabio-alves-MNzyXXfnnCg-unsplash.jpg', NULL, '2021-12-06 05:48:18'),
(4, 2, 'Shoes', 'martin-katler-Y4fKN-RlMV4-unsplash.jpg', NULL, '2021-12-06 05:50:55'),
(5, 3, 'Wallets', 'emil-kalibradov-E26g87ZHfAI-unsplash.jpg', NULL, '2021-12-06 05:49:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'S', NULL, NULL),
(2, 'M', NULL, NULL),
(3, 'L', NULL, NULL),
(4, 'XL', NULL, NULL),
(5, 'XXL', NULL, NULL),
(6, '3XL', NULL, NULL),
(7, '4XL', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slide_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `slide_image`, `created_at`, `updated_at`) VALUES
(1, 'banner-01.jpg', NULL, NULL),
(2, 'banner-02.jpg', NULL, NULL),
(3, 'banner-03.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `types`
--

INSERT INTO `types` (`type_id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'top', NULL, NULL),
(2, 'bottom', NULL, NULL),
(3, 'accessories', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
