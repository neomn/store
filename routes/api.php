<?php

use App\Http\Controllers\Api\v1\web\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('register', [\App\Http\Controllers\Api\v1\web\AuthController::class, 'register'])->withoutMiddleware('auth:externalApi');
    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware('auth:api');
});




//Route::get('welcome', [WelcomeController::class , 'index']);
//Route::get('categories', [CategoriesController::class , 'index']);
//Route::get('productContainer/{category_id}', [ProductController::class , 'retrieveProductsUsingCategoryId']);
//Route::get('product/{product_number}', [ProductController::class , 'show']);
//Route::apiResource('shopping_cart' , ShoppingCart::class);
//Route::post('register', RegisteredUserController::class);
//Route::middleware('auth:sanctum')->get('dashboard', [UserDashboard::class , 'index']);
