<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Block\Models\Block;
use Botble\Language\Models\LanguageMeta;
use Faker\Factory;
use Illuminate\Support\Str;

class StaticBlockSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Block::truncate();
        LanguageMeta::where('reference_type', Block::class)->delete();

        for ($i = 0; $i < 5; $i++) {
            $name = $faker->name;
            $block = Block::create([
                'name'        => $name,
                'alias'       => Str::slug($name),
                'description' => $faker->text(50),
                'content'     => $faker->text(500),
            ]);

            LanguageMeta::saveMetaData($block, 'en_US');
        }
    }
}
