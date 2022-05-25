<?php

use App\Http\Controllers\Api\admin\CategoryController;
use App\Http\Controllers\api\ProductController;
use Illuminate\Support\Facades\Route;

//Route::view('/panel/{any?}', 'admin.vue.app')
//    ->middleware('adminAuthenticator')
//    ->where('any', '.*?')
//    ->name('panel');

Route::Resource('/categories', CategoryController::class);
