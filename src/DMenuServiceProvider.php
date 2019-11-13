<?php

namespace YubarajShrestha\DMenu;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class DMenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('YubarajShrestha\DMenu\Controllers\DMenuController');
        
        $this->app->singleton('dmenu', function() {
            return new dmenu;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        // $this->loadViewsFrom(__DIR__.'/views', 'dmenu');x

        $this->publishes([
            __DIR__.'/assets' => public_path('dmenu'),
            __DIR__.'/views' => resource_path('views/dmenu'),
			__DIR__ . '/config/config.php' => base_path('config/dmenu.php')
		], 'dmenu');
    }

}
