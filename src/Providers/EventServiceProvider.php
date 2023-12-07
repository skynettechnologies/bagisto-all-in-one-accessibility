<?php
namespace SkynetTechnologies\AllinOneAccessibility\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use SkynetTechnologies\AllinOneAccessibility\Models\AllinOneAccessibility;

/**
 * EventServiceProvider
 *
 * @copyright Copyright © 2020 Bagisto Brasil. All rights reserved.
 * @author    Carlos Gartner <contato@carlosgartner.com.br>
 */

class EventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $scriptParameters = AllinOneAccessibility::first();

        // dd("parameters :",$scriptParameters);
        // Event::listen('bagisto.admin.layout.head', function ($viewRenderEventManager) use ($scriptParameters) {
        //     $viewRenderEventManager->addTemplate(view('allinoneaccessibility::custom-script', ['parameters' => $scriptParameters])->render());
        // });

        

        // Event::listen('bagisto.shop.layout.head', function ($viewRenderEventManager) use ($scriptParameters) {
        //     $viewRenderEventManager->addTemplate(view('allinoneaccessibility::custom-script', ['parameters' => $scriptParameters])->render());
        // });
    }
}