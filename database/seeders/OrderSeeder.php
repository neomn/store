<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $products = Product::all();

        for ( $i=0 ; $i<50 ; $i++){
            $user = $products->random(1);
            $product =  $products->random(1);
            Order::factory()->create([
                'price'=> $product[0]->latestPrice->price,
                'user_id' => $user[0]->id,
                'product_id' => $product[0]->id,

            ]);
        }
    }
}
