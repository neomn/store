<?php

namespace Database\Seeders;

use App\Models\Product;
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
        $this->call(CategorySeeder::class);
       $this->call(ProductSeeder::class);
       $this->call(AdminSeeder::class);

    }
}
