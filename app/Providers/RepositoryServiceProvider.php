<?php

namespace App\Providers;

use App\Repository\Interface\RepositoryInterface;
use App\Repository\Interface\AlunoRepositoryInterface;
use App\Repository\AlunoRepository; 
use App\Repository\BaseRepository; 
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, BaseRepository::class);
        $this->app->bind(AlunoRepositoryInterface::class, AlunoRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
