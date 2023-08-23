<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            LogSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => env("ADMIN_NAME"),
            'email' => env('ADMIN_EMAIL'),
            'password' => env('ADMIN_PASSWORD')
        ]);
    }
}
