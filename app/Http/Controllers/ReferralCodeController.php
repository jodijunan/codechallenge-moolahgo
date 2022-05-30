<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Owner;
use App\Models\User;
use App\Models\ReferralCode;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class ReferralCodeController extends ApiController
{
    public function findOwnerDetails(Request $request)
    {
        $referralCodePayload = $request->all();
        if(isset($referralCodePayload['referralcode'])){
            $referralCode = $referralCodePayload['referralcode'];
        }else{
            return $this->errorResponse('Wrong parameter.', 404);
        }
        $refcode = ReferralCode::firstWhere('code', $referralCode);
        if($refcode === null){
            return $this->errorResponse('Record not found.', 404);
        }
        $owner = Owner::find($refcode->owner_id);
        $user = User::find($owner->user_id);
        $referralCodeOwner = new \stdClass();
        $referralCodeOwner->user = $user;
        $referralCodeOwner->owner = $owner;
        $referralCodeOwner->referralcode = $refcode;
        return $this->successResponse($referralCodeOwner);
    }
}
