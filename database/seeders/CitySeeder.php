<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            ['city' => 'Karachi', 'state' => 'Sindh'],
            ['city' => 'Lahore', 'state' => 'Punjab'],
            ['city' => 'Multan', 'state' => 'Punjab'],
            ['city' => 'Rawalpindi', 'state' => 'Punjab'],
            ['city' => 'Hyderabad', 'state' => 'Sindh'],
            ['city' => 'Peshawar', 'state' => 'Khyber Pakhtunkhwa'],
            ['city' => 'Quetta', 'state' => 'Balochistan'],
            ['city' => 'Islamabad', 'state' => 'Islamabad Capital Territory'],
            ['city' => 'Sialkot', 'state' => 'Punjab'],
            ['city' => 'Bahawalpur', 'state' => 'Punjab'],
            ['city' => 'Sargodha', 'state' => 'Punjab'],
            ['city' => 'Sukkur', 'state' => 'Sindh'],
            ['city' => 'Larkana', 'state' => 'Sindh'],
            ['city' => 'Sheikhupura', 'state' => 'Punjab'],
            ['city' => 'Mardan', 'state' => 'Khyber Pakhtunkhwa'],
            ['city' => 'Rahim Yar Khan', 'state' => 'Punjab'],
            ['city' => 'Sahiwal', 'state' => 'Punjab'],
            ['city' => 'Okara', 'state' => 'Punjab'],
            ['city' => 'Faisalabad', 'state' => 'Punjab'],
            ['city' => 'Gujranwala', 'state' => 'Punjab'],
        ];

        foreach ($cities as $c) {
            DB::table('cities')->updateOrInsert(
                ['city' => $c['city'], 'state' => $c['state']],
                [
                    'country' => 'Pakistan',
                    'address_line' => fake()->streetAddress(),
                    'latitude' => null,
                    'longitude' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
