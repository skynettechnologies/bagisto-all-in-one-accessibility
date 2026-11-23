<?php

namespace SkynetTechnologies\AllinOneAccessibility\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use SkynetTechnologies\AllinOneAccessibility\Repositories\AllinOneAccessibilityRepository;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Add the menu icon style to every admin page and the widget script to every storefront page.
     */
    public function boot(): void
    {
        Event::listen('bagisto.admin.layout.head.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('allinoneaccessibility::admin.menu-icon');
        });

        Event::listen('bagisto.shop.layout.body.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate(
                view('allinoneaccessibility::custom-script', ['token' => $this->legacyToken()])->render()
            );
        });
    }

    /**
     * License key saved by extension versions before 2.0 (table "aioa"), passed on to the
     * widget as "token"; empty when there is none or the table does not exist.
     */
    protected function legacyToken(): string
    {
        return (string) rescue(fn () => app(AllinOneAccessibilityRepository::class)->legacyLicenseKey(), '', false);
    }
}
