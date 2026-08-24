<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CitySeeder::class,
            AmenitySeeder::class,
            UserSeeder::class,           // downloads avatar images
            AgentSeeder::class,
            PropertySeeder::class,
            PropertyImageSeeder::class,  // downloads property images
            PropertyAmenitySeeder::class,
            AppointmentSeeder::class,
            ReviewSeeder::class,
            SavedPropertySeeder::class,
            OtpSeeder::class,
            ContactInquirySeeder::class,
        ]);
    }
}
