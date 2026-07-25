<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id', 'title', 'slug', 'description', 'purpose',
        'type', 'city_id', 'price', 'area', 'bedrooms',
        'bathrooms', 'garages', 'featured', 'floors', 'year_built', 'views'
    ];

    /**
     * A Property belongs directly to an Agent.
     * Table relationship: properties.agent_id -> agents.id
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    /**
     * A Property belongs to a City.
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * A Property has many images.
     */
    public function images(): HasMany
    {
        return $this->hasMany(PropertyImage::class, 'property_id');
    }

    /**
     * A Property belongs to many Amenities through the pivot table.
     */
    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class, 'property_amenities');
    }
}