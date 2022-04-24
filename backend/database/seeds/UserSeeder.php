<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=10; $i < 20; $i++) {
            $users[] = [
                'user_id' => $i,
                'given_name' => $faker->name,
                'surname' => $faker->firstName,
                'fullname' => $faker->firstName . ' ' . $faker->lastName,
                'title' => $faker->title,
                'referral_code' => \App\Helpers\GenerateReferralCode::generate(),
                'register_by' => 'EMAIL',
                'email' => $faker->email,
                'phone_number' => $faker->phoneNumber,
            ];
        }
    }
}
