<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 5; $i++) {
            DB::table('delivery_prices')->insert([
                'country_name' => 'Страна_доставки_' . $i,
                'price' => \mt_rand(500.00, 3000.00),
            ]);
        }
    }
}
