<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    protected int $total = 25;
    protected array $statuses = ['pending', 'confirmed', 'completed', 'cancelled'];

    public function run(): void
    {
        $buyerIds = DB::table('users')->where('role', 'buyer')->pluck('id')->toArray();
        // property_id -> agent_id map (properties.agent_id already points at agents.id,
        // and appointments.agent_id references the same agents.id — confirmed against your dump)
        $properties = DB::table('properties')->pluck('agent_id', 'id');

        if (empty($buyerIds) || $properties->isEmpty()) {
            return;
        }

        for ($i = 0; $i < $this->total; $i++) {
            $propertyId = $properties->keys()->random();
            $agentId = $properties[$propertyId];

            DB::table('appointments')->insert([
                'property_id' => $propertyId,
                'user_id' => fake()->randomElement($buyerIds),
                'agent_id' => $agentId,
                'scheduled_at' => fake()->dateTimeBetween('-1 month', '+2 months'),
                'status' => fake()->randomElement($this->statuses),
                'notes' => fake()->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
