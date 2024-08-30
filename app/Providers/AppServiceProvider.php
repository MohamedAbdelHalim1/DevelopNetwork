<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PostRepositoryInterface;
use App\Repositories\PostRepository;
use App\Interfaces\AuthRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Interfaces\TagRepositoryInterface;
use App\Repositories\TagRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
