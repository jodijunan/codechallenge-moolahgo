<?php
/* API for Mobile */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Referralcode;
use App\Products;
use App\Category;
use App\Uom;
use App\Users;
use App\Warehouse;
use App\Warehouseproduct;

use DB;
use Response;
use Input;
use File;

class Apiv2Controller extends Controller
{
    public function getReferralCode(Request $request)
	{
        $param_request = $request->input('referral_code');
        /*------------- Authentication -------------*/
		if($param_request->isEmpty()){
			return Response::json(['status' => 0, 'message' => 'Referral Code is Empty']);			
		}else {
          
		}

		return Response::json(['status' => 1, 'message' => 'Get Data is Success', 'data' => $data]);

	}
}