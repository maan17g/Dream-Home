<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtpSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id');

        foreach ($userIds as $userId) {
            DB::table('otps')->insert([
                'user_id' => $userId,
                'otp' => str_pad((string) fake()->numberBetween(0, 999999), 6, '0', STR_PAD_LEFT),
                'used' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
