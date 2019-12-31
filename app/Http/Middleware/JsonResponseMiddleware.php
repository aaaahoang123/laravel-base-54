<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 11:04 AM
 */

namespace App\Http\Middleware;


use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class JsonResponseMiddleware
{
    public function handle($req, Closure $next) {
        /** @var Response $controllerResponse */
        $controllerResponse = $next($req);
        $data = $controllerResponse->original;
//        dd($data);
        if ($controllerResponse instanceof JsonResponse) {
            return $controllerResponse;
        } elseif (is_array($data) || $data instanceof Collection || $data instanceof Model) {
            $is_multi = false;
            $meta = null;
            if (is_sequential_array($data) || $data instanceof Collection) {
                $is_multi = true;
            } elseif (is_array($data)) {
                $has_data = array_key_exists('data', $data);
                $has_datas = array_key_exists('datas', $data);

                if (array_key_exists('message', $data) && array_key_exists('status', $data) && ($has_data || $has_datas))
                    return response()->json($data);

                if (array_key_exists('meta', $data))
                    $meta = $data['meta'];

                $data = $has_datas
                    ? $data['datas']
                    : $has_data
                        ? $data['data']
                        : $data;
            }
            return restful_success($data, $is_multi, $meta);
        }
        return $controllerResponse;
    }
}
