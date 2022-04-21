<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $types = ['Coupe', 'Sedan', 'Hatchback', 'SUV', 'Estate'];

        foreach ($types as $type) {

            DB::table('types')->insert([
                'name' => $type
            ]);

        }

    }
}
