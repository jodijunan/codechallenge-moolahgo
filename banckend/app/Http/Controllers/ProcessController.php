<?php

namespace App\Http\Controllers;

use \App\Models\User;
use \App\Models\ReferralCode;
use Illuminate\Http\Request;

class ProcessController extends Controller {
    
    function index(Request $request) {

        $validateData = $this->validate($request, [
            'referralcode' => 'required|alpha_num|min:6|max:6'
        ]);

        $ref = User::select('users.id', 'users.name', 'users.email', 'referral_code.code as referral_code')->join('referral_code', 'referral_code.user_id', '=', 'users.id')
            ->where('referral_code.code', $validateData['referralcode'])
            ->first();

        return response()->json([
            'status'=>'success', 
            'message' => 'success',
            'data' =>$ref
        ]);

    }

    function list() {
        $ref = ReferralCode::select('id','code')->get();
        return response()->json([
            'status'=>'success', 
            'message' => 'success',
            'data' =>$ref
        ]);
    }
    
}
