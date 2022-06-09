<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleFuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_fuel_types')->insert([
            'name' => 'Дизель',
        ]);

        DB::table('vehicle_fuel_types')->insert([
            'name' => 'Бензин',
        ]);
    }
}
