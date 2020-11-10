<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot() : void
    {
        View::share('stripe_public_key', config('app.stripe_public_key'));
        View::share('stripe_subscription_amount', config('app.stripe_subscription_amount'));        
    }
}