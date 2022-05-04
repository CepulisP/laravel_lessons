<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->sentence,
            'user_id' => rand(29, 38),
            'ad_id' => [rand(1, 10), rand(43, 53)][rand(0, 1)],
        ];
    }
}
