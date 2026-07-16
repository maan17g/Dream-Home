<?php

namespace App\Models;
use App\Models\Image;
use App\Models\City;
use App\Models\Amenity;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    // protected $fillable=[''];
    public function agent(){
        return $this->hasMany(User::class,'id','agent_id');
    }
    public function image(){
        return $this->hasMany(Image::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function amenity(){
        return $this->hasMany(Amenity::class);
    }
}
