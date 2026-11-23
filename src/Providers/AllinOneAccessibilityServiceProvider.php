<?php

namespace SkynetTechnologies\AllinOneAccessibility\Providers;

use Illuminate\Support\ServiceProvider;
use SkynetTechnologies\AllinOneAccessibility\Contracts\AllinOneAccessibility as AllinOneAccessibilityContract;
use SkynetTechnologies\AllinOneAccessibility\Http\Controllers\Admin\AllinOneAccessibilityController;
use SkynetTechnologies\AllinOneAccessibility\Models\AllinOneAccessibility;
use SkynetTechnologies\AllinOneAccessibility\Services\SkynetWidget;

class AllinOneAccessibilityServiceProvider extends ServiceProvider
{
    /**
     * Register the configuration, the admin menu and permission, the model contract and the API service.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(dirname(__DIR__).'/Config/allinoneaccessibility.php', 'allinoneaccessibility');

        $this->mergeConfigFrom(dirname(__DIR__).'/Config/admin-menu.php', 'menu.admin');

        $this->mergeConfigFrom(dirname(__DIR__).'/Config/acl.php', 'acl');

        $this->app->bind(AllinOneAccessibilityContract::class, AllinOneAccessibility::class);

        $this->app->singleton(SkynetWidget::class);
    }

    /**
     * Load the migrations, routes, translations and views, and declare the publishable
     * assets (tag "allinoneaccessibility-assets") and configuration (tag "allinoneaccessibility-config").
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__.'/../Http/admin-routes.php');

        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'allinoneaccessibility');

        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'allinoneaccessibility');

        $this->publishes([
            __DIR__.'/../../publishable/assets' => public_path(AllinOneAccessibilityController::ASSET_DIR),
        ], ['allinoneaccessibility-assets', 'public']);

        $this->publishes([
            dirname(__DIR__).'/Config/allinoneaccessibility.php' => config_path('allinoneaccessibility.php'),
        ], 'allinoneaccessibility-config');

        $this->app->register(EventServiceProvider::class);
    }
}
