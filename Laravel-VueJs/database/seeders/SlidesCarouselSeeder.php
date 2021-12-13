<?php

namespace Database\Seeders;

use App\Models\SlidesCarousel;
use Illuminate\Database\Seeder;

class SlidesCarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SlidesCarousel::insert([
            [
                'active' => 'active',
                'image' => 'images/01-mercedes-benz-classic-magazine-south-american-adventure-2560x1440.webp',
            ],
            [
                'active' => '',
                'image' => 'images/01-mercedes-benz-classic-history-c-126-2560x1440.webp',
            ],
            [
                'active' => '',
                'image' => 'images/01-mercedes-benz-classic-sl-special-2560x1440.webp',
            ],
            [
                'active' => '',
                'image' => 'images/01-classic-serviceparts-header-2560x1440.webp',
            ],
            [
                'active' => '',
                'image' => 'images/01-mercedes-benz-classic-center-expertise-2560x1440.webp',
            ],
            [
                'active' => '',
                'image' => 'images/01-mercedes-benz-museum-rudolf-caracciola-2560x1440.webp',
            ],
        ]);
    }
}