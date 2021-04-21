<?php
/**
@author rabkawork@gmail.com
**/
namespace App\Libraries;

class Referralcode {

  public static function generatecode($len) {
     $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; 
    return substr(str_shuffle($str_result), 0, $len);
  }

}
