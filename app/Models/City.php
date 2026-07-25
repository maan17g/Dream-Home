<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['city', 'state', 'country', 'address_line', 'latitude', 'longitude'];

      public function properties(): HasMany
    {
        return $this->hasMany(Property::class, 'city_id');
    }
}