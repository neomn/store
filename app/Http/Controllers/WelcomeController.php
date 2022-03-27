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

        return view('welcome', compact([
            'weekProducts',
            'recentMonthNewProducts',
            'topSold',
        ]));
    }

    //returns top 20 most visited products in recent week
    public function mostVisitedProductsRecentWeek()
    {
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');

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
        $monthStartDate = $now->startOfMonth()->format('y-m-d H:i');
        $monthEndDate = $now->endOfMonth()->format('y-m-d H:i');

        return Product::whereBetween('created_at', [$monthStartDate, $monthEndDate])
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();
    }

    //returns top 20 sold products in recent month
    public function topSells()
    {
        $now = Carbon::now();
        $monthStartDate = $now->startOfMonth()->format('y-m-d H:i');
        $monthEndDate = $now->endOfMonth()->format('y-m-d H:i');

        $sold =  Sell::whereBetween('created_at', [$monthStartDate, $monthEndDate])
            ->orderBy('sold_count' , 'desc')
            ->take(20)
            ->get();

        $products = [];

        foreach ($sold as $sold)
            $products[] = $sold->product;

        return $products;
    }

    public function discountedProducts()
    {

    }
}
