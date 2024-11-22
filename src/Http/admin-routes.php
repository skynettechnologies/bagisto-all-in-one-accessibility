<?php
use SkynetTechnologies\AllinOneAccessibility\Http\Controllers\Admin\AllinOneAccessibilityController;
use Illuminate\Support\Facades\Route;
/**
 * Create Routes on Admin panel for Widget
 */
Route::group([
        'prefix'        => 'admin/allinoneaccessibility',
        'middleware'    => ['web', 'admin']
    ], function () {

        Route::get('', 'SkynetTechnologies\AllinOneAccessibility\Http\Controllers\Admin\AllinOneAccessibilityController@index')->defaults('_config', [
            'view' => 'allinoneaccessibility::admin.index',
        ])->name('admin.allinoneaccessibility.index');

        Route::get('/allinoneaccessibility', [AllinOneAccessibilityController::class, 'admin.allinoneaccessibility.index']);
        Route::get('/allinoneaccessibility', [AllinOneAccessibilityController::class, 'index']);
        Route::post('/store', [AllinOneAccessibilityController::class, 'store'])->name('admin.aioa.store');
        Route::post('/update/{id}', [AllinOneAccessibilityController::class, 'update'])->name('aioa.update');

});