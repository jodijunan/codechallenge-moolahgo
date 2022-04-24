<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    private $users;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        // call invokable method
        $this->users = (new UserData)();
    }

    // in real case this should be relation one to one
    // between users and referral model
    public function getReferral()
    {
        return new ReferralCode;
    }

    public function getUsersReferral($referralCode)
    {
        $search = array_search($referralCode, array_column($this->users, 'referral_code'));
        $searchReferral = $this->getReferral()->getReferralCode($referralCode);

        if ($search === false || $searchReferral === false) {
            return false;
        }
        return array_merge($this->users[$search], $searchReferral);
    }
}
