<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SavedPropertySeeder extends Seeder
{
    protected int $total = 20;

    public function run(): void
    {
        $buyerIds = DB::table('users')->where('role', 'buyer')->pluck('id')->toArray();
        $propertyIds = DB::table('properties')->pluck('id')->toArray();

        if (empty($buyerIds) || empty($propertyIds)) {
            return;
        }

        $seen = [];
        $attempts = 0;

        while (count($seen) < $this->total && $attempts < $this->total * 4) {
            $attempts++;
            $userId = fake()->randomElement($buyerIds);
            $propertyId = fake()->randomElement($propertyIds);
            $key = "{$userId}-{$propertyId}";

            if (isset($seen[$key])) {
                continue;
            }
            $seen[$key] = true;

            DB::table('saved_properties')->insert([
                'user_id' => $userId,
                'property_id' => $propertyId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
