<?php

namespace Database\Seeders;

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
            BusSeeder::class,
            CitySeeder::class,
            RidesSeeder::class,
            SeatSeeder::class
        ]);
    }
}
