<?php

namespace Database\Seeders;

use App\Models\Referral;
use Illuminate\Database\Seeder;

class ReferralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [            
            ['referral_code' => 'REF001', 'name' => 'John Doe'],
            ['referral_code' => 'REF002', 'name' => 'Maximus'],
            ['referral_code' => 'REF003', 'name' => 'Optimus Prime'],
            ['referral_code' => 'REF004', 'name' => 'Lorem Ipsum'],
        ];
    
        foreach ($items as $item) {
            Referral::updateOrCreate(['referral_code' => $item['referral_code']], $item);
        }
    }
}
