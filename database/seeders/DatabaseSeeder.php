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
            ImporterCountrySeeder::class,
            VehicleFuelTypeSeeder::class,
            VehicleMarkSeeder::class,
            VehicleModelSeeder::class,
            DeliveryCountrySeeder::class,
        ]);
    }
}
