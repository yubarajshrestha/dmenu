<?php

namespace YubarajShrestha\DMenu;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

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

        Blade::component('dmenu.components.pages', 'tPages');
        Blade::component('dmenu.components.dynamic', 'tDynamic');
        Blade::component('dmenu.components.static', 'tStatic');
        Blade::component('dmenu.components.menu', 'tMenu');
        Blade::component('dmenu.components.form', 'tMenuForm');
        Blade::component('dmenu.components.menu-item', 'tMenuItem');
        Blade::component('dmenu.components.styles', 'tStyles');
        Blade::component('dmenu.components.scripts', 'tScripts');
        Blade::component('dmenu.components.save', 'tSubmit');

        $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        // $this->loadViewsFrom(__DIR__.'/views', 'dmenu');x

        $this->publishes([
            __DIR__.'/assets' => public_path('dmenu'),
            __DIR__.'/views' => resource_path('views/dmenu'),
			__DIR__ . '/config/config.php' => base_path('config/dmenu.php')
		], 'dmenu');

        $dm = config('dmenu.route-name');
        if($dm) {
            View::share('dmRoute', $dm);
        }
    }

}
