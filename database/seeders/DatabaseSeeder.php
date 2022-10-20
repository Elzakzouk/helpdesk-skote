<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // RegionSeeder::class,
            CitySeeder::class,
            // RoleSeeder::class,
            // UserSeeder::class,
            // TeamSeeder::class,
            // TicketType::class,
            // TicketStatus::class,
            // TicketActivity::class,
            // TicketPriority::class
        ]);
    }
}
