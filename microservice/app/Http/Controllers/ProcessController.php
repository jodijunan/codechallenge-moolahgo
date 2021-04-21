<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\ReferralCode;

class ProcessController extends Controller
{
    public function process(Request $request)
    {
        try{
            $json = file_get_contents('php://input');
            $input = json_decode($json,true);

            $validator = \Validator::make($input, [
                'code' => 'required|min:6|max:6|alpha_num',
            ]);

            if ($validator->fails()) {
                return response()->json([
                        'msg'      => $validator->errors(),
                        'status'   => 404
                        ],
                       404);
            } else {
                $refCode = new ReferralCode();
                $find = $refCode->where('code',$input)->get()->first();

                return response()->json([
                    'msg'      => $find,
                    'status'   => 200
                    ],
                   200);
            }
        } catch(Exception $e) {
            return response()->json([
                'msg'      => 'Internal Server Error',
                'status'   => 500,
            ], 200);
        }
    }
}
