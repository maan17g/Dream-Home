<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactInquirySeeder extends Seeder
{
    protected int $total = 8;

    public function run(): void
    {
        for ($i = 0; $i < $this->total; $i++) {
            DB::table('contact_inquiries')->insert([
                'full_name' => fake()->name(),
                'email' => fake()->safeEmail(),
                'phone' => fake()->boolean(70) ? fake()->phoneNumber() : null,
                'message' => fake()->paragraph(2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
