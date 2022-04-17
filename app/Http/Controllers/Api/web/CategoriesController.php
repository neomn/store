<?php

namespace App\Http\Controllers\Api\web;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(){
//        return response('categories index');
        return response(Category::all());
    }
}
