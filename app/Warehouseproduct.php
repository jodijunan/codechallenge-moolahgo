<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Warehouseproduct extends Model
{
    protected $table = 'tabel_inv_referralcode';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'warehouse_id', 'product_id','quantity'
    ];

	// 1 referral code, 2 user, 3 warehouse, 4 warehouse product, 5 product,6 category & uom
}