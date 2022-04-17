<?php

namespace App\Http\Controllers\Api\web;

use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index(){
        return response('categories index');
    }
}
