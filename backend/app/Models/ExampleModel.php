<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ExampleModel extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        "identifier",
        "secret",
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        $createdAt = Carbon::now()->subDays(1);
        $data = $query->where("created_at", ">=", $createdAt);
        return $data;
    }

    public function setIdentifier($value)
    {
        $this->attributes["identifier"] = $value;
    }
}
