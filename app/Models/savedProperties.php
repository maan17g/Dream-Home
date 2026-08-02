<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class savedProperties extends Model
{
    protected $table = 'saved_properties';

    protected $fillable = ['user_id', 'property_id'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }
}
