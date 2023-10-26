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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            SysmodSeeder::class,
            AmenitieSeeder::class,
            DeveloperSeeder::class,
            BrokerSeeder::class,
            PhaseSeeder::class,
            DclassSeeder::class,
            DtypeSeeder::class,
            DevelopSeeder::class,
            DstageSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
