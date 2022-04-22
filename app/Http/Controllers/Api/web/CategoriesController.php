<?php

namespace App\Http\Controllers\Api\web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(){
//        return response('allCategories index');
//        return response(Category::all());
        return CategoryResource::collection(Category::all());
    }
}
