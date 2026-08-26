<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
{
    // How many properties to generate per agent
    protected int $perAgent = 2;

    protected array $types = ['house', 'apartment', 'office', 'villa', 'land'];
    protected array $purposes = ['sale', 'rent'];

    public function run(): void
    {
        $agentIds = DB::table('agents')->pluck('id');
        $cityIds = DB::table('cities')->pluck('id');

        foreach ($agentIds as $agentId) {
            for ($i = 0; $i < $this->perAgent; $i++) {
                $title = ucfirst(fake()->words(3, true));
                $type = fake()->randomElement($this->types);

                DB::table('properties')->insert([
                    'agent_id' => $agentId,
                    'title' => $title,
                    'slug' => Str::slug($title) . '-' . fake()->unique()->numberBetween(1000,49999),
                    'description' => fake()->paragraph(4),
                    'purpose' => fake()->randomElement($this->purposes),
                    'type' => $type,
                    'city_id' => fake()->randomElement($cityIds->toArray()),
                    'price' => fake()->numberBetween(1000, 49999),
                    'area' => fake()->numberBetween(3, 100) * 10,
                    'bedrooms' => $type === 'land' ? 0 : fake()->numberBetween(1, 6),
                    'bathrooms' => $type === 'land' ? 0 : fake()->numberBetween(1, 5),
                    'garages' => fake()->numberBetween(0, 3),
                    'featured' => fake()->boolean(13),
                    'floors' => $type === 'land' ? 0 : fake()->numberBetween(1, 5),
                    'year_built' => fake()->numberBetween(1980, 2026),
                    'views' => fake()->numberBetween(0, 500),
                    'verified' => fake()->randomElement(['pending', 'approved', 'approved', 'rejected']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
