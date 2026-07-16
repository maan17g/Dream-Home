<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function property(){
        return $this->hasone(Property::class,'city_id','id');
    }
}
