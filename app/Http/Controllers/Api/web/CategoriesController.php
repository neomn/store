<?php

namespace App\Http\Controllers\Api\web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\web\CategoryProductsWithPriceResource;
use App\Http\Resources\Api\web\CategoryResource;
use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Object_;


class CategoriesController extends Controller
{
    public function index(){
        return CategoryResource::collection(Category::all());
    }

    public function retrieveCategoryProducts($category){
        $products = Category::where('category' , $category)->first()->products;
        $productsWithLatestPrice = [];

        foreach ($products as $product)
            $productsWithLatestPrice [] = (Object) [$product , $product->latestPrice->price];

        return response($productsWithLatestPrice);
    }
}
