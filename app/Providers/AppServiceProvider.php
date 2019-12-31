<?php

namespace App\Providers;

use App\Auth\JWTGuard;
use Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Auth::extend('jwt', function ($app, $name, $config) {
            return new JWTGuard(Auth::createUserProvider($config['provider']), $app->make('request'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
