<?php

namespace App\Providers;

use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        UserRepositoryInterface::class => UserRepository::class,
        PostRepositoryInterface::class => PostRepository::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
