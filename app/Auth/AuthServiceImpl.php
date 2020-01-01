<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 4:04 PM
 */

namespace App\Auth;


use App\Enums\Type\UserBot;
use App\Exceptions\ExecuteException;
use App\Repositories\Contracts\UserRepository;
use App\User;
use Exception;
use GuzzleHttp\Client;
use JWTAuth;

class AuthServiceImpl implements AuthService
{
    private $userRepo;
    private $http;

    public function __construct(UserRepository $userRepo, Client $http)
    {
        $this->userRepo = $userRepo;
        $this->http = $http;
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
        $forumResult = $this->attemptByForum($credential);
        if (!$forumResult)
            throw new ExecuteException(__('Sai tên tài khoản hoặc mật khẩu'));
        $apiResult = $this->attemptByApi($forumResult);
        if (!$apiResult || $apiResult->bot != UserBot::ADMIN)
            throw new ExecuteException(__('Sai tên tài khoản hoặc mật khẩu'));
        return $apiResult;
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

    public function attemptByForum($credential)
    {
        $result = $this->http->post(config('external.forum') . 'check_login_ttv_web', [ 'json' => $credential ]);
        if ($result) {
            $response = json_decode($result->getBody());
            return $response->status
                ? $response->user
                : null;
        }
        return null;
    }

    public function attemptByApi($forum_result)
    {
        $forum_result->is_web = 1;
        $result = $this->http->post(config('external.api_v2') . 'login_ttv_app', [ 'json' => $forum_result ]);
        if ($result) {
            $response = json_decode($result->getBody());
            return $response->status
                ? $this->userRepo->findById($response->user->id)
                : null;
        }
        return null;
    }
}
