<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use App\Models\Sell;
use App\Models\View;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arduino = Category::where('category','Arduino Family')->first();
        $raspberry = Category::where('category' , 'Raspberry Family')->first();
        $esp = Category::where('category' , 'ESP Family')->first();

       Product::factory(30)->has(View::factory()->count(random_int(0,20)))
           ->has(Price::factory()->count(random_int(0 , 20)))
           ->has(Sell::factory()->count(random_int(0 , 20)))
           ->for($arduino)
           ->create();

        Product::factory(30)->has(View::factory()->count(random_int(0,20)))
            ->has(Price::factory()->count(random_int(0 , 20)))
            ->has(Sell::factory()->count(random_int(0 , 20)))
            ->for($raspberry)
            ->create();

        Product::factory(30)->has(View::factory()->count(random_int(0,20)))
            ->has(Price::factory()->count(random_int(0 , 20)))
            ->has(Sell::factory()->count(random_int(0 , 20)))
            ->for($esp)
            ->create();
    }
}
