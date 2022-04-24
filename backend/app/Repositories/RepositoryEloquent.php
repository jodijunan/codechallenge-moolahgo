<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Repositories;

use App\Exceptions\RepositoryExceptions;
use App\Repositories\Interfaces\RepositoryEloquentInterface;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RepositoryEloquent
 * @package App\Repositories
 */
abstract class RepositoryEloquent implements RepositoryEloquentInterface
{
    /**
     * @var App
     */
    private $app;
    /**
     * @var
     */
    protected $model;

    /**
     * RepositoryEloquent constructor.
     */
    public function __construct()
    {
        $this->app = new App();
        try {
            $this->makeModel();
        } catch (RepositoryExceptions $e) {
        }
    }

    /**
     * @return mixed
     */
    abstract function model();

    /**
     * @return Model|mixed
     * @throws RepositoryExceptions
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new RepositoryExceptions("Class {$this->model()} must be an instance of Model");
        }
        return $this->model = $model;
    }
}
