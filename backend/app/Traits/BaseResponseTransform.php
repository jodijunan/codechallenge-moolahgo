<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Traits;

use App\Http\Requests\Request;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\JsonApiSerializer;

trait BaseResponseTransform
{
    private function getFractalManager()
    {
        $manager = new Manager();
        $manager->setSerializer(new JsonApiSerializer());
        return $manager;
    }

    public function item($data, $transformer)
    {
        $manager = $this->getFractalManager();
        $resource = new Item($data, $transformer, $transformer->type);
        return $manager->createData($resource)->toArray();
    }

    public function collection($data, $transformer)
    {
        $manager = $this->getFractalManager();
        $resource = new Collection($data, $transformer, $transformer->type);
        return $manager->createData($resource)->toArray();
    }

    public function paginate($data, $transformer)
    {
        $manager = $this->getFractalManager();
        $resource = new Collection($data, $transformer, $transformer->type);
        $resource->setPaginator(new IlluminatePaginatorAdapter($data));
        return $manager->createData($resource)->toArray();
    }
}
