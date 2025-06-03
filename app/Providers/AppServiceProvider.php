<?php

namespace App\Providers;

use App\User;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /** 
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(resource_path('views/vendor/ticketit'), 'ticketit');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        Cashier::useCustomerModel(User::class);

        // Handle URL scheme based on environment
        if (app()->environment('production')) {
            \URL::forceScheme('https');
        }
        // Don't force any scheme in development to allow both HTTP and HTTPS
    }
}
