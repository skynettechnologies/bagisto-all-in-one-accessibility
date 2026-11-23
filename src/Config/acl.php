<?php

/**
 * Admin permission. Bagisto refuses every admin route that is not listed here
 * (for roles without "all" permissions), so both routes of the settings page
 * belong to this entry. The key matches the menu item in admin-menu.php.
 */
return [
    [
        'key' => 'allinoneaccessibility',
        'name' => 'allinoneaccessibility::app.title',
        'route' => [
            'admin.allinoneaccessibility.index',
            'admin.allinoneaccessibility.route',
        ],
        'sort' => 1,
    ],
];
