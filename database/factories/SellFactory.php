<?php

namespace Database\Factories;

use App\Models\Sell;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sell::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sold_count'=>$this->faker->numberBetween(0 , 50),
            'created_at'=>$this->faker->unique()->dateTimeBetween('-2 years' , 'now')->format('Y-m-d H:i:s'),
        ];
    }
}
