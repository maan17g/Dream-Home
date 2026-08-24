<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AgentSeeder extends Seeder
{
    protected array $agentTypes = [
        'agent', 'rental_specialist', 'luxury_agent', 'commercial_agent',
        'residential_agent', 'land_specialist', 'new_construction', 'property_manager',
    ];

    public function run(): void
    {
        $agentUserIds = DB::table('users')->where('role', 'agent')->pluck('id');

        foreach ($agentUserIds as $userId) {
            DB::table('agents')->insert([
                'user_id' => $userId,
                'bio' => fake()->boolean(60) ? fake()->paragraph() : null,
                'license_no' => 'LIC-' . strtoupper(Str::random(8)),
                'years_experience' => fake()->numberBetween(0, 20),
                'agent_type' => fake()->randomElement($this->agentTypes),
                'facebook' => fake()->boolean(30) ? 'https://facebook.com/' . fake()->userName() : null,
                'instagram' => fake()->boolean(30) ? 'https://instagram.com/' . fake()->userName() : null,
                'linkedin' => fake()->boolean(30) ? 'https://linkedin.com/in/' . fake()->userName() : null,
                'twitter' => fake()->boolean(20) ? 'https://twitter.com/' . fake()->userName() : null,
                'rating' => fake()->randomFloat(2, 3, 5),
                'approval_status' => fake()->randomElement(['pending', 'approved', 'approved', 'approved']),
                'is_featured' => fake()->boolean(25),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
