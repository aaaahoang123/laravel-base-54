<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/30/19
 * Time: 8:09 PM
 */

namespace App\Enums;


use App\Enums\Contracts\Enum;

class CacheKey extends Enum
{
    const AUTH_CACHE_KEY = 'authorization_';
}
