<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.ichsan@gmail.com>
 */

namespace App\Repositories\Interfaces;

use App\Repositories\Criteria\CriteriaEloquent;

interface CriteriaEloquentInterface
{
    /**
     * @param bool $status
     * @return $this
     */
    public function skipCriteria($status = true);

    /**
     * @return mixed
     */
    public function getCriteria();

    /**
     * @param CriteriaEloquent $criteria
     * @return $this
     */
    public function getByCriteria(CriteriaEloquent $criteria);

    /**
     * @param CriteriaEloquent $criteria
     * @return $this
     */
    public function pushCriteria(CriteriaEloquent $criteria);

    /**
     * @return $this
     */
    public function applyCriteria();
}
