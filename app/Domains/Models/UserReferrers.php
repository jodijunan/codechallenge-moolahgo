<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;

class UserReferrers extends Model
{
    private static $user_referrers = [
        [
            'id' => 1,
            'user_id' => 3, // referre user id (user whom has been registered into system using some other user's referral code)
            'referrer_id' => 2, // referrer user id (user whose referral code has been used for referral program)
            'credits' => 25, // applicable credits (as this may be vary as business campaigns or budget allocation for this program)
            'min_amount_for_redemption' => 50 // minimum criteria to redeem particular referral (it also may vary)
        ],
        [
            'id' => 1,
            'user_id' => 5,
            'referrer_id' => 3,
            'credits' => 25, 
            'min_amount_for_redemption' => 50 
        ]
    ];
    public static function user_referrers() {
        
        return self::$user_referrers;
    }
    
}
