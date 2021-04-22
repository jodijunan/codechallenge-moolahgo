<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\ReferralCode;

class ProcessController extends Controller
{
    public function process(Request $request)
    {


        try{
            $input = $request->all();

            $validator = \Validator::make($input, [
                'code' => 'required|min:6|max:6|alpha_num',
            ]);

            if ($validator->fails()) {
                return response()->json([
                        'msg'    => 'Input invalid!',
                        'data'   => $validator->errors(),
                        'status' => 404
                        ],
                       404);
            } else {
                $refCode = new ReferralCode();
                $result  = array();

                $result = $refCode->with('owner')->where('code',$input['code'])->first();
                
                if(empty($result)) {
                    return response()->json([
                        'msg'    => 'Data Not Found!',
                        'data'   => false,
                        'status' => 404
                    ], 200);
                }

                $today       = date("Y-m-d H:i:s");
                $today_date  = new \DateTime($today);
                $expiredDate = new \DateTime($result->expired_date);

                if ($today_date > $expiredDate) {
                    return response()->json([
                        'msg'    => 'Expired referral code!',
                        'data'   => $result,
                        'status' => 401
                    ], 200);
                }

                $refCode->where('code', $input['code'])->increment('used', 1, ['updated_at' => date('Y-m-d H:i:s'),'status' => 1]);
            
                return response()->json([
                    'msg'    => 'Data Found!',
                    'data'   => $result,
                    'status' => 200
                    ],200);
            }
        } catch(Exception $e) {
            return response()->json([
                'msg'    => 'Internal Server Error!',
                'data'   => false,
                'status' => 500,
            ], 200);
        }
    }
}
