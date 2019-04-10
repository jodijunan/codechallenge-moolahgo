<?php
class User
{
    public $name;

    #validations

    public function validate_name_presence($first_name, $last_name)
    {
        if($first_name == '' OR $last_name == '')
        {
            return false;
            throw new InvalidArgumentException('Please fill in both first and last name');
        }else {
            return true;

        }
    }

    #data processing

    public function process_name_data($first_name, $last_name)
    {
        $name = $first_name. " " . $last_name;
        return $name;
    }

}