<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 4:52 PM
 */

namespace App\Providers\Traits;

use Illuminate\Contracts\Foundation\Application;

trait AutoBindSingletons
{
    public function register()
    {
        if ($this->hasValidProperties()) {
            /** @var Application $app */
            $app = $this->app;
            foreach ($this->singletons as $abstract => $concrete) {
                $app->singleton($abstract, $concrete);
            }
        }
    }

    private function hasValidProperties()
    {
        return
            property_exists($this, 'singletons')
            && is_array($this->singletons)
            && property_exists($this, 'app')
            && $this->app instanceof Application;
    }
}
