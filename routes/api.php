<?php


use App\Http\Controllers\Api\web\CategoriesController;
use App\Http\Controllers\Api\web\ProductController;
use App\Http\Controllers\Api\web\WelcomeController;
use App\Http\Controllers\Api\web\UserDashboard;
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


Route::get('welcome', [WelcomeController::class , 'index']);
Route::get('product/{product_number}', [ProductController::class , 'show']);
Route::get('categories', [CategoriesController::class , 'index']);

Route::middleware('auth:sanctum')->get('dashboard', [UserDashboard::class , 'index']);
