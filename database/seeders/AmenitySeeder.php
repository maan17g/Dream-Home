<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmenitySeeder extends Seeder
{
    public function run(): void
    {
        $amenities = [
            ['Air Conditioning', 'bi-snow'],
            ['Central Heating', 'bi-thermometer-sun'],
            ['High-Speed Wi-Fi', 'bi-wifi'],
            ['Electricity Backup / Generator', 'bi-lightning-charge'],
            ['Solar Panels', 'bi-sun'],
            ['Water Supply', 'bi-droplet'],
            ['24/7 Security Service', 'bi-shield-check'],
            ['CCTV Security Cameras', 'bi-camera-video'],
            ['Gated Community', 'bi-door-closed'],
            ['Fire Alarm System', 'bi-fire'],
            ['Intercom System', 'bi-telephone-inbound'],
            ['Private Garage', 'bi-car-front'],
            ['Covered Parking', 'bi-p-square'],
            ['EV Charging Station', 'bi-ev-station'],
            ['Elevator / Lift', 'bi-arrow-down-up'],
            ['Wheelchair Accessible', 'bi-person-wheelchair'],
            ['Swimming Pool', 'bi-water'],
            ['Sauna & Steam Room', 'bi-moisture'],
            ['Jacuzzi / Hot Tub', 'bi-cup-hot'],
            ['Tennis / Basketball Court', 'bi-dribbble'],
            ['Children Play Area', 'bi-balloon'],
            ['Clubhouse / Community Hall', 'bi-building-gear'],
            ['Balcony / Terrace', 'bi-border-outer'],
            ['Private Garden / Lawn', 'bi-tree'],
            ['Barbecue (BBQ) Area', 'bi-fire'],
            ['Roof Deck', 'bi-house-up'],
            ['Furnished', 'bi-lamp'],
            ['Walk-in Closet', 'bi-box-seam'],
            ['Laundry Room', 'bi-tsunami'],
            ['Pet Friendly', 'bi-heart-pulse'],
            ['Servant Quarter', 'bi-person-badge'],
            ['Waste Disposal System', 'bi-trash'],
            ['Cleaning & Housekeeping', 'bi-stars'],
            ['Concierge Service', 'bi-person-workspace'],
        ];

        foreach ($amenities as [$name, $icon]) {
            DB::table('amenities')->updateOrInsert(
                ['name' => $name],
                ['icon' => $icon]
            );
        }
    }
}
