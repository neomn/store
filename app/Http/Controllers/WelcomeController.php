<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sell;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $weekProducts = $this->mostVisitedProductsRecentWeek();
        $recentMonthNewProducts = $this->newProducts();
        $topSold = $this->topSells();

        return view('web.vue.welcome', compact([
            'weekProducts',
            'recentMonthNewProducts',
            'topSold',
        ]));
    }

    //returns top 20 most visited productContainer in recent week
    public function mostVisitedProductsRecentWeek()
    {
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i:s');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i:s');

        $top_20_Views = View::whereBetween('created_at', [$weekStartDate, $weekEndDate])
            ->orderBy('count', 'desc')
            ->limit(20)
            ->get();

        $products = [];

        foreach ($top_20_Views as $view)
            $products[] = $view->product;

        return $products;
    }

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

    //returns top 20 sold productContainer in recent month
    public function topSells()
    {
        $now = Carbon::now();
        $monthStartDate = $now->startOfMonth()->format('y-m-d H:i:s');
        $monthEndDate = $now->endOfMonth()->format('y-m-d H:i:s');

        $sold =  Sell::whereBetween('created_at', [$monthStartDate, $monthEndDate])
            ->orderBy('sold_count' , 'desc')
            ->take(20)
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
