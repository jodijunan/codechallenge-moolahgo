<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralCode extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->hasOne(Owner::class);
    }

    protected $fillable = ['code'];
}
