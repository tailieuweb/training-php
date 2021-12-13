<?php

namespace Database\Factories;

use App\Models\Footer;
use Illuminate\Database\Eloquent\Factories\Factory;

class FooterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Footer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //load data
        return [
            'topics' => 'Discover more'
        ];
    }
    
}
