<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;

class ReferralCode extends Model
{
    private static $referral_codes = [
        [
            'id' => 1,
            'value' => 'F38AU9', // newly registered user's referral code (only once inserted)
            'user_id' => 2, // newly registered user's id (only once inserted)
            'credits' => 25, // user's alloted credits (updated frequently as new referral register into system using his referral code)
            'balance' => 25, // newly registered user's remaining credit balance (updated frequently as credits gets utilised by this user only)
            'no_of_referrals_acquired' => 0, // referrals (new users) registered into system using his code
            'min_amount_for_redemption' => 50 // min amount to be spent for redemption of the credits
        ],
        [
            'id' => 2,
            'value' => 'T6R9NO',
            'user_id' => 3, 
            'credits' => 25, 
            'balance' => 25, 
            'no_of_referrals_acquired' => 0, 
            'min_amount_for_redemption' => 50 
        ],
        [
            'id' => 3,
            'value' => 'O5C6AK',
            'user_id' => 5, 
            'credits' => 25, 
            'balance' => 25, 
            'no_of_referrals_acquired' => 0, 
            'min_amount_for_redemption' => 50 
           
        ]
    ];
    public static function referral_codes() {
        
        return self::$referral_codes;
    }
    
    /**
     * To setup database for this particular microservice
     * 1) Prepare Database migrations using below tables (php artisan make:table):
     * 1.1) users (id, name, email, contact_number, password)
     * 1.2) referral_codes (id, value, user_id, credits, balance, no_of_referrals_acquired, min_amount_for_redemption)
     * 1.3) user_referrers (id, user_id, referrer_id, credits, min_amount_for_redemption)
     * 
     * 2) Create relevant database models with field specfiic attributes & methods to save and get details
     * 3) Prepare database seeders & factories for inserting default config data into database
     * 4) Use those models in repository classes for handling all cases using database
     */
}
