<?php

namespace SkynetTechnologies\AllinOneAccessibility\Models;

use Illuminate\Database\Eloquent\Model;
use SkynetTechnologies\AllinOneAccessibility\Contracts\AllinOneAccessibility as AllinOneAccessibilityContract;

class AllinOneAccessibility extends Model implements AllinOneAccessibilityContract
{
    /**
     * Widget settings saved by extension versions before 2.0.
     *
     * @var string
     */
    protected $table = 'aioa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'license_key',
        'color_code',
        'icon_position',
        'icon_type',
        'icon_size',
    ];
}
