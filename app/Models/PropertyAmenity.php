<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyAmenity extends Model
{
    protected $table = 'property_amenities';

    protected $fillable = ['property_id', 'amenity_id'];

    public function property()
    {
        return $this->hasMany(Property::class);
    }

    public function amenity()
    {
        return $this->hasMany(Amenity::class);
    }
}
