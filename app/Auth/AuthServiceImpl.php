<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 4:04 PM
 */

namespace App\Auth;


use App\Repositories\Contracts\UserRepository;
use App\User;
use Exception;
use JWTAuth;

class AuthServiceImpl implements AuthService
{

    /**
     * @var UserRepository
     */
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @param $id
     * @return User
     */
    public function findById($id)
    {
        return $this->userRepo->findById($id);
    }

    /**
     * @param $credential
     * @return User|null
     */
    public function attempt($credential)
    {
        $password = isset($credential['password']) ? $credential['password'] : null;

        if (!$password)
            return null;

        unset($credential['password']);

        $result = $this->userRepo->find($credential);
        if ($result && $result->count())
            return $result->first();
        return null;
    }

    /**
     * @param $token
     * @return User|null
     */
    public function decodeToken($token)
    {
        try {
            $u = JWTAuth::toUser($token);
            return $this->findById($u->id);
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @param User $user
     * @return string
     */
    public function generateToken($user)
    {
        return JWTAuth::fromUser($user);
    }
}
