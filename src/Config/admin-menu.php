<?php

/**
 * Admin menu: All in One Accessibility, a top-level item right below Dashboard.
 * The icon class is styled by Resources/views/admin/menu-icon.blade.php.
 */
return [
    [
        'key' => 'allinoneaccessibility',
        'name' => 'allinoneaccessibility::app.title',
        'route' => 'admin.allinoneaccessibility.index',
        'sort' => 1,
        'icon' => 'icon-allinoneaccessibility',
    ],
];
