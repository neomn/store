<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
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

        $products = Product::all();
//        dd($products);



        for ( $i=0 ; $i<50 ; $i++){

            $product =  $products->random(1);

//            dd($products[$i]->latestPrice->price);
//            dd($product[0]->id);

            Order::factory()->create([
                'price'=> $product[0]->latestPrice->price,
                'product_id' => $product[0]->id,
                'user_id' => $product[0]->user->id
            ]);
        }
    }
}
