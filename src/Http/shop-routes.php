<?php
use Illuminate\Support\Facades\Route;
/**
 * Create a route for adding script
 */
Route::group([
        'prefix'     => 'allinoneaccessibility',
        'middleware' => ['web', 'theme', 'locale', 'currency']
    ], function () {

        Route::get('/', 'SkynetTechnologies\AllinOneAccessibility\Http\Controllers\Shop\AllinOneAccessibilityController@index')->defaults('_config', [
            'view' => 'allinoneaccessibility::shop.index',
        ])->name('shop.allinoneaccessibility.index');

});