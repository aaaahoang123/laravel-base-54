<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 1/1/20
 * Time: 10:58 AM
 */

namespace App\Services\Contracts;


use App\User;

interface DtoBuilderService
{
    /**
     * @param User $user
     * @param null $token
     * @return mixed
     */
    public function buildUserDto($user, $token = null);
}
