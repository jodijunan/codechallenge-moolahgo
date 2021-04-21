<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Libraries\Referralcode;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	$startDate = time();

	$randomName = array("Ahadian Akbar","Safrizal","Chalimatus","Diyah","Rizal");

	for($i = 0; $i < 5; $i++){
		$ownerId = DB::table('owner')->insertGetId([
	            'name' => $randomName[rand(0, count($randomName)-1)],
	            'email' => Str::random(10).'@gmail.com',
	        ]);

		DB::table('referral_code')->insertGetId([
                    'owner_id' => $ownerId,
                    'code' => Referralcode::generatecode(6),
                    'status' => 0, // 1 => active, 0 => inactive
                    'used' => 0, // start from 0
		    'expired_date' => date('Y-m-d H:i:s', strtotime('+3 day', $startDate))
                ]);
	}
    }
}
