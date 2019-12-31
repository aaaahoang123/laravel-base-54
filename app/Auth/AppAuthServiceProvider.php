<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 4:04 PM
 */

namespace App\Auth;

use App\Providers\Traits\AutoBindSingletons;
use Auth;
use Illuminate\Support\ServiceProvider;

class AppAuthServiceProvider extends ServiceProvider
{
    use AutoBindSingletons;

    public $singletons = [
        AuthService::class => AuthServiceImpl::class
    ];

    public function boot()
    {
        Auth::provider('jwt', function ($app, $config) {
            return $app->make(JWTUserProvider::class);
        });

        Auth::extend('jwt', function ($app, $name, $config) {
            return new JWTGuard(Auth::createUserProvider($config['provider']), $app->make('request'));
        });
    }
}
