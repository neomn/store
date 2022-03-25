<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $weekProructs = $this->mostVisitedProductsRecentWeek();
        return view('root' , compact('weekProructs'));
    }

    //returns top 100 most visited products in recent month
    public function mostVisitedProductsRecentWeek(){

        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');

        $views = View::whereBetween('created_at' ,[$weekStartDate , $weekEndDate ])
        ->orderBy('count' , 'asc')
        ->limit(100)
        ->get();

        foreach ($views as $index=>$view){
            $products[$index] = $views->product;
        }

       // return $products;
    }

    public function newProducts(){

    }

    public function topSold(){

    }

    public function discountedProducts(){

    }
}
