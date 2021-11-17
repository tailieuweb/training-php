<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Điện thoại Vivo Y12s - Hàng Chính Hãng',
            'description' => 'Thiết kế ấn tượng với hiệu ứng gradient
            Vivo Y12s được áp dụng kiểu thiết kế nguyên khối hiện đại, 
            ấn tượng với những hiệu ứng chuyển màu gradient độc đáo, bóng bẩy, nổi bật cho người dùng khi cầm máy trên tay. ',
            'image' => '/images/products/vivo-y12s.png',
            'price' => 4290000,
            'category' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Điện Thoại iPhone 12 Mini 128GB - Hàng Chính Hãng',
            'description' => 'Màn hình Super Retina XDR 5.4 inch2
            Ceramic Shield, chất liệu kính bền chắc nhất từng có trên điện thoại thông minh
            Mạng 5G cho tốc độ tải xuống siêu nhanh, xem video và nghe nhạc trực tuyến chất lượng cao1
            A14 Bionic, chip nhanh nhất từng có trên điện thoại thông minh
            Hệ thống camera kép tiên tiến 12MP với các camera Ultra Wide và Wide; chế độ Ban Đêm, Deep Fusion,
            HDR thông minh thế hệ 3, khả năng quay video HDR Dolby Vision 4K ',
            'image' => '/images/products/iphone-12.png',
            'price' => 16379000,
            'category' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Điện Thoại Samsung Galaxy A12 (4GB/128GB)',
            'description' => 'Thiết kế rắn chắc, quen thuộc
            Samsung Galaxy A12 mang diện mạo thân thuộc của những chiếc Samsung tiền nhiệm. Với thiết kế nguyên khối, lớp vỏ máy được đúc bao quanh thân máy cho cảm giác chắc chắn,
             bền chặt. Phần camera trước được đặt trong notch hình giọt nước giúp tăng diện tích cho màn hình.
            ',
            'image' => '/images/products/samsung-a12.png',
            'price' => 3790000,
            'category' => 1
        ]);
        DB::table('products')->insert([
            'name' => 'Kỷ Luật Tự Giác',
            'description' => 'TỰ GIÁC BAO NHIÊU, TỰ DO BẤY NHIÊU
            Theo bạn thì, thế nào là tự do?   
                  Là có thể nằm ườn trên ghế sô pha xem phim, ôm điện thoại lướt mạng cả ngày?   
                  Hay là được ăn thoải mái các thể loại đồ ăn nhanh, trà sữa… bất chấp ảnh hưởng của chúng tới sức khỏe?   
                  Trời mưa thì tự cho phép bản thân nghỉ làm, thích đồ gì thì mua luôn đồ nấy, dù cho chưa đến cuối tháng đã hết sạch tiền?   
                  Những điều trên trông thì có vẻ thoải mái thật đấy, nhưng dần dần bạn sẽ nhận ra cuộc sống của mình ngày càng mơ hồ, sợ sệt, bởi bạn không có SỰ LỰA CHỌN. Lãng phí thời gian, tiền bạc vô ích chỉ càng tạo nên sự chậm chạp trong tư duy, bệnh tật cho cơ thể và sự cằn cỗi trong tâm hồn mà thôi.
            ',
            'image' => '/images/products/ky-luat-tu-giac.png',
            'price' => 57120,
            'category' => 1
        ]);
        DB::table('products')->insert([
            'name' => 'Đừng Chạy Theo Số Đông',
            'description' => 'Nếu tất cả mọi người ai cũng làm chủ doanh nghiệp, thì ai sẽ đi làm thuê?
            Tôi.          
            Bởi lúc đó họ sẽ phải đấu giá để có được tôi.          
            Nhưng điều này không bao giờ xảy ra. Bởi ngay từ trong trứng đến lúc mọc cánh, chúng ta đã được dạy phải làm cho người khác cả đời. Chỉ có 1% được dạy khác.          
            Bạn không chạy theo số đông.          
            Bạn LÀ số đông.          
            Tuy nhiên bạn đừng nhầm lẫn. Cuốn sách này không chỉ nói về vấn đề “làm thuê” hay “làm riêng”. Đây chỉ là một trong những khía cạnh rất nhỏ
            ',
            'image' => '/images/products/dung-chay-theo-so-dong.png',
            'price' => 132700,
            'category' => 1
        ]);
        DB::table('products')->insert([
            'name' => 'Nồi đất, sứ nắp kính kho thịt, cá, nấu cơm dung tích 1l',
            'description' => 'Nồi dày dặn, chắc chắn, tay cầm liền khối Khả năng chịu nhiệt cao, chất liệu cao cấp không nứt vỡ khi nấu, an toàn cho sức khỏe Giữ được hương vị tươi ngon, chất dinh dưỡng của thực phẩm Giảm thời gian nấu nướng, tiết kiệm đến 20% nhiên liệu Nồi dùng kho cá, thịt, nấu cháo, nấu mỳ cay thì ngon tuyệt luôn
            Nồi dày dặn, chắc chắn, tay cầm liền khối          
            Khả năng chịu nhiệt cao, chất liệu cao cấp không nứt vỡ khi nấu, an toàn cho sức khỏe          
            Giữ được hương vị tươi ngon, chất dinh dưỡng của thực phẩm          
            Giảm thời gian nấu nướng, tiết kiệm đến 20% nhiên liệu          
            Nồi dùng kho cá, thịt, nấu cháo, nấu mỳ cay thì ngon tuyệt luôn
            ',
            'image' => '/images/products/noi-dat.png',
            'price' => 89000,
            'category' => 3
        ]);
        DB::table('products')->insert([
            'name' => 'Thiết Kế Cuộc Đời Thịnh Vượng - Design a Prosperous Life',
            'description' => 'Anh Thái Phạm, Founder Cộng đồng Happy Live – Đầu tư tài chính và thịnh vượng, nguyên là Giám đốc Marketing của Vinamilk với 13 năm kinh nghiệm trong việc xây dựng thương hiệu, marketing và phát triển kinh doanh. Anh được mọi người biết đến như một nhà đầu tư, một doanh nhân đam mê giáo dục, huấn luyện và viết lách.
            Anh cũng là biên dịch, dịch giả của khá nhiều cuốn sách về đầu tư & marketing bán chạy như: Ngày đòi nợ, Làm giàu từ chứng khoán, Nghệ thuật đầu tư Dhandho, Lột xác để trở thành nhà đầu tư giá trị, Marketing giỏi phải kiếm được tiền, Hệ thống bán hàng đỉnh cao, Nuốt cá lớn…
            ',
            'image' => '/images/products/thiet-ke-cuoc-doi-thinh-vuong.png',
            'price' => 299000,
            'category' => 1
        ]);
        DB::table('products')->insert([
            'name' => 'Nhà Giả Kim (Tái Bản 2020)',
            'description' => 'Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người.
            Tiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.
            ',
            'image' => '/images/products/nha-gia-kim.png',
            'price' => 79000,
            'category' => 1
        ]);
        DB::table('products')->insert([
            'name' => 'Giải thích Ngữ pháp tiếng Anh (Tái Bản)',
            'description' => 'Ngữ pháp Tiếng Anh tổng hợp các chủ điểm ngữ pháp trọng yếu mà học sinh cần nắm vững. Các chủ điểm ngữ pháp được trình bày rõ ràng, chi tiết. Sau mỗi chủ điểm ngữ pháp là phần bài tập & đáp án nhằm giúp các em củng cố kiến thức đã học, đồng thời tự kiểm tra kết quả.
            Sách Giải Thích Ngữ Pháp Tiếng Anh, tác Mai Lan Hương – Hà Thanh Uyên, là cuốn sách ngữ pháp đã được phát hành và tái bản rất nhiều lần trong những năm qua.
            ',
            'image' => '/images/products/giai-thich-ngu-phap-tieng-anh.png',
            'price' => 180000,
            'category' => 1
        ]);
        DB::table('products')->insert([
            'name' => 'CPU i9 9900K (3.60GHz Up to 5.0GHz, 16M) - Hàng Chính Hãng',
            'description' => 'Chủng loại: Core i9 9900K Dòng CPU: Coffee lake refresh Tốc độ: 3.6 GHz up to 5.0 GHz Bus Ram hỗ trợ: DDR4 2666 Nhân CPU: 8 Luồng CPU: 16 Bộ nhớ đệm: 16MB L3 Cache
            CPU i9 9900K (3.60GHz Up to 5.0GHz, 16M) có vi xử lý cao cấp 8 nhân đã đang nhận được sự chú ý vô cùng lớn trong thời gian gần đây. ”Con quái vật nhỏ” này với 8 nhân, 16 luồng và khả năng turbo xung nhịp lên tới 5.0GHz, khi đi đôi với dòng mainboard Z390 mới ra mắt  hứa hẹn đem đến hiệu năng chơi game và làm việc xuất sắc toàn diện.
            ',
            'image' => '/images/products/cpu-core-i9.png',
            'price' => 11900000,
            'category' => 4
        ]);
        DB::table('products')->insert([
            'name' => 'Tần ô - 1kg',
            'description' => 'Với sản phẩm tươi sống, trọng lượng thực tế có thể chênh lệch khoảng 10%. Công dụng:
            Axit chlorogenic tốt cho quá trình điều hoà lượng mỡ trong cơ thể, chống béo phì
            Chống oxi hoá, cung cấp Kali',
            'image' => '/images/products/tan-o.png',
            'price' => 51000,
            'category' => 2
        ]);
        DB::table('products')->insert([
            'name' => 'Cà Rốt Đà Lạt Trợ Giá Tận Vườn (1Kg)',
            'description' => 'Xuất xứ: Đà Lạt
            .Vị ngọt, giòn, giàu vitamin A và khoáng chất.
            .Tốt cho mắt, phòng ngừa ung thư và một số bệnh khác.
            .Có tác dụng làm đẹp.
            Dễ dàng chế biến thành nhiều món ăn khác nhau.',
            'image' => '/images/products/ca-rot.png',
            'price' => 30000,
            'category' => 2
        ]);

        $nameArr = ['Cà Rốt Đà Lạt Trợ Giá Tận Vườn (1Kg)', 'Tần ô - 1kg', 'CPU i9 9900K (3.60GHz Up to 5.0GHz, 16M) - Hàng Chính Hãng', 'Thiết Kế Cuộc Đời Thịnh Vượng - Design a Prosperous Life', 'Đừng Chạy Theo Số Đông'];
        $desArr = [
            'Xuất xứ: Đà Lạt
        .Vị ngọt, giòn, giàu vitamin A và khoáng chất.
        .Tốt cho mắt, phòng ngừa ung thư và một số bệnh khác.
        .Có tác dụng làm đẹp.
        Dễ dàng chế biến thành nhiều món ăn khác nhau.',
            'Với sản phẩm tươi sống, trọng lượng thực tế có thể chênh lệch khoảng 10%. Công dụng:
            Axit chlorogenic tốt cho quá trình điều hoà lượng mỡ trong cơ thể, chống béo phì
            Chống oxi hoá, cung cấp Kali',
            'Ngữ pháp Tiếng Anh tổng hợp các chủ điểm ngữ pháp trọng yếu mà học sinh cần nắm vững. Các chủ điểm ngữ pháp được trình bày rõ ràng, chi tiết. Sau mỗi chủ điểm ngữ pháp là phần bài tập & đáp án nhằm giúp các em củng cố kiến thức đã học, đồng thời tự kiểm tra kết quả.',
            'Nếu tất cả mọi người ai cũng làm chủ doanh nghiệp, thì ai sẽ đi làm thuê?
            Tôi.        ',
            'Thiết kế ấn tượng với hiệu ứng gradient'
        ];

        $imageArr = ['/images/products/ca-rot.png', '/images/products/giai-thich-ngu-phap-tieng-anh.png', '/images/products/cpu-core-i9.png', '/images/products/thiet-ke-cuoc-doi-thinh-vuong.png', '/images/products/noi-dat.png'];
        $priceArr = [123000, 50000, 88000, 496000, 8000000];

        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'name' => $nameArr[rand(0, 4)],
                'description' => $desArr[rand(0, 4)],
                'image' => $imageArr[rand(0, 4)],
                'price' => $priceArr[rand(0, 4)],
                'category' => rand(1, 5)
            ]);
        }
    }
}
