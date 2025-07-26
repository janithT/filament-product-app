<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'test@testuser.com'],
            [
                'name' => 'Test User',
                'email' => 'test@testuser.com',
                'password' => Hash::make('Test@123'),
            ]
        );

        $this->call([
            ProductColorSeeder::class,
        ]);

    }
}
