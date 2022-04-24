<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class BaseTransformer
 * @package App\Transformers
 */
class BaseTransformer extends TransformerAbstract
{
    /**
     * @var string
     */
    protected $locale;
    const EN = 'en';

    /**
     * BaseTransformer constructor.
     */
    public function __construct()
    {
        $this->locale = app('translator')->getLocale();
    }
}
