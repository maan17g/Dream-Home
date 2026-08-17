<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'appointment_id',
        'property_id',
        'agent_id',
        'user_id',
        'rating',
        'comment',
        'featured',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class); // FIXED
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}