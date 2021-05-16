<?php

namespace App\Providers;

use App\Domains\Repositories\ReferralCodeRepo;
use App\Domains\Repositories\UserRepo;
use App\Domains\Interfaces\ReferralCodeRepoInterface;
use App\Domains\Interfaces\UserRepoInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ReferralCodeRepoInterface::class, ReferralCodeRepo::class);
        $this->app->bind(UserRepoInterface::class, UserRepo::class);
    }
}