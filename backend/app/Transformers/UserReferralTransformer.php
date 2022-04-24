<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Transformers;

class UserReferralTransformer extends BaseTransformer
{
    public $type = 'UserReferral';

    public function transform($data)
    {
        return [
            'id' => $data['user_id'],
            'givenName' => $data['given_name'],
            'surname' => $data['surname'],
            'fullName' => $data['fullname'],
            'title' => $data['title'],
            'referral' => [
                'referraId' => $data['referral_id'],
                'referralCode' => $data['referral_code'],
                'benefit' => [
                    'balance' => $data['benefit_balance'],
                    'currency' => $data['benefit_currency'],
                ],
            ],
            'registerBy' => $data['register_by'],
            'email' => $data['email'],
            'phoneNumber' => $data['phone_number'],
        ];
    }
}