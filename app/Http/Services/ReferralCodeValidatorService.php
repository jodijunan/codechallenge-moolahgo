<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Domains\Models\ReferralCode;
use App\Domains\Interfaces\ReferralCodeRepoInterface;


class ReferralCodeValidatorService
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'referralcode' => 'required|alpha_num|min:6|max:6'
        ];
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'referralcode.required' => 'Referral Code is required!',
            'referralcode.alpha_num' => 'Referral Code is not valid!',
            'referralcode.min' => 'Referral Code must be at least 6 characters!',
            'referralcode.max' => 'Referral Code may not be greater than 6 characters!'
        ];
    }

    public function validateRequest(Request $request, ReferralCodeRepoInterface $referralCodeRepo) {
        $validator = Validator::make($request->all(), $this->rules(), $this->messages());
        $validator->after(function ($validator) use ($request, $referralCodeRepo) {
            if (!$this->isReferralCodeExist($request->input('referralcode'), $referralCodeRepo)) {
                $validator->errors()->add('referralcode', 'Referral Code doesn\'t exist!');
            }
        });
        if ($validator->stopOnFirstFailure()->fails()) {
            return $validator->errors();
        } else {
            return true;
        }
    }

    private function isReferralCodeExist($referralcode, $referralCodeRepo){
        $referralcodes = array_values(array_filter($referralCodeRepo->getReferralCodes(), function($existing_referralcode) use($referralcode){
            if($existing_referralcode['value'] === $referralcode) return true;
        }));
        return (count($referralcodes) > 0) ? true: false;
    }
}