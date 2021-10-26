<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'name' => "Hồ Viết Long",
            'email' => "admin@gmail.com",
            'password' => Hash::make('admin'),
        ]);
    }
}
