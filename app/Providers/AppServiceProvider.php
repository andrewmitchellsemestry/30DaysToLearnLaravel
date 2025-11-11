<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // We can add things here to prevent them from being used in the app. For example, we can disable eager loading
        // Model::preventLazyLoading();

        // We can choose to use another style for Pagination here
        //Paginator::useBootstrapFive();
    }
}
