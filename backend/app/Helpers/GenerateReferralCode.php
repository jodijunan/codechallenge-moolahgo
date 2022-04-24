<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Helpers;

class GenerateReferralCode
{
    public static function generate()
    {
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $first = substr(str_shuffle($permitted_chars), 0, 3);
        $second = substr(str_shuffle($permitted_chars), 0, 3);
        $referralCode = $first . $second;

        return $referralCode;
    }
}