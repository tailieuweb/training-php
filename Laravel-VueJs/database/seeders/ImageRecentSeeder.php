<?php

namespace Database\Seeders;

use App\Models\ImageRecent;
use Illuminate\Database\Seeder;

class ImageRecentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ImageRecent::insert([
            [
                'img' => 'images/01-mercedes-benz-classic-magazine-it-must-be-love-2560x1440.webp',
                'text' => 'It must be love. More and more young people are driving and celebrating Mercedes-Benz classics. A journey through a very colourful, passionate scene..',
            ],
            [
                'img' => 'images/01-mercedes-benz-classic-magazine-dad-route-2560x1440.webp',
                'text' => 'On the “Dad Route”: A success story. With hard work and luck, dreams can come true. Danny Lucas believed it and wrote his own success story.',
            ],
            [
                'img' => 'images/01-mercedes-benz-history-in-orbit-for-100-years-2560x1440.webp',
                'text' => 'In orbit for 100 years. The Mercedes star in the ring turns 100: the trademark was registered by the Daimler-Motoren-Gesellschaft i...',
            ],
            [
                'img' => 'images/01-mercedes-benz-classic-magazine-south-american-adventure-2560x1440.webp',
                'text' => 'South American adventure. After a year of pandemic, Kevin and Lars see their Mercedes-Benz 300 TE left behind in the jungle again.',
            ],
            [
                'img' => 'images/03-mercedes-benz-classic-2560x1440.webp',
                'text' => 'The epic SEC. Born in 1981: the SEC Coupés of the 126 model series.',
            ],
            [
                'img' => 'images/01-mercedes-benz-classic-sl-special-2560x1440.webp',
                'text' => 'The Mercedes-Benz SL. There is no end to the fascination of the Mercedes-Benz SL: each generation is a chapter in this tradition ...',
            ],
            [
                'img' => 'images/01-classic-serviceparts-header-2560x1440.webp',
                'text' => 'Classic spare parts. Mercedes-Benz Classic offers genuine spare parts of the highest quality for the preservation of your classi...',
            ],
            [
                'img' => 'images/01-mercedes-benz-classic-center-expertise-2560x1440.webp',
                'text' => 'Manufacturer’s expert assessment. The unique confirmation of the originality of your classic: reliable, transparent, from Mercedes-Benz Class...',
            ],
            [
                'img' => 'images/01-mercedes-benz-museum-rudolf-caracciola-2560x1440.webp',
                'text' => 'Master of Silver Arrows. Rudolf Caracciola is the most successful German racing driver of the 1930s. Hot on his heels at the Mercede...',
            ],
        ]);
    }
}