<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\View;
use Database\Factories\ViewFactory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Product::factory(200)->has(View::factory()->count(random_int(1,20)))
           ->create();
    }
}
