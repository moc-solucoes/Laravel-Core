<?php

namespace MOCSolutions\Core;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'Helpers' . DIRECTORY_SEPARATOR . "Functions.php";
        $this->loadRoutesFrom(__DIR__ . DS . '..' . DS . 'routes' . DS . 'web.php');
        $this->loadViewsFrom(__DIR__ . DS . 'Views', 'Core');
        $this->loadMigrationsFrom(__DIR__ . DS . '..' . DS . 'database' . DS . 'migrations');
        $this->publishes([
            __DIR__ . DS . '..' . DS . 'public' => public_path()
        ], 'Core/public');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
