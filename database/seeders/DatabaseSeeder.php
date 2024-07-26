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

        // User::factory()->create([
        //     'username' => 'admin',
        //     'name' => 'Administrator',
        //     'email' => 'admin@example.com',
        //     'phone' => '1234567890',
        //     'password' => Hash::make('123456'),
        // ]);

        // $this->call(RoomSeeder::class);
        // $this->call(MaterialSeeder::class);
        // $this->call(ToolSeeder::class);
        // $this->call(RoomDetailSeeder::class);
        // $this->call(RecommendSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserRoleSeeder::class);
    }
}
