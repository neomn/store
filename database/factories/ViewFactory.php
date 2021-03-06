<?php

namespace Database\Factories;

use App\Models\View;
use Illuminate\Database\Eloquent\Factories\Factory;

class ViewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = View::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'count'=>$this->faker->numberBetween(1 , 500),
            'created_at'=>$this->faker->dateTimeBetween('-3 month' , 'now')->format('Y-m-d h:m:s'),
        ];
    }
}
