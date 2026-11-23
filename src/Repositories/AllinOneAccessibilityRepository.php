<?php

namespace SkynetTechnologies\AllinOneAccessibility\Repositories;

use SkynetTechnologies\AllinOneAccessibility\Contracts\AllinOneAccessibility;
use Webkul\Core\Eloquent\Repository;

class AllinOneAccessibilityRepository extends Repository
{
    /**
     * Specify model class name.
     */
    public function model(): string
    {
        return AllinOneAccessibility::class;
    }

    /**
     * License key saved by extension versions before 2.0, or an empty string when none was saved.
     */
    public function legacyLicenseKey(): string
    {
        return (string) $this->first()?->license_key;
    }
}
