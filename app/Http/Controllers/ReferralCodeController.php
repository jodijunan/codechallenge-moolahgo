<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domains\Interfaces\ReferralCodeRepoInterface;
use App\Http\Services\ReferralCodeValidatorService;

class ReferralCodeController extends Controller
{
    private $referralCodeRepo;
    private $referralCodeValidator;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReferralCodeRepoInterface $referralCodeRepo, ReferralCodeValidatorService $referralCodeValidator)
    {
        $this->referralCodeRepo = $referralCodeRepo;
        $this->referralCodeValidator = $referralCodeValidator;
    }

    public function referralcodes()
    {
        return response()->json($this->referralCodeRepo->getReferralCodes());
    }
    
    public function process(Request $request)
    {
        $validatorsResult = $this->referralCodeValidator->validateRequest($request, $this->referralCodeRepo);
        if(is_bool($validatorsResult)){
                return response()->json($this->referralCodeRepo->getOwnerByCode($request['referralcode']));
        } else {
                return response()->json($validatorsResult, 422);
        }
    }

}