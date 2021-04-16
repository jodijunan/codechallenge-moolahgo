<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
   
    protected $table = "owner";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'owner_name', 'referal_code'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}