<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL; // Import the URL facade
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
        // Force HTTPS if the app is in production
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
