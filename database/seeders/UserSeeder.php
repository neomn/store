<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Price;
use App\Models\Product;
use App\Models\Sell;
use App\Models\User;
use App\Models\View;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $value = [
            'first_name' => 'test',
            'last_name' => 'user',
            'phone_number' => '09178448254',
            'email' => 'testuser@test.com',
            'email_verified_at' => $faker->dateTime(),
            'password' => Hash::make('testtest123'),
        ];
        DB::table('users')->insert($value);



        $category = [
            'arduino' => Category::where('category', 'Arduino Family')->first(),
            'raspberry' => Category::where('category', 'Raspberry Family')->first(),
            'esp' => Category::where('category', 'ESP Family')->first(),
        ];

        User::factory(100)->create()
            ->each(function ($user) use ($category) {
                Product::factory(rand(1, 20))
                    ->has(View::factory(rand(10, 50)))
                    ->has(Price::factory(rand(10, 50)))
                    ->has(Sell::factory(rand(10, 50)))
                    ->has(Image::factory(rand(1, 50)))
                    ->for($category[array_rand($category, 1)])
                    ->create([
                        'user_id' => $user->id,
                    ]);
            });
    }
}
