<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
     protected $fillable = [
        'user_id',
        'otp',
        'used'
    ];
    public function otp(){
    return $this->belongsTo(User::class);
     }
}
