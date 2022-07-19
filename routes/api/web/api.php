<?php


use App\Http\Controllers\Api\web\CategoriesController;
use App\Http\Controllers\Api\web\ProductController;
use App\Http\Controllers\Api\web\RegisteredUserController;
use App\Http\Controllers\Api\web\WelcomeController;
use App\Http\Controllers\Api\web\UserDashboard;
use App\Http\Controllers\ExternalApi\AuthController;
use App\Http\Controllers\ShoppingCart;
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

Route::prefix('auth')->group(function() {
    Route::post('register', [AuthController::class, 'register'])->withoutMiddleware('auth:externalApi');
    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware('auth:externalApi');
});

//Route::get('welcome', [WelcomeController::class , 'index']);
//Route::get('categories', [CategoriesController::class , 'index']);
//Route::get('productContainer/{category_id}', [ProductController::class , 'retrieveProductsUsingCategoryId']);
//Route::get('product/{product_number}', [ProductController::class , 'show']);
//Route::apiResource('shopping_cart' , ShoppingCart::class);
//Route::post('register', RegisteredUserController::class);
//Route::middleware('auth:sanctum')->get('dashboard', [UserDashboard::class , 'index']);
