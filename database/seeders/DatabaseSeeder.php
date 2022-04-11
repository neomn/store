<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
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
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CategorySeeder::class);

        $category = [
            'arduino' => Category::where('category', 'Arduino Family')->first(),
            'raspberry' => Category::where('category', 'Raspberry Family')->first(),
            'esp' => Category::where('category', 'ESP Family')->first(),
        ];

        User::factory(100)->create()
            ->each(function ($user) use ($category) {
                Product::factory(rand(0, 20))
                    ->has(View::factory(rand(10 , 200)))
                    ->has(Price::factory(rand(10 , 200)))
                    ->has(Sell::factory(rand(10 , 200)))
                    ->has(Image::factory(rand(1 , 200)))
                    ->for($category[array_rand($category , 1)])
                    ->create([
                        'user_id' => $user->id,
                    ]);
            });

    }
}
