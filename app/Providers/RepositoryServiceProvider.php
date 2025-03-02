<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\AccountRepositoryInterface;
use App\Repositories\AccountRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
    }

    public function boot()
    {
        //
    }
} 