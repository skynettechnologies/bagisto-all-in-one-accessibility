<?php

namespace SkynetTechnologies\AllinOneAccessibility\Models;

use Illuminate\Database\Eloquent\Model;
use SkynetTechnologies\AllinOneAccessibility\Contracts\AllinOneAccessibility as AllinOneAccessibilityContract;

class AllinOneAccessibility extends Model implements AllinOneAccessibilityContract
{
    protected $table = 'aioa';

    protected $fillable = [
        'license_key',
        'color_code',
        'icon_position',
        'icon_type',
        'icon_size',

    ];
}