<?php

namespace App\Providers;

use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\ProdutoRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\ProdutoRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProdutoRepositoryInterface::class, ProdutoRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
