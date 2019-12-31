<?php

namespace App\Providers;

use App\Providers\Traits\AutoBindSingletons;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use AutoBindSingletons {
        register as autoBindRegister;
    }

    public $singletons = [];
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->autoBindRegister();
        $this->app->singleton(Client::class, function () {
            return new Client([
                'http_errors' => false
            ]);
        });
    }
}
