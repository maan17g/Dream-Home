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
        'agent_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
