-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 17, 2021 lúc 06:21 AM
-- Phiên bản máy phục vụ: 5.7.31-log
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_web1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sách', NULL, NULL),
(2, 'Rau củ', NULL, NULL),
(3, 'Cây cảnh', NULL, NULL),
(4, 'Thiết bị máy tính, laptop', NULL, NULL),
(5, 'Điện thoại', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_resets_table', 1),
(39, '2019_08_19_000000_create_failed_jobs_table', 1),
(40, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(41, '2021_10_13_153115_create_products_table', 1),
(42, '2021_11_06_083641_create_categories_table', 1),
(44, '2021_11_06_202446_create_carts_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 2, 'my-token', '400e7b4f01d50727302419ec417ee6611281fbd58238bb4f1bf9f69dc71f6412', '[\"*\"]', NULL, '2021-11-06 02:01:31', '2021-11-06 02:01:31'),
(28, 'App\\Models\\User', 3, 'my-token', '78849f92707ab63e4b186cb98764fb58ce9560ff76708f33912b2756e1c69a83', '[\"*\"]', NULL, '2021-11-08 16:12:35', '2021-11-08 16:12:35'),
(41, 'App\\Models\\User', 1, 'my-token', 'cba8ece067d8b3f102ad55b21333edb8b62a6261550c4fcffe1e3842b29242c8', '[\"*\"]', '2021-11-14 02:46:41', '2021-11-14 02:46:02', '2021-11-14 02:46:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại Vivo Y12s - Hàng Chính Hãng', 'Thiết kế ấn tượng với hiệu ứng gradient\r\n            Vivo Y12s được áp dụng kiểu thiết kế nguyên khối hiện đại, \r\n            ấn tượng với những hiệu ứng chuyển màu gradient độc đáo, bóng bẩy, nổi bật cho người dùng khi cầm máy trên tay. ', '/images/products/vivo-y12s.png', 4290000, 1, NULL, NULL),
(2, 'Điện Thoại iPhone 12 Mini 128GB - Hàng Chính Hãng', 'Màn hình Super Retina XDR 5.4 inch2\r\n            Ceramic Shield, chất liệu kính bền chắc nhất từng có trên điện thoại thông minh\r\n            Mạng 5G cho tốc độ tải xuống siêu nhanh, xem video và nghe nhạc trực tuyến chất lượng cao1\r\n            A14 Bionic, chip nhanh nhất từng có trên điện thoại thông minh\r\n            Hệ thống camera kép tiên tiến 12MP với các camera Ultra Wide và Wide; chế độ Ban Đêm, Deep Fusion,\r\n            HDR thông minh thế hệ 3, khả năng quay video HDR Dolby Vision 4K ', '/images/products/iphone-12.png', 16379000, 1, NULL, NULL),
(3, 'Điện Thoại Samsung Galaxy A12 (4GB/128GB)', 'Thiết kế rắn chắc, quen thuộc\r\n            Samsung Galaxy A12 mang diện mạo thân thuộc của những chiếc Samsung tiền nhiệm. Với thiết kế nguyên khối, lớp vỏ máy được đúc bao quanh thân máy cho cảm giác chắc chắn,\r\n             bền chặt. Phần camera trước được đặt trong notch hình giọt nước giúp tăng diện tích cho màn hình.\r\n            ', '/images/products/samsung-a12.png', 3790000, 1, NULL, NULL),
(4, 'Kỷ Luật Tự Giác', 'TỰ GIÁC BAO NHIÊU, TỰ DO BẤY NHIÊU\r\n            Theo bạn thì, thế nào là tự do?   \r\n                  Là có thể nằm ườn trên ghế sô pha xem phim, ôm điện thoại lướt mạng cả ngày?   \r\n                  Hay là được ăn thoải mái các thể loại đồ ăn nhanh, trà sữa… bất chấp ảnh hưởng của chúng tới sức khỏe?   \r\n                  Trời mưa thì tự cho phép bản thân nghỉ làm, thích đồ gì thì mua luôn đồ nấy, dù cho chưa đến cuối tháng đã hết sạch tiền?   \r\n                  Những điều trên trông thì có vẻ thoải mái thật đấy, nhưng dần dần bạn sẽ nhận ra cuộc sống của mình ngày càng mơ hồ, sợ sệt, bởi bạn không có SỰ LỰA CHỌN. Lãng phí thời gian, tiền bạc vô ích chỉ càng tạo nên sự chậm chạp trong tư duy, bệnh tật cho cơ thể và sự cằn cỗi trong tâm hồn mà thôi.\r\n            ', '/images/products/ky-luat-tu-giac.png', 57120, 1, NULL, NULL),
(5, 'Đừng Chạy Theo Số Đông', 'Nếu tất cả mọi người ai cũng làm chủ doanh nghiệp, thì ai sẽ đi làm thuê?\r\n            Tôi.          \r\n            Bởi lúc đó họ sẽ phải đấu giá để có được tôi.          \r\n            Nhưng điều này không bao giờ xảy ra. Bởi ngay từ trong trứng đến lúc mọc cánh, chúng ta đã được dạy phải làm cho người khác cả đời. Chỉ có 1% được dạy khác.          \r\n            Bạn không chạy theo số đông.          \r\n            Bạn LÀ số đông.          \r\n            Tuy nhiên bạn đừng nhầm lẫn. Cuốn sách này không chỉ nói về vấn đề “làm thuê” hay “làm riêng”. Đây chỉ là một trong những khía cạnh rất nhỏ\r\n            ', '/images/products/dung-chay-theo-so-dong.png', 132700, 1, NULL, NULL),
(6, 'Nồi đất, sứ nắp kính kho thịt, cá, nấu cơm dung tích 1l', 'Nồi dày dặn, chắc chắn, tay cầm liền khối Khả năng chịu nhiệt cao, chất liệu cao cấp không nứt vỡ khi nấu, an toàn cho sức khỏe Giữ được hương vị tươi ngon, chất dinh dưỡng của thực phẩm Giảm thời gian nấu nướng, tiết kiệm đến 20% nhiên liệu Nồi dùng kho cá, thịt, nấu cháo, nấu mỳ cay thì ngon tuyệt luôn\r\n            Nồi dày dặn, chắc chắn, tay cầm liền khối          \r\n            Khả năng chịu nhiệt cao, chất liệu cao cấp không nứt vỡ khi nấu, an toàn cho sức khỏe          \r\n            Giữ được hương vị tươi ngon, chất dinh dưỡng của thực phẩm          \r\n            Giảm thời gian nấu nướng, tiết kiệm đến 20% nhiên liệu          \r\n            Nồi dùng kho cá, thịt, nấu cháo, nấu mỳ cay thì ngon tuyệt luôn\r\n            ', '/images/products/noi-dat.png', 89000, 3, NULL, NULL),
(7, 'Thiết Kế Cuộc Đời Thịnh Vượng - Design a Prosperous Life', 'Anh Thái Phạm, Founder Cộng đồng Happy Live – Đầu tư tài chính và thịnh vượng, nguyên là Giám đốc Marketing của Vinamilk với 13 năm kinh nghiệm trong việc xây dựng thương hiệu, marketing và phát triển kinh doanh. Anh được mọi người biết đến như một nhà đầu tư, một doanh nhân đam mê giáo dục, huấn luyện và viết lách.\r\n            Anh cũng là biên dịch, dịch giả của khá nhiều cuốn sách về đầu tư & marketing bán chạy như: Ngày đòi nợ, Làm giàu từ chứng khoán, Nghệ thuật đầu tư Dhandho, Lột xác để trở thành nhà đầu tư giá trị, Marketing giỏi phải kiếm được tiền, Hệ thống bán hàng đỉnh cao, Nuốt cá lớn…\r\n            ', '/images/products/thiet-ke-cuoc-doi-thinh-vuong.png', 299000, 1, NULL, NULL),
(8, 'Nhà Giả Kim (Tái Bản 2020)', 'Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người.\r\n            Tiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.\r\n            ', '/images/products/nha-gia-kim.png', 79000, 1, NULL, NULL),
(9, 'Giải thích Ngữ pháp tiếng Anh (Tái Bản)', 'Ngữ pháp Tiếng Anh tổng hợp các chủ điểm ngữ pháp trọng yếu mà học sinh cần nắm vững. Các chủ điểm ngữ pháp được trình bày rõ ràng, chi tiết. Sau mỗi chủ điểm ngữ pháp là phần bài tập & đáp án nhằm giúp các em củng cố kiến thức đã học, đồng thời tự kiểm tra kết quả.\r\n            Sách Giải Thích Ngữ Pháp Tiếng Anh, tác Mai Lan Hương – Hà Thanh Uyên, là cuốn sách ngữ pháp đã được phát hành và tái bản rất nhiều lần trong những năm qua.\r\n            ', '/images/products/giai-thich-ngu-phap-tieng-anh.png', 180000, 1, NULL, NULL),
(10, 'CPU i9 9900K (3.60GHz Up to 5.0GHz, 16M) - Hàng Chính Hãng', 'Chủng loại: Core i9 9900K Dòng CPU: Coffee lake refresh Tốc độ: 3.6 GHz up to 5.0 GHz Bus Ram hỗ trợ: DDR4 2666 Nhân CPU: 8 Luồng CPU: 16 Bộ nhớ đệm: 16MB L3 Cache\r\n            CPU i9 9900K (3.60GHz Up to 5.0GHz, 16M) có vi xử lý cao cấp 8 nhân đã đang nhận được sự chú ý vô cùng lớn trong thời gian gần đây. ”Con quái vật nhỏ” này với 8 nhân, 16 luồng và khả năng turbo xung nhịp lên tới 5.0GHz, khi đi đôi với dòng mainboard Z390 mới ra mắt  hứa hẹn đem đến hiệu năng chơi game và làm việc xuất sắc toàn diện.\r\n            ', '/images/products/cpu-core-i9.png', 11900000, 4, NULL, NULL),
(11, 'Tần ô - 1kg', 'Với sản phẩm tươi sống, trọng lượng thực tế có thể chênh lệch khoảng 10%. Công dụng:\r\n            Axit chlorogenic tốt cho quá trình điều hoà lượng mỡ trong cơ thể, chống béo phì\r\n            Chống oxi hoá, cung cấp Kali', '/images/products/tan-o.png', 51000, 2, NULL, NULL),
(12, 'Cà Rốt Đà Lạt Trợ Giá Tận Vườn (1Kg)', 'Xuất xứ: Đà Lạt\r\n            .Vị ngọt, giòn, giàu vitamin A và khoáng chất.\r\n            .Tốt cho mắt, phòng ngừa ung thư và một số bệnh khác.\r\n            .Có tác dụng làm đẹp.\r\n            Dễ dàng chế biến thành nhiều món ăn khác nhau.', '/images/products/ca-rot.png', 30000, 2, NULL, NULL),
(13, 'Đừng Chạy Theo Số Đông', 'Nếu tất cả mọi người ai cũng làm chủ doanh nghiệp, thì ai sẽ đi làm thuê?\r\n            Tôi.        ', '/images/products/noi-dat.png', 496000, 3, NULL, NULL),
(14, 'Cà Rốt Đà Lạt Trợ Giá Tận Vườn (1Kg)', 'Nếu tất cả mọi người ai cũng làm chủ doanh nghiệp, thì ai sẽ đi làm thuê?\r\n            Tôi.        ', '/images/products/noi-dat.png', 50000, 4, NULL, NULL),
(15, 'Cà Rốt Đà Lạt Trợ Giá Tận Vườn (1Kg)', 'Thiết kế ấn tượng với hiệu ứng gradient', '/images/products/thiet-ke-cuoc-doi-thinh-vuong.png', 123000, 2, NULL, NULL),
(16, 'Đừng Chạy Theo Số Đông', 'Ngữ pháp Tiếng Anh tổng hợp các chủ điểm ngữ pháp trọng yếu mà học sinh cần nắm vững. Các chủ điểm ngữ pháp được trình bày rõ ràng, chi tiết. Sau mỗi chủ điểm ngữ pháp là phần bài tập & đáp án nhằm giúp các em củng cố kiến thức đã học, đồng thời tự kiểm tra kết quả.', '/images/products/thiet-ke-cuoc-doi-thinh-vuong.png', 496000, 3, NULL, NULL),
(17, 'Cà Rốt Đà Lạt Trợ Giá Tận Vườn (1Kg)', 'Thiết kế ấn tượng với hiệu ứng gradient', '/images/products/cpu-core-i9.png', 496000, 5, NULL, NULL),
(18, 'CPU i9 9900K (3.60GHz Up to 5.0GHz, 16M) - Hàng Chính Hãng', 'Nếu tất cả mọi người ai cũng làm chủ doanh nghiệp, thì ai sẽ đi làm thuê?\r\n            Tôi.        ', '/images/products/cpu-core-i9.png', 496000, 5, NULL, NULL),
(19, 'CPU i9 9900K (3.60GHz Up to 5.0GHz, 16M) - Hàng Chính Hãng', 'Xuất xứ: Đà Lạt\r\n        .Vị ngọt, giòn, giàu vitamin A và khoáng chất.\r\n        .Tốt cho mắt, phòng ngừa ung thư và một số bệnh khác.\r\n        .Có tác dụng làm đẹp.\r\n        Dễ dàng chế biến thành nhiều món ăn khác nhau.', '/images/products/ca-rot.png', 496000, 5, NULL, NULL),
(20, 'Cà Rốt Đà Lạt Trợ Giá Tận Vườn (1Kg)', 'Thiết kế ấn tượng với hiệu ứng gradient', '/images/products/ca-rot.png', 8000000, 3, NULL, NULL),
(21, 'Cà Rốt Đà Lạt Trợ Giá Tận Vườn (1Kg)', 'Ngữ pháp Tiếng Anh tổng hợp các chủ điểm ngữ pháp trọng yếu mà học sinh cần nắm vững. Các chủ điểm ngữ pháp được trình bày rõ ràng, chi tiết. Sau mỗi chủ điểm ngữ pháp là phần bài tập & đáp án nhằm giúp các em củng cố kiến thức đã học, đồng thời tự kiểm tra kết quả.', '/images/products/thiet-ke-cuoc-doi-thinh-vuong.png', 123000, 3, NULL, NULL),
(22, 'Thiết Kế Cuộc Đời Thịnh Vượng - Design a Prosperous Life', 'Với sản phẩm tươi sống, trọng lượng thực tế có thể chênh lệch khoảng 10%. Công dụng:\r\n            Axit chlorogenic tốt cho quá trình điều hoà lượng mỡ trong cơ thể, chống béo phì\r\n            Chống oxi hoá, cung cấp Kali', '/images/products/giai-thich-ngu-phap-tieng-anh.png', 123000, 5, NULL, NULL),
(23, 'Tần ô - 1kg', 'Xuất xứ: Đà Lạt\r\n        .Vị ngọt, giòn, giàu vitamin A và khoáng chất.\r\n        .Tốt cho mắt, phòng ngừa ung thư và một số bệnh khác.\r\n        .Có tác dụng làm đẹp.\r\n        Dễ dàng chế biến thành nhiều món ăn khác nhau.', '/images/products/noi-dat.png', 88000, 3, NULL, NULL),
(24, 'Thiết Kế Cuộc Đời Thịnh Vượng - Design a Prosperous Life', 'Thiết kế ấn tượng với hiệu ứng gradient', '/images/products/thiet-ke-cuoc-doi-thinh-vuong.png', 50000, 5, NULL, NULL),
(25, 'Thiết Kế Cuộc Đời Thịnh Vượng - Design a Prosperous Life', 'Nếu tất cả mọi người ai cũng làm chủ doanh nghiệp, thì ai sẽ đi làm thuê?\r\n            Tôi.        ', '/images/products/thiet-ke-cuoc-doi-thinh-vuong.png', 496000, 1, NULL, NULL),
(26, 'Thiết Kế Cuộc Đời Thịnh Vượng - Design a Prosperous Life', 'Với sản phẩm tươi sống, trọng lượng thực tế có thể chênh lệch khoảng 10%. Công dụng:\r\n            Axit chlorogenic tốt cho quá trình điều hoà lượng mỡ trong cơ thể, chống béo phì\r\n            Chống oxi hoá, cung cấp Kali', '/images/products/cpu-core-i9.png', 50000, 5, NULL, NULL),
(27, 'CPU i9 9900K (3.60GHz Up to 5.0GHz, 16M) - Hàng Chính Hãng', 'Với sản phẩm tươi sống, trọng lượng thực tế có thể chênh lệch khoảng 10%. Công dụng:\r\n            Axit chlorogenic tốt cho quá trình điều hoà lượng mỡ trong cơ thể, chống béo phì\r\n            Chống oxi hoá, cung cấp Kali', '/images/products/cpu-core-i9.png', 496000, 2, NULL, NULL),
(28, 'Đừng Chạy Theo Số Đông', 'Ngữ pháp Tiếng Anh tổng hợp các chủ điểm ngữ pháp trọng yếu mà học sinh cần nắm vững. Các chủ điểm ngữ pháp được trình bày rõ ràng, chi tiết. Sau mỗi chủ điểm ngữ pháp là phần bài tập & đáp án nhằm giúp các em củng cố kiến thức đã học, đồng thời tự kiểm tra kết quả.', '/images/products/thiet-ke-cuoc-doi-thinh-vuong.png', 88000, 2, NULL, NULL),
(29, 'Cà Rốt Đà Lạt Trợ Giá Tận Vườn (1Kg)', 'Xuất xứ: Đà Lạt\r\n        .Vị ngọt, giòn, giàu vitamin A và khoáng chất.\r\n        .Tốt cho mắt, phòng ngừa ung thư và một số bệnh khác.\r\n        .Có tác dụng làm đẹp.\r\n        Dễ dàng chế biến thành nhiều món ăn khác nhau.', '/images/products/giai-thich-ngu-phap-tieng-anh.png', 88000, 2, NULL, NULL),
(30, 'CPU i9 9900K (3.60GHz Up to 5.0GHz, 16M) - Hàng Chính Hãng', 'Với sản phẩm tươi sống, trọng lượng thực tế có thể chênh lệch khoảng 10%. Công dụng:\r\n            Axit chlorogenic tốt cho quá trình điều hoà lượng mỡ trong cơ thể, chống béo phì\r\n            Chống oxi hoá, cung cấp Kali', '/images/products/thiet-ke-cuoc-doi-thinh-vuong.png', 88000, 2, NULL, NULL),
(31, 'Tần ô - 1kg', 'Với sản phẩm tươi sống, trọng lượng thực tế có thể chênh lệch khoảng 10%. Công dụng:\r\n            Axit chlorogenic tốt cho quá trình điều hoà lượng mỡ trong cơ thể, chống béo phì\r\n            Chống oxi hoá, cung cấp Kali', '/images/products/cpu-core-i9.png', 8000000, 1, NULL, NULL),
(32, 'Cà Rốt Đà Lạt Trợ Giá Tận Vườn (1Kg)', 'Với sản phẩm tươi sống, trọng lượng thực tế có thể chênh lệch khoảng 10%. Công dụng:\r\n            Axit chlorogenic tốt cho quá trình điều hoà lượng mỡ trong cơ thể, chống béo phì\r\n            Chống oxi hoá, cung cấp Kali', '/images/products/thiet-ke-cuoc-doi-thinh-vuong.png', 50000, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hồ sĩ hùng', 'email@gmail.com', NULL, '$2y$10$N0BwvXT1/5ofOR6oOOg4Ouv4qEeepuAnJ.xJ5xacDJOqqb4fyv5xm', NULL, '2021-11-06 01:48:30', '2021-11-06 01:48:30'),
(2, 'hung', 'hung@gmail.com', NULL, '$2y$10$PnvgUZacvOjiYQnWEOfipuzcb1jFuVO9.MLZfSYaOYlgK9Yv9LbB.', NULL, '2021-11-06 02:01:31', '2021-11-06 02:01:31'),
(3, 'hung', 'hung123@gmail.com', NULL, '$2y$10$5BgHLPD2CmmqPfvMbuF2bed754tlsHHdZuUK5Flqp0ONOZMCfvbVy', NULL, '2021-11-08 16:12:35', '2021-11-08 16:12:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
