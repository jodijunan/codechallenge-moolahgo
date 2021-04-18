<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use \App\Models\User;
use \App\Models\ReferralCode;

class SeedController extends Controller {
    
    function index() {

        $user = User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
        
        ReferralCode::create([
            'code' => $this->random_alphanumeric(6),
            'user_id' => $user->id
        ]);
        $all = User::get();

        return response()->json([
            'status'=>'success', 
            'message' => 'success',
            'data' => $all
        ]);

    }

    function userlist(){
        $all = User::get();
        return response()->json([
            'status'=>'success', 
            'message' => 'success',
            'data' => $all
        ]);
    }
    function random_alphanumeric($length) {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456890';
        // $my_string = '';
        // for ($i = 0; $i < $length; $i++) {
        //   $pos = mt_rand(0, strlen($chars) -1);
        //   $my_string .= substr($chars, $pos, 1);
        // }
        return substr(str_shuffle($chars), 0, 6);
        // return $my_string;
    }
}
