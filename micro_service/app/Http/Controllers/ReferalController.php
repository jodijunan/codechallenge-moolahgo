<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Owner;


class ReferalController extends Controller
{
     /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function get_referal_code(Request $request) 
    {          
        $code = base64_decode($request->input('referalcode'));      $data['status'] = false;
        if(Owner::where('referal_code', $code)->exists()){       
            Owner::where('referal_code', $code)
                        ->increment('ref_code_used', 1, ['updated_at' => date('Y-m-d H:i:s')]);
            $data = Owner::select("id","owner_name","referal_code","ref_code_used")
                    ->where('referal_code', $code)->first();
            $data->status = true;
        }                      
           
        return response()->json(['messages' => $data ], 200);
    } 

    public function get_owner_reveral_code(){

        return response()->json(['owners' =>  Owner::all()], 200);
    }
    
    
}
