<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'tabel_inv_referralcode';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name','category','cost','price','quantity','uom','description'
    ];

	// 1 referral code, 2 user, 3 warehouse, 4 warehouse product, 5 product,6 category & uom
}