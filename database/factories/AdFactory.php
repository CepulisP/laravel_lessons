<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title = $this->faker->text(30);
        $manufacturerId = rand(1, 5);

        switch ($manufacturerId) {
            case 1:
                $modelId = rand(1, 2);
                break;
            case 2:
                $modelId = rand(3, 4);
                break;
            case 3:
                $modelId = rand(5, 6);
                break;
            case 4:
                $modelId = rand(7, 8);
                break;
            case 5:
                $modelId = rand(9, 10);
                break;
        }

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->text(500),
            'years' => rand(1985, 2022),
            'price' => $this->faker->randomFloat(2, 300, 15000),
            'image' => 'https://www.rumneyhillgarage.co.uk/wp-content/themes/master/images/coming_soon.png',
            'vin' => strtoupper(Str::random(17)),
            'user_id' => rand(1, 11),
            'views' => rand(1, 500),
            'active' => 1,
            'manufacturer_id' => $manufacturerId,
            'model_id' => $modelId,
            'type_id' => rand(1, 5),
            'category_id' => 1,
            'color_id' => rand(1, 13),
        ];

    }
}
