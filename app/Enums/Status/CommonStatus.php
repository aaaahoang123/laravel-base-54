<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 4:21 PM
 */

namespace App\Enums\Status;


use App\Enums\Contracts\Enum;

class CommonStatus extends Enum
{
    const ACTIVE = 1;
    const INACTIVE = 0;
}
