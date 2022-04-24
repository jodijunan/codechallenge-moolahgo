<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryEloquentInterface
{
    public function all(array $columns = ['*']): Collection;

    public function paginate(int $perPage = 15, $columns = ['*']);

    public function create(array $data): Model;

    public function update(array $data, int $id): Model;

    public function updateBy(string $field, string $value, array $data): Model;

    public function delete(int $id);

    public function find(int $id, $columns = array('*')): Model;

    public function findBy(string $field, string $value, $columns = ['*']): Builder;
}
