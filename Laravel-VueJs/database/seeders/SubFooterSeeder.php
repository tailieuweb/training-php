<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubFooter;

class SubFooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubFooter::insert([
            [
            'name' =>'Innovation',
            'link' =>'',
            'footer_id'=>'1'
            ],
            [

            'name' =>'Design',
            'link' =>'',
            'footer_id'=>'1'
            ],
            [
            
            'name' =>'Exhibitions',
            'link' =>'',
            'footer_id'=>'1'
            ],
            [
            
            'name' =>'Museum & History',
            'link' =>'',
            'footer_id'=>'1'
            ],
            [
            
            'name' =>'Dealer Search',
            'link' =>'',
            'footer_id'=>'2'
            ],
            [
            
            'name' =>'Mercedes-Benz Accessoires',
            'link' =>'',
            'footer_id'=>'2'
            ],
            [
            
            'name' =>'Mercedes-Benz Collection',
            'link' =>'',
            'footer_id'=>'2'
            ],
            [
            
            'name' =>'Mercedes me connect Store',
            'link' =>'',
            'footer_id'=>'2'
            ],
            [
            
            'name' =>'Model Overview',
            'link' =>'',
            'footer_id'=>'3'
            ],
            [
            
            'name' =>'Configurator',
            'link' =>'',
            'footer_id'=>'3'
            ],
            [
            
            'name' =>'Test Drive',
            'link' =>'',
            'footer_id'=>'3'
            ],
            [
            
            'name' =>'Mercedes-Maybach',
            'link' =>'',
            'footer_id'=>'3'
            ],
            [
            
            'name' =>'Daimler AG',
            'link' =>'',
            'footer_id'=>'4'
            ],
            [
            
            'name' =>'Mercedes-Benz AG',
            'link' =>'',
            'footer_id'=>'4'
            ],
            [
            
            'name' =>'Newsroom',
            'link' =>'',
            'footer_id'=>'4'
            ],
            [
            
            'name' =>'Press',
            'link' =>'',
            'footer_id'=>'4'
            ],
            

        ]);
    }
}
