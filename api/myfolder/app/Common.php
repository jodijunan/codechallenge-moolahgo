<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Common extends Model {

    function checkValueInArray($referralcode) {
        /* For this challenge, the data is hard coded. To store
           in mySQL, we can create a DB and a table with the following 3
           fields. After that, create a DB model to retrieve the value
           according to the referral code passed from the user input
        */

        $codes[] = ['name'=>'Peter','code'=>"ABCD12",'phone'=>'87385254'];
        $codes[] = ['name'=>'Jim','code'=>"EFGH93",'phone'=>'97082081'];

        foreach ($codes as $key=>$code) {
             if ($code['code'] == $referralcode) {
                return json_encode($code);
             }
        }
    }
}