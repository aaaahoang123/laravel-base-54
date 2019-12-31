<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 4:52 PM
 */

namespace App\Providers\Traits;


use Exception;
use Illuminate\Contracts\Foundation\Application;

trait AutoBindSingletons
{
    public function register() {
        $this->validateProperties();
        foreach ($this->singletons as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
    }

    private function validateProperties() {
        if (!property_exists($this, 'singletons')) {
            throw new Exception(__('Please write singletons property as an array in class: ' . self::class));
        }
        if (!property_exists($this, 'app')) {
            throw new Exception(__('Please write app property as an instance of: ' . Application::class . ' in class: ' . self::class));
        }
    }
}
