<?php

namespace Database\Factories;

use App\Models\MenuMain;
use Illuminate\Database\Eloquent\Factories\Factory;



class MenuMainFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MenuMain::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Lifestyle',
            'link' => 'https://www.mercedes-benz.com/en/lifestyle/',
            'enabled' => 1
        ];
    }
}
