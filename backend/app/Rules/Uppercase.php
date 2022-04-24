<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Rules;

use Illuminate\Contracts\Validation\ImplicitRule;

class Uppercase implements ImplicitRule
{
    private $code = 'MEM92';

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        return strtoupper($value) === $value;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return 'The :attribute must be uppercase.';
    }
}