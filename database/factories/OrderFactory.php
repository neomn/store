<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'count' => $this->faker->randomNumber(1,200),
            'created_at' => $this->faker->dateTimeBetween('-6 month' , 'now')->format('Y-m-d h:m:s'),
        ];
    }
}
