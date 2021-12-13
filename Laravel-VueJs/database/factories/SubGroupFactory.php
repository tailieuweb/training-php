<?php

namespace Database\Factories;

use App\Models\SubGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subgroup_name' => 'Xe Coupé',
            'status' => 'Tồn',
            ];

    }
}
