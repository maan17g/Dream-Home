<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyAmenitySeeder extends Seeder
{
    public function run(): void
    {
        $propertyIds = DB::table('properties')->pluck('id');
        $amenityIds = DB::table('amenities')->pluck('id')->toArray();

        foreach ($propertyIds as $propertyId) {
            $picked = fake()->randomElements($amenityIds, fake()->numberBetween(2, 6));

            foreach (array_unique($picked) as $amenityId) {
                DB::table('property_amenities')->insert([
                    'property_id' => $propertyId,
                    'amenity_id' => $amenityId,
                ]);
            }
        }
    }
}
