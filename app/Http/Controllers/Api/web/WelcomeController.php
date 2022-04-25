<?php

namespace App\Http\Controllers\Api\web;

use App\Http\Resources\Api\web\FavoriteProductResource;
use App\Http\Resources\Api\web\NewProductResource;
use App\Http\Resources\Api\web\TopSellsResource;
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

        $newProducts = NewProductResource::collection($newProducts);
        $topSells = TopSellsResource::collection($topSells);
        $favoriteProducts = FavoriteProductResource::collection($favoriteProducts);

        return [
            'favoriteProducts' => $favoriteProducts ,
            'newProducts' => $newProducts ,
            'topSells' => $topSells
        ];
    }

    public function product($product_number){
        return $product_number;
    }

    //returns top 20 most visited products in recent week
    public function mostVisitedProducts()
    {
        $now = Carbon::now();
        $weekStartDate = $now->startOfMonth()->format('Y-m-d H:i:s');
        $weekEndDate = $now->endOfMonth()->format('Y-m-d H:i:s');

        $top_20_Views = View::whereBetween('created_at', [$weekStartDate, $weekEndDate])
            ->orderBy('count', 'desc')
            ->limit(20)
            ->get();

        $products = [];

        foreach ($top_20_Views as $view)
            $products[] = $view->product;

        return $products;
    }

    //returns all new products in recent month
    public function newProducts()
    {
        $now = Carbon::now();
        $monthStartDate = $now->startOfMonth()->format('y-m-d H:i:s');
        $monthEndDate = $now->endOfMonth()->format('y-m-d H:i:s');

        return Product::whereBetween('created_at', [$monthStartDate, $monthEndDate])
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();
    }

    //returns top 20 sold products in recent month
    public function topSells()
    {
        $now = Carbon::now();
        $monthStartDate = $now->startOfMonth()->format('y-m-d H:i:s');
        $monthEndDate = $now->endOfMonth()->format('y-m-d H:i:s');

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
