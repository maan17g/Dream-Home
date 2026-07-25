<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Disable Foreign Key Constraints
        Schema::disableForeignKeyConstraints();

        // 2. Truncate table(s)
        DB::table('amenities')->truncate(); 

        // 3. Re-enable Foreign Key Constraints
        Schema::enableForeignKeyConstraints();

        $amenities = [
            // Basics & Utilities
            ['name' => 'Air Conditioning', 'icon' => 'bi-snow'],
            ['name' => 'Central Heating', 'icon' => 'bi-thermometer-sun'],
            ['name' => 'High-Speed Wi-Fi', 'icon' => 'bi-wifi'],
            ['name' => 'Electricity Backup / Generator', 'icon' => 'bi-lightning-charge'],
            ['name' => 'Solar Panels', 'icon' => 'bi-sun'],
            ['name' => 'Water Supply', 'icon' => 'bi-droplet'],

            // Security & Safety
            ['name' => '24/7 Security Service', 'icon' => 'bi-shield-check'],
            ['name' => 'CCTV Security Cameras', 'icon' => 'bi-camera-video'],
            ['name' => 'Gated Community', 'icon' => 'bi-door-closed'],
            ['name' => 'Fire Alarm System', 'icon' => 'bi-fire'],
            ['name' => 'Intercom System', 'icon' => 'bi-telephone-inbound'],

            // Parking & Access
            ['name' => 'Private Garage', 'icon' => 'bi-car-front'],
            ['name' => 'Covered Parking', 'icon' => 'bi-p-square'],
            ['name' => 'EV Charging Station', 'icon' => 'bi-ev-station'],
            ['name' => 'Elevator / Lift', 'icon' => 'bi-arrow-down-up'],
            ['name' => 'Wheelchair Accessible', 'icon' => 'bi-person-wheelchair'],

            // Leisure & Fitness
            ['name' => 'Swimming Pool', 'icon' => 'bi-water'],
            ['name' => 'Fitness Center / Gym', 'icon' => 'bi-activity'],
            ['name' => 'Sauna & Steam Room', 'icon' => 'bi-moisture'],
            ['name' => 'Jacuzzi / Hot Tub', 'icon' => 'bi-cup-hot'],
            ['name' => 'Tennis / Basketball Court', 'icon' => 'bi-dribbble'],
            ['name' => 'Children Play Area', 'icon' => 'bi-balloon'],
            ['name' => 'Clubhouse / Community Hall', 'icon' => 'bi-building-gear'],

            // Luxury & Interior Features
            ['name' => 'Balcony / Terrace', 'icon' => 'bi-border-outer'],
            ['name' => 'Private Garden / Lawn', 'icon' => 'bi-tree'],
            ['name' => 'Barbecue (BBQ) Area', 'icon' => 'bi-fire'],
            ['name' => 'Roof Deck', 'icon' => 'bi-house-up'],
            ['name' => 'Furnished', 'icon' => 'bi-lamp'],
            ['name' => 'Walk-in Closet', 'icon' => 'bi-box-seam'],
            ['name' => 'Laundry Room', 'icon' => 'bi-tsunami'],

            // Environment & Services
            ['name' => 'Pet Friendly', 'icon' => 'bi-heart-pulse'],
            ['name' => 'Servant Quarter', 'icon' => 'bi-person-badge'],
            ['name' => 'Waste Disposal System', 'icon' => 'bi-trash'],
            ['name' => 'Cleaning & Housekeeping', 'icon' => 'bi-stars'],
            ['name' => 'Concierge Service', 'icon' => 'bi-person-workspace'],
        ];

        DB::table('amenities')->insert($amenities);
    }
}