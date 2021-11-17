-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 06, 2021 lúc 11:14 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom5`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Samsung'),
(2, 'LG\r\n'),
(3, 'Panasonic'),
(4, 'Sony'),
(5, 'Daikin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manu_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `pro_image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ID`, `name`, `manu_id`, `type_id`, `price`, `pro_image`, `description`, `feature`, `created_at`) VALUES
(1, 'Android Tivi Sony 4K 55 inch KD-55X7500H', 4, 1, 17400000, 'sony-kd.jpg', 'Android Tivi Sony 4K 55 inch KD-55X7500H sở hữu thiết kế đơn giản có khung viền màu đen sang trọng kết hợp cùng chân đế giống hình chữ V úp ngược giúp tivi đứng vững trên các bề mặt phẳng, cho bạn tùy ý bố trí ở bất cứ đâu bạn thích. Đây không chỉ là tivi mà còn là một món nội thất tương thích với những không gian sống hiện đại của tất cả mọi người.', 0, '2021-10-06 02:44:41'),
(2, 'Smart Tivi Sony 43 inch KDL-43W660G', 4, 1, 10900000, 'tivi-sony-kdl.jpg', 'Smart Tivi Sony 43 inch 43W660G sở hữu thiết kế đẹp mắt, đường nét tinh tế, mang đến phong cách sống hiện đại vào gian phòng của bạn.Kích thước tivi 43 inch  phù hợp với những không gian như: Phòng ngủ, phòng ăn hoặc phòng khách với diện tích nhỏ. Ngoài ra, với chân đế kim loại dạng chữ V tập trung trọng tâm tivi, nâng cao khả năng trụ vững của tivi trên nhiều dạng bề mặt phẳng khác nhau.', 1, '2021-10-06 02:44:50'),
(3, 'Android Tivi Sony 4K 55 inch XR-55X90J\r\n\r\n\r\n\r\n', 4, 1, 2990000, 'sony-xr-55x90.jpg', 'Nâng cao chất lượng hình ảnh và âm thanh thông minh cùng bộ xử lý trí tuệ nhận thức Cognitive Processor XR\r\nĐể nắm bắt tiêu điểm như mắt người nhìn, Cognitive Processor XR thực hiện quá trình quét tinh vi, phát hiện và dự đoán vị trí tiêu điểm trong hình ảnh, phân tích chéo các yếu tố, lấy nét, tăng cường độ sáng, độ tương phản, màu sắc để hình ảnh xuất hiện trước mắt người xem chân thật, ấn tượng nhất. ', 0, '2021-10-06 03:51:41'),
(4, 'Smart Tivi Sony 32 inch KDL-32W600D', 4, 1, 6590000, 'tivi-sony-kdl-32w600d-2.jpg', 'Tivi Sony HD hình ảnh sắc nét với độ phân giải HD cùng công nghệ độc quyền X-Reality PRO. Vi xử lý thông minh trang bị trên tivi Sony hỗ trợ giảm nhiễu, cải thiện độ tương phản đậm nhạt trong hình ảnh giúp tái tạo hình ảnh một cách chuẩn xác và trung thực nhất. ', 0, '2021-10-06 03:51:41'),
(5, 'Smart Tivi Samsung 32 inch UA32T4500\r\n\r\n', 1, 1, 8000000, 'samsung-ua32t4500.jpg', 'Smart Tivi Samsung 32 inch UA32T4500 gây ấn tượng mạnh với viền và chân đế màu đen tuyền cuốn hút, mạnh mẽ. Kích cỡ tivi Samsung 32 inch nhỏ gọn, bố trí hài hòa trong các không gian có diện tích vừa và nhỏ như: phòng khách, phòng ngủ, phòng làm việc...', 0, '2021-10-06 03:51:41'),
(6, 'Smart Tivi QLED 4K 65 inch Samsung QA65Q70A', 1, 1, 31490000, 'ss-tv-led-65.jpg', 'Smart Tivi QLED 4K 65 inch Samsung QA65Q70A được thiết kế đường viền thanh mảnh và tinh tế hầu như khó nhận biết tạo cảm giác không viền 4 cạnh cho bạn có được trải nghiệm xem tuyệt vời nhất từ mọi góc nhìn.', 0, '2021-10-06 03:51:41'),
(7, 'Smart Tivi Neo QLED 4K 55 inch Samsung QA55QN85A', 1, 1, 36490000, 'ss-neo-led.jpg', 'Smart Tivi Neo QLED 4K 55 inch Samsung QA55QN85A sở hữu kiểu dáng tối giản, sang trọng, màn hình không viền 4 cạnh mang đến tầm nhìn rộng mở, cho bạn đắm chìm vào nội dung hiển thị trong từng khoảnh khắc.', 0, '2021-10-06 03:51:41'),
(8, 'Smart Tivi LG 4K 55 inch 55UP7550PTC', 2, 1, 18400000, 'lg-4k-55.jpg', 'Smart tivi LG 4K 55 inch 55UP7550PTC được thiết kế với kiểu dáng vô cùng đơn giản nhưng không kém phần sang trọng.\r\nTivi LG 55 inch góp phần tạo điểm nhấn cho không gian nơi bạn trưng bày nên tinh tế và thu hút dù là phòng khách hay phòng ngủ hoặc bất cứ nơi nào bạn muốn đặt tivi.', 0, '2021-10-06 03:51:41'),
(9, 'Smart Tivi NanoCell LG 4K 55 inch 55NANO86TPA\r\n\r\n', 2, 1, 24400000, 'lg-nanoCell.jpg', 'Tương thích:	AndroidWindowsiOS (iPhone)\r\nCổng sạc:	Type-C\r\nThời gian sử dụng:	4 giờ\r\nThời gian sạc đầy:	1 giờ\r\nKết nối cùng lúc:	1 thiết bị\r\nPhím điều khiển:	Mic thoạiNghe/nhận cuộc gọiPhát/dừng chơi nhạc\r\nTrọng lượng:	120g\r\nThương hiệu của:	Trung Quốc\r\nSản xuất tại:	Trung Quốc', 0, '2021-10-06 03:51:41'),
(10, 'Tủ lạnh Panasonic Inverter 322 lít NR-BC360QKVN', 3, 4, 13590000, 'tu-lanh-panasonic-nr-bc360qkvn-2-org.jpg', 'Tủ lạnh Panasonic Inverter 322 lít NR-BC360QKVN trang bị ngăn đông mềm thế hệ mới Prime Fresh+ với mức nhiệt độ ở -3 độ C giúp thực phẩm tươi sống được làm đông nhanh mà không bị đông đá và tươi mới lên đến 7 ngày. Do đó, thực phẩm giữ được các chất dinh dưỡng, độ thơm ngon và bạn không phải tốn thêm nhiều thời gian để rã đông trước khi chế biến.', 1, '2021-10-06 03:04:17'),
(11, 'Tủ lạnh Panasonic Inverter 255 lít NR-BV280QSVN', 3, 4, 11490000, 'tu-lanh-panasonic-nr-bv280qsvn-2-org.jpg', 'Tủ lạnh Panasonic Inverter 255 lít NR-BV280QSVN trang bị ngăn đông mềm thế hệ mới Prime Fresh+ với mức nhiệt độ ở -3 độ C giúp thực phẩm tươi sống được làm đông nhanh hơn và tươi mới lên đến 7 ngày mà không bị đông đá. Nhờ vậy, thực phẩm giữ được các chất dinh dưỡng, độ thơm ngon, đồng thời bạn không phải tốn thêm nhiều thời gian để rã đông trước khi chế biến.', 0, '2021-10-06 03:51:41'),
(12, 'Tủ lạnh Panasonic Inverter 306 lít NR-TV341VGMV', 3, 4, 12090000, 'panasonic-nr-tv341vgmv-3-1-org.jpg', 'Tủ lạnh Panasonic Inverter 306 lít NR-TV341VGMV được trang bị công nghệ Blue Ag+, sử dụng ánh sáng xanh kích hoạt tinh thể bạc Ag+, giúp diệt tới 99,99% vi khuẩn trên toàn bộ ngăn mát tủ lạnh, giúp thực phẩm luôn tươi ngon và giữ trọn vẹn dinh dưỡng.', 0, '2021-10-06 03:51:41'),
(13, 'Máy giặt Panasonic Inverter NA-V90FX1LVT', 3, 3, 13590000, 'panasonic-na-v90fx1lvt-3-2-org.jpg', 'Loại bỏ vi khuẩn, bảo vệ sợi vải tối ưu bằng giặt lạnh UV Blue Ag+ \r\nNhờ sự kết hợp tinh thể bạc Blue Ag+ và tia UV, máy giặt Panasonic Inverter NA-V90FX1LVT mang lại hiệu quả diệt khuẩn vượt trội 99,99% mà không dùng đến nước nóng, giúp tiết kiệm năng lượng và không làm ảnh hưởng đến chất lượng màu và độ co dãn của quần áo.', 0, '2021-10-06 03:51:41'),
(14, 'Máy giặt Panasonic Inverter 10.5 Kg NA-FD10AR1BV', 3, 3, 10590000, 'panasonic-na-fd10ar1bv-3-2-org.jpg', 'Giặt sạch các vết bẩn cứng đầu dễ dàng với tính năng giặt chuyên biệt Stainmaster\r\nMáy giặt Panasonic Inverter 10.5 Kg NA-FD10AR1BV sở hữu tính năng giặt Stainmaster, giúp giặt sạch các vết bẩn cứng đầu và tăng cường hiệu quả giặt sạch quần áo tốt hơn.\r\n', 1, '2021-10-06 09:35:50'),
(15, 'Máy giặt Panasonic Inverter 10 Kg NA-V10FX1LVT', 3, 3, 14890000, 'panasonic-na-v10fx1lvt-3-3-org.jpg', 'Máy giặt Panasonic Inverter 10 Kg NA-V10FX1LVT trang bị công nghệ giặt lạnh UV Blue Ag+ mang lại hiệu quả diệt khuẩn vượt trội nhờ sự kết hợp tinh thể bạc Blue Ag+ và tia UV, nhằm loại bỏ đến 99.9 % vi khuẩn mà không cần dùng nước nóng, giúp tiết kiệm năng lượng và không ảnh hưởng đến chất lượng màu và độ co dãn của sợi vải.\r\n', 0, '2021-10-06 03:51:41'),
(16, 'Máy lạnh Panasonic Inverter 1 HP CU/CS-PU9WKH-8M', 3, 2, 10590000, 'panasonic-cu-cs-pu9wkh-8m-1-1-org.jpg', 'Bầu không khí trong lành, sạch bụi bẩn, bụi mịn PM2.5 cùng công nghệ Nanoe-G\r\nNanoe-G giải phóng các ion âm xung quanh máy lạnh. Các ion này sẽ gắn kết với các hạt bụi theo dòng không khí vào trong ống nạp khí của máy lạnh. Sau đó, các hạt bụi tích điện âm này bị màng lọc tích điện dương giữ lại và vô hiệu hóa tại màng lọc, giúp không khí sạch bụi bẩn, bụi mịn PM2.5, đảm bảo an toàn sức khoẻ cho gia đình bạn.', 1, '2021-10-06 03:51:41'),
(17, 'Máy lạnh Panasonic Inverter 1.5 HP CU/CS-PU12WKH-8M', 3, 2, 12890000, 'panasonic-cu-cs-pu12wkh-8m-1-1-org.jpg', 'Bầu không khí trong lành, sạch bụi bẩn, bụi mịn PM2.5 cùng công nghệ Nanoe-G\r\nNanoe-G giải phóng các ion âm xung quanh máy lạnh. Các ion này sẽ gắn kết với các hạt bụi theo dòng không khí vào trong ống nạp khí của máy lạnh. Sau đó, các hạt bụi tích điện âm này bị màng lọc tích điện dương giữ lại và vô hiệu hóa tại màng lọc, giúp không khí sạch bụi bẩn, bụi mịn PM2.5, đảm bảo an toàn sức khoẻ cho gia đình bạn.', 0, '2021-10-06 03:51:41'),
(18, 'Tủ lạnh LG Inverter 315 lít GN-M315BL', 2, 4, 8990000, 'tu-lanh-lg-gn-m315bl-1-org.jpg', 'Tủ lạnh LG Inverter 315 lít GN-M315BL mang gam màu đen thời thượng, kết hợp cùng thiết kế tay nắm ẩn tạo sự đồng nhất sang trọng, tủ lạnh hứa hẹn sẽ trở thành điểm nhấn nổi bật cho không gian nội thất của gia đình.', 0, '2021-10-06 03:51:41'),
(19, 'Tủ lạnh LG Inverter 315 lít GN-D315BL', 2, 4, 2599000, 'lg-gn-d315bl-1-org.jpg', 'Tủ lạnh LG Inverter 315 lít GN-D315BL là dòng tủ lạnh ngăn đá trên đời mới của LG, sở hữu thiết kế nhỏ gọn, cùng thiết kế khá đơn giản không quá nhiều chi tiết phía trước, nhưng vẫn toát lên vẻ sang trọng với tay cần thiết kế dạng ẩn, cùng tông màu cá tính phù hợp với mọi không gian nội thất nhà bạn.', 0, '2021-10-06 03:51:41'),
(20, 'Tủ lạnh LG Inverter 393 lít GN-M422PS', 2, 4, 10490000, 'tu-lanh-lg-gn-m422ps-1-org.jpg', 'Tủ lạnh LG Inverter 393 lít GN-M422PS mang tông màu xám nhẹ thanh lịch, cùng kiểu dáng 2 cửa ngăn đá trên truyền thống sẽ là một sự lựa chọn phù hợp cho những vị gia chủ yêu thích vẻ đẹp đơn giản nhưng không kém phần tinh tế, sang trọng.', 0, '2021-10-06 03:51:41'),
(21, 'Máy giặt LG Inverter 9 kg FV1409S2V', 2, 3, 11990000, 'may-giat-lg-fv1409s2v-1-1-org.jpg', 'Động cơ truyền động trực tiếp tích hợp trí thông minh nhân tạo AI giúp máy giặt giảm thiểu rung lắc, ngăn chặn tiếng ồn trong quá trình giặt trả lại không gian yên tĩnh cho gia đình bạn. Các cảm biến số và trí tuệ nhân tạo AI sẽ phân tích khối lượng quần áo và độ mềm của vải từ đó đưa ra chuyển động giặt phù hợp, giúp bảo vệ quần áo của bạn tốt hơn.', 0, '2021-10-06 08:43:56'),
(22, 'Máy giặt LG Inverter 11 kg TH2111DSAB ', 2, 3, 9590000, 'lg-th2111dsab-1-4-org.jpg', 'Máy giặt LG truyền động trực tiếp được trang bị động cơ ngay dưới lồng giặt nên sẽ giúp máy tiêu tốn ít điện năng hơn, hạn chế rung lắc và vận hành êm hơn so với các máy giặt truyền động gián tiếp. Ngoài ra, máy cũng trang bị công nghệ Inverter, gia tăng khả năng tiết kiệm điện và vận hành bền bỉ.\r\n\r\n', 0, '2021-10-06 03:51:41'),
(23, 'Máy giặt LG Inverter 10.5 kg FV1450S3W', 2, 3, 10990000, 'lg-fv1450s3w-1-2-org.jpg', 'Máy giặt LG Inverter 10.5 kg FV1450S3W được thiết kế theo phong cách châu Âu của kiểu máy giặt lồng ngang. Đồng thời, thiết bị giặt này còn được khoác bên ngoài bởi lớp áo trắng – gam màu thể hiện sự tinh tế cùng với chất liệu nắp máy làm bằng kính chịu lực, càng làm tôn lên vẻ đẹp vốn có của mẫu máy giặt LG.  ', 0, '2021-10-06 03:51:41'),
(24, 'LG Inverter 8 kg T2108VSPM2', 2, 3, 499000, 'may-giat-lg-t2108vspm2-1-org.jpg', 'LG Inverter 8 kg T2108VSPM2 thuộc kiểu máy giặt cửa trên, sở hữu gam màu trung tính cùng với những đường nét thể hiện mạnh mẽ, ắt hẳn sẽ trở thành nội thất hiện đại trong không gian nhà bạn.', 1, '2021-10-06 08:50:52'),
(25, 'Tủ lạnh Samsung Inverter 299 lít RT29K5532BY/SV', 1, 4, 10490000, 'samsung-rt29k5532by-sv-1-1-org.jpg', 'Tủ lạnh Samsung Inverter 299 lít RT29K5532BY/SV được trang bị công nghệ Digital Inverter hiện đại vừa tiết kiệm điện năng tiêu thụ, vừa đảm bảo duy trì độ lạnh thích hợp, hoạt động êm ái và bền bỉ.', 1, '2021-10-06 03:51:41'),
(26, 'Tủ lạnh Samsung RT19M300BGS/S', 1, 4, 5990000, 'samsung-rt19m300bgs-sv-1-org.jpg', 'Bao quát bởi tông màu xám bạc cực kỳ sang trọng, tủ lạnh Samsung RT19M300BGS/SV sẽ góp phần mang đến vẻ đẹp hiện đại cho bất kỳ không gian nội thất nào.', 1, '2021-10-06 03:39:00'),
(27, 'Tủ lạnh Samsung Inverter 360 lít RT35K5982BS/SV', 1, 4, 15090000, 'tu-lanh-samsung-rt35k5982bs-sv-1-1-org.jpg', 'Tủ lạnh Samsung Inverter 360 lít RT35K5982BS/SV là sản phẩm được ra mắt trong năm 2018 với thiết kế ngăn đá trên và ngăn lạnh bên dưới khá quen thuộc với thị trường Việt Nam, sản phẩm phủ lên mình tông màu đen, kết hợp với các đường nét trên thân tủ lạnh tạo nên sự cứng cáp, dễ dàng hòa nhập với không gian nội thất của ngôi nhà bạn.', 0, '2021-10-06 03:39:00'),
(28, 'Tủ lạnh Samsung Inverter RB27N4190BU/SV', 1, 4, 12790000, 'ss-tl-276l.jpg', 'Tủ lạnh Samsung Inverter RB27N4190BU/SV, giảm mùi tanh của thịt cá, kháng khuẩn và nấm mốc có hại nhờ vào bộ lọc than hoạt tính Deodorizer giúp các luồng không khí luôn sạch sẽ trong lành, đảm bảo chất lượng của thực phẩm, loại bỏ sự ám mùi.', 0, '2021-10-06 03:39:00'),
(29, 'Tủ lạnh Samsung Inverter 424 lít RL4034SBAS8/SV', 1, 4, 13180000, 'tu-lanh-samsung-rl4034sbas8-sv-1-1-org.jpg', 'Tủ lạnh Samsung Inverter 424 lít RL4034SBAS8/SV mang thiết kế đậm chất châu Âu cùng kiểu dáng ngăn đá dưới hiện đại sẽ làm bừng sáng lên vẻ đẹp sang trọng, đẳng cấp cho gian bếp của gia đình bạn.', 1, '2021-10-06 03:39:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'TV'),
(2, 'Máy Lạnh'),
(3, 'Máy Giặt'),
(4, 'Tủ Lạnh'),
(5, 'Quạt Điều Hòa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`, `role`) VALUES
(1, 'phuc', '$2y$10$4HghPfU9bqLC0gDU08zIVOOkPyQew/FZavXikuTwaYa7OhzsAL9F2', 0),
(4, 'admin', '$2y$10$tC2zAPlAC/NLIW006eGL1OgqDhhSWzERizjuWX546q6haMER/atdS', 1),
(5, 'admin1', 'admin1', 1),
(20, 'sang', '$2y$10$nDb2li7jH38tl/NzmZYuceTdJ956u7pX9YhwyNERlrBTisj0gv2Na', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
