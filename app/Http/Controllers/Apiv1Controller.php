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

class Apiv1Controller extends Controller
{
    public function getReferralCode($refcode)
	{
        $results = app('db')->select("SELECT * FROM tabel_inv_referralcode 
                                    JOIN tbl_fa_gj_det b ON a.DocNo = b.DocNo 
                                    JOIN tbl_fa_gj_upl c ON a.DocNo = c.DocNo 
                                    JOIN tbl_fa_trans_upl d ON a.DocNo = d.DocNo                             
                                    WHERE $refcode");
        return response()->json($results);
	}
}