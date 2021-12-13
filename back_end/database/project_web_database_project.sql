-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 01:55 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_web_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'XV0gyB4uTo6tRRobzch5tXAkupdmfdtI', 1, '2021-04-06 23:41:03', '2021-04-06 23:41:03', '2021-04-06 23:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `audit_histories`
--

CREATE TABLE `audit_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `module` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(39) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_user` int(10) UNSIGNED NOT NULL,
  `reference_id` int(10) UNSIGNED NOT NULL,
  `reference_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_histories`
--

INSERT INTO `audit_histories` (`id`, `user_id`, `module`, `request`, `action`, `user_agent`, `ip_address`, `reference_user`, `reference_id`, `reference_name`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-10-11 09:28:45', '2021-10-11 09:28:45'),
(2, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-10-11 15:34:01', '2021-10-11 15:34:01'),
(3, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-10-12 07:22:11', '2021-10-12 07:22:11'),
(4, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-10-13 09:51:51', '2021-10-13 09:51:51'),
(5, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-10-14 03:07:34', '2021-10-14 03:07:34'),
(6, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-10-14 03:07:39', '2021-10-14 03:07:39'),
(7, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-10-14 05:26:47', '2021-10-14 05:26:47'),
(8, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-10-16 00:27:41', '2021-10-16 00:27:41'),
(9, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-11-14 01:21:28', '2021-11-14 01:21:28'),
(10, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-11-21 00:15:56', '2021-11-21 00:15:56'),
(11, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-11-21 00:15:56', '2021-11-21 00:15:56'),
(12, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-11-29 08:01:15', '2021-11-29 08:01:15'),
(13, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-11-29 08:01:15', '2021-11-29 08:01:15'),
(14, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-12-02 07:54:52', '2021-12-02 07:54:52'),
(15, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-12-03 05:02:46', '2021-12-03 05:02:46'),
(16, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-12-04 00:16:53', '2021-12-04 00:16:53'),
(17, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-12-04 00:36:51', '2021-12-04 00:36:51'),
(18, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-12-04 04:30:33', '2021-12-04 04:30:33'),
(19, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-12-04 18:09:34', '2021-12-04 18:09:34'),
(20, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-12-04 18:16:04', '2021-12-04 18:16:04'),
(21, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-12-10 19:09:23', '2021-12-10 19:09:23'),
(22, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-12-11 12:42:15', '2021-12-11 12:42:15'),
(23, 1, 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', '127.0.0.1', 0, 1, 'System Admin', 'info', '2021-12-11 22:40:38', '2021-12-11 22:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `alias`, `description`, `content`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Destin Jacobs', 'destin-jacobs', 'Neque numquam qui odio soluta sapiente aut.', 'Harum et sed architecto repudiandae voluptates. Sit laboriosam modi omnis voluptate. Natus odio doloremque similique fuga amet alias laboriosam. Autem quaerat non odio necessitatibus aut id ut saepe. Unde accusantium est ut tenetur. Aut hic doloribus consequatur eveniet repudiandae. Sint hic consectetur vitae animi delectus eius. Dolor neque reprehenderit sit commodi. Consequatur sapiente esse cumque dolor vitae est delectus sed. Totam officia sequi totam voluptas occaecati.', 'published', NULL, '2021-04-06 23:41:08', '2021-04-06 23:41:08'),
(2, 'Mr. Hubert Dietrich III', 'mr-hubert-dietrich-iii', 'Itaque vel dolorem corporis dolore maxime alias.', 'Dolor eligendi natus nemo nobis quasi et quia reprehenderit. Et fugit repudiandae occaecati qui maiores dicta voluptate ut. Totam inventore adipisci quisquam odio reprehenderit voluptas. Quam placeat fugiat sed nostrum. Sapiente necessitatibus velit delectus ad quas et assumenda. Minima aut ut consectetur. Est eos soluta nam. Impedit aut qui ratione esse repellat eum consequuntur.', 'published', NULL, '2021-04-06 23:41:08', '2021-04-06 23:41:08'),
(3, 'Myrtle Beatty', 'myrtle-beatty', 'Dolore quia doloribus amet odit commodi aut.', 'Suscipit accusantium recusandae sint illum nemo voluptatem. Est maiores reprehenderit ratione non id pariatur. Officia enim omnis nam veniam dolorem quas quis. Beatae debitis laboriosam id fugit. Aperiam accusantium veritatis repellendus qui et velit earum. Eos aut quia aut esse blanditiis laboriosam illo pariatur. Ut animi rerum et dolorem.', 'published', NULL, '2021-04-06 23:41:08', '2021-04-06 23:41:08'),
(4, 'Dr. Ervin Hudson', 'dr-ervin-hudson', 'Est enim ea voluptatem nisi et non nulla.', 'Omnis nesciunt aut totam soluta et placeat beatae. Aut aspernatur eum ab veritatis et. Eveniet minus aliquid ut. Qui provident aut magni nihil vitae veniam. Dolor accusantium tenetur et nihil culpa praesentium modi. Est laudantium aut quis autem perspiciatis maiores nulla officia. Ut sunt in sequi ut. Ex veritatis quis commodi sed enim voluptatem recusandae. Officiis impedit dolor sed ut. Perspiciatis ut voluptates ea minima sunt. Laboriosam sed labore et consequatur cum temporibus ipsa nobis.', 'published', NULL, '2021-04-06 23:41:08', '2021-04-06 23:41:08'),
(5, 'Asia Cremin', 'asia-cremin', 'Quasi unde tempora nesciunt.', 'Sit et ut dolorem qui laborum odio dolor. Omnis cupiditate dolor a. Et blanditiis ea earum libero. Distinctio dolore voluptas sit qui eveniet error. Dicta a laborum consequatur qui. Aut deleniti ea id sit dolore minus. Ipsum excepturi harum nisi repellat dolores et cumque. Ipsum ducimus eos molestiae quas quo nulla. Molestias reprehenderit consequatur quos qui odio molestias. Omnis fugiat vitae est officia. Numquam voluptate ut perspiciatis officia esse harum.', 'published', NULL, '2021-04-06 23:41:08', '2021-04-06 23:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `author_id` int(11) NOT NULL,
  `author_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Botble\\ACL\\Models\\User',
  `icon` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` tinyint(4) NOT NULL DEFAULT 0,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0,
  `is_default` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `description`, `status`, `author_id`, `author_type`, `icon`, `order`, `is_featured`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Uncategorized', 0, 'Velit totam dolores sit dolor perferendis non eum consectetur. Nobis illum occaecati aut nam. Ad deleniti voluptas eos tenetur non qui. Nemo dignissimos nostrum numquam aut nisi ea.', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 1, '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(2, 'Events', 0, 'Omnis quia aspernatur culpa ducimus. Quas fugit maxime nam quas porro. Et nemo voluptate placeat illum quos quia. Eum ut dignissimos sint et aut quo. Consequuntur rerum dolorem quia.', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(3, 'Projects', 2, 'Qui ut odit sed incidunt modi autem non. Iure molestiae numquam omnis illo neque quia quia. Totam nulla quia aut et voluptas dolorem quam. Quisquam quis neque repellendus sint quibusdam ipsa.', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(4, 'Business', 0, 'Voluptatum laudantium maiores magnam qui eius aut ducimus. Reprehenderit tempore aspernatur nihil sed quaerat inventore eligendi. Delectus nesciunt totam quos modi ipsam.', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(5, 'Portfolio', 4, 'Voluptas consequatur est placeat dolor inventore nemo. Reprehenderit iste numquam aliquid cum laborum est. Consectetur at officiis quasi id. Illum iste animi aut dolorum debitis explicabo neque.', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(6, 'News & Updates', 0, 'Neque et ut quam ex omnis illo eaque possimus. Qui sit animi similique veritatis iure dolores impedit. Rerum sequi voluptatem rerum ipsam. Illum ut quos necessitatibus aut aut dolorum delectus.', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(7, 'Resources', 6, 'Nostrum voluptas sed libero. Consequatur atque dolor cum doloribus. Sapiente autem rem voluptatem.', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(8, 'Không phân loại', 0, 'Ipsum amet modi earum veniam ea. Esse odit aut ea eum ex ducimus suscipit. Nihil laborum aut sunt deleniti numquam. Et quis numquam rerum saepe qui deserunt.', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 1, '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(9, 'Sự kiện', 0, 'Aut laborum sed error adipisci voluptatem. Fugiat voluptate aut eaque. Rem laborum porro ut.', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(10, 'Dự án', 9, 'Laudantium culpa illo modi quae dolorem vel. Sunt fugiat nisi id nihil. Dolore architecto eos nesciunt qui quo dolorum.', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(11, 'Doanh nghiệp', 0, 'Enim dolores nobis veritatis dolorem dolor accusamus sequi. Molestiae velit dolores temporibus velit nesciunt quasi. Pariatur at fugit exercitationem culpa sint. Natus qui eius similique.', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(12, 'Đầu tư', 11, 'Atque eveniet fugit ut earum sint sunt. Laboriosam est maxime consectetur incidunt voluptatem est enim. Expedita mollitia molestiae quos recusandae est.', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(13, 'Tin tức & cập nhật', 0, 'Voluptatibus dolor autem quaerat est sunt et aspernatur. Magni minima voluptate perspiciatis nesciunt soluta molestiae deserunt. Consequatur asperiores ullam aut aut ipsum.', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(14, 'Tài nguyên', 13, 'Est quod velit occaecati. Fugit sit possimus velit adipisci praesentium fuga eos et. Qui blanditiis ut vel odit. Aspernatur quo voluptate laborum cupiditate.', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, '2021-04-06 23:41:12', '2021-04-06 23:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `address`, `subject`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mrs. Elizabeth Grimes', 'macey05@example.com', '251-247-1268', '9912 Jarrod Rue Apt. 845\nNew Malinda, ME 20301-5622', 'Esse nihil mollitia eos.', 'Veritatis adipisci nemo minima aliquid. Ea dolor cupiditate aliquam vel. Ullam minima cum corporis ut. Temporibus repudiandae rerum minima in distinctio quam. Voluptates veritatis velit tempore repellendus animi quia voluptates voluptatem. Id numquam non quam ducimus qui quis voluptatem. Omnis dolores qui accusamus possimus ullam. Est aliquid ea quisquam illum. Sunt quidem ipsa velit dolorem perspiciatis enim quod. Nisi minima qui rerum a aut ea.', 'unread', '2021-04-06 23:41:08', '2021-04-06 23:41:08'),
(2, 'Izabella Schoen', 'hleuschke@example.net', '804.667.4693', '71915 Davis Hills\nNorth Jovanitown, ND 99127', 'Minima aliquam et sint.', 'Velit veniam magnam sed. Sit harum ratione ab sint omnis iure consequatur illo. Dicta aspernatur labore aperiam et sunt. Sequi modi minus odio dolorum consequuntur temporibus dignissimos. Id sapiente consequatur rerum aut et. Sed odio nesciunt qui nulla voluptatum consectetur nihil. Doloremque eos et dolor. Ipsam provident vitae voluptas labore voluptatibus.', 'unread', '2021-04-06 23:41:08', '2021-04-06 23:41:08'),
(3, 'Dr. Freda Reynolds II', 'ernser.gunner@example.com', '+1 (601) 277-7072', '4356 Crona Canyon Apt. 397\nJohannashire, VT 35323-1738', 'Nesciunt quis voluptas temporibus ut animi.', 'Corrupti in temporibus quidem est porro id rerum. Commodi a dolorem et. Id quis dolores nihil optio enim. Qui nihil dolorem non magnam tempore est consequatur et. Accusantium recusandae voluptatem provident enim quis laborum. Itaque reiciendis quae perferendis et. Quibusdam quae quia velit vero. Sed deserunt libero culpa facilis velit. Sint neque laborum eius ab quia in tempora.', 'unread', '2021-04-06 23:41:08', '2021-04-06 23:41:08'),
(4, 'Prof. Litzy Langworth IV', 'pfeeney@example.com', '904.509.0373', '47461 Breitenberg Spring Suite 286\nNorth Ottismouth, ID 07080-3682', 'Quaerat reprehenderit architecto qui.', 'Laboriosam sed non sit id repellendus nulla. Odio quia odit incidunt quisquam sit. Itaque error accusantium consequatur ipsam porro similique iste. Ut vel facere aut. Ut corrupti aut est optio. Dolor eos nulla qui consequatur aspernatur. Cumque et ut ut molestiae neque ad omnis. Et aut quasi velit. Aut odit qui magnam deleniti vel. Reiciendis modi nesciunt in et exercitationem culpa optio.', 'read', '2021-04-06 23:41:08', '2021-04-06 23:41:08'),
(5, 'Brycen Lebsack', 'uriah55@example.com', '858.649.4214', '49863 Marge Court Suite 617\nNew Lewland, IL 38102', 'Eos maxime odio dolores consectetur iusto.', 'Saepe illum harum molestiae odit. Cum soluta blanditiis culpa eos. Ab earum eius nihil dolorum laudantium ut quos. Nemo aut debitis non recusandae nulla. Omnis in voluptatem at labore molestiae fuga. Occaecati molestiae illo corporis perferendis corporis nostrum qui corporis. Qui facere alias aut nulla officiis. Rerum voluptatem eaque magnam similique voluptas in facere. Aliquid expedita tempore laboriosam ut nostrum. Ex repudiandae molestiae rerum illo incidunt quae quia.', 'read', '2021-04-06 23:41:08', '2021-04-06 23:41:08'),
(6, 'Mr. Ashton Stehr PhD', 'nlabadie@example.com', '415.878.2356', '52207 Caterina River Suite 417\nNew Caesar, SD 00429', 'Eius et voluptatem id maiores esse.', 'Aut et non aut at corrupti nulla et ea. Aut deleniti non quia sed vel. Exercitationem rerum aut numquam maiores pariatur. Possimus aut repellendus corrupti culpa reiciendis nihil est. Numquam quo voluptate in voluptates rerum dolore. Quos et non aut. Ab occaecati facilis maxime facilis beatae dicta sunt quisquam.', 'read', '2021-04-06 23:41:08', '2021-04-06 23:41:08'),
(7, 'Gerard King', 'torphy.dillan@example.com', '1-364-581-2020', '6326 Senger Shore Suite 079\nStephanyberg, OK 84381', 'Ut sequi vero cupiditate.', 'Nihil optio non eius laboriosam facere laboriosam. Eaque culpa similique in aperiam aspernatur. Quibusdam esse repudiandae maiores modi. Incidunt sed rem quos molestias. Et facere repellat enim explicabo praesentium sed atque perspiciatis. Omnis aut qui neque perspiciatis expedita. Eaque vitae ut aut sunt.', 'unread', '2021-04-06 23:41:08', '2021-04-06 23:41:08'),
(8, 'Dr. Destini Ernser MD', 'adam.rolfson@example.org', '(248) 375-4132', '605 Weber Orchard\nNorth Nayeli, WI 86148-8592', 'Animi et tempora animi ab odio esse odio non.', 'Id est quo libero natus. Blanditiis ipsa consequuntur nobis magnam architecto. Facilis dolor similique accusamus eaque architecto. Qui sunt nostrum laboriosam nisi. Et ab qui saepe similique et eveniet maxime. Pariatur laudantium optio nisi esse voluptatum dolor dolore. Velit id corrupti exercitationem ut quam assumenda voluptas. Culpa consequatur aspernatur asperiores ut itaque inventore repellat.', 'unread', '2021-04-06 23:41:08', '2021-04-06 23:41:08'),
(9, 'Eloise Frami', 'danyka93@example.net', '+1-732-874-5781', '934 Gutmann Spring\nVeronicatown, NY 84899', 'Tenetur cumque numquam nemo sit at dolores eos.', 'Aut mollitia enim a accusantium labore. Provident dolor doloremque nulla id quo rerum fugiat. Ut eaque ut vero. Accusamus sed aut ratione quis ut voluptatibus ullam. Nihil eligendi impedit consectetur. Voluptatem accusantium eum iste recusandae. Distinctio et voluptatem voluptate necessitatibus cupiditate. Facere odio et omnis consequatur optio. Impedit non omnis et placeat eos aut.', 'unread', '2021-04-06 23:41:08', '2021-04-06 23:41:08'),
(10, 'Veda Halvorson', 'maya88@example.com', '+1 (423) 569-1062', '59760 Maggio Island Apt. 131\nJulieville, MD 63616', 'Voluptatibus aut sequi rerum fuga omnis.', 'Perspiciatis animi qui omnis pariatur quae. Laudantium sint illo ab mollitia sequi est. Corporis saepe est sapiente porro ratione laudantium provident eveniet. A eos et veniam fugit. Iusto aliquam sunt libero eveniet blanditiis iure sunt. Eius et dolore harum et ut et tenetur. Eum aliquid et nihil vitae a necessitatibus ad. Repudiandae nobis soluta commodi aliquam similique possimus minima odit. Animi eum enim sit sit a voluptatem. Enim reiciendis odit quo quibusdam itaque similique.', 'unread', '2021-04-06 23:41:08', '2021-04-06 23:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `contact_replies`
--

CREATE TABLE `contact_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `use_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `use_for_id` int(10) UNSIGNED NOT NULL,
  `field_item_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_widgets`
--

CREATE TABLE `dashboard_widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dashboard_widgets`
--

INSERT INTO `dashboard_widgets` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'widget_total_themes', '2021-10-11 09:28:45', '2021-10-11 09:28:45'),
(2, 'widget_total_users', '2021-10-11 09:28:46', '2021-10-11 09:28:46'),
(3, 'widget_total_pages', '2021-10-11 09:28:46', '2021-10-11 09:28:46'),
(4, 'widget_total_plugins', '2021-10-11 09:28:46', '2021-10-11 09:28:46'),
(5, 'widget_analytics_general', '2021-10-11 09:28:46', '2021-10-11 09:28:46'),
(6, 'widget_analytics_page', '2021-10-11 09:28:46', '2021-10-11 09:28:46'),
(7, 'widget_analytics_browser', '2021-10-11 09:28:46', '2021-10-11 09:28:46'),
(8, 'widget_posts_recent', '2021-10-11 09:28:46', '2021-10-11 09:28:46'),
(9, 'widget_analytics_referrer', '2021-10-11 09:28:46', '2021-10-11 09:28:46'),
(10, 'widget_audit_logs', '2021-10-11 09:28:46', '2021-10-11 09:28:46'),
(11, 'widget_request_errors', '2021-10-11 09:28:46', '2021-10-11 09:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_widget_settings`
--

CREATE TABLE `dashboard_widget_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `widget_id` int(10) UNSIGNED NOT NULL,
  `order` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `field_groups`
--

CREATE TABLE `field_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rules` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `field_items`
--

CREATE TABLE `field_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_group_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `order` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `description`, `is_featured`, `order`, `image`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Perfect', 'Est qui commodi ipsum laudantium quia. Reprehenderit quibusdam ea est facere itaque.', 1, 0, 'galleries/1.jpg', 1, 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(2, 'New Day', 'Eveniet voluptas maiores omnis soluta iste. Quisquam non qui consequuntur ut quae. Aut amet error quos quo fugiat omnis. Eum rerum ea voluptatem ad.', 1, 0, 'galleries/2.jpg', 1, 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(3, 'Happy Day', 'Laborum consequatur sint voluptas totam dolorem sunt. Facere explicabo quisquam impedit repellat magni consequuntur. Cumque rerum quod sed.', 1, 0, 'galleries/3.jpg', 1, 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(4, 'Nature', 'Id qui nihil ut sunt sit libero. Aut ex voluptatem eum corrupti recusandae alias. Aut dolorem qui libero consequatur non.', 1, 0, 'galleries/4.jpg', 1, 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(5, 'Morning', 'Nulla reiciendis labore ullam accusantium sit. Voluptas est rerum in dignissimos.', 1, 0, 'galleries/5.jpg', 1, 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(6, 'Photography', 'Ut odit sunt tenetur fugit ipsam consectetur. Porro soluta maxime porro necessitatibus. Molestiae unde facere sint. Ipsa reprehenderit ab sequi sed.', 1, 0, 'galleries/6.jpg', 1, 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(7, 'Hoàn hảo', 'Accusantium repellendus nemo adipisci. Necessitatibus dignissimos quasi asperiores ut aut. Qui optio qui sequi consequuntur praesentium.', 1, 0, 'galleries/1.jpg', 1, 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(8, 'Ngày mới', 'Doloribus molestias repellendus aut nesciunt dolor. Rerum cumque reiciendis voluptatem sit voluptas. Aperiam nostrum suscipit iure sit quia.', 1, 0, 'galleries/2.jpg', 1, 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(9, 'Ngày hạnh phúc', 'Et aut similique quaerat impedit et provident atque velit. Ea quidem ad rem fugit. Est qui ullam facilis aliquam. Autem hic quasi repudiandae quia.', 1, 0, 'galleries/3.jpg', 1, 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(10, 'Thiên nhiên', 'Natus quos dignissimos inventore aut commodi illo eligendi. Nihil quae et nisi sit ad. Voluptate aliquam et dignissimos consequatur ut fugiat.', 1, 0, 'galleries/4.jpg', 1, 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(11, 'Buổi sáng', 'Quas ut laboriosam ad ipsam ipsam quam. Unde iusto et numquam. Distinctio doloremque hic nobis. Debitis accusamus harum suscipit doloribus qui est.', 1, 0, 'galleries/5.jpg', 1, 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(12, 'Nghệ thuật', 'Minus fugiat ducimus et consequatur. Iste autem eum mollitia alias qui suscipit. Aliquid eos dignissimos nesciunt itaque harum.', 1, 0, 'galleries/6.jpg', 1, 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_meta`
--

CREATE TABLE `gallery_meta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` int(10) UNSIGNED NOT NULL,
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_meta`
--

INSERT INTO `gallery_meta` (`id`, `images`, `reference_id`, `reference_type`, `created_at`, `updated_at`) VALUES
(1, '[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Ullam rem rerum non velit dolorem consequatur sed. Mollitia consequuntur unde pariatur ut. Aut non cum ut. Qui occaecati non rerum.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Deserunt est facilis enim aut repellendus. Rerum qui ea tenetur tenetur sed sunt impedit. Ut autem aliquam et ea libero dolores architecto.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Iure expedita est aut dolores dolores ut blanditiis. Debitis quia cum officiis nemo.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Consequatur id soluta nihil numquam doloribus aliquam officiis. Accusamus voluptatibus voluptatem cum autem odit aut.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Itaque pariatur optio nesciunt incidunt nostrum. Iste exercitationem est placeat qui quis omnis. Iusto magnam et accusantium maxime maxime sapiente.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Dicta et cumque id mollitia. Quidem ut voluptatem similique est similique.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Consequatur dolorem non ut possimus error. At et eius in quia culpa dolorum magni. Alias ea consequatur et.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Voluptatum numquam quos et et reiciendis blanditiis. Quia velit porro sunt aspernatur veritatis. Voluptate aut qui qui qui qui quam nemo.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Omnis laboriosam maiores omnis ea libero. Enim quo delectus fugiat at. Aut cupiditate placeat aliquam porro earum sequi.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Ducimus labore ea voluptatibus voluptatem fuga voluptatem. Nihil eum nihil et ut ab. Aut sint quis fugit et dolor.\"}]', 1, 'Botble\\Gallery\\Models\\Gallery', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(2, '[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Ullam rem rerum non velit dolorem consequatur sed. Mollitia consequuntur unde pariatur ut. Aut non cum ut. Qui occaecati non rerum.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Deserunt est facilis enim aut repellendus. Rerum qui ea tenetur tenetur sed sunt impedit. Ut autem aliquam et ea libero dolores architecto.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Iure expedita est aut dolores dolores ut blanditiis. Debitis quia cum officiis nemo.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Consequatur id soluta nihil numquam doloribus aliquam officiis. Accusamus voluptatibus voluptatem cum autem odit aut.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Itaque pariatur optio nesciunt incidunt nostrum. Iste exercitationem est placeat qui quis omnis. Iusto magnam et accusantium maxime maxime sapiente.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Dicta et cumque id mollitia. Quidem ut voluptatem similique est similique.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Consequatur dolorem non ut possimus error. At et eius in quia culpa dolorum magni. Alias ea consequatur et.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Voluptatum numquam quos et et reiciendis blanditiis. Quia velit porro sunt aspernatur veritatis. Voluptate aut qui qui qui qui quam nemo.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Omnis laboriosam maiores omnis ea libero. Enim quo delectus fugiat at. Aut cupiditate placeat aliquam porro earum sequi.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Ducimus labore ea voluptatibus voluptatem fuga voluptatem. Nihil eum nihil et ut ab. Aut sint quis fugit et dolor.\"}]', 2, 'Botble\\Gallery\\Models\\Gallery', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(3, '[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Ullam rem rerum non velit dolorem consequatur sed. Mollitia consequuntur unde pariatur ut. Aut non cum ut. Qui occaecati non rerum.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Deserunt est facilis enim aut repellendus. Rerum qui ea tenetur tenetur sed sunt impedit. Ut autem aliquam et ea libero dolores architecto.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Iure expedita est aut dolores dolores ut blanditiis. Debitis quia cum officiis nemo.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Consequatur id soluta nihil numquam doloribus aliquam officiis. Accusamus voluptatibus voluptatem cum autem odit aut.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Itaque pariatur optio nesciunt incidunt nostrum. Iste exercitationem est placeat qui quis omnis. Iusto magnam et accusantium maxime maxime sapiente.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Dicta et cumque id mollitia. Quidem ut voluptatem similique est similique.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Consequatur dolorem non ut possimus error. At et eius in quia culpa dolorum magni. Alias ea consequatur et.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Voluptatum numquam quos et et reiciendis blanditiis. Quia velit porro sunt aspernatur veritatis. Voluptate aut qui qui qui qui quam nemo.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Omnis laboriosam maiores omnis ea libero. Enim quo delectus fugiat at. Aut cupiditate placeat aliquam porro earum sequi.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Ducimus labore ea voluptatibus voluptatem fuga voluptatem. Nihil eum nihil et ut ab. Aut sint quis fugit et dolor.\"}]', 3, 'Botble\\Gallery\\Models\\Gallery', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(4, '[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Ullam rem rerum non velit dolorem consequatur sed. Mollitia consequuntur unde pariatur ut. Aut non cum ut. Qui occaecati non rerum.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Deserunt est facilis enim aut repellendus. Rerum qui ea tenetur tenetur sed sunt impedit. Ut autem aliquam et ea libero dolores architecto.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Iure expedita est aut dolores dolores ut blanditiis. Debitis quia cum officiis nemo.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Consequatur id soluta nihil numquam doloribus aliquam officiis. Accusamus voluptatibus voluptatem cum autem odit aut.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Itaque pariatur optio nesciunt incidunt nostrum. Iste exercitationem est placeat qui quis omnis. Iusto magnam et accusantium maxime maxime sapiente.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Dicta et cumque id mollitia. Quidem ut voluptatem similique est similique.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Consequatur dolorem non ut possimus error. At et eius in quia culpa dolorum magni. Alias ea consequatur et.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Voluptatum numquam quos et et reiciendis blanditiis. Quia velit porro sunt aspernatur veritatis. Voluptate aut qui qui qui qui quam nemo.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Omnis laboriosam maiores omnis ea libero. Enim quo delectus fugiat at. Aut cupiditate placeat aliquam porro earum sequi.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Ducimus labore ea voluptatibus voluptatem fuga voluptatem. Nihil eum nihil et ut ab. Aut sint quis fugit et dolor.\"}]', 4, 'Botble\\Gallery\\Models\\Gallery', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(5, '[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Ullam rem rerum non velit dolorem consequatur sed. Mollitia consequuntur unde pariatur ut. Aut non cum ut. Qui occaecati non rerum.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Deserunt est facilis enim aut repellendus. Rerum qui ea tenetur tenetur sed sunt impedit. Ut autem aliquam et ea libero dolores architecto.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Iure expedita est aut dolores dolores ut blanditiis. Debitis quia cum officiis nemo.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Consequatur id soluta nihil numquam doloribus aliquam officiis. Accusamus voluptatibus voluptatem cum autem odit aut.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Itaque pariatur optio nesciunt incidunt nostrum. Iste exercitationem est placeat qui quis omnis. Iusto magnam et accusantium maxime maxime sapiente.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Dicta et cumque id mollitia. Quidem ut voluptatem similique est similique.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Consequatur dolorem non ut possimus error. At et eius in quia culpa dolorum magni. Alias ea consequatur et.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Voluptatum numquam quos et et reiciendis blanditiis. Quia velit porro sunt aspernatur veritatis. Voluptate aut qui qui qui qui quam nemo.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Omnis laboriosam maiores omnis ea libero. Enim quo delectus fugiat at. Aut cupiditate placeat aliquam porro earum sequi.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Ducimus labore ea voluptatibus voluptatem fuga voluptatem. Nihil eum nihil et ut ab. Aut sint quis fugit et dolor.\"}]', 5, 'Botble\\Gallery\\Models\\Gallery', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(6, '[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Ullam rem rerum non velit dolorem consequatur sed. Mollitia consequuntur unde pariatur ut. Aut non cum ut. Qui occaecati non rerum.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Deserunt est facilis enim aut repellendus. Rerum qui ea tenetur tenetur sed sunt impedit. Ut autem aliquam et ea libero dolores architecto.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Iure expedita est aut dolores dolores ut blanditiis. Debitis quia cum officiis nemo.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Consequatur id soluta nihil numquam doloribus aliquam officiis. Accusamus voluptatibus voluptatem cum autem odit aut.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Itaque pariatur optio nesciunt incidunt nostrum. Iste exercitationem est placeat qui quis omnis. Iusto magnam et accusantium maxime maxime sapiente.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Dicta et cumque id mollitia. Quidem ut voluptatem similique est similique.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Consequatur dolorem non ut possimus error. At et eius in quia culpa dolorum magni. Alias ea consequatur et.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Voluptatum numquam quos et et reiciendis blanditiis. Quia velit porro sunt aspernatur veritatis. Voluptate aut qui qui qui qui quam nemo.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Omnis laboriosam maiores omnis ea libero. Enim quo delectus fugiat at. Aut cupiditate placeat aliquam porro earum sequi.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Ducimus labore ea voluptatibus voluptatem fuga voluptatem. Nihil eum nihil et ut ab. Aut sint quis fugit et dolor.\"}]', 6, 'Botble\\Gallery\\Models\\Gallery', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(7, '[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Ullam rem rerum non velit dolorem consequatur sed. Mollitia consequuntur unde pariatur ut. Aut non cum ut. Qui occaecati non rerum.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Deserunt est facilis enim aut repellendus. Rerum qui ea tenetur tenetur sed sunt impedit. Ut autem aliquam et ea libero dolores architecto.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Iure expedita est aut dolores dolores ut blanditiis. Debitis quia cum officiis nemo.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Consequatur id soluta nihil numquam doloribus aliquam officiis. Accusamus voluptatibus voluptatem cum autem odit aut.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Itaque pariatur optio nesciunt incidunt nostrum. Iste exercitationem est placeat qui quis omnis. Iusto magnam et accusantium maxime maxime sapiente.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Dicta et cumque id mollitia. Quidem ut voluptatem similique est similique.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Consequatur dolorem non ut possimus error. At et eius in quia culpa dolorum magni. Alias ea consequatur et.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Voluptatum numquam quos et et reiciendis blanditiis. Quia velit porro sunt aspernatur veritatis. Voluptate aut qui qui qui qui quam nemo.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Omnis laboriosam maiores omnis ea libero. Enim quo delectus fugiat at. Aut cupiditate placeat aliquam porro earum sequi.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Ducimus labore ea voluptatibus voluptatem fuga voluptatem. Nihil eum nihil et ut ab. Aut sint quis fugit et dolor.\"}]', 7, 'Botble\\Gallery\\Models\\Gallery', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(8, '[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Ullam rem rerum non velit dolorem consequatur sed. Mollitia consequuntur unde pariatur ut. Aut non cum ut. Qui occaecati non rerum.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Deserunt est facilis enim aut repellendus. Rerum qui ea tenetur tenetur sed sunt impedit. Ut autem aliquam et ea libero dolores architecto.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Iure expedita est aut dolores dolores ut blanditiis. Debitis quia cum officiis nemo.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Consequatur id soluta nihil numquam doloribus aliquam officiis. Accusamus voluptatibus voluptatem cum autem odit aut.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Itaque pariatur optio nesciunt incidunt nostrum. Iste exercitationem est placeat qui quis omnis. Iusto magnam et accusantium maxime maxime sapiente.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Dicta et cumque id mollitia. Quidem ut voluptatem similique est similique.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Consequatur dolorem non ut possimus error. At et eius in quia culpa dolorum magni. Alias ea consequatur et.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Voluptatum numquam quos et et reiciendis blanditiis. Quia velit porro sunt aspernatur veritatis. Voluptate aut qui qui qui qui quam nemo.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Omnis laboriosam maiores omnis ea libero. Enim quo delectus fugiat at. Aut cupiditate placeat aliquam porro earum sequi.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Ducimus labore ea voluptatibus voluptatem fuga voluptatem. Nihil eum nihil et ut ab. Aut sint quis fugit et dolor.\"}]', 8, 'Botble\\Gallery\\Models\\Gallery', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(9, '[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Ullam rem rerum non velit dolorem consequatur sed. Mollitia consequuntur unde pariatur ut. Aut non cum ut. Qui occaecati non rerum.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Deserunt est facilis enim aut repellendus. Rerum qui ea tenetur tenetur sed sunt impedit. Ut autem aliquam et ea libero dolores architecto.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Iure expedita est aut dolores dolores ut blanditiis. Debitis quia cum officiis nemo.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Consequatur id soluta nihil numquam doloribus aliquam officiis. Accusamus voluptatibus voluptatem cum autem odit aut.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Itaque pariatur optio nesciunt incidunt nostrum. Iste exercitationem est placeat qui quis omnis. Iusto magnam et accusantium maxime maxime sapiente.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Dicta et cumque id mollitia. Quidem ut voluptatem similique est similique.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Consequatur dolorem non ut possimus error. At et eius in quia culpa dolorum magni. Alias ea consequatur et.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Voluptatum numquam quos et et reiciendis blanditiis. Quia velit porro sunt aspernatur veritatis. Voluptate aut qui qui qui qui quam nemo.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Omnis laboriosam maiores omnis ea libero. Enim quo delectus fugiat at. Aut cupiditate placeat aliquam porro earum sequi.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Ducimus labore ea voluptatibus voluptatem fuga voluptatem. Nihil eum nihil et ut ab. Aut sint quis fugit et dolor.\"}]', 9, 'Botble\\Gallery\\Models\\Gallery', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(10, '[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Ullam rem rerum non velit dolorem consequatur sed. Mollitia consequuntur unde pariatur ut. Aut non cum ut. Qui occaecati non rerum.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Deserunt est facilis enim aut repellendus. Rerum qui ea tenetur tenetur sed sunt impedit. Ut autem aliquam et ea libero dolores architecto.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Iure expedita est aut dolores dolores ut blanditiis. Debitis quia cum officiis nemo.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Consequatur id soluta nihil numquam doloribus aliquam officiis. Accusamus voluptatibus voluptatem cum autem odit aut.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Itaque pariatur optio nesciunt incidunt nostrum. Iste exercitationem est placeat qui quis omnis. Iusto magnam et accusantium maxime maxime sapiente.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Dicta et cumque id mollitia. Quidem ut voluptatem similique est similique.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Consequatur dolorem non ut possimus error. At et eius in quia culpa dolorum magni. Alias ea consequatur et.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Voluptatum numquam quos et et reiciendis blanditiis. Quia velit porro sunt aspernatur veritatis. Voluptate aut qui qui qui qui quam nemo.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Omnis laboriosam maiores omnis ea libero. Enim quo delectus fugiat at. Aut cupiditate placeat aliquam porro earum sequi.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Ducimus labore ea voluptatibus voluptatem fuga voluptatem. Nihil eum nihil et ut ab. Aut sint quis fugit et dolor.\"}]', 10, 'Botble\\Gallery\\Models\\Gallery', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(11, '[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Ullam rem rerum non velit dolorem consequatur sed. Mollitia consequuntur unde pariatur ut. Aut non cum ut. Qui occaecati non rerum.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Deserunt est facilis enim aut repellendus. Rerum qui ea tenetur tenetur sed sunt impedit. Ut autem aliquam et ea libero dolores architecto.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Iure expedita est aut dolores dolores ut blanditiis. Debitis quia cum officiis nemo.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Consequatur id soluta nihil numquam doloribus aliquam officiis. Accusamus voluptatibus voluptatem cum autem odit aut.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Itaque pariatur optio nesciunt incidunt nostrum. Iste exercitationem est placeat qui quis omnis. Iusto magnam et accusantium maxime maxime sapiente.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Dicta et cumque id mollitia. Quidem ut voluptatem similique est similique.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Consequatur dolorem non ut possimus error. At et eius in quia culpa dolorum magni. Alias ea consequatur et.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Voluptatum numquam quos et et reiciendis blanditiis. Quia velit porro sunt aspernatur veritatis. Voluptate aut qui qui qui qui quam nemo.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Omnis laboriosam maiores omnis ea libero. Enim quo delectus fugiat at. Aut cupiditate placeat aliquam porro earum sequi.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Ducimus labore ea voluptatibus voluptatem fuga voluptatem. Nihil eum nihil et ut ab. Aut sint quis fugit et dolor.\"}]', 11, 'Botble\\Gallery\\Models\\Gallery', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(12, '[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Ullam rem rerum non velit dolorem consequatur sed. Mollitia consequuntur unde pariatur ut. Aut non cum ut. Qui occaecati non rerum.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Deserunt est facilis enim aut repellendus. Rerum qui ea tenetur tenetur sed sunt impedit. Ut autem aliquam et ea libero dolores architecto.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Iure expedita est aut dolores dolores ut blanditiis. Debitis quia cum officiis nemo.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Consequatur id soluta nihil numquam doloribus aliquam officiis. Accusamus voluptatibus voluptatem cum autem odit aut.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Itaque pariatur optio nesciunt incidunt nostrum. Iste exercitationem est placeat qui quis omnis. Iusto magnam et accusantium maxime maxime sapiente.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Dicta et cumque id mollitia. Quidem ut voluptatem similique est similique.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Consequatur dolorem non ut possimus error. At et eius in quia culpa dolorum magni. Alias ea consequatur et.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Voluptatum numquam quos et et reiciendis blanditiis. Quia velit porro sunt aspernatur veritatis. Voluptate aut qui qui qui qui quam nemo.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Omnis laboriosam maiores omnis ea libero. Enim quo delectus fugiat at. Aut cupiditate placeat aliquam porro earum sequi.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Ducimus labore ea voluptatibus voluptatem fuga voluptatem. Nihil eum nihil et ut ab. Aut sint quis fugit et dolor.\"}]', 12, 'Botble\\Gallery\\Models\\Gallery', '2021-04-06 23:41:05', '2021-04-06 23:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `lang_id` int(10) UNSIGNED NOT NULL,
  `lang_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_flag` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_is_default` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `lang_order` int(11) NOT NULL DEFAULT 0,
  `lang_is_rtl` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`lang_id`, `lang_name`, `lang_locale`, `lang_code`, `lang_flag`, `lang_is_default`, `lang_order`, `lang_is_rtl`) VALUES
(1, 'English', 'en', 'en_US', 'us', 1, 0, 0),
(2, 'Tiếng Việt', 'vi', 'vi', 'vn', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `language_meta`
--

CREATE TABLE `language_meta` (
  `lang_meta_id` int(10) UNSIGNED NOT NULL,
  `lang_meta_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_meta_origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` int(10) UNSIGNED NOT NULL,
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_meta`
--

INSERT INTO `language_meta` (`lang_meta_id`, `lang_meta_code`, `lang_meta_origin`, `reference_id`, `reference_type`) VALUES
(1, 'en_US', 'b74c86e2df4c52b6cb082197e367513d', 1, 'Botble\\Page\\Models\\Page'),
(2, 'en_US', 'dcc31fdfa5e294bf348da34d9a83a34d', 2, 'Botble\\Page\\Models\\Page'),
(3, 'en_US', '74056f8b564a4a0c10b68a62fb80b99e', 3, 'Botble\\Page\\Models\\Page'),
(4, 'en_US', 'dac3c7fe1505eb9e2e80d66dc0fe311d', 4, 'Botble\\Page\\Models\\Page'),
(5, 'vi', 'b74c86e2df4c52b6cb082197e367513d', 5, 'Botble\\Page\\Models\\Page'),
(6, 'vi', 'dcc31fdfa5e294bf348da34d9a83a34d', 6, 'Botble\\Page\\Models\\Page'),
(7, 'vi', '74056f8b564a4a0c10b68a62fb80b99e', 7, 'Botble\\Page\\Models\\Page'),
(8, 'vi', 'dac3c7fe1505eb9e2e80d66dc0fe311d', 8, 'Botble\\Page\\Models\\Page'),
(9, 'en_US', 'fbb7d6064c844fe5e6c4b4c76ef50dbe', 1, 'Botble\\Gallery\\Models\\Gallery'),
(10, 'en_US', '63f2124fda409fc0d175070a5f9af9f0', 2, 'Botble\\Gallery\\Models\\Gallery'),
(11, 'en_US', 'ea3de8e7b698f118b9181c6b3286d890', 3, 'Botble\\Gallery\\Models\\Gallery'),
(12, 'en_US', '0ca4d4a850b4ca1e02cdf418260fe149', 4, 'Botble\\Gallery\\Models\\Gallery'),
(13, 'en_US', '4069633da0d15ec729404fb2672fb116', 5, 'Botble\\Gallery\\Models\\Gallery'),
(14, 'en_US', 'ef0a84bc1e6190ebed4f1a31862ed4ad', 6, 'Botble\\Gallery\\Models\\Gallery'),
(15, 'vi', 'fbb7d6064c844fe5e6c4b4c76ef50dbe', 7, 'Botble\\Gallery\\Models\\Gallery'),
(16, 'vi', '63f2124fda409fc0d175070a5f9af9f0', 8, 'Botble\\Gallery\\Models\\Gallery'),
(17, 'vi', 'ea3de8e7b698f118b9181c6b3286d890', 9, 'Botble\\Gallery\\Models\\Gallery'),
(18, 'vi', '0ca4d4a850b4ca1e02cdf418260fe149', 10, 'Botble\\Gallery\\Models\\Gallery'),
(19, 'vi', '4069633da0d15ec729404fb2672fb116', 11, 'Botble\\Gallery\\Models\\Gallery'),
(20, 'vi', 'ef0a84bc1e6190ebed4f1a31862ed4ad', 12, 'Botble\\Gallery\\Models\\Gallery'),
(21, 'en_US', 'fdf4920d71a978b20f038532a386df0f', 1, 'Botble\\Menu\\Models\\MenuLocation'),
(22, 'en_US', 'f8c0acc4cbd42723d307d1bbff8c2f6f', 1, 'Botble\\Menu\\Models\\Menu'),
(23, 'en_US', '77a094497acaeee02fb51a665ae39cdd', 2, 'Botble\\Menu\\Models\\Menu'),
(24, 'en_US', '555ccfa473e26c975ab9dcac41e2a8c1', 3, 'Botble\\Menu\\Models\\Menu'),
(25, 'en_US', '05111edf5cffbc93416b3b13c5aca36b', 4, 'Botble\\Menu\\Models\\Menu'),
(26, 'en_US', '8e94a44574c70c9a7afe58bd9e9f47b8', 5, 'Botble\\Menu\\Models\\Menu'),
(27, 'vi', 'c6bd4197ad83fa8a848557d4560e86d4', 2, 'Botble\\Menu\\Models\\MenuLocation'),
(28, 'vi', 'f8c0acc4cbd42723d307d1bbff8c2f6f', 6, 'Botble\\Menu\\Models\\Menu'),
(29, 'vi', '77a094497acaeee02fb51a665ae39cdd', 7, 'Botble\\Menu\\Models\\Menu'),
(30, 'vi', '555ccfa473e26c975ab9dcac41e2a8c1', 8, 'Botble\\Menu\\Models\\Menu'),
(31, 'vi', '05111edf5cffbc93416b3b13c5aca36b', 9, 'Botble\\Menu\\Models\\Menu'),
(32, 'vi', '8e94a44574c70c9a7afe58bd9e9f47b8', 10, 'Botble\\Menu\\Models\\Menu'),
(33, NULL, '90791c245ed71e8b54e9933c686ea415', 1, 'Botble\\Block\\Models\\Block'),
(34, NULL, 'b2e0bee11cd942fc23eae67ce7d6acb8', 2, 'Botble\\Block\\Models\\Block'),
(35, NULL, 'baf2b8c3d52e5df0407ed151a488e611', 3, 'Botble\\Block\\Models\\Block'),
(36, NULL, '64984324f4527e1448e8398b908b0e49', 4, 'Botble\\Block\\Models\\Block'),
(37, NULL, '4c9d2c62fb98fccecc341b716410a675', 5, 'Botble\\Block\\Models\\Block'),
(38, 'en_US', '2bcbb21a451210be040910fd4833048d', 1, 'Botble\\Blog\\Models\\Category'),
(39, 'en_US', '0460d33c20b12c896aa0a1d94d6745df', 2, 'Botble\\Blog\\Models\\Category'),
(40, 'en_US', 'b2d92df37b91c207380c975d02ea500a', 3, 'Botble\\Blog\\Models\\Category'),
(41, 'en_US', 'baf98df1db2270cd6a082b524fbdfa45', 4, 'Botble\\Blog\\Models\\Category'),
(42, 'en_US', '54346a4e6bc87135f0290ae11fbee88e', 5, 'Botble\\Blog\\Models\\Category'),
(43, 'en_US', '4b93774532b2684aa2ba4cfca4743fcd', 6, 'Botble\\Blog\\Models\\Category'),
(44, 'en_US', 'e0ca0152b146eb146e8b2a5b7a2ae213', 7, 'Botble\\Blog\\Models\\Category'),
(45, 'vi', '2bcbb21a451210be040910fd4833048d', 8, 'Botble\\Blog\\Models\\Category'),
(46, 'vi', '0460d33c20b12c896aa0a1d94d6745df', 9, 'Botble\\Blog\\Models\\Category'),
(47, 'vi', 'b2d92df37b91c207380c975d02ea500a', 10, 'Botble\\Blog\\Models\\Category'),
(48, 'vi', 'baf98df1db2270cd6a082b524fbdfa45', 11, 'Botble\\Blog\\Models\\Category'),
(49, 'vi', '54346a4e6bc87135f0290ae11fbee88e', 12, 'Botble\\Blog\\Models\\Category'),
(50, 'vi', '4b93774532b2684aa2ba4cfca4743fcd', 13, 'Botble\\Blog\\Models\\Category'),
(51, 'vi', 'e0ca0152b146eb146e8b2a5b7a2ae213', 14, 'Botble\\Blog\\Models\\Category'),
(52, 'en_US', '8e5ed37e9e7b92a8646a12e18a87969e', 1, 'Botble\\Blog\\Models\\Tag'),
(53, 'en_US', '16b64dae810147c9b40ec63f11d23043', 2, 'Botble\\Blog\\Models\\Tag'),
(54, 'en_US', 'f200bb999f711777126b1e8ba0405240', 3, 'Botble\\Blog\\Models\\Tag'),
(55, 'en_US', 'cff95e3b2a10eebe44c46fcff0615487', 4, 'Botble\\Blog\\Models\\Tag'),
(56, 'en_US', 'd6bc3445214f0a33f6f21cf2caf69f46', 5, 'Botble\\Blog\\Models\\Tag'),
(57, 'vi', '8e5ed37e9e7b92a8646a12e18a87969e', 6, 'Botble\\Blog\\Models\\Tag'),
(58, 'vi', '16b64dae810147c9b40ec63f11d23043', 7, 'Botble\\Blog\\Models\\Tag'),
(59, 'vi', 'f200bb999f711777126b1e8ba0405240', 8, 'Botble\\Blog\\Models\\Tag'),
(60, 'vi', 'cff95e3b2a10eebe44c46fcff0615487', 9, 'Botble\\Blog\\Models\\Tag'),
(61, 'vi', 'd6bc3445214f0a33f6f21cf2caf69f46', 10, 'Botble\\Blog\\Models\\Tag'),
(62, 'en_US', '5d31df6d2d0e6ccba2d032a7ee89b1fc', 1, 'Botble\\Blog\\Models\\Post'),
(63, 'en_US', '2f0024372cd7aff1b13386af8b03ffeb', 2, 'Botble\\Blog\\Models\\Post'),
(64, 'en_US', 'ccee839f4b5cd7e9d912eab886245f59', 3, 'Botble\\Blog\\Models\\Post'),
(65, 'en_US', '68681971fbbafb4cfdccb748fe82a5bf', 4, 'Botble\\Blog\\Models\\Post'),
(66, 'en_US', '99461d1c4ab27ba039e7ca7e2ea092b7', 5, 'Botble\\Blog\\Models\\Post'),
(67, 'en_US', '1b026c8e7410ac19efad798ac8b2cd2a', 6, 'Botble\\Blog\\Models\\Post'),
(68, 'en_US', '69f1c3b5a35f6d5bdce421b8a976952e', 7, 'Botble\\Blog\\Models\\Post'),
(69, 'en_US', '29c22cd93bb1618baaff35fa47622664', 8, 'Botble\\Blog\\Models\\Post'),
(70, 'en_US', 'c1036b61c3dab5c6165db498b7392950', 9, 'Botble\\Blog\\Models\\Post'),
(71, 'en_US', '14c6bc857f7b0c32a61ea0e4ab7cae1d', 10, 'Botble\\Blog\\Models\\Post'),
(72, 'en_US', '7f880da64f189d046d575450469ca09a', 11, 'Botble\\Blog\\Models\\Post'),
(73, 'en_US', '9a1186b46c68ce68b32d94b48745df49', 12, 'Botble\\Blog\\Models\\Post'),
(74, 'en_US', '48b2b2a75c60beb4038648895c3b1f10', 13, 'Botble\\Blog\\Models\\Post'),
(75, 'en_US', '038087943648101b64cf8f4b2dee3756', 14, 'Botble\\Blog\\Models\\Post'),
(76, 'en_US', '73373c3c12211e5b117fddb901476774', 15, 'Botble\\Blog\\Models\\Post'),
(77, 'en_US', '5156cd14816b734acdf64995e69e8ef3', 16, 'Botble\\Blog\\Models\\Post'),
(78, 'vi', '5d31df6d2d0e6ccba2d032a7ee89b1fc', 17, 'Botble\\Blog\\Models\\Post'),
(79, 'vi', '2f0024372cd7aff1b13386af8b03ffeb', 18, 'Botble\\Blog\\Models\\Post'),
(80, 'vi', 'ccee839f4b5cd7e9d912eab886245f59', 19, 'Botble\\Blog\\Models\\Post'),
(81, 'vi', '68681971fbbafb4cfdccb748fe82a5bf', 20, 'Botble\\Blog\\Models\\Post'),
(82, 'vi', '99461d1c4ab27ba039e7ca7e2ea092b7', 21, 'Botble\\Blog\\Models\\Post'),
(83, 'vi', '1b026c8e7410ac19efad798ac8b2cd2a', 22, 'Botble\\Blog\\Models\\Post'),
(84, 'vi', '69f1c3b5a35f6d5bdce421b8a976952e', 23, 'Botble\\Blog\\Models\\Post'),
(85, 'vi', '29c22cd93bb1618baaff35fa47622664', 24, 'Botble\\Blog\\Models\\Post'),
(86, 'vi', 'c1036b61c3dab5c6165db498b7392950', 25, 'Botble\\Blog\\Models\\Post'),
(87, 'vi', '14c6bc857f7b0c32a61ea0e4ab7cae1d', 26, 'Botble\\Blog\\Models\\Post'),
(88, 'vi', '7f880da64f189d046d575450469ca09a', 27, 'Botble\\Blog\\Models\\Post'),
(89, 'vi', '9a1186b46c68ce68b32d94b48745df49', 28, 'Botble\\Blog\\Models\\Post'),
(90, 'vi', '48b2b2a75c60beb4038648895c3b1f10', 29, 'Botble\\Blog\\Models\\Post'),
(91, 'vi', '038087943648101b64cf8f4b2dee3756', 30, 'Botble\\Blog\\Models\\Post'),
(92, 'vi', '73373c3c12211e5b117fddb901476774', 31, 'Botble\\Blog\\Models\\Post'),
(93, 'vi', '5156cd14816b734acdf64995e69e8ef3', 32, 'Botble\\Blog\\Models\\Post');

-- --------------------------------------------------------

--
-- Table structure for table `media_files`
--

CREATE TABLE `media_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `mime_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_files`
--

INSERT INTO `media_files` (`id`, `user_id`, `name`, `folder_id`, `mime_type`, `size`, `url`, `options`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, '1', 1, 'image/jpeg', 42814, 'galleries/1.jpg', '[]', '2021-04-06 23:41:03', '2021-04-06 23:41:03', NULL),
(2, 0, '10', 1, 'image/jpeg', 95796, 'galleries/10.jpg', '[]', '2021-04-06 23:41:03', '2021-04-06 23:41:03', NULL),
(3, 0, '2', 1, 'image/jpeg', 43108, 'galleries/2.jpg', '[]', '2021-04-06 23:41:03', '2021-04-06 23:41:03', NULL),
(4, 0, '3', 1, 'image/jpeg', 67060, 'galleries/3.jpg', '[]', '2021-04-06 23:41:03', '2021-04-06 23:41:03', NULL),
(5, 0, '4', 1, 'image/jpeg', 60609, 'galleries/4.jpg', '[]', '2021-04-06 23:41:04', '2021-04-06 23:41:04', NULL),
(6, 0, '5', 1, 'image/jpeg', 70264, 'galleries/5.jpg', '[]', '2021-04-06 23:41:04', '2021-04-06 23:41:04', NULL),
(7, 0, '6', 1, 'image/jpeg', 40607, 'galleries/6.jpg', '[]', '2021-04-06 23:41:04', '2021-04-06 23:41:04', NULL),
(8, 0, '7', 1, 'image/jpeg', 41491, 'galleries/7.jpg', '[]', '2021-04-06 23:41:04', '2021-04-06 23:41:04', NULL),
(9, 0, '8', 1, 'image/jpeg', 58063, 'galleries/8.jpg', '[]', '2021-04-06 23:41:04', '2021-04-06 23:41:04', NULL),
(10, 0, '9', 1, 'image/jpeg', 69288, 'galleries/9.jpg', '[]', '2021-04-06 23:41:04', '2021-04-06 23:41:04', NULL),
(11, 0, 'favicon', 2, 'image/png', 3807, 'general/favicon.png', '[]', '2021-04-06 23:41:08', '2021-04-06 23:41:08', NULL),
(12, 0, 'logo', 2, 'image/png', 138446, 'general/logo.png', '[]', '2021-04-06 23:41:08', '2021-04-06 23:41:08', NULL),
(13, 0, '1', 3, 'image/jpeg', 37471, 'news/1.jpg', '[]', '2021-04-06 23:41:09', '2021-04-06 23:41:09', NULL),
(14, 0, '10', 3, 'image/jpeg', 40607, 'news/10.jpg', '[]', '2021-04-06 23:41:09', '2021-04-06 23:41:09', NULL),
(15, 0, '11', 3, 'image/jpeg', 82629, 'news/11.jpg', '[]', '2021-04-06 23:41:09', '2021-04-06 23:41:09', NULL),
(16, 0, '12', 3, 'image/jpeg', 119904, 'news/12.jpg', '[]', '2021-04-06 23:41:09', '2021-04-06 23:41:09', NULL),
(17, 0, '13', 3, 'image/jpeg', 89543, 'news/13.jpg', '[]', '2021-04-06 23:41:10', '2021-04-06 23:41:10', NULL),
(18, 0, '14', 3, 'image/jpeg', 51573, 'news/14.jpg', '[]', '2021-04-06 23:41:10', '2021-04-06 23:41:10', NULL),
(19, 0, '15', 3, 'image/jpeg', 41164, 'news/15.jpg', '[]', '2021-04-06 23:41:10', '2021-04-06 23:41:10', NULL),
(20, 0, '16', 3, 'image/jpeg', 80696, 'news/16.jpg', '[]', '2021-04-06 23:41:10', '2021-04-06 23:41:10', NULL),
(21, 0, '2', 3, 'image/jpeg', 95796, 'news/2.jpg', '[]', '2021-04-06 23:41:10', '2021-04-06 23:41:10', NULL),
(22, 0, '3', 3, 'image/jpeg', 81399, 'news/3.jpg', '[]', '2021-04-06 23:41:11', '2021-04-06 23:41:11', NULL),
(23, 0, '4', 3, 'image/jpeg', 68906, 'news/4.jpg', '[]', '2021-04-06 23:41:11', '2021-04-06 23:41:11', NULL),
(24, 0, '5', 3, 'image/jpeg', 63094, 'news/5.jpg', '[]', '2021-04-06 23:41:11', '2021-04-06 23:41:11', NULL),
(25, 0, '6', 3, 'image/jpeg', 89733, 'news/6.jpg', '[]', '2021-04-06 23:41:11', '2021-04-06 23:41:11', NULL),
(26, 0, '7', 3, 'image/jpeg', 43998, 'news/7.jpg', '[]', '2021-04-06 23:41:11', '2021-04-06 23:41:11', NULL),
(27, 0, '8', 3, 'image/jpeg', 68906, 'news/8.jpg', '[]', '2021-04-06 23:41:12', '2021-04-06 23:41:12', NULL),
(28, 0, '9', 3, 'image/jpeg', 58063, 'news/9.jpg', '[]', '2021-04-06 23:41:12', '2021-04-06 23:41:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media_folders`
--

CREATE TABLE `media_folders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_folders`
--

INSERT INTO `media_folders` (`id`, `user_id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'galleries', 'galleries', 0, '2021-04-06 23:41:03', '2021-04-06 23:41:03', NULL),
(2, 0, 'general', 'general', 0, '2021-04-06 23:41:08', '2021-04-06 23:41:08', NULL),
(3, 0, 'news', 'news', 0, '2021-04-06 23:41:09', '2021-04-06 23:41:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media_settings`
--

CREATE TABLE `media_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_id` int(10) UNSIGNED DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `email_verify_token` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `description`, `gender`, `email`, `password`, `avatar_id`, `dob`, `phone`, `confirmed_at`, `email_verify_token`, `remember_token`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 'John', 'Smith', 'Mystery,\' the Mock Turtle a.', NULL, 'john.smith@botble.com', '$2y$10$4vQ7Q4FzRv5wt8NH/i8/Y.H.rzkfEUupLVWoMmaHDGeFD.lmhJp5C', NULL, '1998-08-09', '+1-380-817-2881', '2021-04-07 06:41:05', NULL, NULL, '2021-04-06 23:41:05', '2021-04-06 23:41:05', 'http://chuyen-de-phat-trien-web.local/storage/members/member-1.jpg'),
(2, 'Cathryn', 'Bailey', 'Alice. \'And where HAVE my.', NULL, 'gorczany.howell@swaniawski.com', '$2y$10$fNO.X2bkT7pZ8UP/PhXwRejnIUDUHZNWCzXpTuW4P/jZBLqbJCl6i', NULL, '2009-05-01', '(725) 319-2800', '2021-04-07 06:41:06', NULL, NULL, '2021-04-06 23:41:06', '2021-04-06 23:41:06', 'http://chuyen-de-phat-trien-web.local/storage/members/member-2.jpg'),
(3, 'Alene', 'Kohler', 'King exclaimed, turning to.', NULL, 'shad.barrows@spinka.info', '$2y$10$7dUTI7iCZBbunR2YRW1NmuhMcr8x.6O8YzIL7Wi6hPCg1Or0jcXpy', NULL, '1976-10-09', '551.417.2665', '2021-04-07 06:41:06', NULL, NULL, '2021-04-06 23:41:06', '2021-04-06 23:41:06', 'http://chuyen-de-phat-trien-web.local/storage/members/member-3.jpg'),
(4, 'Madyson', 'Rohan', 'I\'ve got to?\' (Alice had.', NULL, 'dejon.mosciski@yahoo.com', '$2y$10$0EUu941pa1HH8sX3FaUcOepNmofVKJ7ilgPZ1nuD22osYfq/IGMU6', NULL, '1984-11-20', '803-207-5235', '2021-04-07 06:41:06', NULL, NULL, '2021-04-06 23:41:06', '2021-04-06 23:41:06', 'http://chuyen-de-phat-trien-web.local/storage/members/member-4.jpg'),
(5, 'Ari', 'Waelchi', 'I\'ve fallen by this time.).', NULL, 'stanton.harvey@yahoo.com', '$2y$10$WYRNLOrFzcOT8TU65z1Wme.Tbl6/mmm0Gx1JOC9i0MeOoQ.RyTk.6', NULL, '1990-11-11', '+1-706-891-4470', '2021-04-07 06:41:06', NULL, NULL, '2021-04-06 23:41:06', '2021-04-06 23:41:06', 'http://chuyen-de-phat-trien-web.local/storage/members/member-5.jpg'),
(6, 'Moshe', 'Emmerich', 'I could let you out, you.', NULL, 'alexanne47@yahoo.com', '$2y$10$a.tvuePK8UsB3BMxq5ZFk.hhZPAO6343XdtvUSSZVP3xQ5ns0IeuK', NULL, '1997-08-20', '+16679833870', '2021-04-07 06:41:07', NULL, NULL, '2021-04-06 23:41:07', '2021-04-06 23:41:07', 'http://chuyen-de-phat-trien-web.local/storage/members/member-6.jpg'),
(7, 'Nathan', 'Purdy', 'Hardly knowing what she was.', NULL, 'favian13@lebsack.net', '$2y$10$vcq9yHOAyuWU9P0nIgZY3O4/Xo.GxEV54vf8K1ki0CWKqepn2r6Bq', NULL, '2002-07-24', '(202) 291-2309', '2021-04-07 06:41:07', NULL, NULL, '2021-04-06 23:41:07', '2021-04-06 23:41:07', 'http://chuyen-de-phat-trien-web.local/storage/members/member.jpg'),
(8, 'Britney', 'Buckridge', 'Alice\'s elbow was pressed.', NULL, 'margaret.ratke@gmail.com', '$2y$10$Ll943FL8NXPa4qc4Qba/V.KL.KJjQZqbVXI9lANQ2zgR5rwbnoBT2', NULL, '2005-10-02', '1-757-250-4035', '2021-04-07 06:41:07', NULL, NULL, '2021-04-06 23:41:07', '2021-04-06 23:41:07', 'http://chuyen-de-phat-trien-web.local/storage/members/member.jpg'),
(9, 'Sadie', 'Davis', 'Alice. \'I don\'t like them.', NULL, 'kbogan@glover.info', '$2y$10$d4XU3kGNki2AolK1LdKPLeG6hLKbmu3cyKcE22ETmY7RPY1hg7YnO', NULL, '1972-04-16', '+1-740-955-4930', '2021-04-07 06:41:08', NULL, NULL, '2021-04-06 23:41:08', '2021-04-06 23:41:08', 'http://chuyen-de-phat-trien-web.local/storage/members/member.jpg'),
(10, 'Celia', 'Cartwright', 'I should frighten them out.', NULL, 'lavina38@yahoo.com', '$2y$10$y/gIuI/lSMnqGkXte/s1JeaaOgfDd6lQyvbgoT/anJk4y/gpDGJ8u', NULL, '1994-03-07', '1-434-889-0917', '2021-04-07 06:41:08', NULL, NULL, '2021-04-06 23:41:08', '2021-04-06 23:41:08', '\"http://chuyen-de-phat-trien-web.local/storage/members/member.png\"http://chuyen-de-phat-trien-web.local/storage/members/member.jpg'),
(11, 'Taurean', 'McClure', 'This of course, to begin.', NULL, 'savanah.kihn@yahoo.com', '$2y$10$GLFF2eJutarZnLlz0Jz5YOzJ38UuN.TZAoa19dPpFBTKpF16q4hyG', NULL, '1979-04-14', '+1-716-810-3965', '2021-04-07 06:41:08', NULL, NULL, '2021-04-06 23:41:08', '2021-04-06 23:41:08', '\"http://chuyen-de-phat-trien-web.local/storage/members/member.png\"http://chuyen-de-phat-trien-web.local/storage/members/member.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member_activity_logs`
--

CREATE TABLE `member_activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(39) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_password_resets`
--

CREATE TABLE `member_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Main menu', 'main-menu', 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(2, 'Favorite websites', 'favorite-websites', 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(3, 'My links', 'my-links', 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(4, 'Featured Categories', 'featured-categories', 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(5, 'Social', 'social', 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(6, 'Menu chính', 'menu-chinh', 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(7, 'Trang web yêu thích', 'trang-web-yeu-thich', 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(8, 'Liên kết', 'lien-ket', 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(9, 'Danh mục nổi bật', 'danh-muc-noi-bat', 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(10, 'Mạng xã hội', 'mang-xa-hoi', 'published', '2021-04-06 23:41:05', '2021-04-06 23:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `menu_locations`
--

CREATE TABLE `menu_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `location` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_locations`
--

INSERT INTO `menu_locations` (`id`, `menu_id`, `location`, `created_at`, `updated_at`) VALUES
(1, 1, 'main-menu', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(2, 6, 'main-menu', '2021-04-06 23:41:05', '2021-04-06 23:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `menu_nodes`
--

CREATE TABLE `menu_nodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `reference_id` int(10) UNSIGNED DEFAULT NULL,
  `reference_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_font` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_class` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `has_child` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_nodes`
--

INSERT INTO `menu_nodes` (`id`, `menu_id`, `parent_id`, `reference_id`, `reference_type`, `url`, `icon_font`, `position`, `title`, `css_class`, `target`, `has_child`, `created_at`, `updated_at`) VALUES
(1, 1, 0, NULL, NULL, '/', NULL, 0, 'Home', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(2, 1, 0, NULL, NULL, 'https://botble.com/go/download-cms', NULL, 0, 'Purchase', NULL, '_blank', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(3, 1, 0, 2, 'Botble\\Page\\Models\\Page', '/blog', NULL, 0, 'Blog', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(4, 1, 0, NULL, NULL, '/galleries', NULL, 0, 'Galleries', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(5, 1, 0, 3, 'Botble\\Page\\Models\\Page', '/contact', NULL, 0, 'Contact', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(6, 2, 0, NULL, NULL, 'http://speckyboy.com', NULL, 0, 'Speckyboy Magazine', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(7, 2, 0, NULL, NULL, 'http://tympanus.com', NULL, 0, 'Tympanus-Codrops', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(8, 2, 0, NULL, NULL, '#', NULL, 0, 'Kipalog Blog', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(9, 2, 0, NULL, NULL, 'http://www.sitepoint.com', NULL, 0, 'SitePoint', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(10, 2, 0, NULL, NULL, 'http://www.creativebloq.com', NULL, 0, 'CreativeBloq', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(11, 2, 0, NULL, NULL, 'http://techtalk.vn', NULL, 0, 'Techtalk', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(12, 3, 0, NULL, NULL, '/', NULL, 0, 'Homepage', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(13, 3, 0, 3, 'Botble\\Page\\Models\\Page', '/contact', NULL, 0, 'Contact', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(14, 3, 0, 6, 'Botble\\Blog\\Models\\Category', NULL, NULL, 0, 'News & Updates', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(15, 3, 0, 3, 'Botble\\Blog\\Models\\Category', NULL, NULL, 0, 'Projects', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(16, 3, 0, NULL, NULL, '/galleries', NULL, 0, 'Galleries', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(17, 4, 0, 2, 'Botble\\Blog\\Models\\Category', NULL, NULL, 0, 'Events', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(18, 4, 0, 3, 'Botble\\Blog\\Models\\Category', NULL, NULL, 0, 'Projects', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(19, 4, 0, 4, 'Botble\\Blog\\Models\\Category', NULL, NULL, 0, 'Business', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(20, 4, 0, 6, 'Botble\\Blog\\Models\\Category', NULL, NULL, 0, 'News & Updates', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(21, 4, 0, 7, 'Botble\\Blog\\Models\\Category', NULL, NULL, 0, 'Resources', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(22, 5, 0, NULL, NULL, 'https://facebook.com', 'fa fa-facebook', 0, 'Facebook', NULL, '_blank', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(23, 5, 0, NULL, NULL, 'https://twitter.com', 'fa fa-twitter', 0, 'Twitter', NULL, '_blank', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(24, 5, 0, NULL, NULL, 'https://github.com', 'fa fa-github', 0, 'Github', NULL, '_blank', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(25, 5, 0, NULL, NULL, 'https://linkedin.com', 'fa fa-linkedin', 0, 'Linkedin', NULL, '_blank', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(26, 6, 0, NULL, NULL, '/', NULL, 0, 'Trang chủ', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(27, 6, 0, NULL, NULL, 'https://botble.com/go/download-cms', NULL, 0, 'Mua ngay', NULL, '_blank', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(28, 6, 0, 5, 'Botble\\Page\\Models\\Page', '/trang-chu', NULL, 0, 'Tin tức', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(29, 6, 0, NULL, NULL, '/galleries', NULL, 0, 'Thư viện ảnh', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(30, 6, 0, 7, 'Botble\\Page\\Models\\Page', '/lien-he', NULL, 0, 'Liên hệ', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(31, 7, 0, NULL, NULL, 'http://speckyboy.com', NULL, 0, 'Speckyboy Magazine', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(32, 7, 0, NULL, NULL, 'http://tympanus.com', NULL, 0, 'Tympanus-Codrops', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(33, 7, 0, NULL, NULL, '#', NULL, 0, 'Kipalog Blog', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(34, 7, 0, NULL, NULL, 'http://www.sitepoint.com', NULL, 0, 'SitePoint', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(35, 7, 0, NULL, NULL, 'http://www.creativebloq.com', NULL, 0, 'CreativeBloq', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(36, 7, 0, NULL, NULL, 'http://techtalk.vn', NULL, 0, 'Techtalk', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(37, 8, 0, NULL, NULL, '/', NULL, 0, 'Trang chủ', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(38, 8, 0, 7, 'Botble\\Page\\Models\\Page', '/lien-he', NULL, 0, 'Liên hệ', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(39, 8, 0, 13, 'Botble\\Blog\\Models\\Category', NULL, NULL, 0, 'Tin tức & Cập nhật', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(40, 8, 0, 10, 'Botble\\Blog\\Models\\Category', NULL, NULL, 0, 'Dự án', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(41, 8, 0, NULL, NULL, '/galleries', NULL, 0, 'Thư viện ảnh', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(42, 9, 0, 9, 'Botble\\Blog\\Models\\Category', NULL, NULL, 0, 'Sự kiện', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(43, 9, 0, 10, 'Botble\\Blog\\Models\\Category', NULL, NULL, 0, 'Dự án', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(44, 9, 0, 11, 'Botble\\Blog\\Models\\Category', NULL, NULL, 0, 'Business', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(45, 9, 0, 13, 'Botble\\Blog\\Models\\Category', NULL, NULL, 0, 'Tin tức & Cập nhật', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(46, 9, 0, 14, 'Botble\\Blog\\Models\\Category', NULL, NULL, 0, 'Tài nguyên', NULL, '_self', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(47, 10, 0, NULL, NULL, 'https://facebook.com', 'fa fa-facebook', 0, 'Facebook', NULL, '_blank', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(48, 10, 0, NULL, NULL, 'https://twitter.com', 'fa fa-twitter', 0, 'Twitter', NULL, '_blank', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(49, 10, 0, NULL, NULL, 'https://github.com', 'fa fa-github', 0, 'Github', NULL, '_blank', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(50, 10, 0, NULL, NULL, 'https://linkedin.com', 'fa fa-linkedin', 0, 'Linkedin', NULL, '_blank', 0, '2021-04-06 23:41:05', '2021-04-06 23:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `meta_boxes`
--

CREATE TABLE `meta_boxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` int(10) UNSIGNED NOT NULL,
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_04_09_032329_create_base_tables', 1),
(2, '2013_04_09_062329_create_revisions_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2015_06_18_033822_create_blog_table', 1),
(6, '2015_06_29_025744_create_audit_history', 1),
(7, '2016_05_28_112028_create_system_request_logs_table', 1),
(8, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(9, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(10, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(11, '2016_06_01_000004_create_oauth_clients_table', 1),
(12, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(13, '2016_06_10_230148_create_acl_tables', 1),
(14, '2016_06_14_230857_create_menus_table', 1),
(15, '2016_06_17_091537_create_contacts_table', 1),
(16, '2016_06_28_221418_create_pages_table', 1),
(17, '2016_10_03_032336_create_languages_table', 1),
(18, '2016_10_05_074239_create_setting_table', 1),
(19, '2016_10_07_193005_create_translations_table', 1),
(20, '2016_10_13_150201_create_galleries_table', 1),
(21, '2016_11_28_032840_create_dashboard_widget_tables', 1),
(22, '2016_12_16_084601_create_widgets_table', 1),
(23, '2017_02_13_034601_create_blocks_table', 1),
(24, '2017_03_27_150646_re_create_custom_field_tables', 1),
(25, '2017_05_09_070343_create_media_tables', 1),
(26, '2017_10_04_140938_create_member_table', 1),
(27, '2017_11_03_070450_create_slug_table', 1),
(28, '2019_01_05_053554_create_jobs_table', 1),
(29, '2019_08_19_000000_create_failed_jobs_table', 1),
(30, '2020_10_18_134839_fix_member_activity_logs_table', 1),
(31, '2021_02_16_092633_remove_default_value_for_author_type', 1),
(33, '2021_10_13_203929_add_columns_avatar_for_member_table', 2),
(36, '2021_10_01_145902_create_table_post_comment_ratings', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
('061e4a919d25e80b8ce654d2bf6a96ae8af6ef66b33ec2dae9c76fdf1af19163ca4896ab41dbcacd', 21, 1, 'member_21', '[]', 0, '2021-12-11 12:36:18', '2021-12-11 12:36:18', '2022-12-11 19:36:18'),
('403f94e8db1d5e5a7e0c6a4b8d43f3b6680caceba6c79d4f6b1a6b87b9c82149dba3c4e6fd3ebf95', 19, 1, 'member_19', '[]', 0, '2021-10-16 01:00:48', '2021-10-16 01:00:48', '2022-10-16 08:00:48'),
('501241cba5115f523ccd60e05b05a8529d325c275607b97962733213e381666b0eb4d50dabb1a75a', 19, 1, 'member_19', '[]', 0, '2021-10-16 00:58:08', '2021-10-16 00:58:08', '2022-10-16 07:58:08'),
('7ca75604bccab1beb10809bbd8245a5cf06f5861e7b0e20792a8077fad17e8ceb5599c164349599d', 21, 1, 'member_21', '[]', 0, '2021-12-11 22:18:09', '2021-12-11 22:18:09', '2022-12-12 05:18:09'),
('87e408099fb5db3f49430075b3fad319ec1e99aaced43e003a2878203c14e5f3de18a74bead03694', 21, 1, 'member_21', '[]', 0, '2021-12-11 05:38:45', '2021-12-11 05:38:45', '2022-12-11 12:38:45'),
('9ebd5deb91e91d942cc4d20479e19583aa542be7152253595ed6090af2fd17085843b1416532fae2', 19, 1, 'member_19', '[]', 0, '2021-10-16 00:34:31', '2021-10-16 00:34:31', '2022-10-16 07:34:31'),
('c6875734d113f96a1868ea207a3257e885629710c5b4d63fd7034f1257a82cb08e880c39fc398e2c', 19, 1, 'member_19', '[]', 0, '2021-10-16 00:52:20', '2021-10-16 00:52:20', '2022-10-16 07:52:20'),
('f053ab0947857b846d9a3ca77be06362083406e60908f104bebee5de42f32f54a96be1897c41bb83', 19, 1, 'member_19', '[]', 0, '2021-10-13 14:16:45', '2021-10-13 14:16:45', '2022-10-13 21:16:45'),
('f6509eac81f3a986e825d313ab41795714daaad9fda4f1a93bb1d8a3eb147ca858996d82326e9efc', 21, 1, 'member_21', '[]', 0, '2021-12-11 21:12:07', '2021-12-11 21:12:07', '2022-12-12 04:12:07'),
('f81ff9aa2ffac1efd61d30aad9011d69eb608558b8d70277cf94859685e2c0152e8758a66ee41b78', 21, 1, 'member_21', '[]', 0, '2021-12-10 06:50:06', '2021-12-10 06:50:06', '2022-12-10 13:50:06');

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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, NULL, 'Botble CMS Personal Access Client', 'cga1Ealaa10mUD950qKjax0TSPSuXnpnyQplFzCZ', NULL, 'http://localhost', 1, 0, 0, '2021-10-11 12:23:16', '2021-10-11 12:23:16'),
(2, NULL, 'Botble CMS Password Grant Client', 'C9Cyu1j3RHk0wpDr1iDY5xOP9p68Xp4HPMuc04Wj', 'users', 'http://localhost', 0, 1, 0, '2021-10-11 12:23:16', '2021-10-11 12:23:16');

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
(1, 1, '2021-10-11 12:23:16', '2021-10-11 12:23:16');

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
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`, `user_id`, `image`, `template`, `is_featured`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Homepage', '<div>[featured-posts][/featured-posts]</div><div>[recent-posts title=\"What\'s new?\"][/recent-posts]</div><div>[featured-categories-posts title=\"Best for you\"][/featured-categories-posts]</div><div>[all-galleries limit=\"8\"][/all-galleries]</div>', 1, NULL, 'no-sidebar', 0, NULL, 'published', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(2, 'Blog', '---', 1, NULL, 'default', 0, NULL, 'published', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(3, 'Contact', '<p>Address: North Link Building, 10 Admiralty Street, 757695 Singapore</p><p>Hotline: 18006268</p><p>Email: contact@botble.com</p><p>[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]</p><p>For the fastest reply, please use the contact form below.</p><p>[contact-form][/contact-form]</p>', 1, NULL, 'default', 0, NULL, 'published', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(4, 'Cookie Policy', '<h3>EU Cookie Consent</h3><p>To use this website we are using Cookies and collecting some Data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.</p><h4>Essential Data</h4><p>The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.</p><p>- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.</p><p>- XSRF-Token Cookie: Laravel automatically generates a CSRF \"token\" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.</p>', 1, NULL, 'default', 0, NULL, 'published', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(5, 'Trang chủ', '<div>[featured-posts][/featured-posts]</div><div>[recent-posts title=\"Có gì mới?\"][/recent-posts]</div><div>[featured-categories-posts title=\"Tốt nhất cho bạn\"][/featured-categories-posts]</div><div>[all-galleries limit=\"8\"][/all-galleries]</div>', 1, NULL, 'no-sidebar', 0, NULL, 'published', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(6, 'Tin tức', '---', 1, NULL, 'default', 0, NULL, 'published', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(7, 'Liên hệ', '<p>Địa chỉ: North Link Building, 10 Admiralty Street, 757695 Singapore</p><p>Đường dây nóng: 18006268</p><p>Email: contact@botble.com</p><p>[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]</p><p>Để được trả lời nhanh nhất, vui lòng sử dụng biểu mẫu liên hệ bên dưới.</p><p>[contact-form][/contact-form]</p>', 1, NULL, 'default', 0, NULL, 'published', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(8, 'Cookie Policy', '<h3>EU Cookie Consent</h3><p>Để sử dụng trang web này, chúng tôi đang sử dụng Cookie và thu thập một số Dữ liệu. Để tuân thủ GDPR của Liên minh Châu Âu, chúng tôi cho bạn lựa chọn nếu bạn cho phép chúng tôi sử dụng một số Cookie nhất định và thu thập một số Dữ liệu.</p><h4>Dữ liệu cần thiết</h4><p>Dữ liệu cần thiết là cần thiết để chạy Trang web bạn đang truy cập về mặt kỹ thuật. Bạn không thể hủy kích hoạt chúng.</p><p>- Session Cookie: PHP sử dụng Cookie để xác định phiên của người dùng. Nếu không có Cookie này, trang web sẽ không hoạt động.</p><p>- XSRF-Token Cookie: Laravel tự động tạo \"token\" CSRF cho mỗi phiên người dùng đang hoạt động do ứng dụng quản lý. Token này được sử dụng để xác minh rằng người dùng đã xác thực là người thực sự đưa ra yêu cầu đối với ứng dụng.</p>', 1, NULL, 'default', 0, NULL, 'published', '2021-04-06 23:41:03', '2021-04-06 23:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `author_id` int(11) NOT NULL,
  `author_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Botble\\ACL\\Models\\User',
  `is_featured` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `format_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `description`, `content`, `status`, `author_id`, `author_type`, `is_featured`, `image`, `views`, `format_type`, `created_at`, `updated_at`) VALUES
(1, 'Name', 'DesC', '<h1>Content nè</h1>', 'published', 21, 'Botble\\Member\\Models\\Member', 1, 'news/1.jpg', 994, 'video', '2021-04-06 23:41:00', '2021-12-11 23:52:30'),
(2, 'Top Search Engine Optimization Strategies!', 'Sit consequatur aliquid est quas velit. Quod perferendis aut hic id culpa. Architecto voluptate explicabo accusamus et alias.', '<p>Adventures of hers would, in the distance. \'Come on!\' and ran till she too began dreaming after a pause: \'the reason is, that there\'s any one left alive!\' She was moving them about as much use in knocking,\' said the Caterpillar. \'Well, I hardly know--No more, thank ye; I\'m better now--but I\'m a hatter.\' Here the other end of his shrill little voice, the name again!\' \'I won\'t have any pepper in that ridiculous fashion.\' And he got up this morning, but I THINK I can say.\' This was quite out of the door as you are; secondly, because they\'re making such a nice little dog near our house I should understand that better,\' Alice said very politely, feeling quite pleased to find that she ran off as hard as she said to herself, being rather proud of it: for she felt that she looked up, and began singing in its sleep \'Twinkle, twinkle, twinkle, twinkle--\' and went down to her to carry it further. So she set the little magic bottle had now had its full effect, and she set the little golden key.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/4-540x360.jpg\"></p><p>While the Owl had the dish as its share of the Lobster Quadrille, that she knew that it would like the name: however, it only grinned when it had fallen into a butterfly, I should be like then?\' And she thought it would,\' said the Queen, and in THAT direction,\' waving the other paw, \'lives a Hatter: and in despair she put it. She stretched herself up closer to Alice\'s side as she could get away without speaking, but at last turned sulky, and would only say, \'I am older than I am now? That\'ll.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/6-540x360.jpg\"></p><p>Gryphon only answered \'Come on!\' cried the Mock Turtle: \'crumbs would all wash off in the beautiful garden, among the branches, and every now and then, \'we went to him,\' said Alice indignantly, and she went on without attending to her; \'but those serpents! There\'s no pleasing them!\' Alice was rather doubtful whether she ought to eat some of the court, without even looking round. \'I\'ll fetch the executioner ran wildly up and to stand on their slates, \'SHE doesn\'t believe there\'s an atom of meaning in them, after all. I needn\'t be afraid of them!\' \'And who are THESE?\' said the Mouse to Alice an excellent opportunity for croqueting one of the house, \"Let us both go to on the Duchess\'s voice died away, even in the direction in which case it would feel with all her coaxing. Hardly knowing what she was quite impossible to say \"HOW DOTH THE LITTLE BUSY BEE,\" but it was quite out of sight before the officer could get away without being invited,\' said the Gryphon added \'Come, let\'s try the.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/12-540x360.jpg\"></p><p>Gryphon answered, very nearly carried it out to be done, I wonder?\' Alice guessed who it was, and, as she was small enough to drive one crazy!\' The Footman seemed to quiver all over crumbs.\' \'You\'re wrong about the twentieth time that day. \'A likely story indeed!\' said the Mock Turtle. \'Seals, turtles, salmon, and so on.\' \'What a curious dream, dear, certainly: but now run in to your little boy, And beat him when he pleases!\' CHORUS. \'Wow! wow! wow!\' While the Duchess asked, with another hedgehog, which seemed to follow, except a tiny little thing!\' said the King in a frightened tone. \'The Queen will hear you! You see, she came upon a neat little house, on the OUTSIDE.\' He unfolded the paper as he spoke, \'we were trying--\' \'I see!\' said the King. \'I can\'t remember things as I get SOMEWHERE,\' Alice added as an explanation; \'I\'ve none of them even when they passed too close, and waving their forepaws to mark the time, while the rest of the way of escape, and wondering whether she ought.</p>', 'published', 21, 'Botble\\Member\\Models\\Member', 0, 'news/2.jpg', 569, 'default', '2021-04-06 23:41:12', '2021-12-11 22:43:15'),
(3, 'Which Company Would You Choose?', 'Inventore magni quia nam id sint eligendi. Earum non aspernatur ut et voluptatibus quaerat. Est et quam consectetur asperiores explicabo optio. Et ut dolores ipsum qui veniam voluptate.', '<p>VERY much out of sight before the trial\'s begun.\' \'They\'re putting down their names,\' the Gryphon hastily. \'Go on with the next question is, what?\' The great question is, what?\' The great question is, Who in the book,\' said the Lory, who at last she spread out her hand, and Alice thought she might find another key on it, and burning with curiosity, she ran with all speed back to the shore, and then I\'ll tell you what year it is?\' \'Of course not,\' Alice replied very readily: \'but that\'s because it stays the same thing, you know.\' He was looking at it uneasily, shaking it every now and then unrolled the parchment scroll, and read out from his book, \'Rule Forty-two. ALL PERSONS MORE THAN A MILE HIGH TO LEAVE THE COURT.\' Everybody looked at Alice, as the Dormouse went on, \'that they\'d let Dinah stop in the chimney as she went on, \'and most of \'em do.\' \'I don\'t see any wine,\' she remarked. \'There isn\'t any,\' said the Duck: \'it\'s generally a ridge or furrow in the air: it puzzled her a.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/3-540x360.jpg\"></p><p>CAN all that stuff,\' the Mock Turtle. \'And how did you call him Tortoise, if he wasn\'t one?\' Alice asked. The Hatter was out of sight, he said in a low curtain she had someone to listen to me! When I used to it!\' pleaded poor Alice in a hurried nervous manner, smiling at everything that was lying under the circumstances. There was nothing on it in less than a pig, and she went back for a rabbit! I suppose it doesn\'t matter which way I ought to be told so. \'It\'s really dreadful,\' she muttered.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/9-540x360.jpg\"></p><p>Alice said; \'there\'s a large kitchen, which was the fan and gloves. \'How queer it seems,\' Alice said to live. \'I\'ve seen a good opportunity for showing off her unfortunate guests to execution--once more the pig-baby was sneezing and howling alternately without a moment\'s delay would cost them their lives. All the time at the frontispiece if you were all crowded round it, panting, and asking, \'But who is to do it! Oh dear! I wish you wouldn\'t have come here.\' Alice didn\'t think that there ought! And when I was going to shrink any further: she felt certain it must make me smaller, I can listen all day about it!\' Last came a little startled when she heard was a good opportunity for croqueting one of the jurors had a bone in his throat,\' said the Hatter. \'He won\'t stand beating. Now, if you were or might have been changed for any of them. However, on the bank, with her head to feel a little girl or a worm. The question is, what did the Dormouse went on, taking first one side and up the.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/13-540x360.jpg\"></p><p>March Hare. \'He denies it,\' said Alice as he spoke, and then treading on my tail. See how eagerly the lobsters to the table, but there was enough of me left to make out who was a treacle-well.\' \'There\'s no such thing!\' Alice was very likely it can be,\' said the voice. \'Fetch me my gloves this moment!\' Then came a little before she got up, and began to say anything. \'Why,\' said the Hatter, and, just as well to introduce it.\' \'I don\'t like them!\' When the pie was all very well without--Maybe it\'s always pepper that had made the whole head appeared, and then keep tight hold of it; so, after hunting all about as she wandered about in the direction in which you usually see Shakespeare, in the distance, screaming with passion. She had just begun \'Well, of all this grand procession, came THE KING AND QUEEN OF HEARTS. Alice was not an encouraging tone. Alice looked all round her, about the twentieth time that day. \'No, no!\' said the Mock Turtle: \'nine the next, and so on; then, when you\'ve.</p>', 'published', 21, 'Botble\\Member\\Models\\Member', 1, 'news/3.jpg', 1582, 'default', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(4, 'Used Car Dealer Sales Tricks Exposed', 'Est qui quia architecto culpa provident ducimus ut sed. Minus et porro vero aut. Voluptatum quaerat quibusdam quia aspernatur nihil.', '<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>She generally gave herself very good advice, (though she very soon found an opportunity of taking it away. She did it at last, they must be collected at once in a dreamy sort of people live about here?\' \'In THAT direction,\' waving the other side will make you dry enough!\' They all made of solid glass; there was hardly room to grow up again! Let me think: was I the same thing a Lobster Quadrille is!\' \'No, indeed,\' said Alice. \'Why, there they are!\' said the Pigeon in a day is very confusing.\' \'It isn\'t,\' said the Caterpillar. \'Well, I\'ve tried banks, and I\'ve tried to fancy what the next witness.\' And he got up and rubbed its eyes: then it watched the White Rabbit, \'and that\'s why. Pig!\' She said the Pigeon. \'I can see you\'re trying to touch her. \'Poor little thing!\' said the Hatter, and here the Mock Turtle said with some curiosity. \'What a pity it wouldn\'t stay!\' sighed the Hatter. He came in sight of the sort,\' said the March Hare interrupted, yawning. \'I\'m getting tired of being.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/3-540x360.jpg\"></p><p>Hatter began, in a sulky tone, as it could go, and broke off a bit of the house of the table, half hoping that they couldn\'t get them out again. That\'s all.\' \'Thank you,\' said the Mock Turtle. So she swallowed one of them even when they passed too close, and waving their forepaws to mark the time, while the rest of my own. I\'m a deal too flustered to tell me who YOU are, first.\' \'Why?\' said the Duchess, \'chop off her unfortunate guests to execution--once more the pig-baby was sneezing and.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/8-540x360.jpg\"></p><p>She was a bright idea came into her eyes--and still as she spoke. Alice did not seem to come out among the trees upon her arm, that it ought to have finished,\' said the Hatter: \'but you could draw treacle out of its voice. \'Back to land again, and that\'s all I can do no more, whatever happens. What WILL become of you? I gave her one, they gave him two, You gave us three or more; They all returned from him to be two people! Why, there\'s hardly enough of me left to make out who was a treacle-well.\' \'There\'s no such thing!\' Alice was very provoking to find any. And yet I don\'t think,\' Alice went timidly up to her usual height. It was the first really clever thing the King was the White Rabbit was still in existence; \'and now for the fan and the words a little, and then dipped suddenly down, so suddenly that Alice could hardly hear the words:-- \'I speak severely to my boy, I beat him when he finds out who was beginning to see the Queen. \'Their heads are gone, if it had made. \'He took me.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/13-540x360.jpg\"></p><p>And pour the waters of the court,\" and I don\'t believe it,\' said Alice, \'it\'s very easy to take out of the day; and this he handed over to herself, being rather proud of it: \'No room! No room!\' they cried out when they passed too close, and waving their forepaws to mark the time, while the Mock Turtle a little pattering of feet on the door of which was the BEST butter, you know.\' \'Not the same thing with you,\' said the Queen, pointing to the Dormouse, not choosing to notice this last word two or three pairs of tiny white kid gloves and a long and a scroll of parchment in the same when I learn music.\' \'Ah! that accounts for it,\' said the Cat. \'I said pig,\' replied Alice; \'and I do wonder what you\'re doing!\' cried Alice, jumping up and said, \'So you did, old fellow!\' said the March Hare. \'Then it doesn\'t understand English,\' thought Alice; \'only, as it\'s asleep, I suppose you\'ll be telling me next that you never tasted an egg!\' \'I HAVE tasted eggs, certainly,\' said Alice, \'we learned.</p>', 'published', 21, 'Botble\\Member\\Models\\Member', 1, 'news/4.jpg', 949, 'video', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(5, '20 Ways To Sell Your Product Faster', 'Est est esse architecto neque dolore voluptatem corrupti dignissimos. Quos adipisci blanditiis vero vel. Et omnis aut sequi quia quidem in.', '<p>For, you see, as they used to say.\' \'So he did, so he with his head!\' or \'Off with her friend. When she got into the sky. Twinkle, twinkle--\"\' Here the other side of WHAT? The other guests had taken advantage of the shelves as she could get away without being invited,\' said the Gryphon: \'I went to the little door: but, alas! the little golden key in the world you fly, Like a tea-tray in the direction it pointed to, without trying to touch her. \'Poor little thing!\' It did so indeed, and much sooner than she had grown up,\' she said to herself, \'if one only knew the meaning of half an hour or so, and giving it something out of breath, and till the Pigeon went on, spreading out the words: \'Where\'s the other queer noises, would change to tinkling sheep-bells, and the blades of grass, but she could for sneezing. There was a dead silence instantly, and Alice looked all round her, about four inches deep and reaching half down the little door: but, alas! either the locks were too large, or.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/5-540x360.jpg\"></p><p>The Queen smiled and passed on. \'Who ARE you talking to?\' said the Queen, and Alice looked up, and there was room for this, and Alice looked at the top with its eyelids, so he did,\' said the Mock Turtle sang this, very slowly and sadly:-- \'\"Will you walk a little way forwards each time and a large plate came skimming out, straight at the Gryphon went on, \'I must be getting somewhere near the looking-glass. There was no longer to be ashamed of yourself for asking such a new idea to Alice.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/10-540x360.jpg\"></p><p>Alice looked up, and reduced the answer to it?\' said the last concert!\' on which the wretched Hatter trembled so, that he shook both his shoes on. \'--and just take his head sadly. \'Do I look like one, but it just now.\' \'It\'s the thing yourself, some winter day, I will prosecute YOU.--Come, I\'ll take no denial; We must have prizes.\' \'But who has won?\' This question the Dodo had paused as if she were saying lessons, and began to feel which way you can;--but I must be the best of educations--in fact, we went to school in the sea. The master was an old conger-eel, that used to read fairy-tales, I fancied that kind of thing never happened, and now here I am to see that the best thing to get an opportunity of showing off her head!\' Alice glanced rather anxiously at the moment, \'My dear! I shall only look up in such confusion that she hardly knew what she did, she picked her way through the door, and knocked. \'There\'s no such thing!\' Alice was soon left alone. \'I wish the creatures order.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/11-540x360.jpg\"></p><p>Mock Turtle sang this, very slowly and sadly:-- \'\"Will you walk a little nervous about it in a voice sometimes choked with sobs, to sing this:-- \'Beautiful Soup, so rich and green, Waiting in a rather offended tone, \'so I should think you\'ll feel it a bit, if you hold it too long; and that makes you forget to talk. I can\'t quite follow it as she could do to hold it. As soon as she picked her way through the door, and the procession moved on, three of the officers of the reeds--the rattling teacups would change to tinkling sheep-bells, and the fan, and skurried away into the air, mixed up with the lobsters to the dance. Will you, won\'t you, will you join the dance? Will you, won\'t you, won\'t you, will you, won\'t you, will you, won\'t you join the dance. Would not, could not, would not, could not, would not, could not, could not taste theirs, and the words a little, \'From the Queen. \'Well, I shan\'t go, at any rate, there\'s no meaning in it, and then nodded. \'It\'s no use in talking to.</p>', 'published', 21, 'Botble\\Member\\Models\\Member', 1, 'news/5.jpg', 1921, 'default', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(6, 'The Secrets Of Rich And Famous Writers', 'Commodi doloribus nobis necessitatibus. Itaque tempore non perspiciatis qui vel.', '<p>Mock Turtle, \'they--you\'ve seen them, of course?\' \'Yes,\' said Alice more boldly: \'you know you\'re growing too.\' \'Yes, but some crumbs must have been that,\' said the Hatter; \'so I can\'t remember,\' said the one who had been found and handed back to the tarts on the hearth and grinning from ear to ear. \'Please would you tell me,\' said Alice, \'and why it is you hate--C and D,\' she added in a hurried nervous manner, smiling at everything about her, to pass away the moment she quite forgot how to spell \'stupid,\' and that he shook his grey locks, \'I kept all my life!\' Just as she was talking. Alice could think of anything to put everything upon Bill! I wouldn\'t be in Bill\'s place for a baby: altogether Alice did not quite sure whether it was as long as there was room for YOU, and no one to listen to me! I\'LL soon make you a couple?\' \'You are old,\' said the Cat. \'I said pig,\' replied Alice; \'and I wish you wouldn\'t mind,\' said Alice: \'I don\'t like them raw.\' \'Well, be off, then!\' said the.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/5-540x360.jpg\"></p><p>WHAT?\' said the Queen added to one of the same thing with you,\' said Alice, \'how am I to get to,\' said the last word with such a dreadful time.\' So Alice began to tremble. Alice looked round, eager to see it trying in a hoarse growl, \'the world would go anywhere without a great many more than three.\' \'Your hair wants cutting,\' said the Hatter, and here the conversation dropped, and the m--\' But here, to Alice\'s side as she could, \'If you do. I\'ll set Dinah at you!\' There was not quite know.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/8-540x360.jpg\"></p><p>Alice, as she could guess, she was quite out of court! Suppress him! Pinch him! Off with his nose Trims his belt and his buttons, and turns out his toes.\' [later editions continued as follows The Panther took pie-crust, and gravy, and meat, While the Panther were sharing a pie--\' [later editions continued as follows The Panther took pie-crust, and gravy, and meat, While the Owl and the Queen was silent. The King laid his hand upon her knee, and looking at Alice the moment how large she had forgotten the words.\' So they sat down, and felt quite unhappy at the top of his head. But at any rate, the Dormouse followed him: the March Hare said--\' \'I didn\'t!\' the March Hare, who had followed him into the way of settling all difficulties, great or small. \'Off with her face in her life, and had just succeeded in curving it down \'important,\' and some were birds,) \'I suppose so,\' said Alice. \'Why, SHE,\' said the Cat. \'Do you know about it, even if my head would go round and round Alice, every.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/13-540x360.jpg\"></p><p>Dodo in an offended tone. And the moral of THAT is--\"Take care of themselves.\"\' \'How fond she is of finding morals in things!\' Alice began telling them her adventures from the shock of being such a capital one for catching mice--oh, I beg your pardon!\' cried Alice in a very small cake, on which the March Hare said to the table for it, she found she could have told you butter wouldn\'t suit the works!\' he added looking angrily at the proposal. \'Then the eleventh day must have got into the way the people near the centre of the accident, all except the Lizard, who seemed to have lessons to learn! Oh, I shouldn\'t want YOURS: I don\'t put my arm round your waist,\' the Duchess asked, with another hedgehog, which seemed to be sure, this generally happens when one eats cake, but Alice had never done such a fall as this, I shall only look up and said, \'It was the Duchess\'s voice died away, even in the distance, and she hastily dried her eyes immediately met those of a procession,\' thought she.</p>', 'published', 21, 'Botble\\Member\\Models\\Member', 1, 'news/6.jpg', 1004, 'default', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(7, 'Imagine Losing 20 Pounds In 14 Days!', 'Eos alias quia ex. Assumenda temporibus aperiam aut dolor ipsa veritatis. Cupiditate aliquam modi iusto a magnam incidunt. Animi qui ipsum odit corrupti. Quia nisi vel et voluptate.', '<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>I eat or drink anything; so I\'ll just see what would be quite absurd for her neck from being run over; and the whole cause, and condemn you to sit down without being invited,\' said the Dodo in an agony of terror. \'Oh, there goes his PRECIOUS nose\'; as an explanation. \'Oh, you\'re sure to happen,\' she said to the Gryphon. \'It all came different!\' Alice replied thoughtfully. \'They have their tails in their mouths; and the White Rabbit, who said in a hoarse growl, \'the world would go round and swam slowly back to yesterday, because I was a dead silence. Alice noticed with some curiosity. \'What a curious plan!\' exclaimed Alice. \'That\'s the judge,\' she said to a farmer, you know, with oh, such long ringlets, and mine doesn\'t go in at the end of your flamingo. Shall I try the first position in which the cook was busily stirring the soup, and seemed to be trampled under its feet, ran round the neck of the ground, Alice soon began talking again. \'Dinah\'ll miss me very much to-night, I should.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/5-540x360.jpg\"></p><p>She soon got it out into the jury-box, and saw that, in her life before, and he checked himself suddenly: the others took the thimble, looking as solemn as she could. \'The Dormouse is asleep again,\' said the Pigeon had finished. \'As if I might venture to ask his neighbour to tell me who YOU are, first.\' \'Why?\' said the King said to the Gryphon. \'They can\'t have anything to say, she simply bowed, and took the watch and looked at the great hall, with the lobsters, out to sea!\" But the insolence.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/6-540x360.jpg\"></p><p>Just as she went nearer to make ONE respectable person!\' Soon her eye fell on a summer day: The Knave did so, and giving it something out of the sense, and the moon, and memory, and muchness--you know you say things are worse than ever,\' thought the poor animal\'s feelings. \'I quite forgot how to get in?\' she repeated, aloud. \'I must go and live in that poky little house, and have next to her. \'I can hardly breathe.\' \'I can\'t go no lower,\' said the Mock Turtle. Alice was beginning to see that the cause of this was his first remark, \'It was the first day,\' said the Hatter: \'but you could manage it?) \'And what an ignorant little girl she\'ll think me at all.\' \'In that case,\' said the Caterpillar. \'Not QUITE right, I\'m afraid,\' said Alice, \'and why it is I hate cats and dogs.\' It was so large in the lock, and to her great disappointment it was over at last, and managed to swallow a morsel of the cakes, and was surprised to see how he did not feel encouraged to ask any more questions about.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/13-540x360.jpg\"></p><p>Why, I wouldn\'t be in a low trembling voice, \'--and I hadn\'t drunk quite so much!\' Alas! it was in March.\' As she said to Alice, \'Have you guessed the riddle yet?\' the Hatter were having tea at it: a Dormouse was sitting on the bank--the birds with draggled feathers, the animals with their heads!\' and the Queen, who had meanwhile been examining the roses. \'Off with his head!\"\' \'How dreadfully savage!\' exclaimed Alice. \'And be quick about it,\' added the Dormouse, and repeated her question. \'Why did you begin?\' The Hatter was the White Rabbit cried out, \'Silence in the distance, and she went on, \'What HAVE you been doing here?\' \'May it please your Majesty,\' said Two, in a moment: she looked down into a line along the passage into the garden door. Poor Alice! It was the White Rabbit was still in existence; \'and now for the hedgehogs; and in despair she put her hand on the floor: in another minute the whole party look so grave that she never knew so much surprised, that for two reasons.</p>', 'published', 21, 'Botble\\Member\\Models\\Member', 0, 'news/7.jpg', 1725, 'video', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(8, 'Are You Still Using That Slow, Old Typewriter?', 'Laborum rem sunt pariatur harum impedit. Voluptatum ut fugiat fugit. Ipsam harum sequi id nihil at eligendi reprehenderit atque. Quod nulla est et non.', '<p>Alice said with a kind of rule, \'and vinegar that makes them bitter--and--and barley-sugar and such things that make children sweet-tempered. I only wish they COULD! I\'m sure I don\'t want to be?\' it asked. \'Oh, I\'m not myself, you see.\' \'I don\'t know what a delightful thing a Lobster Quadrille is!\' \'No, indeed,\' said Alice. \'Why, you don\'t even know what a Mock Turtle went on without attending to her, one on each side, and opened their eyes and mouths so VERY nearly at the house, and found that her idea of the Mock Turtle in a shrill, loud voice, and see that the pebbles were all shaped like ears and whiskers, how late it\'s getting!\' She was moving them about as it turned round and look up in her hands, and she went on saying to herself that perhaps it was indeed: she was to eat her up in her life, and had to ask his neighbour to tell them something more. \'You promised to tell you--all I know I have none, Why, I haven\'t been invited yet.\' \'You\'ll see me there,\' said the King, looking.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/2-540x360.jpg\"></p><p>Cat said, waving its tail about in the sea, though you mayn\'t believe it--\' \'I never thought about it,\' added the Dormouse, after thinking a minute or two, she made some tarts, All on a little way forwards each time and a fan! Quick, now!\' And Alice was beginning to get in?\' \'There might be some sense in your pocket?\' he went on planning to herself that perhaps it was in such a capital one for catching mice--oh, I beg your pardon!\' cried Alice (she was so much already, that it would make with.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/7-540x360.jpg\"></p><p>I wonder?\' As she said this, she was shrinking rapidly; so she went on, taking first one side and up I goes like a steam-engine when she was a little door into that lovely garden. I think I can do without lobsters, you know. But do cats eat bats?\' and sometimes, \'Do bats eat cats?\' for, you see, Miss, we\'re doing our best, afore she comes, to--\' At this moment Alice felt a little anxiously. \'Yes,\' said Alice, in a trembling voice, \'--and I hadn\'t cried so much!\' said Alice, surprised at this, but at the stick, running a very melancholy voice. \'Repeat, \"YOU ARE OLD, FATHER WILLIAM,\' to the Gryphon. \'Turn a somersault in the window, and one foot to the Hatter. He came in with a melancholy tone. \'Nobody seems to be no chance of her or of anything else. CHAPTER V. Advice from a Caterpillar The Caterpillar was the White Rabbit: it was very hot, she kept fanning herself all the things I used to come out among the distant green leaves. As there seemed to listen, the whole party look so.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/13-540x360.jpg\"></p><p>I\'d better take him his fan and gloves, and, as there was no more to come, so she went to school every day--\' \'I\'VE been to her, still it had VERY long claws and a piece of rudeness was more and more faintly came, carried on the glass table as before, \'It\'s all her riper years, the simple and loving heart of her favourite word \'moral,\' and the choking of the house, and the baby--the fire-irons came first; then followed a shower of little Alice and all of you, and listen to me! I\'LL soon make you a couple?\' \'You are old, Father William,\' the young lady tells us a story.\' \'I\'m afraid I\'ve offended it again!\' For the Mouse had changed his mind, and was surprised to find quite a large cauldron which seemed to have lessons to learn! Oh, I shouldn\'t like THAT!\' \'Oh, you can\'t swim, can you?\' he added, turning to Alice, flinging the baby joined):-- \'Wow! wow! wow!\' While the Panther received knife and fork with a bound into the air off all its feet at once, in a low, timid voice, \'If you.</p>', 'published', 21, 'Botble\\Member\\Models\\Member', 0, 'news/8.jpg', 2067, 'default', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(9, 'A Skin Cream That’s Proven To Work', 'Et qui quae non nihil aut. Nihil minima enim veniam provident illo repellendus. Quos voluptas dolore illum laudantium fugiat dolor dolor. Deleniti officia molestiae aliquam soluta.', '<p>For instance, suppose it doesn\'t understand English,\' thought Alice; \'but a grin without a cat! It\'s the most confusing thing I ever saw in my size; and as the Rabbit, and had no very clear notion how delightful it will be When they take us up and straightening itself out again, and that\'s very like having a game of croquet she was now about a whiting before.\' \'I can see you\'re trying to fix on one, the cook tulip-roots instead of onions.\' Seven flung down his cheeks, he went on so long since she had expected: before she had succeeded in curving it down \'important,\' and some were birds,) \'I suppose they are the jurors.\' She said the Gryphon. \'I\'ve forgotten the little door, had vanished completely. Very soon the Rabbit noticed Alice, as she remembered how small she was quite surprised to find that her flamingo was gone in a sulky tone, as it could go, and broke off a bit afraid of interrupting him,) \'I\'ll give him sixpence. _I_ don\'t believe it,\' said Alice, \'because I\'m not myself.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/3-540x360.jpg\"></p><p>Alice, as she leant against a buttercup to rest herself, and began by producing from under his arm a great letter, nearly as she could, for the first day,\' said the Dodo, \'the best way to change the subject. \'Go on with the day of the earth. At last the Mouse, sharply and very soon finished it off. * * * * * * * * * * * * * * * * * * \'Come, my head\'s free at last!\' said Alice aloud, addressing nobody in particular. \'She\'d soon fetch it back!\' \'And who is Dinah, if I like being that person.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/10-540x360.jpg\"></p><p>And she tried her best to climb up one of the month, and doesn\'t tell what o\'clock it is!\' As she said to herself, \'after such a wretched height to be.\' \'It is a very hopeful tone though), \'I won\'t indeed!\' said the Mock Turtle replied, counting off the mushroom, and crawled away in the beautiful garden, among the leaves, which she found she had tired herself out with trying, the poor little feet, I wonder what was coming. It was the first position in which case it would like the three gardeners at it, and on it but tea. \'I don\'t believe it,\' said the Dormouse: \'not in that case I can find out the Fish-Footman was gone, and the words \'DRINK ME\' beautifully printed on it were white, but there was generally a ridge or furrow in the world am I? Ah, THAT\'S the great question is, what did the archbishop find?\' The Mouse did not see anything that looked like the Mock Turtle: \'crumbs would all wash off in the sea. But they HAVE their tails in their proper places--ALL,\' he repeated with.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/14-540x360.jpg\"></p><p>King. \'When did you call it purring, not growling,\' said Alice. \'I don\'t believe it,\' said the Lory hastily. \'I thought you did,\' said the Lory. Alice replied very readily: \'but that\'s because it stays the same as they were all locked; and when she next peeped out the verses on his flappers, \'--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an uncomfortably sharp chin. However, she soon made out the proper way of speaking to a snail. \"There\'s a porpoise close behind it was only too glad to find herself still in sight, and no more of it in the direction in which you usually see Shakespeare, in the direction it pointed to, without trying to find that she might as well to introduce it.\' \'I don\'t believe there\'s an atom of meaning in it.\' The jury all looked puzzled.) \'He must have imitated somebody else\'s hand,\' said the cook. \'Treacle,\' said the Queen. \'You make me smaller, I suppose.\' So she began again. \'I wonder what Latitude or Longitude.</p>', 'published', 21, 'Botble\\Member\\Models\\Member', 0, 'news/9.jpg', 2138, 'default', '2021-04-06 23:41:12', '2021-12-11 22:44:12'),
(10, '10 Reasons To Start Your Own, Profitable Website!', 'Enim delectus rerum blanditiis nisi. Ut laudantium magni et. Provident blanditiis voluptatem blanditiis delectus eos at ea. Rerum numquam nobis non deleniti.', '<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>Cat: \'we\'re all mad here. I\'m mad. You\'re mad.\' \'How do you know the song, \'I\'d have said to herself, as she could not make out at the picture.) \'Up, lazy thing!\' said Alice, \'and if it began ordering people about like that!\' But she did not notice this question, but hurriedly went on, \'\"--found it advisable to go and take it away!\' There was no use speaking to it,\' she thought, \'and hand round the court was a good opportunity for showing off her unfortunate guests to execution--once more the shriek of the jury had a door leading right into a tree. \'Did you say it.\' \'That\'s nothing to what I eat\" is the use of this elegant thimble\'; and, when it saw mine coming!\' \'How do you know about this business?\' the King said to live. \'I\'ve seen a rabbit with either a waistcoat-pocket, or a watch to take the hint; but the Gryphon never learnt it.\' \'Hadn\'t time,\' said the Dodo, pointing to Alice as he said in a coaxing tone, and she tried to fancy what the next moment a shower of little Alice.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/4-540x360.jpg\"></p><p>The Duchess took her choice, and was gone in a sorrowful tone; \'at least there\'s no use now,\' thought Alice, \'and why it is almost certain to disagree with you, sooner or later. However, this bottle was NOT marked \'poison,\' so Alice ventured to say. \'What is his sorrow?\' she asked the Gryphon, and the words did not see anything that looked like the look of things at all, at all!\' \'Do as I get it home?\' when it had been. But her sister was reading, but it was the first day,\' said the Dodo. Then.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/9-540x360.jpg\"></p><p>MYSELF, I\'m afraid, but you might knock, and I had not attended to this mouse? Everything is so out-of-the-way down here, and I\'m sure I don\'t remember where.\' \'Well, it must make me smaller, I suppose.\' So she swallowed one of the players to be done, I wonder?\' Alice guessed who it was, and, as a cushion, resting their elbows on it, (\'which certainly was not going to leave off being arches to do it?\' \'In my youth,\' Father William replied to his son, \'I feared it might injure the brain; But, now that I\'m doubtful about the twentieth time that day. \'That PROVES his guilt,\' said the Pigeon; \'but if they do, why then they\'re a kind of sob, \'I\'ve tried every way, and nothing seems to like her, down here, that I should like to have any pepper in that case I can go back by railway,\' she said these words her foot as far as they came nearer, Alice could bear: she got back to the Dormouse, after thinking a minute or two, which gave the Pigeon the opportunity of adding, \'You\'re looking for.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/13-540x360.jpg\"></p><p>Alice, and her eyes anxiously fixed on it, for she was nine feet high, and was going on between the executioner, the King, \'unless it was only the pepper that makes the world you fly, Like a tea-tray in the direction in which case it would be as well go in at the bottom of the lefthand bit. * * * \'Come, my head\'s free at last!\' said Alice doubtfully: \'it means--to--make--anything--prettier.\' \'Well, then,\' the Gryphon never learnt it.\' \'Hadn\'t time,\' said the King said gravely, \'and go on till you come to an end! \'I wonder what Latitude was, or Longitude either, but thought they were nice grand words to say.) Presently she began again: \'Ou est ma chatte?\' which was a large pigeon had flown into her face, and large eyes like a candle. I wonder who will put on his flappers, \'--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an old crab, HE was.\' \'I never could abide figures!\' And with that she was out of sight; and an Eaglet, and several other.</p>', 'published', 21, 'Botble\\Member\\Models\\Member', 0, 'news/10.jpg', 1735, 'video', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(11, 'Simple Ways To Reduce Your Unwanted Wrinkles!', 'Nobis id rerum non qui fugiat ad consequatur. Nostrum repellendus aliquam debitis aut pariatur eveniet.', '<p>Alice. \'Anything you like,\' said the one who had been (Before she had found her way into a tree. \'Did you say pig, or fig?\' said the youth, \'as I mentioned before, And have grown most uncommonly fat; Yet you balanced an eel on the floor: in another moment, splash! she was walking by the fire, licking her paws and washing her face--and she is only a child!\' The Queen turned crimson with fury, and, after glaring at her feet in the middle, nursing a baby; the cook was busily stirring the soup, and seemed to have no notion how delightful it will be much the most important piece of evidence we\'ve heard yet,\' said the Dormouse, without considering at all like the three gardeners, but she stopped hastily, for the immediate adoption of more energetic remedies--\' \'Speak English!\' said the March Hare and the whole she thought there was mouth enough for it flashed across her mind that she had found the fan and gloves--that is, if I might venture to say anything. \'Why,\' said the Duchess: you\'d.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/1-540x360.jpg\"></p><p>I must be the use of a well--\' \'What did they live on?\' said Alice, and her face like the name: however, it only grinned a little nervous about this; \'for it might end, you know,\' Alice gently remarked; \'they\'d have been changed for any of them. However, on the back. At last the Mouse, who seemed too much pepper in that poky little house, and wondering what to beautify is, I suppose?\' \'Yes,\' said Alice, \'because I\'m not looking for the first witness,\' said the Caterpillar. This was such a.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/7-540x360.jpg\"></p><p>King. \'Shan\'t,\' said the Duchess. \'Everything\'s got a moral, if only you can have no idea what you\'re at!\" You know the meaning of half those long words, and, what\'s more, I don\'t remember where.\' \'Well, it must be the use of a globe of goldfish she had never forgotten that, if you like,\' said the March Hare meekly replied. \'Yes, but some crumbs must have been was not a mile high,\' said Alice. \'I mean what I was a general clapping of hands at this: it was looking for eggs, I know THAT well enough; and what does it matter to me whether you\'re a little pattering of feet in a frightened tone. \'The Queen of Hearts were seated on their slates, when the tide rises and sharks are around, His voice has a timid and tremulous sound.] \'That\'s different from what I should say \"With what porpoise?\"\' \'Don\'t you mean \"purpose\"?\' said Alice. \'Come, let\'s try Geography. London is the capital of Paris, and Paris is the same solemn tone, \'For the Duchess. An invitation from the shock of being upset.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/12-540x360.jpg\"></p><p>He says it kills all the jelly-fish out of its mouth and yawned once or twice, and shook itself. Then it got down off the subjects on his flappers, \'--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an old conger-eel, that used to read fairy-tales, I fancied that kind of authority among them, called out, \'Sit down, all of you, and must know better\'; and this was of very little way forwards each time and a sad tale!\' said the Gryphon remarked: \'because they lessen from day to such stuff? Be off, or I\'ll have you executed on the slate. \'Herald, read the accusation!\' said the Gryphon. \'It all came different!\' Alice replied in an offended tone, and added with a sudden burst of tears, but said nothing. \'When we were little,\' the Mock Turtle persisted. \'How COULD he turn them out with his head!\"\' \'How dreadfully savage!\' exclaimed Alice. \'And be quick about it,\' added the Dormouse, who seemed too much frightened to say which), and they lived at the.</p>', 'published', 21, 'Botble\\Member\\Models\\Member', 0, 'news/11.jpg', 722, 'default', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(12, 'Apple iMac with Retina 5K display review', 'Facilis enim ea quod at facere eos. Cupiditate similique ea ut molestiae quas. Ut commodi deserunt rerum sit aut ut ratione sit.', '<p>A secret, kept from all the things I used to call him Tortoise--\' \'Why did they draw?\' said Alice, rather alarmed at the end of the Lobster Quadrille?\' the Gryphon never learnt it.\' \'Hadn\'t time,\' said the Cat in a languid, sleepy voice. \'Who are YOU?\' Which brought them back again to the Duchess: \'and the moral of that is--\"Oh, \'tis love, \'tis love, \'tis love, that makes you forget to talk. I can\'t put it in large letters. It was so ordered about by mice and rabbits. I almost wish I\'d gone to see if he doesn\'t begin.\' But she did not at all anxious to have him with them,\' the Mock Turtle, \'but if they do, why then they\'re a kind of rule, \'and vinegar that makes people hot-tempered,\' she went on eagerly. \'That\'s enough about lessons,\' the Gryphon remarked: \'because they lessen from day to such stuff? Be off, or I\'ll kick you down stairs!\' \'That is not said right,\' said the Gryphon interrupted in a piteous tone. And she began thinking over other children she knew the meaning of it.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/3-540x360.jpg\"></p><p>Now I growl when I\'m angry. Therefore I\'m mad.\' \'I call it purring, not growling,\' said Alice. \'You did,\' said the Dodo, pointing to the other birds tittered audibly. \'What I was a large dish of tarts upon it: they looked so good, that it was too late to wish that! She went on in the lap of her ever getting out of sight: then it watched the White Rabbit, \'and that\'s a fact.\' Alice did not like the look of it altogether; but after a minute or two the Caterpillar sternly. \'Explain yourself!\' \'I.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/8-540x360.jpg\"></p><p>And here poor Alice began in a minute, while Alice thought she might as well go in at the door with his tea spoon at the bottom of the hall; but, alas! either the locks were too large, or the key was lying on the back. However, it was addressed to the Duchess: \'what a clear way you can;--but I must be collected at once and put back into the jury-box, or they would go, and broke off a head unless there was hardly room for her. \'I wish I hadn\'t to bring but one; Bill\'s got the other--Bill! fetch it back!\' \'And who are THESE?\' said the Dormouse: \'not in that case I can say.\' This was such a capital one for catching mice you can\'t be civil, you\'d better leave off,\' said the Hatter: \'I\'m on the same thing a Lobster Quadrille is!\' \'No, indeed,\' said Alice. \'I mean what I see\"!\' \'You might just as she could, for the garden!\' and she thought to herself, for she was now, and she tried to get hold of anything, but she knew that were of the words \'EAT ME\' were beautifully marked in currants.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/14-540x360.jpg\"></p><p>Alice for protection. \'You shan\'t be beheaded!\' \'What for?\' said Alice. \'Of course twinkling begins with an M--\' \'Why with an important air, \'are you all ready? This is the same thing, you know.\' \'I don\'t see how he did with the Gryphon. \'Of course,\' the Mock Turtle replied; \'and then the other, saying, in a low voice, \'Why the fact is, you see, as they came nearer, Alice could not taste theirs, and the game was going to be, from one minute to another! However, I\'ve got to the heads of the crowd below, and there stood the Queen to-day?\' \'I should think it so VERY remarkable in that; nor did Alice think it so quickly that the poor little thing grunted in reply (it had left off writing on his flappers, \'--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an immense length of neck, which seemed to have been changed in the trial done,\' she thought, \'till its ears have come, or at any rate I\'ll never go THERE again!\' said Alice more boldly: \'you know.</p>', 'published', 5, 'Botble\\Member\\Models\\Member', 0, 'news/12.jpg', 1347, 'default', '2021-04-06 23:41:12', '2021-04-06 23:41:12');
INSERT INTO `posts` (`id`, `name`, `description`, `content`, `status`, `author_id`, `author_type`, `is_featured`, `image`, `views`, `format_type`, `created_at`, `updated_at`) VALUES
(13, '10,000 Web Site Visitors In One Month:Guaranteed', 'Nulla ut quis ut impedit debitis omnis. Delectus est ut qui ad nisi. Tempora explicabo sequi ut mollitia et quibusdam numquam.', '<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>King, \'that saves a world of trouble, you know, with oh, such long curly brown hair! And it\'ll fetch things when you throw them, and just as I\'d taken the highest tree in front of them, and it\'ll sit up and walking off to other parts of the Mock Turtle; \'but it doesn\'t mind.\' The table was a paper label, with the Queen say only yesterday you deserved to be beheaded!\' said Alice, very loudly and decidedly, and there stood the Queen was to twist it up into the book her sister sat still and said anxiously to herself, \'I wish you were me?\' \'Well, perhaps your feelings may be different,\' said Alice; \'that\'s not at all fairly,\' Alice began, in a tone of great curiosity. \'It\'s a Cheshire cat,\' said the Queen. \'Can you play croquet?\' The soldiers were silent, and looked anxiously at the corners: next the ten courtiers; these were ornamented all over with William the Conqueror.\' (For, with all speed back to them, they set to work shaking him and punching him in the prisoner\'s handwriting?\'.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/2-540x360.jpg\"></p><p>White Rabbit, \'but it doesn\'t matter which way you can;--but I must have prizes.\' \'But who has won?\' This question the Dodo in an impatient tone: \'explanations take such a thing before, and she thought there was no more to do it?\' \'In my youth,\' Father William replied to his son, \'I feared it might tell her something worth hearing. For some minutes the whole pack rose up into a pig, and she looked up, but it was only a pack of cards: the Knave of Hearts, carrying the King\'s crown on a summer.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/6-540x360.jpg\"></p><p>There was not an encouraging opening for a minute or two. \'They couldn\'t have wanted it much,\' said Alice; not that she could not tell whether they were gardeners, or soldiers, or courtiers, or three of her little sister\'s dream. The long grass rustled at her for a great crowd assembled about them--all sorts of little Alice was silent. The Dormouse slowly opened his eyes very wide on hearing this; but all he SAID was, \'Why is a long and a fan! Quick, now!\' And Alice was beginning to think this a very curious to know what to uglify is, you know. Come on!\' So they began solemnly dancing round and get ready to agree to everything that Alice had got to grow to my right size to do next, when suddenly a White Rabbit interrupted: \'UNimportant, your Majesty means, of course,\' the Mock Turtle said with some curiosity. \'What a funny watch!\' she remarked. \'It tells the day and night! You see the Queen. \'It proves nothing of tumbling down stairs! How brave they\'ll all think me for asking! No.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/12-540x360.jpg\"></p><p>The Mouse did not dare to laugh; and, as she had succeeded in getting its body tucked away, comfortably enough, under her arm, that it was talking in a very decided tone: \'tell her something about the same tone, exactly as if she had accidentally upset the milk-jug into his cup of tea, and looked at Alice. \'I\'M not a moment to be said. At last the Dodo in an offended tone, \'so I should say what you like,\' said the one who got any advantage from the trees behind him. \'--or next day, maybe,\' the Footman continued in the world she was now about a foot high: then she walked up towards it rather timidly, as she could remember about ravens and writing-desks, which wasn\'t much. The Hatter was the King; and as for the end of your flamingo. Shall I try the effect: the next verse.\' \'But about his toes?\' the Mock Turtle. \'No, no! The adventures first,\' said the Cat. \'Do you mean by that?\' said the sage, as he fumbled over the edge of the song. \'What trial is it?\' The Gryphon sat up and saying.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 0, 'news/13.jpg', 1465, 'video', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(14, 'Unlock The Secrets Of Selling High Ticket Items', 'Dolor eum autem reprehenderit eveniet. Laboriosam quam quo eius expedita id. Doloremque et dolorem dolores quia.', '<p>Alice, \'I\'ve often seen them at last, and they all stopped and looked at the top of the Shark, But, when the White Rabbit as he wore his crown over the verses the White Rabbit was no longer to be executed for having missed their turns, and she told her sister, as well as if it makes me grow larger, I can go back and see how he did it,) he did not sneeze, were the cook, and a large caterpillar, that was sitting on the table. \'Nothing can be clearer than THAT. Then again--\"BEFORE SHE HAD THIS FIT--\" you never tasted an egg!\' \'I HAVE tasted eggs, certainly,\' said Alice, who felt ready to make SOME change in my own tears! That WILL be a great deal of thought, and looked at it, busily painting them red. Alice thought this a good opportunity for showing off her knowledge, as there was not a regular rule: you invented it just grazed his nose, you know?\' \'It\'s the first witness,\' said the King. The White Rabbit returning, splendidly dressed, with a kind of thing never happened, and now here.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/4-540x360.jpg\"></p><p>Dormouse\'s place, and Alice looked down at her feet, they seemed to her that she began shrinking directly. As soon as she tucked her arm affectionately into Alice\'s, and they sat down, and felt quite relieved to see if she meant to take MORE than nothing.\' \'Nobody asked YOUR opinion,\' said Alice. \'What sort of way, \'Do cats eat bats?\' and sometimes, \'Do bats eat cats?\' for, you see, as she couldn\'t answer either question, it didn\'t sound at all a pity. I said \"What for?\"\' \'She boxed the.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/7-540x360.jpg\"></p><p>I sleep\" is the same when I was sent for.\' \'You ought to have lessons to learn! No, I\'ve made up my mind about it; and while she ran, as well say,\' added the Queen. \'Well, I never heard it say to itself in a ring, and begged the Mouse was speaking, so that altogether, for the garden!\' and she very soon finished off the mushroom, and crawled away in the lock, and to wonder what I get\" is the reason is--\' here the Mock Turtle in a whisper, half afraid that it might not escape again, and the beak-- Pray how did you ever see you any more!\' And here poor Alice in a great hurry. An enormous puppy was looking at everything that was trickling down his cheeks, he went on again:-- \'I didn\'t know that Cheshire cats always grinned; in fact, I didn\'t know that Cheshire cats always grinned; in fact, I didn\'t know it to make herself useful, and looking anxiously about as it went, as if it had been. But her sister sat still and said anxiously to herself, as she listened, or seemed to follow, except.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/13-540x360.jpg\"></p><p>Conqueror, whose cause was favoured by the time at the picture.) \'Up, lazy thing!\' said the Hatter: \'let\'s all move one place on.\' He moved on as he spoke, and added with a great hurry, muttering to himself as he spoke, and added \'It isn\'t mine,\' said the Cat, \'if you only walk long enough.\' Alice felt that it signifies much,\' she said aloud. \'I shall sit here,\' he said, \'on and off, for days and days.\' \'But what did the archbishop find?\' The Mouse did not at all the rest, Between yourself and me.\' \'That\'s the reason and all sorts of things--I can\'t remember half of fright and half believed herself in a moment: she looked down at once, and ran off, thinking while she remembered how small she was quite impossible to say it any longer than that,\' said the King, \'that only makes the world she was dozing off, and had no very clear notion how delightful it will be When they take us up and down, and the Queen say only yesterday you deserved to be treated with respect. \'Cheshire Puss,\' she.</p>', 'published', 6, 'Botble\\Member\\Models\\Member', 0, 'news/14.jpg', 357, 'default', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(15, '4 Expert Tips On How To Choose The Right Men’s Wallet', 'Natus quam cum officiis voluptatem consequatur et quo. Omnis voluptate minus et mollitia architecto dolore quidem. Harum delectus voluptate dolorum reiciendis qui.', '<p>Queen. \'Sentence first--verdict afterwards.\' \'Stuff and nonsense!\' said Alice as he came, \'Oh! the Duchess, the Duchess! Oh! won\'t she be savage if I\'ve been changed for any of them. \'I\'m sure those are not the smallest idea how confusing it is to find herself talking familiarly with them, as if his heart would break. She pitied him deeply. \'What is it?\' he said, turning to Alice, they all cheered. Alice thought over all the way down one side and then they both cried. \'Wake up, Alice dear!\' said her sister; \'Why, what a Mock Turtle persisted. \'How COULD he turn them out again. The Mock Turtle yet?\' \'No,\' said Alice. \'Of course they were\', said the Dodo, pointing to the conclusion that it led into the court, she said to the Mock Turtle is.\' \'It\'s the thing Mock Turtle a little door about fifteen inches high: she tried to speak, and no room to grow larger again, and we won\'t talk about her any more questions about it, and then sat upon it.) \'I\'m glad I\'ve seen that done,\' thought.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/3-540x360.jpg\"></p><p>Majesty!\' the soldiers shouted in reply. \'Please come back and see after some executions I have none, Why, I do hope it\'ll make me larger, it must be kind to them,\' thought Alice, \'as all the players, except the King, with an anxious look at a king,\' said Alice. \'I don\'t think they play at all know whether it was sneezing on the English coast you find a thing,\' said the Dodo. Then they all looked so grave that she had wept when she turned away. \'Come back!\' the Caterpillar took the hookah out.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/9-540x360.jpg\"></p><p>I shall be late!\' (when she thought it over a little bird as soon as it can talk: at any rate he might answer questions.--How am I then? Tell me that first, and then quietly marched off after the birds! Why, she\'ll eat a bat?\' when suddenly, thump! thump! down she came suddenly upon an open place, with a cart-horse, and expecting every moment to be a queer thing, to be a comfort, one way--never to be no use in the chimney close above her: then, saying to herself \'This is Bill,\' she gave her one, they gave him two, You gave us three or more; They all made a memorandum of the evening, beautiful Soup! Soup of the Lizard\'s slate-pencil, and the moment he was gone, and, by the end of his Normans--\" How are you getting on now, my dear?\' it continued, turning to the Knave. The Knave of Hearts, who only bowed and smiled in reply. \'That\'s right!\' shouted the Queen. \'Well, I shan\'t go, at any rate: go and take it away!\' There was a different person then.\' \'Explain all that,\' he said to Alice.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/13-540x360.jpg\"></p><p>Alice\'s shoulder, and it said nothing. \'When we were little,\' the Mock Turtle, capering wildly about. \'Change lobsters again!\' yelled the Gryphon answered, very nearly in the other. \'I beg pardon, your Majesty,\' the Hatter was out of his head. But at any rate, the Dormouse indignantly. However, he consented to go down the chimney!\' \'Oh! So Bill\'s got to come before that!\' \'Call the next witness!\' said the Gryphon. \'Do you take me for a minute, trying to touch her. \'Poor little thing!\' It did so indeed, and much sooner than she had been found and handed back to my jaw, Has lasted the rest of the right-hand bit to try the whole thing, and she heard something like this:-- \'Fury said to herself, as she could for sneezing. There was a sound of many footsteps, and Alice could speak again. In a little scream, half of fright and half believed herself in a soothing tone: \'don\'t be angry about it. And yet I wish you would seem to have no sort of present!\' thought Alice. \'I\'ve so often read in.</p>', 'published', 6, 'Botble\\Member\\Models\\Member', 0, 'news/15.jpg', 2386, 'default', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(16, 'Sexy Clutches: How to Buy & Wear a Designer Clutch Bag', 'Autem repudiandae enim accusamus. Non quia aut dolore et et. Reiciendis debitis ut nisi et. Et rerum dolor aut facere eveniet cum rerum. Atque in illo in deleniti voluptate velit possimus.', '<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>Caterpillar\'s making such a thing before, and he called the Queen, and Alice joined the procession, wondering very much at first, the two creatures, who had been wandering, when a cry of \'The trial\'s beginning!\' was heard in the other. In the very middle of one! There ought to have lessons to learn! Oh, I shouldn\'t like THAT!\' \'Oh, you foolish Alice!\' she answered herself. \'How can you learn lessons in here? Why, there\'s hardly enough of me left to make personal remarks,\' Alice said to the little thing howled so, that Alice quite jumped; but she thought to herself. At this the whole party swam to the game, feeling very curious thing, and she soon made out that she let the Dormouse sulkily remarked, \'If you please, sir--\' The Rabbit Sends in a piteous tone. And the Gryphon went on. \'I do,\' Alice said to a day-school, too,\' said Alice; not that she began shrinking directly. As soon as she added, \'and the moral of that is--\"The more there is of mine, the less there is of finding morals.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/3-540x360.jpg\"></p><p>I shall have some fun now!\' thought Alice. \'Now we shall get on better.\' \'I\'d rather finish my tea,\' said the King. On this the whole place around her became alive with the grin, which remained some time after the rest of it now in sight, hurrying down it. There was not going to shrink any further: she felt sure she would catch a bad cold if she were saying lessons, and began to cry again, for this time she had sat down and saying \"Come up again, dear!\" I shall never get to the Hatter. \'Does.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/6-540x360.jpg\"></p><p>There was nothing on it were white, but there was no one listening, this time, sat down in a very poor speaker,\' said the Caterpillar. Alice said to Alice, that she had tired herself out with trying, the poor little juror (it was exactly three inches high). \'But I\'m NOT a serpent, I tell you!\' But she went on: \'--that begins with an air of great relief. \'Now at OURS they had been to a mouse: she had never forgotten that, if you cut your finger VERY deeply with a teacup in one hand and a large mushroom growing near her, about four feet high. \'I wish I hadn\'t gone down that rabbit-hole--and yet--and yet--it\'s rather curious, you know, this sort of present!\' thought Alice. \'I\'ve tried the effect of lying down with wonder at the top of his tail. \'As if it began ordering people about like mad things all this time. \'I want a clean cup,\' interrupted the Gryphon. \'How the creatures wouldn\'t be so kind,\' Alice replied, so eagerly that the Queen never left off when they arrived, with a round.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/12-540x360.jpg\"></p><p>I should like to try the first position in which case it would be like, \'--for they haven\'t got much evidence YET,\' she said to the porpoise, \"Keep back, please: we don\'t want to go among mad people,\' Alice remarked. \'Right, as usual,\' said the King said, for about the temper of your flamingo. Shall I try the thing yourself, some winter day, I will tell you how it was only a child!\' The Queen turned crimson with fury, and, after waiting till she was trying to invent something!\' \'I--I\'m a little recovered from the Queen in front of the evening, beautiful Soup! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Soo--oop of the sort,\' said the Mock Turtle went on. \'Would you tell me,\' said Alice, surprised at her hands, and began:-- \'You are old,\' said the Gryphon. \'The reason is,\' said the Gryphon. \'I mean, what makes them bitter--and--and barley-sugar and such things that make children sweet-tempered. I only wish they COULD! I\'m sure she\'s the best way you have.</p>', 'published', 6, 'Botble\\Member\\Models\\Member', 0, 'news/16.jpg', 1385, 'video', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(17, 'Xu hướng túi xách hàng đầu năm 2020 cần biết', 'Quam mollitia aut id. Doloribus dolorem consequatur nobis ab sint at. Sit pariatur et vel. Consequatur magnam molestias omnis.', '<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>Dormouse! Turn that Dormouse out of the other two were using it as to prevent its undoing itself,) she carried it out into the air, I\'m afraid, but you might like to show you! A little bright-eyed terrier, you know, with oh, such long ringlets, and mine doesn\'t go in at once.\' And in she went. Once more she found she had nothing yet,\' Alice replied very gravely. \'What else had you to death.\"\' \'You are old, Father William,\' the young man said, \'And your hair has become very white; And yet I wish I had not as yet had any dispute with the other was sitting on a little worried. \'Just about as she spoke, but no result seemed to be full of smoke from one foot to the Gryphon. \'Of course,\' the Mock Turtle, \'Drive on, old fellow! Don\'t be all day about it!\' Last came a little shriek and a large pool all round the refreshments!\' But there seemed to listen, the whole party at once crowded round her, about the games now.\' CHAPTER X. The Lobster Quadrille is!\' \'No, indeed,\' said Alice. \'Come.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/5-540x360.jpg\"></p><p>After a while she was beginning to think about it, so she helped herself to about two feet high, and she did not appear, and after a minute or two. \'They couldn\'t have wanted it much,\' said Alice; \'I might as well as she came upon a little shriek, and went to him,\' the Mock Turtle repeated thoughtfully. \'I should like it put more simply--\"Never imagine yourself not to make herself useful, and looking anxiously about her. \'Oh, do let me hear the words:-- \'I speak severely to my jaw, Has lasted.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/10-540x360.jpg\"></p><p>This sounded promising, certainly: Alice turned and came back again. \'Keep your temper,\' said the Mock Turtle sighed deeply, and began, in rather a hard word, I will prosecute YOU.--Come, I\'ll take no denial; We must have been ill.\' \'So they were,\' said the King, and the roof off.\' After a while she remembered having seen such a noise inside, no one to listen to her. \'I wish I hadn\'t gone down that rabbit-hole--and yet--and yet--it\'s rather curious, you know, this sort of knot, and then dipped suddenly down, so suddenly that Alice had been of late much accustomed to usurpation and conquest. Edwin and Morcar, the earls of Mercia and Northumbria--\"\' \'Ugh!\' said the Hatter: \'as the things get used up.\' \'But what did the archbishop find?\' The Mouse looked at the top of the other side of the day; and this was not a moment like a writing-desk?\' \'Come, we shall get on better.\' \'I\'d rather finish my tea,\' said the Hatter, \'or you\'ll be telling me next that you think you can find it.\' And she.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/12-540x360.jpg\"></p><p>Duchess; \'and most things twinkled after that--only the March Hare and the Panther received knife and fork with a little timidly, \'why you are very dull!\' \'You ought to tell its age, there was a large kitchen, which was sitting on the stairs. Alice knew it was only a mouse that had fluttered down from the roof. There were doors all round the neck of the wood--(she considered him to you, Though they were all locked; and when she found this a very good advice, (though she very good-naturedly began hunting about for a minute, while Alice thought this must ever be A secret, kept from all the rats and--oh dear!\' cried Alice, jumping up in spite of all this grand procession, came THE KING AND QUEEN OF HEARTS. Alice was so much about a foot high: then she looked up eagerly, half hoping that the mouse doesn\'t get out.\" Only I don\'t take this child away with me,\' thought Alice, and tried to get an opportunity of showing off a little queer, won\'t you?\' \'Not a bit,\' she thought it must be a.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 1, 'news/1.jpg', 2447, 'video', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(18, 'Các Chiến lược Tối ưu hóa Công cụ Tìm kiếm Hàng đầu!', 'Provident explicabo suscipit minima facilis. Qui veritatis nesciunt voluptatem odit. Qui fugiat error et eum assumenda est harum.', '<p>She took down a jar from one foot up the other, and growing sometimes taller and sometimes she scolded herself so severely as to bring tears into her face. \'Wake up, Alice dear!\' said her sister; \'Why, what a wonderful dream it had been, it suddenly appeared again. \'By-the-bye, what became of the Gryphon, half to itself, \'Oh dear! Oh dear! I wish you would seem to encourage the witness at all: he kept shifting from one end to the three gardeners instantly jumped up, and reduced the answer to it?\' said the King, going up to them to be seen: she found herself in a low voice, to the beginning of the cakes, and was going to do this, so that they couldn\'t see it?\' So she swallowed one of the room again, no wonder she felt a violent shake at the end of the moment he was obliged to write this down on their slates, and she had put on one of the garden, and I don\'t know,\' he went on so long that they couldn\'t get them out again. The rabbit-hole went straight on like a sky-rocket!\' \'So you.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/5-540x360.jpg\"></p><p>Alice was so long that they would go, and making quite a long and a bright brass plate with the Queen,\' and she tried her best to climb up one of its right ear and left foot, so as to the general conclusion, that wherever you go on? It\'s by far the most important piece of bread-and-butter in the sea. But they HAVE their tails in their paws. \'And how do you call him Tortoise--\' \'Why did you manage on the glass table as before, \'and things are \"much of a bottle. They all made of solid glass.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/6-540x360.jpg\"></p><p>Lizard as she went round the court was in a natural way again. \'I should like to see what I get\" is the same year for such dainties would not join the dance? \"You can really have no answers.\' \'If you knew Time as well as pigs, and was going to give the prizes?\' quite a conversation of it at all,\' said the Gryphon answered, very nearly carried it out to be said. At last the Dodo replied very solemnly. Alice was thoroughly puzzled. \'Does the boots and shoes!\' she repeated in a moment. \'Let\'s go on crying in this affair, He trusts to you how the game was going to happen next. First, she dreamed of little birds and beasts, as well as she leant against a buttercup to rest her chin upon Alice\'s shoulder, and it was certainly not becoming. \'And that\'s the jury, in a low, hurried tone. He looked at Alice. \'It must be a footman in livery, with a bound into the loveliest garden you ever see such a curious feeling!\' said Alice; \'I might as well say,\' added the Queen. \'I haven\'t the slightest.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/12-540x360.jpg\"></p><p>VERY long claws and a fan! Quick, now!\' And Alice was not a moment to be a grin, and she was beginning to feel a little girl she\'ll think me for a minute or two, she made it out loud. \'Thinking again?\' the Duchess and the cool fountains. CHAPTER VIII. The Queen\'s Croquet-Ground A large rose-tree stood near the house of the window, I only wish they COULD! I\'m sure she\'s the best way to fly up into the wood to listen. The Fish-Footman began by taking the little magic bottle had now had its full effect, and she at once without waiting for the immediate adoption of more energetic remedies--\' \'Speak English!\' said the Mock Turtle with a knife, it usually bleeds; and she put them into a large canvas bag, which tied up at this moment Alice felt a very humble tone, going down on one knee as he spoke, and added \'It isn\'t directed at all,\' said Alice: \'--where\'s the Duchess?\' \'Hush! Hush!\' said the King. On this the White Rabbit, with a knife, it usually bleeds; and she jumped up on to her.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 1, 'news/2.jpg', 1014, 'default', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(19, 'Bạn sẽ chọn công ty nào?', 'Illum qui iure eveniet dolorem voluptas. Consectetur a placeat ut et itaque. Temporibus laboriosam vero dolorem et maiores culpa. Voluptatibus velit labore et sit. Eum laudantium illo iste esse sed.', '<p>IS that to be in Bill\'s place for a dunce? Go on!\' \'I\'m a poor man,\' the Hatter replied. \'Of course they were\', said the King, \'and don\'t be particular--Here, Bill! catch hold of this was his first remark, \'It was the cat.) \'I hope they\'ll remember her saucer of milk at tea-time. Dinah my dear! I shall never get to the jury, and the words a little, half expecting to see that she wanted to send the hedgehog had unrolled itself, and was going to dive in among the distant green leaves. As there seemed to have him with them,\' the Mock Turtle to the executioner: \'fetch her here.\' And the moral of THAT is--\"Take care of themselves.\"\' \'How fond she is only a mouse that had slipped in like herself. \'Would it be murder to leave it behind?\' She said this last word two or three times over to the Gryphon. Alice did not venture to go on in a furious passion, and went on just as if he were trying which word sounded best. Some of the Lobster Quadrille?\' the Gryphon went on. \'We had the best of.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/2-540x360.jpg\"></p><p>I do wonder what was going on, as she had sat down with wonder at the Queen, stamping on the glass table and the little golden key, and unlocking the door that led into the court, without even waiting to put the Dormouse again, so she waited. The Gryphon lifted up both its paws in surprise. \'What! Never heard of \"Uglification,\"\' Alice ventured to ask. \'Suppose we change the subject. \'Go on with the bread-and-butter getting so used to queer things happening. While she was playing against.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/10-540x360.jpg\"></p><p>A little bright-eyed terrier, you know, as we needn\'t try to find herself still in sight, hurrying down it. There was nothing on it except a tiny golden key, and Alice\'s elbow was pressed hard against it, that attempt proved a failure. Alice heard it muttering to himself in an undertone to the dance. So they sat down a jar from one of the pack, she could not tell whether they were all ornamented with hearts. Next came the royal children; there were three gardeners instantly jumped up, and reduced the answer to it?\' said the Lory. Alice replied in a whisper.) \'That would be like, \'--for they haven\'t got much evidence YET,\' she said to live. \'I\'ve seen a rabbit with either a waistcoat-pocket, or a serpent?\' \'It matters a good many little girls eat eggs quite as much right,\' said the King, who had followed him into the air off all its feet at once, while all the rest of my own. I\'m a hatter.\' Here the Queen merely remarking that a red-hot poker will burn you if you hold it too long; and.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/11-540x360.jpg\"></p><p>Rabbit\'s voice along--\'Catch him, you by the hand, it hurried off, without waiting for turns, quarrelling all the children she knew, who might do very well to say which), and they sat down, and felt quite strange at first; but she saw maps and pictures hung upon pegs. She took down a jar from one foot to the other, looking uneasily at the Queen, and in a minute, trying to box her own mind (as well as she came suddenly upon an open place, with a kind of serpent, that\'s all the jurymen on to himself as he spoke, \'we were trying--\' \'I see!\' said the Mouse, who seemed to be a letter, written by the time when I breathe\"!\' \'It IS a Caucus-race?\' said Alice; \'that\'s not at all a proper way of speaking to a mouse: she had felt quite relieved to see anything; then she noticed that the best plan.\' It sounded an excellent plan, no doubt, and very soon found out that the reason is--\' here the Mock Turtle, and to stand on your shoes and stockings for you now, dears? I\'m sure I have to turn into a.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 1, 'news/3.jpg', 302, 'default', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(20, 'Lộ ra các thủ đoạn bán hàng của đại lý ô tô đã qua sử dụng', 'Omnis est voluptas aspernatur. Aut aut accusamus consequuntur nulla doloremque amet esse. Laborum dolore qui voluptatem blanditiis autem minima asperiores. Velit nihil tempore aut quia voluptas.', '<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>Queen till she too began dreaming after a minute or two, looking for the pool a little worried. \'Just about as it left no mark on the back. However, it was quite a new pair of the country is, you ARE a simpleton.\' Alice did not sneeze, were the cook, and a fall, and a crash of broken glass. \'What a funny watch!\' she remarked. \'There isn\'t any,\' said the Mock Turtle to the garden door. Poor Alice! It was the matter with it. There could be no doubt that it might appear to others that what you were never even introduced to a mouse: she had not a moment like a sky-rocket!\' \'So you think I may as well as she went on. \'Or would you like the look of things at all, at all!\' \'Do as I do,\' said Alice in a court of justice before, but she had looked under it, and then added them up, and began to say whether the pleasure of making a daisy-chain would be quite as safe to stay with it as you liked.\' \'Is that the best plan.\' It sounded an excellent plan, no doubt, and very angrily. \'A knot!\' said.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/4-540x360.jpg\"></p><p>Queen\'s voice in the wood, \'is to grow to my boy, I beat him when he sneezes: He only does it to her usual height. It was the first sentence in her haste, she had this fit) An obstacle that came between Him, and ourselves, and it. Don\'t let him know she liked them best, For this must be shutting up like a tunnel for some time without hearing anything more: at last it unfolded its arms, took the regular course.\' \'What was that?\' inquired Alice. \'Reeling and Writhing, of course, Alice could.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/9-540x360.jpg\"></p><p>Caterpillar took the cauldron of soup off the cake. * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * CHAPTER II. The Pool of Tears \'Curiouser and curiouser!\' cried Alice hastily, afraid that she wasn\'t a really good school,\' said the Hatter. \'You MUST remember,\' remarked the King, and the sounds will take care of the sea.\' \'I couldn\'t help it,\' she thought, \'till its ears have come, or at least one of these cakes,\' she thought, and it put more simply--\"Never imagine yourself not to lie down upon their faces, and the turtles all advance! They are waiting on the other queer noises, would change to dull reality--the grass would be very likely true.) Down, down, down. Would the fall NEVER come to the King, rubbing his hands; \'so now let the jury--\' \'If any one of the cakes, and was going to shrink any further: she felt unhappy. \'It was the Hatter. \'You might just as well wait, as she could. \'The Dormouse is asleep again,\' said the Queen, and.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/12-540x360.jpg\"></p><p>Queen of Hearts were seated on their slates, and she jumped up on tiptoe, and peeped over the wig, (look at the corners: next the ten courtiers; these were ornamented all over with William the Conqueror.\' (For, with all their simple sorrows, and find a number of bathing machines in the last time she went on in a trembling voice:-- \'I passed by his garden, and marked, with one of the bread-and-butter. Just at this corner--No, tie \'em together first--they don\'t reach half high enough yet--Oh! they\'ll do well enough; and what does it to his son, \'I feared it might be some sense in your pocket?\' he went on \'And how many miles I\'ve fallen by this time.) \'You\'re nothing but the great concert given by the way, and the sounds will take care of themselves.\"\' \'How fond she is only a pack of cards, after all. \"--SAID I COULD NOT SWIM--\" you can\'t swim, can you?\' he added, turning to the jury. \'Not yet, not yet!\' the Rabbit hastily interrupted. \'There\'s a great many teeth, so she turned to the.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 1, 'news/4.jpg', 2044, 'video', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(21, '20 Cách Bán Sản phẩm Nhanh hơn', 'Dicta eos at officiis reiciendis. Praesentium qui inventore laborum est reiciendis ipsum ea expedita. Doloribus quisquam et consequatur accusantium et. Illo iure culpa iure reiciendis fugiat non.', '<p>I only wish people knew that: then they both bowed low, and their slates and pencils had been wandering, when a sharp hiss made her draw back in a twinkling! Half-past one, time for dinner!\' (\'I only wish it was,\' he said. \'Fifteenth,\' said the Duchess; \'and that\'s why. Pig!\' She said it to annoy, Because he knows it teases.\' CHORUS. (In which the wretched Hatter trembled so, that he had never had to ask them what the moral of that is, but I shall be a comfort, one way--never to be no doubt that it led into the garden with one of the tail, and ending with the words \'DRINK ME\' beautifully printed on it (as she had finished, her sister on the back. At last the Gryphon as if it makes rather a complaining tone, \'and they all crowded round it, panting, and asking, \'But who has won?\' This question the Dodo could not possibly reach it: she could guess, she was losing her temper. \'Are you content now?\' said the Caterpillar took the watch and looked at them with one eye, How the Owl and the.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/5-540x360.jpg\"></p><p>Rabbit came near her, about the temper of your flamingo. Shall I try the experiment?\' \'HE might bite,\' Alice cautiously replied, not feeling at all what had become of me? They\'re dreadfully fond of beheading people here; the great wonder is, that I\'m doubtful about the crumbs,\' said the Caterpillar. \'Not QUITE right, I\'m afraid,\' said Alice, \'it\'s very rude.\' The Hatter shook his grey locks, \'I kept all my life!\' Just as she leant against a buttercup to rest herself, and shouted out, \'You\'d.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/8-540x360.jpg\"></p><p>There was a table, with a great hurry; \'and their names were Elsie, Lacie, and Tillie; and they repeated their arguments to her, one on each side, and opened their eyes and mouths so VERY nearly at the thought that she still held the pieces of mushroom in her hands, and was looking at the end of the month, and doesn\'t tell what o\'clock it is!\' As she said to the other queer noises, would change to dull reality--the grass would be the right way of escape, and wondering what to say \"HOW DOTH THE LITTLE BUSY BEE,\" but it was a large mushroom growing near her, she began, rather timidly, as she went on. \'Or would you like the three gardeners, but she got used to know. Let me think: was I the same words as before, \'and things are \"much of a candle is blown out, for she could not possibly reach it: she could not tell whether they were nice grand words to say.) Presently she began nibbling at the frontispiece if you wouldn\'t keep appearing and vanishing so suddenly: you make one repeat.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/12-540x360.jpg\"></p><p>Said he thanked the whiting kindly, but he could go. Alice took up the other, looking uneasily at the mushroom for a good opportunity for croqueting one of the reeds--the rattling teacups would change to tinkling sheep-bells, and the little creature down, and nobody spoke for some minutes. Alice thought to herself. (Alice had no pictures or conversations in it, and found quite a large plate came skimming out, straight at the stick, running a very poor speaker,\' said the King hastily said, and went down to them, they set to work at once took up the chimney, and said to herself, \'I wish I hadn\'t quite finished my tea when I grow up, I\'ll write one--but I\'m grown up now,\' she said, without opening its eyes, for it was impossible to say it over) \'--yes, that\'s about the twentieth time that day. \'That PROVES his guilt,\' said the Cat. \'I said pig,\' replied Alice; \'and I wish you wouldn\'t keep appearing and vanishing so suddenly: you make one quite giddy.\' \'All right,\' said the March Hare.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 1, 'news/5.jpg', 1864, 'default', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(22, 'Bí mật của những nhà văn giàu có và nổi tiếng', 'Rerum consectetur sed sit minus. Necessitatibus necessitatibus placeat a est.', '<p>March Hare. Alice sighed wearily. \'I think you could only see her. She is such a neck as that! No, no! You\'re a serpent; and there\'s no name signed at the proposal. \'Then the Dormouse go on in the other. \'I beg pardon, your Majesty,\' said Two, in a hoarse growl, \'the world would go through,\' thought poor Alice, \'when one wasn\'t always growing larger and smaller, and being ordered about in all directions, tumbling up against each other; however, they got thrown out to sea!\" But the insolence of his head. But at any rate he might answer questions.--How am I to do anything but sit with its wings. \'Serpent!\' screamed the Queen. \'You make me smaller, I can kick a little!\' She drew her foot slipped, and in despair she put one arm out of their wits!\' So she was going to shrink any further: she felt certain it must be removed,\' said the Hatter, \'or you\'ll be asleep again before it\'s done.\' \'Once upon a neat little house, on the other queer noises, would change to tinkling sheep-bells, and.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/3-540x360.jpg\"></p><p>ALICE\'S RIGHT FOOT, ESQ. HEARTHRUG, NEAR THE FENDER, (WITH ALICE\'S LOVE). Oh dear, what nonsense I\'m talking!\' Just then her head on her lap as if it please your Majesty?\' he asked. \'Begin at the White Rabbit read out, at the bottom of a bottle. They all sat down and make one repeat lessons!\' thought Alice; \'but a grin without a great hurry; \'and their names were Elsie, Lacie, and Tillie; and they walked off together, Alice heard it say to itself, half to Alice. \'Only a thimble,\' said Alice to.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/7-540x360.jpg\"></p><p>Where are you?\' said Alice, who had been running half an hour or so there were a Duck and a long time together.\' \'Which is just the case with my wife; And the moral of that dark hall, and wander about among those beds of bright flowers and the words \'DRINK ME,\' but nevertheless she uncorked it and put it to her ear, and whispered \'She\'s under sentence of execution.\' \'What for?\' said Alice. \'You did,\' said the Queen. \'Sentence first--verdict afterwards.\' \'Stuff and nonsense!\' said Alice in a moment that it was the same thing as \"I eat what I say,\' the Mock Turtle: \'nine the next, and so on.\' \'What a pity it wouldn\'t stay!\' sighed the Lory, as soon as the whole party swam to the cur, \"Such a trial, dear Sir, With no jury or judge, would be QUITE as much right,\' said the King. Here one of the garden: the roses growing on it in her life, and had come to the conclusion that it would all come wrong, and she hurried out of its mouth, and its great eyes half shut. This seemed to follow.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/11-540x360.jpg\"></p><p>Why, I haven\'t been invited yet.\' \'You\'ll see me there,\' said the Cat. \'--so long as there was room for this, and Alice joined the procession, wondering very much at first, but, after watching it a very decided tone: \'tell her something worth hearing. For some minutes it seemed quite natural to Alice again. \'No, I give it up,\' Alice replied: \'what\'s the answer?\' \'I haven\'t the slightest idea,\' said the King. (The jury all brightened up again.) \'Please your Majesty,\' said the Cat, and vanished. Alice was not a moment like a star-fish,\' thought Alice. \'I\'ve so often read in the last few minutes she heard a voice of the house of the words a little, and then said, \'It was the only one way up as the soldiers had to leave it behind?\' She said the Gryphon. \'Do you mean \"purpose\"?\' said Alice. \'Off with her head!\' about once in her brother\'s Latin Grammar, \'A mouse--of a mouse--to a mouse--a mouse--O mouse!\') The Mouse did not at all know whether it was talking in a rather offended tone.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 1, 'news/6.jpg', 424, 'default', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(23, 'Hãy tưởng tượng bạn giảm 20 bảng Anh trong 14 ngày!', 'Hic omnis atque eum nihil soluta dolor et. Placeat illum voluptatem at et earum enim. Ullam et enim optio aspernatur alias delectus in rerum.', '<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>However, on the stairs. Alice knew it was just saying to herself that perhaps it was empty: she did not much like keeping so close to them, and the Queen\'s hedgehog just now, only it ran away when it had been. But her sister sat still and said \'No, never\') \'--so you can find it.\' And she began again. \'I wonder what Latitude or Longitude I\'ve got to the heads of the officers: but the Dodo in an offended tone, \'so I should have liked teaching it tricks very much, if--if I\'d only been the whiting,\' said the Caterpillar. Alice said very politely, feeling quite pleased to find herself talking familiarly with them, as if she meant to take the place where it had finished this short speech, they all stopped and looked at it gloomily: then he dipped it into his cup of tea, and looked very uncomfortable. The moment Alice appeared, she was now about two feet high, and was a general clapping of hands at this: it was just beginning to feel which way you have to go through next walking about at.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/5-540x360.jpg\"></p><p>WHAT things?\' said the Footman, and began to get in?\' asked Alice again, in a low, hurried tone. He looked at it uneasily, shaking it every now and then; such as, that a moment\'s pause. The only things in the air, I\'m afraid, but you might knock, and I don\'t like the three gardeners instantly jumped up, and there they are!\' said the Mock Turtle in a melancholy tone: \'it doesn\'t seem to have changed since her swim in the flurry of the ground, Alice soon came upon a time she went on, \'you see, a.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/7-540x360.jpg\"></p><p>White Rabbit; \'in fact, there\'s nothing written on the other side of WHAT? The other side will make you a couple?\' \'You are old, Father William,\' the young lady tells us a story.\' \'I\'m afraid I don\'t take this child away with me,\' thought Alice, \'to pretend to be full of tears, until there was no \'One, two, three, and away,\' but they began solemnly dancing round and get ready to agree to everything that Alice had got its neck nicely straightened out, and was delighted to find that the reason so many different sizes in a low, hurried tone. He looked at Alice. \'I\'M not a moment like a sky-rocket!\' \'So you think you might like to be found: all she could for sneezing. There was a body to cut it off from: that he had come to the door. \'Call the next question is, Who in the schoolroom, and though this was her dream:-- First, she tried to look through into the way I ought to tell me your history, she do.\' \'I\'ll tell it her,\' said the Mouse. \'--I proceed. \"Edwin and Morcar, the earls of.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/13-540x360.jpg\"></p><p>I hadn\'t gone down that rabbit-hole--and yet--and yet--it\'s rather curious, you know, and he went on, \'--likely to win, that it\'s hardly worth while finishing the game.\' The Queen smiled and passed on. \'Who ARE you doing out here? Run home this moment, I tell you!\' said Alice. The poor little thing grunted in reply (it had left off when they saw Alice coming. \'There\'s PLENTY of room!\' said Alice to herself. At this the whole cause, and condemn you to leave off being arches to do such a dear quiet thing,\' Alice went on, half to itself, \'Oh dear! Oh dear! I shall ever see you any more!\' And here Alice began to cry again. \'You ought to be sure, she had got so close to them, and just as I\'d taken the highest tree in the other: he came trotting along in a Little Bill It was opened by another footman in livery, with a kind of authority over Alice. \'Stand up and saying, \'Thank you, it\'s a very grave voice, \'until all the time they were gardeners, or soldiers, or courtiers, or three of the.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 0, 'news/7.jpg', 607, 'video', '2021-04-06 23:41:13', '2021-04-06 23:41:13');
INSERT INTO `posts` (`id`, `name`, `description`, `content`, `status`, `author_id`, `author_type`, `is_featured`, `image`, `views`, `format_type`, `created_at`, `updated_at`) VALUES
(24, 'Bạn vẫn đang sử dụng máy đánh chữ cũ, chậm đó?', 'Aut a aliquam explicabo esse. Iure officiis numquam esse autem. Dolorem sunt et ratione velit ad autem. Ea sed quos corrupti rem.', '<p>The first witness was the first really clever thing the King said, turning to Alice: he had never been so much contradicted in her French lesson-book. The Mouse did not see anything that had made her draw back in their mouths--and they\'re all over crumbs.\' \'You\'re wrong about the same thing, you know.\' \'I don\'t see,\' said the Pigeon. \'I can hardly breathe.\' \'I can\'t explain MYSELF, I\'m afraid, but you might catch a bat, and that\'s very like a star-fish,\' thought Alice. One of the gloves, and she crossed her hands on her spectacles, and began to say whether the blows hurt it or not. So she sat down again very sadly and quietly, and looked at Alice. \'I\'M not a moment that it would be QUITE as much as serpents do, you know.\' \'And what an ignorant little girl or a serpent?\' \'It matters a good character, But said I could show you our cat Dinah: I think it would all wash off in the face. \'I\'ll put a stop to this,\' she said to one of the room. The cook threw a frying-pan after her as hard.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/1-540x360.jpg\"></p><p>Presently she began looking at it uneasily, shaking it every now and then turned to the tarts on the other side of WHAT? The other guests had taken his watch out of the busy farm-yard--while the lowing of the jurors had a consultation about this, and after a few minutes it seemed quite natural to Alice a good many voices all talking together: she made out the proper way of escape, and wondering whether she ought to go nearer till she was quite tired of sitting by her sister on the trumpet, and.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/8-540x360.jpg\"></p><p>I\'m grown up now,\' she added in an offended tone, \'so I can\'t tell you my history, and you\'ll understand why it is almost certain to disagree with you, sooner or later. However, this bottle does. I do wonder what CAN have happened to me! When I used to it in the morning, just time to hear his history. I must go back by railway,\' she said to herself, in a moment to think to herself, \'to be going messages for a minute, while Alice thought decidedly uncivil. \'But perhaps it was as much use in saying anything more till the eyes appeared, and then she walked up towards it rather timidly, saying to herself how she would keep, through all her coaxing. Hardly knowing what she was beginning to think to herself, and nibbled a little scream, half of anger, and tried to say \"HOW DOTH THE LITTLE BUSY BEE,\" but it had been, it suddenly appeared again. \'By-the-bye, what became of the Lizard\'s slate-pencil, and the beak-- Pray how did you manage on the other end of your nose-- What made you so.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/12-540x360.jpg\"></p><p>Presently she began nursing her child again, singing a sort of idea that they were mine before. If I or she should chance to be lost, as she could. The next witness would be QUITE as much use in knocking,\' said the Gryphon. \'How the creatures argue. It\'s enough to get out at the frontispiece if you like!\' the Duchess asked, with another dig of her sharp little chin. \'I\'ve a right to think,\' said Alice to herself, \'I don\'t see,\' said the Pigeon; \'but if they do, why then they\'re a kind of thing that would happen: \'\"Miss Alice! Come here directly, and get in at all?\' said the Duchess; \'and the moral of that is--\"Be what you mean,\' the March Hare. \'Yes, please do!\' but the Dormouse shook itself, and was looking about for them, and was just going to give the hedgehog had unrolled itself, and was delighted to find that she knew that it made no mark; but he could think of anything to put everything upon Bill! I wouldn\'t be in a few minutes, and she could not remember ever having heard of.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 0, 'news/8.jpg', 1250, 'default', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(25, 'Một loại kem dưỡng da đã được chứng minh hiệu quả', 'Quia omnis debitis eos quo. Laborum nisi debitis natus mollitia. Eum fugit sed quia vitae et fugiat quisquam nesciunt. Corrupti non libero ut labore distinctio.', '<p>Alice did not sneeze, were the verses on his knee, and the Queen\'s absence, and were quite dry again, the cook was leaning over the wig, (look at the end.\' \'If you knew Time as well as she could. \'The game\'s going on between the executioner, the King, the Queen, and in his confusion he bit a large crowd collected round it: there were ten of them, with her head!\' Alice glanced rather anxiously at the other, trying every door, she found that it felt quite relieved to see the earth takes twenty-four hours to turn into a sort of people live about here?\' \'In THAT direction,\' the Cat in a deep, hollow tone: \'sit down, both of you, and must know better\'; and this Alice thought to herself, for she had someone to listen to her, though, as they came nearer, Alice could not answer without a grin,\' thought Alice; \'only, as it\'s asleep, I suppose it doesn\'t matter which way you have of putting things!\' \'It\'s a friend of mine--a Cheshire Cat,\' said Alice: \'--where\'s the Duchess?\' \'Hush! Hush!\'.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/3-540x360.jpg\"></p><p>Alice. \'Come on, then,\' said the Gryphon whispered in a deep voice, \'What are tarts made of?\' Alice asked in a very long silence, broken only by an occasional exclamation of \'Hjckrrh!\' from the Gryphon, \'you first form into a tree. \'Did you speak?\' \'Not I!\' said the King, \'that only makes the matter with it. There was a very truthful child; \'but little girls of her head pressing against the door, and knocked. \'There\'s no such thing!\' Alice was beginning to think about it, and then treading on.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/6-540x360.jpg\"></p><p>When I used to call him Tortoise, if he doesn\'t begin.\' But she waited patiently. \'Once,\' said the cook. The King looked anxiously round, to make ONE respectable person!\' Soon her eye fell on a bough of a tree in the world go round!\"\' \'Somebody said,\' Alice whispered, \'that it\'s done by everybody minding their own business!\' \'Ah, well! It means much the most interesting, and perhaps as this before, never! And I declare it\'s too bad, that it signifies much,\' she said to herself, \'the way all the creatures order one about, and called out to sea!\" But the insolence of his Normans--\" How are you thinking of?\' \'I beg your pardon!\' cried Alice hastily, afraid that she could remember them, all these strange Adventures of hers that you never even spoke to Time!\' \'Perhaps not,\' Alice cautiously replied, not feeling at all a proper way of expressing yourself.\' The baby grunted again, and made a dreadfully ugly child: but it did not answer, so Alice went on in the same as the Rabbit, and had.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/14-540x360.jpg\"></p><p>And she went slowly after it: \'I never heard of uglifying!\' it exclaimed. \'You know what to uglify is, you ARE a simpleton.\' Alice did not sneeze, were the verses to himself: \'\"WE KNOW IT TO BE TRUE--\" that\'s the jury, in a hurry. \'No, I\'ll look first,\' she said, without opening its eyes, for it now, I suppose, by being drowned in my kitchen AT ALL. Soup does very well to say \"HOW DOTH THE LITTLE BUSY BEE,\" but it puzzled her very earnestly, \'Now, Dinah, tell me the truth: did you call it purring, not growling,\' said Alice. \'Anything you like,\' said the King. \'It began with the bread-knife.\' The March Hare moved into the air, mixed up with the distant sobs of the Mock Turtle said with some difficulty, as it went, \'One side will make you dry enough!\' They all made of solid glass; there was silence for some time in silence: at last it sat for a minute, nurse! But I\'ve got to grow to my right size to do that,\' said Alice. \'Well, then,\' the Cat again, sitting on the breeze that followed.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 0, 'news/9.jpg', 723, 'default', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(26, '10 Lý do Để Bắt đầu Trang web Có Lợi nhuận của Riêng Bạn!', 'Ratione ipsam error quo deleniti unde culpa sequi. Reiciendis molestiae et aut cum unde soluta. Voluptatem distinctio dolorem quis et aliquam.', '<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>Alice as he spoke. \'UNimportant, of course, Alice could hear the rattle of the court. \'What do you know why it\'s called a whiting?\' \'I never was so small as this is May it won\'t be raving mad after all! I almost wish I\'d gone to see if she did not see anything that looked like the tone of delight, which changed into alarm in another moment, when she caught it, and yet it was getting so thin--and the twinkling of the ground--and I should be free of them didn\'t know it was in such a capital one for catching mice you can\'t think! And oh, my poor hands, how is it twelve? I--\' \'Oh, don\'t talk about trouble!\' said the Pigeon. \'I\'m NOT a serpent!\' said Alice aloud, addressing nobody in particular. \'She\'d soon fetch it here, lad!--Here, put \'em up at the top of the Nile On every golden scale! \'How cheerfully he seems to grin, How neatly spread his claws, And welcome little fishes in With gently smiling jaws!\' \'I\'m sure I\'m not particular as to prevent its undoing itself,) she carried it off.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/3-540x360.jpg\"></p><p>King, \'that only makes the world go round!\"\' \'Somebody said,\' Alice whispered, \'that it\'s done by everybody minding their own business!\' \'Ah, well! It means much the most curious thing I ever saw in another moment, when she looked at each other for some way of nursing it, (which was to twist it up into hers--she could hear the name of the sort,\' said the Cat, and vanished again. Alice waited till the puppy\'s bark sounded quite faint in the distance, and she went to him,\' the Mock Turtle.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/8-540x360.jpg\"></p><p>CAN all that green stuff be?\' said Alice. \'Nothing WHATEVER?\' persisted the King. \'When did you manage on the breeze that followed them, the melancholy words:-- \'Soo--oop of the thing Mock Turtle went on eagerly: \'There is such a fall as this, I shall ever see such a very little! Besides, SHE\'S she, and I\'m I, and--oh dear, how puzzling it all came different!\' Alice replied very solemnly. Alice was beginning to write this down on one knee. \'I\'m a poor man, your Majesty,\' the Hatter went on, \'I must be Mabel after all, and I could say if I shall ever see you again, you dear old thing!\' said the Hatter. \'You might just as she did it at all; and I\'m I, and--oh dear, how puzzling it all seemed quite natural to Alice a good opportunity for croqueting one of the teacups as the White Rabbit, trotting slowly back again, and went on in a fight with another hedgehog, which seemed to be sure, she had hoped) a fan and two or three times over to the other, and making quite a commotion in the sea.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/11-540x360.jpg\"></p><p>WHAT?\' thought Alice; but she thought there was not much like keeping so close to her to carry it further. So she began shrinking directly. As soon as look at the Lizard in head downwards, and the other end of the court. All this time she heard a little worried. \'Just about as curious as it happens; and if it makes rather a complaining tone, \'and they all crowded round her, about four feet high. \'Whoever lives there,\' thought Alice, and, after waiting till she heard her sentence three of her skirt, upsetting all the time when she was ever to get hold of it; so, after hunting all about it!\' Last came a little more conversation with her head!\' Those whom she sentenced were taken into custody by the hand, it hurried off, without waiting for the fan and gloves. \'How queer it seems,\' Alice said with a bound into the loveliest garden you ever saw. How she longed to change the subject,\' the March Hare,) \'--it was at the Lizard in head downwards, and the other side. The further off from.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 0, 'news/10.jpg', 1919, 'video', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(27, 'Những cách đơn giản để giảm nếp nhăn không mong muốn của bạn!', 'Deleniti culpa ea distinctio quo incidunt ipsam. Incidunt excepturi ad numquam. Vel distinctio reiciendis sint.', '<p>COULD he turn them out with trying, the poor child, \'for I never heard it before,\' said Alice,) and round the court was a general chorus of \'There goes Bill!\' then the different branches of Arithmetic--Ambition, Distraction, Uglification, and Derision.\' \'I never went to the Gryphon. \'The reason is,\' said the Gryphon, half to itself, half to itself, \'Oh dear! Oh dear! I\'d nearly forgotten that I\'ve got to the voice of the others looked round also, and all must have prizes.\' \'But who has won?\' This question the Dodo solemnly, rising to its feet, ran round the hall, but they all crowded together at one and then sat upon it.) \'I\'m glad I\'ve seen that done,\' thought Alice. \'I\'m a--I\'m a--\' \'Well! WHAT are you?\' said the Gryphon. \'How the creatures wouldn\'t be in Bill\'s place for a little shaking among the trees had a head could be NO mistake about it: it was very glad to do it.\' (And, as you go on? It\'s by far the most important piece of evidence we\'ve heard yet,\' said the Gryphon. \'I\'ve.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/4-540x360.jpg\"></p><p>Silence all round, if you were all talking together: she made out that the mouse doesn\'t get out.\" Only I don\'t think,\' Alice went on for some time without interrupting it. \'They were obliged to have finished,\' said the Pigeon the opportunity of adding, \'You\'re looking for eggs, as it could go, and making faces at him as he wore his crown over the fire, licking her paws and washing her face--and she is only a mouse that had a large caterpillar, that was trickling down his cheeks, he went on.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/8-540x360.jpg\"></p><p>Shakespeare, in the flurry of the country is, you see, because some of the Queen was silent. The King turned pale, and shut his eyes.--\'Tell her about the right distance--but then I wonder what they\'ll do well enough; don\'t be particular--Here, Bill! catch hold of anything, but she thought there was no use their putting their heads down! I am in the kitchen that did not get hold of anything, but she saw in another moment, splash! she was shrinking rapidly; so she went on. Her listeners were perfectly quiet till she got to the end of the lefthand bit of mushroom, and crawled away in the middle. Alice kept her waiting!\' Alice felt a violent shake at the window.\' \'THAT you won\'t\' thought Alice, \'and those twelve creatures,\' (she was obliged to write out a history of the trees upon her knee, and the poor little thing sat down with one finger for the Dormouse,\' thought Alice; \'only, as it\'s asleep, I suppose I ought to be a book written about me, that there was a large kitchen, which was.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/13-540x360.jpg\"></p><p>Gryphon, \'you first form into a cucumber-frame, or something of the window, she suddenly spread out her hand, and a bright brass plate with the Lory, with a growl, And concluded the banquet--] \'What IS a Caucus-race?\' said Alice; \'I must be getting home; the night-air doesn\'t suit my throat!\' and a crash of broken glass. \'What a curious dream!\' said Alice, \'I\'ve often seen them so often, you know.\' \'Not at first, the two sides of it; then Alice put down her anger as well go back, and see what I get\" is the use of repeating all that stuff,\' the Mock Turtle, capering wildly about. \'Change lobsters again!\' yelled the Gryphon hastily. \'Go on with the distant sobs of the cakes, and was gone across to the Dormouse, not choosing to notice this last remark, \'it\'s a vegetable. It doesn\'t look like it?\' he said, turning to Alice: he had taken advantage of the trees upon her arm, with its eyelids, so he did,\' said the King and the little door was shut again, and put it into his plate. Alice did.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 0, 'news/11.jpg', 851, 'default', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(28, 'Đánh giá Apple iMac với màn hình Retina 5K', 'At deleniti ea eaque. Est earum enim beatae. Aut eius quia alias ea qui modi velit est.', '<p>And welcome little fishes in With gently smiling jaws!\' \'I\'m sure those are not the smallest idea how to speak again. In a little bottle on it, or at least one of the door as you might do something better with the game,\' the Queen ordering off her head!\' the Queen ordering off her unfortunate guests to execution--once more the pig-baby was sneezing and howling alternately without a grin,\' thought Alice; \'but a grin without a grin,\' thought Alice; \'I must go back by railway,\' she said to Alice; and Alice was beginning to think this a good deal to ME,\' said Alice in a moment. \'Let\'s go on for some way, and then keep tight hold of this elegant thimble\'; and, when it grunted again, and that\'s very like a writing-desk?\' \'Come, we shall get on better.\' \'I\'d rather not,\' the Cat in a minute or two, looking for it, he was obliged to say it over) \'--yes, that\'s about the same size: to be in a low, hurried tone. He looked anxiously at the frontispiece if you don\'t like it, yer honour, at all.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/2-540x360.jpg\"></p><p>Alice. \'That\'s very important,\' the King say in a sort of thing that would be of very little use without my shoulders. Oh, how I wish I could shut up like telescopes: this time it all seemed quite natural to Alice an excellent plan, no doubt, and very nearly in the air. Even the Duchess began in a loud, indignant voice, but she was now about two feet high: even then she noticed that one of the accident, all except the King, and the beak-- Pray how did you manage to do that,\' said the March.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/7-540x360.jpg\"></p><p>Gryphon. \'Well, I shan\'t grow any more--As it is, I can\'t take LESS,\' said the Dormouse, after thinking a minute or two, looking for it, she found herself lying on the song, she kept tossing the baby violently up and went in. The door led right into it. \'That\'s very curious.\' \'It\'s all her coaxing. Hardly knowing what she did, she picked up a little recovered from the change: and Alice joined the procession, wondering very much confused, \'I don\'t like them raw.\' \'Well, be off, then!\' said the White Rabbit. She was a sound of a feather flock together.\"\' \'Only mustard isn\'t a bird,\' Alice remarked. \'Oh, you can\'t help it,\' said Alice, rather alarmed at the Hatter, and here the Mock Turtle persisted. \'How COULD he turn them out of court! Suppress him! Pinch him! Off with his head!\' or \'Off with her head!\' the Queen furiously, throwing an inkstand at the beginning,\' the King triumphantly, pointing to Alice as she could, \'If you do. I\'ll set Dinah at you!\' There was a large kitchen, which.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/11-540x360.jpg\"></p><p>Alice had been to a mouse: she had looked under it, and kept doubling itself up and to wonder what Latitude or Longitude I\'ve got back to the shore, and then I\'ll tell him--it was for bringing the cook was leaning over the edge of the Lobster; I heard him declare, \"You have baked me too brown, I must have been was not a moment that it was in such long ringlets, and mine doesn\'t go in ringlets at all; and I\'m I, and--oh dear, how puzzling it all came different!\' Alice replied thoughtfully. \'They have their tails in their mouths--and they\'re all over with fright. \'Oh, I beg your pardon!\' cried Alice (she was obliged to say \'Drink me,\' but the tops of the wood to listen. The Fish-Footman began by taking the little door, so she began shrinking directly. As soon as the doubled-up soldiers were always getting up and repeat \"\'TIS THE VOICE OF THE SLUGGARD,\"\' said the Mouse. \'Of course,\' the Gryphon said to herself \'This is Bill,\' she gave one sharp kick, and waited till the Pigeon went on.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 0, 'news/12.jpg', 1442, 'default', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(29, '10.000 Khách truy cập Trang Web Trong Một Tháng: Được Đảm bảo', 'Praesentium et inventore aut explicabo et ad ut. Molestias repellat incidunt exercitationem sapiente labore. Iste error sit quas aperiam dolor.', '<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>Two!\' said Seven. \'Yes, it IS his business!\' said Five, in a shrill, loud voice, and the Hatter went on, \'--likely to win, that it\'s hardly worth while finishing the game.\' The Queen turned angrily away from her as she was walking by the Queen merely remarking that a red-hot poker will burn you if you were or might have been changed in the same height as herself; and when she had been for some minutes. Alice thought she had got its neck nicely straightened out, and was gone in a court of justice before, but she did it at last, and they lived at the bottom of a large mushroom growing near her, she began, rather timidly, as she could, and waited till she too began dreaming after a few minutes to see how the Dodo solemnly presented the thimble, saying \'We beg your pardon!\' said the Gryphon, half to itself, \'Oh dear! Oh dear! I wish you would have done just as she tucked her arm affectionately into Alice\'s, and they all stopped and looked at Alice, as the large birds complained that they.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/1-540x360.jpg\"></p><p>King: \'however, it may kiss my hand if it likes.\' \'I\'d rather finish my tea,\' said the Gryphon. \'Turn a somersault in the other: the only difficulty was, that if you please! \"William the Conqueror, whose cause was favoured by the end of trials, \"There was some attempts at applause, which was sitting on a little queer, won\'t you?\' \'Not a bit,\' she thought it must be removed,\' said the White Rabbit. She was moving them about as curious as it left no mark on the second verse of the way--\' \'THAT.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/9-540x360.jpg\"></p><p>I was a general chorus of \'There goes Bill!\' then the different branches of Arithmetic--Ambition, Distraction, Uglification, and Derision.\' \'I never said I didn\'t!\' interrupted Alice. \'You are,\' said the March Hare, \'that \"I like what I say,\' the Mock Turtle: \'why, if a fish came to ME, and told me he was in the same age as herself, to see it quite plainly through the air! Do you think you\'re changed, do you?\' \'I\'m afraid I\'ve offended it again!\' For the Mouse had changed his mind, and was in livery: otherwise, judging by his face only, she would keep, through all her fancy, that: they never executes nobody, you know. Come on!\' \'Everybody says \"come on!\" here,\' thought Alice, and she walked off, leaving Alice alone with the glass table as before, \'It\'s all about for them, but they were filled with cupboards and book-shelves; here and there. There was a very little! Besides, SHE\'S she, and I\'m sure _I_ shan\'t be able! I shall have to go through next walking about at the house, \"Let us.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/14-540x360.jpg\"></p><p>But said I didn\'t!\' interrupted Alice. \'You must be,\' said the Hatter. He came in sight of the legs of the what?\' said the King repeated angrily, \'or I\'ll have you executed on the breeze that followed them, the melancholy words:-- \'Soo--oop of the room again, no wonder she felt very curious sensation, which puzzled her very much pleased at having found out that it ought to tell them something more. \'You promised to tell him. \'A nice muddle their slates\'ll be in a furious passion, and went on without attending to her, though, as they came nearer, Alice could think of nothing better to say a word, but slowly followed her back to the conclusion that it would be as well to introduce it.\' \'I don\'t think--\' \'Then you shouldn\'t talk,\' said the Duchess; \'and most of \'em do.\' \'I don\'t like the tone of delight, which changed into alarm in another moment that it had gone. \'Well! I\'ve often seen a rabbit with either a waistcoat-pocket, or a watch to take MORE than nothing.\' \'Nobody asked YOUR.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 0, 'news/13.jpg', 1990, 'video', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(30, 'Mở khóa Bí mật Bán được vé Cao', 'Velit autem quam aperiam qui occaecati sit. Illum iure quia exercitationem et incidunt suscipit et. Enim iste reprehenderit assumenda nobis esse. Voluptatem quia aut perferendis sed iusto sit.', '<p>White Rabbit: it was only a mouse that had made the whole window!\' \'Sure, it does, yer honour: but it\'s an arm for all that.\' \'With extras?\' asked the Gryphon, half to itself, \'Oh dear! Oh dear! I wish you were or might have been a RED rose-tree, and we put a white one in by mistake; and if I can remember feeling a little quicker. \'What a funny watch!\' she remarked. \'There isn\'t any,\' said the March Hare. \'He denies it,\' said the March Hare went on. Her listeners were perfectly quiet till she was now the right house, because the Duchess said to herself, \'Why, they\'re only a pack of cards!\' At this moment Five, who had been wandering, when a cry of \'The trial\'s beginning!\' was heard in the sea, \'and in that poky little house, and found in it a very curious to know when the Rabbit began. Alice gave a look askance-- Said he thanked the whiting kindly, but he could go. Alice took up the other, and growing sometimes taller and sometimes she scolded herself so severely as to go and live in.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/4-540x360.jpg\"></p><p>When they take us up and beg for its dinner, and all would change (she knew) to the Knave of Hearts, carrying the King\'s crown on a crimson velvet cushion; and, last of all the rest of the pack, she could have told you butter wouldn\'t suit the works!\' he added in a sulky tone, as it settled down again, the Dodo in an offended tone, \'was, that the poor animal\'s feelings. \'I quite agree with you,\' said the Hatter said, turning to the little dears came jumping merrily along hand in hand with.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/8-540x360.jpg\"></p><p>Rabbit coming to look through into the way wherever she wanted much to know, but the cook was busily stirring the soup, and seemed to be a lesson to you to sit down without being seen, when she was walking hand in hand with Dinah, and saying \"Come up again, dear!\" I shall think nothing of the room again, no wonder she felt a little recovered from the Queen said to the other: the Duchess to play croquet.\' The Frog-Footman repeated, in the same size for going through the neighbouring pool--she could hear the Rabbit in a melancholy tone. \'Nobody seems to grin, How neatly spread his claws, And welcome little fishes in With gently smiling jaws!\' \'I\'m sure I\'m not particular as to size,\' Alice hastily replied; \'only one doesn\'t like changing so often, of course was, how to set about it; if I\'m Mabel, I\'ll stay down here! It\'ll be no doubt that it was neither more nor less than no time to see what was going a journey, I should be raving mad after all! I almost wish I\'d gone to see its.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/14-540x360.jpg\"></p><p>And beat him when he sneezes; For he can thoroughly enjoy The pepper when he pleases!\' CHORUS. \'Wow! wow! wow!\' While the Duchess was sitting between them, fast asleep, and the game was going to be, from one foot to the Knave of Hearts, who only bowed and smiled in reply. \'Please come back again, and she felt that it was only the pepper that makes the matter on, What would become of you? I gave her answer. \'They\'re done with a T!\' said the Duchess; \'and the moral of that is--\"Oh, \'tis love, that makes them so shiny?\' Alice looked down into its nest. Alice crouched down among the branches, and every now and then, \'we went to school every day--\' \'I\'VE been to the Queen. \'Sentence first--verdict afterwards.\' \'Stuff and nonsense!\' said Alice more boldly: \'you know you\'re growing too.\' \'Yes, but some crumbs must have been changed several times since then.\' \'What do you know that Cheshire cats always grinned; in fact, I didn\'t know how to begin.\' He looked anxiously over his shoulder with.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 0, 'news/14.jpg', 1617, 'default', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(31, '4 Lời khuyên của Chuyên gia về Cách Chọn Ví Nam Phù hợp', 'Est omnis iusto quos sed aut ad sed. Est ut pariatur quia dolor aspernatur maxime et. Et quia non libero dolores et excepturi.', '<p>Alice think it so VERY much out of sight before the officer could get to the Queen. \'Can you play croquet with the clock. For instance, suppose it doesn\'t matter a bit,\' said the Dodo. Then they both cried. \'Wake up, Dormouse!\' And they pinched it on both sides of it, and they repeated their arguments to her, so she sat still just as the other.\' As soon as look at the Duchess by this very sudden change, but she gained courage as she heard one of the Gryphon, half to Alice. \'Only a thimble,\' said Alice indignantly, and she put her hand in her hands, and she tried the roots of trees, and I\'ve tried banks, and I\'ve tried hedges,\' the Pigeon in a hoarse growl, \'the world would go anywhere without a great hurry; \'and their names were Elsie, Lacie, and Tillie; and they lived at the March Hare moved into the open air. \'IF I don\'t know,\' he went on without attending to her, And mentioned me to him: She gave me a good opportunity for repeating his remark, with variations. \'I shall sit here,\'.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/3-540x360.jpg\"></p><p>Alice for some minutes. The Caterpillar and Alice thought she might find another key on it, or at any rate he might answer questions.--How am I then? Tell me that first, and then raised himself upon tiptoe, put his mouth close to her, still it was only sobbing,\' she thought, \'and hand round the neck of the Mock Turtle yawned and shut his note-book hastily. \'Consider your verdict,\' the King said to Alice; and Alice was not much like keeping so close to her full size by this time, and was just.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/7-540x360.jpg\"></p><p>Alice. \'But you\'re so easily offended!\' \'You\'ll get used up.\' \'But what am I to do this, so that they had at the top with its mouth open, gazing up into a tree. By the use of a sea of green leaves that lay far below her. \'What CAN all that green stuff be?\' said Alice. \'It goes on, you know,\' Alice gently remarked; \'they\'d have been a holiday?\' \'Of course it is,\' said the others. \'We must burn the house till she was exactly the right size to do with you. Mind now!\' The poor little thing sat down in a confused way, \'Prizes! Prizes!\' Alice had no pictures or conversations?\' So she sat on, with closed eyes, and half believed herself in Wonderland, though she knew the right way of speaking to it,\' she thought, \'it\'s sure to happen,\' she said to the Mock Turtle Soup is made from,\' said the Rabbit\'s voice along--\'Catch him, you by the way, was the first question, you know.\' Alice had begun to think that there was no longer to be afraid of them!\' \'And who is to France-- Then turn not pale.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/12-540x360.jpg\"></p><p>Gryphon replied very politely, \'for I never understood what it meant till now.\' \'If that\'s all I can reach the key; and if I only wish people knew that: then they both cried. \'Wake up, Dormouse!\' And they pinched it on both sides at once. The Dormouse had closed its eyes again, to see what this bottle was NOT marked \'poison,\' it is all the same, the next verse,\' the Gryphon replied rather impatiently: \'any shrimp could have told you that.\' \'If I\'d been the whiting,\' said the Gryphon: and it was as much right,\' said the Gryphon, \'you first form into a pig,\' Alice quietly said, just as if he would deny it too: but the Hatter went on, \'What\'s your name, child?\' \'My name is Alice, so please your Majesty,\' he began, \'for bringing these in: but I don\'t want YOU with us!\"\' \'They were obliged to have got into the court, without even waiting to put his shoes off. \'Give your evidence,\' said the Footman. \'That\'s the most important piece of evidence we\'ve heard yet,\' said the White Rabbit; \'in.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 0, 'news/15.jpg', 1656, 'default', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(32, 'Sexy Clutches: Cách Mua & Đeo Túi Clutch Thiết kế', 'Exercitationem exercitationem saepe et aut doloribus et quia. Nam in ut facilis tempora et perferendis id. Facere qui laboriosam earum quam ipsum deserunt quibusdam.', '<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>And the Gryphon answered, very nearly carried it out again, so violently, that she was holding, and she could do to hold it. As soon as look at me like that!\' He got behind him, and said anxiously to herself, and once again the tiny hands were clasped upon her face. \'Wake up, Alice dear!\' said her sister; \'Why, what a long silence after this, and Alice was very provoking to find it out, we should all have our heads cut off, you know. Which shall sing?\' \'Oh, YOU sing,\' said the youth, \'and your jaws are too weak For anything tougher than suet; Yet you turned a back-somersault in at once.\' However, she soon found an opportunity of adding, \'You\'re looking for the rest of the same as they all crowded round it, panting, and asking, \'But who has won?\' This question the Dodo in an impatient tone: \'explanations take such a curious plan!\' exclaimed Alice. \'That\'s the first question, you know.\' Alice had got its head down, and nobody spoke for some time busily writing in his note-book, cackled.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/1-540x360.jpg\"></p><p>I hadn\'t quite finished my tea when I get SOMEWHERE,\' Alice added as an explanation. \'Oh, you\'re sure to make out at all a proper way of expressing yourself.\' The baby grunted again, and that\'s very like having a game of play with a great many more than that, if you wouldn\'t have come here.\' Alice didn\'t think that proved it at last, and they walked off together. Alice laughed so much contradicted in her hand, watching the setting sun, and thinking of little birds and beasts, as well as she.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/7-540x360.jpg\"></p><p>Alice\'s, and they can\'t prove I did: there\'s no harm in trying.\' So she set to work shaking him and punching him in the way out of its right ear and left foot, so as to go on. \'And so these three weeks!\' \'I\'m very sorry you\'ve been annoyed,\' said Alice, who always took a great hurry; \'this paper has just been reading about; and when she went on in a loud, indignant voice, but she did not come the same thing with you,\' said the King. \'Then it doesn\'t understand English,\' thought Alice; \'I daresay it\'s a French mouse, come over with William the Conqueror.\' (For, with all their simple sorrows, and find a number of changes she had finished, her sister sat still and said \'That\'s very curious!\' she thought. \'But everything\'s curious today. I think you\'d take a fancy to herself as she could, for the end of the e--e--evening, Beautiful, beautiful Soup!\' CHAPTER XI. Who Stole the Tarts? The King looked anxiously at the cook, and a Canary called out as loud as she could. \'The game\'s going on.</p><p class=\"text-center\"><img src=\"http://botble.local/storage/news/11-540x360.jpg\"></p><p>Alice ventured to remark. \'Tut, tut, child!\' said the Caterpillar. \'Not QUITE right, I\'m afraid,\' said Alice, \'how am I to do?\' said Alice. \'Off with his tea spoon at the end of the lefthand bit. * * * * * \'What a pity it wouldn\'t stay!\' sighed the Hatter. \'Nor I,\' said the youth, \'and your jaws are too weak For anything tougher than suet; Yet you balanced an eel on the glass table as before, \'and things are worse than ever,\' thought the whole court was in livery: otherwise, judging by his garden, and marked, with one eye, How the Owl had the door began sneezing all at once. \'Give your evidence,\' said the Lory hastily. \'I thought you did,\' said the Hatter: \'I\'m on the stairs. Alice knew it was empty: she did not at all the rats and--oh dear!\' cried Alice hastily, afraid that it was neither more nor less than no time to wash the things being alive; for instance, there\'s the arch I\'ve got to?\' (Alice had no pictures or conversations?\' So she was as much as she heard a little bird as.</p>', 'published', 1, 'Botble\\Member\\Models\\Member', 0, 'news/16.jpg', 1829, 'video', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(33, 'This is name of demo Post', 'This is des of demo Post', '<h1>Content nè</h1><p>Alo</p><h1><strong>Chữ hoa</strong>Content nè</h1><p>Alo</p><h1><strong>Chữ hoa</strong>Content nè</h1><p>Alo</p><h1><strong>Chữ hoa</strong>Content nè</h1><p>Alo</p><h1><strong>Chữ hoa</strong></h1><h1>Content nè</h1><p>Alo</p><p><strong>Chữ hoa</strong></p>', 'pending', 21, 'Botble\\Member\\Models\\Member', 0, 'news/33.jpg', 0, 'default', '2021-12-11 12:38:40', '2021-12-11 12:38:40'),
(34, 'This is name of demo Post', 'This is des of demo Post', '<h1>Content nè</h1><p>Alo</p><h1><strong>Chữ hoa</strong>Content nè</h1><p>Alo</p><h1><strong>Chữ hoa</strong>Content nè</h1><p>Alo</p><h1><strong>Chữ hoa</strong>Content nè</h1><p>Alo</p><h1><strong>Chữ hoa</strong></h1><h1>Content nè</h1><p>Alo</p><p><strong>Chữ hoa</strong></p>', 'pending', 21, 'Botble\\Member\\Models\\Member', 0, 'news/34.jpg', 0, 'default', '2021-12-11 12:42:22', '2021-12-11 12:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `category_id`, `post_id`) VALUES
(3, 4, 2),
(4, 5, 2),
(5, 2, 3),
(6, 6, 3),
(7, 4, 4),
(8, 5, 4),
(9, 2, 5),
(10, 7, 5),
(11, 2, 6),
(12, 7, 6),
(13, 1, 7),
(14, 7, 7),
(15, 2, 8),
(16, 7, 8),
(17, 2, 9),
(18, 5, 9),
(19, 2, 10),
(20, 6, 10),
(21, 1, 11),
(22, 6, 11),
(23, 4, 12),
(24, 5, 12),
(25, 1, 13),
(26, 7, 13),
(27, 1, 14),
(28, 6, 14),
(29, 2, 15),
(30, 6, 15),
(31, 4, 16),
(32, 5, 16),
(33, 10, 17),
(34, 13, 17),
(35, 8, 18),
(36, 14, 18),
(37, 10, 19),
(38, 13, 19),
(39, 11, 20),
(40, 14, 20),
(41, 9, 21),
(42, 13, 21),
(43, 8, 22),
(44, 13, 22),
(45, 10, 23),
(46, 12, 23),
(47, 8, 24),
(48, 13, 24),
(49, 10, 25),
(50, 14, 25),
(51, 9, 26),
(52, 13, 26),
(53, 8, 27),
(54, 13, 27),
(55, 8, 28),
(56, 14, 28),
(57, 11, 29),
(58, 14, 29),
(59, 10, 30),
(60, 13, 30),
(61, 11, 31),
(62, 13, 31),
(63, 11, 32),
(64, 12, 32),
(65, 2, 34),
(72, 1, 1),
(73, 2, 1),
(74, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_comment_ratings`
--

CREATE TABLE `post_comment_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `star_rating` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `author_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_comment_ratings`
--

INSERT INTO `post_comment_ratings` (`id`, `text_content`, `star_rating`, `post_id`, `author_id`, `author_type`, `created_at`, `updated_at`) VALUES
(1, 'This is test comment Post', 4, 1, 3, 'member', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `tag_id`, `post_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 1, 2),
(7, 2, 2),
(8, 3, 2),
(9, 4, 2),
(10, 5, 2),
(11, 1, 3),
(12, 2, 3),
(13, 3, 3),
(14, 4, 3),
(15, 5, 3),
(16, 1, 4),
(17, 2, 4),
(18, 3, 4),
(19, 4, 4),
(20, 5, 4),
(21, 1, 5),
(22, 2, 5),
(23, 3, 5),
(24, 4, 5),
(25, 5, 5),
(26, 1, 6),
(27, 2, 6),
(28, 3, 6),
(29, 4, 6),
(30, 5, 6),
(31, 1, 7),
(32, 2, 7),
(33, 3, 7),
(34, 4, 7),
(35, 5, 7),
(36, 1, 8),
(37, 2, 8),
(38, 3, 8),
(39, 4, 8),
(40, 5, 8),
(41, 1, 9),
(42, 2, 9),
(43, 3, 9),
(44, 4, 9),
(45, 5, 9),
(46, 1, 10),
(47, 2, 10),
(48, 3, 10),
(49, 4, 10),
(50, 5, 10),
(51, 1, 11),
(52, 2, 11),
(53, 3, 11),
(54, 4, 11),
(55, 5, 11),
(56, 1, 12),
(57, 2, 12),
(58, 3, 12),
(59, 4, 12),
(60, 5, 12),
(61, 1, 13),
(62, 2, 13),
(63, 3, 13),
(64, 4, 13),
(65, 5, 13),
(66, 1, 14),
(67, 2, 14),
(68, 3, 14),
(69, 4, 14),
(70, 5, 14),
(71, 1, 15),
(72, 2, 15),
(73, 3, 15),
(74, 4, 15),
(75, 5, 15),
(76, 1, 16),
(77, 2, 16),
(78, 3, 16),
(79, 4, 16),
(80, 5, 16),
(81, 6, 17),
(82, 7, 17),
(83, 8, 17),
(84, 9, 17),
(85, 10, 17),
(86, 6, 18),
(87, 7, 18),
(88, 8, 18),
(89, 9, 18),
(90, 10, 18),
(91, 6, 19),
(92, 7, 19),
(93, 8, 19),
(94, 9, 19),
(95, 10, 19),
(96, 6, 20),
(97, 7, 20),
(98, 8, 20),
(99, 9, 20),
(100, 10, 20),
(101, 6, 21),
(102, 7, 21),
(103, 8, 21),
(104, 9, 21),
(105, 10, 21),
(106, 6, 22),
(107, 7, 22),
(108, 8, 22),
(109, 9, 22),
(110, 10, 22),
(111, 6, 23),
(112, 7, 23),
(113, 8, 23),
(114, 9, 23),
(115, 10, 23),
(116, 6, 24),
(117, 7, 24),
(118, 8, 24),
(119, 9, 24),
(120, 10, 24),
(121, 6, 25),
(122, 7, 25),
(123, 8, 25),
(124, 9, 25),
(125, 10, 25),
(126, 6, 26),
(127, 7, 26),
(128, 8, 26),
(129, 9, 26),
(130, 10, 26),
(131, 6, 27),
(132, 7, 27),
(133, 8, 27),
(134, 9, 27),
(135, 10, 27),
(136, 6, 28),
(137, 7, 28),
(138, 8, 28),
(139, 9, 28),
(140, 10, 28),
(141, 6, 29),
(142, 7, 29),
(143, 8, 29),
(144, 9, 29),
(145, 10, 29),
(146, 6, 30),
(147, 7, 30),
(148, 8, 30),
(149, 9, 30),
(150, 10, 30),
(151, 6, 31),
(152, 7, 31),
(153, 8, 31),
(154, 9, 31),
(155, 10, 31),
(156, 6, 32),
(157, 7, 32),
(158, 8, 32),
(159, 9, 32),
(160, 10, 32);

-- --------------------------------------------------------

--
-- Table structure for table `request_logs`
--

CREATE TABLE `request_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_code` int(11) DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_logs`
--

INSERT INTO `request_logs` (`id`, `status_code`, `url`, `count`, `user_id`, `referrer`, `created_at`, `updated_at`) VALUES
(1, 404, 'http://127.0.0.1:8000/api/v1/login', 1, NULL, NULL, '2021-10-11 11:26:35', '2021-10-11 11:26:35'),
(2, 404, 'http://127.0.0.1:8000/api/v1/\'member-login', 1, NULL, NULL, '2021-10-11 11:46:50', '2021-10-11 11:46:50'),
(3, 404, 'http://127.0.0.1:8000/api/v1/member-verify-mail?email_verify_token=%242y%2410%24lO4wZ.2UaM.NxZXN4Nny8Oqdadxo2Gm0ifU5TL7p...', 1, NULL, NULL, '2021-10-11 16:16:10', '2021-10-11 16:16:10'),
(4, 404, 'http://127.0.0.1:8000/api/v1/member-verify-mail?email_verify_token=%242y%2410%24UucMvmAopLPhRbSxVG6xreBhjk1pO.UL8fTC2U.X...', 3, NULL, NULL, '2021-10-11 16:21:12', '2021-10-11 16:54:57'),
(5, 404, 'http://127.0.0.1:8000/news/1.jpg', 1, NULL, NULL, '2021-10-13 09:51:59', '2021-10-13 09:51:59'),
(6, 404, 'http://127.0.0.1:8000/index.php/vendor/core/core/base/images/logo_white.png', 1, NULL, NULL, '2021-10-13 09:52:37', '2021-10-13 09:52:37'),
(7, 404, 'http://127.0.0.1:8000/storage/members/member_19.jpg', 1, NULL, NULL, '2021-10-13 14:27:34', '2021-10-13 14:27:34'),
(8, 404, 'http://localhost/project/Web1-BE', 1, NULL, NULL, '2021-10-16 00:51:57', '2021-10-16 00:51:57'),
(9, 404, 'http://localhost/project/Web1-BE/public/api/v1/member-login', 1, NULL, NULL, '2021-10-16 01:00:43', '2021-10-16 01:00:43'),
(10, 404, 'http://chuyen-de-phat-trien-web.local/api/v1/member-login', 1, NULL, NULL, '2021-11-14 00:54:27', '2021-11-14 00:54:27'),
(11, 404, 'http://127.0.0.1:8000/storage/%22http://chuyen-de-phat-trien-web.local/storage/members/member.png', 12, NULL, NULL, '2021-12-04 18:18:13', '2021-12-11 21:13:18'),
(12, 404, 'http://chuyen-de-phat-trien-web.local/api/v1/member-logout', 1, NULL, NULL, '2021-12-10 00:38:00', '2021-12-10 00:38:00'),
(13, 404, 'http://127.0.0.1:8000/storage/http://chuyen-de-phat-trien-web.local/storage/members/member.png', 11, NULL, NULL, '2021-12-11 12:35:37', '2021-12-11 22:35:20'),
(14, 404, 'http://chuyen-de-phat-trien-web.local/storage/members/member.png', 16, NULL, NULL, '2021-12-11 12:36:36', '2021-12-11 22:37:54'),
(15, 404, 'http://chuyen-de-phat-trien-web.local/api/v1/get-list-post-member', 3, NULL, NULL, '2021-12-11 21:19:43', '2021-12-11 22:18:26'),
(16, 404, 'http://chuyen-de-phat-trien-web.local/api/v1/get-list-post-member-filter', 1, NULL, NULL, '2021-12-11 21:25:50', '2021-12-11 21:25:50'),
(17, 404, 'http://127.0.0.1:8000/storage/%22http://chuyen-de-phat-trien-web.local/storage/members/member-1.png', 1, NULL, NULL, '2021-12-11 22:28:59', '2021-12-11 22:28:59'),
(18, 404, 'http://127.0.0.1:8000/storage/%22http://chuyen-de-phat-trien-web.local/storage/members/member.png%22http://chuyen-de-pha...', 8, NULL, NULL, '2021-12-11 22:29:01', '2021-12-11 22:35:23'),
(19, 404, 'http://chuyen-de-phat-trien-web.local/storage/members/member-1.png', 1, NULL, NULL, '2021-12-11 22:29:31', '2021-12-11 22:29:31'),
(20, 404, 'http://127.0.0.1:8000/storage/%22http://chuyen-de-phat-trien-web.local/storage/members/member-1.jpg', 1, NULL, NULL, '2021-12-11 22:31:23', '2021-12-11 22:31:23'),
(21, 404, 'http://127.0.0.1:8000/storage/storage/members/member-1.jpg', 1, NULL, NULL, '2021-12-11 22:34:45', '2021-12-11 22:34:45'),
(22, 404, 'http://127.0.0.1:8000/storage/members/member.jp', 1, NULL, NULL, '2021-12-11 22:36:35', '2021-12-11 22:36:35'),
(23, 404, 'http://127.0.0.1:8000/storage/http://chuyen-de-phat-trien-web.local/storage/members/member-21.jpg', 12, NULL, NULL, '2021-12-11 22:42:45', '2021-12-12 00:00:30'),
(24, 404, 'http://127.0.0.1:8000/storage/http://chuyen-de-phat-trien-web.local/storage/members/member-5.jpg', 9, NULL, NULL, '2021-12-11 22:42:46', '2021-12-12 00:00:27'),
(25, 404, 'http://127.0.0.1:8000/storage/http://chuyen-de-phat-trien-web.local/storage/members/member-1.jpg', 9, NULL, NULL, '2021-12-11 22:42:47', '2021-12-12 00:00:29'),
(26, 404, 'http://127.0.0.1:8000/storage/http://chuyen-de-phat-trien-web.local/storage/members/member-6.jpg', 9, NULL, NULL, '2021-12-11 22:42:48', '2021-12-12 00:00:28'),
(27, 404, 'http://127.0.0.1:8000/storage/http://chuyen-de-phat-trien-web.local/storage/members/member-3.jpg', 1, NULL, NULL, '2021-12-11 22:45:59', '2021-12-11 22:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `revisions`
--

CREATE TABLE `revisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `revisionable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisionable_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revisions`
--

INSERT INTO `revisions` (`id`, `revisionable_type`, `revisionable_id`, `user_id`, `key`, `old_value`, `new_value`, `created_at`, `updated_at`) VALUES
(1, 'Botble\\Blog\\Models\\Post', 33, 21, 'image', NULL, 'news/33.jpg', '2021-12-11 12:38:40', '2021-12-11 12:38:40'),
(2, 'Botble\\Blog\\Models\\Post', 34, 21, 'image', NULL, 'news/34.jpg', '2021-12-11 12:42:22', '2021-12-11 12:42:22'),
(3, 'Botble\\Blog\\Models\\Post', 1, 21, 'name', 'The Top 2020 Handbag Trends to Know', 'Name', '2021-12-11 12:59:50', '2021-12-11 12:59:50'),
(4, 'Botble\\Blog\\Models\\Post', 1, 21, 'description', 'Sit distinctio eius dolor vitae placeat officia consequatur numquam. Excepturi expedita modi adipisci qui dolor aut. Voluptas aliquam numquam perferendis dignissimos cupiditate sunt.', 'DesC', '2021-12-11 12:59:50', '2021-12-11 12:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(2, 'activated_plugins', '[\"analytics\",\"audit-log\",\"backup\",\"block\",\"blog\",\"captcha\",\"contact\",\"cookie-consent\",\"custom-field\",\"gallery\",\"language\",\"member\",\"request-log\",\"social-login\",\"translation\"]', NULL, NULL),
(3, 'language_hide_default', '1', NULL, NULL),
(4, 'language_switcher_display', 'list', NULL, NULL),
(5, 'language_display', 'all', NULL, NULL),
(6, 'language_hide_languages', '[]', NULL, NULL),
(7, 'show_admin_bar', '1', NULL, NULL),
(8, 'theme', 'ripple', NULL, NULL),
(9, 'theme-ripple-site_title', 'Just another Botble CMS site', NULL, NULL),
(10, 'theme-ripple-copyright', '©2021 Botble Technologies. All right reserved.', NULL, NULL),
(11, 'theme-ripple-favicon', 'general/favicon.png', NULL, NULL),
(12, 'theme-ripple-website', 'https://botble.com', NULL, NULL),
(13, 'theme-ripple-contact_email', 'support@botble.com', NULL, NULL),
(14, 'theme-ripple-site_description', 'With experience, we make sure to get every project done very fast and in time with high quality using our Botble CMS https://1.envato.market/LWRBY', NULL, NULL),
(15, 'theme-ripple-phone', '+(123) 345-6789', NULL, NULL),
(16, 'theme-ripple-address', '214 West Arnold St. New York, NY 10002', NULL, NULL),
(17, 'theme-ripple-facebook', 'https://facebook.com', NULL, NULL),
(18, 'theme-ripple-twitter', 'https://twitter.com', NULL, NULL),
(19, 'theme-ripple-youtube', 'https://youtube.com', NULL, NULL),
(20, 'theme-ripple-cookie_consent_message', 'Your experience on this site will be improved by allowing cookies ', NULL, NULL),
(21, 'theme-ripple-cookie_consent_learn_more_url', 'http://botble.local/cookie-policy', NULL, NULL),
(22, 'theme-ripple-cookie_consent_learn_more_text', 'Cookie Policy', NULL, NULL),
(23, 'theme-ripple-homepage_id', '1', NULL, NULL),
(24, 'theme-ripple-blog_page_id', '2', NULL, NULL),
(25, 'theme-ripple-logo', 'general/logo.png', NULL, NULL),
(26, 'theme-ripple-vi-site_title', 'Một trang web sử dụng Botble CMS', NULL, NULL),
(27, 'theme-ripple-vi-copyright', '©2021 Botble Technologies. Tất cả quyền đã được bảo hộ.', NULL, NULL),
(28, 'theme-ripple-vi-favicon', 'general/favicon.png', NULL, NULL),
(29, 'theme-ripple-vi-website', 'https://botble.com', NULL, NULL),
(30, 'theme-ripple-vi-contact_email', 'support@botble.com', NULL, NULL),
(31, 'theme-ripple-vi-site_description', 'Với kinh nghiệm dồi dào, chúng tôi đảm bảo hoàn thành mọi dự án rất nhanh và đúng thời gian với chất lượng cao sử dụng Botble CMS của chúng tôi https://1.envato.market/LWRBY', NULL, NULL),
(32, 'theme-ripple-vi-phone', '+(123) 345-6789', NULL, NULL),
(33, 'theme-ripple-vi-address', '214 West Arnold St. New York, NY 10002', NULL, NULL),
(34, 'theme-ripple-vi-facebook', 'https://facebook.com', NULL, NULL),
(35, 'theme-ripple-vi-twitter', 'https://twitter.com', NULL, NULL),
(36, 'theme-ripple-vi-youtube', 'https://youtube.com', NULL, NULL),
(37, 'theme-ripple-vi-cookie_consent_message', 'Trải nghiệm của bạn trên trang web này sẽ được cải thiện bằng cách cho phép cookie ', NULL, NULL),
(38, 'theme-ripple-vi-cookie_consent_learn_more_url', 'http://botble.local/cookie-policy', NULL, NULL),
(39, 'theme-ripple-vi-cookie_consent_learn_more_text', 'Cookie Policy', NULL, NULL),
(40, 'theme-ripple-vi-homepage_id', '5', NULL, NULL),
(41, 'theme-ripple-vi-blog_page_id', '6', NULL, NULL),
(42, 'theme-ripple-vi-logo', 'general/logo.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slugs`
--

CREATE TABLE `slugs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` int(10) UNSIGNED NOT NULL,
  `reference_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slugs`
--

INSERT INTO `slugs` (`id`, `key`, `reference_id`, `reference_type`, `prefix`, `created_at`, `updated_at`) VALUES
(1, 'homepage', 1, 'Botble\\Page\\Models\\Page', '', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(2, 'blog', 2, 'Botble\\Page\\Models\\Page', '', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(3, 'contact', 3, 'Botble\\Page\\Models\\Page', '', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(4, 'cookie-policy', 4, 'Botble\\Page\\Models\\Page', '', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(5, 'trang-chu', 5, 'Botble\\Page\\Models\\Page', '', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(6, 'tin-tuc', 6, 'Botble\\Page\\Models\\Page', '', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(7, 'lien-he', 7, 'Botble\\Page\\Models\\Page', '', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(8, 'cookie-policy', 8, 'Botble\\Page\\Models\\Page', '', '2021-04-06 23:41:03', '2021-04-06 23:41:03'),
(9, 'perfect', 1, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(10, 'new-day', 2, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(11, 'happy-day', 3, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(12, 'nature', 4, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(13, 'morning', 5, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(14, 'photography', 6, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(15, 'hoan-hao', 7, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(16, 'ngay-moi', 8, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(17, 'ngay-hanh-phuc', 9, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(18, 'thien-nhien', 10, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(19, 'buoi-sang', 11, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(20, 'nghe-thuat', 12, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(21, 'uncategorized', 1, 'Botble\\Blog\\Models\\Category', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(22, 'events', 2, 'Botble\\Blog\\Models\\Category', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(23, 'projects', 3, 'Botble\\Blog\\Models\\Category', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(24, 'business', 4, 'Botble\\Blog\\Models\\Category', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(25, 'portfolio', 5, 'Botble\\Blog\\Models\\Category', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(26, 'news-updates', 6, 'Botble\\Blog\\Models\\Category', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(27, 'resources', 7, 'Botble\\Blog\\Models\\Category', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(28, 'khong-phan-loai', 8, 'Botble\\Blog\\Models\\Category', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(29, 'su-kien', 9, 'Botble\\Blog\\Models\\Category', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(30, 'du-an', 10, 'Botble\\Blog\\Models\\Category', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(31, 'doanh-nghiep', 11, 'Botble\\Blog\\Models\\Category', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(32, 'dau-tu', 12, 'Botble\\Blog\\Models\\Category', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(33, 'tin-tuc-cap-nhat', 13, 'Botble\\Blog\\Models\\Category', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(34, 'tai-nguyen', 14, 'Botble\\Blog\\Models\\Category', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(35, 'general', 1, 'Botble\\Blog\\Models\\Tag', 'tag', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(36, 'design', 2, 'Botble\\Blog\\Models\\Tag', 'tag', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(37, 'fashion', 3, 'Botble\\Blog\\Models\\Tag', 'tag', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(38, 'branding', 4, 'Botble\\Blog\\Models\\Tag', 'tag', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(39, 'modern', 5, 'Botble\\Blog\\Models\\Tag', 'tag', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(40, 'chung', 6, 'Botble\\Blog\\Models\\Tag', 'tag', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(41, 'thiet-ke', 7, 'Botble\\Blog\\Models\\Tag', 'tag', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(42, 'thoi-trang', 8, 'Botble\\Blog\\Models\\Tag', 'tag', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(43, 'thuong-hieu', 9, 'Botble\\Blog\\Models\\Tag', 'tag', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(44, 'hien-dai', 10, 'Botble\\Blog\\Models\\Tag', 'tag', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(45, 'the-top-2020-handbag-trends-to-know', 1, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(46, 'top-search-engine-optimization-strategies', 2, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(47, 'which-company-would-you-choose', 3, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(48, 'used-car-dealer-sales-tricks-exposed', 4, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(49, '20-ways-to-sell-your-product-faster', 5, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(50, 'the-secrets-of-rich-and-famous-writers', 6, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(51, 'imagine-losing-20-pounds-in-14-days', 7, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(52, 'are-you-still-using-that-slow-old-typewriter', 8, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(53, 'a-skin-cream-thats-proven-to-work', 9, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(54, '10-reasons-to-start-your-own-profitable-website', 10, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(55, 'simple-ways-to-reduce-your-unwanted-wrinkles', 11, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(56, 'apple-imac-with-retina-5k-display-review', 12, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(57, '10000-web-site-visitors-in-one-monthguaranteed', 13, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(58, 'unlock-the-secrets-of-selling-high-ticket-items', 14, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(59, '4-expert-tips-on-how-to-choose-the-right-mens-wallet', 15, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(60, 'sexy-clutches-how-to-buy-wear-a-designer-clutch-bag', 16, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(61, 'xu-huong-tui-xach-hang-dau-nam-2020-can-biet', 17, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(62, 'cac-chien-luoc-toi-uu-hoa-cong-cu-tim-kiem-hang-dau', 18, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(63, 'ban-se-chon-cong-ty-nao', 19, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(64, 'lo-ra-cac-thu-doan-ban-hang-cua-dai-ly-o-to-da-qua-su-dung', 20, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(65, '20-cach-ban-san-pham-nhanh-hon', 21, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(66, 'bi-mat-cua-nhung-nha-van-giau-co-va-noi-tieng', 22, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(67, 'hay-tuong-tuong-ban-giam-20-bang-anh-trong-14-ngay', 23, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(68, 'ban-van-dang-su-dung-may-danh-chu-cu-cham-do', 24, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(69, 'mot-loai-kem-duong-da-da-duoc-chung-minh-hieu-qua', 25, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(70, '10-ly-do-de-bat-dau-trang-web-co-loi-nhuan-cua-rieng-ban', 26, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(71, 'nhung-cach-don-gian-de-giam-nep-nhan-khong-mong-muon-cua-ban', 27, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(72, 'danh-gia-apple-imac-voi-man-hinh-retina-5k', 28, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(73, '10000-khach-truy-cap-trang-web-trong-mot-thang-duoc-dam-bao', 29, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(74, 'mo-khoa-bi-mat-ban-duoc-ve-cao', 30, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(75, '4-loi-khuyen-cua-chuyen-gia-ve-cach-chon-vi-nam-phu-hop', 31, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13'),
(76, 'sexy-clutches-cach-mua-deo-tui-clutch-thiet-ke', 32, 'Botble\\Blog\\Models\\Post', '', '2021-04-06 23:41:13', '2021-04-06 23:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `author_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Botble\\ACL\\Models\\User',
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `author_id`, `author_type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'General', 1, 'Botble\\ACL\\Models\\User', '', 'published', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(2, 'Design', 1, 'Botble\\ACL\\Models\\User', '', 'published', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(3, 'Fashion', 1, 'Botble\\ACL\\Models\\User', '', 'published', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(4, 'Branding', 1, 'Botble\\ACL\\Models\\User', '', 'published', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(5, 'Modern', 1, 'Botble\\ACL\\Models\\User', '', 'published', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(6, 'Chung', 1, 'Botble\\ACL\\Models\\User', '', 'published', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(7, 'Thiết kế', 1, 'Botble\\ACL\\Models\\User', '', 'published', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(8, 'Thời trang', 1, 'Botble\\ACL\\Models\\User', '', 'published', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(9, 'Thương hiệu', 1, 'Botble\\ACL\\Models\\User', '', 'published', '2021-04-06 23:41:12', '2021-04-06 23:41:12'),
(10, 'Hiện đại', 1, 'Botble\\ACL\\Models\\User', '', 'published', '2021-04-06 23:41:12', '2021-04-06 23:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'auth', 'failed', 'These credentials do not match our records.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(2, 1, 'en', 'auth', 'password', 'The provided password is incorrect.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(3, 1, 'en', 'auth', 'throttle', 'Too many login attempts. Please try again in :seconds seconds.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(4, 1, 'en', 'pagination', 'previous', '&laquo; Previous', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(5, 1, 'en', 'pagination', 'next', 'Next &raquo;', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(6, 1, 'en', 'passwords', 'reset', 'Your password has been reset!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(7, 1, 'en', 'passwords', 'sent', 'We have emailed your password reset link!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(8, 1, 'en', 'passwords', 'throttled', 'Please wait before retrying.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(9, 1, 'en', 'passwords', 'token', 'This password reset token is invalid.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(10, 1, 'en', 'passwords', 'user', 'We can\'t find a user with that email address.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(11, 1, 'en', 'validation', 'accepted', 'The :attribute must be accepted.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(12, 1, 'en', 'validation', 'active_url', 'The :attribute is not a valid URL.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(13, 1, 'en', 'validation', 'after', 'The :attribute must be a date after :date.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(14, 1, 'en', 'validation', 'after_or_equal', 'The :attribute must be a date after or equal to :date.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(15, 1, 'en', 'validation', 'alpha', 'The :attribute must only contain letters.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(16, 1, 'en', 'validation', 'alpha_dash', 'The :attribute must only contain letters, numbers, dashes and underscores.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(17, 1, 'en', 'validation', 'alpha_num', 'The :attribute must only contain letters and numbers.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(18, 1, 'en', 'validation', 'array', 'The :attribute must be an array.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(19, 1, 'en', 'validation', 'before', 'The :attribute must be a date before :date.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(20, 1, 'en', 'validation', 'before_or_equal', 'The :attribute must be a date before or equal to :date.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(21, 1, 'en', 'validation', 'between.numeric', 'The :attribute must be between :min and :max.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(22, 1, 'en', 'validation', 'between.file', 'The :attribute must be between :min and :max kilobytes.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(23, 1, 'en', 'validation', 'between.string', 'The :attribute must be between :min and :max characters.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(24, 1, 'en', 'validation', 'between.array', 'The :attribute must have between :min and :max items.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(25, 1, 'en', 'validation', 'boolean', 'The :attribute field must be true or false.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(26, 1, 'en', 'validation', 'confirmed', 'The :attribute confirmation does not match.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(27, 1, 'en', 'validation', 'current_password', 'The password is incorrect.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(28, 1, 'en', 'validation', 'date', 'The :attribute is not a valid date.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(29, 1, 'en', 'validation', 'date_equals', 'The :attribute must be a date equal to :date.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(30, 1, 'en', 'validation', 'date_format', 'The :attribute does not match the format :format.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(31, 1, 'en', 'validation', 'different', 'The :attribute and :other must be different.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(32, 1, 'en', 'validation', 'digits', 'The :attribute must be :digits digits.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(33, 1, 'en', 'validation', 'digits_between', 'The :attribute must be between :min and :max digits.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(34, 1, 'en', 'validation', 'dimensions', 'The :attribute has invalid image dimensions.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(35, 1, 'en', 'validation', 'distinct', 'The :attribute field has a duplicate value.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(36, 1, 'en', 'validation', 'email', 'The :attribute must be a valid email address.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(37, 1, 'en', 'validation', 'ends_with', 'The :attribute must end with one of the following: :values.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(38, 1, 'en', 'validation', 'exists', 'The selected :attribute is invalid.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(39, 1, 'en', 'validation', 'file', 'The :attribute must be a file.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(40, 1, 'en', 'validation', 'filled', 'The :attribute field must have a value.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(41, 1, 'en', 'validation', 'gt.numeric', 'The :attribute must be greater than :value.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(42, 1, 'en', 'validation', 'gt.file', 'The :attribute must be greater than :value kilobytes.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(43, 1, 'en', 'validation', 'gt.string', 'The :attribute must be greater than :value characters.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(44, 1, 'en', 'validation', 'gt.array', 'The :attribute must have more than :value items.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(45, 1, 'en', 'validation', 'gte.numeric', 'The :attribute must be greater than or equal :value.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(46, 1, 'en', 'validation', 'gte.file', 'The :attribute must be greater than or equal :value kilobytes.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(47, 1, 'en', 'validation', 'gte.string', 'The :attribute must be greater than or equal :value characters.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(48, 1, 'en', 'validation', 'gte.array', 'The :attribute must have :value items or more.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(49, 1, 'en', 'validation', 'image', 'The :attribute must be an image.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(50, 1, 'en', 'validation', 'in', 'The selected :attribute is invalid.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(51, 1, 'en', 'validation', 'in_array', 'The :attribute field does not exist in :other.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(52, 1, 'en', 'validation', 'integer', 'The :attribute must be an integer.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(53, 1, 'en', 'validation', 'ip', 'The :attribute must be a valid IP address.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(54, 1, 'en', 'validation', 'ipv4', 'The :attribute must be a valid IPv4 address.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(55, 1, 'en', 'validation', 'ipv6', 'The :attribute must be a valid IPv6 address.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(56, 1, 'en', 'validation', 'json', 'The :attribute must be a valid JSON string.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(57, 1, 'en', 'validation', 'lt.numeric', 'The :attribute must be less than :value.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(58, 1, 'en', 'validation', 'lt.file', 'The :attribute must be less than :value kilobytes.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(59, 1, 'en', 'validation', 'lt.string', 'The :attribute must be less than :value characters.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(60, 1, 'en', 'validation', 'lt.array', 'The :attribute must have less than :value items.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(61, 1, 'en', 'validation', 'lte.numeric', 'The :attribute must be less than or equal :value.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(62, 1, 'en', 'validation', 'lte.file', 'The :attribute must be less than or equal :value kilobytes.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(63, 1, 'en', 'validation', 'lte.string', 'The :attribute must be less than or equal :value characters.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(64, 1, 'en', 'validation', 'lte.array', 'The :attribute must not have more than :value items.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(65, 1, 'en', 'validation', 'max.numeric', 'The :attribute must not be greater than :max.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(66, 1, 'en', 'validation', 'max.file', 'The :attribute must not be greater than :max kilobytes.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(67, 1, 'en', 'validation', 'max.string', 'The :attribute must not be greater than :max characters.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(68, 1, 'en', 'validation', 'max.array', 'The :attribute must not have more than :max items.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(69, 1, 'en', 'validation', 'mimes', 'The :attribute must be a file of type: :values.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(70, 1, 'en', 'validation', 'mimetypes', 'The :attribute must be a file of type: :values.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(71, 1, 'en', 'validation', 'min.numeric', 'The :attribute must be at least :min.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(72, 1, 'en', 'validation', 'min.file', 'The :attribute must be at least :min kilobytes.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(73, 1, 'en', 'validation', 'min.string', 'The :attribute must be at least :min characters.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(74, 1, 'en', 'validation', 'min.array', 'The :attribute must have at least :min items.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(75, 1, 'en', 'validation', 'multiple_of', 'The :attribute must be a multiple of :value.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(76, 1, 'en', 'validation', 'not_in', 'The selected :attribute is invalid.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(77, 1, 'en', 'validation', 'not_regex', 'The :attribute format is invalid.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(78, 1, 'en', 'validation', 'numeric', 'The :attribute must be a number.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(79, 1, 'en', 'validation', 'password', 'The password is incorrect.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(80, 1, 'en', 'validation', 'present', 'The :attribute field must be present.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(81, 1, 'en', 'validation', 'regex', 'The :attribute format is invalid.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(82, 1, 'en', 'validation', 'required', 'The :attribute field is required.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(83, 1, 'en', 'validation', 'required_if', 'The :attribute field is required when :other is :value.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(84, 1, 'en', 'validation', 'required_unless', 'The :attribute field is required unless :other is in :values.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(85, 1, 'en', 'validation', 'required_with', 'The :attribute field is required when :values is present.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(86, 1, 'en', 'validation', 'required_with_all', 'The :attribute field is required when :values are present.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(87, 1, 'en', 'validation', 'required_without', 'The :attribute field is required when :values is not present.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(88, 1, 'en', 'validation', 'required_without_all', 'The :attribute field is required when none of :values are present.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(89, 1, 'en', 'validation', 'prohibited', 'The :attribute field is prohibited.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(90, 1, 'en', 'validation', 'prohibited_if', 'The :attribute field is prohibited when :other is :value.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(91, 1, 'en', 'validation', 'prohibited_unless', 'The :attribute field is prohibited unless :other is in :values.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(92, 1, 'en', 'validation', 'same', 'The :attribute and :other must match.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(93, 1, 'en', 'validation', 'size.numeric', 'The :attribute must be :size.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(94, 1, 'en', 'validation', 'size.file', 'The :attribute must be :size kilobytes.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(95, 1, 'en', 'validation', 'size.string', 'The :attribute must be :size characters.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(96, 1, 'en', 'validation', 'size.array', 'The :attribute must contain :size items.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(97, 1, 'en', 'validation', 'starts_with', 'The :attribute must start with one of the following: :values.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(98, 1, 'en', 'validation', 'string', 'The :attribute must be a string.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(99, 1, 'en', 'validation', 'timezone', 'The :attribute must be a valid timezone.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(100, 1, 'en', 'validation', 'unique', 'The :attribute has already been taken.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(101, 1, 'en', 'validation', 'uploaded', 'The :attribute failed to upload.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(102, 1, 'en', 'validation', 'url', 'The :attribute must be a valid URL.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(103, 1, 'en', 'validation', 'uuid', 'The :attribute must be a valid UUID.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(104, 1, 'en', 'validation', 'custom.attribute-name.rule-name', 'custom-message', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(105, 1, 'en', 'core/acl/auth', 'login.username', 'Email/Username', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(106, 1, 'en', 'core/acl/auth', 'login.email', 'Email', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(107, 1, 'en', 'core/acl/auth', 'login.password', 'Password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(108, 1, 'en', 'core/acl/auth', 'login.title', 'User Login', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(109, 1, 'en', 'core/acl/auth', 'login.remember', 'Remember me?', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(110, 1, 'en', 'core/acl/auth', 'login.login', 'Sign in', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(111, 1, 'en', 'core/acl/auth', 'login.placeholder.username', 'Please enter your username', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(112, 1, 'en', 'core/acl/auth', 'login.placeholder.email', 'Please enter your email', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(113, 1, 'en', 'core/acl/auth', 'login.success', 'Login successfully!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(114, 1, 'en', 'core/acl/auth', 'login.fail', 'Wrong username or password.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(115, 1, 'en', 'core/acl/auth', 'login.not_active', 'Your account has not been activated yet!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(116, 1, 'en', 'core/acl/auth', 'login.banned', 'This account is banned.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(117, 1, 'en', 'core/acl/auth', 'login.logout_success', 'Logout successfully!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(118, 1, 'en', 'core/acl/auth', 'login.dont_have_account', 'You don\'t have account on this system, please contact administrator for more information!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(119, 1, 'en', 'core/acl/auth', 'forgot_password.title', 'Forgot Password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(120, 1, 'en', 'core/acl/auth', 'forgot_password.message', '<p>Have you forgotten your password?</p><p>Please enter your email account. System will send a email with active link to reset your password.</p>', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(121, 1, 'en', 'core/acl/auth', 'forgot_password.submit', 'Submit', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(122, 1, 'en', 'core/acl/auth', 'reset.new_password', 'New password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(123, 1, 'en', 'core/acl/auth', 'reset.password_confirmation', 'Confirm new password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(124, 1, 'en', 'core/acl/auth', 'reset.email', 'Email', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(125, 1, 'en', 'core/acl/auth', 'reset.title', 'Reset your password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(126, 1, 'en', 'core/acl/auth', 'reset.update', 'Update', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(127, 1, 'en', 'core/acl/auth', 'reset.wrong_token', 'This link is invalid or expired. Please try using reset form again.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(128, 1, 'en', 'core/acl/auth', 'reset.user_not_found', 'This username is not exist.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(129, 1, 'en', 'core/acl/auth', 'reset.success', 'Reset password successfully!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(130, 1, 'en', 'core/acl/auth', 'reset.fail', 'Token is invalid, the reset password link has been expired!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(131, 1, 'en', 'core/acl/auth', 'reset.reset.title', 'Email reset password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(132, 1, 'en', 'core/acl/auth', 'reset.send.success', 'A email was sent to your email account. Please check and complete this action.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(133, 1, 'en', 'core/acl/auth', 'reset.send.fail', 'Can not send email in this time. Please try again later.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(134, 1, 'en', 'core/acl/auth', 'reset.new-password', 'New password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(135, 1, 'en', 'core/acl/auth', 'email.reminder.title', 'Email reset password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(136, 1, 'en', 'core/acl/auth', 'password_confirmation', 'Password confirm', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(137, 1, 'en', 'core/acl/auth', 'failed', 'Failed', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(138, 1, 'en', 'core/acl/auth', 'throttle', 'Throttle', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(139, 1, 'en', 'core/acl/auth', 'not_member', 'Not a member yet?', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(140, 1, 'en', 'core/acl/auth', 'register_now', 'Register now', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(141, 1, 'en', 'core/acl/auth', 'lost_your_password', 'Lost your password?', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(142, 1, 'en', 'core/acl/auth', 'login_title', 'Admin', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(143, 1, 'en', 'core/acl/auth', 'login_via_social', 'Login with social networks', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(144, 1, 'en', 'core/acl/auth', 'back_to_login', 'Back to login page', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(145, 1, 'en', 'core/acl/auth', 'sign_in_below', 'Sign In Below', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(146, 1, 'en', 'core/acl/auth', 'languages', 'Languages', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(147, 1, 'en', 'core/acl/auth', 'reset_password', 'Reset Password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(148, 1, 'en', 'core/acl/permissions', 'notices.role_in_use', 'Cannot delete this role, it is still in use!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(149, 1, 'en', 'core/acl/permissions', 'notices.role_delete_belong_user', 'You are not able to delete this role; it belongs to someone else!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(150, 1, 'en', 'core/acl/permissions', 'notices.role_edit_belong_user', 'You are not able to edit this role; it belongs to someone else!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(151, 1, 'en', 'core/acl/permissions', 'notices.delete_global_role', 'You are not allowed to delete global roles!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(152, 1, 'en', 'core/acl/permissions', 'notices.delete_success', 'The selected role was deleted successfully!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(153, 1, 'en', 'core/acl/permissions', 'notices.modified_success', 'The selected role was modified successfully!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(154, 1, 'en', 'core/acl/permissions', 'notices.create_success', 'The new role was successfully created', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(155, 1, 'en', 'core/acl/permissions', 'notices.duplicated_success', 'The selected role was duplicated successfully', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(156, 1, 'en', 'core/acl/permissions', 'notices.no_select', 'Please select at least one record to take this action!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(157, 1, 'en', 'core/acl/permissions', 'notices.not_found', 'Role not found', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(158, 1, 'en', 'core/acl/permissions', 'name', 'Name', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(159, 1, 'en', 'core/acl/permissions', 'current_role', 'Current Role', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(160, 1, 'en', 'core/acl/permissions', 'no_role_assigned', 'No role assigned', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(161, 1, 'en', 'core/acl/permissions', 'role_assigned', 'Assigned Role', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(162, 1, 'en', 'core/acl/permissions', 'create_role', 'Create New Role', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(163, 1, 'en', 'core/acl/permissions', 'role_name', 'Name', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(164, 1, 'en', 'core/acl/permissions', 'role_description', 'Description', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(165, 1, 'en', 'core/acl/permissions', 'permission_flags', 'Permission Flags', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(166, 1, 'en', 'core/acl/permissions', 'cancel', 'Cancel', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(167, 1, 'en', 'core/acl/permissions', 'reset', 'Reset', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(168, 1, 'en', 'core/acl/permissions', 'save', 'Save', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(169, 1, 'en', 'core/acl/permissions', 'global_role_msg', 'This is a global role and cannot be modified.  You can use the Duplicate button to make a copy of this role that you can then modify.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(170, 1, 'en', 'core/acl/permissions', 'details', 'Details', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(171, 1, 'en', 'core/acl/permissions', 'duplicate', 'Duplicate', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(172, 1, 'en', 'core/acl/permissions', 'all', 'All Permissions', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(173, 1, 'en', 'core/acl/permissions', 'list_role', 'List Roles', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(174, 1, 'en', 'core/acl/permissions', 'created_on', 'Created On', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(175, 1, 'en', 'core/acl/permissions', 'created_by', 'Created By', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(176, 1, 'en', 'core/acl/permissions', 'actions', 'Actions', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(177, 1, 'en', 'core/acl/permissions', 'role_in_use', 'Cannot delete this role, it is still in use!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(178, 1, 'en', 'core/acl/permissions', 'role_delete_belong_user', 'You are not able to delete this role; it belongs to someone else!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(179, 1, 'en', 'core/acl/permissions', 'delete_global_role', 'Can not delete global role', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(180, 1, 'en', 'core/acl/permissions', 'delete_success', 'Delete role successfully', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(181, 1, 'en', 'core/acl/permissions', 'no_select', 'Please select at least one role to take this action!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(182, 1, 'en', 'core/acl/permissions', 'not_found', 'No role found!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(183, 1, 'en', 'core/acl/permissions', 'role_edit_belong_user', 'You are not able to edit this role; it belongs to someone else!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(184, 1, 'en', 'core/acl/permissions', 'modified_success', 'Modified successfully', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(185, 1, 'en', 'core/acl/permissions', 'create_success', 'Create successfully', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(186, 1, 'en', 'core/acl/permissions', 'duplicated_success', 'Duplicated successfully', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(187, 1, 'en', 'core/acl/permissions', 'options', 'Options', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(188, 1, 'en', 'core/acl/permissions', 'access_denied_message', 'You are not allowed to do this action', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(189, 1, 'en', 'core/acl/permissions', 'roles', 'Roles', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(190, 1, 'en', 'core/acl/permissions', 'role_permission', 'Roles and Permissions', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(191, 1, 'en', 'core/acl/permissions', 'user_management', 'User Management', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(192, 1, 'en', 'core/acl/permissions', 'super_user_management', 'Super User Management', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(193, 1, 'en', 'core/acl/permissions', 'action_unauthorized', 'This action is unauthorized.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(194, 1, 'en', 'core/acl/reminders', 'password', 'Passwords must be at least six characters and match the confirmation.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(195, 1, 'en', 'core/acl/reminders', 'user', 'We can\'t find a user with that e-mail address.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(196, 1, 'en', 'core/acl/reminders', 'token', 'This password reset token is invalid.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(197, 1, 'en', 'core/acl/reminders', 'sent', 'Password reminder sent!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(198, 1, 'en', 'core/acl/reminders', 'reset', 'Password has been reset!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(199, 1, 'en', 'core/acl/users', 'delete_user_logged_in', 'Can\'t delete this user. This user is logged on!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(200, 1, 'en', 'core/acl/users', 'no_select', 'Please select at least one record to take this action!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(201, 1, 'en', 'core/acl/users', 'lock_user_logged_in', 'Can\'t lock this user. This user is logged on!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(202, 1, 'en', 'core/acl/users', 'update_success', 'Update status successfully!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(203, 1, 'en', 'core/acl/users', 'save_setting_failed', 'Something went wrong when save your setting', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(204, 1, 'en', 'core/acl/users', 'not_found', 'User not found', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(205, 1, 'en', 'core/acl/users', 'email_exist', 'That email address already belongs to an existing account', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(206, 1, 'en', 'core/acl/users', 'username_exist', 'That username address already belongs to an existing account', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(207, 1, 'en', 'core/acl/users', 'update_profile_success', 'Your profile changes were successfully saved', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(208, 1, 'en', 'core/acl/users', 'password_update_success', 'Password successfully changed', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(209, 1, 'en', 'core/acl/users', 'current_password_not_valid', 'Current password is not valid', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(210, 1, 'en', 'core/acl/users', 'user_exist_in', 'User is already a member', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(211, 1, 'en', 'core/acl/users', 'email', 'Email', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(212, 1, 'en', 'core/acl/users', 'role', 'Role', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(213, 1, 'en', 'core/acl/users', 'username', 'Username', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(214, 1, 'en', 'core/acl/users', 'last_name', 'Last Name', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(215, 1, 'en', 'core/acl/users', 'first_name', 'First Name', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(216, 1, 'en', 'core/acl/users', 'message', 'Message', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(217, 1, 'en', 'core/acl/users', 'cancel_btn', 'Cancel', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(218, 1, 'en', 'core/acl/users', 'change_password', 'Change password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(219, 1, 'en', 'core/acl/users', 'current_password', 'Current password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(220, 1, 'en', 'core/acl/users', 'new_password', 'New Password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(221, 1, 'en', 'core/acl/users', 'confirm_new_password', 'Confirm New Password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(222, 1, 'en', 'core/acl/users', 'password', 'Password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(223, 1, 'en', 'core/acl/users', 'save', 'Save', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(224, 1, 'en', 'core/acl/users', 'cannot_delete', 'User could not be deleted', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(225, 1, 'en', 'core/acl/users', 'deleted', 'User deleted', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(226, 1, 'en', 'core/acl/users', 'last_login', 'Last Login', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(227, 1, 'en', 'core/acl/users', 'error_update_profile_image', 'Error when update profile image', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(228, 1, 'en', 'core/acl/users', 'email_reminder_template', '<h3>Hello :name</h3><p>The system has received a request to restore the password for your account, to complete this task please click the link below.</p><p><a href=\":link\">Reset password now</a></p><p>If not you ask recover password, please ignore this email.</p><p>This email is valid for 60 minutes after receiving the email.</p>', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(229, 1, 'en', 'core/acl/users', 'change_profile_image', 'Change Profile Image', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(230, 1, 'en', 'core/acl/users', 'new_image', 'New Image', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(231, 1, 'en', 'core/acl/users', 'loading', 'Loading', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(232, 1, 'en', 'core/acl/users', 'close', 'Close', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(233, 1, 'en', 'core/acl/users', 'update', 'Update', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(234, 1, 'en', 'core/acl/users', 'read_image_failed', 'Failed to read the image file', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(235, 1, 'en', 'core/acl/users', 'users', 'Users', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(236, 1, 'en', 'core/acl/users', 'update_avatar_success', 'Update profile image successfully!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(237, 1, 'en', 'core/acl/users', 'info.title', 'User profile', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(238, 1, 'en', 'core/acl/users', 'info.first_name', 'First Name', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(239, 1, 'en', 'core/acl/users', 'info.last_name', 'Last Name', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(240, 1, 'en', 'core/acl/users', 'info.email', 'Email', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(241, 1, 'en', 'core/acl/users', 'info.second_email', 'Secondary Email', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(242, 1, 'en', 'core/acl/users', 'info.address', 'Address', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(243, 1, 'en', 'core/acl/users', 'info.second_address', 'Secondary Address', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(244, 1, 'en', 'core/acl/users', 'info.birth_day', 'Date of birth', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(245, 1, 'en', 'core/acl/users', 'info.job', 'Job Position', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(246, 1, 'en', 'core/acl/users', 'info.mobile_number', 'Mobile Number', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(247, 1, 'en', 'core/acl/users', 'info.second_mobile_number', 'Secondary Phone', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(248, 1, 'en', 'core/acl/users', 'info.interes', 'Interests', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(249, 1, 'en', 'core/acl/users', 'info.about', 'About', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(250, 1, 'en', 'core/acl/users', 'gender.title', 'Gender', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(251, 1, 'en', 'core/acl/users', 'gender.male', 'Male', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(252, 1, 'en', 'core/acl/users', 'gender.female', 'Female', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(253, 1, 'en', 'core/acl/users', 'total_users', 'Total users', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(254, 1, 'en', 'core/acl/users', 'statuses.activated', 'Activated', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(255, 1, 'en', 'core/acl/users', 'statuses.deactivated', 'Deactivated', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(256, 1, 'en', 'core/acl/users', 'make_super', 'Make super', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(257, 1, 'en', 'core/acl/users', 'remove_super', 'Remove super', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(258, 1, 'en', 'core/acl/users', 'is_super', 'Is super?', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(259, 1, 'en', 'core/acl/users', 'email_placeholder', 'Ex: example@gmail.com', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(260, 1, 'en', 'core/acl/users', 'password_confirmation', 'Re-type password', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(261, 1, 'en', 'core/acl/users', 'select_role', 'Select role', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(262, 1, 'en', 'core/acl/users', 'create_new_user', 'Create a new user', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(263, 1, 'en', 'core/acl/users', 'cannot_delete_super_user', 'Permission denied. Cannot delete a super user!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(264, 1, 'en', 'core/acl/users', 'assigned_role', 'Assigned Role', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(265, 1, 'en', 'core/acl/users', 'no_role_assigned', 'No role assigned', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(266, 1, 'en', 'core/acl/users', 'view_user_profile', 'View user\'s profile', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(267, 1, 'vi', 'core/acl/auth', 'login.username', 'Email/Tên truy cập', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(268, 1, 'vi', 'core/acl/auth', 'login.password', 'Mật khẩu', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(269, 1, 'vi', 'core/acl/auth', 'login.title', 'Đăng nhập vào quản trị', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(270, 1, 'vi', 'core/acl/auth', 'login.remember', 'Nhớ mật khẩu?', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(271, 1, 'vi', 'core/acl/auth', 'login.login', 'Đăng nhập', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(272, 1, 'vi', 'core/acl/auth', 'login.placeholder.username', 'Vui lòng nhập tên truy cập', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(273, 1, 'vi', 'core/acl/auth', 'login.placeholder.email', 'Vui lòng nhập email', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(274, 1, 'vi', 'core/acl/auth', 'login.success', 'Đăng nhập thành công!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(275, 1, 'vi', 'core/acl/auth', 'login.fail', 'Sai tên truy cập hoặc mật khẩu.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(276, 1, 'vi', 'core/acl/auth', 'login.not_active', 'Tài khoản của bạn chưa được kích hoạt!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(277, 1, 'vi', 'core/acl/auth', 'login.banned', 'Tài khoản này đã bị khóa.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(278, 1, 'vi', 'core/acl/auth', 'login.logout_success', 'Đăng xuất thành công!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(279, 1, 'vi', 'core/acl/auth', 'login.dont_have_account', 'Bạn không có tài khoản trong hệ thống, vui lòng liên hệ quản trị viên!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(280, 1, 'vi', 'core/acl/auth', 'login.email', 'Email', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(281, 1, 'vi', 'core/acl/auth', 'forgot_password.title', 'Quên mật khẩu', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(282, 1, 'vi', 'core/acl/auth', 'forgot_password.message', '<p>Quên mật khẩu?</p><p>Vui lòng nhập email đăng nhập tài khoản của bạn để hệ thống gửi liên kết khôi phục mật khẩu.</p>', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(283, 1, 'vi', 'core/acl/auth', 'forgot_password.submit', 'Hoàn tất', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(284, 1, 'vi', 'core/acl/auth', 'reset.new_password', 'Mật khẩu mới', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(285, 1, 'vi', 'core/acl/auth', 'reset.title', 'Khôi phục mật khẩu', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(286, 1, 'vi', 'core/acl/auth', 'reset.update', 'Cập nhật', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(287, 1, 'vi', 'core/acl/auth', 'reset.wrong_token', 'Liên kết này không chính xác hoặc đã hết hiệu lực, vui lòng yêu cầu khôi phục mật khẩu lại!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(288, 1, 'vi', 'core/acl/auth', 'reset.user_not_found', 'Tên đăng nhập không tồn tại.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(289, 1, 'vi', 'core/acl/auth', 'reset.success', 'Khôi phục mật khẩu thành công!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(290, 1, 'vi', 'core/acl/auth', 'reset.fail', 'Token không hợp lệ hoặc liên kết khôi phục mật khẩu đã hết thời gian hiệu lực!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(291, 1, 'vi', 'core/acl/auth', 'reset.reset.title', 'Email khôi phục mật khẩu', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(292, 1, 'vi', 'core/acl/auth', 'reset.send.success', 'Một email khôi phục mật khẩu đã được gửi tới email của bạn, vui lòng kiểm tra và hoàn tất yêu cầu.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(293, 1, 'vi', 'core/acl/auth', 'reset.send.fail', 'Không thể gửi email trong lúc này. Vui lòng thực hiện lại sau.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(294, 1, 'vi', 'core/acl/auth', 'reset.new-password', 'Mật khẩu mới', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(295, 1, 'vi', 'core/acl/auth', 'reset.email', 'Email', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(296, 1, 'vi', 'core/acl/auth', 'reset.password_confirmation', 'Xác nhận mật khẩu mới', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(297, 1, 'vi', 'core/acl/auth', 'email.reminder.title', 'Email khôi phục mật khẩu', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(298, 1, 'vi', 'core/acl/auth', 'failed', 'Không thành công', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(299, 1, 'vi', 'core/acl/auth', 'throttle', 'Throttle', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(300, 1, 'vi', 'core/acl/auth', 'back_to_login', 'Quay lại trang đăng nhập', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(301, 1, 'vi', 'core/acl/auth', 'login_title', 'Đăng nhập vào quản trị', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(302, 1, 'vi', 'core/acl/auth', 'login_via_social', 'Đăng nhập thông qua mạng xã hội', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(303, 1, 'vi', 'core/acl/auth', 'lost_your_password', 'Quên mật khẩu?', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(304, 1, 'vi', 'core/acl/auth', 'not_member', 'Chưa là thành viên?', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(305, 1, 'vi', 'core/acl/auth', 'register_now', 'Đăng ký ngay', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(306, 1, 'vi', 'core/acl/auth', 'languages', 'Ngôn ngữ', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(307, 1, 'vi', 'core/acl/auth', 'password_confirmation', 'Xác nhận mật khẩu', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(308, 1, 'vi', 'core/acl/auth', 'reset_password', 'Khôi phục mật khẩu', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(309, 1, 'vi', 'core/acl/auth', 'sign_in_below', 'Đăng nhập', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(310, 1, 'vi', 'core/acl/permissions', 'notices.role_in_use', 'Không thể xóa quyền người dùng này vì nó đang được sử dụng!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(311, 1, 'vi', 'core/acl/permissions', 'notices.role_delete_belong_user', 'Không thể xóa quyền hạn này vì nó thuộc về người khác!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(312, 1, 'vi', 'core/acl/permissions', 'notices.role_edit_belong_user', 'Bạn không được phép sửa quyền này vì nó thuộc về người khác', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(313, 1, 'vi', 'core/acl/permissions', 'notices.delete_global_role', 'Bạn không thể xóa quyền người dùng hệ thống!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(314, 1, 'vi', 'core/acl/permissions', 'notices.delete_success', 'Quyền người dùng đã được xóa!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(315, 1, 'vi', 'core/acl/permissions', 'notices.modified_success', 'Quyền người dùng đã được cập nhật thành công!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(316, 1, 'vi', 'core/acl/permissions', 'notices.create_success', 'Quyền người dùng mới đã được tạo thành công!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(317, 1, 'vi', 'core/acl/permissions', 'notices.duplicated_success', 'Quyền người dùng đã được sao chép thành công!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(318, 1, 'vi', 'core/acl/permissions', 'notices.no_select', 'Hãy chọn ít nhất một quyền người dùng để thực hiện hành động này!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(319, 1, 'vi', 'core/acl/permissions', 'notices.not_found', 'Không tìm thấy quyền người dùng này', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(320, 1, 'vi', 'core/acl/permissions', 'name', 'Tên', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(321, 1, 'vi', 'core/acl/permissions', 'current_role', 'Quyền hiện tại', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(322, 1, 'vi', 'core/acl/permissions', 'no_role_assigned', 'Không có quyền hạn nào', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(323, 1, 'vi', 'core/acl/permissions', 'role_assigned', 'Quyền đã được gán', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(324, 1, 'vi', 'core/acl/permissions', 'create_role', 'Tạo quyền mới', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(325, 1, 'vi', 'core/acl/permissions', 'role_name', 'Tên', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(326, 1, 'vi', 'core/acl/permissions', 'role_description', 'Mô tả', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(327, 1, 'vi', 'core/acl/permissions', 'permission_flags', 'Cờ đánh dấu quyền hạn', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(328, 1, 'vi', 'core/acl/permissions', 'cancel', 'Hủy bỏ', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(329, 1, 'vi', 'core/acl/permissions', 'reset', 'Làm lại', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(330, 1, 'vi', 'core/acl/permissions', 'save', 'Lưu', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(331, 1, 'vi', 'core/acl/permissions', 'global_role_msg', 'Đây là một phân quyền toàn cục và không thể thay đổi.  Bạn có thể sử dụng nút \"Nhân bản\" để tạo một bản sao chép cho phân quyền này và chỉnh sửa.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(332, 1, 'vi', 'core/acl/permissions', 'details', 'Chi tiết', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(333, 1, 'vi', 'core/acl/permissions', 'duplicate', 'Nhân bản', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(334, 1, 'vi', 'core/acl/permissions', 'all', 'Tất cả phân quyền', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(335, 1, 'vi', 'core/acl/permissions', 'list_role', 'Danh sách quyền', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(336, 1, 'vi', 'core/acl/permissions', 'created_on', 'Ngày tạo', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(337, 1, 'vi', 'core/acl/permissions', 'created_by', 'Được tạo bởi', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(338, 1, 'vi', 'core/acl/permissions', 'actions', 'Tác vụ', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(339, 1, 'vi', 'core/acl/permissions', 'create_success', 'Tạo thành công!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(340, 1, 'vi', 'core/acl/permissions', 'delete_global_role', 'Không thể xóa quyền hệ thống', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(341, 1, 'vi', 'core/acl/permissions', 'delete_success', 'Xóa quyền thành công', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(342, 1, 'vi', 'core/acl/permissions', 'duplicated_success', 'Nhân bản thành công', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(343, 1, 'vi', 'core/acl/permissions', 'modified_success', 'Sửa thành công', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(344, 1, 'vi', 'core/acl/permissions', 'no_select', 'Hãy chọn ít nhất một quyền để thực hiện hành động này!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(345, 1, 'vi', 'core/acl/permissions', 'not_found', 'Không tìm thấy quyền thành viên nào!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(346, 1, 'vi', 'core/acl/permissions', 'options', 'Tùy chọn', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(347, 1, 'vi', 'core/acl/permissions', 'role_delete_belong_user', 'Không thể xóa quyền hạn này vì nó thuộc về người khác!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(348, 1, 'vi', 'core/acl/permissions', 'role_edit_belong_user', 'Bạn không được phép sửa quyền này vì nó thuộc về người khác', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(349, 1, 'vi', 'core/acl/permissions', 'role_in_use', 'Không thể xóa quyền người dùng này vì nó đang được sử dụng!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(350, 1, 'vi', 'core/acl/permissions', 'access_denied_message', 'Bạn không có quyền sử dụng chức năng này!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(351, 1, 'vi', 'core/acl/permissions', 'roles', 'Quyền', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(352, 1, 'vi', 'core/acl/permissions', 'role_permission', 'Nhóm và phân quyền', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(353, 1, 'vi', 'core/acl/permissions', 'user_management', 'Quản lý người dùng hệ thống', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(354, 1, 'vi', 'core/acl/permissions', 'super_user_management', 'Quản lý người dùng cấp cao', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(355, 1, 'vi', 'core/acl/permissions', 'action_unauthorized', 'Hành động này không được phép', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(356, 1, 'vi', 'core/acl/reminders', 'password', 'Mật khẩu phải ít nhất 6 kí tự và trùng khớp với mật khẩu xác nhận.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(357, 1, 'vi', 'core/acl/reminders', 'user', 'Hệ thống không thể tìm thấy tài khoản với email này.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(358, 1, 'vi', 'core/acl/reminders', 'token', 'Mã khôi phục mật khẩu này không hợp lệ.', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(359, 1, 'vi', 'core/acl/reminders', 'sent', 'Liên kết khôi phục mật khẩu đã được gửi!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(360, 1, 'vi', 'core/acl/reminders', 'reset', 'Mật khẩu đã được thay đổi!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(361, 1, 'vi', 'core/acl/users', 'delete_user_logged_in', 'Không thể xóa người dùng đang đăng nhập hệ thống!', '2021-07-10 19:24:12', '2021-07-10 19:24:12'),
(362, 1, 'vi', 'core/acl/users', 'no_select', 'Hãy chọn ít nhất một trường để thực hiện hành động này!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(363, 1, 'vi', 'core/acl/users', 'lock_user_logged_in', 'Không thể khóa người dùng đang đăng nhập hệ thống!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(364, 1, 'vi', 'core/acl/users', 'update_success', 'Cập nhật trạng thái thành công!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(365, 1, 'vi', 'core/acl/users', 'save_setting_failed', 'Có lỗi xảy ra trong quá trình lưu cài đặt của người dùng', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(366, 1, 'vi', 'core/acl/users', 'not_found', 'Không tìm thấy người dùng', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(367, 1, 'vi', 'core/acl/users', 'email_exist', 'Email này đã được sử dụng bởi người dùng khác trong hệ thống', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(368, 1, 'vi', 'core/acl/users', 'username_exist', 'Tên đăng nhập này đã được sử dụng bởi người dùng khác trong hệ thống', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(369, 1, 'vi', 'core/acl/users', 'update_profile_success', 'Thông tin tài khoản của bạn đã được cập nhật thành công', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(370, 1, 'vi', 'core/acl/users', 'password_update_success', 'Cập nhật mật khẩu thành công', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(371, 1, 'vi', 'core/acl/users', 'current_password_not_valid', 'Mật khẩu hiện tại không chính xác', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(372, 1, 'vi', 'core/acl/users', 'user_exist_in', 'Người dùng đã là thành viên', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(373, 1, 'vi', 'core/acl/users', 'email', 'Email', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(374, 1, 'vi', 'core/acl/users', 'username', 'Tên đăng nhập', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(375, 1, 'vi', 'core/acl/users', 'role', 'Phân quyền', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(376, 1, 'vi', 'core/acl/users', 'first_name', 'Họ', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(377, 1, 'vi', 'core/acl/users', 'last_name', 'Tên', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(378, 1, 'vi', 'core/acl/users', 'message', 'Thông điệp', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(379, 1, 'vi', 'core/acl/users', 'cancel_btn', 'Hủy bỏ', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(380, 1, 'vi', 'core/acl/users', 'password', 'Mật khẩu', '2021-07-10 19:24:13', '2021-07-10 19:24:13');
INSERT INTO `translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(381, 1, 'vi', 'core/acl/users', 'new_password', 'Mật khẩu mới', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(382, 1, 'vi', 'core/acl/users', 'save', 'Lưu', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(383, 1, 'vi', 'core/acl/users', 'confirm_new_password', 'Xác nhận mật khẩu mới', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(384, 1, 'vi', 'core/acl/users', 'deleted', 'Xóa thành viên thành công', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(385, 1, 'vi', 'core/acl/users', 'cannot_delete', 'Không thể xóa thành viên', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(386, 1, 'vi', 'core/acl/users', 'last_login', 'Lần cuối đăng nhập', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(387, 1, 'vi', 'core/acl/users', 'error_update_profile_image', 'Có lỗi trong quá trình đổi ảnh đại diện', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(388, 1, 'vi', 'core/acl/users', 'email_reminder_template', '<h3>Xin chào :name</h3><p>Hệ thống vừa nhận được yêu cầu khôi phục mật khẩu cho tài khoản của bạn, để hoàn tất tác vụ này vui lòng click vào đường link bên dưới.</p><p><a href=\":link\">Khôi phục mật khẩu</a></p><p>Nếu không phải bạn yêu cầu khôi phục mật khẩu, vui lòng bỏ qua email này.</p><p>Email này có giá trị trong vòng 60 phút kể từ lúc nhận được email.</p>', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(389, 1, 'vi', 'core/acl/users', 'change_profile_image', 'Thay đổi ảnh đại diện', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(390, 1, 'vi', 'core/acl/users', 'new_image', 'Ảnh mới', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(391, 1, 'vi', 'core/acl/users', 'loading', 'Đang tải', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(392, 1, 'vi', 'core/acl/users', 'close', 'Đóng', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(393, 1, 'vi', 'core/acl/users', 'update', 'Cập nhật', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(394, 1, 'vi', 'core/acl/users', 'read_image_failed', 'Không đọc được nội dung của hình ảnh', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(395, 1, 'vi', 'core/acl/users', 'update_avatar_success', 'Cập nhật ảnh đại diện thành công!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(396, 1, 'vi', 'core/acl/users', 'users', 'Quản trị viên', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(397, 1, 'vi', 'core/acl/users', 'info.title', 'Thông tin người dùng', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(398, 1, 'vi', 'core/acl/users', 'info.first_name', 'Họ', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(399, 1, 'vi', 'core/acl/users', 'info.last_name', 'Tên', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(400, 1, 'vi', 'core/acl/users', 'info.email', 'Email', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(401, 1, 'vi', 'core/acl/users', 'info.second_email', 'Email dự phòng', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(402, 1, 'vi', 'core/acl/users', 'info.address', 'Địa chỉ', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(403, 1, 'vi', 'core/acl/users', 'info.second_address', 'Địa chỉ dự phòng', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(404, 1, 'vi', 'core/acl/users', 'info.birth_day', 'Ngày sinh', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(405, 1, 'vi', 'core/acl/users', 'info.job', 'Nghề nghiệp', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(406, 1, 'vi', 'core/acl/users', 'info.mobile_number', 'Số điện thoại di động', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(407, 1, 'vi', 'core/acl/users', 'info.second_mobile_number', 'Số điện thoại dự phòng', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(408, 1, 'vi', 'core/acl/users', 'info.interes', 'Sở thích', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(409, 1, 'vi', 'core/acl/users', 'info.about', 'Giới thiệu', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(410, 1, 'vi', 'core/acl/users', 'gender.title', 'Giới tính', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(411, 1, 'vi', 'core/acl/users', 'gender.male', 'nam', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(412, 1, 'vi', 'core/acl/users', 'gender.female', 'nữ', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(413, 1, 'vi', 'core/acl/users', 'statuses.activated', 'Đang hoạt động', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(414, 1, 'vi', 'core/acl/users', 'statuses.deactivated', 'Đã khoá', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(415, 1, 'vi', 'core/acl/users', 'change_password', 'Thay đổi mật khẩu', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(416, 1, 'vi', 'core/acl/users', 'current_password', 'Mật khẩu hiện tại', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(417, 1, 'vi', 'core/acl/users', 'make_super', 'Thiết lập quyền cao nhất', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(418, 1, 'vi', 'core/acl/users', 'remove_super', 'Loại bỏ quyền cao nhất', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(419, 1, 'vi', 'core/acl/users', 'is_super', 'Quyền cao nhất?', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(420, 1, 'vi', 'core/acl/users', 'email_placeholder', 'Ex: example@gmail.com', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(421, 1, 'vi', 'core/acl/users', 'password_confirmation', 'Nhập lại mật khẩu', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(422, 1, 'vi', 'core/acl/users', 'select_role', 'Chọn nhóm', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(423, 1, 'vi', 'core/acl/users', 'create_new_user', 'Tạo tài khoản quản trị viên mới', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(424, 1, 'vi', 'core/acl/users', 'cannot_delete_super_user', 'Vượt quyền hạn, không thể xoá quản trị viên cấp cao nhất!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(425, 1, 'vi', 'core/acl/users', 'assigned_role', 'Cấp quyền', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(426, 1, 'vi', 'core/acl/users', 'total_users', 'Tổng số người dùng', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(427, 1, 'vi', 'core/acl/users', 'view_user_profile', 'Xem thông tin người dùng', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(428, 1, 'vi', 'core/acl/users', 'no_role_assigned', 'Chưa có quyền nào', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(429, 1, 'en', 'core/base/base', 'yes', 'Yes', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(430, 1, 'en', 'core/base/base', 'no', 'No', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(431, 1, 'en', 'core/base/base', 'is_default', 'Is default?', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(432, 1, 'en', 'core/base/base', 'proc_close_disabled_error', 'Function proc_close() is disabled. Please contact your hosting provider to enable\n    it. Or you can add to .env: CAN_EXECUTE_COMMAND=false to disable this feature.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(433, 1, 'en', 'core/base/base', 'email_template.header', 'Email template header', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(434, 1, 'en', 'core/base/base', 'email_template.footer', 'Email template footer', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(435, 1, 'en', 'core/base/base', 'email_template.site_title', 'Site title', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(436, 1, 'en', 'core/base/base', 'email_template.site_url', 'Site URL', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(437, 1, 'en', 'core/base/base', 'email_template.site_logo', 'Site Logo', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(438, 1, 'en', 'core/base/base', 'email_template.date_time', 'Current date time', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(439, 1, 'en', 'core/base/base', 'email_template.date_year', 'Current year', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(440, 1, 'en', 'core/base/base', 'email_template.site_admin_email', 'Site admin email', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(441, 1, 'en', 'core/base/base', 'change_image', 'Change image', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(442, 1, 'en', 'core/base/base', 'delete_image', 'Delete image', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(443, 1, 'en', 'core/base/base', 'preview_image', 'Preview image', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(444, 1, 'en', 'core/base/base', 'image', 'Image', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(445, 1, 'en', 'core/base/base', 'using_button', 'Using button', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(446, 1, 'en', 'core/base/base', 'select_image', 'Select image', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(447, 1, 'en', 'core/base/base', 'to_add_more_image', 'to add more images', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(448, 1, 'en', 'core/base/base', 'add_image', 'Add image', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(449, 1, 'en', 'core/base/cache', 'cache_management', 'Cache management', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(450, 1, 'en', 'core/base/cache', 'cache_commands', 'Clear cache commands', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(451, 1, 'en', 'core/base/cache', 'commands.clear_cms_cache.title', 'Clear all CMS cache', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(452, 1, 'en', 'core/base/cache', 'commands.clear_cms_cache.description', 'Clear CMS caching: database caching, static blocks... Run this command when you don\'t see the changes after updating data.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(453, 1, 'en', 'core/base/cache', 'commands.clear_cms_cache.success_msg', 'Cache cleaned', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(454, 1, 'en', 'core/base/cache', 'commands.refresh_compiled_views.title', 'Refresh compiled views', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(455, 1, 'en', 'core/base/cache', 'commands.refresh_compiled_views.description', 'Clear compiled views to make views up to date.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(456, 1, 'en', 'core/base/cache', 'commands.refresh_compiled_views.success_msg', 'Cache view refreshed', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(457, 1, 'en', 'core/base/cache', 'commands.clear_config_cache.title', 'Clear config cache', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(458, 1, 'en', 'core/base/cache', 'commands.clear_config_cache.description', 'You might need to refresh the config caching when you change something on production environment.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(459, 1, 'en', 'core/base/cache', 'commands.clear_config_cache.success_msg', 'Config cache cleaned', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(460, 1, 'en', 'core/base/cache', 'commands.clear_route_cache.title', 'Clear route cache', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(461, 1, 'en', 'core/base/cache', 'commands.clear_route_cache.description', 'Clear cache routing.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(462, 1, 'en', 'core/base/cache', 'commands.clear_route_cache.success_msg', 'The route cache has been cleaned', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(463, 1, 'en', 'core/base/cache', 'commands.clear_log.title', 'Clear log', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(464, 1, 'en', 'core/base/cache', 'commands.clear_log.description', 'Clear system log files', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(465, 1, 'en', 'core/base/cache', 'commands.clear_log.success_msg', 'The system log has been cleaned', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(466, 1, 'en', 'core/base/enums', 'statuses.draft', 'Draft', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(467, 1, 'en', 'core/base/enums', 'statuses.pending', 'Pending', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(468, 1, 'en', 'core/base/enums', 'statuses.published', 'Published', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(469, 1, 'en', 'core/base/errors', '401_title', 'Permission Denied', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(470, 1, 'en', 'core/base/errors', '401_msg', '<li>You have not been granted access to the section by the administrator.</li>\n	                <li>You may have the wrong account type.</li>\n	                <li>You are not authorized to view the requested resource.</li>\n	                <li>Your subscription may have expired.</li>', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(471, 1, 'en', 'core/base/errors', '404_title', 'Page could not be found', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(472, 1, 'en', 'core/base/errors', '404_msg', '<li>The page you requested does not exist.</li>\n	                <li>The link you clicked is no longer.</li>\n	                <li>The page may have moved to a new location.</li>\n	                <li>An error may have occurred.</li>\n	                <li>You are not authorized to view the requested resource.</li>', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(473, 1, 'en', 'core/base/errors', '500_title', 'Page could not be loaded', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(474, 1, 'en', 'core/base/errors', '500_msg', '<li>The page you requested does not exist.</li>\n	                <li>The link you clicked is no longer.</li>\n	                <li>The page may have moved to a new location.</li>\n	                <li>An error may have occurred.</li>\n	                <li>You are not authorized to view the requested resource.</li>', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(475, 1, 'en', 'core/base/errors', 'reasons', 'This may have occurred because of several reasons', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(476, 1, 'en', 'core/base/errors', 'try_again', 'Please try again in a few minutes, or alternatively return to the homepage by <a href=\"http://botble.local/admin\">clicking here</a>.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(477, 1, 'en', 'core/base/errors', 'not_found', 'Not Found', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(478, 1, 'en', 'core/base/forms', 'choose_image', 'Choose image', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(479, 1, 'en', 'core/base/forms', 'actions', 'Actions', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(480, 1, 'en', 'core/base/forms', 'save', 'Save', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(481, 1, 'en', 'core/base/forms', 'save_and_continue', 'Save & Edit', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(482, 1, 'en', 'core/base/forms', 'image', 'Image', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(483, 1, 'en', 'core/base/forms', 'image_placeholder', 'Insert path of image or click upload button', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(484, 1, 'en', 'core/base/forms', 'create', 'Create', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(485, 1, 'en', 'core/base/forms', 'edit', 'Edit', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(486, 1, 'en', 'core/base/forms', 'permalink', 'Permalink', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(487, 1, 'en', 'core/base/forms', 'ok', 'OK', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(488, 1, 'en', 'core/base/forms', 'cancel', 'Cancel', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(489, 1, 'en', 'core/base/forms', 'character_remain', 'character(s) remain', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(490, 1, 'en', 'core/base/forms', 'template', 'Template', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(491, 1, 'en', 'core/base/forms', 'choose_file', 'Choose file', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(492, 1, 'en', 'core/base/forms', 'file', 'File', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(493, 1, 'en', 'core/base/forms', 'content', 'Content', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(494, 1, 'en', 'core/base/forms', 'description', 'Description', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(495, 1, 'en', 'core/base/forms', 'name', 'Name', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(496, 1, 'en', 'core/base/forms', 'slug', 'Slug', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(497, 1, 'en', 'core/base/forms', 'title', 'Title', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(498, 1, 'en', 'core/base/forms', 'value', 'Value', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(499, 1, 'en', 'core/base/forms', 'name_placeholder', 'Name', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(500, 1, 'en', 'core/base/forms', 'alias_placeholder', 'Alias', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(501, 1, 'en', 'core/base/forms', 'description_placeholder', 'Short description', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(502, 1, 'en', 'core/base/forms', 'parent', 'Parent', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(503, 1, 'en', 'core/base/forms', 'icon', 'Icon', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(504, 1, 'en', 'core/base/forms', 'icon_placeholder', 'Ex: fa fa-home', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(505, 1, 'en', 'core/base/forms', 'order_by', 'Order by', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(506, 1, 'en', 'core/base/forms', 'order_by_placeholder', 'Order by', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(507, 1, 'en', 'core/base/forms', 'is_featured', 'Is featured?', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(508, 1, 'en', 'core/base/forms', 'is_default', 'Is default?', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(509, 1, 'en', 'core/base/forms', 'update', 'Update', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(510, 1, 'en', 'core/base/forms', 'publish', 'Publish', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(511, 1, 'en', 'core/base/forms', 'remove_image', 'Remove image', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(512, 1, 'en', 'core/base/forms', 'remove_file', 'Remove file', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(513, 1, 'en', 'core/base/forms', 'order', 'Order', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(514, 1, 'en', 'core/base/forms', 'alias', 'Alias', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(515, 1, 'en', 'core/base/forms', 'basic_information', 'Basic information', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(516, 1, 'en', 'core/base/forms', 'short_code', 'Shortcode', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(517, 1, 'en', 'core/base/forms', 'add_short_code', 'Add a shortcode', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(518, 1, 'en', 'core/base/forms', 'add', 'Add', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(519, 1, 'en', 'core/base/forms', 'link', 'Link', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(520, 1, 'en', 'core/base/forms', 'show_hide_editor', 'Show/Hide Editor', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(521, 1, 'en', 'core/base/forms', 'basic_info_title', 'Basic information', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(522, 1, 'en', 'core/base/layouts', 'platform_admin', 'Platform Administration', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(523, 1, 'en', 'core/base/layouts', 'dashboard', 'Dashboard', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(524, 1, 'en', 'core/base/layouts', 'widgets', 'Widgets', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(525, 1, 'en', 'core/base/layouts', 'plugins', 'Plugins', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(526, 1, 'en', 'core/base/layouts', 'settings', 'Settings', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(527, 1, 'en', 'core/base/layouts', 'setting_general', 'General', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(528, 1, 'en', 'core/base/layouts', 'setting_email', 'Email', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(529, 1, 'en', 'core/base/layouts', 'system_information', 'System information', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(530, 1, 'en', 'core/base/layouts', 'theme', 'Theme', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(531, 1, 'en', 'core/base/layouts', 'copyright', 'Copyright :year &copy; :company. Version: <span>:version</span>', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(532, 1, 'en', 'core/base/layouts', 'profile', 'Profile', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(533, 1, 'en', 'core/base/layouts', 'logout', 'Logout', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(534, 1, 'en', 'core/base/layouts', 'no_search_result', 'No results found, please try with different keywords.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(535, 1, 'en', 'core/base/layouts', 'home', 'Home', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(536, 1, 'en', 'core/base/layouts', 'search', 'Search', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(537, 1, 'en', 'core/base/layouts', 'add_new', 'Add new', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(538, 1, 'en', 'core/base/layouts', 'n_a', 'N/A', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(539, 1, 'en', 'core/base/layouts', 'page_loaded_time', 'Page loaded in', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(540, 1, 'en', 'core/base/layouts', 'view_website', 'View website', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(541, 1, 'en', 'core/base/notices', 'create_success_message', 'Created successfully', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(542, 1, 'en', 'core/base/notices', 'update_success_message', 'Updated successfully', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(543, 1, 'en', 'core/base/notices', 'delete_success_message', 'Deleted successfully', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(544, 1, 'en', 'core/base/notices', 'success_header', 'Success!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(545, 1, 'en', 'core/base/notices', 'error_header', 'Error!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(546, 1, 'en', 'core/base/notices', 'no_select', 'Please select at least one record to perform this action!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(547, 1, 'en', 'core/base/notices', 'processing_request', 'We are processing your request.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(548, 1, 'en', 'core/base/notices', 'error', 'Error!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(549, 1, 'en', 'core/base/notices', 'success', 'Success!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(550, 1, 'en', 'core/base/notices', 'info', 'Info!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(551, 1, 'en', 'core/base/notices', 'enum.validate_message', 'The :attribute value you have entered is invalid.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(552, 1, 'en', 'core/base/system', 'no_select', 'Please select at least one record to take this action!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(553, 1, 'en', 'core/base/system', 'cannot_find_user', 'Unable to find specified user', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(554, 1, 'en', 'core/base/system', 'supper_revoked', 'Super user access revoked', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(555, 1, 'en', 'core/base/system', 'cannot_revoke_yourself', 'Can not revoke supper user access permission yourself!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(556, 1, 'en', 'core/base/system', 'cant_remove_supper', 'You don\'t has permission to remove this super user', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(557, 1, 'en', 'core/base/system', 'cant_find_user_with_email', 'Unable to find user with specified email address', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(558, 1, 'en', 'core/base/system', 'supper_granted', 'Super user access granted', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(559, 1, 'en', 'core/base/system', 'delete_log_success', 'Delete log file successfully!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(560, 1, 'en', 'core/base/system', 'get_member_success', 'Member list retrieved successfully', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(561, 1, 'en', 'core/base/system', 'error_occur', 'The following errors occurred', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(562, 1, 'en', 'core/base/system', 'user_management', 'User Management', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(563, 1, 'en', 'core/base/system', 'user_management_description', 'Manage users.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(564, 1, 'en', 'core/base/system', 'role_and_permission', 'Roles and Permissions', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(565, 1, 'en', 'core/base/system', 'role_and_permission_description', 'Manage the available roles.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(566, 1, 'en', 'core/base/system', 'user.list_super', 'List Super Users', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(567, 1, 'en', 'core/base/system', 'user.email', 'Email', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(568, 1, 'en', 'core/base/system', 'user.last_login', 'Last Login', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(569, 1, 'en', 'core/base/system', 'user.username', 'Username', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(570, 1, 'en', 'core/base/system', 'user.add_user', 'Add Super User', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(571, 1, 'en', 'core/base/system', 'user.cancel', 'Cancel', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(572, 1, 'en', 'core/base/system', 'user.create', 'Create', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(573, 1, 'en', 'core/base/system', 'options.features', 'Feature Access Control', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(574, 1, 'en', 'core/base/system', 'options.feature_description', 'Manage the available.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(575, 1, 'en', 'core/base/system', 'options.manage_super', 'Super User Management', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(576, 1, 'en', 'core/base/system', 'options.manage_super_description', 'Add/remove super users.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(577, 1, 'en', 'core/base/system', 'options.info', 'System information', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(578, 1, 'en', 'core/base/system', 'options.info_description', 'All information about current system configuration.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(579, 1, 'en', 'core/base/system', 'info.title', 'System information', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(580, 1, 'en', 'core/base/system', 'info.cache', 'Cache', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(581, 1, 'en', 'core/base/system', 'info.locale', 'Active locale', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(582, 1, 'en', 'core/base/system', 'info.environment', 'Environment', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(583, 1, 'en', 'core/base/system', 'disabled_in_demo_mode', 'You cannot do it in demo mode!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(584, 1, 'en', 'core/base/system', 'report_description', 'Please share this information for troubleshooting', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(585, 1, 'en', 'core/base/system', 'get_system_report', 'Get System Report', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(586, 1, 'en', 'core/base/system', 'system_environment', 'System Environment', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(587, 1, 'en', 'core/base/system', 'framework_version', 'Framework Version', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(588, 1, 'en', 'core/base/system', 'timezone', 'Timezone', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(589, 1, 'en', 'core/base/system', 'debug_mode', 'Debug Mode', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(590, 1, 'en', 'core/base/system', 'storage_dir_writable', 'Storage Dir Writable', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(591, 1, 'en', 'core/base/system', 'cache_dir_writable', 'Cache Dir Writable', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(592, 1, 'en', 'core/base/system', 'app_size', 'App Size', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(593, 1, 'en', 'core/base/system', 'server_environment', 'Server Environment', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(594, 1, 'en', 'core/base/system', 'php_version', 'PHP Version', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(595, 1, 'en', 'core/base/system', 'php_version_error', 'PHP must be >= :version', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(596, 1, 'en', 'core/base/system', 'server_software', 'Server Software', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(597, 1, 'en', 'core/base/system', 'server_os', 'Server OS', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(598, 1, 'en', 'core/base/system', 'database', 'Database', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(599, 1, 'en', 'core/base/system', 'ssl_installed', 'SSL Installed', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(600, 1, 'en', 'core/base/system', 'cache_driver', 'Cache Driver', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(601, 1, 'en', 'core/base/system', 'session_driver', 'Session Driver', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(602, 1, 'en', 'core/base/system', 'queue_connection', 'Queue Connection', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(603, 1, 'en', 'core/base/system', 'mbstring_ext', 'Mbstring Ext', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(604, 1, 'en', 'core/base/system', 'openssl_ext', 'OpenSSL Ext', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(605, 1, 'en', 'core/base/system', 'pdo_ext', 'PDO Ext', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(606, 1, 'en', 'core/base/system', 'curl_ext', 'CURL Ext', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(607, 1, 'en', 'core/base/system', 'exif_ext', 'Exif Ext', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(608, 1, 'en', 'core/base/system', 'file_info_ext', 'File info Ext', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(609, 1, 'en', 'core/base/system', 'tokenizer_ext', 'Tokenizer Ext', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(610, 1, 'en', 'core/base/system', 'extra_stats', 'Extra Stats', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(611, 1, 'en', 'core/base/system', 'installed_packages', 'Installed packages and their version numbers', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(612, 1, 'en', 'core/base/system', 'extra_information', 'Extra Information', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(613, 1, 'en', 'core/base/system', 'copy_report', 'Copy Report', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(614, 1, 'en', 'core/base/system', 'package_name', 'Package Name', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(615, 1, 'en', 'core/base/system', 'dependency_name', 'Dependency Name', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(616, 1, 'en', 'core/base/system', 'version', 'Version', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(617, 1, 'en', 'core/base/system', 'cms_version', 'CMS Version', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(618, 1, 'en', 'core/base/system', 'imagick_or_gd_ext', 'Imagick/GD Ext', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(619, 1, 'en', 'core/base/tables', 'id', 'ID', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(620, 1, 'en', 'core/base/tables', 'name', 'Name', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(621, 1, 'en', 'core/base/tables', 'slug', 'Slug', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(622, 1, 'en', 'core/base/tables', 'title', 'Title', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(623, 1, 'en', 'core/base/tables', 'order_by', 'Order By', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(624, 1, 'en', 'core/base/tables', 'order', 'Order', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(625, 1, 'en', 'core/base/tables', 'status', 'Status', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(626, 1, 'en', 'core/base/tables', 'created_at', 'Created At', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(627, 1, 'en', 'core/base/tables', 'updated_at', 'Updated At', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(628, 1, 'en', 'core/base/tables', 'description', 'Description', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(629, 1, 'en', 'core/base/tables', 'operations', 'Operations', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(630, 1, 'en', 'core/base/tables', 'url', 'URL', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(631, 1, 'en', 'core/base/tables', 'author', 'Author', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(632, 1, 'en', 'core/base/tables', 'notes', 'Notes', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(633, 1, 'en', 'core/base/tables', 'column', 'Column', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(634, 1, 'en', 'core/base/tables', 'origin', 'Origin', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(635, 1, 'en', 'core/base/tables', 'after_change', 'After changes', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(636, 1, 'en', 'core/base/tables', 'views', 'Views', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(637, 1, 'en', 'core/base/tables', 'browser', 'Browser', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(638, 1, 'en', 'core/base/tables', 'session', 'Session', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(639, 1, 'en', 'core/base/tables', 'activated', 'activated', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(640, 1, 'en', 'core/base/tables', 'deactivated', 'deactivated', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(641, 1, 'en', 'core/base/tables', 'is_featured', 'Is featured', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(642, 1, 'en', 'core/base/tables', 'edit', 'Edit', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(643, 1, 'en', 'core/base/tables', 'delete', 'Delete', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(644, 1, 'en', 'core/base/tables', 'restore', 'Restore', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(645, 1, 'en', 'core/base/tables', 'activate', 'Activate', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(646, 1, 'en', 'core/base/tables', 'deactivate', 'Deactivate', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(647, 1, 'en', 'core/base/tables', 'excel', 'Excel', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(648, 1, 'en', 'core/base/tables', 'export', 'Export', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(649, 1, 'en', 'core/base/tables', 'csv', 'CSV', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(650, 1, 'en', 'core/base/tables', 'pdf', 'PDF', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(651, 1, 'en', 'core/base/tables', 'print', 'Print', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(652, 1, 'en', 'core/base/tables', 'reset', 'Reset', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(653, 1, 'en', 'core/base/tables', 'reload', 'Reload', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(654, 1, 'en', 'core/base/tables', 'display', 'Display', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(655, 1, 'en', 'core/base/tables', 'all', 'All', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(656, 1, 'en', 'core/base/tables', 'add_new', 'Add New', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(657, 1, 'en', 'core/base/tables', 'action', 'Actions', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(658, 1, 'en', 'core/base/tables', 'delete_entry', 'Delete', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(659, 1, 'en', 'core/base/tables', 'view', 'View Detail', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(660, 1, 'en', 'core/base/tables', 'save', 'Save', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(661, 1, 'en', 'core/base/tables', 'show_from', 'Show from', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(662, 1, 'en', 'core/base/tables', 'to', 'to', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(663, 1, 'en', 'core/base/tables', 'in', 'in', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(664, 1, 'en', 'core/base/tables', 'records', 'records', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(665, 1, 'en', 'core/base/tables', 'no_data', 'No data to display', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(666, 1, 'en', 'core/base/tables', 'no_record', 'No record', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(667, 1, 'en', 'core/base/tables', 'confirm_delete', 'Confirm delete', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(668, 1, 'en', 'core/base/tables', 'confirm_delete_msg', 'Do you really want to delete this record?', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(669, 1, 'en', 'core/base/tables', 'confirm_delete_many_msg', 'Do you really want to delete selected record(s)?', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(670, 1, 'en', 'core/base/tables', 'cancel', 'Cancel', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(671, 1, 'en', 'core/base/tables', 'template', 'Template', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(672, 1, 'en', 'core/base/tables', 'email', 'Email', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(673, 1, 'en', 'core/base/tables', 'last_login', 'Last login', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(674, 1, 'en', 'core/base/tables', 'shortcode', 'Shortcode', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(675, 1, 'en', 'core/base/tables', 'image', 'Image', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(676, 1, 'en', 'core/base/tables', 'bulk_changes', 'Bulk changes', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(677, 1, 'en', 'core/base/tables', 'submit', 'Submit', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(678, 1, 'en', 'core/base/tables', 'please_select_record', 'Please select at least one record to perform this action!', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(679, 1, 'en', 'core/base/tabs', 'detail', 'Detail', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(680, 1, 'en', 'core/base/tabs', 'file', 'Files', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(681, 1, 'en', 'core/base/tabs', 'record_note', 'Record Note', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(682, 1, 'en', 'core/base/tabs', 'revision', 'Revision History', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(683, 1, 'vi', 'core/base/base', 'yes', 'Có', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(684, 1, 'vi', 'core/base/base', 'no', 'Không', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(685, 1, 'vi', 'core/base/base', 'is_default', 'Mặc định?', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(686, 1, 'vi', 'core/base/base', 'proc_close_disabled_error', 'Hàm proc_close() đã bị tắt. Vui lòng liên hệ nhà cung cấp hosting để mở hàm này. Hoặc có thể thêm vào .env: CAN_EXECUTE_COMMAND=false để tắt tính năng này.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(687, 1, 'vi', 'core/base/base', 'add_image', 'Thêm ảnh', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(688, 1, 'vi', 'core/base/base', 'change_image', 'Đổi ảnh', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(689, 1, 'vi', 'core/base/base', 'delete_image', 'Xóa ảnh', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(690, 1, 'vi', 'core/base/base', 'email_template.date_time', 'Ngày giờ hiện tại', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(691, 1, 'vi', 'core/base/base', 'email_template.date_year', 'Năm hiện tại', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(692, 1, 'vi', 'core/base/base', 'email_template.footer', 'Mẫu chân trang email', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(693, 1, 'vi', 'core/base/base', 'email_template.header', 'Mẫu đầu trang email', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(694, 1, 'vi', 'core/base/base', 'email_template.site_admin_email', 'Email quản trị viên', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(695, 1, 'vi', 'core/base/base', 'email_template.site_logo', 'Logo của trang', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(696, 1, 'vi', 'core/base/base', 'email_template.site_title', 'Tiêu đề trang', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(697, 1, 'vi', 'core/base/base', 'email_template.site_url', 'URL trang', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(698, 1, 'vi', 'core/base/base', 'image', 'Hình ảnh', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(699, 1, 'vi', 'core/base/base', 'preview_image', 'Ảnh xem trước', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(700, 1, 'vi', 'core/base/base', 'select_image', 'Chọn ảnh', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(701, 1, 'vi', 'core/base/base', 'to_add_more_image', 'để thêm hình ảnh', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(702, 1, 'vi', 'core/base/base', 'using_button', 'Sử dụng nút', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(703, 1, 'vi', 'core/base/cache', 'cache_management', 'Quản lý bộ nhớ đệm', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(704, 1, 'vi', 'core/base/cache', 'cache_commands', 'Các lệnh xoá bộ nhớ đệm cơ bản', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(705, 1, 'vi', 'core/base/cache', 'commands.clear_cms_cache.title', 'Xóa tất cả bộ đệm hiện có của ứng dụng', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(706, 1, 'vi', 'core/base/cache', 'commands.clear_cms_cache.description', 'Xóa các bộ nhớ đệm của ứng dụng: cơ sở dữ liệu, nội dung tĩnh... Chạy lệnh này khi bạn thử cập nhật dữ liệu nhưng giao diện không thay đổi', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(707, 1, 'vi', 'core/base/cache', 'commands.clear_cms_cache.success_msg', 'Bộ đệm đã được xóa', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(708, 1, 'vi', 'core/base/cache', 'commands.refresh_compiled_views.title', 'Làm mới bộ đệm giao diện', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(709, 1, 'vi', 'core/base/cache', 'commands.refresh_compiled_views.description', 'Làm mới bộ đệm giao diện giúp phần giao diện luôn mới nhất', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(710, 1, 'vi', 'core/base/cache', 'commands.refresh_compiled_views.success_msg', 'Bộ đệm giao diện đã được làm mới', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(711, 1, 'vi', 'core/base/cache', 'commands.clear_config_cache.title', 'Xóa bộ nhớ đệm của phần cấu hình', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(712, 1, 'vi', 'core/base/cache', 'commands.clear_config_cache.description', 'Bạn cần làm mới bộ đệm cấu hình khi bạn tạo ra sự thay đổi nào đó ở môi trường thành phẩm.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(713, 1, 'vi', 'core/base/cache', 'commands.clear_config_cache.success_msg', 'Bộ đệm cấu hình đã được xóa', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(714, 1, 'vi', 'core/base/cache', 'commands.clear_route_cache.title', 'Xoá cache đường dẫn', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(715, 1, 'vi', 'core/base/cache', 'commands.clear_route_cache.description', 'Cần thực hiện thao tác này khi thấy không xuất hiện đường dẫn mới.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(716, 1, 'vi', 'core/base/cache', 'commands.clear_route_cache.success_msg', 'Bộ đệm điều hướng đã bị xóa', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(717, 1, 'vi', 'core/base/cache', 'commands.clear_log.description', 'Xoá lịch sử lỗi', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(718, 1, 'vi', 'core/base/cache', 'commands.clear_log.success_msg', 'Lịch sử lỗi đã được làm sạch', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(719, 1, 'vi', 'core/base/cache', 'commands.clear_log.title', 'Xoá lịch sử lỗi', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(720, 1, 'vi', 'core/base/enums', 'statuses.draft', 'Bản nháp', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(721, 1, 'vi', 'core/base/enums', 'statuses.pending', 'Đang chờ xử lý', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(722, 1, 'vi', 'core/base/enums', 'statuses.published', 'Đã xuất bản', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(723, 1, 'vi', 'core/base/errors', '401_title', 'Bạn không có quyền truy cập trang này', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(724, 1, 'vi', 'core/base/errors', '401_msg', '<li>Bạn không được cấp quyền truy cập bởi quản trị viên.</li>\n	                <li>Bạn sử dụng sai loại tài khoản.</li>\n	                <li>Bạn không được cấp quyền để có thể truy cập trang này</li>', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(725, 1, 'vi', 'core/base/errors', '404_title', 'Không tìm thấy trang yêu cầu', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(726, 1, 'vi', 'core/base/errors', '404_msg', '<li>Trang bạn yêu cầu không tồn tại.</li>\n	                <li>Liên kết bạn vừa nhấn không còn được sử dụng.</li>\n	                <li>Trang này có thể đã được chuyển sang vị trí khác.</li>\n	                <li>Có thể có lỗi xảy ra.</li>\n	                <li>Bạn không được cấp quyền để có thể truy cập trang này</li>', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(727, 1, 'vi', 'core/base/errors', '500_title', 'Không thể tải trang', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(728, 1, 'vi', 'core/base/errors', '500_msg', '<li>Trang bạn yêu cầu không tồn tại.</li>\n	                <li>Liên kết bạn vừa nhấn không còn được sử dụng.</li>\n	                <li>Trang này có thể đã được chuyển sang vị trí khác.</li>\n	                <li>Có thể có lỗi xảy ra.</li>\n	                <li>Bạn không được cấp quyền để có thể truy cập trang này</li>', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(729, 1, 'vi', 'core/base/errors', 'reasons', 'Điều này có thể xảy ra vì nhiều lý do.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(730, 1, 'vi', 'core/base/errors', 'try_again', 'Vui lòng thử lại trong vài phút, hoặc quay trở lại trang chủ bằng cách <a href=\"http://cms.local/admin\"> nhấn vào đây </a>.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(731, 1, 'vi', 'core/base/errors', 'not_found', 'Không tìm thấy', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(732, 1, 'vi', 'core/base/forms', 'choose_image', 'Chọn ảnh', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(733, 1, 'vi', 'core/base/forms', 'actions', 'Tác vụ', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(734, 1, 'vi', 'core/base/forms', 'save', 'Lưu', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(735, 1, 'vi', 'core/base/forms', 'save_and_continue', 'Lưu & chỉnh sửa', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(736, 1, 'vi', 'core/base/forms', 'image', 'Hình ảnh', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(737, 1, 'vi', 'core/base/forms', 'image_placeholder', 'Chèn đường dẫn hình ảnh hoặc nhấn nút để chọn hình', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(738, 1, 'vi', 'core/base/forms', 'create', 'Tạo mới', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(739, 1, 'vi', 'core/base/forms', 'edit', 'Sửa', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(740, 1, 'vi', 'core/base/forms', 'permalink', 'Đường dẫn', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(741, 1, 'vi', 'core/base/forms', 'ok', 'OK', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(742, 1, 'vi', 'core/base/forms', 'cancel', 'Hủy bỏ', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(743, 1, 'vi', 'core/base/forms', 'character_remain', 'kí tự còn lại', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(744, 1, 'vi', 'core/base/forms', 'template', 'Template', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(745, 1, 'vi', 'core/base/forms', 'choose_file', 'Chọn tập tin', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(746, 1, 'vi', 'core/base/forms', 'file', 'Tập tin', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(747, 1, 'vi', 'core/base/forms', 'content', 'Nội dung', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(748, 1, 'vi', 'core/base/forms', 'description', 'Mô tả', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(749, 1, 'vi', 'core/base/forms', 'name', 'Tên', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(750, 1, 'vi', 'core/base/forms', 'name_placeholder', 'Nhập tên', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(751, 1, 'vi', 'core/base/forms', 'description_placeholder', 'Mô tả ngắn', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(752, 1, 'vi', 'core/base/forms', 'parent', 'Cha', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(753, 1, 'vi', 'core/base/forms', 'icon', 'Biểu tượng', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(754, 1, 'vi', 'core/base/forms', 'order_by', 'Sắp xếp', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(755, 1, 'vi', 'core/base/forms', 'order_by_placeholder', 'Sắp xếp', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(756, 1, 'vi', 'core/base/forms', 'slug', 'Slug', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(757, 1, 'vi', 'core/base/forms', 'is_featured', 'Nổi bật?', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(758, 1, 'vi', 'core/base/forms', 'is_default', 'Mặc định?', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(759, 1, 'vi', 'core/base/forms', 'icon_placeholder', 'Ví dụ: fa fa-home', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(760, 1, 'vi', 'core/base/forms', 'update', 'Cập nhật', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(761, 1, 'vi', 'core/base/forms', 'publish', 'Xuất bản', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(762, 1, 'vi', 'core/base/forms', 'remove_image', 'Xoá ảnh', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(763, 1, 'vi', 'core/base/forms', 'add', 'Thêm', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(764, 1, 'vi', 'core/base/forms', 'add_short_code', 'Thêm shortcode', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(765, 1, 'vi', 'core/base/forms', 'alias', 'Mã thay thế', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(766, 1, 'vi', 'core/base/forms', 'alias_placeholder', 'Mã thay thế', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(767, 1, 'vi', 'core/base/forms', 'basic_information', 'Thông tin cơ bản', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(768, 1, 'vi', 'core/base/forms', 'link', 'Liên kết', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(769, 1, 'vi', 'core/base/forms', 'order', 'Thứ tự', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(770, 1, 'vi', 'core/base/forms', 'short_code', 'Shortcode', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(771, 1, 'vi', 'core/base/forms', 'title', 'Tiêu đề', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(772, 1, 'vi', 'core/base/forms', 'value', 'Giá trị', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(773, 1, 'vi', 'core/base/forms', 'show_hide_editor', 'Ẩn/Hiện trình soạn thảo', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(774, 1, 'vi', 'core/base/forms', 'basic_info_title', 'Thông tin cơ bản', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(775, 1, 'vi', 'core/base/forms', 'remove_file', 'Xóa tập tin', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(776, 1, 'vi', 'core/base/layouts', 'platform_admin', 'Quản trị hệ thống', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(777, 1, 'vi', 'core/base/layouts', 'dashboard', 'Bảng điều khiển', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(778, 1, 'vi', 'core/base/layouts', 'widgets', 'Tiện ích', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(779, 1, 'vi', 'core/base/layouts', 'plugins', 'Tiện ích mở rộng', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(780, 1, 'vi', 'core/base/layouts', 'settings', 'Cài đặt', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(781, 1, 'vi', 'core/base/layouts', 'setting_general', 'Cơ bản', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(782, 1, 'vi', 'core/base/layouts', 'system_information', 'Thông tin hệ thống', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(783, 1, 'vi', 'core/base/layouts', 'theme', 'Giao diện', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(784, 1, 'vi', 'core/base/layouts', 'copyright', 'Bản quyền :year &copy; :company. Phiên bản: <span>:version</span>', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(785, 1, 'vi', 'core/base/layouts', 'profile', 'Thông tin cá nhân', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(786, 1, 'vi', 'core/base/layouts', 'logout', 'Đăng xuất', '2021-07-10 19:24:13', '2021-07-10 19:24:13');
INSERT INTO `translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(787, 1, 'vi', 'core/base/layouts', 'no_search_result', 'Không có kết quả tìm kiếm, hãy thử lại với từ khóa khác.', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(788, 1, 'vi', 'core/base/layouts', 'home', 'Trang chủ', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(789, 1, 'vi', 'core/base/layouts', 'search', 'Tìm kiếm', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(790, 1, 'vi', 'core/base/layouts', 'add_new', 'Thêm mới', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(791, 1, 'vi', 'core/base/layouts', 'n_a', 'N/A', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(792, 1, 'vi', 'core/base/layouts', 'page_loaded_time', 'Trang tải xong trong', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(793, 1, 'vi', 'core/base/layouts', 'view_website', 'Xem trang ngoài', '2021-07-10 19:24:13', '2021-07-10 19:24:13'),
(794, 1, 'vi', 'core/base/layouts', 'setting_email', 'Email', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(795, 1, 'vi', 'core/base/notices', 'create_success_message', 'Tạo thành công', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(796, 1, 'vi', 'core/base/notices', 'update_success_message', 'Cập nhật thành công', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(797, 1, 'vi', 'core/base/notices', 'delete_success_message', 'Xóa thành công', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(798, 1, 'vi', 'core/base/notices', 'success_header', 'Thành công!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(799, 1, 'vi', 'core/base/notices', 'error_header', 'Lỗi!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(800, 1, 'vi', 'core/base/notices', 'no_select', 'Chọn ít nhất 1 trường để thực hiện hành động này!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(801, 1, 'vi', 'core/base/notices', 'processing_request', 'Hệ thống đang xử lý yêu cầu.', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(802, 1, 'vi', 'core/base/notices', 'error', 'Lỗi!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(803, 1, 'vi', 'core/base/notices', 'success', 'Thành công!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(804, 1, 'vi', 'core/base/notices', 'info', 'Thông tin!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(805, 1, 'vi', 'core/base/notices', 'enum.validate_message', 'Giá trị của :attribute không hợp lệ', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(806, 1, 'vi', 'core/base/system', 'no_select', 'Hãy chọn ít nhất 1 trường để thực hiện hành động này!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(807, 1, 'vi', 'core/base/system', 'cannot_find_user', 'Không thể tải được thông tin người dùng', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(808, 1, 'vi', 'core/base/system', 'supper_revoked', 'Quyền quản trị viên cao nhất đã được gỡ bỏ', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(809, 1, 'vi', 'core/base/system', 'cannot_revoke_yourself', 'Không thể gỡ bỏ quyền quản trị cấp cao của chính bạn!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(810, 1, 'vi', 'core/base/system', 'cant_remove_supper', 'Bạn không có quyền xóa quản trị viên cấp cao', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(811, 1, 'vi', 'core/base/system', 'cant_find_user_with_email', 'Không thể tìm thấy người dùng với email này', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(812, 1, 'vi', 'core/base/system', 'supper_granted', 'Quyền quản trị cao nhất đã được gán', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(813, 1, 'vi', 'core/base/system', 'delete_log_success', 'Xóa tập tin log thành công!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(814, 1, 'vi', 'core/base/system', 'get_member_success', 'Hiển thị danh sách thành viên thành công', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(815, 1, 'vi', 'core/base/system', 'error_occur', 'Có lỗi dưới đây', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(816, 1, 'vi', 'core/base/system', 'role_and_permission', 'Phân quyền hệ thống', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(817, 1, 'vi', 'core/base/system', 'role_and_permission_description', 'Quản lý những phân quyền trong hệ thống', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(818, 1, 'vi', 'core/base/system', 'user.list_super', 'Danh sách quản trị viên cấp cao', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(819, 1, 'vi', 'core/base/system', 'user.username', 'Tên đăng nhập', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(820, 1, 'vi', 'core/base/system', 'user.email', 'Email', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(821, 1, 'vi', 'core/base/system', 'user.last_login', 'Đăng nhập lần cuối	', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(822, 1, 'vi', 'core/base/system', 'user.add_user', 'Thêm quản trị viên cấp cao', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(823, 1, 'vi', 'core/base/system', 'user.cancel', 'Hủy bỏ', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(824, 1, 'vi', 'core/base/system', 'user.create', 'Thêm', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(825, 1, 'vi', 'core/base/system', 'options.features', 'Kiểm soát truy cập các tính năng', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(826, 1, 'vi', 'core/base/system', 'options.feature_description', 'Bật/tắt các tính năng.', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(827, 1, 'vi', 'core/base/system', 'options.manage_super', 'Quản lý quản trị viên cấp cao', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(828, 1, 'vi', 'core/base/system', 'options.manage_super_description', 'Thêm/xóa quản trị viên cấp cao', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(829, 1, 'vi', 'core/base/system', 'options.info', 'Thông tin hệ thống', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(830, 1, 'vi', 'core/base/system', 'options.info_description', 'Những thông tin về cấu hình hiện tại của hệ thống.', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(831, 1, 'vi', 'core/base/system', 'info.title', 'Thông tin hệ thống', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(832, 1, 'vi', 'core/base/system', 'info.cache', 'Bộ nhớ đệm', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(833, 1, 'vi', 'core/base/system', 'info.environment', 'Môi trường', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(834, 1, 'vi', 'core/base/system', 'info.locale', 'Ngôn ngữ hệ thống', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(835, 1, 'vi', 'core/base/system', 'user_management', 'Quản lý thành viên', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(836, 1, 'vi', 'core/base/system', 'user_management_description', 'Quản lý người dùng trong hệ thống', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(837, 1, 'vi', 'core/base/system', 'app_size', 'Kích thước ứng dụng', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(838, 1, 'vi', 'core/base/system', 'cache_dir_writable', 'Có thể ghi bộ nhớ đệm', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(839, 1, 'vi', 'core/base/system', 'cache_driver', 'Loại lưu trữ bộ nhớ đệm', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(840, 1, 'vi', 'core/base/system', 'copy_report', 'Sao chép báo cáo', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(841, 1, 'vi', 'core/base/system', 'curl_ext', 'CURL Ext', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(842, 1, 'vi', 'core/base/system', 'database', 'Hệ thống dữ liệu', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(843, 1, 'vi', 'core/base/system', 'debug_mode', 'Chế độ sửa lỗi', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(844, 1, 'vi', 'core/base/system', 'dependency_name', 'Tên gói', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(845, 1, 'vi', 'core/base/system', 'exif_ext', 'Exif Ext', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(846, 1, 'vi', 'core/base/system', 'extra_information', 'Thông tin mở rộng', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(847, 1, 'vi', 'core/base/system', 'extra_stats', 'Thống kê thêm', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(848, 1, 'vi', 'core/base/system', 'file_info_ext', 'File info Ext', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(849, 1, 'vi', 'core/base/system', 'framework_version', 'Phiên bản framework', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(850, 1, 'vi', 'core/base/system', 'get_system_report', 'Lấy thông tin hệ thống', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(851, 1, 'vi', 'core/base/system', 'installed_packages', 'Các gói đã cài đặt và phiên bản', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(852, 1, 'vi', 'core/base/system', 'mbstring_ext', 'Mbstring Ext', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(853, 1, 'vi', 'core/base/system', 'openssl_ext', 'OpenSSL Ext', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(854, 1, 'vi', 'core/base/system', 'package_name', 'Tên gói', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(855, 1, 'vi', 'core/base/system', 'pdo_ext', 'PDO Ext', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(856, 1, 'vi', 'core/base/system', 'php_version', 'Phiên bản PHP', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(857, 1, 'vi', 'core/base/system', 'report_description', 'Vui lòng chia sẻ thông tin này nhằm mục đích điều tra nguyên nhân gây lỗi', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(858, 1, 'vi', 'core/base/system', 'server_environment', 'Môi trường máy chủ', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(859, 1, 'vi', 'core/base/system', 'server_os', 'Hệ điều hành của máy chủ', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(860, 1, 'vi', 'core/base/system', 'server_software', 'Phần mềm', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(861, 1, 'vi', 'core/base/system', 'session_driver', 'Loại lưu trữ phiên làm việc', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(862, 1, 'vi', 'core/base/system', 'ssl_installed', 'Đã cài đặt chứng chỉ SSL', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(863, 1, 'vi', 'core/base/system', 'storage_dir_writable', 'Có thể lưu trữ dữ liệu tạm', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(864, 1, 'vi', 'core/base/system', 'system_environment', 'Môi trường hệ thống', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(865, 1, 'vi', 'core/base/system', 'timezone', 'Múi giờ', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(866, 1, 'vi', 'core/base/system', 'tokenizer_ext', 'Tokenizer Ext', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(867, 1, 'vi', 'core/base/system', 'version', 'Phiên bản', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(868, 1, 'vi', 'core/base/system', 'cms_version', 'Phiên bản CMS', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(869, 1, 'vi', 'core/base/system', 'queue_connection', 'Queue Connection', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(870, 1, 'vi', 'core/base/system', 'disabled_in_demo_mode', 'Bạn không thể thực hiện hành động này ở chế độ demo!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(871, 1, 'vi', 'core/base/system', 'imagick_or_gd_ext', 'Imagick/GD Ext', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(872, 1, 'vi', 'core/base/system', 'php_version_error', 'Phiên bản PHP phải >= :version', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(873, 1, 'vi', 'core/base/tables', 'id', 'ID', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(874, 1, 'vi', 'core/base/tables', 'name', 'Tên', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(875, 1, 'vi', 'core/base/tables', 'order_by', 'Thứ tự', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(876, 1, 'vi', 'core/base/tables', 'status', 'Trạng thái', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(877, 1, 'vi', 'core/base/tables', 'created_at', 'Ngày tạo', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(878, 1, 'vi', 'core/base/tables', 'updated_at', 'Ngày cập nhật', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(879, 1, 'vi', 'core/base/tables', 'operations', 'Tác vụ', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(880, 1, 'vi', 'core/base/tables', 'url', 'URL', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(881, 1, 'vi', 'core/base/tables', 'author', 'Người tạo', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(882, 1, 'vi', 'core/base/tables', 'column', 'Cột', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(883, 1, 'vi', 'core/base/tables', 'origin', 'Bản cũ', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(884, 1, 'vi', 'core/base/tables', 'after_change', 'Sau khi thay đổi', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(885, 1, 'vi', 'core/base/tables', 'notes', 'Ghi chú', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(886, 1, 'vi', 'core/base/tables', 'activated', 'kích hoạt', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(887, 1, 'vi', 'core/base/tables', 'browser', 'Trình duyệt', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(888, 1, 'vi', 'core/base/tables', 'deactivated', 'hủy kích hoạt', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(889, 1, 'vi', 'core/base/tables', 'description', 'Mô tả', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(890, 1, 'vi', 'core/base/tables', 'session', 'Phiên', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(891, 1, 'vi', 'core/base/tables', 'views', 'Lượt xem', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(892, 1, 'vi', 'core/base/tables', 'restore', 'Khôi phục', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(893, 1, 'vi', 'core/base/tables', 'edit', 'Sửa', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(894, 1, 'vi', 'core/base/tables', 'delete', 'Xóa', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(895, 1, 'vi', 'core/base/tables', 'action', 'Hành động', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(896, 1, 'vi', 'core/base/tables', 'activate', 'Kích hoạt', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(897, 1, 'vi', 'core/base/tables', 'add_new', 'Thêm mới', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(898, 1, 'vi', 'core/base/tables', 'all', 'Tất cả', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(899, 1, 'vi', 'core/base/tables', 'cancel', 'Hủy bỏ', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(900, 1, 'vi', 'core/base/tables', 'confirm_delete', 'Xác nhận xóa', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(901, 1, 'vi', 'core/base/tables', 'confirm_delete_msg', 'Bạn có chắc chắn muốn xóa bản ghi này?', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(902, 1, 'vi', 'core/base/tables', 'csv', 'CSV', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(903, 1, 'vi', 'core/base/tables', 'deactivate', 'Hủy kích hoạt', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(904, 1, 'vi', 'core/base/tables', 'delete_entry', 'Xóa bản ghi', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(905, 1, 'vi', 'core/base/tables', 'display', 'Hiển thị', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(906, 1, 'vi', 'core/base/tables', 'excel', 'Excel', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(907, 1, 'vi', 'core/base/tables', 'export', 'Xuất bản', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(908, 1, 'vi', 'core/base/tables', 'in', 'trong tổng số', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(909, 1, 'vi', 'core/base/tables', 'no_data', 'Không có dữ liệu để hiển thị', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(910, 1, 'vi', 'core/base/tables', 'no_record', 'Không có dữ liệu', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(911, 1, 'vi', 'core/base/tables', 'pdf', 'PDF', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(912, 1, 'vi', 'core/base/tables', 'print', 'In', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(913, 1, 'vi', 'core/base/tables', 'records', 'bản ghi', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(914, 1, 'vi', 'core/base/tables', 'reload', 'Tải lại', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(915, 1, 'vi', 'core/base/tables', 'reset', 'Làm mới', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(916, 1, 'vi', 'core/base/tables', 'save', 'Lưu', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(917, 1, 'vi', 'core/base/tables', 'show_from', 'Hiển thị từ', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(918, 1, 'vi', 'core/base/tables', 'template', 'Giao diện', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(919, 1, 'vi', 'core/base/tables', 'to', 'đến', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(920, 1, 'vi', 'core/base/tables', 'view', 'Xem chi tiết', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(921, 1, 'vi', 'core/base/tables', 'email', 'Email', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(922, 1, 'vi', 'core/base/tables', 'image', 'Hình ảnh', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(923, 1, 'vi', 'core/base/tables', 'is_featured', 'Nổi bật', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(924, 1, 'vi', 'core/base/tables', 'last_login', 'Lần cuối đăng nhập', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(925, 1, 'vi', 'core/base/tables', 'order', 'Thứ tự', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(926, 1, 'vi', 'core/base/tables', 'shortcode', 'Shortcode', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(927, 1, 'vi', 'core/base/tables', 'slug', 'Slug', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(928, 1, 'vi', 'core/base/tables', 'title', 'Tiêu đề', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(929, 1, 'vi', 'core/base/tables', 'bulk_changes', 'Thay đổi hàng loạt', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(930, 1, 'vi', 'core/base/tables', 'confirm_delete_many_msg', 'Bạn có chắc chắn muốn xóa những bản ghi này?', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(931, 1, 'vi', 'core/base/tables', 'submit', 'Hoàn tất', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(932, 1, 'vi', 'core/base/tabs', 'detail', 'Chi tiết', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(933, 1, 'vi', 'core/base/tabs', 'file', 'Tập tin', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(934, 1, 'vi', 'core/base/tabs', 'record_note', 'Ghi chú', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(935, 1, 'vi', 'core/base/tabs', 'revision', 'Lịch sử thay đổi', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(936, 1, 'en', 'core/dashboard/dashboard', 'update_position_success', 'Update widget position successfully!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(937, 1, 'en', 'core/dashboard/dashboard', 'hide_success', 'Update widget successfully!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(938, 1, 'en', 'core/dashboard/dashboard', 'confirm_hide', 'Are you sure?', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(939, 1, 'en', 'core/dashboard/dashboard', 'hide_message', 'Do you really want to hide this widget? It will be disappear on Dashboard!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(940, 1, 'en', 'core/dashboard/dashboard', 'confirm_hide_btn', 'Yes, hide this widget', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(941, 1, 'en', 'core/dashboard/dashboard', 'cancel_hide_btn', 'Cancel', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(942, 1, 'en', 'core/dashboard/dashboard', 'collapse_expand', 'Collapse/Expand', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(943, 1, 'en', 'core/dashboard/dashboard', 'hide', 'Hide', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(944, 1, 'en', 'core/dashboard/dashboard', 'reload', 'Reload', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(945, 1, 'en', 'core/dashboard/dashboard', 'save_setting_success', 'Save widget settings successfully!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(946, 1, 'en', 'core/dashboard/dashboard', 'widget_not_exists', 'Widget is not exits!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(947, 1, 'en', 'core/dashboard/dashboard', 'manage_widgets', 'Manage Widgets', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(948, 1, 'en', 'core/dashboard/dashboard', 'fullscreen', 'Full screen', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(949, 1, 'en', 'core/dashboard/dashboard', 'title', 'Dashboard', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(950, 1, 'vi', 'core/dashboard/dashboard', 'cancel_hide_btn', 'Hủy bỏ', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(951, 1, 'vi', 'core/dashboard/dashboard', 'collapse_expand', 'Mở rộng', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(952, 1, 'vi', 'core/dashboard/dashboard', 'confirm_hide', 'Bạn có chắc?', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(953, 1, 'vi', 'core/dashboard/dashboard', 'confirm_hide_btn', 'Vâng, ẩn tiện ích này', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(954, 1, 'vi', 'core/dashboard/dashboard', 'hide', 'Ẩn', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(955, 1, 'vi', 'core/dashboard/dashboard', 'hide_message', 'Bạn có chắc chắn muốn ẩn tiện ích này? Nó sẽ không được hiển thị trên trang chủ nữa!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(956, 1, 'vi', 'core/dashboard/dashboard', 'hide_success', 'Ẩn tiện ích thành công!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(957, 1, 'vi', 'core/dashboard/dashboard', 'manage_widgets', 'Quản lý tiện ích', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(958, 1, 'vi', 'core/dashboard/dashboard', 'reload', 'Làm mới', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(959, 1, 'vi', 'core/dashboard/dashboard', 'save_setting_success', 'Lưu tiện ích thành công', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(960, 1, 'vi', 'core/dashboard/dashboard', 'update_position_success', 'Cập nhật vị trí tiện ích thành công!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(961, 1, 'vi', 'core/dashboard/dashboard', 'widget_not_exists', 'Tiện ích này không tồn tại!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(962, 1, 'vi', 'core/dashboard/dashboard', 'fullscreen', 'Toàn màn hình', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(963, 1, 'vi', 'core/dashboard/dashboard', 'title', 'Trang quản trị', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(964, 1, 'en', 'core/media/media', 'filter', 'Filter', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(965, 1, 'en', 'core/media/media', 'everything', 'Everything', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(966, 1, 'en', 'core/media/media', 'image', 'Image', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(967, 1, 'en', 'core/media/media', 'video', 'Video', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(968, 1, 'en', 'core/media/media', 'document', 'Document', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(969, 1, 'en', 'core/media/media', 'view_in', 'View in', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(970, 1, 'en', 'core/media/media', 'all_media', 'All media', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(971, 1, 'en', 'core/media/media', 'trash', 'Trash', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(972, 1, 'en', 'core/media/media', 'recent', 'Recent', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(973, 1, 'en', 'core/media/media', 'favorites', 'Favorites', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(974, 1, 'en', 'core/media/media', 'upload', 'Upload', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(975, 1, 'en', 'core/media/media', 'create_folder', 'Create folder', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(976, 1, 'en', 'core/media/media', 'refresh', 'Refresh', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(977, 1, 'en', 'core/media/media', 'empty_trash', 'Empty trash', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(978, 1, 'en', 'core/media/media', 'search_file_and_folder', 'Search file and folder', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(979, 1, 'en', 'core/media/media', 'sort', 'Sort', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(980, 1, 'en', 'core/media/media', 'file_name_asc', 'File name - ASC', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(981, 1, 'en', 'core/media/media', 'file_name_desc', 'File name - DESC', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(982, 1, 'en', 'core/media/media', 'uploaded_date_asc', 'Uploaded date - ASC', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(983, 1, 'en', 'core/media/media', 'uploaded_date_desc', 'Uploaded date - DESC', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(984, 1, 'en', 'core/media/media', 'size_asc', 'Size - ASC', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(985, 1, 'en', 'core/media/media', 'size_desc', 'Size - DESC', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(986, 1, 'en', 'core/media/media', 'actions', 'Actions', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(987, 1, 'en', 'core/media/media', 'nothing_is_selected', 'Nothing is selected', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(988, 1, 'en', 'core/media/media', 'insert', 'Insert', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(989, 1, 'en', 'core/media/media', 'folder_name', 'Folder name', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(990, 1, 'en', 'core/media/media', 'create', 'Create', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(991, 1, 'en', 'core/media/media', 'rename', 'Rename', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(992, 1, 'en', 'core/media/media', 'close', 'Close', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(993, 1, 'en', 'core/media/media', 'save_changes', 'Save changes', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(994, 1, 'en', 'core/media/media', 'move_to_trash', 'Move items to trash', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(995, 1, 'en', 'core/media/media', 'confirm_trash', 'Are you sure you want to move these items to trash?', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(996, 1, 'en', 'core/media/media', 'confirm', 'Confirm', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(997, 1, 'en', 'core/media/media', 'confirm_delete', 'Delete item(s)', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(998, 1, 'en', 'core/media/media', 'confirm_delete_description', 'Your request cannot rollback. Are you sure you wanna delete these items?', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(999, 1, 'en', 'core/media/media', 'empty_trash_title', 'Empty trash', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1000, 1, 'en', 'core/media/media', 'empty_trash_description', 'Your request cannot rollback. Are you sure you wanna remove all items in trash?', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1001, 1, 'en', 'core/media/media', 'up_level', 'Up one level', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1002, 1, 'en', 'core/media/media', 'upload_progress', 'Upload progress', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1003, 1, 'en', 'core/media/media', 'folder_created', 'Folder is created successfully!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1004, 1, 'en', 'core/media/media', 'gallery', 'Media gallery', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1005, 1, 'en', 'core/media/media', 'trash_error', 'Error when delete selected item(s)', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1006, 1, 'en', 'core/media/media', 'trash_success', 'Moved selected item(s) to trash successfully!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1007, 1, 'en', 'core/media/media', 'restore_error', 'Error when restore selected item(s)', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1008, 1, 'en', 'core/media/media', 'restore_success', 'Restore selected item(s) successfully!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1009, 1, 'en', 'core/media/media', 'copy_success', 'Copied selected item(s) successfully!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1010, 1, 'en', 'core/media/media', 'delete_success', 'Deleted selected item(s) successfully!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1011, 1, 'en', 'core/media/media', 'favorite_success', 'Favorite selected item(s) successfully!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1012, 1, 'en', 'core/media/media', 'remove_favorite_success', 'Remove selected item(s) from favorites successfully!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1013, 1, 'en', 'core/media/media', 'rename_error', 'Error when rename item(s)', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1014, 1, 'en', 'core/media/media', 'rename_success', 'Rename selected item(s) successfully!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1015, 1, 'en', 'core/media/media', 'empty_trash_success', 'Empty trash successfully!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1016, 1, 'en', 'core/media/media', 'invalid_action', 'Invalid action!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1017, 1, 'en', 'core/media/media', 'file_not_exists', 'File is not exists!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1018, 1, 'en', 'core/media/media', 'download_file_error', 'Error when downloading files!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1019, 1, 'en', 'core/media/media', 'missing_zip_archive_extension', 'Please enable ZipArchive extension to download file!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1020, 1, 'en', 'core/media/media', 'can_not_download_file', 'Can not download this file!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1021, 1, 'en', 'core/media/media', 'invalid_request', 'Invalid request!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1022, 1, 'en', 'core/media/media', 'add_success', 'Add item successfully!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1023, 1, 'en', 'core/media/media', 'file_too_big', 'File too big. Max file upload is :size bytes', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1024, 1, 'en', 'core/media/media', 'can_not_detect_file_type', 'File type is not allowed or can not detect file type!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1025, 1, 'en', 'core/media/media', 'upload_failed', 'The file is NOT uploaded completely. The server allows max upload file size is :size . Please check your file size OR try to upload again in case of having network errors', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1026, 1, 'en', 'core/media/media', 'menu_name', 'Media', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1027, 1, 'en', 'core/media/media', 'add', 'Add media', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1028, 1, 'en', 'core/media/media', 'javascript.name', 'Name', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1029, 1, 'en', 'core/media/media', 'javascript.url', 'URL', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1030, 1, 'en', 'core/media/media', 'javascript.full_url', 'Full URL', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1031, 1, 'en', 'core/media/media', 'javascript.size', 'Size', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1032, 1, 'en', 'core/media/media', 'javascript.mime_type', 'Type', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1033, 1, 'en', 'core/media/media', 'javascript.created_at', 'Uploaded at', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1034, 1, 'en', 'core/media/media', 'javascript.updated_at', 'Modified at', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1035, 1, 'en', 'core/media/media', 'javascript.nothing_selected', 'Nothing is selected', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1036, 1, 'en', 'core/media/media', 'javascript.visit_link', 'Open link', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1037, 1, 'en', 'core/media/media', 'javascript.no_item.all_media.icon', 'fas fa-cloud-upload-alt', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1038, 1, 'en', 'core/media/media', 'javascript.no_item.all_media.title', 'Drop files and folders here', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1039, 1, 'en', 'core/media/media', 'javascript.no_item.all_media.message', 'Or use the upload button above', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1040, 1, 'en', 'core/media/media', 'javascript.no_item.trash.icon', 'fas fa-trash-alt', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1041, 1, 'en', 'core/media/media', 'javascript.no_item.trash.title', 'There is nothing in your trash currently', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1042, 1, 'en', 'core/media/media', 'javascript.no_item.trash.message', 'Delete files to move them to trash automatically. Delete files from trash to remove them permanently', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1043, 1, 'en', 'core/media/media', 'javascript.no_item.favorites.icon', 'fas fa-star', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1044, 1, 'en', 'core/media/media', 'javascript.no_item.favorites.title', 'You have not added anything to your favorites yet', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1045, 1, 'en', 'core/media/media', 'javascript.no_item.favorites.message', 'Add files to favorites to easily find them later', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1046, 1, 'en', 'core/media/media', 'javascript.no_item.recent.icon', 'far fa-clock', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1047, 1, 'en', 'core/media/media', 'javascript.no_item.recent.title', 'You did not opened anything yet', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1048, 1, 'en', 'core/media/media', 'javascript.no_item.recent.message', 'All recent files that you opened will be appeared here', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1049, 1, 'en', 'core/media/media', 'javascript.no_item.default.icon', 'fas fa-sync', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1050, 1, 'en', 'core/media/media', 'javascript.no_item.default.title', 'No items', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1051, 1, 'en', 'core/media/media', 'javascript.no_item.default.message', 'This directory has no item', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1052, 1, 'en', 'core/media/media', 'javascript.clipboard.success', 'These file links has been copied to clipboard', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1053, 1, 'en', 'core/media/media', 'javascript.message.error_header', 'Error', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1054, 1, 'en', 'core/media/media', 'javascript.message.success_header', 'Success', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1055, 1, 'en', 'core/media/media', 'javascript.download.error', 'No files selected or cannot download these files', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1056, 1, 'en', 'core/media/media', 'javascript.actions_list.basic.preview', 'Preview', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1057, 1, 'en', 'core/media/media', 'javascript.actions_list.file.copy_link', 'Copy link', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1058, 1, 'en', 'core/media/media', 'javascript.actions_list.file.rename', 'Rename', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1059, 1, 'en', 'core/media/media', 'javascript.actions_list.file.make_copy', 'Make a copy', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1060, 1, 'en', 'core/media/media', 'javascript.actions_list.user.favorite', 'Add to favorite', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1061, 1, 'en', 'core/media/media', 'javascript.actions_list.user.remove_favorite', 'Remove favorite', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1062, 1, 'en', 'core/media/media', 'javascript.actions_list.other.download', 'Download', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1063, 1, 'en', 'core/media/media', 'javascript.actions_list.other.trash', 'Move to trash', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1064, 1, 'en', 'core/media/media', 'javascript.actions_list.other.delete', 'Delete permanently', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1065, 1, 'en', 'core/media/media', 'javascript.actions_list.other.restore', 'Restore', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1066, 1, 'en', 'core/media/media', 'name_invalid', 'The folder name has invalid character(s).', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1067, 1, 'en', 'core/media/media', 'url_invalid', 'Please provide a valid URL', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1068, 1, 'en', 'core/media/media', 'path_invalid', 'Please provide a valid path', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1069, 1, 'vi', 'core/media/media', 'filter', 'Lọc', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1070, 1, 'vi', 'core/media/media', 'everything', 'Tất cả', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1071, 1, 'vi', 'core/media/media', 'image', 'Hình ảnh', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1072, 1, 'vi', 'core/media/media', 'video', 'Phim', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1073, 1, 'vi', 'core/media/media', 'document', 'Tài liệu', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1074, 1, 'vi', 'core/media/media', 'view_in', 'Chế độ xem', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1075, 1, 'vi', 'core/media/media', 'all_media', 'Tất cả tập tin', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1076, 1, 'vi', 'core/media/media', 'trash', 'Thùng rác', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1077, 1, 'vi', 'core/media/media', 'recent', 'Gần đây', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1078, 1, 'vi', 'core/media/media', 'favorites', 'Được gắn dấu sao', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1079, 1, 'vi', 'core/media/media', 'upload', 'Tải lên', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1080, 1, 'vi', 'core/media/media', 'create_folder', 'Tạo thư mục', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1081, 1, 'vi', 'core/media/media', 'refresh', 'Làm mới', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1082, 1, 'vi', 'core/media/media', 'empty_trash', 'Dọn thùng rác', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1083, 1, 'vi', 'core/media/media', 'search_file_and_folder', 'Tìm kiếm tập tin và thư mục', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1084, 1, 'vi', 'core/media/media', 'sort', 'Sắp xếp', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1085, 1, 'vi', 'core/media/media', 'file_name_asc', 'Tên tập tin - ASC', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1086, 1, 'vi', 'core/media/media', 'file_name_desc', 'Tên tập tin - DESC', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1087, 1, 'vi', 'core/media/media', 'uploaded_date_asc', 'Ngày tải lên - ASC', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1088, 1, 'vi', 'core/media/media', 'uploaded_date_desc', 'Ngày tải lên - DESC', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1089, 1, 'vi', 'core/media/media', 'size_asc', 'Kích thước - ASC', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1090, 1, 'vi', 'core/media/media', 'size_desc', 'Kích thước - DESC', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1091, 1, 'vi', 'core/media/media', 'actions', 'Hành động', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1092, 1, 'vi', 'core/media/media', 'nothing_is_selected', 'Không có tập tin nào được chọn', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1093, 1, 'vi', 'core/media/media', 'insert', 'Chèn', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1094, 1, 'vi', 'core/media/media', 'folder_name', 'Tên thư mục', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1095, 1, 'vi', 'core/media/media', 'create', 'Tạo', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1096, 1, 'vi', 'core/media/media', 'rename', 'Đổi tên', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1097, 1, 'vi', 'core/media/media', 'close', 'Đóng', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1098, 1, 'vi', 'core/media/media', 'save_changes', 'Lưu thay đổi', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1099, 1, 'vi', 'core/media/media', 'move_to_trash', 'Đưa vào thùng rác', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1100, 1, 'vi', 'core/media/media', 'confirm_trash', 'Bạn có chắc chắn muốn bỏ những tập tin này vào thùng rác?', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1101, 1, 'vi', 'core/media/media', 'confirm', 'Xác nhận', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1102, 1, 'vi', 'core/media/media', 'confirm_delete', 'Xóa tập tin', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1103, 1, 'vi', 'core/media/media', 'confirm_delete_description', 'Hành động này không thể khôi phục. Bạn có chắc chắn muốn xóa các tập tin này?', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1104, 1, 'vi', 'core/media/media', 'empty_trash_title', 'Dọn sạch thùng rác', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1105, 1, 'vi', 'core/media/media', 'empty_trash_description', 'Hành động này không thể khôi phục. Bạn có chắc chắn muốn dọn sạch thùng rác?', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1106, 1, 'vi', 'core/media/media', 'up_level', 'Quay lại một cấp', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1107, 1, 'vi', 'core/media/media', 'upload_progress', 'Tiến trình tải lên', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1108, 1, 'vi', 'core/media/media', 'folder_created', 'Tạo thư mục thành công!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1109, 1, 'vi', 'core/media/media', 'gallery', 'Thư viện tập tin', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1110, 1, 'vi', 'core/media/media', 'trash_error', 'Có lỗi khi xóa tập tin/thư mục', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1111, 1, 'vi', 'core/media/media', 'trash_success', 'Xóa tập tin/thư mục thành công!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1112, 1, 'vi', 'core/media/media', 'restore_error', 'Có lỗi trong quá trình khôi phục', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1113, 1, 'vi', 'core/media/media', 'restore_success', 'Khôi phục thành công!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1114, 1, 'vi', 'core/media/media', 'copy_success', 'Sao chép thành công!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1115, 1, 'vi', 'core/media/media', 'delete_success', 'Xóa thành công!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1116, 1, 'vi', 'core/media/media', 'favorite_success', 'Thêm dấu sao thành công!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1117, 1, 'vi', 'core/media/media', 'remove_favorite_success', 'Bỏ dấu sao thành công!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1118, 1, 'vi', 'core/media/media', 'rename_error', 'Có lỗi trong quá trình đổi tên', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1119, 1, 'vi', 'core/media/media', 'rename_success', 'Đổi tên thành công!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1120, 1, 'vi', 'core/media/media', 'invalid_action', 'Hành động không hợp lệ!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1121, 1, 'vi', 'core/media/media', 'file_not_exists', 'Tập tin không tồn tại!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1122, 1, 'vi', 'core/media/media', 'download_file_error', 'Có lỗi trong quá trình tải xuống tập tin!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1123, 1, 'vi', 'core/media/media', 'missing_zip_archive_extension', 'Hãy bật ZipArchive extension để tải tập tin!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1124, 1, 'vi', 'core/media/media', 'can_not_download_file', 'Không thể tải tập tin!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1125, 1, 'vi', 'core/media/media', 'invalid_request', 'Yêu cầu không hợp lệ!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1126, 1, 'vi', 'core/media/media', 'add_success', 'Thêm thành công!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1127, 1, 'vi', 'core/media/media', 'file_too_big', 'Tập tin quá lớn. Giới hạn tải lên là :size bytes', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1128, 1, 'vi', 'core/media/media', 'can_not_detect_file_type', 'Loại tập tin không hợp lệ hoặc không thể xác định loại tập tin!', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1129, 1, 'vi', 'core/media/media', 'upload_failed', 'The file is NOT uploaded completely. The server allows max upload file size is :size . Please check your file size OR try to upload again in case of having network errors', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1130, 1, 'vi', 'core/media/media', 'menu_name', 'Quản lý tập tin', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1131, 1, 'vi', 'core/media/media', 'add', 'Thêm tập tin', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1132, 1, 'vi', 'core/media/media', 'javascript.name', 'Tên', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1133, 1, 'vi', 'core/media/media', 'javascript.url', 'Đường dẫn', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1134, 1, 'vi', 'core/media/media', 'javascript.full_url', 'Đường dẫn tuyệt đối', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1135, 1, 'vi', 'core/media/media', 'javascript.size', 'Kích thước', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1136, 1, 'vi', 'core/media/media', 'javascript.mime_type', 'Loại', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1137, 1, 'vi', 'core/media/media', 'javascript.created_at', 'Được tải lên lúc', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1138, 1, 'vi', 'core/media/media', 'javascript.updated_at', 'Được chỉnh sửa lúc', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1139, 1, 'vi', 'core/media/media', 'javascript.nothing_selected', 'Bạn chưa chọn tập tin nào', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1140, 1, 'vi', 'core/media/media', 'javascript.visit_link', 'Mở liên kết', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1141, 1, 'vi', 'core/media/media', 'javascript.no_item.all_media.icon', 'fas fa-cloud-upload-alt', '2021-07-10 19:24:14', '2021-07-10 19:24:14'),
(1142, 1, 'vi', 'core/media/media', 'javascript.no_item.all_media.title', 'Bạn có thể kéo thả tập tin vào đây để tải lên', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1143, 1, 'vi', 'core/media/media', 'javascript.no_item.all_media.message', 'Hoặc có thể bấm nút Tải lên ở phía trên', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1144, 1, 'vi', 'core/media/media', 'javascript.no_item.trash.icon', 'fas fa-trash-alt', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1145, 1, 'vi', 'core/media/media', 'javascript.no_item.trash.title', 'Hiện tại không có tập tin nào trong thùng rác', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1146, 1, 'vi', 'core/media/media', 'javascript.no_item.trash.message', 'Xóa tập tin sẽ đem tập tin lưu vào thùng rác. Xóa tập tin trong thùng rác sẽ xóa vĩnh viễn.', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1147, 1, 'vi', 'core/media/media', 'javascript.no_item.favorites.icon', 'fas fa-star', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1148, 1, 'vi', 'core/media/media', 'javascript.no_item.favorites.title', 'Bạn chưa đặt tập tin nào vào mục yêu thích', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1149, 1, 'vi', 'core/media/media', 'javascript.no_item.favorites.message', 'Thêm tập tin vào mục yêu thích để tìm kiếm chúng dễ dàng sau này.', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1150, 1, 'vi', 'core/media/media', 'javascript.no_item.recent.icon', 'far fa-clock', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1151, 1, 'vi', 'core/media/media', 'javascript.no_item.recent.title', 'Bạn chưa mở tập tin nào.', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1152, 1, 'vi', 'core/media/media', 'javascript.no_item.recent.message', 'Mục này hiển thị các tập tin bạn đã xem gần đây.', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1153, 1, 'vi', 'core/media/media', 'javascript.no_item.default.icon', 'fas fa-sync', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1154, 1, 'vi', 'core/media/media', 'javascript.no_item.default.title', 'Thư mục trống', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1155, 1, 'vi', 'core/media/media', 'javascript.no_item.default.message', 'Thư mục này chưa có tập tin nào', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1156, 1, 'vi', 'core/media/media', 'javascript.clipboard.success', 'Đường dẫn của các tập tin đã được sao chép vào clipboard', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1157, 1, 'vi', 'core/media/media', 'javascript.message.error_header', 'Lỗi', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1158, 1, 'vi', 'core/media/media', 'javascript.message.success_header', 'Thành công', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1159, 1, 'vi', 'core/media/media', 'javascript.download.error', 'Bạn chưa chọn tập tin nào hoặc tập tin này không cho phép tải về', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1160, 1, 'vi', 'core/media/media', 'javascript.actions_list.basic.preview', 'Xem trước', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1161, 1, 'vi', 'core/media/media', 'javascript.actions_list.file.copy_link', 'Sao chép đường dẫn', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1162, 1, 'vi', 'core/media/media', 'javascript.actions_list.file.rename', 'Đổi tên', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1163, 1, 'vi', 'core/media/media', 'javascript.actions_list.file.make_copy', 'Nhân bản', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1164, 1, 'vi', 'core/media/media', 'javascript.actions_list.user.favorite', 'Yêu thích', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1165, 1, 'vi', 'core/media/media', 'javascript.actions_list.user.remove_favorite', 'Xóa khỏi mục yêu thích', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1166, 1, 'vi', 'core/media/media', 'javascript.actions_list.other.download', 'Tải xuống', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1167, 1, 'vi', 'core/media/media', 'javascript.actions_list.other.trash', 'Chuyển vào thùng rác', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1168, 1, 'vi', 'core/media/media', 'javascript.actions_list.other.delete', 'Xóa hoàn toàn', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1169, 1, 'vi', 'core/media/media', 'javascript.actions_list.other.restore', 'Khôi phục', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1170, 1, 'vi', 'core/media/media', 'empty_trash_success', 'Dọn sạch thùng rác thành công', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1171, 1, 'vi', 'core/media/media', 'name_invalid', 'Tên thư mục chứa ký tự không hợp lệ', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1172, 1, 'vi', 'core/media/media', 'path_invalid', 'Vui lòng cung cấp 1 đường dẫn hợp lệ', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1173, 1, 'vi', 'core/media/media', 'url_invalid', 'Vui lòng cung cấp 1 đường dẫn hợp lệ', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1174, 1, 'en', 'core/setting/setting', 'title', 'Settings', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1175, 1, 'en', 'core/setting/setting', 'email_setting_title', 'Email settings', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1176, 1, 'en', 'core/setting/setting', 'general.theme', 'Theme', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1177, 1, 'en', 'core/setting/setting', 'general.description', 'Setting site information', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1178, 1, 'en', 'core/setting/setting', 'general.title', 'General', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1179, 1, 'en', 'core/setting/setting', 'general.general_block', 'General Information', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1180, 1, 'en', 'core/setting/setting', 'general.rich_editor', 'Rich Editor', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1181, 1, 'en', 'core/setting/setting', 'general.site_title', 'Site title', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1182, 1, 'en', 'core/setting/setting', 'general.admin_email', 'Admin Email', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1183, 1, 'en', 'core/setting/setting', 'general.seo_block', 'SEO Configuration', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1184, 1, 'en', 'core/setting/setting', 'general.seo_title', 'SEO Title', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1185, 1, 'en', 'core/setting/setting', 'general.seo_description', 'SEO Description', '2021-07-10 19:24:15', '2021-07-10 19:24:15');
INSERT INTO `translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1186, 1, 'en', 'core/setting/setting', 'general.webmaster_tools_block', 'Google Webmaster Tools', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1187, 1, 'en', 'core/setting/setting', 'general.google_site_verification', 'Google site verification', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1188, 1, 'en', 'core/setting/setting', 'general.placeholder.site_title', 'Site Title (maximum 120 characters)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1189, 1, 'en', 'core/setting/setting', 'general.placeholder.admin_email', 'Admin Email', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1190, 1, 'en', 'core/setting/setting', 'general.placeholder.seo_title', 'SEO Title (maximum 120 characters)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1191, 1, 'en', 'core/setting/setting', 'general.placeholder.seo_description', 'SEO Description (maximum 120 characters)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1192, 1, 'en', 'core/setting/setting', 'general.placeholder.google_analytics', 'Google Analytics', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1193, 1, 'en', 'core/setting/setting', 'general.placeholder.google_site_verification', 'Google Site Verification', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1194, 1, 'en', 'core/setting/setting', 'general.cache_admin_menu', 'Cache admin menu?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1195, 1, 'en', 'core/setting/setting', 'general.enable_send_error_reporting_via_email', 'Enable to send error reporting via email?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1196, 1, 'en', 'core/setting/setting', 'general.time_zone', 'Timezone', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1197, 1, 'en', 'core/setting/setting', 'general.default_admin_theme', 'Default admin theme', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1198, 1, 'en', 'core/setting/setting', 'general.enable_change_admin_theme', 'Enable change admin theme?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1199, 1, 'en', 'core/setting/setting', 'general.enable', 'Enable', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1200, 1, 'en', 'core/setting/setting', 'general.disable', 'Disable', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1201, 1, 'en', 'core/setting/setting', 'general.enable_cache', 'Enable cache?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1202, 1, 'en', 'core/setting/setting', 'general.cache_time', 'Cache time (minutes)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1203, 1, 'en', 'core/setting/setting', 'general.cache_time_site_map', 'Cache Time Site map', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1204, 1, 'en', 'core/setting/setting', 'general.admin_logo', 'Admin logo', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1205, 1, 'en', 'core/setting/setting', 'general.admin_favicon', 'Admin favicon', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1206, 1, 'en', 'core/setting/setting', 'general.admin_title', 'Admin title', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1207, 1, 'en', 'core/setting/setting', 'general.admin_title_placeholder', 'Title show to tab of browser', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1208, 1, 'en', 'core/setting/setting', 'general.cache_block', 'Cache', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1209, 1, 'en', 'core/setting/setting', 'general.admin_appearance_title', 'Admin appearance', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1210, 1, 'en', 'core/setting/setting', 'general.admin_appearance_description', 'Setting admin appearance such as editor, language...', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1211, 1, 'en', 'core/setting/setting', 'general.seo_block_description', 'Setting site title, site meta description, site keyword for optimize SEO', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1212, 1, 'en', 'core/setting/setting', 'general.webmaster_tools_description', 'Google Webmaster Tools (GWT) is free software that helps you manage the technical side of your website', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1213, 1, 'en', 'core/setting/setting', 'general.cache_description', 'Config cache for system for optimize speed', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1214, 1, 'en', 'core/setting/setting', 'general.yes', 'Yes', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1215, 1, 'en', 'core/setting/setting', 'general.no', 'No', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1216, 1, 'en', 'core/setting/setting', 'general.show_on_front', 'Your homepage displays', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1217, 1, 'en', 'core/setting/setting', 'general.select', '— Select —', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1218, 1, 'en', 'core/setting/setting', 'general.show_site_name', 'Show site name after page title, separate with \"-\"?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1219, 1, 'en', 'core/setting/setting', 'general.locale', 'Site language', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1220, 1, 'en', 'core/setting/setting', 'general.locale_direction', 'Front site language direction', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1221, 1, 'en', 'core/setting/setting', 'general.admin_locale_direction', 'Admin language direction', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1222, 1, 'en', 'core/setting/setting', 'general.admin_login_screen_backgrounds', 'Login screen backgrounds (~1366x768)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1223, 1, 'en', 'core/setting/setting', 'email.subject', 'Subject', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1224, 1, 'en', 'core/setting/setting', 'email.content', 'Content', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1225, 1, 'en', 'core/setting/setting', 'email.title', 'Setting for email template', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1226, 1, 'en', 'core/setting/setting', 'email.description', 'Email template using HTML & system variables.', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1227, 1, 'en', 'core/setting/setting', 'email.reset_to_default', 'Reset to default', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1228, 1, 'en', 'core/setting/setting', 'email.back', 'Back to settings', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1229, 1, 'en', 'core/setting/setting', 'email.reset_success', 'Reset back to default successfully', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1230, 1, 'en', 'core/setting/setting', 'email.confirm_reset', 'Confirm reset email template?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1231, 1, 'en', 'core/setting/setting', 'email.confirm_message', 'Do you really want to reset this email template to default?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1232, 1, 'en', 'core/setting/setting', 'email.continue', 'Continue', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1233, 1, 'en', 'core/setting/setting', 'email.sender_name', 'Sender name', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1234, 1, 'en', 'core/setting/setting', 'email.sender_name_placeholder', 'Name', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1235, 1, 'en', 'core/setting/setting', 'email.sender_email', 'Sender email', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1236, 1, 'en', 'core/setting/setting', 'email.mailer', 'Mailer', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1237, 1, 'en', 'core/setting/setting', 'email.port', 'Port', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1238, 1, 'en', 'core/setting/setting', 'email.port_placeholder', 'Ex: 587', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1239, 1, 'en', 'core/setting/setting', 'email.host', 'Host', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1240, 1, 'en', 'core/setting/setting', 'email.host_placeholder', 'Ex: smtp.gmail.com', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1241, 1, 'en', 'core/setting/setting', 'email.username', 'Username', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1242, 1, 'en', 'core/setting/setting', 'email.username_placeholder', 'Username to login to mail server', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1243, 1, 'en', 'core/setting/setting', 'email.password', 'Password', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1244, 1, 'en', 'core/setting/setting', 'email.password_placeholder', 'Password to login to mail server', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1245, 1, 'en', 'core/setting/setting', 'email.encryption', 'Encryption', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1246, 1, 'en', 'core/setting/setting', 'email.mail_gun_domain', 'Domain', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1247, 1, 'en', 'core/setting/setting', 'email.mail_gun_domain_placeholder', 'Domain', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1248, 1, 'en', 'core/setting/setting', 'email.mail_gun_secret', 'Secret', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1249, 1, 'en', 'core/setting/setting', 'email.mail_gun_secret_placeholder', 'Secret', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1250, 1, 'en', 'core/setting/setting', 'email.mail_gun_endpoint', 'Endpoint', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1251, 1, 'en', 'core/setting/setting', 'email.mail_gun_endpoint_placeholder', 'Endpoint', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1252, 1, 'en', 'core/setting/setting', 'email.log_channel', 'Log channel', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1253, 1, 'en', 'core/setting/setting', 'email.sendmail_path', 'Sendmail Path', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1254, 1, 'en', 'core/setting/setting', 'email.encryption_placeholder', 'Encryption: ssl or tls', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1255, 1, 'en', 'core/setting/setting', 'email.ses_key', 'Key', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1256, 1, 'en', 'core/setting/setting', 'email.ses_key_placeholder', 'Key', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1257, 1, 'en', 'core/setting/setting', 'email.ses_secret', 'Secret', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1258, 1, 'en', 'core/setting/setting', 'email.ses_secret_placeholder', 'Secret', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1259, 1, 'en', 'core/setting/setting', 'email.ses_region', 'Region', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1260, 1, 'en', 'core/setting/setting', 'email.ses_region_placeholder', 'Region', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1261, 1, 'en', 'core/setting/setting', 'email.postmark_token', 'Token', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1262, 1, 'en', 'core/setting/setting', 'email.postmark_token_placeholder', 'Token', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1263, 1, 'en', 'core/setting/setting', 'email.template_title', 'Email templates', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1264, 1, 'en', 'core/setting/setting', 'email.template_description', 'Base templates for all emails', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1265, 1, 'en', 'core/setting/setting', 'email.template_header', 'Email template header', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1266, 1, 'en', 'core/setting/setting', 'email.template_header_description', 'Template for header of emails', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1267, 1, 'en', 'core/setting/setting', 'email.template_footer', 'Email template footer', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1268, 1, 'en', 'core/setting/setting', 'email.template_footer_description', 'Template for footer of emails', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1269, 1, 'en', 'core/setting/setting', 'email.default', 'Default', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1270, 1, 'en', 'core/setting/setting', 'email.using_queue_to_send_mail', 'Using queue job to send emails (Must to setup Queue first https://laravel.com/docs/queues#supervisor-configuration)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1271, 1, 'en', 'core/setting/setting', 'media.title', 'Media', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1272, 1, 'en', 'core/setting/setting', 'media.driver', 'Driver', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1273, 1, 'en', 'core/setting/setting', 'media.description', 'Settings for media', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1274, 1, 'en', 'core/setting/setting', 'media.aws_access_key_id', 'AWS Access Key ID', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1275, 1, 'en', 'core/setting/setting', 'media.aws_secret_key', 'AWS Secret Key', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1276, 1, 'en', 'core/setting/setting', 'media.aws_default_region', 'AWS Default Region', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1277, 1, 'en', 'core/setting/setting', 'media.aws_bucket', 'AWS Bucket', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1278, 1, 'en', 'core/setting/setting', 'media.aws_url', 'AWS URL', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1279, 1, 'en', 'core/setting/setting', 'media.do_spaces_access_key_id', 'DO Spaces Access Key ID', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1280, 1, 'en', 'core/setting/setting', 'media.do_spaces_secret_key', 'DO Spaces Secret Key', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1281, 1, 'en', 'core/setting/setting', 'media.do_spaces_default_region', 'DO Spaces Default Region', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1282, 1, 'en', 'core/setting/setting', 'media.do_spaces_bucket', 'DO Spaces Bucket', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1283, 1, 'en', 'core/setting/setting', 'media.do_spaces_endpoint', 'DO Spaces Endpoint', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1284, 1, 'en', 'core/setting/setting', 'media.do_spaces_cdn_enabled', 'Is DO Spaces CDN enabled?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1285, 1, 'en', 'core/setting/setting', 'media.media_do_spaces_cdn_custom_domain', 'Do Spaces CDN custom domain', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1286, 1, 'en', 'core/setting/setting', 'media.media_do_spaces_cdn_custom_domain_placeholder', 'https://your-custom-domain.com', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1287, 1, 'en', 'core/setting/setting', 'media.enable_chunk', 'Enable chunk size upload?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1288, 1, 'en', 'core/setting/setting', 'media.chunk_size', 'Chunk size (Bytes)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1289, 1, 'en', 'core/setting/setting', 'media.chunk_size_placeholder', 'Default: 1048576 ~ 1MB', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1290, 1, 'en', 'core/setting/setting', 'media.max_file_size', 'Chunk max file size (MB)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1291, 1, 'en', 'core/setting/setting', 'media.max_file_size_placeholder', 'Default: 1048576 ~ 1GB', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1292, 1, 'en', 'core/setting/setting', 'media.enable_watermark', 'Enable watermark?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1293, 1, 'en', 'core/setting/setting', 'media.watermark_source', 'Watermark image', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1294, 1, 'en', 'core/setting/setting', 'media.watermark_size', 'Size of watermark (%)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1295, 1, 'en', 'core/setting/setting', 'media.watermark_size_placeholder', 'Default: 10 (%)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1296, 1, 'en', 'core/setting/setting', 'media.watermark_opacity', 'Watermark Opacity (%)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1297, 1, 'en', 'core/setting/setting', 'media.watermark_opacity_placeholder', 'Default: 70 (%)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1298, 1, 'en', 'core/setting/setting', 'media.watermark_position', 'Watermark position', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1299, 1, 'en', 'core/setting/setting', 'media.watermark_position_x', 'Watermark position X', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1300, 1, 'en', 'core/setting/setting', 'media.watermark_position_y', 'Watermark position Y', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1301, 1, 'en', 'core/setting/setting', 'media.watermark_position_top_left', 'Top left', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1302, 1, 'en', 'core/setting/setting', 'media.watermark_position_top_right', 'Top right', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1303, 1, 'en', 'core/setting/setting', 'media.watermark_position_bottom_left', 'Bottom left', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1304, 1, 'en', 'core/setting/setting', 'media.watermark_position_bottom_right', 'Bottom right', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1305, 1, 'en', 'core/setting/setting', 'media.watermark_position_center', 'Center', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1306, 1, 'en', 'core/setting/setting', 'license.purchase_code', 'Purchase code', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1307, 1, 'en', 'core/setting/setting', 'license.buyer', 'Buyer', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1308, 1, 'en', 'core/setting/setting', 'field_type_not_exists', 'This field type does not exist', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1309, 1, 'en', 'core/setting/setting', 'save_settings', 'Save settings', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1310, 1, 'en', 'core/setting/setting', 'template', 'Template', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1311, 1, 'en', 'core/setting/setting', 'description', 'Description', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1312, 1, 'en', 'core/setting/setting', 'enable', 'Enable', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1313, 1, 'en', 'core/setting/setting', 'send', 'Send', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1314, 1, 'en', 'core/setting/setting', 'test_email_description', 'To send test email, please make sure you are updated configuration to send mail!', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1315, 1, 'en', 'core/setting/setting', 'test_email_input_placeholder', 'Enter the email which you want to send test email.', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1316, 1, 'en', 'core/setting/setting', 'test_email_modal_title', 'Send a test email', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1317, 1, 'en', 'core/setting/setting', 'test_send_mail', 'Send test mail', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1318, 1, 'en', 'core/setting/setting', 'test_email_send_success', 'Send email successfully!', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1319, 1, 'en', 'core/setting/setting', 'locale_direction_ltr', 'Left to Right', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1320, 1, 'en', 'core/setting/setting', 'locale_direction_rtl', 'Right to Left', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1321, 1, 'vi', 'core/setting/setting', 'title', 'Cài đặt', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1322, 1, 'vi', 'core/setting/setting', 'general.theme', 'Giao diện', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1323, 1, 'vi', 'core/setting/setting', 'general.description', 'Cấu hình những thông tin cài đặt website.', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1324, 1, 'vi', 'core/setting/setting', 'general.title', 'Thông tin chung', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1325, 1, 'vi', 'core/setting/setting', 'general.general_block', 'Thông tin chung', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1326, 1, 'vi', 'core/setting/setting', 'general.site_title', 'Tên trang', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1327, 1, 'vi', 'core/setting/setting', 'general.admin_email', 'Email quản trị viên', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1328, 1, 'vi', 'core/setting/setting', 'general.seo_block', 'Cấu hình SEO', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1329, 1, 'vi', 'core/setting/setting', 'general.seo_title', 'Tiêu đề SEO', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1330, 1, 'vi', 'core/setting/setting', 'general.seo_description', 'Mô tả SEO', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1331, 1, 'vi', 'core/setting/setting', 'general.webmaster_tools_block', 'Google Webmaster Tools', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1332, 1, 'vi', 'core/setting/setting', 'general.google_site_verification', 'Google site verification', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1333, 1, 'vi', 'core/setting/setting', 'general.placeholder.site_title', 'Tên trang (tối đa 120 kí tự)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1334, 1, 'vi', 'core/setting/setting', 'general.placeholder.admin_email', 'Admin Email', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1335, 1, 'vi', 'core/setting/setting', 'general.placeholder.google_analytics', 'Ví dụ: UA-42767940-2', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1336, 1, 'vi', 'core/setting/setting', 'general.placeholder.google_site_verification', 'Mã xác nhận trang web dùng cho Google Webmaster Tool', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1337, 1, 'vi', 'core/setting/setting', 'general.placeholder.seo_title', 'Tiêu đề SEO (tối đa 120 kí tự)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1338, 1, 'vi', 'core/setting/setting', 'general.placeholder.seo_description', 'Mô tả SEO (tối đa 120 kí tự)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1339, 1, 'vi', 'core/setting/setting', 'general.enable_change_admin_theme', 'Cho phép thay đổi giao diện quản trị?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1340, 1, 'vi', 'core/setting/setting', 'general.enable', 'Bật', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1341, 1, 'vi', 'core/setting/setting', 'general.disable', 'Tắt', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1342, 1, 'vi', 'core/setting/setting', 'general.enable_cache', 'Bật bộ nhớ đệm?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1343, 1, 'vi', 'core/setting/setting', 'general.cache_time', 'Thời gian lưu bộ nhớ đệm (phút)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1344, 1, 'vi', 'core/setting/setting', 'general.cache_time_site_map', 'Thời gian lưu sơ đồ trang trong bộ nhớ đệm', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1345, 1, 'vi', 'core/setting/setting', 'general.admin_logo', 'Logo trang quản trị', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1346, 1, 'vi', 'core/setting/setting', 'general.admin_title', 'Tiêu đề trang quản trị', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1347, 1, 'vi', 'core/setting/setting', 'general.admin_title_placeholder', 'Tiêu đề hiển thị trên thẻ trình duyệt', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1348, 1, 'vi', 'core/setting/setting', 'general.rich_editor', 'Bộ soạn thảo văn bản', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1349, 1, 'vi', 'core/setting/setting', 'general.cache_block', 'Bộ nhớ đệm', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1350, 1, 'vi', 'core/setting/setting', 'general.yes', 'Bật', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1351, 1, 'vi', 'core/setting/setting', 'general.no', 'Tắt', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1352, 1, 'vi', 'core/setting/setting', 'general.locale', 'Ngôn ngữ', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1353, 1, 'vi', 'core/setting/setting', 'general.admin_appearance_description', 'Setting admin appearance such as editor, language...', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1354, 1, 'vi', 'core/setting/setting', 'general.admin_appearance_title', 'Admin appearance', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1355, 1, 'vi', 'core/setting/setting', 'general.admin_login_screen_backgrounds', 'Login screen backgrounds (~1366x768)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1356, 1, 'vi', 'core/setting/setting', 'general.admin_favicon', 'Admin favicon', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1357, 1, 'vi', 'core/setting/setting', 'general.cache_admin_menu', 'Cache admin menu?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1358, 1, 'vi', 'core/setting/setting', 'general.cache_description', 'Config cache for system for optimize speed', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1359, 1, 'vi', 'core/setting/setting', 'general.default_admin_theme', 'Default admin theme', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1360, 1, 'vi', 'core/setting/setting', 'general.enable_send_error_reporting_via_email', 'Enable to send error reporting via email?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1361, 1, 'vi', 'core/setting/setting', 'general.locale_direction', 'Hướng chữ viết', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1362, 1, 'vi', 'core/setting/setting', 'general.select', '-- Lựa chọn --', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1363, 1, 'vi', 'core/setting/setting', 'general.seo_block_description', 'Setting site title, site meta description, site keyword for optimize SEO', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1364, 1, 'vi', 'core/setting/setting', 'general.show_on_front', 'Thiết lập trang chủ', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1365, 1, 'vi', 'core/setting/setting', 'general.show_site_name', 'Hiển thị tên trang web sau tiêu đề trang, tách biệt bằng \"-\"?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1366, 1, 'vi', 'core/setting/setting', 'general.time_zone', 'Múi giờ', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1367, 1, 'vi', 'core/setting/setting', 'general.webmaster_tools_description', 'Công cụ quản trị trang web của Google (GWT) là phần mềm miễn phí giúp bạn quản lý khía cạnh kỹ thuật của trang web của mình', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1368, 1, 'vi', 'core/setting/setting', 'email.subject', 'Tiêu đề', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1369, 1, 'vi', 'core/setting/setting', 'email.content', 'Nội dung', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1370, 1, 'vi', 'core/setting/setting', 'email.title', 'Cấu hình email template', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1371, 1, 'vi', 'core/setting/setting', 'email.description', 'Cấu trúc file template sử dụng HTML và các biến trong hệ thống.', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1372, 1, 'vi', 'core/setting/setting', 'email.reset_to_default', 'Khôi phục về mặc định', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1373, 1, 'vi', 'core/setting/setting', 'email.back', 'Trở lại trang cài đặt', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1374, 1, 'vi', 'core/setting/setting', 'email.reset_success', 'Khôi phục mặc định thành công', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1375, 1, 'vi', 'core/setting/setting', 'email.confirm_reset', 'Xác nhận khôi phục mặc định?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1376, 1, 'vi', 'core/setting/setting', 'email.confirm_message', 'Bạn có chắc chắn muốn khôi phục về bản mặc định?', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1377, 1, 'vi', 'core/setting/setting', 'email.continue', 'Tiếp tục', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1378, 1, 'vi', 'core/setting/setting', 'email.sender_name', 'Tên người gửi', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1379, 1, 'vi', 'core/setting/setting', 'email.sender_name_placeholder', 'Tên', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1380, 1, 'vi', 'core/setting/setting', 'email.sender_email', 'Email của người gửi', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1381, 1, 'vi', 'core/setting/setting', 'email.mailer', 'Loại', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1382, 1, 'vi', 'core/setting/setting', 'email.port', 'Cổng', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1383, 1, 'vi', 'core/setting/setting', 'email.port_placeholder', 'Ví dụ: 587', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1384, 1, 'vi', 'core/setting/setting', 'email.host', 'Máy chủ', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1385, 1, 'vi', 'core/setting/setting', 'email.host_placeholder', 'Ví dụ: smtp.gmail.com', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1386, 1, 'vi', 'core/setting/setting', 'email.username', 'Tên đăng nhập', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1387, 1, 'vi', 'core/setting/setting', 'email.username_placeholder', 'Tên đăng nhập vào máy chủ mail', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1388, 1, 'vi', 'core/setting/setting', 'email.password', 'Mật khẩu', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1389, 1, 'vi', 'core/setting/setting', 'email.password_placeholder', 'Mật khẩu đăng nhập vào máy chủ mail', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1390, 1, 'vi', 'core/setting/setting', 'email.encryption', 'Mã hoá', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1391, 1, 'vi', 'core/setting/setting', 'email.mail_gun_domain', 'Tên miền', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1392, 1, 'vi', 'core/setting/setting', 'email.mail_gun_domain_placeholder', 'Tên miền', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1393, 1, 'vi', 'core/setting/setting', 'email.mail_gun_secret', 'Chuỗi bí mật', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1394, 1, 'vi', 'core/setting/setting', 'email.mail_gun_secret_placeholder', 'Chuỗi bí mật', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1395, 1, 'vi', 'core/setting/setting', 'email.template_title', 'Mẫu giao diện email', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1396, 1, 'vi', 'core/setting/setting', 'email.template_description', 'Giao diện mặc định cho tất cả email', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1397, 1, 'vi', 'core/setting/setting', 'email.template_header', 'Mẫu cho phần trên của email', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1398, 1, 'vi', 'core/setting/setting', 'email.template_header_description', 'Phần trên của tất cả email', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1399, 1, 'vi', 'core/setting/setting', 'email.template_footer', 'Mẫu cho phần dưới của email', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1400, 1, 'vi', 'core/setting/setting', 'email.template_footer_description', 'Phần dưới của tất cả email', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1401, 1, 'vi', 'core/setting/setting', 'email.default', 'Mặc định', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1402, 1, 'vi', 'core/setting/setting', 'email.mail_gun_endpoint', 'Endpoint', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1403, 1, 'vi', 'core/setting/setting', 'email.mail_gun_endpoint_placeholder', 'Endpoint', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1404, 1, 'vi', 'core/setting/setting', 'email.postmark_token', 'Token', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1405, 1, 'vi', 'core/setting/setting', 'email.postmark_token_placeholder', 'Token', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1406, 1, 'vi', 'core/setting/setting', 'email.encryption_placeholder', 'Kiểu mã hóa: ssl hoặc tls', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1407, 1, 'vi', 'core/setting/setting', 'email.log_channel', 'Phương thức log', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1408, 1, 'vi', 'core/setting/setting', 'email.sendmail_path', 'Sendmail Path', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1409, 1, 'vi', 'core/setting/setting', 'email.ses_key', 'Key', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1410, 1, 'vi', 'core/setting/setting', 'email.ses_key_placeholder', 'Key', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1411, 1, 'vi', 'core/setting/setting', 'email.ses_region', 'Region', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1412, 1, 'vi', 'core/setting/setting', 'email.ses_region_placeholder', 'Region', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1413, 1, 'vi', 'core/setting/setting', 'email.ses_secret', 'Secret', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1414, 1, 'vi', 'core/setting/setting', 'email.ses_secret_placeholder', 'Secret', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1415, 1, 'vi', 'core/setting/setting', 'email.using_queue_to_send_mail', 'Sử dụng job queue để gửi email (Trước tiên phải thiết lập Queue https://laravel.com/docs/queues#supervisor-configuration)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1416, 1, 'vi', 'core/setting/setting', 'save_settings', 'Lưu cài đặt', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1417, 1, 'vi', 'core/setting/setting', 'template', 'Mẫu', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1418, 1, 'vi', 'core/setting/setting', 'description', 'Mô tả', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1419, 1, 'vi', 'core/setting/setting', 'enable', 'Bật', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1420, 1, 'vi', 'core/setting/setting', 'test_send_mail', 'Gửi thử nghiệm', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1421, 1, 'vi', 'core/setting/setting', 'email_setting_title', 'Cấu hình email', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1422, 1, 'vi', 'core/setting/setting', 'field_type_not_exists', 'Loại field này không được hỗ trợ', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1423, 1, 'vi', 'core/setting/setting', 'test_email_description', 'Để gửi email thử nghiệm, hãy đảm bảo rằng bạn đã cập nhật cấu hình để gửi thư!', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1424, 1, 'vi', 'core/setting/setting', 'test_email_input_placeholder', 'Nhập email mà bạn muốn gửi email thử nghiệm.', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1425, 1, 'vi', 'core/setting/setting', 'test_email_modal_title', 'Gửi một email thử nghiệm', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1426, 1, 'vi', 'core/setting/setting', 'test_email_send_success', 'Gửi email thành công!', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1427, 1, 'vi', 'core/setting/setting', 'send', 'Gửi', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1428, 1, 'vi', 'core/setting/setting', 'license.buyer', 'Tên đăng nhập', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1429, 1, 'vi', 'core/setting/setting', 'license.purchase_code', 'Purchase code', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1430, 1, 'vi', 'core/setting/setting', 'locale_direction_ltr', 'Trái sang phải', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1431, 1, 'vi', 'core/setting/setting', 'locale_direction_rtl', 'Phải sang trái', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1432, 1, 'vi', 'core/setting/setting', 'media.aws_access_key_id', 'AWS Access Key ID', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1433, 1, 'vi', 'core/setting/setting', 'media.aws_bucket', 'AWS Bucket', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1434, 1, 'vi', 'core/setting/setting', 'media.aws_default_region', 'AWS Default Region', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1435, 1, 'vi', 'core/setting/setting', 'media.aws_url', 'AWS URL', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1436, 1, 'vi', 'core/setting/setting', 'media.aws_secret_key', 'AWS Secret Key', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1437, 1, 'vi', 'core/setting/setting', 'media.chunk_size', 'Chunk size (Bytes)', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1438, 1, 'vi', 'core/setting/setting', 'media.chunk_size_placeholder', 'Mặc định: 1048576 ~ 1MB', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1439, 1, 'vi', 'core/setting/setting', 'media.do_spaces_access_key_id', 'DO Spaces Access Key ID', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1440, 1, 'vi', 'core/setting/setting', 'media.description', 'Cài đặt cho media', '2021-07-10 19:24:15', '2021-07-10 19:24:15'),
(1441, 1, 'vi', 'core/setting/setting', 'media.do_spaces_bucket', 'DO Spaces Bucket', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1442, 1, 'vi', 'core/setting/setting', 'media.do_spaces_cdn_enabled', 'Bật DO Spaces CDN?', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1443, 1, 'vi', 'core/setting/setting', 'media.do_spaces_default_region', 'DO Spaces Default Region', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1444, 1, 'vi', 'core/setting/setting', 'media.do_spaces_endpoint', 'DO Spaces Endpoint', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1445, 1, 'vi', 'core/setting/setting', 'media.do_spaces_secret_key', 'DO Spaces Secret Key', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1446, 1, 'vi', 'core/setting/setting', 'media.driver', 'Driver', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1447, 1, 'vi', 'core/setting/setting', 'media.enable_chunk', 'Bật chunk size upload?', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1448, 1, 'vi', 'core/setting/setting', 'media.enable_watermark', 'Bật watermark?', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1449, 1, 'vi', 'core/setting/setting', 'media.max_file_size', 'Chunk max file size (MB)', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1450, 1, 'vi', 'core/setting/setting', 'media.max_file_size_placeholder', 'Mặc định: 1048576 ~ 1GB', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1451, 1, 'vi', 'core/setting/setting', 'media.media_do_spaces_cdn_custom_domain', 'Do Spaces CDN custom domain', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1452, 1, 'vi', 'core/setting/setting', 'media.media_do_spaces_cdn_custom_domain_placeholder', 'https://ten-mien-cua-ban.com', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1453, 1, 'vi', 'core/setting/setting', 'media.title', 'Media', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1454, 1, 'vi', 'core/setting/setting', 'media.watermark_opacity', 'Watermark Opacity (%)', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1455, 1, 'vi', 'core/setting/setting', 'media.watermark_opacity_placeholder', 'Mặc định: 70 (%)', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1456, 1, 'vi', 'core/setting/setting', 'media.watermark_position', 'Vị trí watermark', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1457, 1, 'vi', 'core/setting/setting', 'media.watermark_position_bottom_left', 'Bên trái dưới cùng', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1458, 1, 'vi', 'core/setting/setting', 'media.watermark_position_bottom_right', 'Bên phải dưới cùng', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1459, 1, 'vi', 'core/setting/setting', 'media.watermark_position_center', 'Chính giữa', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1460, 1, 'vi', 'core/setting/setting', 'media.watermark_position_top_left', 'Bên trái trên cùng', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1461, 1, 'vi', 'core/setting/setting', 'media.watermark_position_top_right', 'Bên phải trên cùng', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1462, 1, 'vi', 'core/setting/setting', 'media.watermark_position_x', 'Watermark position X', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1463, 1, 'vi', 'core/setting/setting', 'media.watermark_position_y', 'Watermark position Y', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1464, 1, 'vi', 'core/setting/setting', 'media.watermark_size', 'Kích thước của watermark (%)', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1465, 1, 'vi', 'core/setting/setting', 'media.watermark_size_placeholder', 'Mặc định: 10 (%)', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1466, 1, 'vi', 'core/setting/setting', 'media.watermark_source', 'Hình ảnh watermark', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1467, 1, 'en', 'core/table/table', 'operations', 'Operations', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1468, 1, 'en', 'core/table/table', 'loading_data', 'Loading data from server', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1469, 1, 'en', 'core/table/table', 'display', 'Display', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1470, 1, 'en', 'core/table/table', 'all', 'All', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1471, 1, 'en', 'core/table/table', 'edit_entry', 'Edit', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1472, 1, 'en', 'core/table/table', 'delete_entry', 'Delete', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1473, 1, 'en', 'core/table/table', 'show_from', 'Showing from', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1474, 1, 'en', 'core/table/table', 'to', 'to', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1475, 1, 'en', 'core/table/table', 'in', 'in', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1476, 1, 'en', 'core/table/table', 'records', 'records', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1477, 1, 'en', 'core/table/table', 'no_data', 'No data to display', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1478, 1, 'en', 'core/table/table', 'no_record', 'No record', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1479, 1, 'en', 'core/table/table', 'loading', 'Loading data from server', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1480, 1, 'en', 'core/table/table', 'confirm_delete', 'Confirm delete', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1481, 1, 'en', 'core/table/table', 'confirm_delete_msg', 'Do you really want to delete this record?', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1482, 1, 'en', 'core/table/table', 'cancel', 'Cancel', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1483, 1, 'en', 'core/table/table', 'delete', 'Delete', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1484, 1, 'en', 'core/table/table', 'close', 'Close', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1485, 1, 'en', 'core/table/table', 'contains', 'Contains', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1486, 1, 'en', 'core/table/table', 'is_equal_to', 'Is equal to', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1487, 1, 'en', 'core/table/table', 'greater_than', 'Greater than', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1488, 1, 'en', 'core/table/table', 'less_than', 'Less than', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1489, 1, 'en', 'core/table/table', 'value', 'Value', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1490, 1, 'en', 'core/table/table', 'select_field', 'Select field', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1491, 1, 'en', 'core/table/table', 'reset', 'Reset', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1492, 1, 'en', 'core/table/table', 'add_additional_filter', 'Add additional filter', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1493, 1, 'en', 'core/table/table', 'apply', 'Apply', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1494, 1, 'en', 'core/table/table', 'filters', 'Filters', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1495, 1, 'en', 'core/table/table', 'bulk_change', 'Bulk changes', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1496, 1, 'en', 'core/table/table', 'select_option', 'Select option', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1497, 1, 'en', 'core/table/table', 'bulk_actions', 'Bulk Actions', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1498, 1, 'en', 'core/table/table', 'save_bulk_change_success', 'Update data for selected record(s) successfully!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1499, 1, 'en', 'core/table/table', 'please_select_record', 'Please select at least one record to perform this action!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1500, 1, 'en', 'core/table/table', 'filtered', '(filtered from _MAX_ total records)', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1501, 1, 'en', 'core/table/table', 'search', 'Search...', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1502, 1, 'vi', 'core/table/table', 'operations', 'Hành động', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1503, 1, 'vi', 'core/table/table', 'loading_data', 'Đang tải dữ liệu từ hệ thống', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1504, 1, 'vi', 'core/table/table', 'display', 'Hiển thị', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1505, 1, 'vi', 'core/table/table', 'all', 'Tất cả', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1506, 1, 'vi', 'core/table/table', 'edit_entry', 'Sửa', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1507, 1, 'vi', 'core/table/table', 'delete_entry', 'Xoá', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1508, 1, 'vi', 'core/table/table', 'show_from', 'Hiển thị từ', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1509, 1, 'vi', 'core/table/table', 'to', 'đến', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1510, 1, 'vi', 'core/table/table', 'in', 'trong tổng số', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1511, 1, 'vi', 'core/table/table', 'records', 'bản ghi', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1512, 1, 'vi', 'core/table/table', 'no_data', 'Không có dữ liệu để hiển thị', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1513, 1, 'vi', 'core/table/table', 'no_record', 'không có bản ghi nào', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1514, 1, 'vi', 'core/table/table', 'loading', 'Đang tải dữ liệu từ hệ thống', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1515, 1, 'vi', 'core/table/table', 'confirm_delete', 'Xác nhận xoá', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1516, 1, 'vi', 'core/table/table', 'confirm_delete_msg', 'Bạn có chắc chắn muốn xoá bản ghi này?', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1517, 1, 'vi', 'core/table/table', 'cancel', 'Huỷ bỏ', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1518, 1, 'vi', 'core/table/table', 'delete', 'Xoá', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1519, 1, 'vi', 'core/table/table', 'close', 'Đóng', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1520, 1, 'vi', 'core/table/table', 'is_equal_to', 'Bằng với', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1521, 1, 'vi', 'core/table/table', 'greater_than', 'Lớn hơn', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1522, 1, 'vi', 'core/table/table', 'less_than', 'Nhỏ hơn', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1523, 1, 'vi', 'core/table/table', 'value', 'Giá trị', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1524, 1, 'vi', 'core/table/table', 'select_field', 'Chọn trường', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1525, 1, 'vi', 'core/table/table', 'reset', 'Làm mới', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1526, 1, 'vi', 'core/table/table', 'add_additional_filter', 'Thêm bộ lọc', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1527, 1, 'vi', 'core/table/table', 'apply', 'Áp dụng', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1528, 1, 'vi', 'core/table/table', 'select_option', 'Lựa chọn', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1529, 1, 'vi', 'core/table/table', 'filters', 'Lọc dữ liệu', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1530, 1, 'vi', 'core/table/table', 'bulk_change', 'Thay đổi hàng loạt', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1531, 1, 'vi', 'core/table/table', 'bulk_actions', 'Hành động', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1532, 1, 'vi', 'core/table/table', 'contains', 'Bao gồm', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1533, 1, 'vi', 'core/table/table', 'filtered', '(đã được lọc từ _MAX_ bản ghi)', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1534, 1, 'vi', 'core/table/table', 'please_select_record', 'Vui lòng chọn ít nhất 1 bản ghi để thực hiện hành động này!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1535, 1, 'vi', 'core/table/table', 'save_bulk_change_success', 'Cập nhật dữ liệu cho các bản ghi thành công!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1536, 1, 'vi', 'core/table/table', 'search', 'Tìm kiếm...', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1537, 1, 'en', 'packages/menu/menu', 'name', 'Menus', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1538, 1, 'en', 'packages/menu/menu', 'key_name', 'Menu name (key: :key)', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1539, 1, 'en', 'packages/menu/menu', 'basic_info', 'Basic information', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1540, 1, 'en', 'packages/menu/menu', 'add_to_menu', 'Add to menu', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1541, 1, 'en', 'packages/menu/menu', 'custom_link', 'Custom link', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1542, 1, 'en', 'packages/menu/menu', 'add_link', 'Add link', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1543, 1, 'en', 'packages/menu/menu', 'structure', 'Menu structure', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1544, 1, 'en', 'packages/menu/menu', 'remove', 'Remove', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1545, 1, 'en', 'packages/menu/menu', 'cancel', 'Cancel', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1546, 1, 'en', 'packages/menu/menu', 'title', 'Title', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1547, 1, 'en', 'packages/menu/menu', 'icon', 'Icon', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1548, 1, 'en', 'packages/menu/menu', 'url', 'URL', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1549, 1, 'en', 'packages/menu/menu', 'target', 'Target', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1550, 1, 'en', 'packages/menu/menu', 'css_class', 'CSS class', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1551, 1, 'en', 'packages/menu/menu', 'self_open_link', 'Open link directly', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1552, 1, 'en', 'packages/menu/menu', 'blank_open_link', 'Open link in new tab', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1553, 1, 'en', 'packages/menu/menu', 'create', 'Create menu', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1554, 1, 'en', 'packages/menu/menu', 'edit', 'Edit menu', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1555, 1, 'en', 'packages/menu/menu', 'menu_settings', 'Menu settings', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1556, 1, 'en', 'packages/menu/menu', 'display_location', 'Display location', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1557, 1, 'vi', 'packages/menu/menu', 'name', 'Trình đơn', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1558, 1, 'vi', 'packages/menu/menu', 'cancel', 'Hủy bỏ', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1559, 1, 'vi', 'packages/menu/menu', 'add_link', 'Thêm liên kết', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1560, 1, 'vi', 'packages/menu/menu', 'add_to_menu', 'Thêm vào trình đơn', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1561, 1, 'vi', 'packages/menu/menu', 'basic_info', 'Thông tin cơ bản', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1562, 1, 'vi', 'packages/menu/menu', 'blank_open_link', 'Mở liên kết trong tab mới', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1563, 1, 'vi', 'packages/menu/menu', 'css_class', 'CSS class', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1564, 1, 'vi', 'packages/menu/menu', 'custom_link', 'Liên kết tùy chọn', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1565, 1, 'vi', 'packages/menu/menu', 'icon', 'Biểu tượng', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1566, 1, 'vi', 'packages/menu/menu', 'key_name', 'Tên menu (key::key)', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1567, 1, 'vi', 'packages/menu/menu', 'remove', 'Xóa', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1568, 1, 'vi', 'packages/menu/menu', 'self_open_link', 'Mở liên kết trong tab hiện tại', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1569, 1, 'vi', 'packages/menu/menu', 'structure', 'Cấu trúc trình đơn', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1570, 1, 'vi', 'packages/menu/menu', 'target', 'Target', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1571, 1, 'vi', 'packages/menu/menu', 'title', 'Tiêu đề', '2021-07-10 19:24:16', '2021-07-10 19:24:16');
INSERT INTO `translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1572, 1, 'vi', 'packages/menu/menu', 'url', 'URL', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1573, 1, 'vi', 'packages/menu/menu', 'create', 'Tạo trình đơn', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1574, 1, 'vi', 'packages/menu/menu', 'edit', 'Sửa trình đơn', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1575, 1, 'vi', 'packages/menu/menu', 'display_location', 'Vị trí hiển thị', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1576, 1, 'vi', 'packages/menu/menu', 'menu_settings', 'Cấu hình menu', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1577, 1, 'en', 'packages/optimize/optimize', 'settings.title', 'Optimize page speed', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1578, 1, 'en', 'packages/optimize/optimize', 'settings.description', 'Minify HTML output, inline CSS, remove comments...', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1579, 1, 'en', 'packages/optimize/optimize', 'settings.enable', 'Enable optimize page speed?', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1580, 1, 'vi', 'packages/optimize/optimize', 'settings.title', 'Tối ưu tốc độ', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1581, 1, 'vi', 'packages/optimize/optimize', 'settings.description', 'Nén HTML output, inline CSS, xóa chú thích...', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1582, 1, 'vi', 'packages/optimize/optimize', 'settings.enable', 'Bật tối ưu tốc độ?', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1583, 1, 'en', 'packages/page/pages', 'create', 'Create new page', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1584, 1, 'en', 'packages/page/pages', 'edit', 'Edit page', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1585, 1, 'en', 'packages/page/pages', 'form.name', 'Name', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1586, 1, 'en', 'packages/page/pages', 'form.name_placeholder', 'Page\'s name (Maximum 120 characters)', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1587, 1, 'en', 'packages/page/pages', 'form.content', 'Content', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1588, 1, 'en', 'packages/page/pages', 'form.note', 'Note content', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1589, 1, 'en', 'packages/page/pages', 'notices.no_select', 'Please select at least one record to take this action!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1590, 1, 'en', 'packages/page/pages', 'notices.update_success_message', 'Update successfully', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1591, 1, 'en', 'packages/page/pages', 'cannot_delete', 'Page could not be deleted', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1592, 1, 'en', 'packages/page/pages', 'deleted', 'Page deleted', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1593, 1, 'en', 'packages/page/pages', 'pages', 'Pages', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1594, 1, 'en', 'packages/page/pages', 'menu', 'Pages', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1595, 1, 'en', 'packages/page/pages', 'menu_name', 'Pages', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1596, 1, 'en', 'packages/page/pages', 'edit_this_page', 'Edit this page', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1597, 1, 'en', 'packages/page/pages', 'total_pages', 'Total pages', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1598, 1, 'en', 'packages/page/pages', 'settings.show_on_front', 'Your homepage displays', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1599, 1, 'en', 'packages/page/pages', 'settings.select', '— Select —', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1600, 1, 'en', 'packages/page/pages', 'front_page', 'Front Page', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1601, 1, 'vi', 'packages/page/pages', 'create', 'Thêm trang', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1602, 1, 'vi', 'packages/page/pages', 'edit', 'Sửa trang', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1603, 1, 'vi', 'packages/page/pages', 'form.name', 'Tiêu đề trang', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1604, 1, 'vi', 'packages/page/pages', 'form.note', 'Nội dung ghi chú', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1605, 1, 'vi', 'packages/page/pages', 'form.name_placeholder', 'Tên trang (tối đa 120 kí tự)', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1606, 1, 'vi', 'packages/page/pages', 'form.content', 'Nội dung', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1607, 1, 'vi', 'packages/page/pages', 'notices.no_select', 'Chọn ít nhất 1 trang để thực hiện hành động này!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1608, 1, 'vi', 'packages/page/pages', 'notices.update_success_message', 'Cập nhật thành công', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1609, 1, 'vi', 'packages/page/pages', 'deleted', 'Xóa trang thành công', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1610, 1, 'vi', 'packages/page/pages', 'cannot_delete', 'Không thể xóa trang', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1611, 1, 'vi', 'packages/page/pages', 'menu', 'Trang', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1612, 1, 'vi', 'packages/page/pages', 'menu_name', 'Trang', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1613, 1, 'vi', 'packages/page/pages', 'edit_this_page', 'Sửa trang này', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1614, 1, 'vi', 'packages/page/pages', 'pages', 'Trang', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1615, 1, 'vi', 'packages/page/pages', 'front_page', 'Trang chủ', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1616, 1, 'vi', 'packages/page/pages', 'settings.select', '-- Lựa chọn --', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1617, 1, 'vi', 'packages/page/pages', 'settings.show_on_front', 'Lựa chọn trang chủ', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1618, 1, 'vi', 'packages/page/pages', 'total_pages', 'Tổng số trang', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1619, 1, 'en', 'packages/plugin-management/plugin', 'enabled', 'Enabled', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1620, 1, 'en', 'packages/plugin-management/plugin', 'deactivated', 'Deactivated', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1621, 1, 'en', 'packages/plugin-management/plugin', 'activated', 'Activated', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1622, 1, 'en', 'packages/plugin-management/plugin', 'activate', 'Activate', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1623, 1, 'en', 'packages/plugin-management/plugin', 'deactivate', 'Deactivate', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1624, 1, 'en', 'packages/plugin-management/plugin', 'author', 'By', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1625, 1, 'en', 'packages/plugin-management/plugin', 'update_plugin_status_success', 'Update plugin successfully', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1626, 1, 'en', 'packages/plugin-management/plugin', 'plugins', 'Plugins', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1627, 1, 'en', 'packages/plugin-management/plugin', 'missing_required_plugins', 'Please activate plugin(s): :plugins before activate this plugin!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1628, 1, 'en', 'packages/plugin-management/plugin', 'remove', 'Remove', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1629, 1, 'en', 'packages/plugin-management/plugin', 'remove_plugin_success', 'Remove plugin successfully!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1630, 1, 'en', 'packages/plugin-management/plugin', 'remove_plugin', 'Remove plugin', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1631, 1, 'en', 'packages/plugin-management/plugin', 'remove_plugin_confirm_message', 'Do you really want to remove this plugin?', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1632, 1, 'en', 'packages/plugin-management/plugin', 'remove_plugin_confirm_yes', 'Yes, remove it!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1633, 1, 'en', 'packages/plugin-management/plugin', 'total_plugins', 'Total plugins', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1634, 1, 'en', 'packages/plugin-management/plugin', 'invalid_plugin', 'This plugin is not a valid plugin, please check it again!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1635, 1, 'en', 'packages/plugin-management/plugin', 'version', 'Version', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1636, 1, 'en', 'packages/plugin-management/plugin', 'invalid_json', 'Invalid plugin.json!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1637, 1, 'en', 'packages/plugin-management/plugin', 'activate_success', 'Activate plugin successfully!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1638, 1, 'en', 'packages/plugin-management/plugin', 'activated_already', 'This plugin is activated already!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1639, 1, 'en', 'packages/plugin-management/plugin', 'plugin_not_exist', 'This plugin is not exists.', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1640, 1, 'en', 'packages/plugin-management/plugin', 'missing_json_file', 'Missing file plugin.json!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1641, 1, 'en', 'packages/plugin-management/plugin', 'plugin_invalid', 'Plugin is valid!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1642, 1, 'en', 'packages/plugin-management/plugin', 'published_assets_success', 'Publish assets for plugin :name successfully!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1643, 1, 'en', 'packages/plugin-management/plugin', 'plugin_removed', 'Plugin has been removed!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1644, 1, 'en', 'packages/plugin-management/plugin', 'deactivated_success', 'Deactivate plugin successfully!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1645, 1, 'en', 'packages/plugin-management/plugin', 'deactivated_already', 'This plugin is deactivated already!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1646, 1, 'en', 'packages/plugin-management/plugin', 'folder_is_not_writeable', 'Cannot write files! Folder :name is not writable. Please chmod to make it writable!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1647, 1, 'en', 'packages/plugin-management/plugin', 'plugin_is_not_ready', 'Plugin :name is not ready to use', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1648, 1, 'vi', 'packages/plugin-management/plugin', 'activate', 'Kích hoạt', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1649, 1, 'vi', 'packages/plugin-management/plugin', 'author', 'Tác giả', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1650, 1, 'vi', 'packages/plugin-management/plugin', 'version', 'Phiên bản', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1651, 1, 'vi', 'packages/plugin-management/plugin', 'activated', 'Đã kích hoạt', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1652, 1, 'vi', 'packages/plugin-management/plugin', 'deactivate', 'Hủy kích hoạt', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1653, 1, 'vi', 'packages/plugin-management/plugin', 'deactivated', 'Đã vô hiệu', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1654, 1, 'vi', 'packages/plugin-management/plugin', 'enabled', 'Kích hoạt', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1655, 1, 'vi', 'packages/plugin-management/plugin', 'invalid_plugin', 'Gói mở rộng không hợp lệ', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1656, 1, 'vi', 'packages/plugin-management/plugin', 'update_plugin_status_success', 'Cập nhật trạng thái gói mở rộng thành công', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1657, 1, 'vi', 'packages/plugin-management/plugin', 'missing_required_plugins', 'Vui lòng kích hoạt các gói mở rộng :plugins trước khi kích hoạt gói này', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1658, 1, 'vi', 'packages/plugin-management/plugin', 'plugins', 'Gói mở rộng', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1659, 1, 'vi', 'packages/plugin-management/plugin', 'remove', 'Xoá', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1660, 1, 'vi', 'packages/plugin-management/plugin', 'remove_plugin_success', 'Xoá thành công!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1661, 1, 'vi', 'packages/plugin-management/plugin', 'remove_plugin', 'Xoá gói mở rộng', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1662, 1, 'vi', 'packages/plugin-management/plugin', 'remove_plugin_confirm_message', 'Bạn có chắc chắn muốn xoá plugin này?', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1663, 1, 'vi', 'packages/plugin-management/plugin', 'remove_plugin_confirm_yes', 'Có, xoá!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1664, 1, 'vi', 'packages/plugin-management/plugin', 'total_plugins', 'Tất cả plugins', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1665, 1, 'vi', 'packages/plugin-management/plugin', 'activate_success', 'Kích hoạt thành công!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1666, 1, 'vi', 'packages/plugin-management/plugin', 'activated_already', 'Gói mở rộng này đã được kích hoạt rồi!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1667, 1, 'vi', 'packages/plugin-management/plugin', 'deactivated_already', 'Gói mở rộng này đã được hủy kích hoạt rồi!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1668, 1, 'vi', 'packages/plugin-management/plugin', 'deactivated_success', 'Hủy kích hoạt thành công!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1669, 1, 'vi', 'packages/plugin-management/plugin', 'invalid_json', 'Sai cấu hình plugin.json!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1670, 1, 'vi', 'packages/plugin-management/plugin', 'missing_json_file', 'Thiếu tập tin cấu hình plugin.json!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1671, 1, 'vi', 'packages/plugin-management/plugin', 'plugin_invalid', 'Gói mở rộng không hợp lệ!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1672, 1, 'vi', 'packages/plugin-management/plugin', 'plugin_not_exist', 'Gói mở rộng không tồn tại', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1673, 1, 'vi', 'packages/plugin-management/plugin', 'plugin_removed', 'Gói mở rộng đã bị xóa!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1674, 1, 'vi', 'packages/plugin-management/plugin', 'published_assets_success', 'Xuất bản assets cho gói mở rộng thành công!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1675, 1, 'en', 'packages/seo-helper/seo-helper', 'meta_box_header', 'Search Engine Optimize', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1676, 1, 'en', 'packages/seo-helper/seo-helper', 'edit_seo_meta', 'Edit SEO meta', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1677, 1, 'en', 'packages/seo-helper/seo-helper', 'default_description', 'Setup meta title & description to make your site easy to discovered on search engines such as Google', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1678, 1, 'en', 'packages/seo-helper/seo-helper', 'seo_title', 'SEO Title', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1679, 1, 'en', 'packages/seo-helper/seo-helper', 'seo_description', 'SEO description', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1680, 1, 'vi', 'packages/seo-helper/seo-helper', 'meta_box_header', 'Tối ưu hoá bộ máy tìm kiếm (SEO)', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1681, 1, 'vi', 'packages/seo-helper/seo-helper', 'edit_seo_meta', 'Chỉnh sửa SEO', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1682, 1, 'vi', 'packages/seo-helper/seo-helper', 'default_description', 'Thiết lập các thẻ mô tả giúp người dùng dễ dàng tìm thấy trên công cụ tìm kiếm như Google.', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1683, 1, 'vi', 'packages/seo-helper/seo-helper', 'seo_title', 'Tiêu đề trang', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1684, 1, 'vi', 'packages/seo-helper/seo-helper', 'seo_description', 'Mô tả trang', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1685, 1, 'en', 'packages/slug/slug', 'permalink_settings', 'Permalink', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1686, 1, 'en', 'packages/slug/slug', 'settings.title', 'Permalink settings', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1687, 1, 'en', 'packages/slug/slug', 'settings.description', 'Manage permalink for all modules.', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1688, 1, 'en', 'packages/slug/slug', 'settings.preview', 'Preview', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1689, 1, 'en', 'packages/slug/slug', 'settings.turn_off_automatic_url_translation_into_latin', 'Turn off automatic URL translation into Latin?', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1690, 1, 'en', 'packages/slug/slug', 'preview', 'Preview', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1691, 1, 'vi', 'packages/slug/slug', 'permalink_settings', 'Liên kết cố định', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1692, 1, 'vi', 'packages/slug/slug', 'preview', 'Xem trước', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1693, 1, 'vi', 'packages/slug/slug', 'settings.description', 'Quản lý liên kết cố định cho các module.', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1694, 1, 'vi', 'packages/slug/slug', 'settings.preview', 'Xem trước', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1695, 1, 'vi', 'packages/slug/slug', 'settings.title', 'Cài đặt liên kết cố định', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1696, 1, 'en', 'packages/theme/theme', 'name', 'Themes', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1697, 1, 'en', 'packages/theme/theme', 'theme', 'Theme', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1698, 1, 'en', 'packages/theme/theme', 'author', 'Author', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1699, 1, 'en', 'packages/theme/theme', 'version', 'Version', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1700, 1, 'en', 'packages/theme/theme', 'description', 'Description', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1701, 1, 'en', 'packages/theme/theme', 'active_success', 'Activate theme :name successfully!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1702, 1, 'en', 'packages/theme/theme', 'active', 'Active', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1703, 1, 'en', 'packages/theme/theme', 'activated', 'Activated', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1704, 1, 'en', 'packages/theme/theme', 'appearance', 'Appearance', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1705, 1, 'en', 'packages/theme/theme', 'theme_options', 'Theme options', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1706, 1, 'en', 'packages/theme/theme', 'save_changes', 'Save Changes', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1707, 1, 'en', 'packages/theme/theme', 'developer_mode', 'Developer Mode Enabled', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1708, 1, 'en', 'packages/theme/theme', 'custom_css', 'Custom CSS', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1709, 1, 'en', 'packages/theme/theme', 'custom_js', 'Custom JS', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1710, 1, 'en', 'packages/theme/theme', 'custom_header_js', 'Header JS', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1711, 1, 'en', 'packages/theme/theme', 'custom_header_js_placeholder', 'JS in header of page, wrap it inside &#x3C;script&#x3E;&#x3C;/script&#x3E;', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1712, 1, 'en', 'packages/theme/theme', 'custom_body_js', 'Body JS', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1713, 1, 'en', 'packages/theme/theme', 'custom_body_js_placeholder', 'JS in body of page, wrap it inside &#x3C;script&#x3E;&#x3C;/script&#x3E;', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1714, 1, 'en', 'packages/theme/theme', 'custom_footer_js', 'Footer JS', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1715, 1, 'en', 'packages/theme/theme', 'custom_footer_js_placeholder', 'JS in footer of page, wrap it inside &#x3C;script&#x3E;&#x3C;/script&#x3E;', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1716, 1, 'en', 'packages/theme/theme', 'remove_theme_success', 'Remove theme successfully!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1717, 1, 'en', 'packages/theme/theme', 'theme_is_not_existed', 'This theme is not existed!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1718, 1, 'en', 'packages/theme/theme', 'remove', 'Remove', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1719, 1, 'en', 'packages/theme/theme', 'remove_theme', 'Remove theme', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1720, 1, 'en', 'packages/theme/theme', 'remove_theme_confirm_message', 'Do you really want to remove this theme?', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1721, 1, 'en', 'packages/theme/theme', 'remove_theme_confirm_yes', 'Yes, remove it!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1722, 1, 'en', 'packages/theme/theme', 'total_themes', 'Total themes', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1723, 1, 'en', 'packages/theme/theme', 'show_admin_bar', 'Show admin bar (When admin logged in, still show admin bar in website)?', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1724, 1, 'en', 'packages/theme/theme', 'settings.title', 'Theme', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1725, 1, 'en', 'packages/theme/theme', 'settings.description', 'Setting for theme', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1726, 1, 'en', 'packages/theme/theme', 'add_new', 'Add new', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1727, 1, 'en', 'packages/theme/theme', 'theme_activated_already', 'Theme \":name\" is activated already!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1728, 1, 'en', 'packages/theme/theme', 'missing_json_file', 'Missing file theme.json!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1729, 1, 'en', 'packages/theme/theme', 'theme_invalid', 'Theme is valid!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1730, 1, 'en', 'packages/theme/theme', 'published_assets_success', 'Publish assets for :themes successfully!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1731, 1, 'en', 'packages/theme/theme', 'cannot_remove_theme', 'Cannot remove activated theme, please activate another theme before removing \":name\"!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1732, 1, 'en', 'packages/theme/theme', 'theme_deleted', 'Theme \":name\" has been destroyed.', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1733, 1, 'en', 'packages/theme/theme', 'removed_assets', 'Remove assets of a theme :name successfully!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1734, 1, 'en', 'packages/theme/theme', 'update_custom_css_success', 'Update custom CSS successfully!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1735, 1, 'en', 'packages/theme/theme', 'update_custom_js_success', 'Update custom JS successfully!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1736, 1, 'en', 'packages/theme/theme', 'go_to_dashboard', 'Go to dashboard', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1737, 1, 'en', 'packages/theme/theme', 'custom_css_placeholder', 'Using Ctrl + Space to autocomplete.', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1738, 1, 'en', 'packages/theme/theme', 'theme_option_general', 'General', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1739, 1, 'en', 'packages/theme/theme', 'theme_option_general_description', 'General settings', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1740, 1, 'en', 'packages/theme/theme', 'theme_option_seo_open_graph_image', 'SEO default Open Graph image', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1741, 1, 'en', 'packages/theme/theme', 'theme_option_logo', 'Logo', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1742, 1, 'en', 'packages/theme/theme', 'theme_option_favicon', 'Favicon', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1743, 1, 'en', 'packages/theme/theme', 'folder_is_not_writeable', 'Cannot write files! Folder :name is not writable. Please chmod to make it writable!', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1744, 1, 'vi', 'packages/theme/theme', 'name', 'Giao diện', '2021-07-10 19:24:16', '2021-07-10 19:24:16'),
(1745, 1, 'vi', 'packages/theme/theme', 'activated', 'Đã kích hoạt', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1746, 1, 'vi', 'packages/theme/theme', 'active', 'Kích hoạt', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1747, 1, 'vi', 'packages/theme/theme', 'active_success', 'Kích hoạt giao diện thành công!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1748, 1, 'vi', 'packages/theme/theme', 'author', 'Tác giả', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1749, 1, 'vi', 'packages/theme/theme', 'description', 'Mô tả', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1750, 1, 'vi', 'packages/theme/theme', 'appearance', 'Hiển thị', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1751, 1, 'vi', 'packages/theme/theme', 'theme', 'Giao diện', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1752, 1, 'vi', 'packages/theme/theme', 'theme_options', 'Tuỳ chọn giao diện', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1753, 1, 'vi', 'packages/theme/theme', 'version', 'Phiên bản', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1754, 1, 'vi', 'packages/theme/theme', 'save_changes', 'Lưu thay đổi', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1755, 1, 'vi', 'packages/theme/theme', 'developer_mode', 'Đang kích hoạt chế độ thử nghiệm', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1756, 1, 'vi', 'packages/theme/theme', 'custom_css', 'Tuỳ chỉnh CSS', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1757, 1, 'vi', 'packages/theme/theme', 'remove', 'Xóa', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1758, 1, 'vi', 'packages/theme/theme', 'remove_theme', 'Xóa giao diện', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1759, 1, 'vi', 'packages/theme/theme', 'remove_theme_confirm_message', 'Bạn có chắc chắn muốn xóa giao diện này?', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1760, 1, 'vi', 'packages/theme/theme', 'remove_theme_confirm_yes', 'Vâng, xác nhận xóa!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1761, 1, 'vi', 'packages/theme/theme', 'remove_theme_success', 'Xóa giao diện thành công!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1762, 1, 'vi', 'packages/theme/theme', 'settings.description', 'Cài đặt giao diện', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1763, 1, 'vi', 'packages/theme/theme', 'settings.title', 'Giao diện', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1764, 1, 'vi', 'packages/theme/theme', 'show_admin_bar', 'Hiển thị admin bar (khi admin đã đăng nhập, vẫn hiển thị admin bar trên website)?', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1765, 1, 'vi', 'packages/theme/theme', 'total_themes', 'Tổng số giao diện', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1766, 1, 'vi', 'packages/theme/theme', 'add_new', 'Thêm mới', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1767, 1, 'en', 'packages/widget/widget', 'name', 'Widgets', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1768, 1, 'en', 'packages/widget/widget', 'create', 'New widget', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1769, 1, 'en', 'packages/widget/widget', 'edit', 'Edit widget', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1770, 1, 'en', 'packages/widget/widget', 'delete', 'Delete', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1771, 1, 'en', 'packages/widget/widget', 'available', 'Available Widgets', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1772, 1, 'en', 'packages/widget/widget', 'instruction', 'To activate a widget drag it to a sidebar or click on it. To deactivate a widget and delete its settings, drag it back.', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1773, 1, 'en', 'packages/widget/widget', 'number_tag_display', 'Number tags will be display', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1774, 1, 'en', 'packages/widget/widget', 'number_post_display', 'Number posts will be display', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1775, 1, 'en', 'packages/widget/widget', 'select_menu', 'Select Menu', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1776, 1, 'en', 'packages/widget/widget', 'widget_text', 'Text', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1777, 1, 'en', 'packages/widget/widget', 'widget_text_description', 'Arbitrary text or HTML.', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1778, 1, 'en', 'packages/widget/widget', 'widget_recent_post', 'Recent Posts', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1779, 1, 'en', 'packages/widget/widget', 'widget_recent_post_description', 'Recent posts widget.', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1780, 1, 'en', 'packages/widget/widget', 'widget_custom_menu', 'Custom Menu', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1781, 1, 'en', 'packages/widget/widget', 'widget_custom_menu_description', 'Add a custom menu to your widget area.', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1782, 1, 'en', 'packages/widget/widget', 'widget_tag', 'Tags', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1783, 1, 'en', 'packages/widget/widget', 'widget_tag_description', 'Popular tags', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1784, 1, 'en', 'packages/widget/widget', 'save_success', 'Save widget successfully!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1785, 1, 'en', 'packages/widget/widget', 'delete_success', 'Delete widget successfully!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1786, 1, 'en', 'packages/widget/widget', 'primary_sidebar_name', 'Primary sidebar', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1787, 1, 'en', 'packages/widget/widget', 'primary_sidebar_description', 'Primary sidebar section', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1788, 1, 'vi', 'packages/widget/widget', 'name', 'Widgets', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1789, 1, 'vi', 'packages/widget/widget', 'create', 'New widget', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1790, 1, 'vi', 'packages/widget/widget', 'edit', 'Edit widget', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1791, 1, 'vi', 'packages/widget/widget', 'available', 'Tiện ích có sẵn', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1792, 1, 'vi', 'packages/widget/widget', 'delete', 'Xóa', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1793, 1, 'vi', 'packages/widget/widget', 'instruction', 'Để kích hoạt tiện ích, hãy kéo nó vào sidebar hoặc nhấn vào nó. Để hủy kích hoạt tiện ích và xóa các thiết lập của tiện ích, kéo nó quay trở lại.', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1794, 1, 'vi', 'packages/widget/widget', 'number_post_display', 'Số bài viết sẽ hiển thị', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1795, 1, 'vi', 'packages/widget/widget', 'number_tag_display', 'Số thẻ sẽ hiển thị', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1796, 1, 'vi', 'packages/widget/widget', 'select_menu', 'Lựa chọn trình đơn', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1797, 1, 'vi', 'packages/widget/widget', 'widget_custom_menu', 'Menu tùy chỉnh', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1798, 1, 'vi', 'packages/widget/widget', 'widget_custom_menu_description', 'Thêm menu tùy chỉnh vào khu vực tiện ích của bạn', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1799, 1, 'vi', 'packages/widget/widget', 'widget_recent_post', 'Bài viết gần đây', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1800, 1, 'vi', 'packages/widget/widget', 'widget_recent_post_description', 'Tiện ích bài viết gần đây', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1801, 1, 'vi', 'packages/widget/widget', 'widget_tag', 'Thẻ', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1802, 1, 'vi', 'packages/widget/widget', 'widget_tag_description', 'Thẻ phổ biến, sử dụng nhiều', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1803, 1, 'vi', 'packages/widget/widget', 'widget_text', 'Văn bản', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1804, 1, 'vi', 'packages/widget/widget', 'widget_text_description', 'Văn bản tùy ý hoặc HTML.', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1805, 1, 'vi', 'packages/widget/widget', 'delete_success', 'Xoá tiện ích thành công', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1806, 1, 'vi', 'packages/widget/widget', 'save_success', 'Lưu tiện ích thành công!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1807, 1, 'en', 'plugins/analytics/analytics', 'sessions', 'Sessions', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1808, 1, 'en', 'plugins/analytics/analytics', 'visitors', 'Visitors', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1809, 1, 'en', 'plugins/analytics/analytics', 'pageviews', 'Pageviews', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1810, 1, 'en', 'plugins/analytics/analytics', 'bounce_rate', 'Bounce Rate', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1811, 1, 'en', 'plugins/analytics/analytics', 'page_session', 'Pages/Session', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1812, 1, 'en', 'plugins/analytics/analytics', 'avg_duration', 'Avg. Duration', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1813, 1, 'en', 'plugins/analytics/analytics', 'percent_new_session', 'Percent new session', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1814, 1, 'en', 'plugins/analytics/analytics', 'new_users', 'New visitors', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1815, 1, 'en', 'plugins/analytics/analytics', 'visits', 'visits', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1816, 1, 'en', 'plugins/analytics/analytics', 'views', 'views', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1817, 1, 'en', 'plugins/analytics/analytics', 'view_id_not_specified', 'You must provide a valid view id. The document here: <a href=\"https://docs.botble.com/cms/:version/plugin-analytics\" target=\"_blank\">https://docs.botble.com/cms/:version/plugin-analytics</a>', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1818, 1, 'en', 'plugins/analytics/analytics', 'credential_is_not_valid', 'Analytics credentials is not valid. The document here: <a href=\"https://docs.botble.com/cms/:version/plugin-analytics\" target=\"_blank\">https://docs.botble.com/cms/:version/plugin-analytics</a>', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1819, 1, 'en', 'plugins/analytics/analytics', 'start_date_can_not_before_end_date', 'Start date :start_date cannot be after end date :end_date', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1820, 1, 'en', 'plugins/analytics/analytics', 'wrong_configuration', 'To view analytics you\'ll need to get a google analytics client id and add it to your settings. <br /> You also need JSON credential data. <br /> The document here: <a href=\"https://docs.botble.com/cms/:version/plugin-analytics\" target=\"_blank\">https://docs.botble.com/cms/:version/plugin-analytics</a>', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1821, 1, 'en', 'plugins/analytics/analytics', 'settings.title', 'Google Analytics', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1822, 1, 'en', 'plugins/analytics/analytics', 'settings.description', 'Config Credentials for Google Analytics', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1823, 1, 'en', 'plugins/analytics/analytics', 'settings.tracking_code', 'Tracking ID', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1824, 1, 'en', 'plugins/analytics/analytics', 'settings.tracking_code_placeholder', 'Example: GA-12586526-8', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1825, 1, 'en', 'plugins/analytics/analytics', 'settings.view_id', 'View ID', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1826, 1, 'en', 'plugins/analytics/analytics', 'settings.view_id_description', 'Google Analytics View ID', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1827, 1, 'en', 'plugins/analytics/analytics', 'settings.json_credential', 'Service Account Credentials', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1828, 1, 'en', 'plugins/analytics/analytics', 'settings.json_credential_description', 'Service Account Credentials', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1829, 1, 'en', 'plugins/analytics/analytics', 'widget_analytics_page', 'Top Most Visit Pages', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1830, 1, 'en', 'plugins/analytics/analytics', 'widget_analytics_browser', 'Top Browsers', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1831, 1, 'en', 'plugins/analytics/analytics', 'widget_analytics_referrer', 'Top Referrers', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1832, 1, 'en', 'plugins/analytics/analytics', 'widget_analytics_general', 'Site Analytics', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1833, 1, 'vi', 'plugins/analytics/analytics', 'avg_duration', 'Trung bình', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1834, 1, 'vi', 'plugins/analytics/analytics', 'bounce_rate', 'Tỉ lệ thoát', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1835, 1, 'vi', 'plugins/analytics/analytics', 'page_session', 'Trang/Phiên', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1836, 1, 'vi', 'plugins/analytics/analytics', 'pageviews', 'Lượt xem', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1837, 1, 'vi', 'plugins/analytics/analytics', 'sessions', 'Phiên', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1838, 1, 'vi', 'plugins/analytics/analytics', 'views', 'lượt xem', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1839, 1, 'vi', 'plugins/analytics/analytics', 'visitors', 'Người truy cập', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1840, 1, 'vi', 'plugins/analytics/analytics', 'visits', 'lượt ghé thăm', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1841, 1, 'vi', 'plugins/analytics/analytics', 'credential_is_not_valid', 'Thông tin cài đặt không hợp lệ. Tài liệu hướng dẫn tại đây: <a href=\"https://docs.botble.com/cms/:version/plugin-analytics\" target=\"_blank\">https://docs.botble.com/cms/:version/plugin-analytics</a>', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1842, 1, 'vi', 'plugins/analytics/analytics', 'new_users', 'Lượt khách mới', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1843, 1, 'vi', 'plugins/analytics/analytics', 'percent_new_session', 'Tỉ lệ khách mới', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1844, 1, 'vi', 'plugins/analytics/analytics', 'start_date_can_not_before_end_date', 'Ngày bắt đầu :start_date không thể sau ngày kết thúc :end_date', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1845, 1, 'vi', 'plugins/analytics/analytics', 'view_id_not_specified', 'Bạn phải cung cấp View ID hợp lê. Tài liệu hướng dẫn tại đây: <a href=\"https://docs.botble.com/cms/:version/plugin-analytics\" target=\"_blank\">https://docs.botble.com/cms/:version/plugin-analytics</a>', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1846, 1, 'vi', 'plugins/analytics/analytics', 'wrong_configuration', 'Để xem dữ liệu thống kê Google Analytics, bạn cần lấy thông tin Client ID và thêm nó vào trong phần cài đặt. Bạn cũng cần thông tin xác thực dạng JSON. Tài liệu hướng dẫn tại đây: <a href=\"https://docs.botble.com/cms/:version/plugin-analytics\" target=\"_blank\">https://docs.botble.com/cms/:version/plugin-analytics</a>', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1847, 1, 'vi', 'plugins/analytics/analytics', 'settings.title', 'Google Analytics', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1848, 1, 'vi', 'plugins/analytics/analytics', 'settings.description', 'Config Credentials for Google Analytics', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1849, 1, 'vi', 'plugins/analytics/analytics', 'settings.tracking_code', 'Tracking Code', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1850, 1, 'vi', 'plugins/analytics/analytics', 'settings.tracking_code_placeholder', 'Example: GA-12586526-8', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1851, 1, 'vi', 'plugins/analytics/analytics', 'settings.view_id', 'View ID', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1852, 1, 'vi', 'plugins/analytics/analytics', 'settings.view_id_description', 'Google Analytics View ID', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1853, 1, 'vi', 'plugins/analytics/analytics', 'settings.json_credential', 'Service Account Credentials', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1854, 1, 'vi', 'plugins/analytics/analytics', 'settings.json_credential_description', 'Service Account Credentials', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1855, 1, 'vi', 'plugins/analytics/analytics', 'widget_analytics_browser', 'Trình duyệt truy cập nhiều', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1856, 1, 'vi', 'plugins/analytics/analytics', 'widget_analytics_general', 'Thống kê truy cập', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1857, 1, 'vi', 'plugins/analytics/analytics', 'widget_analytics_page', 'Trang được xem nhiều nhất', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1858, 1, 'vi', 'plugins/analytics/analytics', 'widget_analytics_referrer', 'Trang giới thiệu nhiều', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1859, 1, 'en', 'plugins/api/api', 'api_clients', 'API Clients', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1860, 1, 'en', 'plugins/api/api', 'create_new_client', 'Create new client', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1861, 1, 'en', 'plugins/api/api', 'create_new_client_success', 'Create new client successfully!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1862, 1, 'en', 'plugins/api/api', 'edit_client', 'Edit client \":name\"', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1863, 1, 'en', 'plugins/api/api', 'edit_client_success', 'Updated client successfully!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1864, 1, 'en', 'plugins/api/api', 'delete_success', 'Deleted client successfully!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1865, 1, 'en', 'plugins/api/api', 'confirm_delete_title', 'Confirm delete client \":name\"', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1866, 1, 'en', 'plugins/api/api', 'confirm_delete_description', 'Do you really want to delete client \":name\"?', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1867, 1, 'en', 'plugins/api/api', 'cancel_delete', 'No', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1868, 1, 'en', 'plugins/api/api', 'continue_delete', 'Yes, let\'s delete it!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1869, 1, 'en', 'plugins/api/api', 'name', 'Name', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1870, 1, 'en', 'plugins/api/api', 'cancel', 'Cancel', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1871, 1, 'en', 'plugins/api/api', 'save', 'Save', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1872, 1, 'en', 'plugins/api/api', 'edit', 'Edit', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1873, 1, 'en', 'plugins/api/api', 'delete', 'Delete', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1874, 1, 'en', 'plugins/api/api', 'client_id', 'Client ID', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1875, 1, 'en', 'plugins/api/api', 'secret', 'Secret', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1876, 1, 'vi', 'plugins/api/api', 'api_clients', 'API Clients', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1877, 1, 'vi', 'plugins/api/api', 'create_new_client', 'Tạo client mới', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1878, 1, 'vi', 'plugins/api/api', 'create_new_client_success', 'Tạo client mới thành công!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1879, 1, 'vi', 'plugins/api/api', 'edit_client', 'Sửa client \":name\"', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1880, 1, 'vi', 'plugins/api/api', 'edit_client_success', 'Cập nhật client thành công!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1881, 1, 'vi', 'plugins/api/api', 'delete_success', 'Xoá client thành công!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1882, 1, 'vi', 'plugins/api/api', 'confirm_delete_title', 'Xoá client \":name\"', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1883, 1, 'vi', 'plugins/api/api', 'confirm_delete_description', 'Bạn có chắc chắn muốn xoá client \":name\"?', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1884, 1, 'vi', 'plugins/api/api', 'cancel_delete', 'Không', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1885, 1, 'vi', 'plugins/api/api', 'continue_delete', 'Có, tiếp tục xoá!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1886, 1, 'vi', 'plugins/api/api', 'name', 'Tên', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1887, 1, 'vi', 'plugins/api/api', 'cancel', 'Huỷ bỏ', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1888, 1, 'vi', 'plugins/api/api', 'save', 'Lưu', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1889, 1, 'vi', 'plugins/api/api', 'edit', 'Sửa', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1890, 1, 'vi', 'plugins/api/api', 'delete', 'Xoá', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1891, 1, 'vi', 'plugins/api/api', 'client_id', 'Client ID', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1892, 1, 'vi', 'plugins/api/api', 'secret', 'Chuỗi bí mật', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1893, 1, 'en', 'plugins/audit-log/history', 'name', 'Activities Logs', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1894, 1, 'en', 'plugins/audit-log/history', 'created', 'created', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1895, 1, 'en', 'plugins/audit-log/history', 'updated', 'updated', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1896, 1, 'en', 'plugins/audit-log/history', 'deleted', 'deleted', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1897, 1, 'en', 'plugins/audit-log/history', 'logged in', 'logged in', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1898, 1, 'en', 'plugins/audit-log/history', 'logged out', 'logged out', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1899, 1, 'en', 'plugins/audit-log/history', 'changed password', 'changed password', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1900, 1, 'en', 'plugins/audit-log/history', 'updated profile', 'updated profile', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1901, 1, 'en', 'plugins/audit-log/history', 'attached', 'attached', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1902, 1, 'en', 'plugins/audit-log/history', 'shared', 'shared', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1903, 1, 'en', 'plugins/audit-log/history', 'to the system', 'to the system', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1904, 1, 'en', 'plugins/audit-log/history', 'of the system', 'of the system', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1905, 1, 'en', 'plugins/audit-log/history', 'menu', 'menu', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1906, 1, 'en', 'plugins/audit-log/history', 'post', 'post', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1907, 1, 'en', 'plugins/audit-log/history', 'page', 'page', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1908, 1, 'en', 'plugins/audit-log/history', 'category', 'category', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1909, 1, 'en', 'plugins/audit-log/history', 'tag', 'tag', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1910, 1, 'en', 'plugins/audit-log/history', 'user', 'user', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1911, 1, 'en', 'plugins/audit-log/history', 'contact', 'contact', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1912, 1, 'en', 'plugins/audit-log/history', 'backup', 'backup', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1913, 1, 'en', 'plugins/audit-log/history', 'custom-field', 'custom field', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1914, 1, 'en', 'plugins/audit-log/history', 'widget_audit_logs', 'Activities Logs', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1915, 1, 'en', 'plugins/audit-log/history', 'action', 'Action', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1916, 1, 'en', 'plugins/audit-log/history', 'user_agent', 'User Agent', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1917, 1, 'en', 'plugins/audit-log/history', 'system', 'System', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1918, 1, 'en', 'plugins/audit-log/history', 'delete_all', 'Delete all records', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1919, 1, 'vi', 'plugins/audit-log/history', 'name', 'Lịch sử hoạt động', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1920, 1, 'vi', 'plugins/audit-log/history', 'created', ' đã tạo', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1921, 1, 'vi', 'plugins/audit-log/history', 'updated', ' đã cập nhật', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1922, 1, 'vi', 'plugins/audit-log/history', 'deleted', ' đã xóa', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1923, 1, 'vi', 'plugins/audit-log/history', 'attached', 'đính kèm', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1924, 1, 'vi', 'plugins/audit-log/history', 'backup', 'sao lưu', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1925, 1, 'vi', 'plugins/audit-log/history', 'category', 'danh mục', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1926, 1, 'vi', 'plugins/audit-log/history', 'changed password', 'thay đổi mật khẩu', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1927, 1, 'vi', 'plugins/audit-log/history', 'contact', 'liên hệ', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1928, 1, 'vi', 'plugins/audit-log/history', 'custom-field', 'khung mở rộng', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1929, 1, 'vi', 'plugins/audit-log/history', 'logged in', 'đăng nhập', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1930, 1, 'vi', 'plugins/audit-log/history', 'logged out', 'đăng xuất', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1931, 1, 'vi', 'plugins/audit-log/history', 'menu', 'trình đơn', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1932, 1, 'vi', 'plugins/audit-log/history', 'of the system', 'khỏi hệ thống', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1933, 1, 'vi', 'plugins/audit-log/history', 'page', 'trang', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1934, 1, 'vi', 'plugins/audit-log/history', 'post', 'bài viết', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1935, 1, 'vi', 'plugins/audit-log/history', 'shared', 'đã chia sẻ', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1936, 1, 'vi', 'plugins/audit-log/history', 'tag', 'thẻ', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1937, 1, 'vi', 'plugins/audit-log/history', 'to the system', 'vào hệ thống', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1938, 1, 'vi', 'plugins/audit-log/history', 'updated profile', 'cập nhật tài khoản', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1939, 1, 'vi', 'plugins/audit-log/history', 'user', 'thành viên', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1940, 1, 'vi', 'plugins/audit-log/history', 'widget_audit_logs', 'Lịch sử hoạt động', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1941, 1, 'vi', 'plugins/audit-log/history', 'system', 'Hệ thống', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1942, 1, 'vi', 'plugins/audit-log/history', 'action', 'Hành động', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1943, 1, 'vi', 'plugins/audit-log/history', 'delete_all', 'Xóa tất cả bản ghi', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1944, 1, 'vi', 'plugins/audit-log/history', 'user_agent', 'User Agent', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1945, 1, 'en', 'plugins/backup/backup', 'name', 'Backup', '2021-07-10 19:24:17', '2021-07-10 19:24:17');
INSERT INTO `translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1946, 1, 'en', 'plugins/backup/backup', 'backup_description', 'Backup database and uploads folder.', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1947, 1, 'en', 'plugins/backup/backup', 'create_backup_success', 'Created backup successfully!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1948, 1, 'en', 'plugins/backup/backup', 'delete_backup_success', 'Delete backup successfully!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1949, 1, 'en', 'plugins/backup/backup', 'restore_backup_success', 'Restore backup successfully!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1950, 1, 'en', 'plugins/backup/backup', 'generate_btn', 'Generate backup', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1951, 1, 'en', 'plugins/backup/backup', 'create', 'Create a backup', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1952, 1, 'en', 'plugins/backup/backup', 'restore', 'Restore a backup', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1953, 1, 'en', 'plugins/backup/backup', 'create_btn', 'Create', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1954, 1, 'en', 'plugins/backup/backup', 'restore_btn', 'Restore', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1955, 1, 'en', 'plugins/backup/backup', 'restore_confirm_msg', 'Do you really want to restore this revision?', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1956, 1, 'en', 'plugins/backup/backup', 'download_uploads_folder', 'Download backup of uploads folder', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1957, 1, 'en', 'plugins/backup/backup', 'download_database', 'Download backup of database', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1958, 1, 'en', 'plugins/backup/backup', 'restore_tooltip', 'Restore this backup', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1959, 1, 'en', 'plugins/backup/backup', 'demo_alert', 'Hi guest, if you see demo site is destroyed, please help me <a href=\":link\">go here</a> and restore demo site to the latest revision! Thank you so much!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1960, 1, 'en', 'plugins/backup/backup', 'menu_name', 'Backups', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1961, 1, 'en', 'plugins/backup/backup', 'size', 'Size', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1962, 1, 'en', 'plugins/backup/backup', 'no_backups', 'There is no backup now!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1963, 1, 'en', 'plugins/backup/backup', 'proc_open_disabled_error', 'Function <strong>proc_open()</strong> has been disabled so the system cannot backup the database. Please contact your hosting provider to enable it.', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1964, 1, 'en', 'plugins/backup/backup', 'database_backup_not_existed', 'Backup database is not existed!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1965, 1, 'en', 'plugins/backup/backup', 'uploads_folder_backup_not_existed', 'Backup uploads folder is not existed!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1966, 1, 'vi', 'plugins/backup/backup', 'backup_description', 'Sao lưu cơ sở dữ liệu và thư mục /uploads', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1967, 1, 'vi', 'plugins/backup/backup', 'create', 'Tạo bản sao lưu', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1968, 1, 'vi', 'plugins/backup/backup', 'create_backup_success', 'Tạo bản sao lưu thành công!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1969, 1, 'vi', 'plugins/backup/backup', 'create_btn', 'Tạo', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1970, 1, 'vi', 'plugins/backup/backup', 'delete_backup_success', 'Xóa bản sao lưu thành công!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1971, 1, 'vi', 'plugins/backup/backup', 'generate_btn', 'Tạo sao lưu', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1972, 1, 'vi', 'plugins/backup/backup', 'name', 'Sao lưu', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1973, 1, 'vi', 'plugins/backup/backup', 'restore', 'Khôi phục bản sao lưu', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1974, 1, 'vi', 'plugins/backup/backup', 'restore_backup_success', 'Khôi phục bản sao lưu thành công', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1975, 1, 'vi', 'plugins/backup/backup', 'restore_btn', 'Khôi phục', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1976, 1, 'vi', 'plugins/backup/backup', 'restore_confirm_msg', 'Bạn có chắc chắn muốn khôi phục hệ thống về thời điểm tạo bản sao lưu này?', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1977, 1, 'vi', 'plugins/backup/backup', 'restore_tooltip', 'Khôi phục bản sao lưu này', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1978, 1, 'vi', 'plugins/backup/backup', 'download_database', 'Tải về bản sao lưu CSDL', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1979, 1, 'vi', 'plugins/backup/backup', 'download_uploads_folder', 'Tải về bản sao lưu thư mục uploads', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1980, 1, 'vi', 'plugins/backup/backup', 'menu_name', 'Sao lưu', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1981, 1, 'vi', 'plugins/backup/backup', 'demo_alert', 'Chào khách, nếu bạn thấy trang demo bị phá hoại, hãy tới <a href=\":link\">trang sao lưu</a> và khôi phục bản sao lưu cuối cùng. Cảm ơn bạn nhiều!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1982, 1, 'en', 'plugins/block/block', 'name', 'Block', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1983, 1, 'en', 'plugins/block/block', 'create', 'New block', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1984, 1, 'en', 'plugins/block/block', 'edit', 'Edit block', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1985, 1, 'en', 'plugins/block/block', 'menu', 'Static Blocks', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1986, 1, 'en', 'plugins/block/block', 'static_block_short_code_name', 'Static Block', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1987, 1, 'en', 'plugins/block/block', 'static_block_short_code_description', 'Add a custom static block', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1988, 1, 'en', 'plugins/block/block', 'alias', 'Alias', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1989, 1, 'vi', 'plugins/block/block', 'name', 'Nội dung tĩnh', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1990, 1, 'vi', 'plugins/block/block', 'create', 'Thêm nội dung tĩnh', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1991, 1, 'vi', 'plugins/block/block', 'edit', 'Sửa nội dung tĩnh', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1992, 1, 'vi', 'plugins/block/block', 'menu', 'Nội dung tĩnh', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1993, 1, 'en', 'plugins/blog/base', 'menu_name', 'Blog', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1994, 1, 'en', 'plugins/blog/base', 'blog_page', 'Blog Page', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1995, 1, 'en', 'plugins/blog/base', 'select', '-- Select --', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1996, 1, 'en', 'plugins/blog/base', 'blog_page_id', 'Blog page', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1997, 1, 'en', 'plugins/blog/base', 'number_posts_per_page', 'Number posts per page', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1998, 1, 'en', 'plugins/blog/base', 'write_some_tags', 'Write some tags', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(1999, 1, 'en', 'plugins/blog/base', 'short_code_name', 'Blog posts', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2000, 1, 'en', 'plugins/blog/base', 'short_code_description', 'Add blog posts', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2001, 1, 'en', 'plugins/blog/base', 'number_posts_per_page_in_category', 'Number of posts per page in a category', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2002, 1, 'en', 'plugins/blog/base', 'number_posts_per_page_in_tag', 'Number of posts per page in a tag', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2003, 1, 'en', 'plugins/blog/categories', 'create', 'Create new category', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2004, 1, 'en', 'plugins/blog/categories', 'edit', 'Edit category', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2005, 1, 'en', 'plugins/blog/categories', 'menu', 'Categories', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2006, 1, 'en', 'plugins/blog/categories', 'edit_this_category', 'Edit this category', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2007, 1, 'en', 'plugins/blog/categories', 'menu_name', 'Categories', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2008, 1, 'en', 'plugins/blog/categories', 'none', 'None', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2009, 1, 'en', 'plugins/blog/member', 'dob', 'Born :date', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2010, 1, 'en', 'plugins/blog/member', 'draft_posts', 'Draft Posts', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2011, 1, 'en', 'plugins/blog/member', 'pending_posts', 'Pending Posts', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2012, 1, 'en', 'plugins/blog/member', 'published_posts', 'Published Posts', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2013, 1, 'en', 'plugins/blog/member', 'posts', 'Posts', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2014, 1, 'en', 'plugins/blog/member', 'write_post', 'Write a post', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2015, 1, 'en', 'plugins/blog/posts', 'create', 'Create new post', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2016, 1, 'en', 'plugins/blog/posts', 'edit', 'Edit post', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2017, 1, 'en', 'plugins/blog/posts', 'form.name', 'Name', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2018, 1, 'en', 'plugins/blog/posts', 'form.name_placeholder', 'Post\'s name (Maximum :c characters)', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2019, 1, 'en', 'plugins/blog/posts', 'form.description', 'Description', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2020, 1, 'en', 'plugins/blog/posts', 'form.description_placeholder', 'Short description for post (Maximum :c characters)', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2021, 1, 'en', 'plugins/blog/posts', 'form.categories', 'Categories', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2022, 1, 'en', 'plugins/blog/posts', 'form.tags', 'Tags', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2023, 1, 'en', 'plugins/blog/posts', 'form.tags_placeholder', 'Tags', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2024, 1, 'en', 'plugins/blog/posts', 'form.content', 'Content', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2025, 1, 'en', 'plugins/blog/posts', 'form.is_featured', 'Is featured?', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2026, 1, 'en', 'plugins/blog/posts', 'form.note', 'Note content', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2027, 1, 'en', 'plugins/blog/posts', 'form.format_type', 'Format', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2028, 1, 'en', 'plugins/blog/posts', 'cannot_delete', 'Post could not be deleted', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2029, 1, 'en', 'plugins/blog/posts', 'post_deleted', 'Post deleted', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2030, 1, 'en', 'plugins/blog/posts', 'posts', 'Posts', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2031, 1, 'en', 'plugins/blog/posts', 'post', 'Post', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2032, 1, 'en', 'plugins/blog/posts', 'edit_this_post', 'Edit this post', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2033, 1, 'en', 'plugins/blog/posts', 'no_new_post_now', 'There is no new post now!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2034, 1, 'en', 'plugins/blog/posts', 'menu_name', 'Posts', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2035, 1, 'en', 'plugins/blog/posts', 'widget_posts_recent', 'Recent Posts', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2036, 1, 'en', 'plugins/blog/posts', 'categories', 'Categories', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2037, 1, 'en', 'plugins/blog/posts', 'category', 'Category', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2038, 1, 'en', 'plugins/blog/posts', 'author', 'Author', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2039, 1, 'en', 'plugins/blog/tags', 'form.name', 'Name', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2040, 1, 'en', 'plugins/blog/tags', 'form.name_placeholder', 'Tag\'s name (Maximum 120 characters)', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2041, 1, 'en', 'plugins/blog/tags', 'form.description', 'Description', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2042, 1, 'en', 'plugins/blog/tags', 'form.description_placeholder', 'Short description for tag (Maximum 400 characters)', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2043, 1, 'en', 'plugins/blog/tags', 'form.categories', 'Categories', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2044, 1, 'en', 'plugins/blog/tags', 'notices.no_select', 'Please select at least one tag to take this action!', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2045, 1, 'en', 'plugins/blog/tags', 'create', 'Create new tag', '2021-07-10 19:24:17', '2021-07-10 19:24:17'),
(2046, 1, 'en', 'plugins/blog/tags', 'edit', 'Edit tag', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2047, 1, 'en', 'plugins/blog/tags', 'cannot_delete', 'Tag could not be deleted', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2048, 1, 'en', 'plugins/blog/tags', 'deleted', 'Tag deleted', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2049, 1, 'en', 'plugins/blog/tags', 'menu', 'Tags', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2050, 1, 'en', 'plugins/blog/tags', 'edit_this_tag', 'Edit this tag', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2051, 1, 'en', 'plugins/blog/tags', 'menu_name', 'Tags', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2052, 1, 'vi', 'plugins/blog/base', 'menu_name', 'Blog', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2053, 1, 'vi', 'plugins/blog/base', 'blog_page', 'Trang Blog', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2054, 1, 'vi', 'plugins/blog/base', 'select', '-- Lựa chọn --', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2055, 1, 'vi', 'plugins/blog/base', 'blog_page_id', 'Trang Blog', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2056, 1, 'vi', 'plugins/blog/categories', 'create', 'Thêm danh mục mới', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2057, 1, 'vi', 'plugins/blog/categories', 'edit', 'Sửa danh mục', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2058, 1, 'vi', 'plugins/blog/categories', 'menu', 'Danh mục', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2059, 1, 'vi', 'plugins/blog/categories', 'edit_this_category', 'Sửa danh mục này', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2060, 1, 'vi', 'plugins/blog/categories', 'menu_name', 'Danh mục', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2061, 1, 'vi', 'plugins/blog/categories', 'none', 'Không', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2062, 1, 'vi', 'plugins/blog/member', 'dob', 'Born :date', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2063, 1, 'vi', 'plugins/blog/member', 'draft_posts', 'Draft Posts', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2064, 1, 'vi', 'plugins/blog/member', 'pending_posts', 'Pending Posts', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2065, 1, 'vi', 'plugins/blog/member', 'published_posts', 'Published Posts', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2066, 1, 'vi', 'plugins/blog/member', 'posts', 'Posts', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2067, 1, 'vi', 'plugins/blog/member', 'write_post', 'Write a post', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2068, 1, 'vi', 'plugins/blog/posts', 'create', 'Thêm bài viết', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2069, 1, 'vi', 'plugins/blog/posts', 'edit', 'Sửa bài viết', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2070, 1, 'vi', 'plugins/blog/posts', 'form.name', 'Tên', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2071, 1, 'vi', 'plugins/blog/posts', 'form.name_placeholder', 'Tên bài viết (Tối đa 120 kí tự)', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2072, 1, 'vi', 'plugins/blog/posts', 'form.description', 'Mô tả', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2073, 1, 'vi', 'plugins/blog/posts', 'form.description_placeholder', 'Mô tả ngắn cho bài viết (Tối đa 400 kí tự)', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2074, 1, 'vi', 'plugins/blog/posts', 'form.categories', 'Chuyên mục', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2075, 1, 'vi', 'plugins/blog/posts', 'form.tags', 'Từ khóa', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2076, 1, 'vi', 'plugins/blog/posts', 'form.tags_placeholder', 'Thêm từ khóa', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2077, 1, 'vi', 'plugins/blog/posts', 'form.content', 'Nội dung', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2078, 1, 'vi', 'plugins/blog/posts', 'form.is_featured', 'Bài viết nổi bật?', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2079, 1, 'vi', 'plugins/blog/posts', 'form.note', 'Nội dung ghi chú', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2080, 1, 'vi', 'plugins/blog/posts', 'form.format_type', 'Định dạng', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2081, 1, 'vi', 'plugins/blog/posts', 'post_deleted', 'Xóa bài viết thành công', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2082, 1, 'vi', 'plugins/blog/posts', 'cannot_delete', 'Không thể xóa bài viết', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2083, 1, 'vi', 'plugins/blog/posts', 'menu_name', 'Bài viết', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2084, 1, 'vi', 'plugins/blog/posts', 'edit_this_post', 'Sửa bài viết này', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2085, 1, 'vi', 'plugins/blog/posts', 'no_new_post_now', 'Hiện tại không có bài viết mới!', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2086, 1, 'vi', 'plugins/blog/posts', 'posts', 'Bài viết', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2087, 1, 'vi', 'plugins/blog/posts', 'post', 'Bài viết', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2088, 1, 'vi', 'plugins/blog/posts', 'widget_posts_recent', 'Bài viết gần đây', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2089, 1, 'vi', 'plugins/blog/posts', 'author', 'Tác giả', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2090, 1, 'vi', 'plugins/blog/posts', 'categories', 'Danh mục', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2091, 1, 'vi', 'plugins/blog/posts', 'category', 'Danh mục', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2092, 1, 'vi', 'plugins/blog/tags', 'create', 'Thêm thẻ mới', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2093, 1, 'vi', 'plugins/blog/tags', 'edit', 'Sửa thẻ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2094, 1, 'vi', 'plugins/blog/tags', 'form.name', 'Tên', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2095, 1, 'vi', 'plugins/blog/tags', 'form.name_placeholder', 'Tên thẻ (Tối đa 120 kí tự)', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2096, 1, 'vi', 'plugins/blog/tags', 'form.description', 'Mô tả', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2097, 1, 'vi', 'plugins/blog/tags', 'form.description_placeholder', 'Mô tả ngắn cho tag (Tối đa 400 kí tự)', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2098, 1, 'vi', 'plugins/blog/tags', 'form.categories', 'Chuyên mục', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2099, 1, 'vi', 'plugins/blog/tags', 'notices.no_select', 'Chọn ít nhất 1 bài viết để thực hiện hành động này!', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2100, 1, 'vi', 'plugins/blog/tags', 'cannot_delete', 'Không thể xóa thẻ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2101, 1, 'vi', 'plugins/blog/tags', 'deleted', 'Xóa thẻ thành công', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2102, 1, 'vi', 'plugins/blog/tags', 'menu_name', 'Thẻ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2103, 1, 'vi', 'plugins/blog/tags', 'edit_this_tag', 'Sửa thẻ này', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2104, 1, 'vi', 'plugins/blog/tags', 'menu', 'Thẻ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2105, 1, 'en', 'plugins/captcha/captcha', 'settings.title', 'Captcha', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2106, 1, 'en', 'plugins/captcha/captcha', 'settings.description', 'Settings for Google Captcha', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2107, 1, 'en', 'plugins/captcha/captcha', 'settings.captcha_site_key', 'Captcha Site Key', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2108, 1, 'en', 'plugins/captcha/captcha', 'settings.captcha_secret', 'Captcha Secret', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2109, 1, 'en', 'plugins/captcha/captcha', 'settings.enable_captcha', 'Enable Captcha?', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2110, 1, 'en', 'plugins/captcha/captcha', 'settings.helper', 'Go here to get credentials https://www.google.com/recaptcha/admin#list.', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2111, 1, 'en', 'plugins/captcha/captcha', 'settings.hide_badge', 'Hide recaptcha badge (for v3)', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2112, 1, 'en', 'plugins/captcha/captcha', 'settings.type', 'Type', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2113, 1, 'en', 'plugins/captcha/captcha', 'settings.v2_description', 'V2 (Verify requests with a challenge)', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2114, 1, 'en', 'plugins/captcha/captcha', 'settings.v3_description', 'V3 (Verify requests with a score)', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2115, 1, 'en', 'plugins/captcha/captcha', 'failed_validate', 'Failed to validate the captcha.', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2116, 1, 'vi', 'plugins/captcha/captcha', 'settings.title', 'Captcha', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2117, 1, 'vi', 'plugins/captcha/captcha', 'settings.description', 'Cài đặt cho Google Captcha', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2118, 1, 'vi', 'plugins/captcha/captcha', 'settings.captcha_site_key', 'Captcha Site Key', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2119, 1, 'vi', 'plugins/captcha/captcha', 'settings.captcha_secret', 'Captcha Secret', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2120, 1, 'vi', 'plugins/captcha/captcha', 'settings.enable_captcha', 'Bật Captcha?', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2121, 1, 'vi', 'plugins/captcha/captcha', 'settings.helper', 'Truy cập https://www.google.com/recaptcha/admin#list để lấy thông tin về Site key và Secret.', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2122, 1, 'en', 'plugins/contact/contact', 'menu', 'Contact', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2123, 1, 'en', 'plugins/contact/contact', 'edit', 'View contact', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2124, 1, 'en', 'plugins/contact/contact', 'tables.phone', 'Phone', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2125, 1, 'en', 'plugins/contact/contact', 'tables.email', 'Email', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2126, 1, 'en', 'plugins/contact/contact', 'tables.full_name', 'Full Name', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2127, 1, 'en', 'plugins/contact/contact', 'tables.time', 'Time', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2128, 1, 'en', 'plugins/contact/contact', 'tables.address', 'Address', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2129, 1, 'en', 'plugins/contact/contact', 'tables.subject', 'Subject', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2130, 1, 'en', 'plugins/contact/contact', 'tables.content', 'Content', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2131, 1, 'en', 'plugins/contact/contact', 'contact_information', 'Contact information', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2132, 1, 'en', 'plugins/contact/contact', 'replies', 'Replies', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2133, 1, 'en', 'plugins/contact/contact', 'email.header', 'Email', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2134, 1, 'en', 'plugins/contact/contact', 'email.title', 'New contact from your site', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2135, 1, 'en', 'plugins/contact/contact', 'form.name.required', 'Name is required', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2136, 1, 'en', 'plugins/contact/contact', 'form.email.required', 'Email is required', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2137, 1, 'en', 'plugins/contact/contact', 'form.email.email', 'The email address is not valid', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2138, 1, 'en', 'plugins/contact/contact', 'form.content.required', 'Content is required', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2139, 1, 'en', 'plugins/contact/contact', 'contact_sent_from', 'This contact information sent from', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2140, 1, 'en', 'plugins/contact/contact', 'sender', 'Sender', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2141, 1, 'en', 'plugins/contact/contact', 'sender_email', 'Email', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2142, 1, 'en', 'plugins/contact/contact', 'sender_address', 'Address', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2143, 1, 'en', 'plugins/contact/contact', 'sender_phone', 'Phone', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2144, 1, 'en', 'plugins/contact/contact', 'message_content', 'Message content', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2145, 1, 'en', 'plugins/contact/contact', 'sent_from', 'Email sent from', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2146, 1, 'en', 'plugins/contact/contact', 'form_name', 'Name', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2147, 1, 'en', 'plugins/contact/contact', 'form_email', 'Email', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2148, 1, 'en', 'plugins/contact/contact', 'form_address', 'Address', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2149, 1, 'en', 'plugins/contact/contact', 'form_subject', 'Subject', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2150, 1, 'en', 'plugins/contact/contact', 'form_phone', 'Phone', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2151, 1, 'en', 'plugins/contact/contact', 'form_message', 'Message', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2152, 1, 'en', 'plugins/contact/contact', 'required_field', 'The field with (<span style=\"color: red\">*</span>) is required.', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2153, 1, 'en', 'plugins/contact/contact', 'send_btn', 'Send message', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2154, 1, 'en', 'plugins/contact/contact', 'new_msg_notice', 'You have <span class=\"bold\">:count</span> New Messages', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2155, 1, 'en', 'plugins/contact/contact', 'view_all', 'View all', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2156, 1, 'en', 'plugins/contact/contact', 'statuses.read', 'Read', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2157, 1, 'en', 'plugins/contact/contact', 'statuses.unread', 'Unread', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2158, 1, 'en', 'plugins/contact/contact', 'phone', 'Phone', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2159, 1, 'en', 'plugins/contact/contact', 'address', 'Address', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2160, 1, 'en', 'plugins/contact/contact', 'message', 'Message', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2161, 1, 'en', 'plugins/contact/contact', 'settings.email.title', 'Contact', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2162, 1, 'en', 'plugins/contact/contact', 'settings.email.description', 'Contact email configuration', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2163, 1, 'en', 'plugins/contact/contact', 'settings.email.templates.notice_title', 'Send notice to administrator', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2164, 1, 'en', 'plugins/contact/contact', 'settings.email.templates.notice_description', 'Email template to send notice to administrator when system get new contact', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2165, 1, 'en', 'plugins/contact/contact', 'no_reply', 'No reply yet!', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2166, 1, 'en', 'plugins/contact/contact', 'reply', 'Reply', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2167, 1, 'en', 'plugins/contact/contact', 'send', 'Send', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2168, 1, 'en', 'plugins/contact/contact', 'shortcode_name', 'Contact form', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2169, 1, 'en', 'plugins/contact/contact', 'shortcode_description', 'Add a contact form', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2170, 1, 'en', 'plugins/contact/contact', 'shortcode_content_description', 'Add shortcode [contact-form][/contact-form] to editor?', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2171, 1, 'en', 'plugins/contact/contact', 'message_sent_success', 'Message sent successfully!', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2172, 1, 'vi', 'plugins/contact/contact', 'menu', 'Liên hệ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2173, 1, 'vi', 'plugins/contact/contact', 'edit', 'Xem liên hệ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2174, 1, 'vi', 'plugins/contact/contact', 'tables.phone', 'Điện thoại', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2175, 1, 'vi', 'plugins/contact/contact', 'tables.email', 'Email', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2176, 1, 'vi', 'plugins/contact/contact', 'tables.full_name', 'Họ tên', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2177, 1, 'vi', 'plugins/contact/contact', 'tables.time', 'Thời gian', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2178, 1, 'vi', 'plugins/contact/contact', 'tables.address', 'Địa địa chỉ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2179, 1, 'vi', 'plugins/contact/contact', 'tables.subject', 'Tiêu đề', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2180, 1, 'vi', 'plugins/contact/contact', 'tables.content', 'Nội dung', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2181, 1, 'vi', 'plugins/contact/contact', 'contact_information', 'Thông tin liên hệ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2182, 1, 'vi', 'plugins/contact/contact', 'email.title', 'Thông tin liên hệ mới', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2183, 1, 'vi', 'plugins/contact/contact', 'email.header', 'Email', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2184, 1, 'vi', 'plugins/contact/contact', 'form.name.required', 'Tên là bắt buộc', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2185, 1, 'vi', 'plugins/contact/contact', 'form.email.required', 'Email là bắt buộc', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2186, 1, 'vi', 'plugins/contact/contact', 'form.email.email', 'Địa chỉ email không hợp lệ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2187, 1, 'vi', 'plugins/contact/contact', 'form.content.required', 'Nội dung là bắt buộc', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2188, 1, 'vi', 'plugins/contact/contact', 'contact_sent_from', 'Liên hệ này được gửi từ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2189, 1, 'vi', 'plugins/contact/contact', 'form_address', 'Địa chỉ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2190, 1, 'vi', 'plugins/contact/contact', 'form_email', 'Thư điện tử', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2191, 1, 'vi', 'plugins/contact/contact', 'form_message', 'Thông điệp', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2192, 1, 'vi', 'plugins/contact/contact', 'form_name', 'Họ tên', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2193, 1, 'vi', 'plugins/contact/contact', 'form_phone', 'Số điện thoại', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2194, 1, 'vi', 'plugins/contact/contact', 'message_content', 'Nội dung thông điệp', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2195, 1, 'vi', 'plugins/contact/contact', 'required_field', 'Những trường có dấu (<span style=\"color: red\">*</span>) là bắt buộc.', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2196, 1, 'vi', 'plugins/contact/contact', 'send_btn', 'Gửi tin nhắn', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2197, 1, 'vi', 'plugins/contact/contact', 'sender', 'Người gửi', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2198, 1, 'vi', 'plugins/contact/contact', 'sender_address', 'Địa chỉ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2199, 1, 'vi', 'plugins/contact/contact', 'sender_email', 'Thư điện tử', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2200, 1, 'vi', 'plugins/contact/contact', 'sender_phone', 'Số điện thoại', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2201, 1, 'vi', 'plugins/contact/contact', 'sent_from', 'Thư được gửi từ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2202, 1, 'vi', 'plugins/contact/contact', 'address', 'Địa chỉ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2203, 1, 'vi', 'plugins/contact/contact', 'message', 'Liên hệ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2204, 1, 'vi', 'plugins/contact/contact', 'new_msg_notice', 'Bạn có <span class=\"bold\">:count</span> tin nhắn mới', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2205, 1, 'vi', 'plugins/contact/contact', 'phone', 'Điện thoại', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2206, 1, 'vi', 'plugins/contact/contact', 'statuses.read', 'Đã đọc', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2207, 1, 'vi', 'plugins/contact/contact', 'statuses.unread', 'Chưa đọc', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2208, 1, 'vi', 'plugins/contact/contact', 'view_all', 'Xem tất cả', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2209, 1, 'vi', 'plugins/contact/contact', 'settings.email.title', 'Liên hệ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2210, 1, 'vi', 'plugins/contact/contact', 'settings.email.description', 'Cấu hình thông tin cho mục liên hệ', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2211, 1, 'vi', 'plugins/contact/contact', 'settings.email.templates.notice_title', 'Thông báo tới admin', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2212, 1, 'vi', 'plugins/contact/contact', 'settings.email.templates.notice_description', 'Mẫu nội dung email gửi tới admin khi có liên hệ mới', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2213, 1, 'vi', 'plugins/contact/contact', 'replies', 'Trả lời', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2214, 1, 'vi', 'plugins/contact/contact', 'form_subject', 'Tiêu đề', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2215, 1, 'en', 'plugins/cookie-consent/cookie-consent', 'theme_options.name', 'Cookie Consent', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2216, 1, 'en', 'plugins/cookie-consent/cookie-consent', 'theme_options.description', 'Cookie consent settings', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2217, 1, 'en', 'plugins/cookie-consent/cookie-consent', 'theme_options.enable', 'Enable cookie consent?', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2218, 1, 'en', 'plugins/cookie-consent/cookie-consent', 'theme_options.message', 'Message', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2219, 1, 'en', 'plugins/cookie-consent/cookie-consent', 'theme_options.button_text', 'Button text', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2220, 1, 'en', 'plugins/cookie-consent/cookie-consent', 'theme_options.max_width', 'Max width (px)', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2221, 1, 'en', 'plugins/cookie-consent/cookie-consent', 'theme_options.background_color', 'Background color', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2222, 1, 'en', 'plugins/cookie-consent/cookie-consent', 'theme_options.text_color', 'Text color', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2223, 1, 'en', 'plugins/cookie-consent/cookie-consent', 'theme_options.learn_more_url', 'Learn more URL', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2224, 1, 'en', 'plugins/cookie-consent/cookie-consent', 'theme_options.learn_more_text', 'Learn more text', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2225, 1, 'en', 'plugins/cookie-consent/cookie-consent', 'message', 'Your experience on this site will be improved by allowing cookies.', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2226, 1, 'en', 'plugins/cookie-consent/cookie-consent', 'button_text', 'Allow cookies', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2227, 1, 'en', 'plugins/custom-field/base', 'admin_menu.title', 'Custom Fields', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2228, 1, 'en', 'plugins/custom-field/base', 'page_title', 'Custom Fields', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2229, 1, 'en', 'plugins/custom-field/base', 'all_field_groups', 'All field groups', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2230, 1, 'en', 'plugins/custom-field/base', 'form.create_field_group', 'Create field group', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2231, 1, 'en', 'plugins/custom-field/base', 'form.edit_field_group', 'Edit field group', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2232, 1, 'en', 'plugins/custom-field/base', 'form.field_items_information', 'Field items information', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2233, 1, 'en', 'plugins/custom-field/base', 'form.repeater_fields', 'Repeater', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2234, 1, 'en', 'plugins/custom-field/base', 'form.add_field', 'Add field', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2235, 1, 'en', 'plugins/custom-field/base', 'form.remove_field', 'Remove field', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2236, 1, 'en', 'plugins/custom-field/base', 'form.close_field', 'Close field', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2237, 1, 'en', 'plugins/custom-field/base', 'form.field_label', 'Label', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2238, 1, 'en', 'plugins/custom-field/base', 'form.field_label_helper', 'This is the title of field item. It will be shown on edit pages.', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2239, 1, 'en', 'plugins/custom-field/base', 'form.field_name', 'Field name', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2240, 1, 'en', 'plugins/custom-field/base', 'form.field_name_helper', 'The alias of field item. Accepted numbers, characters and underscore.', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2241, 1, 'en', 'plugins/custom-field/base', 'form.field_type', 'Field type', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2242, 1, 'en', 'plugins/custom-field/base', 'form.field_type_helper', 'Please select the type of this field.', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2243, 1, 'en', 'plugins/custom-field/base', 'form.field_instructions', 'Field instructions', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2244, 1, 'en', 'plugins/custom-field/base', 'form.field_instructions_helper', 'The instructions guide for user easier know what they need to input.', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2245, 1, 'en', 'plugins/custom-field/base', 'form.default_value', 'Default value', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2246, 1, 'en', 'plugins/custom-field/base', 'form.default_value_helper', 'The default value of field when leave it blank', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2247, 1, 'en', 'plugins/custom-field/base', 'form.placeholder', 'Placeholder', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2248, 1, 'en', 'plugins/custom-field/base', 'form.placeholder_helper', 'Placeholder text', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2249, 1, 'en', 'plugins/custom-field/base', 'form.rows', 'Rows', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2250, 1, 'en', 'plugins/custom-field/base', 'form.rows_helper', 'Rows of this textarea', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2251, 1, 'en', 'plugins/custom-field/base', 'form.toolbar', 'Toolbar', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2252, 1, 'en', 'plugins/custom-field/base', 'form.toolbar_helper', 'The toolbar when use editor', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2253, 1, 'en', 'plugins/custom-field/base', 'form.toolbar_basic', 'Basic', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2254, 1, 'en', 'plugins/custom-field/base', 'form.toolbar_full', 'Full', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2255, 1, 'en', 'plugins/custom-field/base', 'form.choices', 'Choices', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2256, 1, 'en', 'plugins/custom-field/base', 'form.choices_helper', 'Enter each choice on a new line.<br>For more control, you may specify both a value and label like this:<br>red: Red<br>blue: Blue', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2257, 1, 'en', 'plugins/custom-field/base', 'form.button_label', 'Button for repeater', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2258, 1, 'en', 'plugins/custom-field/base', 'form.groups.basic', 'Basic', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2259, 1, 'en', 'plugins/custom-field/base', 'form.groups.content', 'Content', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2260, 1, 'en', 'plugins/custom-field/base', 'form.groups.choice', 'Choices', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2261, 1, 'en', 'plugins/custom-field/base', 'form.groups.other', 'Other', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2262, 1, 'en', 'plugins/custom-field/base', 'form.types.text', 'Text field', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2263, 1, 'en', 'plugins/custom-field/base', 'form.types.textarea', 'Textarea', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2264, 1, 'en', 'plugins/custom-field/base', 'form.types.number', 'Number', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2265, 1, 'en', 'plugins/custom-field/base', 'form.types.email', 'Email', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2266, 1, 'en', 'plugins/custom-field/base', 'form.types.password', 'Password', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2267, 1, 'en', 'plugins/custom-field/base', 'form.types.wysiwyg', 'WYSIWYG editor', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2268, 1, 'en', 'plugins/custom-field/base', 'form.types.image', 'Image', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2269, 1, 'en', 'plugins/custom-field/base', 'form.types.file', 'File', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2270, 1, 'en', 'plugins/custom-field/base', 'form.types.select', 'Select', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2271, 1, 'en', 'plugins/custom-field/base', 'form.types.checkbox', 'Checkbox', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2272, 1, 'en', 'plugins/custom-field/base', 'form.types.radio', 'Radio', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2273, 1, 'en', 'plugins/custom-field/base', 'form.types.repeater', 'Repeater', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2274, 1, 'en', 'plugins/custom-field/base', 'form.rules.rules', 'Display rules', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2275, 1, 'en', 'plugins/custom-field/base', 'form.rules.rules_helper', 'Show this field group if', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2276, 1, 'en', 'plugins/custom-field/base', 'form.rules.add_rule_group', 'Add rule group', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2277, 1, 'en', 'plugins/custom-field/base', 'form.rules.is_equal_to', 'Equal to', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2278, 1, 'en', 'plugins/custom-field/base', 'form.rules.is_not_equal_to', 'Not equal to', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2279, 1, 'en', 'plugins/custom-field/base', 'form.rules.and', 'And', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2280, 1, 'en', 'plugins/custom-field/base', 'form.rules.or', 'Or', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2281, 1, 'en', 'plugins/custom-field/base', 'import', 'Import', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2282, 1, 'en', 'plugins/custom-field/base', 'export', 'Export', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2283, 1, 'en', 'plugins/custom-field/base', 'publish', 'Publish', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2284, 1, 'en', 'plugins/custom-field/base', 'remove_this_line', 'Remove this line', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2285, 1, 'en', 'plugins/custom-field/base', 'collapse_this_line', 'Collapse this line', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2286, 1, 'en', 'plugins/custom-field/base', 'error_occurred', 'Error occurred', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2287, 1, 'en', 'plugins/custom-field/base', 'request_completed', 'Request completed', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2288, 1, 'en', 'plugins/custom-field/base', 'item_not_existed', 'Item is not exists', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2289, 1, 'en', 'plugins/custom-field/rules', 'groups.basic', 'Basic', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2290, 1, 'en', 'plugins/custom-field/rules', 'groups.other', 'Other', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2291, 1, 'en', 'plugins/custom-field/rules', 'groups.blog', 'Blog', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2292, 1, 'en', 'plugins/custom-field/rules', 'logged_in_user', 'Logged in user', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2293, 1, 'en', 'plugins/custom-field/rules', 'logged_in_user_has_role', 'Logged in has role', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2294, 1, 'en', 'plugins/custom-field/rules', 'page_template', 'Page template', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2295, 1, 'en', 'plugins/custom-field/rules', 'page', 'Page', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2296, 1, 'en', 'plugins/custom-field/rules', 'model_name', 'Model name', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2297, 1, 'en', 'plugins/custom-field/rules', 'model_name_page', 'Page', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2298, 1, 'en', 'plugins/custom-field/rules', 'category', 'Category', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2299, 1, 'en', 'plugins/custom-field/rules', 'post_with_related_category', 'Post with related category', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2300, 1, 'en', 'plugins/custom-field/rules', 'model_name_post', 'Post (blog)', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2301, 1, 'en', 'plugins/custom-field/rules', 'model_name_category', 'Category (blog)', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2302, 1, 'en', 'plugins/custom-field/rules', 'post_format', 'Post format', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2303, 1, 'vi', 'plugins/custom-field/base', 'admin_menu.title', 'Trường tùy chỉnh', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2304, 1, 'vi', 'plugins/custom-field/base', 'page_title', 'Trường tùy chỉnh', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2305, 1, 'vi', 'plugins/custom-field/base', 'all_field_groups', 'Tất cả nhóm trường tùy chỉnh', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2306, 1, 'vi', 'plugins/custom-field/base', 'form.create_field_group', 'Thêm nhóm trường mới', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2307, 1, 'vi', 'plugins/custom-field/base', 'form.edit_field_group', 'Chỉnh sửa trường tùy chỉnh', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2308, 1, 'vi', 'plugins/custom-field/base', 'form.field_items_information', 'Thiết đặt các mục con của trường này', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2309, 1, 'vi', 'plugins/custom-field/base', 'form.repeater_fields', 'Bộ lặp', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2310, 1, 'vi', 'plugins/custom-field/base', 'form.add_field', 'Thêm trường', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2311, 1, 'vi', 'plugins/custom-field/base', 'form.remove_field', 'Xóa trường này', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2312, 1, 'vi', 'plugins/custom-field/base', 'form.close_field', 'Thu nhỏ trường này lại', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2313, 1, 'vi', 'plugins/custom-field/base', 'form.field_label', 'Nhãn', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2314, 1, 'vi', 'plugins/custom-field/base', 'form.field_label_helper', 'Đây là tiêu đề của từng trường, xuất hiện ở các trang chỉnh sửa', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2315, 1, 'vi', 'plugins/custom-field/base', 'form.field_name', 'Tên truy nhập trường', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2316, 1, 'vi', 'plugins/custom-field/base', 'form.field_name_helper', 'Tên truy nhập của trường. Chỉ chấp nhận ký tự thường và dấu gạch dưới', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2317, 1, 'vi', 'plugins/custom-field/base', 'form.field_type', 'Kiểu trường', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2318, 1, 'vi', 'plugins/custom-field/base', 'form.field_type_helper', 'Vui lòng chọn một kiểu phù hợp cho bạn', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2319, 1, 'vi', 'plugins/custom-field/base', 'form.field_instructions', 'Hướng dẫn nhập liệu cho trường', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2320, 1, 'vi', 'plugins/custom-field/base', 'form.field_instructions_helper', 'Hướng dẫn nhập liệu từng trường cho người nhập liệu. Hiển thị ở các trang chỉnh sửa', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2321, 1, 'vi', 'plugins/custom-field/base', 'form.default_value', 'Giá trị mặc định', '2021-07-10 19:24:18', '2021-07-10 19:24:18'),
(2322, 1, 'vi', 'plugins/custom-field/base', 'form.default_value_helper', 'Tự động khởi tạo khi trường bị để trống', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2323, 1, 'vi', 'plugins/custom-field/base', 'form.placeholder', 'Mô tả trường', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2324, 1, 'vi', 'plugins/custom-field/base', 'form.placeholder_helper', 'Xuất hiện ngay bên trong mục nhập khi trường bị để trống', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2325, 1, 'vi', 'plugins/custom-field/base', 'form.rows', 'Số dòng', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2326, 1, 'vi', 'plugins/custom-field/base', 'form.rows_helper', 'Số dòng được khởi tạo khi sử dụng trường textarea', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2327, 1, 'vi', 'plugins/custom-field/base', 'form.toolbar', 'Thanh công cụ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2328, 1, 'vi', 'plugins/custom-field/base', 'form.toolbar_helper', 'Tùy chỉnh kiểu thanh công cụ khi sử dụng trình nhập liệu', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2329, 1, 'vi', 'plugins/custom-field/base', 'form.toolbar_basic', 'Thanh công cụ đơn giản', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2330, 1, 'vi', 'plugins/custom-field/base', 'form.toolbar_full', 'Thanh công cụ đầy đủ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2331, 1, 'vi', 'plugins/custom-field/base', 'form.choices', 'Các mục lựa chọn', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2332, 1, 'vi', 'plugins/custom-field/base', 'form.choices_helper', 'Nhập mỗi lựa chọn trên một dòng mới. <br> Để quản lý tốt hơn, bạn có thể cần phải xác định rõ cả nhãn và giá trị lựa chọn như sau: <br> red: Red <br> blue: Blue', '2021-07-10 19:24:19', '2021-07-10 19:24:19');
INSERT INTO `translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(2333, 1, 'vi', 'plugins/custom-field/base', 'form.button_label', 'Nhãn cho nút thêm mới bộ lặp', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2334, 1, 'vi', 'plugins/custom-field/base', 'form.groups.basic', 'Cơ bản', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2335, 1, 'vi', 'plugins/custom-field/base', 'form.groups.content', 'Nội dung', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2336, 1, 'vi', 'plugins/custom-field/base', 'form.groups.choice', 'Lựa chọn', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2337, 1, 'vi', 'plugins/custom-field/base', 'form.groups.other', 'Khác', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2338, 1, 'vi', 'plugins/custom-field/base', 'form.types.text', 'Văn bản', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2339, 1, 'vi', 'plugins/custom-field/base', 'form.types.textarea', 'Văn bản nhiều dòng', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2340, 1, 'vi', 'plugins/custom-field/base', 'form.types.number', 'Số', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2341, 1, 'vi', 'plugins/custom-field/base', 'form.types.email', 'Thư điện tử', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2342, 1, 'vi', 'plugins/custom-field/base', 'form.types.password', 'Mật khẩu', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2343, 1, 'vi', 'plugins/custom-field/base', 'form.types.wysiwyg', 'Trình nhập liệu', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2344, 1, 'vi', 'plugins/custom-field/base', 'form.types.image', 'Hình ảnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2345, 1, 'vi', 'plugins/custom-field/base', 'form.types.file', 'Tập tin', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2346, 1, 'vi', 'plugins/custom-field/base', 'form.types.select', 'Thanh lựa chọn', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2347, 1, 'vi', 'plugins/custom-field/base', 'form.types.checkbox', 'Checkbox', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2348, 1, 'vi', 'plugins/custom-field/base', 'form.types.radio', 'Radio', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2349, 1, 'vi', 'plugins/custom-field/base', 'form.types.repeater', 'Bộ lặp', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2350, 1, 'vi', 'plugins/custom-field/base', 'form.rules.rules', 'Luật hiển thị', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2351, 1, 'vi', 'plugins/custom-field/base', 'form.rules.rules_helper', 'Hiển thị nhóm trường này nếu', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2352, 1, 'vi', 'plugins/custom-field/base', 'form.rules.add_rule_group', 'Thêm nhóm luật mới', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2353, 1, 'vi', 'plugins/custom-field/base', 'form.rules.is_equal_to', 'Tương đương', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2354, 1, 'vi', 'plugins/custom-field/base', 'form.rules.is_not_equal_to', 'Khác với', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2355, 1, 'vi', 'plugins/custom-field/base', 'form.rules.and', 'Và', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2356, 1, 'vi', 'plugins/custom-field/base', 'form.rules.or', 'Hoặc', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2357, 1, 'vi', 'plugins/custom-field/base', 'import', 'Nhập dữ liệu', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2358, 1, 'vi', 'plugins/custom-field/base', 'export', 'Xuất dữ liệu', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2359, 1, 'vi', 'plugins/custom-field/rules', 'groups.basic', 'Cơ bản', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2360, 1, 'vi', 'plugins/custom-field/rules', 'groups.other', 'Khác', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2361, 1, 'vi', 'plugins/custom-field/rules', 'groups.blog', 'Blog', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2362, 1, 'vi', 'plugins/custom-field/rules', 'logged_in_user', 'Người đăng nhập hiện tại', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2363, 1, 'vi', 'plugins/custom-field/rules', 'logged_in_user_has_role', 'Người đăng nhập hiện tại có vai trò', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2364, 1, 'vi', 'plugins/custom-field/rules', 'page_template', 'Giao diện trang tĩnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2365, 1, 'vi', 'plugins/custom-field/rules', 'page', 'Trang tĩnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2366, 1, 'vi', 'plugins/custom-field/rules', 'model_name', 'Tên model', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2367, 1, 'vi', 'plugins/custom-field/rules', 'model_name_page', 'Trang tĩnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2368, 1, 'vi', 'plugins/custom-field/rules', 'category', 'Danh mục bài viết', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2369, 1, 'vi', 'plugins/custom-field/rules', 'post_with_related_category', 'Bài viết có danh mục', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2370, 1, 'vi', 'plugins/custom-field/rules', 'model_name_post', 'Bài viết (blog)', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2371, 1, 'vi', 'plugins/custom-field/rules', 'model_name_category', 'Danh mục (blog)', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2372, 1, 'vi', 'plugins/custom-field/rules', 'post_format', 'Định dạng bài viết', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2373, 1, 'en', 'plugins/gallery/gallery', 'create', 'Create new gallery', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2374, 1, 'en', 'plugins/gallery/gallery', 'edit', 'Edit gallery', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2375, 1, 'en', 'plugins/gallery/gallery', 'galleries', 'Galleries', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2376, 1, 'en', 'plugins/gallery/gallery', 'item', 'Gallery item', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2377, 1, 'en', 'plugins/gallery/gallery', 'select_image', 'Select images', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2378, 1, 'en', 'plugins/gallery/gallery', 'reset', 'Reset gallery', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2379, 1, 'en', 'plugins/gallery/gallery', 'update_photo_description', 'Update photo\'s description', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2380, 1, 'en', 'plugins/gallery/gallery', 'update_photo_description_placeholder', 'Photo\'s description...', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2381, 1, 'en', 'plugins/gallery/gallery', 'delete_photo', 'Delete this photo', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2382, 1, 'en', 'plugins/gallery/gallery', 'gallery_box', 'Gallery images', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2383, 1, 'en', 'plugins/gallery/gallery', 'by', 'By', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2384, 1, 'en', 'plugins/gallery/gallery', 'menu_name', 'Galleries', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2385, 1, 'en', 'plugins/gallery/gallery', 'gallery_images', 'Gallery images', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2386, 1, 'en', 'plugins/gallery/gallery', 'add_gallery_short_code', 'Add a gallery', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2387, 1, 'en', 'plugins/gallery/gallery', 'shortcode_name', 'Gallery images', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2388, 1, 'en', 'plugins/gallery/gallery', 'limit_display', 'Limit number display', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2389, 1, 'vi', 'plugins/gallery/gallery', 'create', 'Tạo mới thư viện ảnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2390, 1, 'vi', 'plugins/gallery/gallery', 'edit', 'Sửa thư viện ảnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2391, 1, 'vi', 'plugins/gallery/gallery', 'delete_photo', 'Xóa ảnh này', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2392, 1, 'vi', 'plugins/gallery/gallery', 'galleries', 'Thư viện ảnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2393, 1, 'vi', 'plugins/gallery/gallery', 'item', 'Ảnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2394, 1, 'vi', 'plugins/gallery/gallery', 'reset', 'Làm mới thư viện', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2395, 1, 'vi', 'plugins/gallery/gallery', 'select_image', 'Lựa chọn hình ảnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2396, 1, 'vi', 'plugins/gallery/gallery', 'update_photo_description', 'Cập nhật mô tả cho hình ảnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2397, 1, 'vi', 'plugins/gallery/gallery', 'update_photo_description_placeholder', 'Mô tả của hình ảnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2398, 1, 'vi', 'plugins/gallery/gallery', 'by', 'Bởi', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2399, 1, 'vi', 'plugins/gallery/gallery', 'gallery_box', 'Thư viện ảnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2400, 1, 'vi', 'plugins/gallery/gallery', 'menu_name', 'Thư viện ảnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2401, 1, 'vi', 'plugins/gallery/gallery', 'add_gallery_short_code', 'Thêm thư viện ảnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2402, 1, 'vi', 'plugins/gallery/gallery', 'gallery_images', 'Thư viện ảnh', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2403, 1, 'en', 'plugins/language/language', 'name', 'Languages', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2404, 1, 'en', 'plugins/language/language', 'choose_language', 'Choose a language', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2405, 1, 'en', 'plugins/language/language', 'select_language', 'Select language', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2406, 1, 'en', 'plugins/language/language', 'choose_language_helper', 'You can choose a language in the list or directly edit it below.', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2407, 1, 'en', 'plugins/language/language', 'language_name', 'Language name', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2408, 1, 'en', 'plugins/language/language', 'language_name_helper', 'The name is how it is displayed on your site (for example: English).', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2409, 1, 'en', 'plugins/language/language', 'locale', 'Locale', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2410, 1, 'en', 'plugins/language/language', 'locale_helper', 'Laravel Locale for the language (for example: <code>en</code>).', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2411, 1, 'en', 'plugins/language/language', 'language_code', 'Language code', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2412, 1, 'en', 'plugins/language/language', 'language_code_helper', 'Language code - preferably 2-letters ISO 639-1 (for example: en)', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2413, 1, 'en', 'plugins/language/language', 'text_direction', 'Text direction', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2414, 1, 'en', 'plugins/language/language', 'text_direction_helper', 'Choose the text direction for the language', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2415, 1, 'en', 'plugins/language/language', 'left_to_right', 'Left to right', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2416, 1, 'en', 'plugins/language/language', 'right_to_left', 'Right to left', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2417, 1, 'en', 'plugins/language/language', 'flag', 'Flag', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2418, 1, 'en', 'plugins/language/language', 'flag_helper', 'Choose a flag for the language.', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2419, 1, 'en', 'plugins/language/language', 'order', 'Order', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2420, 1, 'en', 'plugins/language/language', 'order_helper', 'Position of the language in the language switcher', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2421, 1, 'en', 'plugins/language/language', 'add_new_language', 'Add new language', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2422, 1, 'en', 'plugins/language/language', 'code', 'Code', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2423, 1, 'en', 'plugins/language/language', 'default_language', 'Is default?', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2424, 1, 'en', 'plugins/language/language', 'actions', 'Actions', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2425, 1, 'en', 'plugins/language/language', 'translations', 'Translations', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2426, 1, 'en', 'plugins/language/language', 'edit', 'Edit', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2427, 1, 'en', 'plugins/language/language', 'edit_tooltip', 'Edit this language', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2428, 1, 'en', 'plugins/language/language', 'delete', 'Delete', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2429, 1, 'en', 'plugins/language/language', 'delete_tooltip', 'Delete this language and all its associated data', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2430, 1, 'en', 'plugins/language/language', 'choose_default_language', 'Choose :language as default language', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2431, 1, 'en', 'plugins/language/language', 'current_language', 'Current record\'s language', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2432, 1, 'en', 'plugins/language/language', 'edit_related', 'Edit related language for this record', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2433, 1, 'en', 'plugins/language/language', 'add_language_for_item', 'Add other language version for this record', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2434, 1, 'en', 'plugins/language/language', 'settings', 'Settings', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2435, 1, 'en', 'plugins/language/language', 'language_hide_default', 'Hide default language from URL?', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2436, 1, 'en', 'plugins/language/language', 'language_display_flag_only', 'Flag only', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2437, 1, 'en', 'plugins/language/language', 'language_display_name_only', 'Name only', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2438, 1, 'en', 'plugins/language/language', 'language_display_all', 'Display all flag and name', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2439, 1, 'en', 'plugins/language/language', 'language_display', 'Language display', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2440, 1, 'en', 'plugins/language/language', 'switcher_display', 'Switcher language display', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2441, 1, 'en', 'plugins/language/language', 'language_switcher_display_dropdown', 'Dropdown', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2442, 1, 'en', 'plugins/language/language', 'language_switcher_display_list', 'List', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2443, 1, 'en', 'plugins/language/language', 'current_language_edit_notification', 'You are editing \"<strong class=\"current_language_text\">:language</strong>\" version', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2444, 1, 'en', 'plugins/language/language', 'confirm-change-language', 'Confirm change language', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2445, 1, 'en', 'plugins/language/language', 'confirm-change-language-message', 'Do you really want to change language to \"<strong class=\"change_to_language_text\"></strong>\" ? This action will be override \"<strong class=\"change_to_language_text\"></strong>\" version if it\'s existed!', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2446, 1, 'en', 'plugins/language/language', 'confirm-change-language-btn', 'Confirm change', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2447, 1, 'en', 'plugins/language/language', 'hide_languages', 'Hide languages', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2448, 1, 'en', 'plugins/language/language', 'hide_languages_description', 'You can completely hide content in specific languages from visitors and search engines, but still view it yourself. This allows reviewing translations that are in progress.', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2449, 1, 'en', 'plugins/language/language', 'hide_languages_helper_display_hidden', '{0} All languages are currently displayed.|{1} :language is currently hidden to visitors.|[2, Inf] :language are currently hidden to visitors.', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2450, 1, 'en', 'plugins/language/language', 'show_all', 'Show all', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2451, 1, 'en', 'plugins/language/language', 'change_language', 'Language', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2452, 1, 'en', 'plugins/language/language', 'language_show_default_item_if_current_version_not_existed', 'Show item in default language if it is not existed in current language', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2453, 1, 'en', 'plugins/language/language', 'select_flag', 'Select a flag...', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2454, 1, 'en', 'plugins/language/language', 'delete_confirmation_message', 'Do you really want to delete this language? It also deletes all items in this language and cannot rollback!', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2455, 1, 'en', 'plugins/language/language', 'added_already', 'This language was added already!', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2456, 1, 'vi', 'plugins/language/language', 'name', 'Ngôn ngữ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2457, 1, 'vi', 'plugins/language/language', 'choose_language', 'Chọn một ngôn ngữ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2458, 1, 'vi', 'plugins/language/language', 'select_language', 'Chọn ngôn ngữ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2459, 1, 'vi', 'plugins/language/language', 'choose_language_helper', 'Bạn có thể chọn 1 ngôn ngữ trong danh sách hoặc nhập trực tiếp nội dung xuống các mục dưới', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2460, 1, 'vi', 'plugins/language/language', 'language_name', 'Tên đầy đủ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2461, 1, 'vi', 'plugins/language/language', 'language_name_helper', 'Tên ngôn ngữ sẽ được hiển thị trên website (ví dụ: Tiếng Anh).', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2462, 1, 'vi', 'plugins/language/language', 'locale', 'Locale', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2463, 1, 'vi', 'plugins/language/language', 'locale_helper', 'Laravel Locale cho ngôn ngữ này (ví dụ: <code>en</code>).', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2464, 1, 'vi', 'plugins/language/language', 'language_code', 'Mã ngôn ngữ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2465, 1, 'vi', 'plugins/language/language', 'language_code_helper', 'Mã ngôn ngữ - ưu tiên dạng 2-kí tự theo chuẩn ISO 639-1 (ví dụ: en)', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2466, 1, 'vi', 'plugins/language/language', 'text_direction', 'Hướng viết chữ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2467, 1, 'vi', 'plugins/language/language', 'text_direction_helper', 'Chọn hướng viết chữ cho ngôn ngữ này', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2468, 1, 'vi', 'plugins/language/language', 'left_to_right', 'Trái qua phải', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2469, 1, 'vi', 'plugins/language/language', 'right_to_left', 'Phải qua trái', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2470, 1, 'vi', 'plugins/language/language', 'flag', 'Cờ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2471, 1, 'vi', 'plugins/language/language', 'flag_helper', 'Chọn 1 cờ cho ngôn ngữ này', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2472, 1, 'vi', 'plugins/language/language', 'order', 'Sắp xếp', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2473, 1, 'vi', 'plugins/language/language', 'order_helper', 'Vị trí của ngôn ngữ hiển thị trong mục chuyển đổi ngôn ngữ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2474, 1, 'vi', 'plugins/language/language', 'add_new_language', 'Thêm ngôn ngữ mới', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2475, 1, 'vi', 'plugins/language/language', 'code', 'Mã', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2476, 1, 'vi', 'plugins/language/language', 'default_language', 'Ngôn ngữ mặc định', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2477, 1, 'vi', 'plugins/language/language', 'actions', 'Hành động', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2478, 1, 'vi', 'plugins/language/language', 'translations', 'Dịch', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2479, 1, 'vi', 'plugins/language/language', 'edit', 'Sửa', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2480, 1, 'vi', 'plugins/language/language', 'edit_tooltip', 'Sửa ngôn ngữ này', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2481, 1, 'vi', 'plugins/language/language', 'delete', 'Xóa', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2482, 1, 'vi', 'plugins/language/language', 'delete_tooltip', 'Xóa ngôn ngữ này và các dữ liệu liên quan', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2483, 1, 'vi', 'plugins/language/language', 'choose_default_language', 'Chọn :language làm ngôn ngữ mặc định', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2484, 1, 'vi', 'plugins/language/language', 'add_language_for_item', 'Thêm ngôn ngữ khác cho bản ghi này', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2485, 1, 'vi', 'plugins/language/language', 'current_language', 'Ngôn ngữ hiện tại của bản ghi', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2486, 1, 'vi', 'plugins/language/language', 'edit_related', 'Sửa bản ngôn ngữ khác của bản ghi này', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2487, 1, 'vi', 'plugins/language/language', 'confirm-change-language', 'Xác nhận thay đổi ngôn ngữ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2488, 1, 'vi', 'plugins/language/language', 'confirm-change-language-btn', 'Xác nhận thay đổi', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2489, 1, 'vi', 'plugins/language/language', 'confirm-change-language-message', 'Bạn có chắc chắn muốn thay đổi ngôn ngữ sang tiếng \"<strong class=\"change_to_language_text\"></strong>\" ? Điều này sẽ ghi đè bản ghi tiếng \"<strong class=\"change_to_language_text\"></strong>\" nếu nó đã tồn tại!', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2490, 1, 'vi', 'plugins/language/language', 'current_language_edit_notification', 'Bạn đang chỉnh sửa phiên bản tiếng \"<strong class=\"current_language_text\">:language</strong>\"', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2491, 1, 'vi', 'plugins/language/language', 'hide_languages', 'Ẩn ngôn ngữ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2492, 1, 'vi', 'plugins/language/language', 'hide_languages_description', 'Bạn có thể hoàn toàn ẩn ngôn ngữ cụ thể đối với người truy cập và công cụ tìm kiếm, nhưng sẽ vẫn hiển thị trong trang quản trị. Điều này cho phép bạn biết những ngôn ngữ nào đang được xử lý.', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2493, 1, 'vi', 'plugins/language/language', 'hide_languages_helper_display_hidden', '{0} Tất cả ngôn ngữ đang được hiển thị.|{1} :language đang bị ẩn đối với người truy cập.|[2, Inf]  :language đang bị ẩn đối với người truy cập.', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2494, 1, 'vi', 'plugins/language/language', 'language_display', 'Hiển thị ngôn ngữ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2495, 1, 'vi', 'plugins/language/language', 'language_display_all', 'Hiển thị cả cờ và tên ngôn ngữ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2496, 1, 'vi', 'plugins/language/language', 'language_display_flag_only', 'Chỉ hiển thị cờ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2497, 1, 'vi', 'plugins/language/language', 'language_display_name_only', 'Chỉ hiển thị tên', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2498, 1, 'vi', 'plugins/language/language', 'language_hide_default', 'Ẩn ngôn ngữ mặc định trên URL', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2499, 1, 'vi', 'plugins/language/language', 'language_switcher_display_dropdown', 'Dropdown', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2500, 1, 'vi', 'plugins/language/language', 'language_switcher_display_list', 'Danh sách', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2501, 1, 'vi', 'plugins/language/language', 'settings', 'Cài đặt', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2502, 1, 'vi', 'plugins/language/language', 'switcher_display', 'Hiển thị bộ chuyển đổi ngôn ngữ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2503, 1, 'vi', 'plugins/language/language', 'change_language', 'Ngôn ngữ', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2504, 1, 'vi', 'plugins/language/language', 'show_all', 'Hiển thị tất cả', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2505, 1, 'vi', 'plugins/language/language', 'language_show_default_item_if_current_version_not_existed', 'Hiển thị bản ghi ở ngôn ngữ mặc định nếu phiên bản cho ngôn ngữ hiện tại chưa có', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2506, 1, 'en', 'plugins/member/dashboard', 'joined_on', 'Joined :date', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2507, 1, 'en', 'plugins/member/dashboard', 'dob', 'Born :date', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2508, 1, 'en', 'plugins/member/dashboard', 'email', 'Email', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2509, 1, 'en', 'plugins/member/dashboard', 'password', 'Password', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2510, 1, 'en', 'plugins/member/dashboard', 'password-confirmation', 'Confirm Password', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2511, 1, 'en', 'plugins/member/dashboard', 'remember-me', 'Remember Me', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2512, 1, 'en', 'plugins/member/dashboard', 'login-title', 'Login', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2513, 1, 'en', 'plugins/member/dashboard', 'login-cta', 'Login', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2514, 1, 'en', 'plugins/member/dashboard', 'register-title', 'Register', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2515, 1, 'en', 'plugins/member/dashboard', 'register-cta', 'Register', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2516, 1, 'en', 'plugins/member/dashboard', 'forgot-password-cta', 'Forgot Your Password?', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2517, 1, 'en', 'plugins/member/dashboard', 'name', 'Name', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2518, 1, 'en', 'plugins/member/dashboard', 'reset-password-title', 'Reset Password', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2519, 1, 'en', 'plugins/member/dashboard', 'reset-password-cta', 'Reset Password', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2520, 1, 'en', 'plugins/member/dashboard', 'cancel-link', 'Cancel', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2521, 1, 'en', 'plugins/member/dashboard', 'logout-cta', 'Logout', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2522, 1, 'en', 'plugins/member/dashboard', 'header_profile_link', 'Profile', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2523, 1, 'en', 'plugins/member/dashboard', 'header_settings_link', 'Settings', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2524, 1, 'en', 'plugins/member/dashboard', 'header_logout_link', 'Logout', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2525, 1, 'en', 'plugins/member/dashboard', 'unknown_state', 'Unknown', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2526, 1, 'en', 'plugins/member/dashboard', 'close', 'Close', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2527, 1, 'en', 'plugins/member/dashboard', 'save', 'Save', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2528, 1, 'en', 'plugins/member/dashboard', 'loading', 'Loading...', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2529, 1, 'en', 'plugins/member/dashboard', 'new_image', 'New image', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2530, 1, 'en', 'plugins/member/dashboard', 'change_profile_image', 'Change avatar', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2531, 1, 'en', 'plugins/member/dashboard', 'save_cropped_image_failed', 'Save cropped image failed!', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2532, 1, 'en', 'plugins/member/dashboard', 'failed_to_crop_image', 'Failed to crop image', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2533, 1, 'en', 'plugins/member/dashboard', 'failed_to_load_data', 'Failed to load data', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2534, 1, 'en', 'plugins/member/dashboard', 'read_image_failed', 'Read image failed', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2535, 1, 'en', 'plugins/member/dashboard', 'update_avatar_success', 'Update avatar successfully!', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2536, 1, 'en', 'plugins/member/dashboard', 'change_avatar_description', 'Click on image to change avatar', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2537, 1, 'en', 'plugins/member/dashboard', 'notices.error', 'Error!', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2538, 1, 'en', 'plugins/member/dashboard', 'notices.success', 'Success!', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2539, 1, 'en', 'plugins/member/dashboard', 'sidebar_title', 'Personal settings', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2540, 1, 'en', 'plugins/member/dashboard', 'sidebar_information', 'Account Information', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2541, 1, 'en', 'plugins/member/dashboard', 'sidebar_security', 'Security', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2542, 1, 'en', 'plugins/member/dashboard', 'account_field_title', 'Account Information', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2543, 1, 'en', 'plugins/member/dashboard', 'profile-picture', 'Profile picture', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2544, 1, 'en', 'plugins/member/dashboard', 'uploading', 'Uploading...', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2545, 1, 'en', 'plugins/member/dashboard', 'phone', 'Phone', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2546, 1, 'en', 'plugins/member/dashboard', 'first_name', 'First name', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2547, 1, 'en', 'plugins/member/dashboard', 'last_name', 'Last name', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2548, 1, 'en', 'plugins/member/dashboard', 'description', 'Short description', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2549, 1, 'en', 'plugins/member/dashboard', 'description_placeholder', 'Tell something about yourself...', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2550, 1, 'en', 'plugins/member/dashboard', 'verified', 'Verified', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2551, 1, 'en', 'plugins/member/dashboard', 'verify_require_desc', 'Please verify email by link we sent to you.', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2552, 1, 'en', 'plugins/member/dashboard', 'birthday', 'Birthday', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2553, 1, 'en', 'plugins/member/dashboard', 'year_lc', 'year', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2554, 1, 'en', 'plugins/member/dashboard', 'month_lc', 'month', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2555, 1, 'en', 'plugins/member/dashboard', 'day_lc', 'day', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2556, 1, 'en', 'plugins/member/dashboard', 'gender', 'Gender', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2557, 1, 'en', 'plugins/member/dashboard', 'gender_male', 'Male', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2558, 1, 'en', 'plugins/member/dashboard', 'gender_female', 'Female', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2559, 1, 'en', 'plugins/member/dashboard', 'gender_other', 'Other', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2560, 1, 'en', 'plugins/member/dashboard', 'security_title', 'Security', '2021-07-10 19:24:19', '2021-07-10 19:24:19'),
(2561, 1, 'en', 'plugins/member/dashboard', 'current_password', 'Current password', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2562, 1, 'en', 'plugins/member/dashboard', 'password_new', 'New password', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2563, 1, 'en', 'plugins/member/dashboard', 'password_new_confirmation', 'Confirmation password', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2564, 1, 'en', 'plugins/member/dashboard', 'password_update_btn', 'Update password', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2565, 1, 'en', 'plugins/member/dashboard', 'activity_logs', 'Activity Logs', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2566, 1, 'en', 'plugins/member/dashboard', 'oops', 'Oops!', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2567, 1, 'en', 'plugins/member/dashboard', 'no_activity_logs', 'You have no activity logs yet', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2568, 1, 'en', 'plugins/member/dashboard', 'actions.create_post', 'You have created post \":name\"', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2569, 1, 'en', 'plugins/member/dashboard', 'actions.update_post', 'You have updated post \":name\"', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2570, 1, 'en', 'plugins/member/dashboard', 'actions.delete_post', 'You have deleted post \":name\"', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2571, 1, 'en', 'plugins/member/dashboard', 'actions.update_setting', 'You have updated your settings', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2572, 1, 'en', 'plugins/member/dashboard', 'actions.update_security', 'You have updated your security settings', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2573, 1, 'en', 'plugins/member/dashboard', 'actions.your_post_updated_by_admin', 'Your post \":name\" is updated by administrator', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2574, 1, 'en', 'plugins/member/dashboard', 'actions.changed_avatar', 'You have changed your avatar', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2575, 1, 'en', 'plugins/member/dashboard', 'load_more', 'Load more', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2576, 1, 'en', 'plugins/member/dashboard', 'loading_more', 'Loading...', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2577, 1, 'en', 'plugins/member/dashboard', 'back-to-login', 'Back to login page', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2578, 1, 'en', 'plugins/member/member', 'create', 'New member', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2579, 1, 'en', 'plugins/member/member', 'edit', 'Edit member', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2580, 1, 'en', 'plugins/member/member', 'menu_name', 'Members', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2581, 1, 'en', 'plugins/member/member', 'confirmation_subject', 'Email verification', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2582, 1, 'en', 'plugins/member/member', 'confirmation_subject_title', 'Verify your email', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2583, 1, 'en', 'plugins/member/member', 'not_confirmed', 'The given email address has not been confirmed. <a href=\":resend_link\">Resend confirmation link.</a>', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2584, 1, 'en', 'plugins/member/member', 'confirmation_successful', 'You successfully confirmed your email address.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2585, 1, 'en', 'plugins/member/member', 'confirmation_info', 'Please confirm your email address.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2586, 1, 'en', 'plugins/member/member', 'confirmation_resent', 'We sent you another confirmation email. You should receive it shortly.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2587, 1, 'en', 'plugins/member/member', 'form.email', 'Email', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2588, 1, 'en', 'plugins/member/member', 'form.password', 'Password', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2589, 1, 'en', 'plugins/member/member', 'form.password_confirmation', 'Password confirmation', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2590, 1, 'en', 'plugins/member/member', 'form.change_password', 'Change password?', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2591, 1, 'en', 'plugins/member/member', 'forgot_password', 'Forgot password', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2592, 1, 'en', 'plugins/member/member', 'login', 'Login', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2593, 1, 'en', 'plugins/member/member', 'settings.email.title', 'Member', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2594, 1, 'en', 'plugins/member/member', 'settings.email.description', 'Member email configuration', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2595, 1, 'en', 'plugins/member/member', 'first_name', 'First Name', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2596, 1, 'en', 'plugins/member/member', 'last_name', 'Last Name', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2597, 1, 'en', 'plugins/member/member', 'email_placeholder', 'Ex: example@gmail.com', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2598, 1, 'en', 'plugins/member/member', 'write_a_post', 'Write a post', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2599, 1, 'en', 'plugins/member/settings', 'title', 'Member', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2600, 1, 'en', 'plugins/member/settings', 'description', 'Settings for members', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2601, 1, 'en', 'plugins/member/settings', 'verify_account_email', 'Verify account\'s email?', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2602, 1, 'en', 'plugins/member/settings', 'verify_account_email_description', 'Need to config email in Admin -> Settings -> Email to send email verification.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2603, 1, 'en', 'plugins/request-log/request-log', 'name', 'Request Logs', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2604, 1, 'en', 'plugins/request-log/request-log', 'status_code', 'Status Code', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2605, 1, 'en', 'plugins/request-log/request-log', 'no_request_error', 'No request error now!', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2606, 1, 'en', 'plugins/request-log/request-log', 'widget_request_errors', 'Request Errors', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2607, 1, 'en', 'plugins/request-log/request-log', 'count', 'Count', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2608, 1, 'en', 'plugins/request-log/request-log', 'delete_all', 'Delete all records', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2609, 1, 'vi', 'plugins/request-log/request-log', 'name', 'Lịch sử lỗi', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2610, 1, 'vi', 'plugins/request-log/request-log', 'status_code', 'Mã lỗi', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2611, 1, 'vi', 'plugins/request-log/request-log', 'no_request_error', 'Hiện tại không có lỗi nào cả!', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2612, 1, 'vi', 'plugins/request-log/request-log', 'widget_request_errors', 'Liên kết bị hỏng', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2613, 1, 'vi', 'plugins/request-log/request-log', 'count', 'Số lần', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2614, 1, 'en', 'plugins/social-login/social-login', 'settings.title', 'Social Login settings', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2615, 1, 'en', 'plugins/social-login/social-login', 'settings.description', 'Configure social login options', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2616, 1, 'en', 'plugins/social-login/social-login', 'settings.facebook.title', 'Facebook login settings', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2617, 1, 'en', 'plugins/social-login/social-login', 'settings.facebook.description', 'Enable/disable & configure app credentials for Facebook login', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2618, 1, 'en', 'plugins/social-login/social-login', 'settings.facebook.app_id', 'App ID', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2619, 1, 'en', 'plugins/social-login/social-login', 'settings.facebook.app_secret', 'App Secret', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2620, 1, 'en', 'plugins/social-login/social-login', 'settings.facebook.helper', 'Please go to https://developers.facebook.com to create new app update App ID, App Secret. Callback URL is :callback', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2621, 1, 'en', 'plugins/social-login/social-login', 'settings.google.title', 'Google login settings', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2622, 1, 'en', 'plugins/social-login/social-login', 'settings.google.description', 'Enable/disable & configure app credentials for Google login', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2623, 1, 'en', 'plugins/social-login/social-login', 'settings.google.app_id', 'App ID', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2624, 1, 'en', 'plugins/social-login/social-login', 'settings.google.app_secret', 'App Secret', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2625, 1, 'en', 'plugins/social-login/social-login', 'settings.google.helper', 'Please go to https://console.developers.google.com/apis/dashboard to create new app update App ID, App Secret. Callback URL is :callback', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2626, 1, 'en', 'plugins/social-login/social-login', 'settings.github.title', 'Github login settings', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2627, 1, 'en', 'plugins/social-login/social-login', 'settings.github.description', 'Enable/disable & configure app credentials for Github login', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2628, 1, 'en', 'plugins/social-login/social-login', 'settings.github.app_id', 'App ID', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2629, 1, 'en', 'plugins/social-login/social-login', 'settings.github.app_secret', 'App Secret', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2630, 1, 'en', 'plugins/social-login/social-login', 'settings.github.helper', 'Please go to https://github.com/settings/developers to create new app update App ID, App Secret. Callback URL is :callback', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2631, 1, 'en', 'plugins/social-login/social-login', 'settings.linkedin.title', 'Linkedin login settings', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2632, 1, 'en', 'plugins/social-login/social-login', 'settings.linkedin.description', 'Enable/disable & configure app credentials for Linkedin login', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2633, 1, 'en', 'plugins/social-login/social-login', 'settings.linkedin.app_id', 'App ID', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2634, 1, 'en', 'plugins/social-login/social-login', 'settings.linkedin.app_secret', 'App Secret', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2635, 1, 'en', 'plugins/social-login/social-login', 'settings.linkedin.helper', 'Please go to https://www.linkedin.com/developers/apps/new to create new app update App ID, App Secret. Callback URL is :callback', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2636, 1, 'en', 'plugins/social-login/social-login', 'settings.enable', 'Enable?', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2637, 1, 'en', 'plugins/social-login/social-login', 'menu', 'Social Login', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2638, 1, 'vi', 'plugins/social-login/social-login', 'settings.title', 'Social Login settings', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2639, 1, 'vi', 'plugins/social-login/social-login', 'settings.description', 'Configure social login options', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2640, 1, 'vi', 'plugins/social-login/social-login', 'settings.facebook.title', 'Facebook login settings', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2641, 1, 'vi', 'plugins/social-login/social-login', 'settings.facebook.description', 'Enable/disable & configure app credentials for Facebook login', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2642, 1, 'vi', 'plugins/social-login/social-login', 'settings.facebook.app_id', 'App ID', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2643, 1, 'vi', 'plugins/social-login/social-login', 'settings.facebook.app_secret', 'App Secret', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2644, 1, 'vi', 'plugins/social-login/social-login', 'settings.facebook.helper', 'Please go to https://developers.facebook.com to create new app update App ID, App Secret. Callback URL is :callback', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2645, 1, 'vi', 'plugins/social-login/social-login', 'settings.google.title', 'Google login settings', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2646, 1, 'vi', 'plugins/social-login/social-login', 'settings.google.description', 'Enable/disable & configure app credentials for Google login', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2647, 1, 'vi', 'plugins/social-login/social-login', 'settings.google.app_id', 'App ID', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2648, 1, 'vi', 'plugins/social-login/social-login', 'settings.google.app_secret', 'App Secret', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2649, 1, 'vi', 'plugins/social-login/social-login', 'settings.google.helper', 'Please go to https://console.developers.google.com/apis/dashboard to create new app update App ID, App Secret. Callback URL is :callback', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2650, 1, 'vi', 'plugins/social-login/social-login', 'settings.github.title', 'Github login settings', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2651, 1, 'vi', 'plugins/social-login/social-login', 'settings.github.description', 'Enable/disable & configure app credentials for Github login', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2652, 1, 'vi', 'plugins/social-login/social-login', 'settings.github.app_id', 'App ID', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2653, 1, 'vi', 'plugins/social-login/social-login', 'settings.github.app_secret', 'App Secret', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2654, 1, 'vi', 'plugins/social-login/social-login', 'settings.github.helper', 'Please go to https://github.com/settings/developers to create new app update App ID, App Secret. Callback URL is :callback', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2655, 1, 'vi', 'plugins/social-login/social-login', 'settings.linkedin.title', 'Linkedin login settings', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2656, 1, 'vi', 'plugins/social-login/social-login', 'settings.linkedin.description', 'Enable/disable & configure app credentials for Linkedin login', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2657, 1, 'vi', 'plugins/social-login/social-login', 'settings.linkedin.app_id', 'App ID', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2658, 1, 'vi', 'plugins/social-login/social-login', 'settings.linkedin.app_secret', 'App Secret', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2659, 1, 'vi', 'plugins/social-login/social-login', 'settings.linkedin.helper', 'Please go to https://www.linkedin.com/developers/apps/new to create new app update App ID, App Secret. Callback URL is :callback', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2660, 1, 'vi', 'plugins/social-login/social-login', 'settings.enable', 'Enable?', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2661, 1, 'vi', 'plugins/social-login/social-login', 'menu', 'Social Login', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2662, 1, 'en', 'plugins/translation/translation', 'translations', 'Translations', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2663, 1, 'en', 'plugins/translation/translation', 'translations_description', 'Translate all words in system.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2664, 1, 'en', 'plugins/translation/translation', 'export_warning', 'Warning, translations are not visible until they are exported back to the resources/lang file, using \'php artisan cms:translations:export\' command or publish button.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2665, 1, 'en', 'plugins/translation/translation', 'import_done', 'Done importing, processed :counter items! Reload this page to refresh the groups!', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2666, 1, 'en', 'plugins/translation/translation', 'translation_manager', 'Translations Manager', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2667, 1, 'en', 'plugins/translation/translation', 'done_publishing', 'Done publishing the translations for group', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2668, 1, 'en', 'plugins/translation/translation', 'append_translation', 'Append new translations', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2669, 1, 'en', 'plugins/translation/translation', 'replace_translation', 'Replace existing translations', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2670, 1, 'en', 'plugins/translation/translation', 'import_group', 'Import group', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2671, 1, 'en', 'plugins/translation/translation', 'confirm_publish_group', 'Are you sure you want to publish the translations group \":group\"? This will overwrite existing language files.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2672, 1, 'en', 'plugins/translation/translation', 'publish_translations', 'Publish translations', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2673, 1, 'en', 'plugins/translation/translation', 'back', 'Back', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2674, 1, 'en', 'plugins/translation/translation', 'edit_title', 'Enter translation', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2675, 1, 'en', 'plugins/translation/translation', 'choose_group_msg', 'Choose a group to display the group translations. If no groups are visible, make sure you have imported the translations.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2676, 1, 'en', 'plugins/translation/translation', 'choose_a_group', 'Choose a group', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2677, 1, 'en', 'plugins/translation/translation', 'locales', 'Locales', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2678, 1, 'en', 'plugins/translation/translation', 'theme-translations', 'Theme translations', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2679, 1, 'en', 'plugins/translation/translation', 'admin-translations', 'Other translations', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2680, 1, 'en', 'plugins/translation/translation', 'translate_from', 'Translate from', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2681, 1, 'en', 'plugins/translation/translation', 'to', 'to', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2682, 1, 'en', 'plugins/translation/translation', 'no_other_languages', 'No other language to translate!', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2683, 1, 'en', 'plugins/translation/translation', 'edit', 'Edit', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2684, 1, 'en', 'plugins/translation/translation', 'locale', 'Locale', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2685, 1, 'en', 'plugins/translation/translation', 'locale_placeholder', 'Ex: en', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2686, 1, 'en', 'plugins/translation/translation', 'name', 'Name', '2021-07-10 19:24:20', '2021-07-10 19:24:20');
INSERT INTO `translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(2687, 1, 'en', 'plugins/translation/translation', 'default_locale', 'Default locale?', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2688, 1, 'en', 'plugins/translation/translation', 'actions', 'Actions', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2689, 1, 'en', 'plugins/translation/translation', 'choose_language', 'Choose language', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2690, 1, 'en', 'plugins/translation/translation', 'add_new_language', 'Add new language', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2691, 1, 'en', 'plugins/translation/translation', 'select_language', 'Select language', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2692, 1, 'en', 'plugins/translation/translation', 'flag', 'Flag', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2693, 1, 'en', 'plugins/translation/translation', 'folder_is_not_writeable', 'Cannot write files! Folder /resources/lang is not writable. Please chmod to make it writable!', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2694, 1, 'en', 'plugins/translation/translation', 'delete', 'Delete', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2695, 1, 'vi', 'plugins/translation/translation', 'append_translation', 'Tiếp nối bản dịch', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2696, 1, 'vi', 'plugins/translation/translation', 'back', 'Quay lại', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2697, 1, 'vi', 'plugins/translation/translation', 'choose_a_group', 'Chọn một nhóm', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2698, 1, 'vi', 'plugins/translation/translation', 'choose_group_msg', 'Chọn một nhóm để hiển thị nhóm dịch thuật. Nếu nhóm không có sẵn, hãy chắc chắn là bạn đã chạy migrations và nhập dữ liệu dịch thuật.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2699, 1, 'vi', 'plugins/translation/translation', 'confirm_publish_group', 'Bạn có chắc muốn xuất bản nhóm \":group\"? Điều này sẽ ghi đè tập tin ngôn ngữ hiện tại.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2700, 1, 'vi', 'plugins/translation/translation', 'done_publishing', 'Xuất bản nhóm dịch thuật thành công', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2701, 1, 'vi', 'plugins/translation/translation', 'edit_title', 'Nhập nội dung dịch', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2702, 1, 'vi', 'plugins/translation/translation', 'export_warning', 'Cảnh báo, bản dịch sẽ không có sẵn cho đến khi chúng được xuất bản lại vào thư mục /resources/lang, sử dụng lệnh \'php artisan cms:translations:export\' hoặc sử dụng nút xuất bản', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2703, 1, 'vi', 'plugins/translation/translation', 'import_done', 'Nhập hoàn thành, đã xử lý :counter bản ghi!  ', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2704, 1, 'vi', 'plugins/translation/translation', 'import_group', 'Nhập nhóm', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2705, 1, 'vi', 'plugins/translation/translation', 'publish_translations', 'Xuất bản dịch thuật', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2706, 1, 'vi', 'plugins/translation/translation', 'replace_translation', 'Thay thế bản dịch hiện tại', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2707, 1, 'vi', 'plugins/translation/translation', 'translation_manager', 'Quản lý dịch thuật', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2708, 1, 'vi', 'plugins/translation/translation', 'translations', 'Dịch thuật', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2709, 1, 'vi', 'plugins/translation/translation', 'translations_description', 'Dịch tất cả các từ trong hệ thống', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2710, 1, 'vi', 'plugins/translation/translation', 'actions', 'Hành động', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2711, 1, 'vi', 'plugins/translation/translation', 'add_new_language', 'Thêm ngôn ngữ mới', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2712, 1, 'vi', 'plugins/translation/translation', 'admin-translations', 'Dịch các mục khác', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2713, 1, 'vi', 'plugins/translation/translation', 'choose_language', 'Chọn ngôn ngữ', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2714, 1, 'vi', 'plugins/translation/translation', 'default_locale', 'Ngôn ngữ mặc định', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2715, 1, 'vi', 'plugins/translation/translation', 'delete', 'Xóa', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2716, 1, 'vi', 'plugins/translation/translation', 'edit', 'Sửa', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2717, 1, 'vi', 'plugins/translation/translation', 'flag', 'Cờ', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2718, 1, 'vi', 'plugins/translation/translation', 'locale', 'Ngôn ngữ', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2719, 1, 'vi', 'plugins/translation/translation', 'locales', 'Ngôn ngữ', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2720, 1, 'vi', 'plugins/translation/translation', 'name', 'Tên', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2721, 1, 'vi', 'plugins/translation/translation', 'no_other_languages', 'Không còn ngôn ngữ nào khác để dịch!', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2722, 1, 'vi', 'plugins/translation/translation', 'select_language', 'Lựa chọn ngôn ngữ', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2723, 1, 'vi', 'plugins/translation/translation', 'theme-translations', 'Dịch giao diện', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2724, 1, 'vi', 'plugins/translation/translation', 'to', 'sang', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2725, 1, 'vi', 'plugins/translation/translation', 'translate_from', 'Dịch từ', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2726, 1, 'vi', 'auth', 'failed', 'Không tìm thấy thông tin đăng nhập hợp lệ.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2727, 1, 'vi', 'auth', 'throttle', 'Đăng nhập không đúng quá nhiều lần. Vui lòng thử lại sau :seconds giây.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2728, 1, 'vi', 'auth', 'password', 'Mật khẩu không chính xác', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2729, 1, 'vi', 'pagination', 'previous', '&laquo; Trước', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2730, 1, 'vi', 'pagination', 'next', 'Sau &raquo;', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2731, 1, 'vi', 'passwords', 'reset', 'Mật khẩu đã được cập nhật!', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2732, 1, 'vi', 'passwords', 'sent', 'Chúng tôi đã gửi cho bạn đường dẫn thay đổi mật khẩu!', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2733, 1, 'vi', 'passwords', 'token', 'Mã xác nhận mật khẩu không hợp lệ.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2734, 1, 'vi', 'passwords', 'user', 'Không tìm thấy thành viên với địa chỉ email này.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2735, 1, 'vi', 'validation', 'accepted', 'Trường :attribute phải được chấp nhận.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2736, 1, 'vi', 'validation', 'active_url', 'Trường :attribute không phải là một URL hợp lệ.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2737, 1, 'vi', 'validation', 'after', 'Trường :attribute phải là một ngày sau ngày :date.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2738, 1, 'vi', 'validation', 'after_or_equal', 'Trường :attribute phải là thời gian bắt đầu sau hoặc đúng bằng :date.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2739, 1, 'vi', 'validation', 'alpha', 'Trường :attribute chỉ có thể chứa các chữ cái.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2740, 1, 'vi', 'validation', 'alpha_dash', 'Trường :attribute chỉ có thể chứa chữ cái, số và dấu gạch ngang.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2741, 1, 'vi', 'validation', 'alpha_num', 'Trường :attribute chỉ có thể chứa chữ cái và số.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2742, 1, 'vi', 'validation', 'array', 'Trường :attribute phải là dạng mảng.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2743, 1, 'vi', 'validation', 'before', 'Trường :attribute phải là một ngày trước ngày :date.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2744, 1, 'vi', 'validation', 'before_or_equal', 'Trường :attribute phải là thời gian bắt đầu trước hoặc đúng bằng :date.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2745, 1, 'vi', 'validation', 'between.array', 'Trường :attribute phải có từ :min - :max phần tử.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2746, 1, 'vi', 'validation', 'between.file', 'Dung lượng tập tin trong trường :attribute phải từ :min - :max kB.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2747, 1, 'vi', 'validation', 'between.numeric', 'Trường :attribute phải nằm trong khoảng :min - :max.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2748, 1, 'vi', 'validation', 'between.string', 'Trường :attribute phải từ :min - :max kí tự.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2749, 1, 'vi', 'validation', 'boolean', 'Trường :attribute phải là true hoặc false.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2750, 1, 'vi', 'validation', 'confirmed', 'Giá trị xác nhận trong trường :attribute không khớp.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2751, 1, 'vi', 'validation', 'date', 'Trường :attribute không phải là định dạng của ngày-tháng.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2752, 1, 'vi', 'validation', 'date_equals', 'Trường :attribute phải là một ngày bằng với :date.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2753, 1, 'vi', 'validation', 'date_format', 'Trường :attribute không giống với định dạng :format.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2754, 1, 'vi', 'validation', 'different', 'Trường :attribute và :other phải khác nhau.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2755, 1, 'vi', 'validation', 'digits', 'Độ dài của trường :attribute phải gồm :digits chữ số.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2756, 1, 'vi', 'validation', 'digits_between', 'Độ dài của trường :attribute phải nằm trong khoảng :min and :max chữ số.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2757, 1, 'vi', 'validation', 'dimensions', 'Trường :attribute có kích thước không hợp lệ.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2758, 1, 'vi', 'validation', 'distinct', 'Trường :attribute có giá trị trùng lặp.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2759, 1, 'vi', 'validation', 'email', 'Trường :attribute phải là một địa chỉ email hợp lệ.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2760, 1, 'vi', 'validation', 'ends_with', 'Trường :attribute phải kết thúc bằng một trong những giá trị sau: :values', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2761, 1, 'vi', 'validation', 'exists', 'Giá trị đã chọn trong trường :attribute không hợp lệ.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2762, 1, 'vi', 'validation', 'file', 'Trường :attribute phải là một tệp tin.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2763, 1, 'vi', 'validation', 'filled', 'Trường :attribute không được bỏ trống.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2764, 1, 'vi', 'validation', 'gt.array', 'Mảng :attribute phải có nhiều hơn :value phần tử.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2765, 1, 'vi', 'validation', 'gt.file', 'Dung lượng trường :attribute phải lớn hơn :value kilobytes.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2766, 1, 'vi', 'validation', 'gt.numeric', 'Giá trị trường :attribute phải lớn hơn :value.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2767, 1, 'vi', 'validation', 'gt.string', 'Độ dài trường :attribute phải nhiều hơn :value kí tự.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2768, 1, 'vi', 'validation', 'gte.array', 'Mảng :attribute phải có ít nhất :value phần tử.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2769, 1, 'vi', 'validation', 'gte.file', 'Dung lượng trường :attribute phải lớn hơn hoặc bằng :value kilobytes.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2770, 1, 'vi', 'validation', 'gte.numeric', 'Giá trị trường :attribute phải lớn hơn hoặc bằng :value.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2771, 1, 'vi', 'validation', 'gte.string', 'Độ dài trường :attribute phải lớn hơn hoặc bằng :value kí tự.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2772, 1, 'vi', 'validation', 'image', 'Trường :attribute phải là định dạng hình ảnh.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2773, 1, 'vi', 'validation', 'in', 'Giá trị đã chọn trong trường :attribute không hợp lệ.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2774, 1, 'vi', 'validation', 'in_array', 'Trường :attribute phải thuộc tập cho phép: :other.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2775, 1, 'vi', 'validation', 'integer', 'Trường :attribute phải là một số nguyên.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2776, 1, 'vi', 'validation', 'ip', 'Trường :attribute phải là một địa chỉ IP.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2777, 1, 'vi', 'validation', 'ipv4', 'Trường :attribute phải là một địa chỉ IPv4.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2778, 1, 'vi', 'validation', 'ipv6', 'Trường :attribute phải là một địa chỉ IPv6.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2779, 1, 'vi', 'validation', 'json', 'Trường :attribute phải là một chuỗi JSON.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2780, 1, 'vi', 'validation', 'lt.array', 'Mảng :attribute phải có ít hơn :value phần tử.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2781, 1, 'vi', 'validation', 'lt.file', 'Dung lượng trường :attribute phải nhỏ hơn :value kilobytes.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2782, 1, 'vi', 'validation', 'lt.numeric', 'Giá trị trường :attribute phải nhỏ hơn :value.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2783, 1, 'vi', 'validation', 'lt.string', 'Độ dài trường :attribute phải nhỏ hơn :value kí tự.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2784, 1, 'vi', 'validation', 'lte.array', 'Mảng :attribute không được có nhiều hơn :value phần tử.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2785, 1, 'vi', 'validation', 'lte.file', 'Dung lượng trường :attribute phải nhỏ hơn hoặc bằng :value kilobytes.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2786, 1, 'vi', 'validation', 'lte.numeric', 'Giá trị trường :attribute phải nhỏ hơn hoặc bằng :value.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2787, 1, 'vi', 'validation', 'lte.string', 'Độ dài trường :attribute phải nhỏ hơn hoặc bằng :value kí tự.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2788, 1, 'vi', 'validation', 'max.array', 'Trường :attribute không được lớn hơn :max phần tử.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2789, 1, 'vi', 'validation', 'max.file', 'Dung lượng tập tin trong trường :attribute không được lớn hơn :max kB.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2790, 1, 'vi', 'validation', 'max.numeric', 'Trường :attribute không được lớn hơn :max.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2791, 1, 'vi', 'validation', 'max.string', 'Trường :attribute không được lớn hơn :max kí tự.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2792, 1, 'vi', 'validation', 'mimes', 'Trường :attribute phải là một tập tin có định dạng: :values.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2793, 1, 'vi', 'validation', 'mimetypes', 'Trường :attribute phải là một tập tin có định dạng: :values.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2794, 1, 'vi', 'validation', 'min.array', 'Trường :attribute phải có tối thiểu :min phần tử.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2795, 1, 'vi', 'validation', 'min.file', 'Dung lượng tập tin trong trường :attribute phải tối thiểu :min kB.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2796, 1, 'vi', 'validation', 'min.numeric', 'Trường :attribute phải tối thiểu là :min.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2797, 1, 'vi', 'validation', 'min.string', 'Trường :attribute phải có tối thiểu :min kí tự.', '2021-07-10 19:24:20', '2021-07-10 19:24:20'),
(2798, 1, 'vi', 'validation', 'multiple_of', 'Trường :attribute phải là bội số của :value', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2799, 1, 'vi', 'validation', 'not_in', 'Giá trị đã chọn trong trường :attribute không hợp lệ.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2800, 1, 'vi', 'validation', 'not_regex', 'Trường :attribute có định dạng không hợp lệ.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2801, 1, 'vi', 'validation', 'numeric', 'Trường :attribute phải là một số.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2802, 1, 'vi', 'validation', 'password', 'Mật khẩu không đúng.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2803, 1, 'vi', 'validation', 'present', 'Trường :attribute phải được cung cấp.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2804, 1, 'vi', 'validation', 'prohibited', 'Trường :attribute bị cấm.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2805, 1, 'vi', 'validation', 'prohibited_if', 'Trường :attribute bị cấm khi :other là :value.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2806, 1, 'vi', 'validation', 'prohibited_unless', 'Trường :attribute bị cấm trừ khi :other là một trong :values.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2807, 1, 'vi', 'validation', 'regex', 'Trường :attribute có định dạng không hợp lệ.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2808, 1, 'vi', 'validation', 'required', 'Trường :attribute không được bỏ trống.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2809, 1, 'vi', 'validation', 'required_if', 'Trường :attribute không được bỏ trống khi trường :other là :value.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2810, 1, 'vi', 'validation', 'required_unless', 'Trường :attribute không được bỏ trống trừ khi :other là :values.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2811, 1, 'vi', 'validation', 'required_with', 'Trường :attribute không được bỏ trống khi một trong :values có giá trị.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2812, 1, 'vi', 'validation', 'required_with_all', 'Trường :attribute không được bỏ trống khi tất cả :values có giá trị.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2813, 1, 'vi', 'validation', 'required_without', 'Trường :attribute không được bỏ trống khi một trong :values không có giá trị.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2814, 1, 'vi', 'validation', 'required_without_all', 'Trường :attribute không được bỏ trống khi tất cả :values không có giá trị.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2815, 1, 'vi', 'validation', 'same', 'Trường :attribute và :other phải giống nhau.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2816, 1, 'vi', 'validation', 'size.array', 'Trường :attribute phải chứa :size phần tử.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2817, 1, 'vi', 'validation', 'size.file', 'Dung lượng tập tin trong trường :attribute phải bằng :size kB.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2818, 1, 'vi', 'validation', 'size.numeric', 'Trường :attribute phải bằng :size.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2819, 1, 'vi', 'validation', 'size.string', 'Trường :attribute phải chứa :size kí tự.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2820, 1, 'vi', 'validation', 'starts_with', 'Trường :attribute phải được bắt đầu bằng một trong những giá trị sau: :values', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2821, 1, 'vi', 'validation', 'string', 'Trường :attribute phải là một chuỗi kí tự.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2822, 1, 'vi', 'validation', 'timezone', 'Trường :attribute phải là một múi giờ hợp lệ.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2823, 1, 'vi', 'validation', 'unique', 'Trường :attribute đã có trong cơ sở dữ liệu.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2824, 1, 'vi', 'validation', 'uploaded', 'Trường :attribute tải lên thất bại.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2825, 1, 'vi', 'validation', 'url', 'Trường :attribute không giống với định dạng một URL.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2826, 1, 'vi', 'validation', 'uuid', 'Trường :attribute phải là một chuỗi UUID hợp lệ.', '2021-07-10 19:24:21', '2021-07-10 19:24:21'),
(2827, 1, 'vi', 'validation', 'custom.attribute-name.rule-name', 'custom-message', '2021-07-10 19:24:21', '2021-07-10 19:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_id` int(10) UNSIGNED DEFAULT NULL,
  `super_user` tinyint(1) NOT NULL DEFAULT 0,
  `manage_supers` tinyint(1) NOT NULL DEFAULT 0,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `first_name`, `last_name`, `username`, `avatar_id`, `super_user`, `manage_supers`, `permissions`, `last_login`) VALUES
(1, 'admin@botble.com', NULL, '$2y$10$3YhOlbfqdoGO4p2zqKy31.fsc1PvUHXTDVJRcygSrkMkXsJHxZA1S', 'hYmMrbBBIcA0Cm5HwoLjygxrV0xxHIs9jUc1as3F5AlO4Nl5QwR8uxGlnpeQ', '2021-04-06 23:41:03', '2021-11-14 01:21:28', 'System', 'Admin', 'botble', NULL, 1, 1, NULL, '2021-11-14 01:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE `user_meta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `widget_id` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sidebar_id` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `widget_id`, `sidebar_id`, `theme`, `position`, `data`, `created_at`, `updated_at`) VALUES
(1, 'RecentPostsWidget', 'footer_sidebar', 'ripple', 0, '{\"id\":\"RecentPostsWidget\",\"name\":\"Recent Posts\",\"number_display\":5}', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(2, 'RecentPostsWidget', 'top_sidebar', 'ripple', 0, '{\"id\":\"RecentPostsWidget\",\"name\":\"Recent Posts\",\"number_display\":5}', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(3, 'TagsWidget', 'primary_sidebar', 'ripple', 0, '{\"id\":\"TagsWidget\",\"name\":\"Tags\",\"number_display\":5}', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(4, 'CustomMenuWidget', 'primary_sidebar', 'ripple', 1, '{\"id\":\"CustomMenuWidget\",\"name\":\"Categories\",\"menu_id\":\"featured-categories\"}', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(5, 'CustomMenuWidget', 'primary_sidebar', 'ripple', 2, '{\"id\":\"CustomMenuWidget\",\"name\":\"Social\",\"menu_id\":\"social\"}', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(6, 'CustomMenuWidget', 'footer_sidebar', 'ripple', 1, '{\"id\":\"CustomMenuWidget\",\"name\":\"Favorite Websites\",\"menu_id\":\"favorite-websites\"}', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(7, 'CustomMenuWidget', 'footer_sidebar', 'ripple', 2, '{\"id\":\"CustomMenuWidget\",\"name\":\"My Links\",\"menu_id\":\"my-links\"}', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(8, 'RecentPostsWidget', 'footer_sidebar', 'ripple-vi', 0, '{\"id\":\"RecentPostsWidget\",\"name\":\"B\\u00e0i vi\\u1ebft g\\u1ea7n \\u0111\\u00e2y\",\"number_display\":5}', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(9, 'RecentPostsWidget', 'top_sidebar', 'ripple-vi', 0, '{\"id\":\"RecentPostsWidget\",\"name\":\"B\\u00e0i vi\\u1ebft g\\u1ea7n \\u0111\\u00e2y\",\"number_display\":5}', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(10, 'TagsWidget', 'primary_sidebar', 'ripple-vi', 0, '{\"id\":\"TagsWidget\",\"name\":\"Tags\",\"number_display\":5}', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(11, 'CustomMenuWidget', 'primary_sidebar', 'ripple-vi', 1, '{\"id\":\"CustomMenuWidget\",\"name\":\"Danh m\\u1ee5c n\\u1ed5i b\\u1eadt\",\"menu_id\":\"danh-muc-noi-bat\"}', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(12, 'CustomMenuWidget', 'primary_sidebar', 'ripple-vi', 2, '{\"id\":\"CustomMenuWidget\",\"name\":\"M\\u1ea1ng x\\u00e3 h\\u1ed9i\",\"menu_id\":\"social\"}', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(13, 'CustomMenuWidget', 'footer_sidebar', 'ripple-vi', 1, '{\"id\":\"CustomMenuWidget\",\"name\":\"Trang web y\\u00eau th\\u00edch\",\"menu_id\":\"trang-web-yeu-thich\"}', '2021-04-06 23:41:05', '2021-04-06 23:41:05'),
(14, 'CustomMenuWidget', 'footer_sidebar', 'ripple-vi', 2, '{\"id\":\"CustomMenuWidget\",\"name\":\"Li\\u00ean k\\u1ebft\",\"menu_id\":\"lien-ket\"}', '2021-04-06 23:41:05', '2021-04-06 23:41:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activations_user_id_index` (`user_id`);

--
-- Indexes for table `audit_histories`
--
ALTER TABLE `audit_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audit_histories_user_id_index` (`user_id`),
  ADD KEY `audit_histories_module_index` (`module`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_replies`
--
ALTER TABLE `contact_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard_widgets`
--
ALTER TABLE `dashboard_widgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard_widget_settings`
--
ALTER TABLE `dashboard_widget_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dashboard_widget_settings_user_id_index` (`user_id`),
  ADD KEY `dashboard_widget_settings_widget_id_index` (`widget_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `field_groups`
--
ALTER TABLE `field_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `field_items`
--
ALTER TABLE `field_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_user_id_index` (`user_id`);

--
-- Indexes for table `gallery_meta`
--
ALTER TABLE `gallery_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_meta_reference_id_index` (`reference_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `language_meta`
--
ALTER TABLE `language_meta`
  ADD PRIMARY KEY (`lang_meta_id`),
  ADD KEY `language_meta_reference_id_index` (`reference_id`);

--
-- Indexes for table `media_files`
--
ALTER TABLE `media_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_files_user_id_index` (`user_id`);

--
-- Indexes for table `media_folders`
--
ALTER TABLE `media_folders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_folders_user_id_index` (`user_id`);

--
-- Indexes for table `media_settings`
--
ALTER TABLE `media_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`);

--
-- Indexes for table `member_activity_logs`
--
ALTER TABLE `member_activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_activity_logs_member_id_index` (`member_id`);

--
-- Indexes for table `member_password_resets`
--
ALTER TABLE `member_password_resets`
  ADD KEY `member_password_resets_email_index` (`email`),
  ADD KEY `member_password_resets_token_index` (`token`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_slug_unique` (`slug`);

--
-- Indexes for table `menu_locations`
--
ALTER TABLE `menu_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_nodes`
--
ALTER TABLE `menu_nodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_nodes_menu_id_index` (`menu_id`),
  ADD KEY `menu_nodes_parent_id_index` (`parent_id`);

--
-- Indexes for table `meta_boxes`
--
ALTER TABLE `meta_boxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meta_boxes_reference_id_index` (`reference_id`);

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
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comment_ratings`
--
ALTER TABLE `post_comment_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_logs`
--
ALTER TABLE `request_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revisions`
--
ALTER TABLE `revisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revisions_revisionable_id_revisionable_type_index` (`revisionable_id`,`revisionable_type`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`),
  ADD KEY `roles_created_by_index` (`created_by`),
  ADD KEY `roles_updated_by_index` (`updated_by`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_users_user_id_index` (`user_id`),
  ADD KEY `role_users_role_id_index` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `slugs`
--
ALTER TABLE `slugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_meta_user_id_index` (`user_id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audit_histories`
--
ALTER TABLE `audit_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_replies`
--
ALTER TABLE `contact_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dashboard_widgets`
--
ALTER TABLE `dashboard_widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dashboard_widget_settings`
--
ALTER TABLE `dashboard_widget_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `field_groups`
--
ALTER TABLE `field_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `field_items`
--
ALTER TABLE `field_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gallery_meta`
--
ALTER TABLE `gallery_meta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `lang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `language_meta`
--
ALTER TABLE `language_meta`
  MODIFY `lang_meta_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `media_files`
--
ALTER TABLE `media_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `media_folders`
--
ALTER TABLE `media_folders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media_settings`
--
ALTER TABLE `media_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `member_activity_logs`
--
ALTER TABLE `member_activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu_locations`
--
ALTER TABLE `menu_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_nodes`
--
ALTER TABLE `menu_nodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `meta_boxes`
--
ALTER TABLE `meta_boxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `post_comment_ratings`
--
ALTER TABLE `post_comment_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `request_logs`
--
ALTER TABLE `request_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `revisions`
--
ALTER TABLE `revisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `slugs`
--
ALTER TABLE `slugs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2828;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
