<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    private $users = [
        [
            'id' => '',
            'given_name' => '',
            'surname' => '',
            'fullname' => '',
            'title' => '',
            'referral_code' => '',
            'register_by' => '',
            'email' => '',
            'phone_number' => '',
        ],
        [
            'user_id' => '2',
            'given_name' => 'Leanne Graham',
            'surname' => 'Bret',
            'fullname' => 'Leanne Graham',
            'title' => 'Mr.',
            'referral_code' => 'CECC53',
            'register_by' => 'EMAIL',
            'email' => 'sincere@april.biz',
            'phone_number' => '1-770-736-8031 x56442',
        ],
    ];

    // in real case this should be relation one to one
    // between users and referral model
    public function getReferral()
    {
        return new ReferralCode();
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
