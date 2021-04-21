<?php
/**
@author rabkawork@gmail.com
**/
namespace App\Libraries;

class Referralcode {

  public function generatecode($len) {
     $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; 
    return substr(str_shuffle($str_result), 0, $len);
  }

}
