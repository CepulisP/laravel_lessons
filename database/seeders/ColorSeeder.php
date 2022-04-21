<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $colors = ['White', 'Black', 'Grey', 'Blue', 'Red', 'Green', 'Yellow', 'Pink', 'Orange', 'Purple', 'Brown', 'Silver', 'Gold'];

        foreach ($colors as $color) {

            DB::table('colors')->insert([
                'name' => $color
            ]);

        }

    }
}
