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
        $results = app('db')->select("SELECT * FROM tabel_inv_referralcode a
                                    JOIN tabel_inv_users b ON a.user_id = b.id 
                                    JOIN tabel_inv_warehouses c ON a.warehouse_id = c.id 
                                    JOIN tabel_inv_warehouses_products d ON a.warehouse_id = d.warehouse_id 
                                    JOIN tabel_inv_products e ON d.product_id = e.id     
                                    JOIN tabel_inv_category f ON e.category = f.id    
                                    JOIN tabel_inv_uom g ON f.uom = g.id                              
                                    WHERE $refcode");
        return response()->json($results);
	}
}