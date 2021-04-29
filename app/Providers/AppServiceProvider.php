<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\BlogService;
use App\Services\Impl\AuthServiceImpl;
use App\Services\Impl\BlogServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(AuthService::class, function ($app) {
            return new AuthServiceImpl();
        });
        $this->app->bind(BlogService::class, function ($app) {
            return new BlogServiceImpl();
        });
    }
}
