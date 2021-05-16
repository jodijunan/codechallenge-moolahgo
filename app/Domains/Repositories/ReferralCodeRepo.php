<?php

namespace App\Domains\Repositories;

use App\Domains\Interfaces\ReferralCodeRepoInterface;
use App\Domains\Models\ReferralCode;
use App\Domains\Models\User;


class ReferralCodeRepo implements ReferralCodeRepoInterface {

    /**
     * To get owner by referral code
     */
    public function getOwnerByCode($referralcode) {
        $matching_referralcode = array_values(array_filter(ReferralCode::referral_codes(), function($existing_referralcode) use($referralcode){
            if($existing_referralcode['value'] == $referralcode) return true;
        }));
        $matching_referralcode_user_id = $matching_referralcode[0]['user_id'];
        $matching_user = array_values(array_filter(User::users(), function($user) use($matching_referralcode_user_id){
            if($user['id'] == $matching_referralcode_user_id) return true;
        }));
        return array_merge($matching_user[0], $matching_referralcode[0]);
    }

    /**
     * To get all referral codes
     */
    public function getReferralCodes(){
        return ReferralCode::referral_codes();
    }

}
