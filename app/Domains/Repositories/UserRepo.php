<?php

namespace App\Domains\Repositories;

use App\Domains\Interfaces\UserRepoInterface;
use App\Domains\Models\User;


class UserRepo implements UserRepoInterface {

    /**
     * To get users list
     */
    public function getUsers(){
        return User::users();
    }
    
}
