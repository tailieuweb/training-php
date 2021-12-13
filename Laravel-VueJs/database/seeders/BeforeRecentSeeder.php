<?php

namespace Database\Seeders;

use App\Models\BeforeRecent;
use Illuminate\Database\Seeder;

class BeforeRecentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        BeforeRecent::insert([
            [
                'title' => 'Mercedes-Benz Classic',
                'text' => ' Experience a journey through time in the Mercedes-Benz Museum, fulfill your dream of a Mercedes-Benz classic car or learn more about our brand clubs. ',
                'img1' => 'images/05-mercedes-benz-classic-2560x1440.webp',
                'img2' => '',
            ],
            [
                'title' => '',
                'text' => '',
                'img1' => '',
                'img2' => 'images/06-mercedes-benz-classic-2560x1440.webp',
            ],
        ]);
    }
}