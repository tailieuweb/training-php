-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 09:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-cdw1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Table', 'https://cdn.shopify.com/s/files/1/0076/1708/5530/files/h7-s1_1080x.jpg?v=1612888560', 'pla pal pla', '2021-11-29 12:40:52', '2021-11-29 12:40:52'),
(2, 'Stools & Chair', 'https://cdn.shopify.com/s/files/1/0076/1708/5530/files/h04_slider01_1080x.jpg?v=1612541171', 'pla pla pla', '2021-11-29 12:40:52', '2021-11-29 12:40:52'),
(3, 'Shelf', 'https://cdn.shopify.com/s/files/1/0076/1708/5530/files/h04_slider02_1080x.jpg?v=1612541170s', 'pla pla pla', '2021-11-29 12:40:52', '2021-11-29 12:40:52'),
(4, 'Bed', 'https://cdn.shopify.com/s/files/1/0076/1708/5530/files/h7-s2_1296x.jpg?v=1612888560', 'pla pal pla', '2021-11-29 12:40:52', '2021-11-29 12:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(149, '2021_10_19_081532_create_expenses_table', 2),
(315, '2014_10_12_000000_create_users_table', 3),
(316, '2014_10_12_100000_create_password_resets_table', 3),
(317, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
(318, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
(319, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(320, '2016_06_01_000004_create_oauth_clients_table', 3),
(321, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3),
(322, '2019_08_19_000000_create_failed_jobs_table', 3),
(323, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(324, '2021_10_15_074534_create_products_table', 3),
(325, '2021_10_15_075154_create_categories_table', 3),
(326, '2021_10_15_075232_create_order_table', 3),
(327, '2021_10_15_075330_create_order_details_table', 3),
(328, '2021_10_15_080214_create_user_cart_table', 3),
(329, '2021_10_15_080246_create_review_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('052734fefb9e97c537fdeba91b96874d635ed4d05b849796951681f105a78bd29b70a4b42d24c454', 6, 9, 'user', '[]', 1, '2021-12-11 19:43:35', '2021-12-11 19:43:35', '2021-12-27 02:43:35'),
('087947096413d34469f56d89bf9b4a2e357585a838dffc32d6a77ba21c09e364a7faea58a7c2c5e0', 6, 9, 'user', '[]', 1, '2021-12-11 18:25:03', '2021-12-11 18:25:03', '2021-12-27 01:25:03'),
('0c6e86c31e94a10819748384fff3a046beb4f16ed8825fdd4d440f0242d431327c8d7ce0b98e2857', 7, 5, 'user', '[]', 0, '2021-11-27 01:53:17', '2021-11-27 01:53:17', '2021-12-12 08:53:17'),
('155b1d5315b0a3b3a2f60002980244c0a77714b45ca045bb24b4624ae6f29e83efa85f32e9bd4e97', 9, 9, 'user', '[]', 1, '2021-12-11 07:18:55', '2021-12-11 07:18:55', '2021-12-26 14:18:55'),
('24ee838af3042e589f6a461480a3887830a566b5b187024ce1ecf70e3bd862994ecf8ce01ad44988', 5, 3, 'user', '[]', 0, '2021-11-26 01:19:11', '2021-11-26 01:19:11', '2021-12-11 08:19:11'),
('2969c082af50a4e5ffa2e22248c5e7aa8bc224900a3888de98663b27e4fe308613f7213913155bf0', 9, 9, 'user', '[]', 1, '2021-12-11 19:27:34', '2021-12-11 19:27:34', '2021-12-27 02:27:34'),
('30e0eb8f72078c31f17873b4ac80a3742be4a679c28ea614de63857df4490cc9355e338a5674aba5', 8, 5, 'user', '[]', 0, '2021-12-07 10:06:43', '2021-12-07 10:06:43', '2021-12-22 17:06:43'),
('317a84aefe48a3e2f70fd5764280fc81897d57bd259f3459d320c2b770e321967dabb7fae475e600', 6, 5, 'user', '[]', 1, '2021-11-28 18:52:18', '2021-11-28 18:52:18', '2021-12-14 01:52:18'),
('38c1f022af0ef2ff04607a98c4c1ae6794e080501e653b3260e898916e58cee464765287e68c9609', 9, 9, 'user', '[]', 1, '2021-12-11 19:29:09', '2021-12-11 19:29:09', '2021-12-27 02:29:09'),
('3a8061906c1ba4f65b850cb42ea9d9e01e1039a3a8075b2595490060ebd41ec44575a1e0edd758e3', 9, 9, 'user', '[]', 1, '2021-12-11 19:28:01', '2021-12-11 19:28:01', '2021-12-27 02:28:01'),
('5831afd6643231c9c50f08926b0c64da6893daa2c8f3d36818ae85825c38e3766a3671cff5153193', 9, 9, 'user', '[]', 1, '2021-12-10 01:13:24', '2021-12-10 01:13:24', '2021-12-25 08:13:24'),
('5848f8ed2aa755726939910aa14cbdadba60f95b7e5c88292ad1b445a632c07243c047e582f2a9a3', 9, 9, 'user', '[]', 1, '2021-12-11 09:59:07', '2021-12-11 09:59:07', '2021-12-26 16:59:07'),
('6d3747d4555d29ad35b250bbc422b3d88a970d7902b23ed92ad55ecc0c39eba2d8517314bf268ad7', 8, 5, 'user', '[]', 1, '2021-12-06 10:30:06', '2021-12-06 10:30:06', '2021-12-21 17:30:06'),
('7d15862de0a9e7524915ab125bef3deeda4f6022b844fe00875e2c11374569cff23dc8ef50e6fc24', 9, 9, 'user', '[]', 1, '2021-12-11 19:20:28', '2021-12-11 19:20:28', '2021-12-27 02:20:28'),
('84a96acb54541c182221f44a0c082edae47feae95db524e484014334de0df70bd21e6d27d4c16961', 5, 3, 'user', '[]', 0, '2021-11-26 00:46:40', '2021-11-26 00:46:40', '2021-12-11 07:46:40'),
('889a0fd438c7d88d8738aeb93b800331d3c286f1877c4db18871126de3083c6297ed9a4f00dd2fbf', 9, 9, 'user', '[]', 1, '2021-12-10 17:18:00', '2021-12-10 17:18:00', '2021-12-26 00:18:00'),
('8d205e93a26f2ef028cf52af19904a9f53e10dde9e1a883a9718e3bb9edd0f2a4e6361242a4125bf', 8, 5, 'user', '[]', 1, '2021-12-06 10:22:38', '2021-12-06 10:22:38', '2021-12-21 17:22:38'),
('90203a05577a1980abb6cf3391a313c0a0ec9bcb278041367b0478cab582fe40d7a0cd69f9c13cb5', 9, 9, 'user', '[]', 1, '2021-12-11 19:19:30', '2021-12-11 19:19:30', '2021-12-27 02:19:30'),
('9335001a3fe71b6165dde4f3805ee8295c3f8d666ce311483faef10c7c31cc88b2f5927d8f9ea9cf', 9, 7, 'user', '[]', 1, '2021-12-08 20:21:21', '2021-12-08 20:21:21', '2021-12-24 03:21:21'),
('94e1c7aa9340dfe91c731424346a4525e3809943e215665989fdcc5d6eb0cd185ac3e06f67bad384', 9, 9, 'user', '[]', 1, '2021-12-11 19:29:50', '2021-12-11 19:29:50', '2021-12-27 02:29:50'),
('99ad7b625b28fa5977c954b33150790c2ef0353ed041506d4edc632d535ed222e5b852ea44fed1dc', 6, 9, 'user', '[]', 1, '2021-12-11 19:29:21', '2021-12-11 19:29:21', '2021-12-27 02:29:21'),
('9e7a2d3331270a4d4749f78da6deab81304687b44fe025b7c96a51d75fe351549e5e7d04b10e26bc', 9, 9, 'user', '[]', 1, '2021-12-11 08:58:04', '2021-12-11 08:58:04', '2021-12-26 15:58:04'),
('a004b980d53310c09bd1a43693abe8dd9019f29401fe2b079b452134313171382ce62b85805cb1f2', 8, 5, 'user', '[]', 1, '2021-12-04 22:51:45', '2021-12-04 22:51:45', '2021-12-20 05:51:45'),
('a0d18eefafc3a6519c6dbcc20a5f5a681a901512798e6c92f1b4ef676477bc6d4a0540e11a6bb96e', 8, 5, 'user', '[]', 1, '2021-12-04 00:11:01', '2021-12-04 00:11:01', '2021-12-19 07:11:01'),
('a621f3498356a90c24bf248ffdb623ab5f19a62f22dd6d87701d318dddc993aaa7a4f1dc7f6faef4', 9, 9, 'user', '[]', 0, '2021-12-11 19:48:19', '2021-12-11 19:48:19', '2021-12-27 02:48:19'),
('b41d2b42f4e1a0b383d9c69526913ae51fd8c5e950a67917ee48d309c863b67ae8c2c6530a79026d', 9, 7, 'user', '[]', 1, '2021-12-08 08:10:59', '2021-12-08 08:10:59', '2021-12-23 15:10:59'),
('b6b77566623ff39a1db4d82c8eb2daf96ebf780afc76b8f4dc35052836aa16cda9a650927a8f5432', 9, 9, 'user', '[]', 1, '2021-12-11 19:30:10', '2021-12-11 19:30:10', '2021-12-27 02:30:10'),
('bc44e07580ba29b81c043d2e29b5ccd71ae9ca18043d355e20d5afa59e9626d16c02d5080ecce2ae', 6, 9, 'user', '[]', 1, '2021-12-11 19:30:43', '2021-12-11 19:30:43', '2021-12-27 02:30:43'),
('c53e90f5b7fb7a64fc3167bdef0d2503ae7e52fea838a9766c775c1505e512097283062fb3126101', 8, 5, 'user', '[]', 1, '2021-12-06 10:27:40', '2021-12-06 10:27:40', '2021-12-21 17:27:40'),
('c7768eb31fa91e9bbc25e6073bad5eea8c1cbbb242c878b8856f7319d7a07159034ed660fc249b77', 6, 5, 'user', '[]', 1, '2021-11-27 01:14:37', '2021-11-27 01:14:37', '2021-12-12 08:14:37'),
('c8842c3df4a5c0f2adc5d4282f9dc4ac7d2271fddd971c480ab5b2faf686eacbc1c90d9e833ca9a1', 8, 5, 'user', '[]', 1, '2021-12-03 23:42:57', '2021-12-03 23:42:57', '2021-12-19 06:42:57'),
('d045ef071350cf625dba4b08c9e2f3f78332a166478dbf431bc00e24a1fbe5bd417db1def184d16d', 9, 9, 'user', '[]', 1, '2021-12-11 19:19:55', '2021-12-11 19:19:55', '2021-12-27 02:19:55'),
('d4f60471f47839c32e5ea5d6fd9b9a56f6f4d4fc4c6b1506e6e63f52f9d237e6021343fc4c68e15d', 8, 5, 'user', '[]', 1, '2021-12-07 09:40:43', '2021-12-07 09:40:43', '2021-12-22 16:40:43'),
('d61b717b46c75e50a98d385173fcfaf0bfa020f5fe2dd1af87b1a3dbba6bb38eae55233663928bcf', 6, 9, 'user', '[]', 1, '2021-12-11 19:27:11', '2021-12-11 19:27:11', '2021-12-27 02:27:11'),
('d722286b339804c5fa604daf34d29f13dcfa06e42888b7f3c86a49b6fae549b28d5827b81bb8f447', 6, 9, 'user', '[]', 1, '2021-12-11 19:24:09', '2021-12-11 19:24:09', '2021-12-27 02:24:09'),
('d9e62d7a9e7f0d9ec58a68f37f3308b41b78e59bba1fb2c20d08322ffc53916c83d59a69f2720190', 9, 9, 'user', '[]', 1, '2021-12-11 19:23:26', '2021-12-11 19:23:26', '2021-12-27 02:23:26'),
('db1324a7b24bf345c7b6af119a46e31e47996850083e69700f6776f29ab19cf4e669f3b4cc380fed', 8, 5, 'user', '[]', 1, '2021-12-04 00:06:53', '2021-12-04 00:06:53', '2021-12-19 07:06:53'),
('e35ae73ae96ac86def8f2a0f8813e9bf9da5b417c9c7803bb9005ea54a62a58cee79dac8d0853b6e', 9, 9, 'user', '[]', 1, '2021-12-11 19:31:10', '2021-12-11 19:31:10', '2021-12-27 02:31:10'),
('f60e748743a323c672487a265dbeace641e2176365c3221e4a8cca15b92bf3f25b3e38a78120d1ab', 5, 5, 'user', '[]', 0, '2021-11-27 00:19:54', '2021-11-27 00:19:54', '2021-12-12 07:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'J4ShR7HiUdddpGmd9L6rk4jxuQErUvbkSs3xRFl2', NULL, 'http://localhost', 1, 0, 0, '2021-11-14 12:02:44', '2021-11-14 12:02:44'),
(2, NULL, 'Laravel Password Grant Client', '5VI2pLBKO7pwlTrU3Yn00p9CV9X8xOeh1Z2JOZkl', 'users', 'http://localhost', 0, 1, 0, '2021-11-14 12:02:44', '2021-11-14 12:02:44'),
(3, NULL, 'Laravel Personal Access Client', 'btz2VVnkz7cYVROEikXJcRfHRGmpsj6ndSxuq4NA', NULL, 'http://localhost', 1, 0, 0, '2021-11-26 00:46:32', '2021-11-26 00:46:32'),
(4, NULL, 'Laravel Password Grant Client', 'ODXTIXW1X2eCQFMDoV98Z9gQt3CwvG1Bn58UaYDk', 'users', 'http://localhost', 0, 1, 0, '2021-11-26 00:46:32', '2021-11-26 00:46:32'),
(5, NULL, 'Laravel Personal Access Client', 'hM9iy7UBI6AMwEyCYGUNopqI7jyDj3xB2KAiisRh', NULL, 'http://localhost', 1, 0, 0, '2021-11-27 00:19:46', '2021-11-27 00:19:46'),
(6, NULL, 'Laravel Password Grant Client', 'jbq3wXowHq3eii1y8qEBNKKWC1lXgOeO3Mj9FZIr', 'users', 'http://localhost', 0, 1, 0, '2021-11-27 00:19:46', '2021-11-27 00:19:46'),
(7, NULL, 'Laravel Personal Access Client', 'lR8X7GhTMTiuPhKHWaCB13HVlSZNvikE8haWenFz', NULL, 'http://localhost', 1, 0, 0, '2021-12-08 08:09:19', '2021-12-08 08:09:19'),
(8, NULL, 'Laravel Password Grant Client', 'TH7NTIqFOiDeCaveZOjrVQTa0aIRPf5GqGJ0xAvP', 'users', 'http://localhost', 0, 1, 0, '2021-12-08 08:09:19', '2021-12-08 08:09:19'),
(9, NULL, 'Laravel Personal Access Client', 'ug4We5ATGaSXqQf8IHOw8CUsgZNaoXkU15eJGahp', NULL, 'http://localhost', 1, 0, 0, '2021-12-10 00:55:14', '2021-12-10 00:55:14'),
(10, NULL, 'Laravel Password Grant Client', 'Oy6CJ6RtJNb4Mdgtuf3zzAdiz4eEDiYA2N2XSCQC', 'users', 'http://localhost', 0, 1, 0, '2021-12-10 00:55:14', '2021-12-10 00:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-11-14 12:02:44', '2021-11-14 12:02:44'),
(2, 3, '2021-11-26 00:46:32', '2021-11-26 00:46:32'),
(3, 5, '2021-11-27 00:19:46', '2021-11-27 00:19:46'),
(4, 7, '2021-12-08 08:09:19', '2021-12-08 08:09:19'),
(5, 9, '2021-12-10 00:55:14', '2021-12-10 00:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `instruction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double DEFAULT NULL,
  `confirm` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `address`, `user_id`, `instruction`, `total_price`, `confirm`, `created_at`, `updated_at`) VALUES
(1, 'Thu Duc', 3, 'pla pla pla', NULL, 0, '2021-11-19 13:55:12', '2021-11-19 13:55:12'),
(2, 'TP HCM', 4, 'pal pla pla lan 2', NULL, 0, '2021-11-19 13:55:12', '2021-11-19 13:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `confirm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `order_quantity`, `product_id`, `product_price`, `confirm`) VALUES
(1, 3, 27, 0, 0),
(1, 5, 30, 0, 0),
(2, 7, 31, 0, 0),
(2, 6, 30, 0, 0),
(3, 5, 35, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `price`, `product_image`, `description`, `quantity`, `created_at`, `updated_at`) VALUES
(27, 'Bàn Sofa - Bàn Cafe - Bàn Trà Gỗ  MOHO VLINE 501', 1, 123.12, '//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_ban_sofa_vline_601_01_7fbf8d7252d24a3194fc35b155a5b0b9_grande.png', '', 12, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(28, 'Bàn Sofa – Bàn Cafe – Bàn Trà Tròn MOHO OSLO 901', 1, 135.45, '//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_ban_sofa_ban_tra_bban_cafe_go_cao_su_noi_that_moho_2d95300c2050468687c9b03ff98b9ef3_grande.png', '', 46, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(29, 'Ghế Ăn Gỗ Tần Bì Tự Nhiên PALLERMO', 2, 147.65, '//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_noi_that_moho_ghe_an_pallermo_2265922503c242a98a1662e68fc16a70_grande.png', '', 75, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(30, 'Kệ Gỗ – Kệ Sách MOHO OSLO 901 Nhiều Kích Thước', 3, 165.78, '//product.hstatic.net/200000065946/product/img_3288-hdr-1x1_6cc1a6f89bcf4d77bf9e6848c4df5471_grande.png', '', 54, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(31, 'Bàn Làm Việc Gỗ MOHO VLINE 601 Màu Tự Nhiên', 1, 198.45, '//product.hstatic.net/200000065946/product/oi_that_moho_ban_lam_viec_vline_b440e4aeba704ca7954b8f191a3f5cb9_large_215258009e86408eaefe98e70e993567_grande.png', '', 75, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(32, 'Bàn Làm Việc Gỗ MOHO VLINE 601 Màu Nâu', 1, 178.54, '//product.hstatic.net/200000065946/product/oi_that_moho_ban_lam_viec_vline_b5cc9c7266de4019a973526a1172a46c_large_eb4912bc1bf1407c8d1e2b7c51a9469b_grande.png', '', 78, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(33, 'Kệ Gỗ – Kệ Sách MOHO OSLO 902', 3, 165.87, '//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_noi_that_moho_ke_sach_oslo_902_9abdcd50d7ce4aeb86779e60494099ed_grande.png', '', 98, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(34, 'Tủ Kệ Tivi Gỗ MOHO VLINE 301', 3, 165.78, '//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_tu_ke_tivi_vline_noi_that_moho_612622b1d9e04d5eac7650fa4bb12a06_grande.png', '', 100, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(35, 'Giường Ngủ Gỗ MOHO VLINE 601 Nhiều Kích Thước', 4, 178.25, '//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_noi_that_moho_giuong_ngu_go_soi_vline_601_ed79afdcbf884543a68a48d5c35b2875_grande.png', '', 65, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(36, 'Ghế Sofa Gỗ Cao Su Tự Nhiên MOHO MILAN 902', 2, 153.54, '//product.hstatic.net/200000065946/product/oi_that_moho_ghe_sofa_milan_902_09aa4d24c5e0428ebc33358810717152_large_56c7935845b54e1fa2d4bb5bd942ef89_grande.png', '', 93, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(37, 'Ghế Sofa Gỗ Cao Su Tự Nhiên MOHO MILAN 901', 2, 154.87, '//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_ghe_sofa_go_cao_su_noi_that_moho_4629e278e7ec4f02a02df051c5905905_grande.png', '', 73, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(38, 'Set Tủ Quần Áo Gỗ MOHO VIENNA 201 4 Cánh 4 Màu', 3, 168.78, '//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_tu_quan_ao_vienna_4_canh_noi_that_moho_d16832b078304c11944acb8660dd5498_grande.png', '', 73, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(39, 'Bàn Sofa - Bàn Cafe - Bàn Trà MOHO MALAGA 901', 1, 167.54, '//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_noi_that_moho_ban_sofa_malaga_01_ea024b93037549f2ad2f299b2deb8dae_grande.png', '', 100, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(40, 'Bàn Ăn Gỗ Sồi Tự Nhiên Nguyên Khối MOHO FYN', 1, 135.57, '//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_bo_ban_an_go_soi_fyn_noi_that_moho_5_1143a34600424064a57766630d230490_grande.png', '', 74, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(41, 'Ngăn Trang Trí - Ngăn Ghép Kệ Sách MOHO OSLO 201', 3, 187.65, '//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_noi_that_moho_ke_trang_tri_oslo_201_d36b7ccedb8b4da2a7c59b54cc46962b_grande.png', '', 65, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(42, 'Set Tủ Quần Áo Gỗ MOHO VLINE 601 3 Cánh', 3, 187.54, '//product.hstatic.net/200000065946/product/i_that_moho_tu_quan_ao-vline_04_e61fd50d86b8447ea1901cb28b20ebd5_large_47fd51087f97432c91c0ea77e3887478_grande.png', '', 92, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(43, 'Bộ Bàn Ăn 6 Ghế Gỗ MOHO VERONA 901', 1, 165.87, '//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_bo_ban_an_verona_a7b71894d47b46f38b844f7e0f35a74a_grande.png', '', 86, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(44, 'Tủ Quần Áo Gỗ MOHO VLINE 601', 3, 167.82, '//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_tu_quan_ao_go_vline_03_18d6403bc8ac4620b08c5f47f26126b7_grande.png', '', 65, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(45, 'Giường Ngủ Gỗ Cao Su MOHO VERONA 901', 4, 136.54, '//product.hstatic.net/200000065946/product/noi_that_moho_giuong_ngu_verona_c31fbb7589014db1bf20b6b4c9e38367_large_bb9b2176e3a8406880281df1ec6f1bbe_grande.png', '', 63, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(46, 'Tủ Giày – Tủ Trang Trí MOHO BOSTON 901', 3, 178.295, '//product.hstatic.net/200000065946/product/pro_xam_noi_that_moho_tu_giay_boston__2__325fa0f73c1c4f4488bfab652849b5cb_grande.jpg', '', 75, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(47, 'Tủ Giày - Kệ Giày MOHO BOSTON 901', 2, 178.42, '//product.hstatic.net/200000065946/product/pro_xam_noi_that_moho_tu_giay_boston_01_5a949a6911734e72a93ad53aeea922fd_grande.jpg', '', 35, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(48, 'Tủ Kệ Tivi MOHO BOSTON 901', 3, 176.21, '//product.hstatic.net/200000065946/product/378b65d37c541859944b0ea42aaa3c7_e6450928edf74c6fa7584eca720d7758_large_623448f4df454cd3b2ef90b7d9a8ec01_grande.png', '', 34, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(49, 'Bàn Sofa – Bàn Cafe – Bàn Trà MOHO BOSTON 901', 1, 173.54, '//product.hstatic.net/200000065946/product/oi_that_moho_ban_sofa_boston_02_5f1da559ef94455ba309e1fbc6f4c88c_large_ddb11469295247fdb5d2cff639a2405e_grande.png', '', 64, '2021-11-19 13:52:48', '2021-11-19 13:52:48'),
(50, 'Bàn Sofa – Bàn Cafe – Bàn Trà Gỗ MOHO MILAN 901', 1, 0.016092715965585, '//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_ban_sofa_milan_noi_that_moho_f1c9d16c5d0145d89c3fac102d9fd27a_grande.jpg', '', 46, '2021-11-19 13:52:48', '2021-11-19 13:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `product_id`, `user_id`, `rate`, `content`, `created_at`, `updated_at`) VALUES
(1, 30, 9, 5, 'test lan 2', '2021-11-25 09:36:52', '2021-12-11 10:04:34'),
(2, 32, 6, 1, 'asdasjdhjashdjkashdjk', '2021-11-26 07:59:18', '2021-11-26 07:59:18'),
(3, 31, 3, 0, 'ok comment cua toi Hihi', '2021-11-26 07:59:18', '2021-11-26 07:59:18'),
(4, 30, 6, 1, 'commentaballatrap', '2021-11-26 07:59:18', '2021-11-26 07:59:18'),
(5, 31, 3, 0, 'ok comment enter', '2021-11-26 07:59:18', '2021-11-26 07:59:18'),
(13, 27, 6, 5, 'test review', '2021-12-11 19:48:07', '2021-12-11 19:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `email`, `phone`, `password`, `type`, `address`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'phuong123', 'phuong123@gmail.com', 924345840, '$2y$10$Iq1HSo0RUWUuxMJXc8.9OOPE/B/bfVKkOPzIIwiJQVDvjES6U.Vj2', 1, 'none', NULL, NULL, '2021-12-10 18:39:24', '2021-12-10 18:39:24'),
(7, 'anhkatari1', 'anhdagia1231@gmail.com', 123221179, '$2y$10$qWWP91ZjcykpNkP2R4gg6uwed.ezr.UWEz//5dcgoCKOxFXsv7pRy', 0, NULL, NULL, NULL, NULL, NULL),
(9, 'ngacngu0019', 'pn0921997@gmail.com', 924345841, '$2y$10$Iq1HSo0RUWUuxMJXc8.9OOPE/B/bfVKkOPzIIwiJQVDvjES6U.Vj2', 0, '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`product_id`, `quantity`, `user_id`) VALUES
(30, 12, 6),
(28, 12, 6),
(30, 21, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
