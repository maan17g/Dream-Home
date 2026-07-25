<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'icon'];

    public function properties()
    {
       return $this->belongsToMany(Property::class, 'property_amenities');
    }
}