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
        $view = View::factory(200)->create();


    }
}
