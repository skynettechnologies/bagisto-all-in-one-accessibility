<?php
namespace SkynetTechnologies\AllinOneAccessibility\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
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
        if (!Schema::hasTable('aioa')) {
            // Code to create table
            Schema::create('aioa', function (Blueprint $table) {
                $table->id();
                $table->string('license_key')->nullable();
                $table->string('color_code')->nullable();
                $table->string('icon_position')->nullable();
                $table->string('icon_type')->nullable();
                $table->string('icon_size')->nullable();
                $table->timestamps();
            });
        } else {

        }
        $scriptParameters = AllinOneAccessibility::first();

        // dd("parameters :",$scriptParameters);
        // Event::listen('bagisto.admin.layout.head', function ($viewRenderEventManager) use ($scriptParameters) {
        //     $viewRenderEventManager->addTemplate(view('allinoneaccessibility::custom-script', ['parameters' => $scriptParameters])->render());
        // });
        Event::listen('bagisto.shop.layout.head', function ($viewRenderEventManager) use ($scriptParameters) {
            $viewRenderEventManager->addTemplate(view('allinoneaccessibility::custom-script', ['parameters' => $scriptParameters])->render());
        });

        Event::listen('bagisto.shop.layout.body.after', function ($viewRenderEventManager) use ($scriptParameters) {
            $viewRenderEventManager->addTemplate(view('allinoneaccessibility::custom-script', ['parameters' => $scriptParameters])->render());
        });
    }
}