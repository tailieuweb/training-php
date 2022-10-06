-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 06:00 AM
-- Server version: 10.4.19-MariaDB-log
-- PHP Version: 8.1.10

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
CREATE DATABASE IF NOT EXISTS `app_web1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `app_web1`;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'https://vnexpress.net/guardiola-khong-hieu-loi-choi-cua-man-utd-4384790.html', 'Guardiola không hiểu lối chơi của Man Utd', NULL),
(2, 'https://vnexpress.net/brazil-gianh-ve-world-cup-som-nam-vong-4384705.html', 'Brazil giành vé World Cup sớm năm vòng', NULL),
(3, 'https://vnexpress.net/gerrard-bi-tru-xuong-hang-cung-aston-villa-4384684.html', 'Gerrard bị trù xuống hạng cùng Aston Villa', NULL),
(4, 'https://vnexpress.net/chuyen-gia-nhat-ban-that-vong-vi-khong-thang-dam-viet-nam-4384632.html', 'Chuyên gia Nhật Bản thất vọng vì không thắng đậm Việt Nam', NULL),
(5, 'https://vnexpress.net/tay-ban-nha-rong-cua-gianh-ve-du-world-cup-2022-4384663.html', 'Tây Ban Nha rộng cửa giành vé dự World Cup 2022', NULL),
(6, 'https://vnexpress.net/quang-hai-var-da-tiep-them-dong-luc-cho-viet-nam-4384613.html', 'Quang Hải: ‘VAR đã tiếp thêm động lực cho Việt Nam’', NULL),
(7, 'https://vnexpress.net/duc-thang-9-0-tai-vong-loai-world-cup-4384649.html', 'Đức thắng 9-0 tại vòng loại World Cup', NULL),
(8, 'https://vnexpress.net/ronaldo-tit-ngoi-khi-bo-dao-nha-hoa-ireland-4384672.html', 'Ronaldo tịt ngòi khi Bồ Đào Nha hòa Ireland', NULL),
(9, 'https://vnexpress.net/cdv-sat-canh-cung-tuyen-viet-nam-4384633.html', 'CĐV sát cánh cùng tuyển Việt Nam', NULL),
(10, 'https://vnexpress.net/vi-sao-var-tu-choi-ban-thang-cua-nhat-ban-4384603.html', 'Vì sao VAR từ chối bàn thắng của Nhật Bản?', NULL),
(11, 'https://vnexpress.net/trung-quoc-vs-oman-4384433-tong-thuat.html', 'Trung Quốc vuột chiến thắng', NULL),
(12, 'https://vnexpress.net/gerrard-dan-dat-aston-villa-4382874.html', 'Gerrard dẫn dắt Aston Villa', NULL),
(13, 'https://vnexpress.net/viet-nam-vs-nhat-ban-4384379-tong-thuat.html', 'Việt Nam thua sát Nhật Bản', NULL),
(14, 'https://vnexpress.net/australia-vs-saudi-arabia-4384426-tong-thuat.html', 'Australia thoát thua Saudi Arabia', NULL),
(15, 'https://vnexpress.net/hai-vo-si-quyen-anh-tan-gau-trong-luc-so-gang-4384320.html', 'Hai võ sĩ quyền Anh tán gẫu trong lúc so găng', NULL),
(16, 'https://vnexpress.net/nhung-ky-luc-dang-cho-djokovic-pha-4384231.html', 'Những kỷ lục đang chờ Djokovic phá', NULL),
(17, 'https://vnexpress.net/doi-thu-mong-hop-tac-voi-pga-tour-4384422.html', 'Đối thủ mong hợp tác với PGA Tour', NULL),
(18, 'https://vnexpress.net/co-hoi-nao-cho-viet-nam-truoc-nhat-ban-4384260.html', 'Cơ hội nào cho Việt Nam trước Nhật Bản?', NULL),
(19, 'https://vnexpress.net/tuong-quan-truoc-tran-viet-nam-nhat-ban-4384279.html', 'Tương quan trước trận Việt Nam - Nhật Bản', NULL),
(20, 'https://vnexpress.net/dinh-trong-lat-co-chan-truoc-tran-nhat-ban-4384256.html', 'Đình Trọng lật cổ chân trước trận Nhật Bản', NULL),
(21, 'https://vnexpress.net/van-den-cua-hlv-nhat-ban-4384124.html', 'Vận đen của HLV Nhật Bản', NULL),
(22, 'https://vnexpress.net/conte-bat-dau-thiet-quan-luat-tai-tottenham-4384154.html', 'Conte bắt đầu thiết quân luật tại Tottenham', NULL),
(23, 'https://vnexpress.net/pogba-doi-luong-cao-hon-ronaldo-4384153.html', 'Pogba đòi lương cao hơn Ronaldo', NULL),
(24, 'https://vnexpress.net/nu-cau-thu-psg-thue-nguoi-hanh-hung-dong-doi-4384146.html', 'Nữ cầu thủ PSG thuê người hành hung đồng đội', NULL),
(25, 'https://vnexpress.net/xavi-chinh-don-pique-4384142.html', 'Xavi chỉnh đốn Pique', NULL),
(26, 'https://vnexpress.net/guardiola-khong-hieu-loi-choi-cua-man-utd-4384790.html', 'Guardiola không hiểu lối chơi của Man Utd', NULL),
(27, 'https://vnexpress.net/brazil-gianh-ve-world-cup-som-nam-vong-4384705.html', 'Brazil giành vé World Cup sớm năm vòng', NULL),
(28, 'https://vnexpress.net/gerrard-bi-tru-xuong-hang-cung-aston-villa-4384684.html', 'Gerrard bị trù xuống hạng cùng Aston Villa', NULL),
(29, 'https://vnexpress.net/chuyen-gia-nhat-ban-that-vong-vi-khong-thang-dam-viet-nam-4384632.html', 'Chuyên gia Nhật Bản thất vọng vì không thắng đậm Việt Nam', NULL),
(30, 'https://vnexpress.net/tay-ban-nha-rong-cua-gianh-ve-du-world-cup-2022-4384663.html', 'Tây Ban Nha rộng cửa giành vé dự World Cup 2022', NULL),
(31, 'https://vnexpress.net/quang-hai-var-da-tiep-them-dong-luc-cho-viet-nam-4384613.html', 'Quang Hải: ‘VAR đã tiếp thêm động lực cho Việt Nam’', NULL),
(32, 'https://vnexpress.net/duc-thang-9-0-tai-vong-loai-world-cup-4384649.html', 'Đức thắng 9-0 tại vòng loại World Cup', NULL),
(33, 'https://vnexpress.net/ronaldo-tit-ngoi-khi-bo-dao-nha-hoa-ireland-4384672.html', 'Ronaldo tịt ngòi khi Bồ Đào Nha hòa Ireland', NULL),
(34, 'https://vnexpress.net/cdv-sat-canh-cung-tuyen-viet-nam-4384633.html', 'CĐV sát cánh cùng tuyển Việt Nam', NULL),
(35, 'https://vnexpress.net/vi-sao-var-tu-choi-ban-thang-cua-nhat-ban-4384603.html', 'Vì sao VAR từ chối bàn thắng của Nhật Bản?', NULL),
(36, 'https://vnexpress.net/trung-quoc-vs-oman-4384433-tong-thuat.html', 'Trung Quốc vuột chiến thắng', NULL),
(37, 'https://vnexpress.net/gerrard-dan-dat-aston-villa-4382874.html', 'Gerrard dẫn dắt Aston Villa', NULL),
(38, 'https://vnexpress.net/viet-nam-vs-nhat-ban-4384379-tong-thuat.html', 'Việt Nam thua sát Nhật Bản', NULL),
(39, 'https://vnexpress.net/australia-vs-saudi-arabia-4384426-tong-thuat.html', 'Australia thoát thua Saudi Arabia', NULL),
(40, 'https://vnexpress.net/hai-vo-si-quyen-anh-tan-gau-trong-luc-so-gang-4384320.html', 'Hai võ sĩ quyền Anh tán gẫu trong lúc so găng', NULL),
(41, 'https://vnexpress.net/nhung-ky-luc-dang-cho-djokovic-pha-4384231.html', 'Những kỷ lục đang chờ Djokovic phá', NULL),
(42, 'https://vnexpress.net/doi-thu-mong-hop-tac-voi-pga-tour-4384422.html', 'Đối thủ mong hợp tác với PGA Tour', NULL),
(43, 'https://vnexpress.net/co-hoi-nao-cho-viet-nam-truoc-nhat-ban-4384260.html', 'Cơ hội nào cho Việt Nam trước Nhật Bản?', NULL),
(44, 'https://vnexpress.net/tuong-quan-truoc-tran-viet-nam-nhat-ban-4384279.html', 'Tương quan trước trận Việt Nam - Nhật Bản', NULL),
(45, 'https://vnexpress.net/dinh-trong-lat-co-chan-truoc-tran-nhat-ban-4384256.html', 'Đình Trọng lật cổ chân trước trận Nhật Bản', NULL),
(46, 'https://vnexpress.net/van-den-cua-hlv-nhat-ban-4384124.html', 'Vận đen của HLV Nhật Bản', NULL),
(47, 'https://vnexpress.net/conte-bat-dau-thiet-quan-luat-tai-tottenham-4384154.html', 'Conte bắt đầu thiết quân luật tại Tottenham', NULL),
(48, 'https://vnexpress.net/pogba-doi-luong-cao-hon-ronaldo-4384153.html', 'Pogba đòi lương cao hơn Ronaldo', NULL),
(49, 'https://vnexpress.net/nu-cau-thu-psg-thue-nguoi-hanh-hung-dong-doi-4384146.html', 'Nữ cầu thủ PSG thuê người hành hung đồng đội', NULL),
(50, 'https://vnexpress.net/xavi-chinh-don-pique-4384142.html', 'Xavi chỉnh đốn Pique', NULL),
(51, 'https://vnexpress.net/nguyen-tuan-anh-tro-lai-o-tran-nhat-ban-4384117.html', 'Nguyễn Tuấn Anh trở lại ở trận Nhật Bản', NULL),
(52, 'https://vnexpress.net/ra-mat-logo-nhom-tren-ao-chay-vm-amazing-ha-long-4383381.html', 'Ra mắt logo nhóm trên áo chạy VM Amazing Hạ Long', NULL),
(53, 'https://vnexpress.net/gerrard-nhan-loi-dan-dat-aston-villa-4384193.html', 'Gerrard nhận lời dẫn dắt Aston Villa', NULL),
(54, 'https://vnexpress.net/golfer-hoan-nghenh-european-tour-doi-thuong-hieu-4384110.html', 'Golfer hoan nghênh European Tour đổi thương hiệu', NULL),
(55, 'https://vnexpress.net/tuyen-thu-nhat-ban-duoc-cham-chut-ti-mi-4384094.html', 'Tuyển thủ Nhật Bản được chăm chút tỉ mỉ', NULL),
(56, 'https://vnexpress.net/cau-thu-nhat-ban-lam-quen-san-my-dinh-4384086.html', 'Cầu thủ Nhật Bản làm quen sân Mỹ Đình', NULL),
(57, 'https://vnexpress.net/nhat-ban-e-ngai-cdv-viet-nam-4384041.html', 'Nhật Bản e ngại CĐV Việt Nam', NULL),
(58, 'https://vnexpress.net/hlv-park-gia-han-hop-dong-4384039.html', 'HLV Park gia hạn hợp đồng', NULL),
(59, 'https://vnexpress.net/kodogakusha-vo-duong-huyen-thoai-cua-judo-nhat-ban-4383649.html', 'Kodogakusha - võ đường huyền thoại của judo Nhật Bản', NULL),
(60, 'https://vnexpress.net/ronaldo-co-the-ra-di-neu-man-utd-khong-du-champions-league-4383753.html', 'Ronaldo có thể ra đi nếu Man Utd không dự Champions League', NULL),
(61, 'https://vnexpress.net/nang-luc-hoi-phuc-than-ky-cua-djokovic-4383770.html', 'Năng lực hồi phục thần kỳ của Djokovic', NULL),
(62, 'https://vnexpress.net/european-tour-doi-ten-4383942.html', 'European Tour đổi tên', NULL),
(63, 'https://vnexpress.net/mike-tyson-muon-huan-luyen-joshua-dau-usyk-4383742.html', 'Mike Tyson muốn huấn luyện Joshua đấu Usyk', NULL),
(64, 'https://vnexpress.net/man-utd-bat-ngo-khi-solskjaer-cho-nghi-mot-tuan-4383645.html', 'Man Utd bất ngờ khi Solskjaer cho nghỉ một tuần', NULL),
(65, 'https://vnexpress.net/france-football-bac-tin-messi-doat-qua-bong-vang-4383640.html', 'France Football bác tin Messi đoạt Quả Bóng Vàng', NULL),
(66, 'https://vnexpress.net/man-utd-tung-phot-lo-loi-khuyen-mua-cancelo-4383173.html', 'Man Utd từng phớt lờ lời khuyên mua Cancelo', NULL),
(67, 'https://vnexpress.net/cac-cau-thu-hang-dau-nhat-ban-den-ha-noi-4383617.html', 'Các cầu thủ hàng đầu Nhật Bản đến Hà Nội', NULL),
(68, 'https://vnexpress.net/giai-chay-vm-amazing-ha-long-cong-bo-cung-duong-4383743.html', 'Giải chạy VM Amazing Hạ Long công bố cung đường', NULL),
(69, 'https://vnexpress.net/pogba-nghi-toi-het-nam-2021-4383647.html', 'Pogba nghỉ tới hết năm 2021', NULL),
(70, 'https://vnexpress.net/cau-thu-viet-nam-ho-hoi-truoc-tran-nhat-ban-4383592.html', 'Cầu thủ Việt Nam hồ hởi trước trận Nhật Bản', NULL),
(71, 'https://vnexpress.net/nhat-ban-khong-du-cau-thu-tap-luyen-4383579.html', 'Nhật Bản không đủ cầu thủ tập luyện', NULL),
(72, 'https://vnexpress.net/hlv-park-soi-ky-mat-san-my-dinh-4383577.html', 'HLV Park soi kỹ mặt sân Mỹ Đình', NULL),
(73, 'https://vnexpress.net/thu-mon-nhat-ban-du-doan-viet-nam-se-tan-cong-nhieu-4383538.html', 'Thủ môn Nhật Bản dự đoán Việt Nam sẽ tấn công nhiều', NULL),
(74, 'https://vnexpress.net/federer-no-luc-du-australia-mo-rong-4383265.html', 'Federer nỗ lực dự Australia Mở rộng', NULL),
(75, 'https://vnexpress.net/nhat-ban-bat-loi-truoc-tran-viet-nam-4383247.html', 'Nhật Bản bất lợi trước trận Việt Nam', NULL),
(76, 'https://vnexpress.net/chien-thuat-co-dien-giup-djokovic-phuc-thu-medvedev-4383253.html', 'Chiến thuật cổ điển giúp Djokovic phục thù Medvedev', NULL),
(77, 'https://vnexpress.net/tien-dao-nhat-ban-muon-mo-ty-so-som-o-tran-viet-nam-4383129.html', 'Tiền đạo Nhật Bản muốn mở tỷ số sớm ở trận Việt Nam', NULL),
(78, 'https://vnexpress.net/xavi-uoc-messi-con-o-barca-4383152.html', 'Xavi ước Messi còn ở Barca', NULL),
(79, 'https://vnexpress.net/golfer-muon-gay-lap-ky-luc-o-su-kien-pga-tour-4375674.html', 'Golfer mượn gậy lập kỷ lục ở sự kiện PGA Tour', NULL),
(80, 'https://vnexpress.net/phong-vip-san-my-dinh-van-dot-4383378.html', 'Phòng VIP sân Mỹ Đình vẫn dột', NULL),
(81, 'https://vnexpress.net/solskjaer-ve-que-4383236.html', 'Solskjaer về quê', NULL),
(82, 'https://vnexpress.net/brunei-bo-aff-cup-2020-4383167.html', 'Brunei bỏ AFF Cup 2020', NULL),
(83, 'https://vnexpress.net/xavi-ra-mat-barca-4383150.html', 'Xavi ra mắt Barca', NULL),
(84, 'https://vnexpress.net/newcastle-bo-nhiem-hlv-eddie-howe-4383134.html', 'Newcastle bổ nhiệm HLV Eddie Howe', NULL),
(85, 'https://vnexpress.net/dinh-trong-viet-nam-se-da-song-phang-voi-nhat-ban-4383067.html', 'Đình Trọng: ‘Việt Nam sẽ đá sòng phẳng với Nhật Bản’', NULL),
(86, 'https://vnexpress.net/hlv-park-bo-sung-thu-mon-truoc-tran-nhat-ban-4383094.html', 'HLV Park bổ sung thủ môn trước trận Nhật Bản', NULL),
(87, 'https://vnexpress.net/man-city-va-cuoc-dao-choi-duoi-mua-o-old-trafford-4383000.html', 'Man City và cuộc dạo chơi dưới mưa ở Old Trafford', NULL),
(88, 'https://vnexpress.net/klopp-len-an-var-va-trong-tai-4382651.html', 'Klopp lên án VAR và trọng tài', NULL),
(89, 'https://vnexpress.net/vi-sao-hlv-ranieri-noi-cau-voi-arteta-4382737.html', 'Vì sao HLV Ranieri nổi cáu với Arteta?', NULL),
(90, 'https://vnexpress.net/mourinho-lai-trach-moc-cau-thu-roma-4382918.html', 'Mourinho lại trách móc cầu thủ Roma', NULL),
(91, 'https://vnexpress.net/medvedev-djokovic-o-khap-noi-tren-wikipedia-4382778.html', 'Medvedev: ‘Djokovic ở khắp nơi trên Wikipedia’', NULL),
(92, 'https://vnexpress.net/djokovic-lap-ky-luc-37-masters-1000-4382719.html', 'Djokovic lập kỷ lục 37 Masters 1000', NULL),
(93, 'https://vnexpress.net/verstappen-tien-gan-ngoi-vo-dich-the-gioi-f1-4382759.html', 'Verstappen tiến gần ngôi vô địch thế giới F1', NULL),
(94, 'https://vnexpress.net/than-dong-firouzja-gianh-suat-du-candidates-4382637.html', 'Thần đồng Firouzja giành suất dự Candidates', NULL),
(95, 'https://vnexpress.net/roma-thua-doi-moi-len-hang-serie-a-4381110.html', 'Roma thua đội mới lên hạng Serie A', NULL),
(96, 'https://vnexpress.net/inter-va-milan-cua-diem-4382644.html', 'Inter và Milan cưa điểm', NULL),
(97, 'https://vnexpress.net/liverpool-thua-tran-dau-tien-o-ngoai-hang-anh-4382634.html', 'Liverpool thua trận đầu tiên ở Ngoại hạng Anh', NULL),
(98, 'https://vnexpress.net/doi-tuyen-nhat-ban-toi-ha-noi-4382586.html', 'Đội tuyển Nhật Bản tới Hà Nội', NULL),
(99, 'https://vnexpress.net/vnexpress-marathon-dong-loat-uu-dai-15-4382746.html', 'VnExpress Marathon đồng loạt ưu đãi 15%', NULL),
(100, 'https://vnexpress.net/arsenal-vuot-mat-man-utd-4382613.html', 'Arsenal vượt mặt Man Utd', NULL),
(101, 'https://vnexpress.net/conte-thoat-thua-trong-ngay-ve-ngoai-hang-anh-4382600.html', 'Conte thoát thua trong ngày về Ngoại hạng Anh', NULL),
(102, 'https://vnexpress.net/neville-khong-ai-ngo-man-utd-lun-sau-den-the-4382550.html', 'Neville: ‘Không ai ngờ Man Utd lún sâu đến thế’', NULL),
(103, 'https://vnexpress.net/nhung-dieu-cam-ky-tai-new-york-city-marathon-4381355.html', 'Những điều cấm kỵ tại New York City Marathon', NULL),
(104, 'https://vnexpress.net/nha-vo-dich-pga-tour-len-tay-voi-gay-muon-4382513.html', 'Nhà vô địch PGA Tour lên tay với gậy mượn', NULL),
(105, 'https://vnexpress.net/roy-keane-dau-hang-cau-thu-man-utd-4382510.html', 'Roy Keane ‘đầu hàng’ cầu thủ Man Utd', NULL),
(106, 'https://vnexpress.net/solskjaer-kien-quyet-o-lai-man-utd-4382504.html', 'Solskjaer kiên quyết ở lại Man Utd', NULL),
(107, 'https://vnexpress.net/tiger-woods-van-giau-nhat-golf-4382486.html', 'Tiger Woods vẫn giàu nhất golf', NULL),
(108, 'https://vnexpress.net/vi-sao-guardiola-khong-thay-nguoi-truoc-man-utd-4382406.html', 'Vì sao Guardiola không thay người trước Man Utd?', NULL),
(109, 'https://vnexpress.net/dortmund-lai-say-chan-4382428.html', 'Dortmund lại sảy chân', NULL),
(110, 'https://vnexpress.net/bayern-thang-tran-thu-chin-o-bundesliga-4382396.html', 'Bayern thắng trận thứ chín ở Bundesliga', NULL),
(111, 'https://vnexpress.net/djokovic-lap-ky-luc-bay-lan-giu-so-mot-atp-vao-cuoi-mua-4382395.html', 'Djokovic lập kỷ lục bảy lần giữ số một ATP vào cuối mùa', NULL),
(112, 'https://vnexpress.net/vga-chuan-hoa-dao-tao-hlv-golf-4382484.html', 'VGA chuẩn hoá đào tạo HLV golf', NULL),
(113, 'https://vnexpress.net/barca-roi-chien-thang-du-dan-ba-ban-4382397.html', 'Barca rơi chiến thắng dù dẫn ba bàn', NULL),
(114, 'https://vnexpress.net/psg-bay-cao-nho-neymar-mbappe-4382407.html', 'PSG bay cao nhờ Neymar, Mbappe', NULL),
(115, 'https://vnexpress.net/juventus-thang-o-phut-bu-4382401.html', 'Juventus thắng ở phút bù', NULL),
(116, 'https://vnexpress.net/man-utd-chim-sau-duoi-day-thong-ke-4382371.html', 'Man Utd chìm sâu dưới đáy thống kê', NULL),
(117, 'https://vnexpress.net/chelsea-roi-diem-truoc-doi-cam-den-do-4382391.html', 'Chelsea rơi điểm trước đội cầm đèn đỏ', NULL),
(118, 'https://vnexpress.net/man-utd-vs-man-city-4382321-tong-thuat.html', 'Man Utd dâng chiến thắng cho Man City', NULL),
(119, 'https://vnexpress.net/mourinho-cau-gat-voi-phong-vien-4382181.html', 'Mourinho cáu gắt với phóng viên', NULL),
(120, 'https://vnexpress.net/xavi-phai-tra-nua-phi-den-bu-thay-barca-4382238.html', 'Xavi phải trả nửa phí đền bù thay Barca', NULL),
(121, 'https://vnexpress.net/djokovic-vao-ban-ket-paris-masters-4382177.html', 'Djokovic vào bán kết Paris Masters', NULL),
(122, 'https://vnexpress.net/tieng-phap-lep-ve-trong-phong-thay-do-psg-4381007.html', 'Tiếng Pháp lép vế trong phòng thay đồ PSG', NULL),
(123, 'https://vnexpress.net/hai-huy-den-1-ty-dong-cho-clb-tp-hcm-4382102.html', 'Hải Huy đền 1 tỷ đồng cho CLB TP HCM', NULL),
(124, 'https://vnexpress.net/man-city-va-mot-thap-ky-on-ao-truoc-man-utd-4382263.html', 'Man City và một thập kỷ ồn ào trước Man Utd', NULL),
(125, 'https://vnexpress.net/ronaldo-lep-ve-khi-gap-nhung-doi-bong-cua-guardiola-4382261.html', 'Ronaldo lép vế khi gặp những đội bóng của Guardiola', NULL),
(126, 'https://vnexpress.net/solskjaer-tin-man-utd-van-tren-tam-man-city-4382210.html', 'Solskjaer tin Man Utd vẫn trên tầm Man City', NULL),
(127, 'https://vnexpress.net/tuchel-toi-luon-chuan-bi-tam-ly-bi-sa-thai-4382207.html', 'Tuchel: ‘Tôi luôn chuẩn bị tâm lý bị sa thải’', NULL),
(128, 'https://vnexpress.net/derby-manchester-bai-kiem-tra-quyet-dinh-cua-solskjaer-4382112.html', 'Derby Manchester - bài kiểm tra quyết định của Solskjaer', NULL),
(129, 'https://vnexpress.net/ferguson-chi-mat-20-giay-de-dua-ronaldo-ve-man-utd-4382119.html', 'Ferguson chỉ mất 20 giây để đưa Ronaldo về Man Utd', NULL),
(130, 'https://vnexpress.net/messi-nghi-them-tran-gap-bordeaux-4382065.html', 'Messi nghỉ thêm trận gặp Bordeaux', NULL),
(131, 'https://vnexpress.net/wanda-nara-bi-don-da-chia-tay-icardi-4382116.html', 'Wanda Nara bị đồn đã chia tay Icardi', NULL),
(132, 'https://vnexpress.net/xavi-tro-thanh-hlv-barca-4382028.html', 'Xavi trở thành HLV Barca', NULL),
(133, 'https://vnexpress.net/ajax-va-bong-da-tong-luc-kieu-erik-ten-hag-4381808.html', 'Ajax và bóng đá tổng lực kiểu Erik ten Hag', NULL),
(134, 'https://vnexpress.net/van-de-beek-duoc-khuyen-dat-ten-con-theo-hlv-solskjaer-4381776.html', 'Van de Beek được khuyên đặt tên con theo HLV Solskjaer', NULL),
(135, 'https://vnexpress.net/hlv-park-bo-y-dinh-goi-do-hung-dung-4381688.html', 'HLV Park bỏ ý định gọi Đỗ Hùng Dũng', NULL),
(136, 'https://vnexpress.net/ronaldo-italy-trong-tim-toi-4381676.html', 'Ronaldo: ‘Italy trong tim tôi’', NULL),
(137, 'https://vnexpress.net/than-dong-firouzja-len-so-bon-the-gioi-4381560.html', 'Thần đồng Firouzja lên số bốn thế giới', NULL),
(138, 'https://vnexpress.net/ronaldo-bi-phat-khi-di-an-trua-voi-dong-doi-4381726.html', 'Ronaldo bị phạt khi đi ăn trưa với đồng đội', NULL),
(139, 'https://vnexpress.net/roma-suyt-thua-bodo-glimt-lan-thu-hai-4381633.html', 'Roma suýt thua Bodo Glimt lần thứ hai', NULL),
(140, 'https://vnexpress.net/tran-ra-mat-hon-loan-cua-conte-o-tottenham-4381580.html', 'Trận ra mắt hỗn loạn của Conte ở Tottenham', NULL),
(141, 'https://vnexpress.net/sancho-lingard-khong-duoc-len-tuyen-anh-4381574.html', 'Sancho, Lingard không được lên tuyển Anh', NULL),
(142, 'https://vnexpress.net/dembele-lai-chan-thuong-4381573.html', 'Dembele lại chấn thương', NULL),
(143, 'https://vnexpress.net/xavi-va-moi-duyen-tien-dinh-voi-barca-4381414.html', 'Xavi và mối duyên tiền định với Barca', NULL),
(144, 'https://vnexpress.net/ha-duc-chinh-chia-tay-clb-da-nang-4381375.html', 'Hà Đức Chinh chia tay CLB Đà Nẵng', NULL),
(145, 'https://vnexpress.net/mourinho-nhan-sai-4381335.html', 'Mourinho nhận sai', NULL),
(146, 'https://vnexpress.net/nadal-tro-lai-thi-dau-vao-thang-12-2021-4381327.html', 'Nadal trở lại thi đấu vào tháng 12/2021', NULL),
(147, 'https://vnexpress.net/tsitsipas-lan-dau-bo-cuoc-trong-su-nghiep-4381326.html', 'Tsitsipas lần đầu bỏ cuộc trong sự nghiệp', NULL),
(148, 'https://vnexpress.net/golfer-co-the-kiem-1-trieu-usd-du-khong-thi-dau-o-lpga-tour-4381452.html', 'Golfer có thể kiếm 1 triệu USD dù không thi đấu ở LPGA Tour', NULL),
(149, 'https://vnexpress.net/conte-hua-giup-tottenham-choi-hap-dan-4381339.html', 'Conte hứa giúp Tottenham chơi hấp dẫn', NULL),
(150, 'https://vnexpress.net/ferdinand-che-man-utd-lon-xon-4381148.html', 'Ferdinand chê Man Utd lộn xộn', NULL),
(151, 'https://vnexpress.net/pga-tour-siet-hang-rao-phong-covid-19-4381445.html', 'PGA Tour siết hàng rào phòng Covid-19', NULL),
(152, 'https://vnexpress.net/dortmund-lai-thua-dam-ajax-4381114.html', 'Dortmund lại thua đậm Ajax', NULL),
(153, 'https://vnexpress.net/milan-kiem-diem-dau-tien-o-champions-league-4381107.html', 'Milan kiếm điểm đầu tiên ở Champions League', NULL),
(154, 'https://vnexpress.net/man-city-len-dinh-bang-champions-league-4381103.html', 'Man City lên đỉnh bảng Champions League', NULL),
(155, 'https://vnexpress.net/psg-roi-chien-thang-o-phut-chot-4381105.html', 'PSG rơi chiến thắng ở phút chót', NULL),
(156, 'https://vnexpress.net/liverpool-thang-de-atletico-4381101.html', 'Liverpool thắng dễ Atletico', NULL),
(157, 'https://vnexpress.net/benzema-giup-real-can-moc-1-000-ban-champions-league-4381100.html', 'Benzema giúp Real cán mốc 1.000 bàn Champions League', NULL),
(158, 'https://vnexpress.net/vi-sao-nadal-de-chan-thuong-4380705.html', 'Vì sao Nadal dễ chấn thương?', NULL),
(159, 'https://vnexpress.net/clb-ha-noi-chua-muon-do-hung-dung-len-tuyen-4380961.html', 'CLB Hà Nội chưa muốn Đỗ Hùng Dũng lên tuyển', NULL),
(160, 'https://vnexpress.net/u23-viet-nam-va-phien-ban-chua-hoan-thien-4380824.html', 'U23 Việt Nam và phiên bản chưa hoàn thiện', NULL),
(161, 'https://vnexpress.net/trung-ve-thanh-binh-tro-lai-doi-tuyen-4380875.html', 'Trung vệ Thanh Bình trở lại đội tuyển', NULL),
(162, 'https://vnexpress.net/ronaldo-vuot-solskjaer-ve-so-ban-ghi-cho-man-utd-4380698.html', 'Ronaldo vượt Solskjaer về số bàn ghi cho Man Utd', NULL),
(163, 'https://vnexpress.net/xuan-truong-len-day-cot-tinh-than-truoc-tran-nhat-ban-4381046.html', 'Xuân Trường lên dây cót tinh thần trước trận Nhật Bản', NULL),
(164, 'https://vnexpress.net/man-utd-khung-hoang-trung-ve-truoc-derby-manchester-4380928.html', 'Man Utd khủng hoảng trung vệ trước derby Manchester', NULL),
(165, 'https://vnexpress.net/messi-chan-thuong-kep-4380807.html', 'Messi chấn thương kép', NULL),
(166, 'https://vnexpress.net/hlv-solskjaer-so-sanh-ronaldo-voi-michael-jordan-4380651.html', 'HLV Solskjaer so sánh Ronaldo với Michael Jordan', NULL),
(167, 'https://vnexpress.net/djokovic-thang-nhoc-ngay-ra-quan-paris-masters-4380695.html', 'Djokovic thắng nhọc ngày ra quân Paris Masters', NULL),
(168, 'https://vnexpress.net/hlv-park-goi-do-hung-dung-4380719.html', 'HLV Park gọi Đỗ Hùng Dũng', NULL),
(169, 'https://vnexpress.net/chelsea-thang-nhe-malmo-4380644.html', 'Chelsea thắng nhẹ Malmo', NULL),
(170, 'https://vnexpress.net/ansu-fati-dua-barca-len-nhi-bang-4380641.html', 'Ansu Fati đưa Barca lên nhì bảng', NULL),
(171, 'https://vnexpress.net/lewandowski-lap-hat-trick-du-da-hong-penalty-4380640.html', 'Lewandowski lập hat-trick dù đá hỏng penalty', NULL),
(172, 'https://vnexpress.net/juventus-thang-tien-tai-champions-league-4380632.html', 'Juventus thẳng tiến tại Champions League', NULL),
(173, 'https://vnexpress.net/ronaldo-lai-cuu-man-utd-4380623.html', 'Ronaldo lại cứu Man Utd', NULL),
(174, 'https://vnexpress.net/conte-dan-dat-tottenham-4380602.html', 'Conte dẫn dắt Tottenham', NULL),
(175, 'https://vnexpress.net/nguyen-hai-long-chung-toi-da-voi-tinh-than-viet-nam-4380580.html', 'Nguyễn Hai Long: ‘Chúng tôi đá với tinh thần Việt Nam’', NULL),
(176, 'https://vnexpress.net/viet-nam-chung-nhom-nhat-ban-o-u23-chau-a-4380570.html', 'Việt Nam chung nhóm Nhật Bản ở U23 châu Á', NULL),
(177, 'https://vnexpress.net/hlv-park-ngai-danh-gia-tran-thang-cua-u23-viet-nam-4380572.html', 'HLV Park ngại đánh giá trận thắng của U23 Việt Nam', NULL),
(178, 'https://vnexpress.net/hang-thu-chelsea-phien-ban-nang-cap-thoi-mourinho-4379915.html', 'Hàng thủ Chelsea - phiên bản nâng cấp thời Mourinho?', NULL),
(179, 'https://vnexpress.net/san-golf-phong-cach-beatles-4380458.html', 'Sân golf phong cách Beatles', NULL),
(180, 'https://vnexpress.net/nuno-santo-nan-nhan-cua-su-roi-tri-4380416.html', 'Nuno Santo - nạn nhân của sự rối trí', NULL),
(181, 'https://vnexpress.net/u23-viet-nam-vs-u23-myanmar-4380376-tong-thuat.html', 'Việt Nam lần thứ tư liên tiếp vào VCK U23 châu Á', NULL),
(182, 'https://vnexpress.net/tyson-fury-huan-luyen-em-trai-thuong-dai-gap-youtuber-my-4380404.html', 'Tyson Fury huấn luyện em trai thượng đài gặp Youtuber Mỹ', NULL),
(183, 'https://vnexpress.net/augero-nghi-ba-thang-de-kiem-tra-tim-4380504.html', 'Augero nghỉ ba tháng để kiểm tra tim', NULL),
(184, 'https://vnexpress.net/cdv-dap-phong-var-vi-thua-tran-4380452.html', 'CĐV đập phòng VAR vì thua trận', NULL),
(185, 'https://vnexpress.net/murray-lo-bay-match-point-khi-thua-paris-masters-4380444.html', 'Murray lỡ bảy match-point khi thua Paris Masters', NULL),
(186, 'https://vnexpress.net/anh-vien-khong-di-tap-huan-cung-tuyen-boi-viet-nam-4380162.html', 'Ánh Viên không đi tập huấn cùng tuyển bơi Việt Nam', NULL),
(187, 'https://vnexpress.net/hlv-atalanta-tin-man-utd-hoi-sinh-nho-ronaldo-4380107.html', 'HLV Atalanta tin Man Utd hồi sinh nhờ Ronaldo', NULL),
(188, 'https://vnexpress.net/solskjaer-up-mo-kha-nang-lai-da-ba-trung-ve-4380102.html', 'Solskjaer úp mở khả năng lại đá ba trung vệ', NULL),
(189, 'https://vnexpress.net/u23-viet-nam-myanmar-khong-chi-tam-ve-4380167.html', 'U23 Việt Nam - Myanmar: Không chỉ tấm vé', NULL),
(190, 'https://vnexpress.net/vdv-18-tuoi-bat-tinh-khi-roi-tu-lung-ngua-4380113.html', 'VĐV 18 tuổi bất tỉnh khi rơi từ lưng ngựa', NULL),
(191, 'https://vnexpress.net/icardi-xoa-tai-khoan-instagram-4380104.html', 'Icardi xóa tài khoản Instagram', NULL),
(192, 'https://vnexpress.net/giai-chay-vm-amazing-ha-long-nhan-dang-ky-den-24-11-4380242.html', 'Giải chạy VM Amazing Hạ Long nhận đăng ký đến 24/11', NULL),
(193, 'https://vnexpress.net/tottenham-sap-ky-hop-dong-voi-conte-4380043.html', 'Tottenham sắp ký hợp đồng với Conte', NULL),
(194, 'https://vnexpress.net/vi-sao-ronaldo-xoay-180-do-khi-mung-ban-thang-4379691.html', 'Vì sao Ronaldo xoay 180 độ khi mừng bàn thắng?', NULL),
(195, 'https://vnexpress.net/cau-thu-van-hau-dinh-trong-thanh-tan-sinh-vien-kinh-te-4379959.html', 'Cầu thủ Văn Hậu, Đình Trọng thành tân sinh viên Kinh tế', NULL),
(196, 'https://vnexpress.net/tottenham-sa-thai-hlv-nuno-santo-4379994.html', 'Tottenham sa thải HLV Nuno Santo', NULL),
(197, 'https://vnexpress.net/djokovic-thua-my-mo-rong-giup-toi-manh-hon-4379979.html', 'Djokovic: ‘Thua Mỹ Mở rộng giúp tôi mạnh hơn’', NULL),
(198, 'https://vnexpress.net/nhung-don-thi-giup-minh-thien-vo-dich-u18-chau-a-4379861.html', 'Những đòn thí giúp Minh Thiên vô địch U18 châu Á', NULL),
(199, 'https://vnexpress.net/messi-muon-tro-lai-barca-sau-khi-giai-nghe-4379829.html', 'Messi muốn trở lại Barca sau khi giải nghệ', NULL),
(200, 'https://vnexpress.net/solskjaer-da-tim-ra-long-mach-cua-man-utd-4379708.html', 'Solskjaer đã tìm ra long mạch của Man Utd?', NULL),
(201, 'https://vnexpress.net/mourinho-mia-trong-tai-sau-khi-roma-thua-4379634.html', 'Mourinho mỉa trọng tài sau khi Roma thua', NULL),
(202, 'https://vnexpress.net/james-rodriguez-doi-danh-trong-tai-4379787.html', 'James Rodriguez đòi đánh trọng tài', NULL),
(203, 'https://vnexpress.net/psg-co-the-huy-hop-dong-voi-ramos-4379633.html', 'PSG có thể hủy hợp đồng với Ramos', NULL),
(204, 'https://vnexpress.net/west-ham-bang-diem-man-city-4379601.html', 'West Ham bằng điểm Man City', NULL),
(205, 'https://vnexpress.net/atletico-len-thu-tu-la-liga-4379599.html', 'Atletico lên thứ tư La Liga', NULL),
(206, 'https://vnexpress.net/ibrahimovic-gieo-sau-cho-mourinho-4379595.html', 'Ibrahimovic gieo sầu cho Mourinho', NULL),
(207, 'https://vnexpress.net/trong-tai-quat-vao-mat-cau-thu-udinese-4379550.html', 'Trọng tài quát vào mặt cầu thủ Udinese', NULL),
(208, 'https://vnexpress.net/ly-hoang-nam-vo-dich-o-ai-cap-4379661.html', 'Lý Hoàng Nam vô địch ở Ai Cập', NULL),
(209, 'https://vnexpress.net/viet-nam-chi-can-hoa-myanmar-de-vao-vck-u23-chau-a-4379558.html', 'Việt Nam chỉ cần hoà Myanmar để vào VCK U23 châu Á', NULL),
(210, 'https://vnexpress.net/viet-nam-thang-lon-o-giai-co-vua-tre-chau-a-4379544.html', 'Việt Nam thắng lớn ở giải cờ vua trẻ châu Á', NULL),
(211, 'https://vnexpress.net/vnexpress-marathon-va-v-race-thay-doi-so-tong-dai-4379724.html', 'VnExpress Marathon và V-Race thay đổi số tổng đài', NULL),
(212, 'https://vnexpress.net/lao-dua-thai-lan-vao-vck-u23-chau-a-4379499.html', 'Lào đưa Thái Lan vào VCK U23 châu Á', NULL),
(213, 'https://vnexpress.net/hlv-ancelotti-tiep-tuc-hat-hui-hazard-4379436.html', 'HLV Ancelotti tiếp tục hắt hủi Hazard', NULL),
(214, 'https://vnexpress.net/raducanu-tiep-tuc-that-bai-sau-my-mo-rong-4379359.html', 'Raducanu tiếp tục thất bại sau Mỹ Mở rộng', NULL),
(215, 'https://vnexpress.net/hlv-arteta-kinh-ngac-voi-pha-cuu-thua-cua-ramsdale-4379433.html', 'HLV Arteta kinh ngạc với pha cứu thua của Ramsdale', NULL),
(216, 'https://vnexpress.net/doi-thu-pga-tour-ra-don-bat-ngo-4379431.html', 'Đối thủ PGA Tour ra đòn bất ngờ', NULL),
(217, 'https://vnexpress.net/ronaldo-tai-lap-ky-luc-ghi-ban-va-kien-tao-o-ngoai-hang-anh-4379348.html', 'Ronaldo tái lập kỷ lục ghi bàn và kiến tạo ở Ngoại hạng Anh', NULL),
(218, 'https://vnexpress.net/roma-milan-diem-hen-cua-mourinho-va-ibrahimovic-4379458.html', 'Roma - Milan: Điểm hẹn của Mourinho và Ibrahimovic', NULL),
(219, 'https://vnexpress.net/ronaldo-thang-tottenham-tao-buoc-ngoat-cho-man-utd-4379352.html', 'Ronaldo: ‘Thắng Tottenham tạo bước ngoặt cho Man Utd’', NULL),
(220, 'https://vnexpress.net/aguero-nhap-vien-4379327.html', 'Aguero nhập viện', NULL),
(221, 'https://vnexpress.net/chelsea-gia-co-dinh-bang-ngoai-hang-anh-4379325.html', 'Chelsea gia cố đỉnh bảng Ngoại hạng Anh', NULL),
(222, 'https://vnexpress.net/barca-hoa-tran-dau-thoi-hau-koeman-4379328.html', 'Barca hòa trận đầu thời hậu Koeman', NULL),
(223, 'https://vnexpress.net/al-sadd-canh-bao-barca-4379141.html', 'Al-Sadd cảnh báo Barca', NULL),
(224, 'https://vnexpress.net/juventus-tut-xuong-gan-giua-bang-serie-a-4379324.html', 'Juventus tụt xuống gần giữa bảng Serie A', NULL),
(225, 'https://vnexpress.net/man-city-thua-tran-thu-hai-o-ngoai-hang-anh-4379314.html', 'Man City thua trận thứ hai ở Ngoại hạng Anh', NULL),
(226, 'https://vnexpress.net/viet-nam-va-myanmar-co-the-phai-da-luan-luu-o-u23-chau-a-4379315.html', 'Việt Nam và Myanmar có thể phải đá luân lưu ở U23 châu Á', NULL),
(227, 'https://vnexpress.net/liverpool-roi-diem-du-dan-hai-ban-4379305.html', 'Liverpool rơi điểm dù dẫn hai bàn', NULL),
(228, 'https://vnexpress.net/bayern-xa-gian-4379301.html', 'Bayern xả giận', NULL),
(229, 'https://vnexpress.net/tottenham-vs-man-utd-4379195-tong-thuat.html', 'Ronaldo giúp Man Utd đè bẹp Tottenham', NULL),
(230, 'https://vnexpress.net/cu-dup-cua-vinicius-dua-real-len-dinh-bang-4379285.html', 'Cú đúp của Vinicius đưa Real lên đỉnh bảng', NULL),
(231, 'https://vnexpress.net/arsenal-ap-sat-top-4-4379248-tong-thuat.html', 'Arsenal áp sát top 4', NULL),
(232, 'https://vnexpress.net/chu-tich-barca-thua-nhan-muon-bo-nhiem-xavi-4379065.html', 'Chủ tịch Barca thừa nhận muốn bổ nhiệm Xavi', NULL),
(233, 'https://vnexpress.net/guardiola-xavi-du-gioi-de-dan-dat-barca-4378966.html', 'Guardiola: ‘Xavi đủ giỏi để dẫn dắt Barca’', NULL),
(234, 'https://vnexpress.net/inter-phai-ban-eriksen-4378959.html', 'Inter phải bán Eriksen', NULL),
(235, 'https://vnexpress.net/djokovic-tro-lai-paris-masters-4378969.html', 'Djokovic trở lại Paris Masters', NULL),
(236, 'https://vnexpress.net/nhung-bai-toan-cho-solskjaer-4379194.html', 'Những bài toán cho Solskjaer', NULL),
(237, 'https://vnexpress.net/guardiola-khong-muon-dan-dat-man-city-them-200-tran-4379059.html', 'Guardiola không muốn dẫn dắt Man City thêm 200 trận', NULL),
(238, 'https://vnexpress.net/tottenham-man-utd-noi-nam-giu-tuong-lai-solskjaer-4378994.html', 'Tottenham - Man Utd: Nơi nắm giữ tương lai Solskjaer', NULL),
(239, 'https://vnexpress.net/merson-cac-doi-thu-deu-mong-solskjaer-tai-vi-4379093.html', 'Merson: ‘Các đối thủ đều mong Solskjaer tại vị’', NULL),
(240, 'https://vnexpress.net/guardiola-solskjaer-chiu-ap-luc-gap-doi-o-man-utd-4379068.html', 'Guardiola: ‘Solskjaer chịu áp lực gấp đôi ở Man Utd’', NULL),
(241, 'https://vnexpress.net/psg-thang-nguoc-sau-khi-messi-roi-san-4378992.html', 'PSG thắng ngược sau khi Messi rời sân', NULL),
(242, 'https://vnexpress.net/ronaldo-lai-pha-ky-luc-cua-messi-tren-instagram-4378944.html', 'Ronaldo lại phá kỷ lục của Messi trên Instagram', NULL),
(243, 'https://vnexpress.net/5-diem-nhan-chien-thuat-cua-xavi-4378704.html', '5 điểm nhấn chiến thuật của Xavi', NULL),
(244, 'https://vnexpress.net/quang-ninh-roi-v-league-dang-lo-hay-dang-mung-4378697.html', 'Quảng Ninh rời V-League: Đáng lo hay đáng mừng?', NULL),
(245, 'https://vnexpress.net/nhung-thay-doi-trong-luat-golf-nghiep-du-4378801.html', 'Những thay đổi trong luật golf nghiệp dư', NULL),
(246, 'https://vnexpress.net/eagle-bat-ngo-cua-patrick-reed-4378793.html', 'Eagle bất ngờ của Patrick Reed', NULL),
(247, 'https://vnexpress.net/rooney-to-cau-thu-man-utd-vo-trach-nhiem-4378561.html', 'Rooney tố cầu thủ Man Utd vô trách nhiệm', NULL),
(248, 'https://vnexpress.net/messi-va-mbappe-nghi-tap-4378824.html', 'Messi và Mbappe nghỉ tập', NULL),
(249, 'https://vnexpress.net/dien-thoai-khong-nhan-dien-duoc-vo-si-vi-mat-bien-dang-4378679.html', 'Điện thoại không nhận diện được võ sĩ vì mặt biến dạng', NULL),
(250, 'https://vnexpress.net/ramos-chua-biet-bao-gio-da-tran-ra-mat-psg-4378610.html', 'Ramos chưa biết bao giờ đá trận ra mắt PSG', NULL),
(251, 'https://vnexpress.net/mourinho-an-toi-tren-via-he-4378506.html', 'Mourinho ăn tối trên vỉa hè', NULL),
(252, 'https://vnexpress.net/xavi-co-the-dan-dat-barca-tu-ngay-6-11-4378505.html', 'Xavi có thể dẫn dắt Barca từ ngày 6/11', NULL),
(253, 'https://vnexpress.net/1-600-nguoi-chay-vi-benh-nhan-ung-thu-vu-4378709.html', '1.600 người chạy vì bệnh nhân ung thư vú', NULL),
(254, 'https://vnexpress.net/inter-gia-han-voi-lautaro-martinez-4378503.html', 'Inter gia hạn với Lautaro Martinez', NULL),
(255, 'https://vnexpress.net/ban-gai-ronaldo-mang-song-thai-4378482.html', 'Bạn gái Ronaldo mang song thai', NULL),
(256, 'https://vnexpress.net/quang-ninh-mat-quyen-du-v-league-2022-4378439.html', 'Quảng Ninh mất quyền dự V-League 2022', NULL),
(257, 'https://vnexpress.net/thai-lan-thang-tran-dau-o-u23-chau-a-4378378.html', 'Thái Lan thắng trận đầu ở U23 châu Á', NULL),
(258, 'https://vnexpress.net/tuyen-viet-nam-chon-vung-tau-tap-huan-cho-aff-cup-4378449.html', 'Tuyển Việt Nam chọn Vũng Tàu tập huấn cho AFF Cup', NULL),
(259, 'https://vnexpress.net/dau-truong-doi-nghich-pga-tour-sap-ra-mat-4378359.html', 'Đấu trường đối nghịch PGA Tour sắp ra mắt', NULL),
(260, 'https://vnexpress.net/cau-thu-duoc-moi-mua-chung-nhan-gia-tiem-chung-covid-19-4377177.html', 'Cầu thủ được mời mua chứng nhận giả tiêm chủng Covid-19', NULL),
(261, 'https://vnexpress.net/cuu-hau-ve-leeds-lo-mieng-che-nhao-man-utd-4378019.html', 'Cựu hậu vệ Leeds lỡ miệng chế nhạo Man Utd', NULL),
(262, 'https://vnexpress.net/mot-chien-thang-day-lo-au-cua-hlv-park-4378174.html', 'Một chiến thắng đầy lo âu của HLV Park', NULL),
(263, 'https://vnexpress.net/yen-hoang-doa-hong-goc-viet-cua-dien-kinh-paralympic-my-4377075.html', 'Yến Hoàng - đoá hồng gốc Việt của điền kinh Paralympic Mỹ', NULL),
(264, 'https://vnexpress.net/cau-thu-man-utd-doi-xem-lai-tu-cach-doi-truong-cua-maguire-4377831.html', 'Cầu thủ Man Utd đòi xem lại tư cách đội trưởng của Maguire', NULL),
(265, 'https://vnexpress.net/thanh-guom-damocles-da-roi-o-camp-nou-4378107.html', 'Thanh gươm Damocles đã rơi ở Camp Nou', NULL),
(266, 'https://vnexpress.net/pogba-phu-nhan-chuyen-tu-mat-solskjaer-4378352.html', 'Pogba phủ nhận chuyện từ mặt Solskjaer', NULL),
(267, 'https://vnexpress.net/man-utd-san-sang-de-pogba-ra-di-tu-do-4378109.html', 'Man Utd sẵn sàng để Pogba ra đi tự do', NULL),
(268, 'https://vnexpress.net/roma-tim-lai-chien-thang-khi-vang-mourinho-4378099.html', 'Roma tìm lại chiến thắng khi vắng Mourinho', NULL),
(269, 'https://vnexpress.net/doi-du-bi-dua-liverpool-vao-tu-ket-cup-lien-doan-4378047.html', 'Đội dự bị đưa Liverpool vào tứ kết Cup Liên đoàn', NULL),
(270, 'https://vnexpress.net/real-chia-diem-ngay-sau-tran-thang-barca-4377942.html', 'Real chia điểm ngay sau trận thắng Barca', NULL),
(271, 'https://vnexpress.net/bayern-tham-bai-o-cup-quoc-gia-duc-4377941.html', 'Bayern thảm bại ở Cup Quốc gia Đức', NULL),
(272, 'https://vnexpress.net/barca-sa-thai-koeman-4377947.html', 'Barca sa thải Koeman', NULL),
(273, 'https://vnexpress.net/man-city-thanh-cuu-vuong-cup-lien-doan-4377940.html', 'Man City thành cựu vương Cup Liên đoàn', NULL),
(274, 'https://vnexpress.net/barca-thua-doi-bong-moi-thang-hang-la-liga-4377956.html', 'Barca thua đội bóng mới thăng hạng La Liga', NULL),
(275, 'https://vnexpress.net/juventus-vap-nga-tren-san-nha-4377934.html', 'Juventus vấp ngã trên sân nhà', NULL),
(276, 'https://vnexpress.net/ro-ri-ket-qua-messi-truot-qua-bong-vang-4377908.html', 'Rò rỉ kết quả Messi trượt Quả Bóng Vàng', NULL),
(277, 'https://vnexpress.net/hlv-park-that-vong-voi-chien-thang-cua-u23-viet-nam-4377895.html', 'HLV Park thất vọng với chiến thắng của U23 Việt Nam', NULL),
(278, 'https://vnexpress.net/golfer-ung-thu-giai-doan-cuoi-van-dau-pga-tour-4377842.html', 'Golfer ung thư giai đoạn cuối vẫn đấu PGA Tour', NULL),
(279, 'https://vnexpress.net/u23-viet-nam-vs-u23-dai-loan-4377741-tong-thuat.html', 'Việt Nam thắng nhọc trận đầu vòng loại U23 châu Á', NULL),
(280, 'https://vnexpress.net/man-utd-te-the-nao-duoi-thoi-solskjaer-4377706.html', 'Man Utd tệ thế nào dưới thời Solskjaer', NULL),
(281, 'https://vnexpress.net/vi-sao-bong-da-co-chien-thuat-dung-xe-buyt-4377409.html', 'Vì sao bóng đá có chiến thuật ‘Dựng xe buýt’?', NULL),
(282, 'https://vnexpress.net/mourinho-len-chi-dao-sau-khi-bi-duoi-4377658.html', 'Mourinho lén chỉ đạo sau khi bị đuổi', NULL),
(283, 'https://vnexpress.net/xavi-lap-ky-luc-voi-doi-bong-qatar-4377685.html', 'Xavi lập kỷ lục với đội bóng Qatar', NULL),
(284, 'https://vnexpress.net/bao-duc-so-sanh-sancho-voi-diep-vien-007-4377428.html', 'Báo Đức so sánh Sancho với điệp viên 007', NULL),
(285, 'https://vnexpress.net/cac-tay-vot-khong-tiem-van-co-the-du-australia-mo-rong-4377570.html', 'Các tay vợt không tiêm vẫn có thể dự Australia Mở rộng', NULL),
(286, 'https://vnexpress.net/ferguson-den-san-tap-man-utd-de-giu-solskjaer-4377418.html', 'Ferguson đến sân tập Man Utd để giữ Solskjaer', NULL),
(287, 'https://vnexpress.net/ancelotti-tuyen-bo-khong-trong-dung-hazard-4377552.html', 'Ancelotti tuyên bố không trọng dụng Hazard', NULL),
(288, 'https://vnexpress.net/bayern-ghi-ban-nhieu-nhat-chau-au-4377830.html', 'Bayern ghi bàn nhiều nhất châu Âu', NULL),
(289, 'https://vnexpress.net/u23-viet-nam-dai-loan-tran-cau-phai-thang-4377467.html', 'U23 Việt Nam - Đài Loan: Trận cầu phải thắng', NULL),
(290, 'https://vnexpress.net/viet-nam-khong-to-chuc-para-games-4377533.html', 'Việt Nam không tổ chức Para Games', NULL),
(291, 'https://vnexpress.net/giroud-dua-milan-len-ngoi-dau-serie-a-4377512.html', 'Giroud đưa Milan lên ngôi đầu Serie A', NULL),
(292, 'https://vnexpress.net/solskjaer-co-ty-le-thang-cao-thu-ba-lich-su-man-utd-4377136.html', 'Solskjaer có tỷ lệ thắng cao thứ ba lịch sử Man Utd', NULL),
(293, 'https://vnexpress.net/arsenal-vao-tu-ket-cup-lien-doan-4377422.html', 'Arsenal vào tứ kết Cup Liên đoàn', NULL),
(294, 'https://vnexpress.net/man-utd-chua-sa-thai-solskjaer-4377371.html', 'Man Utd chưa sa thải Solskjaer', NULL),
(295, 'https://vnexpress.net/kepa-lai-giup-chelsea-thang-luan-luu-4377410.html', 'Kepa lại giúp Chelsea thắng luân lưu', NULL),
(296, 'https://vnexpress.net/que-ngoc-hai-muon-tan-dung-diem-tua-my-dinh-4377348.html', 'Quế Ngọc Hải muốn tận dụng điểm tựa Mỹ Đình', NULL),
(297, 'https://vnexpress.net/hlv-park-tu-choi-so-sanh-giua-hai-lua-u23-4377291.html', 'HLV Park từ chối so sánh giữa hai lứa U23', NULL),
(298, 'https://vnexpress.net/cdv-noi-gian-voi-u23-thai-lan-4377268.html', 'CĐV nổi giận với U23 Thái Lan', NULL),
(299, 'https://vnexpress.net/tavatanakit-linh-moi-hay-nhat-lpga-tour-2021-4377160.html', 'Tavatanakit - lính mới hay nhất LPGA Tour 2021', NULL),
(300, 'https://vnexpress.net/song-ngam-trong-long-man-utd-4377072.html', 'Sóng ngầm trong lòng Man Utd', NULL),
(301, 'https://vnexpress.net/wanda-nara-tha-thu-cho-icardi-4377151.html', 'Wanda Nara tha thứ cho Icardi', NULL),
(302, 'https://vnexpress.net/ronaldo-duoc-du-doan-thay-solskjaer-4376991.html', 'Ronaldo được dự đoán thay Solskjaer', NULL),
(303, 'https://vnexpress.net/messi-khoi-dau-mua-giai-te-nhat-trong-16-nam-4376963.html', 'Messi khởi đầu mùa giải tệ nhất trong 16 năm', NULL),
(304, 'https://vnexpress.net/solskjaer-duoc-khuyen-trong-dung-lingard-4376903.html', 'Solskjaer được khuyên trọng dụng Lingard', NULL),
(305, 'https://vnexpress.net/vi-sao-klopp-khong-qua-phan-khich-khi-thang-man-utd-4376897.html', 'Vì sao Klopp không quá phấn khích khi thắng Man Utd?', NULL),
(306, 'https://vnexpress.net/u23-viet-nam-chi-duoc-di-bo-lam-quen-san-dau-4376864.html', 'U23 Việt Nam chỉ được đi bộ làm quen sân đấu', NULL),
(307, 'https://vnexpress.net/ronaldo-bi-cho-la-mia-mai-hlv-solskjaer-4376883.html', 'Ronaldo bị cho là mỉa mai HLV Solskjaer', NULL),
(308, 'https://vnexpress.net/man-utd-hop-ban-sa-thai-solskjaer-4376882.html', 'Man Utd họp bàn sa thải Solskjaer', NULL),
(309, 'https://vnexpress.net/kane-kem-toan-dien-so-voi-mua-truoc-4376922.html', 'Kane kém toàn diện so với mùa trước', NULL),
(310, 'https://vnexpress.net/solskjaer-nguy-co-bi-sa-thai-cao-nhat-4376911.html', 'Solskjaer nguy cơ bị sa thải cao nhất', NULL),
(311, 'https://vnexpress.net/haaland-co-the-nghi-het-nam-4376881.html', 'Haaland có thể nghỉ hết năm', NULL),
(312, 'https://vnexpress.net/ky-thu-linh-dan-vo-dich-u14-chau-a-4376552.html', 'Kỳ thủ Linh Đan vô địch U14 châu Á', NULL),
(313, 'https://vnexpress.net/trong-hoang-nghi-tran-dau-nhat-ban-4376714.html', 'Trọng Hoàng nghỉ trận đấu Nhật Bản', NULL),
(314, 'https://vnexpress.net/ancelotti-real-ha-barca-nho-thuc-dung-4376572.html', 'Ancelotti: ‘Real hạ Barca nhờ thực dụng’', NULL),
(315, 'https://vnexpress.net/vo-si-thu-nhi-san-sang-tai-dau-neu-tada-khong-phuc-4376593.html', 'Võ sĩ Thu Nhi sẵn sàng tái đấu nếu Tada không phục', NULL),
(316, 'https://vnexpress.net/thang-loi-kep-cua-ko-jin-young-4376759.html', 'Thắng lợi kép của Ko Jin Young', NULL),
(317, 'https://vnexpress.net/cdv-man-utd-lu-luot-bo-ve-giua-tran-4376556.html', 'CĐV Man Utd lũ lượt bỏ về giữa trận', NULL),
(318, 'https://vnexpress.net/lingard-vac-lai-cdv-man-utd-khi-bi-mang-oan-4376540.html', 'Lingard vặc lại CĐV Man Utd khi bị mắng oan', NULL),
(319, 'https://vnexpress.net/ferguson-chan-nan-khi-xem-man-utd-4376321.html', 'Ferguson chán nản khi xem Man Utd', NULL),
(320, 'https://vnexpress.net/suarez-bi-to-dong-kich-kiem-phat-den-4376544.html', 'Suarez bị tố đóng kịch kiếm phạt đền', NULL),
(321, 'https://vnexpress.net/ronaldo-sut-vao-bung-cau-thu-liverpool-4376517.html', 'Ronaldo sút vào bụng cầu thủ Liverpool', NULL),
(322, 'https://vnexpress.net/ronaldo-maguire-nhan-loi-voi-cdv-4376334.html', 'Ronaldo, Maguire nhận lỗi với CĐV', NULL),
(323, 'https://vnexpress.net/cdv-barca-dap-pha-xe-cua-hlv-koeman-4376423.html', 'CĐV Barca đập phá xe của HLV Koeman', NULL),
(324, 'https://vnexpress.net/verstappen-noi-rong-cach-biet-voi-hamilton-4376591.html', 'Verstappen nới rộng cách biệt với Hamilton', NULL),
(325, 'https://vnexpress.net/matsuyama-doat-zozo-championship-4376669.html', 'Matsuyama đoạt Zozo Championship', NULL),
(326, 'https://vnexpress.net/dybala-cuu-juventus-4376336.html', 'Dybala cứu Juventus', NULL),
(327, 'https://vnexpress.net/psg-thoat-thua-o-derby-nuoc-phap-4376319.html', 'PSG thoát thua ở derby nước Pháp', NULL),
(328, 'https://vnexpress.net/mourinho-nhan-the-do-trong-tran-hoa-cua-roma-4376326.html', 'Mourinho nhận thẻ đỏ trong trận hòa của Roma', NULL),
(329, 'https://vnexpress.net/west-ham-vao-top-4-ngoai-hang-anh-4376303.html', 'West Ham vào top 4 Ngoại hạng Anh', NULL),
(330, 'https://vnexpress.net/man-utd-vs-liverpool-4376277-tong-thuat.html', 'Man Utd thua Liverpool 0-5', NULL),
(331, 'https://vnexpress.net/barca-vs-real-4376271-tong-thuat.html', 'Real lần thứ tư liên tiếp thắng Barca', NULL),
(332, 'https://vnexpress.net/trong-tai-cho-diem-thu-nhi-the-nao-4376172.html', 'Trọng tài cho điểm Thu Nhi thế nào?', NULL),
(333, 'https://vnexpress.net/cdv-de-nghi-loai-norwich-khoi-ngoai-hang-anh-4376159.html', 'CĐV đề nghị loại Norwich khỏi Ngoại hạng Anh', NULL),
(334, 'https://vnexpress.net/hlv-park-doi-san-tap-de-tranh-chan-thuong-4376252.html', 'HLV Park đổi sân tập để tránh chấn thương', NULL),
(335, 'https://vnexpress.net/tam-golfer-xin-du-giai-doi-nghich-voi-pga-tour-4376146.html', 'Tám golfer xin dự giải đối nghịch với PGA Tour', NULL),
(336, 'https://vnexpress.net/dai-wbo-the-gioi-cua-thu-nhi-dang-gia-the-nao-4375983.html', 'Đai WBO thế giới của Thu Nhi đáng giá thế nào?', NULL),
(337, 'https://vnexpress.net/solskjaer-hy-vong-lai-xep-tren-liverpool-4376077.html', 'Solskjaer hy vọng lại xếp trên Liverpool', NULL),
(338, 'https://vnexpress.net/caddie-ky-cuu-nghi-viec-vi-covid-19-4376150.html', 'Caddie kỳ cựu nghỉ việc vì Covid-19', NULL),
(339, 'https://vnexpress.net/ibrahimovic-kien-tao-dot-luoi-nha-va-ghi-ban-trong-cung-tran-dau-4376033.html', 'Ibrahimovic kiến tạo, đốt lưới nhà và ghi bàn trong cùng trận đấu', NULL),
(340, 'https://vnexpress.net/doi-bong-cua-ranieri-nguoc-dong-bang-4-ban-trong-12-phut-4376069.html', 'Đội bóng của Ranieri ngược dòng bằng 4 bàn trong 12 phút', NULL),
(341, 'https://vnexpress.net/psg-duoc-vi-nhu-mot-quoc-gia-4375844.html', 'PSG được ví như một quốc gia', NULL),
(342, 'https://vnexpress.net/dortmund-guong-day-sau-tham-bai-o-champions-league-4376032.html', 'Dortmund gượng dậy sau thảm bại ở Champions League', NULL),
(343, 'https://vnexpress.net/doi-thu-cua-thu-nhi-khieu-nai-len-wbo-4376004.html', 'Đối thủ của Thu Nhi khiếu nại lên WBO', NULL),
(344, 'https://vnexpress.net/man-city-ha-guc-doi-dung-thu-tu-ngoai-hang-anh-4376023.html', 'Man City hạ gục đội đứng thứ tư Ngoại hạng Anh', NULL),
(345, 'https://vnexpress.net/man-utd-bi-che-gom-toan-nghe-si-choi-dan-4375903.html', 'Man Utd bị chê gồm toàn nghệ sĩ chơi đàn', NULL),
(346, 'https://vnexpress.net/chelsea-thang-7-0-tai-ngoai-hang-anh-4375975.html', 'Chelsea thắng 7-0 tại Ngoại hạng Anh', NULL),
(347, 'https://vnexpress.net/thu-nhi-gianh-dai-wbo-the-gioi-4375922.html', 'Thu Nhi giành đai WBO thế giới', NULL),
(348, 'https://vnexpress.net/bi-quyet-mang-tai-lieu-bat-11m-cua-pickford-4375891.html', 'Bí quyết mang tài liệu bắt 11m của Pickford', NULL),
(349, 'https://vnexpress.net/mourinho-bat-hoc-tro-tap-ngay-sau-tham-bai-1-6-4375824.html', 'Mourinho bắt học trò tập ngay sau thảm bại 1-6', NULL),
(350, 'https://vnexpress.net/nadal-kien-nghi-bo-giao-bong-hai-trong-quan-vot-4375843.html', 'Nadal kiến nghị bỏ giao bóng hai trong quần vợt', NULL),
(351, 'https://vnexpress.net/vi-sao-ronaldo-ghi-nhieu-ban-bang-dau-4375531.html', 'Vì sao Ronaldo ghi nhiều bàn bằng đầu?', NULL),
(352, 'https://vnexpress.net/dai-chien-man-utd-liverpool-el-clasico-dien-ra-tuan-nay-4375656.html', 'Đại chiến Man Utd - Liverpool, El Clasico diễn ra tuần này', NULL),
(353, 'https://vnexpress.net/medvedev-ung-ho-quan-diem-tiem-vaccine-cua-djokovic-4375865.html', 'Medvedev ủng hộ quan điểm tiêm vaccine của Djokovic', NULL),
(354, 'https://vnexpress.net/icardi-ra-dieu-kien-voi-wanda-nara-de-tro-lai-psg-4375739.html', 'Icardi ra điều kiện với Wanda Nara để trở lại PSG', NULL),
(355, 'https://vnexpress.net/tuchel-khong-hoi-han-vi-ban-abraham-4375810.html', 'Tuchel không hối hận vì bán Abraham', NULL),
(356, 'https://vnexpress.net/hlv-tran-minh-chien-tu-hao-khi-dan-dat-clb-tp-hcm-4375887.html', 'HLV Trần Minh Chiến tự hào khi dẫn dắt CLB TP HCM', NULL),
(357, 'https://vnexpress.net/fernandes-nguy-co-lo-tran-man-utd-liverpool-4375756.html', 'Fernandes nguy cơ lỡ trận Man Utd - Liverpool', NULL),
(358, 'https://vnexpress.net/thay-tro-hlv-park-tap-luyen-trong-gia-ret-4375741.html', 'Thầy trò HLV Park tập luyện trong giá rét', NULL),
(359, 'https://vnexpress.net/el-clasico-diem-hen-sau-18-nam-cua-koeman-va-ancelotti-4375731.html', 'El Clasico - điểm hẹn sau 18 năm của Koeman và Ancelotti', NULL),
(360, 'https://vnexpress.net/arsenal-bang-diem-man-utd-4375729.html', 'Arsenal bằng điểm Man Utd', NULL),
(361, 'https://vnexpress.net/ve-xem-tuyen-viet-nam-dat-nhat-la-1-2-trieu-dong-4375699.html', 'Vé xem tuyển Việt Nam đắt nhất là 1,2 triệu đồng', NULL),
(362, 'https://vnexpress.net/benzema-doi-dien-10-thang-tu-4375452.html', 'Benzema đối diện 10 tháng tù', NULL),
(363, 'https://vnexpress.net/vi-sao-bong-da-co-thuat-ngu-hat-trick-4374788.html', 'Vì sao bóng đá có thuật ngữ hat-trick?', NULL),
(364, 'https://vnexpress.net/vga-cong-bo-doi-du-tuyen-golf-sea-games-4375659.html', 'VGA công bố đội dự tuyển golf SEA Games', NULL),
(365, 'https://vnexpress.net/vo-cu-dap-tra-hulk-4375340.html', 'Vợ cũ đáp trả Hulk', NULL),
(366, 'https://vnexpress.net/cac-vdv-tro-lai-tap-luyen-4375115.html', 'Các VĐV trở lại tập luyện', NULL),
(367, 'https://vnexpress.net/hai-huy-phai-den-tien-vi-xu-keo-voi-tp-hcm-4375351.html', 'Hải Huy phải đền tiền vì xù kèo với TP HCM', NULL),
(368, 'https://vnexpress.net/flamengo-muon-du-champions-league-4375433.html', 'Flamengo muốn dự Champions League', NULL),
(369, 'https://vnexpress.net/golf-han-truoc-moc-200-danh-hieu-lpga-tour-4375422.html', 'Golf Hàn trước mốc 200 danh hiệu LPGA Tour', NULL),
(370, 'https://vnexpress.net/wenger-khuyen-solskjaer-dung-fred-dau-liverpool-4375228.html', 'Wenger khuyên Solskjaer dùng Fred đấu Liverpool', NULL),
(371, 'https://vnexpress.net/roma-thua-1-6-o-cup-chau-au-4375219.html', 'Roma thua 1-6 ở Cup châu Âu', NULL),
(372, 'https://vnexpress.net/salah-lap-ky-luc-ghi-ban-lien-tiep-cho-liverpool-4374195.html', 'Salah lập kỷ lục ghi bàn liên tiếp cho Liverpool', NULL),
(373, 'https://vnexpress.net/tottenham-thua-tran-dau-o-vong-bang-conference-league-4375209.html', 'Tottenham thua trận đầu ở vòng bảng Conference League', NULL),
(374, 'https://vnexpress.net/arsenal-tuyen-mo-than-dong-5-tuoi-4375224.html', 'Arsenal tuyển mộ thần đồng 5 tuổi', NULL),
(375, 'https://vnexpress.net/chelsea-mat-cap-tien-dao-chu-luc-cuoi-tuan-nay-4374712.html', 'Chelsea mất cặp tiền đạo chủ lực cuối tuần này', NULL),
(376, 'https://vnexpress.net/khan-gia-duoc-tro-lai-san-my-dinh-4375114.html', 'Khán giả được trở lại sân Mỹ Đình', NULL),
(377, 'https://vnexpress.net/tuyen-viet-nam-roi-khoi-top-15-chau-a-4375105.html', 'Tuyển Việt Nam rơi khỏi top 15 châu Á', NULL),
(378, 'https://vnexpress.net/noi-lo-the-he-qua-danh-sach-u23-viet-nam-4375040.html', 'Nỗi lo thế hệ qua danh sách U23 Việt Nam', NULL),
(379, 'https://vnexpress.net/vo-si-thu-nhi-tu-co-be-ban-ve-so-den-vo-dai-wbo-the-gioi-4374412.html', 'Võ sĩ Thu Nhi - từ cô bé bán vé số đến võ đài WBO thế giới', NULL),
(380, 'https://vnexpress.net/scholes-dinh-khong-xem-hiep-hai-tran-man-utd-atalanta-4374695.html', 'Scholes định không xem hiệp hai trận Man Utd - Atalanta', NULL);
INSERT INTO `post` (`post_id`, `post_url`, `post_title`, `post_description`) VALUES
(381, 'https://vnexpress.net/australia-cam-nhap-canh-cac-tay-vot-chua-tiem-vaccine-4375039.html', 'Australia cấm nhập cảnh các tay vợt chưa tiêm vaccine', NULL),
(382, 'https://vnexpress.net/pique-la-hau-ve-ghi-ban-nhieu-nhat-champions-league-4374720.html', 'Pique là hậu vệ ghi bàn nhiều nhất Champions League', NULL),
(383, 'https://vnexpress.net/hlv-dinamo-kyiv-khong-tin-barca-qua-vong-bang-4374705.html', 'HLV Dinamo Kyiv không tin Barca qua vòng bảng', NULL),
(384, 'https://vnexpress.net/vi-sao-simeone-phot-lo-bat-tay-klopp-4374736.html', 'Vì sao Simeone phớt lờ bắt tay Klopp?', NULL),
(385, 'https://vnexpress.net/chelsea-vui-dap-malmo-4374697.html', 'Chelsea vùi dập Malmo', NULL),
(386, 'https://vnexpress.net/juventus-toan-thang-tai-champions-league-4374702.html', 'Juventus toàn thắng tại Champions League', NULL),
(387, 'https://vnexpress.net/solskjaer-ca-ngoi-thai-do-thi-dau-cua-ronaldo-4374689.html', 'Solskjaer ca ngợi thái độ thi đấu của Ronaldo', NULL),
(388, 'https://vnexpress.net/ronaldo-lai-vuot-messi-4374688.html', 'Ronaldo lại vượt Messi', NULL),
(389, 'https://vnexpress.net/bayern-thang-dam-du-hai-lan-bi-var-tu-choi-4374687.html', 'Bayern thắng đậm dù hai lần bị VAR từ chối', NULL),
(390, 'https://vnexpress.net/ronaldo-giup-man-utd-thang-nguoc-4374685.html', 'Ronaldo giúp Man Utd thắng ngược', NULL),
(391, 'https://vnexpress.net/giai-chay-dem-ha-noi-dien-ra-dau-nam-2022-4375089.html', 'Giải chạy đêm Hà Nội diễn ra đầu năm 2022', NULL),
(392, 'https://vnexpress.net/next-media-so-huu-ban-quyen-bang-i-vong-loai-u23-chau-a-2022-4375035.html', 'Next Media sở hữu bản quyền bảng I vòng loại U23 châu Á 2022', NULL),
(393, 'https://vnexpress.net/hlv-park-chot-23-cau-thu-da-vong-loai-u23-chau-a-4374622.html', 'HLV Park chốt 23 cầu thủ đá vòng loại U23 châu Á', NULL),
(394, 'https://vnexpress.net/newcastle-sa-thai-hlv-bruce-4374571.html', 'Newcastle sa thải HLV Bruce', NULL),
(395, 'https://vnexpress.net/tp-ha-noi-chua-cho-cdv-vao-san-my-dinh-4374417.html', 'TP Hà Nội chưa cho CĐV vào sân Mỹ Đình', NULL),
(396, 'https://vnexpress.net/fati-vuot-xa-thanh-tich-cua-messi-cung-do-tuoi-4374365.html', 'Fati vượt xa thành tích của Messi cùng độ tuổi', NULL),
(397, 'https://vnexpress.net/wanda-nara-thue-tham-tu-hack-dien-thoai-icardi-4374343.html', 'Wanda Nara thuê thám tử hack điện thoại Icardi', NULL),
(398, 'https://vnexpress.net/klopp-bat-ngo-vi-simeone-bo-thu-tuc-bat-tay-4374180.html', 'Klopp bất ngờ vì Simeone bỏ thủ tục bắt tay', NULL),
(399, 'https://vnexpress.net/messi-nhuong-phat-den-cho-mbappe-4374173.html', 'Messi nhường phạt đền cho Mbappe', NULL),
(400, 'https://vnexpress.net/pochettino-thua-nhan-psg-song-nho-messi-mbappe-4374231.html', 'Pochettino thừa nhận PSG sống nhờ Messi, Mbappe', NULL),
(401, 'https://vnexpress.net/djokovic-cung-serbia-du-davis-cup-4374258.html', 'Djokovic cùng Serbia dự Davis Cup', NULL),
(402, 'https://vnexpress.net/barca-dynamo-kyiv-can-ke-cua-tu-4374611.html', 'Barca - Dynamo Kyiv: Cận kề cửa tử', NULL),
(403, 'https://vnexpress.net/ky-luc-ve-khoang-cach-thoi-gian-cho-hai-danh-hieu-o-pga-tour-4374445.html', 'Kỷ lục về khoảng cách thời gian cho hai danh hiệu ở PGA Tour', NULL),
(404, 'https://vnexpress.net/lpga-tour-2021-vao-hoi-ket-4374433.html', 'LPGA Tour 2021 vào hồi kết', NULL),
(405, 'https://vnexpress.net/ibrahimovic-choi-te-hay-choi-tot-milan-van-thua-4374245.html', 'Ibrahimovic: ‘Chơi tệ hay chơi tốt, Milan vẫn thua’', NULL),
(406, 'https://vnexpress.net/griezmann-lap-ky-luc-khong-mong-muon-4374169.html', 'Griezmann lập kỷ lục không mong muốn', NULL),
(407, 'https://vnexpress.net/inter-giai-ma-hien-tuong-champions-league-4374172.html', 'Inter giải mã hiện tượng Champions League', NULL),
(408, 'https://vnexpress.net/dortmund-thua-0-4-khi-haaland-tit-ngoi-4374177.html', 'Dortmund thua 0-4 khi Haaland tịt ngòi', NULL),
(409, 'https://vnexpress.net/real-xa-gian-len-shakhtar-4374171.html', 'Real xả giận lên Shakhtar', NULL),
(410, 'https://vnexpress.net/man-city-nghien-nat-dkvd-bi-4374166.html', 'Man City nghiền nát ĐKVĐ Bỉ', NULL),
(411, 'https://vnexpress.net/milan-thua-tran-thu-ba-lien-tiep-tai-champions-league-4374168.html', 'Milan thua trận thứ ba liên tiếp tại Champions League', NULL),
(412, 'https://vnexpress.net/atletico-thua-liverpool-khi-griezmann-nhan-the-do-4374163.html', 'Atletico thua Liverpool khi Griezmann nhận thẻ đỏ', NULL),
(413, 'https://vnexpress.net/messi-giup-psg-thang-nguoc-o-champions-league-4374161.html', 'Messi giúp PSG thắng ngược ở Champions League', NULL),
(414, 'https://vnexpress.net/ronaldo-gioi-thieu-zidane-ve-man-utd-4374126.html', 'Ronaldo giới thiệu Zidane về Man Utd', NULL),
(415, 'https://vnexpress.net/solskjaer-that-vong-vi-man-utd-khong-mua-tien-ve-4373963.html', 'Solskjaer thất vọng vì Man Utd không mua tiền vệ', NULL),
(416, 'https://vnexpress.net/neville-ronaldo-chi-biet-phan-nan-4373946.html', 'Neville: ‘Ronaldo chỉ biết phàn nàn’', NULL),
(417, 'https://vnexpress.net/bartomeu-hoi-han-vi-nghe-loi-cau-thu-barca-4373716.html', 'Bartomeu hối hận vì nghe lời cầu thủ Barca', NULL),
(418, 'https://vnexpress.net/khi-nao-v-league-duoc-dong-tron-vai-4373856.html', 'Khi nào V-League được đóng tròn vai?', NULL),
(419, 'https://vnexpress.net/viet-nam-co-tranh-duoc-bi-kich-cua-thai-lan-sau-vong-loai-world-cup-4373642.html', 'Việt Nam có tránh được bi kịch của Thái Lan sau vòng loại World Cup?', NULL),
(420, 'https://vnexpress.net/nguoi-dep-argentina-phu-nhan-ngoai-tinh-voi-icardi-4373942.html', 'Người đẹp Argentina phủ nhận ngoại tình với Icardi', NULL),
(421, 'https://vnexpress.net/hoang-vu-samson-dau-quan-cho-tp-hcm-4373827.html', 'Hoàng Vũ Samson đầu quân cho TP HCM', NULL),
(422, 'https://vnexpress.net/djokovic-de-ngo-kha-nang-bo-australia-mo-rong-4373715.html', 'Djokovic để ngỏ khả năng bỏ Australia Mở rộng', NULL),
(423, 'https://vnexpress.net/federer-va-murray-sa-sut-tren-bang-diem-atp-4373736.html', 'Federer và Murray sa sút trên bảng điểm ATP', NULL),
(424, 'https://vnexpress.net/dem-quyet-dinh-cua-milan-va-inter-o-champions-league-4374039.html', 'Đêm quyết định của Milan và Inter ở Champions League', NULL),
(425, 'https://vnexpress.net/ancelotti-canh-bao-real-4374024.html', 'Ancelotti cảnh báo Real', NULL),
(426, 'https://vnexpress.net/clb-muangthong-thua-kien-dang-van-lam-4373979.html', 'CLB Muangthong thua kiện Đặng Văn Lâm', NULL),
(427, 'https://vnexpress.net/klopp-atletico-co-the-nuot-chung-liverpool-4373938.html', 'Klopp: ‘Atletico có thể nuốt chửng Liverpool’', NULL),
(428, 'https://vnexpress.net/de-bruyne-ung-ho-lewandowski-gianh-qua-bong-vang-4373889.html', 'De Bruyne ủng hộ Lewandowski giành Quả Bóng Vàng', NULL),
(429, 'https://vnexpress.net/man-city-het-gia-93-trieu-usd-cho-sterling-4373864.html', 'Man City hét giá 93 triệu USD cho Sterling', NULL),
(430, 'https://vnexpress.net/4-golfer-european-tour-cung-pha-ky-luc-the-gioi-4373875.html', '4 golfer European Tour cùng phá kỷ lục thế giới', NULL),
(431, 'https://vnexpress.net/ibrahimovic-nham-pha-ky-luc-cua-totti-4373681.html', 'Ibrahimovic nhắm phá kỷ lục của Totti', NULL),
(432, 'https://vnexpress.net/phap-tang-giao-hoang-ao-dau-cua-messi-4373653.html', 'Pháp tặng Giáo hoàng áo đấu của Messi', NULL),
(433, 'https://vnexpress.net/wanda-nara-khong-tha-thu-cho-icardi-4373660.html', 'Wanda Nara không tha thứ cho Icardi', NULL),
(434, 'https://vnexpress.net/arsenal-thoat-thua-phut-bu-gio-4373656.html', 'Arsenal thoát thua phút bù giờ', NULL),
(435, 'https://vnexpress.net/cac-cau-thu-man-utd-nghi-ngo-sancho-4373613.html', 'Các cầu thủ Man Utd nghi ngờ Sancho', NULL),
(436, 'https://vnexpress.net/giai-chay-vm-amazing-halong-2021-to-chuc-ngay-5-12-4373969.html', 'Giải chạy VM Amazing Halong 2021 tổ chức ngày 5/12', NULL),
(437, 'https://vnexpress.net/hon-1-000-nguoi-chay-vi-benh-nhan-ung-thu-vu-4373299.html', 'Hơn 1.000 người chạy vì bệnh nhân ung thư vú', NULL),
(438, 'https://vnexpress.net/benzema-mo-gianh-qua-bong-vang-4373649.html', 'Benzema mơ giành Quả Bóng Vàng', NULL),
(439, 'https://vnexpress.net/man-utd-va-su-nhan-nai-phi-ly-dat-vao-solskjaer-4373343.html', 'Man Utd và sự nhẫn nại phi lý đặt vào Solskjaer', NULL),
(440, 'https://vnexpress.net/vi-sao-ronaldo-chon-thuong-hieu-ca-nhan-la-cr7-4371800.html', 'Vì sao Ronaldo chọn thương hiệu cá nhân là CR7?', NULL),
(441, 'https://vnexpress.net/golfer-han-mat-gan-20-000-usd-vi-bong-dung-vanh-ho-28-giay-4373528.html', 'Golfer Hàn mất gần 20.000 USD vì bóng đứng vành hố 28 giây', NULL),
(442, 'https://vnexpress.net/mourinho-khieu-khich-cdv-juventus-4373411.html', 'Mourinho khiêu khích CĐV Juventus', NULL),
(443, 'https://vnexpress.net/icardi-no-luc-cuu-van-hon-nhan-4373359.html', 'Icardi nỗ lực cứu vãn hôn nhân', NULL),
(444, 'https://vnexpress.net/norrie-lan-dau-doat-masters-1000-tai-indian-wells-4373248.html', 'Norrie lần đầu đoạt Masters 1000 tại Indian Wells', NULL),
(445, 'https://vnexpress.net/trong-tai-ngan-ban-thang-cua-roma-truoc-juventus-4373105.html', 'Trọng tài ngăn bàn thắng của Roma trước Juventus', NULL),
(446, 'https://vnexpress.net/cdv-lam-sap-khan-dai-o-giai-ha-lan-4373437.html', 'CĐV làm sập khán đài ở giải Hà Lan', NULL),
(447, 'https://vnexpress.net/mcilroy-doat-cj-cup-4373336.html', 'McIlroy đoạt CJ Cup', NULL),
(448, 'https://vnexpress.net/cau-thu-tottenham-giup-cuu-mang-cdv-dot-quy-4373166.html', 'Cầu thủ Tottenham giúp cứu mạng CĐV đột quỵ', NULL),
(449, 'https://vnexpress.net/solskjaer-chan-chinh-ronaldo-ngay-tren-san-4373138.html', 'Solskjaer chấn chỉnh Ronaldo ngay trên sân', NULL),
(450, 'https://vnexpress.net/chu-moi-newcastle-chua-voi-vung-tien-4373131.html', 'Chủ mới Newcastle chưa vội vung tiền', NULL),
(451, 'https://vnexpress.net/san-tap-man-utd-co-the-thanh-ruong-khoai-tay-4373034.html', 'Sân tập Man Utd có thể thành ruộng khoai tây', NULL),
(452, 'https://vnexpress.net/newcastle-thua-dau-ngay-ra-mat-cac-ong-chu-arab-4373093.html', 'Newcastle thua đau ngày ra mắt các ông chủ Arab', NULL),
(453, 'https://vnexpress.net/bayern-ghi-5-ban-trong-37-phut-4373081.html', 'Bayern ghi 5 bàn trong 37 phút', NULL),
(454, 'https://vnexpress.net/everton-west-ham-lo-co-hoi-de-len-man-utd-4373078.html', 'Everton, West Ham lỡ cơ hội đè lên Man Utd', NULL),
(455, 'https://vnexpress.net/u23-viet-nam-thang-dam-truoc-vong-loai-u23-chau-a-4373070.html', 'U23 Việt Nam thắng đậm trước vòng loại U23 châu Á', NULL),
(456, 'https://vnexpress.net/hau-ve-lazio-nhan-the-do-hi-huu-4373005.html', 'Hậu vệ Lazio nhận thẻ đỏ hi hữu', NULL),
(457, 'https://vnexpress.net/khi-v-league-bi-bo-quen-4372266.html', 'Khi V-League bị bỏ quên', NULL),
(458, 'https://vnexpress.net/albatross-tai-xuat-o-pga-tour-4372991.html', 'Albatross tái xuất ở PGA Tour', NULL),
(459, 'https://vnexpress.net/icardi-bi-vo-to-ngoai-tinh-4372905.html', 'Icardi bị vợ tố ngoại tình', NULL),
(460, 'https://vnexpress.net/bi-quyet-tap-da-phat-cua-payet-co-the-cach-mang-hoa-bong-da-4372696.html', 'Bí quyết tập đá phạt của Payet có thể cách mạng hóa bóng đá', NULL),
(461, 'https://vnexpress.net/co-hoi-de-fowler-giai-han-danh-hieu-4372995.html', 'Cơ hội để Fowler giải hạn danh hiệu', NULL),
(462, 'https://vnexpress.net/thang-11-quyet-dinh-tuong-lai-cua-solskjaer-4372877.html', 'Tháng 11 quyết định tương lai của Solskjaer', NULL),
(463, 'https://vnexpress.net/dani-alves-muon-giup-barca-4372882.html', 'Dani Alves muốn giúp Barca', NULL),
(464, 'https://vnexpress.net/solskjaer-nhan-sai-khi-man-utd-bai-tran-4372879.html', 'Solskjaer nhận sai khi Man Utd bại trận', NULL),
(465, 'https://vnexpress.net/milan-soan-dau-bang-serie-a-4372872.html', 'Milan soán đầu bảng Serie A', NULL),
(466, 'https://vnexpress.net/inter-sap-bay-tren-san-cua-lazio-4372873.html', 'Inter sập bẫy trên sân của Lazio', NULL),
(467, 'https://vnexpress.net/chelsea-thang-hu-via-brentford-4372867.html', 'Chelsea thắng hú vía Brentford', NULL),
(468, 'https://vnexpress.net/doi-hinh-hai-giup-man-city-duoi-sat-liverpool-4372853.html', 'Đội hình hai giúp Man City đuổi sát Liverpool', NULL),
(469, 'https://vnexpress.net/haaland-dua-dortmund-len-dinh-bang-4372838.html', 'Haaland đưa Dortmund lên đỉnh bảng', NULL),
(470, 'https://vnexpress.net/liverpool-chuoc-sau-cho-claudio-ranieri-4372814.html', 'Liverpool chuốc sầu cho Claudio Ranieri', NULL),
(471, 'https://vnexpress.net/leicester-vs-man-utd-4372752-tong-thuat.html', 'Leicester đè bẹp Man Utd', NULL),
(472, 'https://vnexpress.net/evra-chan-ngay-viec-trao-qua-bong-vang-cho-messi-4372562.html', 'Evra chán ngấy việc trao Quả Bóng Vàng cho Messi', NULL),
(473, 'https://vnexpress.net/johnson-truot-albatross-4372723.html', 'Johnson trượt albatross', NULL),
(474, 'https://vnexpress.net/bat-nghi-pham-sat-hai-ky-luc-gia-chay-10km-4372630.html', 'Bắt nghi phạm sát hại kỷ lục gia chạy 10km', NULL),
(475, 'https://vnexpress.net/san-co-chau-au-tro-lai-cuoi-tuan-nay-4372505.html', 'Sân cỏ châu Âu trở lại cuối tuần này', NULL),
(476, 'https://vnexpress.net/ban-tranh-cai-cua-mbappe-co-the-thay-doi-luat-viet-vi-4372525.html', 'Bàn tranh cãi của Mbappe có thể thay đổi luật việt vị', NULL),
(477, 'https://vnexpress.net/pogba-va-cau-hoi-nhuc-nhoi-cua-man-utd-4372720.html', 'Pogba và câu hỏi nhức nhối của Man Utd', NULL),
(478, 'https://vnexpress.net/ronaldo-doi-da-chinh-moi-tran-ngoai-hang-anh-4372575.html', 'Ronaldo đòi đá chính mọi trận Ngoại hạng Anh', NULL),
(479, 'https://vnexpress.net/man-utd-khung-hoang-hang-thu-4372623.html', 'Man Utd khủng hoảng hàng thủ', NULL),
(480, 'https://vnexpress.net/guardiola-cung-ran-voi-sterling-4372598.html', 'Guardiola cứng rắn với Sterling', NULL),
(481, 'https://vnexpress.net/rahm-ngan-danh-giai-4372610.html', 'Rahm ngán đánh giải', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fullname`, `email`, `type`, `password`, `version`) VALUES
(2, 'test', '', '', '', '098f6bcd4621d373cade4e832627b4f6', 0),
(3, 'test', '', '', '', '098f6bcd4621d373cade4e832627b4f6', 0),
(5, 'test', '', '', '', '098f6bcd4621d373cade4e832627b4f6', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
