<?php

use Illuminate\Database\Seeder;

class ReferralCodeSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=1; $i < 20; $i++) {
            $referralCode[] = [
                'referral_id' => $i,
                'referral_code' => \App\Helpers\GenerateReferralCode::generate(),
                'benefit_balance' => 15,
                'benefit_currency' => 'SGD',
            ];
        }
    }
}
