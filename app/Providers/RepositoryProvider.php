<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 4:24 PM
 */

namespace App\Providers;


use App\Providers\Traits\AutoBindSingletons;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\UserEloquentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    use AutoBindSingletons;

    public $singletons = [
        UserRepository::class => UserEloquentRepository::class
    ];
}
