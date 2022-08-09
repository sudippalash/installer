<?php

namespace Sudip\Installer\Providers;

use Illuminate\Support\ServiceProvider;
use Sudip\Installer\Services\Steps;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/installer.php', 'installer'
        );
    }


    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'installerview');

        view()->composer(['installerview::components.title'], function($q) {
            $q->with('steps', Steps::get());
        });

        $this->publishes([
            __DIR__ . '/../../config/installer.php' => config_path('installer.php'),
        ], 'config');
    }
}
