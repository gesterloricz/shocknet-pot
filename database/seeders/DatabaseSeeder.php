<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Call our master data seeders
        $this->call([
            UserSeeder::class,
            // Add other seeders here as needed
        ]);
    }
}
