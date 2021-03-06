<?php

namespace App\Http\Controllers\Api\web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\web\CategoryProductsWithPriceResource;
use App\Http\Resources\Api\web\CategoryResource;
use App\Models\Category;
use App\Models\Product;



class CategoriesController extends Controller
{
    public function index(){
        return CategoryResource::collection(Category::with('image')->get());
    }
}
