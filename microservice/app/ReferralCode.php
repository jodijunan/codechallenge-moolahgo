<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferralCode extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'referral_code';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'status','expired_date'
    ];



    public function Owner()
    {
        return $this->hasOne('App\Owner','id');
    }

}
