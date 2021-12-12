<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(Slide::class);
        $this->call(Type::class);
        $this->call(Protype::class);
        $this->call(Manufacture::class);
        $this->call(Product::class);
        $this->call(Size::class);
        $this->call(Product_Size::class);
        $this->call(Account::class);
        $this->call(Person::class);
        $this->call(Admin::class);
        $this->call(Customer::class);
    }
}
//class slide
class Slide extends Seeder {
    public function run() {
        DB::table('slides')->insert([
            ['slide_image'=>'banner-01.jpg'],
            ['slide_image'=>'banner-02.jpg'],
            ['slide_image'=>'banner-03.jpg']
        ]);
    }
}
//class types
class Type extends Seeder {
    public function run() {
        DB::table('types')->insert([
            ['type_name'=>'top'],
            ['type_name'=>'bottom'],
            ['type_name'=>'accessories']
        ]);
    }
}
//class pro_type
class Protype extends Seeder {
    public function run() {
        DB::table('protypes')->insert([
            ['type_id'=> 1,'protype_name'=>'Shirts','protype_image' => 'shirt-img.jpg'],
            ['type_id'=> 1,'protype_name'=>'T-Shirts','protype_image' => 't-shirts-img.jpg'],
            ['type_id'=> 1,'protype_name'=>'Hot','protype_image' => 'shoes-img.jpg'],
            ['type_id'=> 2,'protype_name'=>'Shoes','protype_image' => 'shoes-img.jpg'],
            ['type_id'=> 3,'protype_name'=>'Wallets','protype_image' => 'wallet-img.jpg']
        ]);
    }
}
//class manufactures
class Manufacture extends Seeder {
    public function run() {
        DB::table('manufactures')->insert([
            ['manu_name'=>'Supreme'],
            ['manu_name'=>'Adidas'],
            ['manu_name'=>'Nike']
        ]);
    }
}
//class product
class Product extends Seeder {
    public function run() {
        DB::table('products')->insert([
            ['manu_id'=>1,'protype_id'=>1,'name'=>'Áo Khoác Đen','pro_image'=>'img-pro-01.jpg','origin'=>'VietNam','price'=>400000,'promotion_price'=>300000,
            'description'=>'Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.','feature'=>0],
            ['manu_id'=>2,'protype_id'=>1,'name'=>'Váy đen','pro_image'=>'img-pro-02.jpg','origin'=>'USA','price'=>520000,'promotion_price'=>400000,
            'description'=>'Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.','feature'=>1],
            ['manu_id'=>2,'protype_id'=>5,'name'=>'Túi xách nữ','pro_image'=>'img-pro-03.jpg','origin'=>'Malaysia','price'=>632000,'promotion_price'=>510000,
            'description'=>'Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.','feature'=>1],
            ['manu_id'=>3,'protype_id'=>5,'name'=>'Đồng hồ rolex','pro_image'=>'img-pro-04.jpg','origin'=>'Switzerland','price'=>1500000,'promotion_price'=>0,
            'description'=>'Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.','feature'=>0],
            ['manu_id'=>2,'protype_id'=>5,'name'=>'Đồng hồ rolex','pro_image'=>'img-pro-04.jpg','origin'=>'Switzerland','price'=>1500000,'promotion_price'=>0,
            'description'=>'Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.','feature'=>0],
            ['manu_id'=>1,'protype_id'=>5,'name'=>'Đồng hồ rolex 1','pro_image'=>'img-pro-04.jpg','origin'=>'Switzerland','price'=>1500000,'promotion_price'=>0,
            'description'=>'Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.','feature'=>0],
            ['manu_id'=>1,'protype_id'=>'5','name'=>'Đồng hồ rolex 2','pro_image'=>'img-pro-04.jpg','origin'=>'Switzerland','price'=>1500000,'promotion_price'=>0,
            'description'=>'Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.','feature'=>0],
            ['manu_id'=>3,'protype_id'=>5,'name'=>'Đồng hồ rolex 3','pro_image'=>'img-pro-04.jpg','origin'=>'Switzerland','price'=>1500000,'promotion_price'=>0,
            'description'=>'Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.','feature'=>0]
        ]);
    }
}
//class size
class Size extends Seeder {
    public function run() {
        DB::table('sizes')->insert([
            ['name'=>'S'],
            ['name'=>'M'],
            ['name'=>'L'],
            ['name'=>'XL'],
            ['name'=>'XXL'],
            ['name'=>'3XL'],
            ['name'=>'4XL']
        ]);
    }
}
//class product_size
class Product_Size extends Seeder {
    public function run() {
        DB::table('products_sizes')->insert([
            ['pro_id'=> 1,'size_id'=> 1],
            ['pro_id'=> 1,'size_id'=> 2],
            ['pro_id'=> 1,'size_id'=> 3],
            ['pro_id'=> 1,'size_id'=> 4],
            ['pro_id'=> 1,'size_id'=> 5],
            ['pro_id'=> 2,'size_id'=> 1],
            ['pro_id'=> 2,'size_id'=> 2],
            ['pro_id'=> 3,'size_id'=> 1],
            ['pro_id'=> 3,'size_id'=> 2],
            ['pro_id'=> 3,'size_id'=> 3],
            ['pro_id'=> 3,'size_id'=> 4],
            ['pro_id'=> 3,'size_id'=> 5],
            ['pro_id'=> 3,'size_id'=> 6],
            ['pro_id'=> 3,'size_id'=> 7],
            ['pro_id'=> 4,'size_id'=> 1],
            ['pro_id'=> 4,'size_id'=> 2],
            ['pro_id'=> 4,'size_id'=> 3],
            ['pro_id'=> 4,'size_id'=> 4],
            ['pro_id'=> 4,'size_id'=> 5],
            ['pro_id'=> 4,'size_id'=> 6],
            ['pro_id'=> 5,'size_id'=> 1],
            ['pro_id'=> 5,'size_id'=> 2],
            ['pro_id'=> 5,'size_id'=> 3],
            ['pro_id'=> 5,'size_id'=> 4],
            ['pro_id'=> 5,'size_id'=> 5],
            ['pro_id'=> 5,'size_id'=> 6],
            ['pro_id'=> 6,'size_id'=> 1],
            ['pro_id'=> 6,'size_id'=> 2],
            ['pro_id'=> 6,'size_id'=> 3],
            ['pro_id'=> 6,'size_id'=> 4],
            ['pro_id'=> 6,'size_id'=> 5],
            ['pro_id'=> 6,'size_id'=> 6],
            ['pro_id'=> 7,'size_id'=> 1],
            ['pro_id'=> 7,'size_id'=> 2],
            ['pro_id'=> 7,'size_id'=> 3],
            ['pro_id'=> 7,'size_id'=> 4],
            ['pro_id'=> 7,'size_id'=> 5],
            ['pro_id'=> 7,'size_id'=> 6],
            ['pro_id'=> 8,'size_id'=> 1],
            ['pro_id'=> 8,'size_id'=> 2],
            ['pro_id'=> 8,'size_id'=> 3],
            ['pro_id'=> 8,'size_id'=> 4],
            ['pro_id'=> 8,'size_id'=> 5],
            ['pro_id'=> 8,'size_id'=> 6]
        ]);
    }
}
//class accounts
class Account extends Seeder {
    public function run() {
        DB::table('accounts')->insert([
            ['user_name'=>'thang1234','password'=>'$2y$10$wTLIc9H2fmYcfz8mccHsHOWHRaQUHZULQhBRBshFZ0HXDZ2jFNWW6','role'=>'customer'],
            ['user_name'=>'manager1','password'=>'$2y$10$wTLIc9H2fmYcfz8mccHsHOWHRaQUHZULQhBRBshFZ0HXDZ2jFNWW6','role'=>'admin'],
            ['user_name'=>'admin1','password'=>'$2y$10$wTLIc9H2fmYcfz8mccHsHOWHRaQUHZULQhBRBshFZ0HXDZ2jFNWW6','role'=>'admin'],
        ]);
    }
}
//class person
class Person extends Seeder {
    public function run() {
        DB::table('persons')->insert([
            ['account_id'=>'1','full_name'=>'Nguyễn Hữu Thắng','gender'=>'Male','address'=>'K3, Tân Hiệp, Kiên Giang','date_of_birth'=>Carbon::create('2000', '01', '01'),'phone'=>'0844370344','email'=>'nguyenhuuthang12c8@gmail.com'],
            ['account_id'=>'2','full_name'=>'Thắng Nguyễn','gender'=>'Male','address'=>'Thủ Đức','date_of_birth'=>Carbon::create('2005', '01', '01'),'phone'=>'0844370255','email'=>'nguyenhuuthang1609@gmail.com'],
            ['account_id'=>'3','full_name'=>'Phan Ngọc Luân','gender'=>'Male','address'=>'Vũng Tàu','date_of_birth'=>Carbon::create('2009', '01', '01'),'phone'=>'0123456789','email'=>'nguyenhuuthang12c4@gmail.com'],
        ]);
    }
}
//class admins
class Admin extends Seeder {
    public function run() {
        DB::table('admins')->insert([
            ['person_id'=>'2','role_admin'=>'manager'],
            ['person_id'=>'3','role_admin'=>'editer'],
        ]);
    }
}
//class customers
class Customer extends Seeder {
    public function run() {
        DB::table('customers')->insert([
            ['person_id'=>'1','type'=>'normal','status' => 1, 'token' => '6PPD1ON1RE'],
        ]);
    }
}

