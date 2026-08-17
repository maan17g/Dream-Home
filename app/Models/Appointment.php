<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    protected $fillable = [
        'property_id',
        'user_id',
        'agent_id',
        'scheduled_at',
        'notes',
        'status',
    ];

    /**
     * Get the property for this appointment.
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Get the user (visitor) who requested this appointment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
      public function review(){
    return $this->hasOne(Review::class);
  }
    /**
     * Get the agent assigned to this appointment.
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class);
    }
}