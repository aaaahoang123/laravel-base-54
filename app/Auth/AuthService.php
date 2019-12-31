<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 4:04 PM
 */

namespace App\Auth;


use App\User;

interface AuthService
{
    /**
     * @param $id
     * @return User
     */
    public function findById($id);

    /**
     * @param $credential
     * @return User|null
     */
    public function attempt($credential);

    /**
     * @param $token
     * @return User|null
     */
    public function decodeToken($token);

    /**
     * @param User $user
     * @return string
     */
    public function generateToken($user);
}
