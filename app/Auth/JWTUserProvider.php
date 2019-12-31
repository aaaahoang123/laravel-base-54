<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 4:08 PM
 */

namespace App\Auth;


use App\Enums\CacheKey;
use App\Repositories\Contracts\UserRepository;
use Cache;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use JWTAuth;

class JWTUserProvider implements UserProvider
{
    /**
     * @var UserRepository
     */
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        return $this->authService->findById($identifier);
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed $identifier
     * @param  string $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        $cache_key = CacheKey::AUTH_CACHE_KEY . $token;
        $user = Cache::get($cache_key);
        if (!$user) {
            $user = $this->authService->decodeToken($token);
        }
        if ($user) {
            Cache::put($cache_key, $user, Carbon::now()->addMinutes(config('cache.ttl')));
        }
        return $user;
    }

    public function updateRememberToken(Authenticatable $user, $token) {}

    public function retrieveByCredentials(array $credentials) { }

    public function validateCredentials(Authenticatable $user, array $credentials) { }
}
