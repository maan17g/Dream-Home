<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = [
    'user_id',
    'bio',
    'license_no',
    'years_experience',
    'facebook',
    'instagram',
    'linkedin',
    'twitter',
    'rating',
    'approval_status',
    'is_featured',
];
public function user(){
    $this->belongsTo(User::class);
}
  public function property(){
    return $this->hasOne(Property::class);
  }
}
