<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 4:23 PM
 */

namespace App\Repositories\Eloquent;


use App\Repositories\Base\AbstractBaseRepository;
use App\Repositories\Contracts\UserRepository;
use App\User;

class UserEloquentRepository extends AbstractBaseRepository implements UserRepository
{
    protected $modelClass = User::class;
}
