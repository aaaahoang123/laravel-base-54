<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 1/1/20
 * Time: 10:58 AM
 */

namespace App\Services\Impls;


use App\Services\Contracts\DtoBuilderService;
use App\User;

class DtoBuilderServiceImpl implements DtoBuilderService
{

    /**
     * @param User $user
     * @param null $token
     * @return mixed
     */
    public function buildUserDto($user, $token = null)
    {
        return [
            'id' => $user->id,
            'user_name' => $user->user_name,
            'full_name' => $user->full_name,
            'created_at' => $user->created_at->format(COMMON_DATE_TIME_FORMAT),
            'updated_at' => $user->updated_at->format(COMMON_DATE_TIME_FORMAT),
            'lock_active' => $user->lock_active,
            'bot' => $user->bot ? (int) $user->bot : 0,
            'avatar' => $user->avatar,
            'avatar_url' => config('external.api_v2') . 'images_user/' . $user->avatar,
            'access_token' => $token
        ];
    }
}
