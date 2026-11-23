<?php

use Illuminate\Support\Facades\Route;
use SkynetTechnologies\AllinOneAccessibility\Http\Controllers\Admin\AllinOneAccessibilityController;
use Webkul\Core\Http\Middleware\NoCacheMiddleware;

/**
 * Admin routes: the settings page and the AJAX router it calls.
 * Both are listed in Config/acl.php, so only admins with the
 * "All in One Accessibility" permission reach them.
 */
Route::group([
    'prefix' => config('app.admin_url').'/allinoneaccessibility',
    'middleware' => array_filter(['web', 'admin', class_exists(NoCacheMiddleware::class) ? NoCacheMiddleware::class : null]),
], function () {
    Route::get('', [AllinOneAccessibilityController::class, 'index'])
        ->name('admin.allinoneaccessibility.index');

    Route::post('route', [AllinOneAccessibilityController::class, 'route'])
        ->name('admin.allinoneaccessibility.route');
});
