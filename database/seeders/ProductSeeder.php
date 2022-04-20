<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
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
        $arduino = Category::where('queriedCategory','Arduino Family')->first();
        $raspberry = Category::where('queriedCategory' , 'Raspberry Family')->first();
        $esp = Category::where('queriedCategory' , 'ESP Family')->first();

       Product::factory(70)->has(View::factory()->count(random_int(0,20)))
           ->has(Price::factory()->count(random_int(0 , 20)))
           ->has(Sell::factory()->count(random_int(1 , 20)))
           ->has(Image::factory(random_int(1 , 5)))
           ->for($arduino)
           ->create();

        Product::factory(70)->has(View::factory()->count(random_int(0,20)))
            ->has(Price::factory()->count(random_int(0 , 20)))
            ->has(Sell::factory()->count(random_int(1 , 20)))
            ->has(Image::factory(random_int(1 , 5)))
            ->for($raspberry)
            ->create();

        Product::factory(70)->has(View::factory()->count(random_int(0,20)))
            ->has(Price::factory()->count(random_int(0 , 20)))
            ->has(Sell::factory()->count(random_int(1 , 20)))
            ->has(Image::factory(random_int(1 , 5)))
            ->for($esp)
            ->create();
    }
}
