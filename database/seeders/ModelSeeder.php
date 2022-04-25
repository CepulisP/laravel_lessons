<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $manufacturerModels = [
            '1' => ['M3', 'M5'],
            '2' => ['A4', 'A3'],
            '3' => ['Golf', 'Passat'],
            '4' => ['E350', 'C200'],
            '5' => ['Prius', 'Corolla']
        ];

        foreach ($manufacturerModels as $key => $models) {

            foreach ($models as $model) {

                DB::table('models')->insert([
                    'name' => $model,
                    'manufacturer_id' => $key
                ]);

            }
        }

    }
}
