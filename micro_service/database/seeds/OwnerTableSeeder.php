<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OwnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
        for($i = 1; $i <= 10; $i++){

            \App\Owner::create([
            'owner_name'	=> $faker->name,
            'referal_code'	=> $this->generate_ref_code(6),
            'ref_code_used'	=> 0]);

        }
    }

    public function generate_ref_code($length_of_string){
         $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; 
         return substr(str_shuffle($str_result), 0, $length_of_string); 
    }
}
