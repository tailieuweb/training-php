<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Member\Models\Member;
use Botble\Member\Models\MemberActivityLog;
use Faker\Factory;

class MemberSeeder extends BaseSeeder
{
    public function run()
    {
        $faker = Factory::create();

        Member::truncate();
        MemberActivityLog::truncate();

        Member::create([
            'first_name'   => 'John',
            'last_name'    => 'Smith',
            'email'        => 'john.smith@botble.com',
            'password'     => bcrypt('12345678'),
            'dob'          => $faker->dateTime,
            'phone'        => $faker->phoneNumber,
            'description'  => $faker->realText(30),
            'confirmed_at' => now(),
        ]);

        for ($i = 0; $i < 10; $i++) {
            Member::create([
                'first_name'   => $faker->firstName,
                'last_name'    => $faker->lastName,
                'email'        => $faker->email,
                'password'     => bcrypt('12345678'),
                'dob'          => $faker->dateTime,
                'phone'        => $faker->phoneNumber,
                'description'  => $faker->realText(30),
                'confirmed_at' => now(),
            ]);
        }
    }
}
