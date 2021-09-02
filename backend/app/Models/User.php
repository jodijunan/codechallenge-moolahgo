<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    private static $users = [
        [
            'id' => 1,
            'name' => 'Stacy Wilcox',
            'email' => 'vitae.diam.Proin@condimentumeget.com',
            'phone' => '1-966-670-7656',
            'referral_codes' => 'IFRJWJ'
        ],
        [
            'id' => 2,
            'name' => 'Mara Gould',
            'email' => 'lacus@interdum.ca',
            'phone' => '1-639-588-6028',
            'referral_codes' => 'GBZRXY'
        ],
        [
            'id' => 3,
            'name' => 'Ryder Phillips',
            'email' => 'Mauris@pedeblanditcongue.ca',
            'phone' => '1-497-486-9272',
            'referral_codes' => 'NXSMHS'
        ],
        [
            'id' => 4,
            'name' => 'Callie Matthews',
            'email' => 'pede.sagittis.augue@sedturpis.net',
            'phone' => '1-115-299-7689',
            'referral_codes' => 'WUMKVL'
        ],
        [
            'id' => 5,
            'name' => 'Mira Ward',
            'email' => 'Sed.nunc.est@utnisi.org',
            'phone' => '1-129-336-3937',
            'referral_codes' => 'QNNDQR'
        ],
    ];

    public static function userByReferralCode($ref)
    {
        $result = [];
        $userIndex = array_search($ref, array_column(self::$users, 'referral_codes'));

        if ($userIndex === false) {
            $result['success'] = false;
            $result['message'] = 'Cannot find user with provided referral code';
        } else {
            $user = self::$users[$userIndex];
            $user['email'] = substr($user['email'], 0, 3) . '***@***' . substr($user['email'], -7);
            $user['phone'] = substr($user['phone'], 0, 3) . '******' . substr($user['phone'], -3);
            $result['success'] = true;
            $result['user_detail'] = $user;
        }
        return  $result;
    }
}
