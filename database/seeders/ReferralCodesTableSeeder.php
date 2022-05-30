<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ReferralCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('referral_codes')->insert([
            'owner_id' => 1,
            'code' => 'ABCD',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('referral_codes')->insert([
            'owner_id' => 2,
            'code' => 'EFGH',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('referral_codes')->insert([
            'owner_id' => 3,
            'code' => 'IJKL',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
