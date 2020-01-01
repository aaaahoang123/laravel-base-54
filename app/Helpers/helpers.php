<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 10:50 AM
 */
require_once 'restful.php';
require_once 'constant.php';

if (!function_exists('is_sequential_array')) {
    function is_sequential_array($arr) {
        return is_array($arr) && $arr === array_values($arr);
    }
}
