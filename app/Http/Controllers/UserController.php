<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domains\Interfaces\UserRepoInterface;

class UserController extends Controller
{
    private $userRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepoInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    
    public function users()
    {
        return response()->json($this->userRepo->getUsers());
    }

}