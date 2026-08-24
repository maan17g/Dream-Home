<?php

namespace Database\Seeders;

use Database\Seeders\Support\DummyImageDownloader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    // Adjust these counts freely — total users = ADMINS + AGENTS + BUYERS
    protected int $admins = 3;
    protected int $agents = 12;
    protected int $buyers = 20;

    public function run(): void
    {
        $this->createBatch('admin', $this->admins);
        $this->createBatch('agent', $this->agents);
        $this->createBatch('buyer', $this->buyers);
    }

    protected function createBatch(string $role, int $count): void
    {
        for ($i = 0; $i < $count; $i++) {
            $id = DB::table('users')->insertGetId([
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'email' => fake()->unique()->safeEmail(),
                'role' => $role,
                'password' => Hash::make('password'),
                'avatar' => 'avatars/default.png', // placeholder, replaced below
                'is_verified' => true,
                'newsletter' => fake()->boolean(40),
                'phone' => fake()->boolean(70) ? fake()->phoneNumber() : null,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Download a real avatar and update the row with the actual path
            $avatarPath = DummyImageDownloader::userAvatar($id);
            DB::table('users')->where('id', $id)->update(['avatar' => $avatarPath]);
        }
    }
}
