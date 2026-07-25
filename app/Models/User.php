<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'avatar',
        'phone',
        'is_verified',
        'newsletter',
        'role',
    ];

    /**
     * A User has one Agent profile.
     * Table relationship: agents.user_id -> users.id
     */
    public function agent(): HasOne
    {
        return $this->hasOne(Agent::class, 'user_id');
    }

    /**
     * A User has many Properties THROUGH their Agent profile.
     * Allows: $user->properties
     */
 

    /**
     * A User has one active OTP record.
     */
    public function otp(): HasOne
    {
        return $this->hasOne(Otp::class, 'user_id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}