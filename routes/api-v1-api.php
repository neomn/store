<?php

use App\Http\Controllers\Api\v1\Auth\API\AuthController as ApiController;
use App\Http\Controllers\Api\v1\Auth\AuthController;
use App\Http\Controllers\Api\v1\Auth\SPA\AuthController as SpaController;
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
    Route::post('login', [ApiController::class, 'login'])->withoutMiddleware('auth:api');
    Route::post('register', [AuthController::class, 'register'])->withoutMiddleware('auth:api');
    Route::post('me', [AuthController::class, 'me'])->withoutMiddleware('auth:api');
    Route::post('logout', [AuthController::class, 'logout'])->withoutMiddleware('auth:api');
});




//Route::get('welcome', [WelcomeController::class , 'index']);
//Route::get('categories', [CategoriesController::class , 'index']);
//Route::get('productContainer/{category_id}', [ProductController::class , 'retrieveProductsUsingCategoryId']);
//Route::get('product/{product_number}', [ProductController::class , 'show']);
//Route::apiResource('shopping_cart' , ShoppingCart::class);
//Route::post('register', RegisteredUserController::class);
//Route::middleware('auth:sanctum')->get('dashboard', [UserDashboard::class , 'index']);
