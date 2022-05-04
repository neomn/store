<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Order;
use App\Models\Price;
use App\Models\Product;
use App\Models\Sell;
use App\Models\User;
use App\Models\View;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class); // this also will seed productContainer and its all related tables
        $this->call(OrderSeeder::class);
    }
}
