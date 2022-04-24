<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Models;

class ReferralCodeData
{
    /**
     * How to generate referral code data ?
     * Run this code below
     *
     *
        $faker = \Faker\Factory::create();
        for ($i=1; $i < 20; $i++) {
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $first = substr(str_shuffle($permitted_chars), 0, 3);
            $second = substr(str_shuffle($permitted_chars), 0, 3);
            $promoCodeBulkPurchase = $first . $second;

            $referralCode[] = [
            'referral_id' => $i,
            'referral_code' => $promoCodeBulkPurchase,
            'benefit_balance' => 15,
            'benefit_currency' => 'SGD',
            ];
        }
     */

    public function __invoke()
    {
        return [
            [
                "referral_id" => 1,
                "referral_code" => "2SB4PU",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 2,
                "referral_code" => "LWNWHZ",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 3,
                "referral_code" => "UAHBXQ",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 4,
                "referral_code" => "WKGMVQ",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 5,
                "referral_code" => "OV73SY",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 6,
                "referral_code" => "D78REO",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 7,
                "referral_code" => "BHOC2U",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 8,
                "referral_code" => "AZNBRH",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 9,
                "referral_code" => "NULI72",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 10,
                "referral_code" => "LCAA4J",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 11,
                "referral_code" => "867UPE",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 12,
                "referral_code" => "U8MH7T",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 13,
                "referral_code" => "DAFO6D",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 14,
                "referral_code" => "WQDCOH",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 15,
                "referral_code" => "IPDPW5",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 16,
                "referral_code" => "5B98JF",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 17,
                "referral_code" => "15W07M",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 18,
                "referral_code" => "FG4Z8X",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
            [
                "referral_id" => 19,
                "referral_code" => "QRLUK0",
                "benefit_balance" => 15,
                "benefit_currency" => "SGD",
            ],
        ];
    }
}