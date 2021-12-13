<?php

namespace Database\Seeders;

use App\Models\SectionArticlesPosts;
use Illuminate\Database\Seeder;

class SectionArticlesPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SectionArticlesPosts::insert([
            [
                "category_article_post_id" => 1,
                "menu_main_header_id" => 4,
                "image_article" => "test.webp",
                "title_article" => "Charge your Mercedes-Benz anytime and anywhere.",
                "subtitle_article" => "With the new Mercedes-Benz Flexible Charging System, you can charge your hybrid or electric vehicle anytime..."
            ],
            [
                "category_article_post_id" => 1,
                "menu_main_header_id" => 4,
                "image_article" => "test2.webp",
                "title_article" => "  Discover the new Mercedes me App generation.",
                "subtitle_article" => "Check your range, find a parking space, make a service appointment – all this is possible with the Mercedes..."
            ],
            [
                "category_article_post_id" => 1,
                "menu_main_header_id" => 4,
                "image_article" => "test3.webp",
                "title_article" => "The new generation of Mercedes me Apps. ",
                "subtitle_article" => "Imagine if you could check your range via app, or lock your doors and sunroof. Or find a parking space. Che..."
            ],
            [
                "category_article_post_id" => 2,
                "menu_main_header_id" => 4,
                "image_article" => "test_popular1.webp",
                "title_article" => "Mercedes-Benz G 63 AMG 6x6: The automotive declaration of in...",
                "subtitle_article" => "The G 63 AMG 6X6 embodies a perfect synthesis of uncompromising extravagance and technical perfection."
            ],
            [
                "category_article_post_id" => 2,
                "menu_main_header_id" => 4,
                "image_article" => "test_popular2.webp",
                "title_article" => "Mercedes-Benz G 63 AMG 6x6: The automotive declaration of in...",
                "subtitle_article" => "The G 63 AMG 6X6 embodies a perfect synthesis of uncompromising extravagance and technical perfection."
            ],
            [
                "category_article_post_id" => 2,
                "menu_main_header_id" => 4,
                "image_article" => "test_popular3.webp",
                "title_article" => " The F 015 Luxury in Motion.",
                "subtitle_article" => "With the F 015 Luxury in Motion, Mercedes-Benz provides technically feasible and socially desirable solutio..."
            ]
        ]);
    }
}
