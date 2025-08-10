<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    protected $fillable = [
        'name',
        'address',
        'currency',
        'tax_rate',
    ];

    /**
     * Get the units for the property.
     */
    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }
}
