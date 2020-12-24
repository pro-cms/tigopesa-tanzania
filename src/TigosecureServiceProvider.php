<?php

namespace Epmnzava\Tigosecure;

use Illuminate\Support\ServiceProvider;

class TigosecureServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('tigosecure.php'),
            ], 'config');


        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'tigosecure');

        // Register the main class to use with the facade
        $this->app->singleton('tigosecure', function () {
            return new Tigosecure;
        });
    }
}
