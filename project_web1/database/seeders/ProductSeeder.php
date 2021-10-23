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
            'image' => '/images/products/vivo.jpg.webp',
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
            'image' => '/images/products/iphone.jpg.webp',
            'price' => 16379000,
            'category' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Điện Thoại Samsung Galaxy A12 (4GB/128GB)',
            'description' => 'Thiết kế rắn chắc, quen thuộc
            Samsung Galaxy A12 mang diện mạo thân thuộc của những chiếc Samsung tiền nhiệm. Với thiết kế nguyên khối, lớp vỏ máy được đúc bao quanh thân máy cho cảm giác chắc chắn,
             bền chặt. Phần camera trước được đặt trong notch hình giọt nước giúp tăng diện tích cho màn hình.
            ',
            'image' => '/images/products/samsung.jpg.webp',
            'price' => 3790000,
            'category' => 1
        ]);
    }
}
