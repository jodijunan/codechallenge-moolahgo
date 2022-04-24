<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ReferralCode extends Model
{
    private $referralCodes;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        // call invokable method
        $this->referralCodes = (new ReferralCodeData)();
    }

    public function getReferralCode($referralCode)
    {
        $search = array_search($referralCode, array_column($this->referralCodes, 'referral_code'));
        if ($search === false) {
            return false;
        }
        return $this->referralCodes[$search];
    }
}