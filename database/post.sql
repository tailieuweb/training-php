-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2021 at 10:57 PM
-- Server version: 10.4.19-MariaDB-log
-- PHP Version: 8.0.7

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
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_url`, `post_title`, `post_description`) VALUES
(1, 'https://vnexpress.net/chuyen-gia-nhat-ban-that-vong-vi-khong-thang-dam-viet-nam-4384632.html', 'Chuyên gia Nhật Bản thất vọng vì không thắng đậm Việt Nam', NULL),
(2, 'https://vnexpress.net/tay-ban-nha-rong-cua-gianh-ve-du-world-cup-2022-4384663.html', 'Tây Ban Nha rộng cửa giành vé dự World Cup 2022', NULL),
(3, 'https://vnexpress.net/quang-hai-var-da-tiep-them-dong-luc-cho-viet-nam-4384613.html', 'Quang Hải: ‘VAR đã tiếp thêm động lực cho Việt Nam’', NULL),
(4, 'https://vnexpress.net/duc-thang-9-0-tai-vong-loai-world-cup-4384649.html', 'Đức thắng 9-0 tại vòng loại World Cup', NULL),
(5, 'https://vnexpress.net/ronaldo-tit-ngoi-khi-bo-dao-nha-hoa-ireland-4384672.html', 'Ronaldo tịt ngòi khi Bồ Đào Nha hòa Ireland', NULL),
(6, 'https://vnexpress.net/cdv-sat-canh-cung-tuyen-viet-nam-4384633.html', 'CĐV sát cánh cùng tuyển Việt Nam', NULL),
(7, 'https://vnexpress.net/vi-sao-var-tu-choi-ban-thang-cua-nhat-ban-4384603.html', 'Vì sao VAR từ chối bàn thắng của Nhật Bản?', NULL),
(8, 'https://vnexpress.net/trung-quoc-vs-oman-4384433-tong-thuat.html', 'Trung Quốc vuột chiến thắng', NULL),
(9, 'https://vnexpress.net/gerrard-dan-dat-aston-villa-4382874.html', 'Gerrard dẫn dắt Aston Villa', NULL),
(10, 'https://vnexpress.net/viet-nam-vs-nhat-ban-4384379-tong-thuat.html', 'Việt Nam thua sát Nhật Bản', NULL),
(11, 'https://vnexpress.net/australia-vs-saudi-arabia-4384426-tong-thuat.html', 'Australia thoát thua Saudi Arabia', NULL),
(12, 'https://vnexpress.net/hai-vo-si-quyen-anh-tan-gau-trong-luc-so-gang-4384320.html', 'Hai võ sĩ quyền Anh tán gẫu trong lúc so găng', NULL),
(13, 'https://vnexpress.net/nhung-ky-luc-dang-cho-djokovic-pha-4384231.html', 'Những kỷ lục đang chờ Djokovic phá', NULL),
(14, 'https://vnexpress.net/doi-thu-mong-hop-tac-voi-pga-tour-4384422.html', 'Đối thủ mong hợp tác với PGA Tour', NULL),
(15, 'https://vnexpress.net/co-hoi-nao-cho-viet-nam-truoc-nhat-ban-4384260.html', 'Cơ hội nào cho Việt Nam trước Nhật Bản?', NULL),
(16, 'https://vnexpress.net/tuong-quan-truoc-tran-viet-nam-nhat-ban-4384279.html', 'Tương quan trước trận Việt Nam - Nhật Bản', NULL),
(17, 'https://vnexpress.net/dinh-trong-lat-co-chan-truoc-tran-nhat-ban-4384256.html', 'Đình Trọng lật cổ chân trước trận Nhật Bản', NULL),
(18, 'https://vnexpress.net/van-den-cua-hlv-nhat-ban-4384124.html', 'Vận đen của HLV Nhật Bản', NULL),
(19, 'https://vnexpress.net/conte-bat-dau-thiet-quan-luat-tai-tottenham-4384154.html', 'Conte bắt đầu thiết quân luật tại Tottenham', NULL),
(20, 'https://vnexpress.net/pogba-doi-luong-cao-hon-ronaldo-4384153.html', 'Pogba đòi lương cao hơn Ronaldo', NULL),
(21, 'https://vnexpress.net/nu-cau-thu-psg-thue-nguoi-hanh-hung-dong-doi-4384146.html', 'Nữ cầu thủ PSG thuê người hành hung đồng đội', NULL),
(22, 'https://vnexpress.net/xavi-chinh-don-pique-4384142.html', 'Xavi chỉnh đốn Pique', NULL),
(23, 'https://vnexpress.net/nguyen-tuan-anh-tro-lai-o-tran-nhat-ban-4384117.html', 'Nguyễn Tuấn Anh trở lại ở trận Nhật Bản', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
