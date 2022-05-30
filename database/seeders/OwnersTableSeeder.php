<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class OwnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('owners')->insert([
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('owners')->insert([
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
