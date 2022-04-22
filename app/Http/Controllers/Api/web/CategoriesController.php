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

    public function retriveCategoryProducts(Request $request){
        $category = $request->category;
        return response($category);
    }
}
