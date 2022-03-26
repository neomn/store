<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_number'=>$this->faker->unique->numberBetween(1000000000,5000000000),
            'product_name'=>$this->faker->unique->name,
            'available_count'=>$this->faker->unique->numberBetween(0,500),
            'is_active'=>$this->faker->boolean,
            'created_at'=>$this->faker->dateTimeBetween('-2 years' , 'now'),
        ];
    }
}
