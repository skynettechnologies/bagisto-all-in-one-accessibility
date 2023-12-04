<?php
use Illuminate\Support\Facades\Route;

Route::group([
        'prefix'     => 'allinoneaccessibility',
        'middleware' => ['web', 'theme', 'locale', 'currency']
    ], function () {

        Route::get('/', 'SkynetTechnologies\AllinOneAccessibility\Http\Controllers\Shop\AllinOneAccessibilityController@index')->defaults('_config', [
            'view' => 'allinoneaccessibility::shop.index',
        ])->name('shop.allinoneaccessibility.index');

});