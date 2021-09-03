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
        $referral_code = $request->input('referral_code');
        /*------------- Authentication -------------*/
		if($referral_code->isEmpty()){
			return Response::json(['status' => 0, 'message' => 'Referral Code is Empty']);			
		}else {

            // $data = Pelanggandetail::with('merchant')
            // ->select('Pelanggandetail.*')
            // ->select('Merchant.*')
            // ->select('Card.*')
            // ->join('merchant', 'pelanggandetail.merchant_id', '=', 'merchant.id')
            // ->join('card', 'card.merchant_id', '=', 'merchant.id')
            // ->where('pelanggan_id',$pelangganid)
            // ->get();
            $data = Pelanggandetail::where('code',$referral_code)
                ->where('code',$referral_code)
                ->get();
            print_r($data)
		}

		return Response::json(['status' => 1, 'message' => 'Get Data is Success', 'data' => $data]);

	}
}