<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'owner';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    public function ReferralCode()
    {
        return $this->belongsTo('App\ReferralCode','id');
    }


}
