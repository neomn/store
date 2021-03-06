<?php

namespace App\Http\Controllers\Api\web;

use App\Http\Resources\Api\web\ProductResource;
use App\Models\Product;
use App\Models\Sell;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $favoriteProducts = $this->mostVisitedProducts();
        $newProducts = $this->newProducts();
        $topSells = $this->topSells();

        $newProducts = ProductResource::collection($newProducts);
        $topSells = ProductResource::collection($topSells);
        $favoriteProducts = ProductResource::collection($favoriteProducts);

        return [
            'favoriteProducts' => $favoriteProducts ,
            'newProducts' => $newProducts ,
            'topSells' => $topSells
        ];
    }

    public function product($product_number){
        return $product_number;
    }

    //returns top 20 most visited productContainer in recent week
    public function mostVisitedProducts()
    {
        $now = Carbon::now();
        $monthEndDate = $now->format('Y-m-d H:i:s');
        $monthStartDate = $now->sub('day',30)->format('Y-m-d H:i:s');

        $top_20_Views = View::whereBetween('created_at', [$monthStartDate, $monthEndDate])
            ->orderBy('count', 'desc')
            ->limit(20)
            ->get();

        $products = [];

        foreach ($top_20_Views as $view)
            $products[] = $view->product;

        return $products;
    }

    //returns all new productContainer in recent month
    public function newProducts()
    {
        $now = Carbon::now();
        $monthEndDate = $now->format('Y-m-d H:i:s');
        $monthStartDate = $now->sub('day',30)->format('Y-m-d H:i:s');

        return Product::whereBetween('created_at', [$monthStartDate, $monthEndDate])
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();
    }

    //returns top 20 sold productContainer in recent month
    public function topSells()
    {
        $now = Carbon::now();
        $monthEndDate = $now->format('Y-m-d H:i:s');
        $monthStartDate = $now->sub('day',30)->format('Y-m-d H:i:s');

        $sold =  Sell::whereBetween('created_at', [$monthStartDate, $monthEndDate])
            ->orderBy('sold_count' , 'desc')
            ->limit(20)
            ->get();

        $products = [];

        foreach ($sold as $sell)
            $products[] = $sell->product;

        return $products;
    }

    public function discountedProducts()
    {

    }
}
