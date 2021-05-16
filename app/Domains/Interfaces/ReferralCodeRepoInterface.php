<?php

namespace App\Domains\Interfaces;

interface ReferralCodeRepoInterface {
    public function getOwnerByCode(String $referral_code);
    public function getReferralCodes();
}
