<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => Str::random(10).'@yopmail.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'firstname' => 'Ortal',
            'lastname' => 'Test',
            'email' => Str::random(10).'@yopmail.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'firstname' => 'Fulan',
            'lastname' => 'Dan',
            'email' => Str::random(10).'@yopmail.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
