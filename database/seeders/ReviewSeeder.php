<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    // Chance that a given completed appointment gets a review
    protected float $reviewChance = 0.7;

    public function run(): void
    {
        $completedAppointments = DB::table('appointments')
            ->where('status', 'completed')
            ->get(['id', 'property_id', 'agent_id']);

        foreach ($completedAppointments as $appointment) {
            if (!fake()->boolean((int) ($this->reviewChance * 100))) {
                continue;
            }

            DB::table('reviews')->insert([
                'appointment_id' => $appointment->id,
                'agent_id' => $appointment->agent_id,
                'property_id' => $appointment->property_id,
                'rating' => fake()->numberBetween(3, 5),
                'comment' => fake()->paragraph(2),
                'featured' => fake()->boolean(30),
                'status' => fake()->boolean(80) ? 1 : 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
