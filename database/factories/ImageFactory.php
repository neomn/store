<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'url' => $this->faker->imageUrl,
            'display_order' => $this->faker->numberBetween(1 , 10),
            'created_at' => $this->faker->dateTimeBetween('-2 years' , 'now'),
        ];
    }
}
