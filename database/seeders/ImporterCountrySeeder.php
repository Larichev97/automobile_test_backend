<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImporterCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 5; $i++)
        {
            DB::table('importer_countries')->insert([
                'name' => 'Страна_импортёр_' . $i,
                'price' => \mt_rand(500.00, 3000.00),
            ]);
        }
    }
}
