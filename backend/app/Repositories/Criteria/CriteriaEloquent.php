<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.ichsan@gmail.com>
 */

namespace App\Repositories\Criteria;

use App\Repositories\RepositoryEloquent;

abstract class CriteriaEloquent
{
    abstract public function apply($model, RepositoryEloquent $param);
}
