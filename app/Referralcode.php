<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Referralcode extends Model
{
    protected $table = 'tabel_inv_referralcode';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'warehouse_id','code'
    ];

	// 1 referral code, 2 user, 3 warehouse, 4 warehouse product, 5 product,6 category & uom
}