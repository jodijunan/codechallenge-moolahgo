<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ReferralCode extends Model
{
    private $referralCodes = [
        [
            'referral_id' => '1',
            'referral_code' => 'CECC53',
            'benefit_balance' => 15,
            'benefit_currency' => 'SGD',
        ],
    ];

    public function getReferralCode($referralCode)
    {
        $search = array_search($referralCode, array_column($this->referralCodes, 'referral_code'));
        if ($search === false) {
            return false;
        }
        return $this->referralCodes[$search];
    }
}