<?php
class Form
{
    public $date;
    public $amount;
    public $percentage;


    #validations

    public function validate_date_amount_presence($date, $amount)
    {
        if($date == '' OR $amount == '')
        {
            return false;
        }else {
            return true;

        }
    }

    public function validate_percentage_range($percentage)
    {
        #convert to integer
        $converted_percentage = intval($percentage);
        if ($converted_percentage >= -10 AND $converted_percentage <= 10)
        {
            return true;
        } else {
            return false;
        }
    }

}