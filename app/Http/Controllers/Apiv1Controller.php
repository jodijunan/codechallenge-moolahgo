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
                                   LEFT JOIN tabel_inv_users b ON b.id = a.user_id  
                                   LEFT JOIN tabel_inv_warehouses c ON c.id = a.warehouse_id
                                    JOIN tabel_inv_warehouses_products d ON a.warehouse_id = d.warehouse_id 
                                    JOIN tabel_inv_products e ON e.id = d.product_id   
                                    JOIN tabel_inv_category f ON f.id = e.category   
                                    JOIN tabel_inv_uom g ON g.id = e.uom                                         
                                    WHERE a.code = '$refcode'");
                                    
        // Referral Code use to search product information about category, uom, where products register at warehouse, and users have warehouse of products
        return response()->json($results);
	}
}
