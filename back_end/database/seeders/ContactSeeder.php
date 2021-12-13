<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Contact\Enums\ContactStatusEnum;
use Botble\Contact\Models\Contact;
use Faker\Factory;

class ContactSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        Contact::truncate();

        for ($i = 0; $i < 10; $i++) {
            Contact::create([
                'name'    => $faker->name,
                'email'   => $faker->safeEmail,
                'phone'   => $faker->phoneNumber,
                'address' => $faker->address,
                'subject' => $faker->text(50),
                'content' => $faker->text(500),
                'status'  => $faker->randomElement([ContactStatusEnum::READ, ContactStatusEnum::UNREAD]),
            ]);
        }
    }
}
