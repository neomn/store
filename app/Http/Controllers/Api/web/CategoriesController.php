<?php

namespace App\Http\Controllers\Api\web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    public function index(){
        return CategoryResource::collection(Category::all());
    }

    public function retrieveCategoryProducts($category){
//        $category = Category::where('category' , $category)->first();
//        $products = $category->products;
//        $productsLatestPrice = [];
//        foreach ($products as $product){
//
//        }
//        return response($products);
    }

    public function show($id){

    }
}
