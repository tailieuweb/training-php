<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Sách', 'Rau củ', 'Cây cảnh', 'Thiết bị máy tính, laptop', 'Điện thoại'];

        foreach ($arr as $category) {
            DB::table('categories')->insert([
                'name' => $category,
            ]);
        }
    }
}
