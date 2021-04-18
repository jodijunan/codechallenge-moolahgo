<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ReferralCode extends Model {
    protected $table = 'referral_code';

    protected $fillable = [
        'code', 'user_id'
    ];
}