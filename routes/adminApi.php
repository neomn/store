<?php

use App\Http\Controllers\api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class , 'index']);
