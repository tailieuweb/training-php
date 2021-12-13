<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Footer;
class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Footer::insert([
            [
                'topics' => 'More topics',
                'subfooter' => '[{"name": "Innovation"},{"name": "Design"}]',
            ],
            [
                'topics' => 'Shopping',
                'subfooter' => '[{"name": "Dealer Search"},{"name": "Mercedes-Benz Accessoires"},{"name" : "Mercedes-Benz Collection"}]'
            ],
            [
                'topics' => 'All about cars',
                'subfooter' => '[{"name": "Model Overview"},{"name" :"Configurator"},{"name":"Test Drive"},{"name":"Mercedes-Maybach" }]'
            ],
            [
                'topics' => 'Discover more',
                'subfooter' => '[{"name":"Daimler AG"},{"name":"Mercedes-Benz AG"},{"name":"Newsroom"},{"name":"Mercedes-Maybach"}]'
            ],
            ]);
    }
}
