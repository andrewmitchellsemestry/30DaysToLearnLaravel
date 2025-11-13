<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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

        Gate::define('edit-job', function(User $user, Job $job) {        
            return $job->employer->user->is($user);
        });
    }
}
