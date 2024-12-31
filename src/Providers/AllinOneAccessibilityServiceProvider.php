<?php

namespace SkynetTechnologies\AllinOneAccessibility\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
// use SkynetTechnologies\AllinOneAccessibility\Models\AllinOneAccessibility;

class AllinOneAccessibilityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->publishes([
        //     __DIR__.'/Database/Migrations/' => database_path('migrations')
        // ], 'migrations');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__ . '/../Http/admin-routes.php');

        $this->loadRoutesFrom(__DIR__ . '/../Http/shop-routes.php');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'allinoneaccessibility');

        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('themes/default/assets'),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'allinoneaccessibility');

        // Event::listen('bagisto.admin.layout.head', function ($viewRenderEventManager) {
            // $viewRenderEventManager->addTemplate('allinoneaccessibility::admin.layouts.master');
        // });

        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/acl.php',
            'acl'
        );
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        // dd("irname(__DIR__) . '/Config/admin-menu.php', ",dirname(__DIR__) . '/Config/admin-menu.php',);
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/admin-menu.php',
            'menu.admin'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/acl.php',
            'acl'
        );
    }
}