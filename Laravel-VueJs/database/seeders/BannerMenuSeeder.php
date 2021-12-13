<?php

namespace Database\Seeders;

use App\Models\BannerMuseum;
use Illuminate\Database\Seeder;

class BannerMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BannerMuseum::insert([
            [
                'menu_name' => 'Mercedes-Benz Classic',
                'active' => 'active',
                'banner_img' => 'images/01-mercedes-benz-classic-history-c-126-2560x1440.webp',
            ],
            [
                'menu_name' => 'Museum',
                'active' => '',
                'banner_img' => '',
            ],
            [
                'menu_name' => 'History',
                'active' => '',
                'banner_img' => '',
            ],
            [
                'menu_name' => 'Classis Center',
                'active' => '',
                'banner_img' => '',
            ],
            [
                'menu_name' => 'Classic spare parts ',
                'active' => '',
                'banner_img' => '',
            ],
            [
                'menu_name' => ' Brand Clubs ',
                'active' => '',
                'banner_img' => '',
            ],
            [
                'menu_name' => ' Magazine',
                'active' => '',
                'banner_img' => '',
            ],
        ]);
    }
}