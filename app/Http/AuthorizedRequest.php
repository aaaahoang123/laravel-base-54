<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 1/1/20
 * Time: 11:26 AM
 */

namespace App\Http;


trait AuthorizedRequest
{
    protected function user() {
        return request()->user();
    }
}
