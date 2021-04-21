<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
                        'msg'    => 'Input invalid!',
                        'data'   => $validator->errors(),
                        'status' => 404
                        ],
                       404);
            } else {
                $refCode = new ReferralCode();
                $result  = array();

                if(!empty($input['showall']) && isset($input['showall'])) {
                    $result = $refCode->with('owner')->all();
                } else {
                    $result = $refCode->with('owner')->where('code',$input['code'])->first();
                    
                    $today       = date("Y-m-d H:i:s");  
                    $today_date  = new \DateTime($today);
                    $expiredDate = new \DateTime($result->expired_date);

                    if($today_date < $expiredDate){
                        return response()->json([
                            'msg'    => 'Expired referral code!',
                            'data'   => $result,
                            'status' => 401
                            ],200);
                    }
                }
                
                return response()->json([
                    'msg'    => 'Data Found!',
                    'data'   => $result,
                    'status' => 200
                    ],200);
            }
        } catch(Exception $e) {
            return response()->json([
                'msg'    => 'Input invalid!',
                'data'   => NULL,
                'status' => 500,
            ], 200);
        }
    }
}
